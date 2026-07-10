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
 * Add resource hints for critical third-party hosts.
 */
function viar_resource_hints(array $urls, string $relation_type): array {
    if ('preconnect' !== $relation_type || !viar_typography_uses_gstatic_font_files()) {
        return $urls;
    }

    $urls[] = [
        'href' => 'https://fonts.gstatic.com',
        'crossorigin' => 'anonymous',
    ];

    return array_unique($urls, SORT_REGULAR);
}
add_filter('wp_resource_hints', 'viar_resource_hints', 10, 2);

/**
 * Drop stale font host hints WordPress or plugins may still inject.
 */
function viar_remove_unused_font_resource_hints(array $urls, string $relation_type): array {
    if (!in_array($relation_type, ['preconnect', 'dns-prefetch'], true)) {
        return $urls;
    }

    return array_values(array_filter($urls, static function ($url) {
        $href = is_array($url) ? ($url['href'] ?? '') : $url;

        return !is_string($href) || !str_contains($href, 'fonts.googleapis.com');
    }));
}
add_filter('wp_resource_hints', 'viar_remove_unused_font_resource_hints', 99, 2);

/**
 * Load non-critical stylesheets without blocking first paint.
 */
function viar_async_style_loader_tag(string $html, string $handle, string $href, string $media): string {
    if (!in_array($handle, viar_get_async_style_handles(), true)) {
        return $html;
    }

    if (str_contains($html, "media='print'") || str_contains($html, 'media="print"')) {
        return $html;
    }

    $async_html = preg_replace(
        '/\smedia=[\'"][^\'"]+[\'"]/',
        " media='print' onload=\"this.media='all'\"",
        $html,
        1
    );

    if (!is_string($async_html) || $async_html === $html) {
        $async_html = str_replace(
            "rel='stylesheet'",
            "rel='stylesheet' media='print' onload=\"this.media='all'\"",
            $html
        );
    }

    return $async_html . '<noscript>' . $html . '</noscript>';
}
add_filter('style_loader_tag', 'viar_async_style_loader_tag', 10, 4);

/**
 * Style handles from plugins that can load without blocking first paint.
 */
function viar_add_plugin_async_style_handles(array $handles): array {
    $handles[] = 'ht_ctc_main_css';

    return $handles;
}
add_filter('viar_async_style_handles', 'viar_add_plugin_async_style_handles');

/**
 * Script handles that should not block HTML parsing.
 *
 * @return string[]
 */
function viar_get_defer_script_handles(): array {
    $handles = [
        'viar-luxury-navigation',
        'viar-luxury-animations',
        'viar-luxury-hero-video-modal',
        'viar-gtm-events',
        'breeze-lazy',
        'breeze-prefetch',
        'ht_ctc_app_js',
        'ht_ctc_woo_js',
        'ht_ctc_group_js',
        'ht_ctc_share_js',
    ];

    return apply_filters('viar_defer_script_handles', $handles);
}

/**
 * Whether the current view needs jQuery on the frontend.
 */
function viar_page_needs_jquery(): bool {
    if (viar_page_uses_fluent_forms()) {
        return true;
    }

    return (bool) apply_filters('viar_page_needs_jquery', false);
}

/**
 * Apply defer strategy and move prefetch scripts out of the head.
 */
function viar_optimize_noncritical_scripts(): void {
    if (is_admin()) {
        return;
    }

    $scripts = wp_scripts();

    foreach (viar_get_defer_script_handles() as $handle) {
        wp_script_add_data($handle, 'strategy', 'defer');

        if (isset($scripts->registered[$handle])) {
            $scripts->registered[$handle]->extra['group'] = 1;
        }
    }

    if (isset($scripts->registered['ht_ctc_app_js'])) {
        $scripts->registered['ht_ctc_app_js']->deps = array_values(array_diff(
            $scripts->registered['ht_ctc_app_js']->deps,
            ['jquery']
        ));
    }

    if (!viar_page_needs_jquery()) {
        wp_dequeue_script('jquery');
        wp_dequeue_script('jquery-core');
        wp_dequeue_script('jquery-migrate');
        return;
    }

    foreach (['jquery', 'jquery-core', 'jquery-migrate'] as $handle) {
        if (!isset($scripts->registered[$handle])) {
            continue;
        }

        unset($scripts->registered[$handle]->extra['strategy']);
    }
}
add_action('wp_enqueue_scripts', 'viar_optimize_noncritical_scripts', 100);

