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
function viar_fix_svg_filetype(array $data, string $file, string $filename, array $mimes): array {
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
 * Raise PHP upload and image-processing limits when the host allows runtime changes.
 */
function viar_raise_upload_limits(): void {
    @ini_set('upload_max_filesize', '12M');
    @ini_set('post_max_size', '13M');
    @ini_set('memory_limit', '512M');
    @ini_set('max_execution_time', '120');
    @ini_set('max_input_time', '120');
}
add_action('init', 'viar_raise_upload_limits', 0);

/**
 * Extra headroom during media library uploads (thumbnail generation).
 */
function viar_raise_image_upload_limits(): void {
    @ini_set('memory_limit', '512M');
    @ini_set('max_execution_time', '120');
}
add_action('wp_ajax_upload-attachment', 'viar_raise_image_upload_limits', 0);
add_action('wp_ajax_async-upload', 'viar_raise_image_upload_limits', 0);

/**
 * Align WordPress upload limit with viar_max_upload_bytes().
 */
function viar_filter_upload_size_limit(int $size, int $u_bytes, int $p_bytes): int {
    return min(viar_max_upload_bytes(), $u_bytes, $p_bytes);
}
add_filter('upload_size_limit', 'viar_filter_upload_size_limit', 20, 3);
