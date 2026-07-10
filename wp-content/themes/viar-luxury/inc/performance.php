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

    viar_sync_fluent_form_scripts();
}
add_action('wp_enqueue_scripts', 'viar_optimize_noncritical_scripts', 100);

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
 * Preload the LCP hero image for faster discovery.
 */
function viar_get_lcp_hero_image_url(): string {
    if (is_front_page()) {
        return viar_get_home_hero_image_url();
    }

    if (is_singular('viar_bespoke_tour')) {
        $post_id = (int) get_queried_object_id();
        if ($post_id <= 0) {
            return '';
        }

        $attachment_id = viar_image_attachment_id('viar_tour_hero_image', $post_id);
        if ($attachment_id > 0) {
            $src = wp_get_attachment_image_url($attachment_id, 'viar-hero');
            if (is_string($src) && $src !== '') {
                return $src;
            }
        }

        return viar_image_url('viar_tour_hero_image', '', $post_id);
    }

    return '';
}

/**
 * Preload the homepage hero image for faster LCP discovery.
 */
function viar_preload_lcp_hero_image(): void {
    if (is_admin()) {
        return;
    }

    $image_url = viar_get_lcp_hero_image_url();
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
    $attributes[] = 'data-no-lazy';

    return array_values(array_unique($attributes));
}
add_filter('breeze_excluded_attributes', 'viar_breeze_exclude_lcp_image_attributes');

/**
 * Tell Smush lazy-load to ignore theme LCP images.
 *
 * @param string[] $keywords
 * @return string[]
 */
function viar_smush_exclude_lcp_lazy_load_keywords(array $keywords): array {
    $keywords[] = 'viar-lcp-image';
    $keywords[] = 'no-lazyload';
    $keywords[] = 'skip-lazy';

    return array_values(array_unique($keywords));
}
add_filter('wp_smush_lazyload_excluded_keywords', 'viar_smush_exclude_lcp_lazy_load_keywords');

/**
 * @param bool $skip
 * @param string $src_url
 * @param string $markup
 */
function viar_smush_skip_lcp_image_from_lazy_load(bool $skip, string $src_url, string $markup): bool {
    if ($skip) {
        return true;
    }

    return str_contains($markup, 'viar-lcp-image')
        || str_contains($markup, 'no-lazyload')
        || str_contains($markup, 'skip-lazy');
}
add_filter('smush_skip_image_from_lazy_load', 'viar_smush_skip_lcp_image_from_lazy_load', 10, 3);

/**
 * Do not let WordPress override eager loading on marked LCP images.
 *
 * @param string|false $value
 */
function viar_lcp_img_loading_attr($value, string $image, string $context) {
    if (str_contains($image, 'viar-lcp-image') || str_contains($image, 'no-lazyload')) {
        return false;
    }

    return $value;
}
add_filter('wp_img_tag_add_loading_attr', 'viar_lcp_img_loading_attr', 10, 3);

/**
 * Restore eager LCP images if a lazy-load plugin rewrote them in cached HTML.
 */
function viar_fix_lcp_image_lazy_attributes(string $html): string {
    if (!str_contains($html, 'viar-lcp-image')) {
        return $html;
    }

    $updated = preg_replace_callback(
        '/<img\b[^>]*\bviar-lcp-image\b[^>]*>/i',
        static function (array $matches): string {
            $tag = $matches[0];

            $tag = preg_replace('/\sloading=(?:"|\')lazy(?:"|\')/i', '', $tag) ?? $tag;
            $tag = preg_replace('/\sdata-srcset=(?:"|\')[^"\']*(?:"|\')/i', '', $tag) ?? $tag;
            $tag = preg_replace('/\sdata-sizes=(?:"|\')[^"\']*(?:"|\')/i', '', $tag) ?? $tag;

            if (preg_match('/\sdata-src=(?:"|\')([^"\']+)(?:"|\')/i', $tag, $data_src)) {
                $tag = preg_replace('/\ssrc=(?:"|\')[^"\']*(?:"|\')/i', '', $tag) ?? $tag;
                $tag = preg_replace('/<img/i', '<img src="' . esc_attr($data_src[1]) . '"', $tag, 1) ?? $tag;
                $tag = preg_replace('/\sdata-src=(?:"|\')[^"\']*(?:"|\')/i', '', $tag) ?? $tag;
            }

            if (preg_match('/\sclass=(?:"|\')([^"\']*)(?:"|\')/i', $tag, $class_match)) {
                $classes = trim(preg_replace('/\s*(lazyload|lazyloaded|br-lazy)\s*/', ' ', $class_match[1]) ?? $class_match[1]);
                $classes = trim(preg_replace('/\s+/', ' ', $classes . ' no-lazyload skip-lazy viar-lcp-image'));
                $tag = preg_replace(
                    '/\sclass=(?:"|\')[^"\']*(?:"|\')/i',
                    ' class="' . esc_attr($classes) . '"',
                    $tag,
                    1
                ) ?? $tag;
            } else {
                $tag = preg_replace('/<img/i', '<img class="no-lazyload skip-lazy viar-lcp-image"', $tag, 1) ?? $tag;
            }

            if (!preg_match('/\sloading=(?:"|\')eager(?:"|\')/i', $tag)) {
                $tag = preg_replace('/\sloading=(?:"|\')[^"\']*(?:"|\')/i', '', $tag) ?? $tag;
                $tag = preg_replace('/<img/i', '<img loading="eager"', $tag, 1) ?? $tag;
            }

            if (!preg_match('/\sfetchpriority=(?:"|\')high(?:"|\')/i', $tag)) {
                $tag = preg_replace('/<img/i', '<img fetchpriority="high"', $tag, 1) ?? $tag;
            }

            if (!preg_match('/\sdata-no-lazy=/i', $tag)) {
                $tag = preg_replace('/<img/i', '<img data-no-lazy="1"', $tag, 1) ?? $tag;
            }

            return $tag;
        },
        $html
    );

    return is_string($updated) ? $updated : $html;
}

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
function viar_defer_fluent_date_picker_init(string $html): string {
    if (!viar_page_uses_fluent_forms() || !str_contains($html, 'initPicker();')) {
        return $html;
    }

    return str_replace(
        'initPicker();',
        'requestAnimationFrame(function(){requestAnimationFrame(initPicker);});',
        $html
    );
}

/**
 * Optimize image loading attributes for templates with raw <img> markup.
 */
function viar_optimize_template_images(string $html): string {
    $html = viar_defer_fluent_date_picker_init($html);
    $html = viar_fix_lcp_image_lazy_attributes($html);

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