/**
 * Print flatpickr before Fluent Forms footer callbacks (priority 10).
 */
function viar_ensure_fluent_form_footer_scripts(): void {
    if (!viar_page_needs_jquery()) {
        return;
    }

    wp_enqueue_script('flatpickr');

    $scripts = wp_scripts();
    if (!isset($scripts->registered['flatpickr'])) {
        return;
    }

    unset($scripts->registered['flatpickr']->extra['strategy']);

    if (!wp_script_is('flatpickr', 'done')) {
        $scripts->do_item('flatpickr');
    }
}

/**
 * Print Fluent Forms localized vars before inline footer handlers (priority 10).
 *
 * Only the inline data is printed early. form-submission.js must load once later
 * or reCAPTCHA and other handlers initialize twice.
 */
function viar_print_fluent_form_script_extras(): void {
    static $printed = false;

    if ($printed || !viar_page_needs_jquery()) {
        return;
    }

    $scripts = wp_scripts();
    if (!isset($scripts->registered['fluent-form-submission'])) {
        return;
    }

    $printed = true;
    $scripts->print_extra_script('fluent-form-submission', true);
    unset($scripts->registered['fluent-form-submission']->extra['data']);
}

/**
 * Load jQuery in the head on form pages so inline footer handlers can bind safely.
 */
function viar_ensure_jquery_in_head_for_forms(): void {
    if (!viar_page_needs_jquery() || wp_script_is('jquery', 'done')) {
        return;
    }

    wp_enqueue_script('jquery');

    $scripts = wp_scripts();
    foreach (['jquery-core', 'jquery-migrate', 'jquery'] as $handle) {
        if (!isset($scripts->registered[$handle])) {
            continue;
        }

        unset($scripts->registered[$handle]->extra['strategy']);
    }

    $scripts->do_item('jquery');
}

add_action('wp_head', 'viar_ensure_jquery_in_head_for_forms', 1);
add_action('wp_footer', 'viar_ensure_fluent_form_footer_scripts', 5);
add_action('wp_footer', 'viar_print_fluent_form_script_extras', 9);

/**
 * Drop jquery-migrate on the public site when plugins do not require it.
 */
function viar_dequeue_jquery_migrate(WP_Scripts $scripts): void {
    if (is_admin()) {
        return;
    }

    if (!isset($scripts->registered['jquery'])) {
        return;
    }

    $scripts->registered['jquery']->deps = array_diff(
        $scripts->registered['jquery']->deps,
        ['jquery-migrate']
    );
}
add_action('wp_default_scripts', 'viar_dequeue_jquery_migrate');

/**
 * Preload the homepage hero image for faster LCP discovery.
 */
function viar_preload_lcp_hero_image(): void {
    if (is_admin()) {
        return;
    }

    $image_url = viar_get_home_hero_image_url();
    if ($image_url === '') {
        return;
    }

    printf(
        '<link rel="preload" as="image" href="%s" fetchpriority="high">' . "\n",
        esc_url($image_url)
    );
}
add_action('wp_head', 'viar_preload_lcp_hero_image', 2);

/**
 * Keep Breeze lazy-load away from marked LCP images.
 */
function viar_breeze_exclude_lcp_image_attributes(array $attributes): array {
    $attributes[] = 'fetchpriority';

    return $attributes;
}
add_filter('breeze_excluded_attributes', 'viar_breeze_exclude_lcp_image_attributes');

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

        if (
            stripos($img_tag, 'viar-lcp-image') !== false
            || stripos($img_tag, 'data-no-lazy=') !== false
            || stripos($img_tag, 'fetchpriority=') !== false
        ) {
            return $img_tag;
        }

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
