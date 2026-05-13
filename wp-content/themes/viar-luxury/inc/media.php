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
