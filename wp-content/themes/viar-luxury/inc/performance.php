<?php
/**
 * Frontend performance tweaks for better CWV.
 *
 * @package ViaR_Luxury
 */

/**
 * Remove unnecessary default frontend assets.
 */
function viar_cleanup_wp_head(): void {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    remove_action('wp_head', 'wp_oembed_add_host_js');
}
add_action('init', 'viar_cleanup_wp_head');

/**
 * Add resource hints for critical third-party font hosts.
 */
function viar_resource_hints(array $urls, string $relation_type): array {
    if ('preconnect' === $relation_type) {
        $urls[] = 'https://fonts.googleapis.com';
        $urls[] = 'https://fonts.gstatic.com';
    }

    return array_unique($urls);
}
add_filter('wp_resource_hints', 'viar_resource_hints', 10, 2);

/**
 * Add modern loading attributes to non-critical images in raw template HTML.
 */
function viar_buffer_start(): void {
    if (is_admin() || wp_doing_ajax() || is_customize_preview() || wp_is_json_request()) {
        return;
    }

    if (defined('REST_REQUEST') && REST_REQUEST) {
        return;
    }

    ob_start('viar_optimize_template_images');
}
add_action('template_redirect', 'viar_buffer_start', 0);

/**
 * Optimize image loading attributes for templates with raw <img> markup.
 */
function viar_optimize_template_images(string $html): string {
    if (stripos($html, '<img') === false) {
        return $html;
    }

    $img_index = 0;
    return preg_replace_callback('/<img\b[^>]*>/i', static function ($matches) use (&$img_index) {
        $img_tag = $matches[0];
        $img_index++;
        $attrs_to_add = [];

        if (stripos($img_tag, 'loading=') === false) {
            $attrs_to_add[] = $img_index === 1 ? 'loading="eager"' : 'loading="lazy"';
        }
        if (stripos($img_tag, 'decoding=') === false) {
            $attrs_to_add[] = 'decoding="async"';
        }
        if ($img_index === 1 && stripos($img_tag, 'fetchpriority=') === false) {
            $attrs_to_add[] = 'fetchpriority="high"';
        }

        if (empty($attrs_to_add)) {
            return $img_tag;
        }

        $attr_string = ' ' . implode(' ', $attrs_to_add);
        if (str_ends_with($img_tag, '/>')) {
            return substr($img_tag, 0, -2) . $attr_string . ' />';
        }

        return substr($img_tag, 0, -1) . $attr_string . '>';
    }, $html) ?: $html;
}
