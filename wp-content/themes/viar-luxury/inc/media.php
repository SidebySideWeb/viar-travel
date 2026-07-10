<?php
/**
 * Media upload and logo-related helpers.
 *
 * @package ViaR_Luxury
 */

/**
 * Allow SVG upload support in WordPress media library.
 */
function viar_allow_svg_uploads(array $mimes): array {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'viar_allow_svg_uploads');

/**
 * Ensure SVG mime type is recognized correctly.
 */
function viar_fix_svg_filetype(array $data, $file, $filename, $mimes): array {
    if (!is_string($filename) || $filename === '') {
        return $data;
    }

    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    if ('svg' === $ext) {
        $data['ext'] = 'svg';
        $data['type'] = 'image/svg+xml';
        $data['proper_filename'] = $filename;
    }

    return $data;
}
add_filter('wp_check_filetype_and_ext', 'viar_fix_svg_filetype', 10, 4);

/**
 * Target max upload size for media library uploads (bytes).
 */
function viar_max_upload_bytes(): int {
    return (int) apply_filters('viar_max_upload_bytes', 12 * MB_IN_BYTES);
}

/**
 * Give image uploads enough memory and time before WordPress scales thumbnails.
 */
function viar_prepare_media_upload_environment(): void {
    if (function_exists('wp_raise_memory_limit')) {
        wp_raise_memory_limit('admin');
    }

    @ini_set('memory_limit', '512M');
    @ini_set('upload_max_filesize', '12M');
    @ini_set('post_max_size', '13M');

    if (function_exists('set_time_limit')) {
        @set_time_limit(120);
    }
}

/**
 * Prefer GD over Imagick — avoids common Imagick crashes on large uploads.
 *
 * @param string[] $editors Image editor class names.
 * @return string[]
 */
function viar_prefer_gd_image_editor(array $editors): array {
    return ['WP_Image_Editor_GD', 'WP_Image_Editor_Imagick'];
}
add_filter('wp_image_editors', 'viar_prefer_gd_image_editor');

/**
 * Raise limits on every media upload entry point.
 */
function viar_register_media_upload_hooks(): void {
    add_action('load-async-upload.php', 'viar_prepare_media_upload_environment', 0);
    add_action('load-media-new.php', 'viar_prepare_media_upload_environment', 0);
    add_action('load-upload.php', 'viar_prepare_media_upload_environment', 0);
    add_action('wp_ajax_upload-attachment', 'viar_prepare_media_upload_environment', 0);
    add_filter('wp_handle_upload_prefilter', 'viar_prepare_media_upload_prefilter', 0);
    add_filter('intermediate_image_sizes_advanced', 'viar_prepare_media_intermediate_sizes', 0, 3);
}
add_action('after_setup_theme', 'viar_register_media_upload_hooks');

/**
 * @param array<string, mixed> $file Upload file data.
 * @return array<string, mixed>
 */
function viar_prepare_media_upload_prefilter(array $file): array {
    viar_prepare_media_upload_environment();
    return $file;
}

/**
 * @param array<string, mixed> $sizes
 * @param array<string, mixed> $metadata
 * @return array<string, mixed>
 */
function viar_prepare_media_intermediate_sizes(array $sizes, array $metadata, $uploaded): array {
    viar_prepare_media_upload_environment();
    return $sizes;
}

/**
 * Align WordPress upload limit with viar_max_upload_bytes().
 *
 * @param int $size
 * @param int $u_bytes
 * @param int $p_bytes
 * @return int
 */
function viar_filter_upload_size_limit($size, $u_bytes, $p_bytes) {
    $target = viar_max_upload_bytes();
    $limits = array_filter(
        [$target, (int) $u_bytes, (int) $p_bytes],
        static fn(int $value): bool => $value > 0
    );

    if ($limits === []) {
        return $target;
    }

    return (int) min($limits);
}
add_filter('upload_size_limit', 'viar_filter_upload_size_limit', 20, 3);

/**
 * Allow Converter for Media passthru WebP responses to be cached by browsers and CDN.
 */
function viar_allow_webpc_passthru_url_cache(): bool {
    return false;
}
add_filter('webpc_passthru_url_nocache', 'viar_allow_webpc_passthru_url_cache');

/**
 * Re-apply cache headers after the WebP plugin regenerates webpc-passthru.php.
 */
function viar_patch_webpc_passthru_cache_headers(): void {
    $loader_path = WP_CONTENT_DIR . '/webpc-passthru.php';
    if (!is_readable($loader_path) || !is_writable($loader_path)) {
        return;
    }

    $contents = file_get_contents($loader_path);
    if (!is_string($contents) || $contents === '' || str_contains($contents, 'VIAR_WEBPC_CACHE_HEADERS')) {
        return;
    }

    $needle = "\t\t\t\t\theader( 'Content-Length: ' . filesize( \$output_image_path ) );";
    $patch = "\t\t\t\t\theader( 'Content-Length: ' . filesize( \$output_image_path ) );\n"
        . "\t\t\t\t\theader( 'Cache-Control: public, max-age=31536000, immutable' ); // VIAR_WEBPC_CACHE_HEADERS\n"
        . "\t\t\t\t\theader( 'Vary: Accept' );";

    if (!str_contains($contents, $needle)) {
        return;
    }

    file_put_contents($loader_path, str_replace($needle, $patch, $contents));
}
add_action('webpc_refresh_loader', 'viar_patch_webpc_passthru_cache_headers', 20);
add_action('webpc_settings_updated', 'viar_patch_webpc_passthru_cache_headers', 20);
add_action('after_switch_theme', 'viar_patch_webpc_passthru_cache_headers');

/**
 * Write long-lived cache headers for uploaded media files.
 */
function viar_ensure_uploads_cache_headers(): void {
    $upload_dir = wp_upload_dir();
    if (!empty($upload_dir['error'])) {
        return;
    }

    $htaccess = trailingslashit($upload_dir['basedir']) . '.htaccess';
    $marker = '# VIAR_UPLOADS_CACHE';
    $rules = <<<HTACCESS
{$marker}
<IfModule mod_headers.c>
  <FilesMatch "\.(jpe?g|png|gif|webp|svg|ico|avif)$">
    Header set Cache-Control "public, max-age=31536000, immutable"
  </FilesMatch>
</IfModule>
HTACCESS;

    $existing = is_readable($htaccess) ? (string) file_get_contents($htaccess) : '';
    if (str_contains($existing, $marker)) {
        return;
    }

    $content = rtrim($existing) . ($existing !== '' ? "\n\n" : '') . $rules . "\n";
    file_put_contents($htaccess, $content);
}

/**
 * Apply uploads cache headers once after theme updates.
 */
function viar_maybe_ensure_uploads_cache_headers(): void {
    if (is_admin() && !wp_doing_ajax()) {
        return;
    }

    $theme_version = wp_get_theme()->get('Version');
    $option_key = 'viar_uploads_cache_htaccess_version';
    if (get_option($option_key) === $theme_version) {
        return;
    }

    viar_ensure_uploads_cache_headers();
    update_option($option_key, $theme_version, false);
}
add_action('init', 'viar_maybe_ensure_uploads_cache_headers', 1);
add_action('after_switch_theme', 'viar_ensure_uploads_cache_headers');
