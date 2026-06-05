<?php
/**
 * Template utility helpers.
 *
 * @package ViaR_Luxury
 */

/**
 * Default brand subtitle shown under the site logo (footer + schema).
 */
function viar_logo_subtitle_default(): string {
    return 'ViaR Travel Solutions: Premier Private Transfers, Mercedes Van Tours, and Travel Consulting in Athens, Greece.';
}

/**
 * Brand subtitle under the site logo.
 */
function viar_get_logo_subtitle(): string {
    $subtitle = get_theme_mod('viar_logo_subtitle', viar_logo_subtitle_default());

    return is_string($subtitle) ? $subtitle : viar_logo_subtitle_default();
}

/**
 * Absolute URL for the theme custom logo.
 */
function viar_get_custom_logo_url(): string {
    $logo_id = (int) get_theme_mod('custom_logo');
    if ($logo_id <= 0) {
        return '';
    }

    $url = wp_get_attachment_image_url($logo_id, 'full');

    return is_string($url) ? $url : '';
}

/**
 * Extract a Vimeo video ID from a URL or raw ID string.
 */
function viar_parse_vimeo_id(string $input): string {
    $input = trim($input);
    if ($input === '') {
        return '';
    }

    if (preg_match('/^\d+$/', $input)) {
        return $input;
    }

    if (preg_match('/(?:vimeo\.com\/(?:video\/)?|player\.vimeo\.com\/video\/)(\d+)/', $input, $matches)) {
        return $matches[1];
    }

    return '';
}

/**
 * Homepage hero Vimeo URL (Customizer overrides the Home page ACF field).
 */
function viar_get_home_hero_vimeo_url(?int $post_id = null): string {
    $customizer_url = get_theme_mod('viar_home_hero_vimeo_url', '');
    if (is_string($customizer_url) && trim($customizer_url) !== '') {
        return trim($customizer_url);
    }

    return viar_field_value('viar_hero_vimeo_url', '', $post_id);
}

/**
 * Background-mode Vimeo embed URL for full-bleed hero videos.
 */
function viar_vimeo_background_embed_url(string $video_id): string {
    return add_query_arg(
        [
            'background' => '1',
            'autoplay' => '1',
            'loop' => '1',
            'muted' => '1',
            'controls' => '0',
            'title' => '0',
            'byline' => '0',
            'portrait' => '0',
            'dnt' => '1',
        ],
        'https://player.vimeo.com/video/' . rawurlencode($video_id)
    );
}

/**
 * Render a full-bleed hero background with optional Vimeo video and image fallback.
 */
function viar_render_hero_background(
    string $image_url,
    string $vimeo_input = '',
    string $image_alt = '',
    string $image_class = 'w-full h-full object-cover grayscale-[20%]'
): void {
    $vimeo_id = viar_parse_vimeo_id($vimeo_input);
    ?>
    <div class="absolute inset-0 z-0">
        <?php if ($image_url !== '') : ?>
            <img
                class="<?php echo esc_attr($image_class); ?>"
                alt="<?php echo esc_attr($image_alt); ?>"
                src="<?php echo esc_url($image_url); ?>"
                <?php echo $vimeo_id !== '' ? 'aria-hidden="true"' : ''; ?>
            >
        <?php endif; ?>
        <?php if ($vimeo_id !== '') : ?>
            <div class="viar-hero-video absolute inset-0 overflow-hidden">
                <iframe
                    class="viar-hero-video__iframe"
                    src="<?php echo esc_url(viar_vimeo_background_embed_url($vimeo_id)); ?>"
                    title="<?php esc_attr_e('Homepage hero video', 'viar-luxury'); ?>"
                    allow="autoplay; fullscreen; picture-in-picture"
                    loading="lazy"
                ></iframe>
            </div>
        <?php endif; ?>
        <div class="absolute inset-0 bg-black/30 backdrop-brightness-90"></div>
    </div>
    <?php
}

/**
 * Get ACF field value with fallback.
 */
function viar_field_value(string $field_key, string $fallback = '', ?int $post_id = null): string {
    $post_id = $post_id ?: get_the_ID();

    if (function_exists('get_field')) {
        $value = get_field($field_key, $post_id);
        if (is_string($value) && trim($value) !== '') {
            return $value;
        }
    }

    $meta_value = get_post_meta($post_id, $field_key, true);
    if (is_string($meta_value) && trim($meta_value) !== '') {
        return $meta_value;
    }

    return $fallback;
}

/**
 * Get image URL from ACF/meta/featured image with fallback.
 */
function viar_image_url(string $field_key, string $fallback = '', ?int $post_id = null): string {
    $post_id = $post_id ?: get_the_ID();

    if (function_exists('get_field')) {
        $value = get_field($field_key, $post_id);
        if (is_array($value) && !empty($value['url'])) {
            return (string) $value['url'];
        }
        if (is_numeric($value)) {
            $src = wp_get_attachment_image_url((int) $value, 'full');
            if (is_string($src) && $src !== '') {
                return $src;
            }
        }
        if (is_string($value) && trim($value) !== '') {
            return $value;
        }
    }

    $meta_value = get_post_meta($post_id, $field_key, true);
    if (is_numeric($meta_value)) {
        $src = wp_get_attachment_image_url((int) $meta_value, 'full');
        if (is_string($src) && $src !== '') {
            return $src;
        }
    }
    if (is_string($meta_value) && trim($meta_value) !== '') {
        return $meta_value;
    }

    if (has_post_thumbnail($post_id)) {
        $featured = get_the_post_thumbnail_url($post_id, 'full');
        if (is_string($featured) && $featured !== '') {
            return $featured;
        }
    }

    return $fallback;
}

/**
 * Render optional Gutenberg/block content from page editor.
 */
function viar_render_editor_content(): void {
    $content = get_post_field('post_content', get_the_ID());
    if (!is_string($content) || trim(wp_strip_all_tags($content)) === '') {
        return;
    }
    ?>
    <section class="mx-auto w-full max-w-[1440px] min-w-0 overflow-x-hidden px-6 py-20 md:px-12 prose prose-slate">
        <?php echo apply_filters('the_content', $content); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
    </section>
    <?php
}

/**
 * Determine if current object should render full editor-defined sections.
 */
function viar_has_editor_sections(?int $post_id = null): bool {
    $post_id = $post_id ?: get_the_ID();
    if (!$post_id) {
        return false;
    }

    $content = get_post_field('post_content', $post_id);
    if (!is_string($content)) {
        return false;
    }

    return trim(wp_strip_all_tags($content)) !== '';
}

/**
 * Curated experience rows for a bespoke tour.
 *
 * @return array<int, array{title: string, description: string, image: string}>
 */
function viar_get_tour_experiences(?int $post_id = null): array {
    $post_id = $post_id ?: get_the_ID();
    if (!$post_id) {
        return [];
    }

    $rows = [];

    for ($slot = 1; $slot <= 3; $slot++) {
        $title = viar_field_value("viar_tour_experience_{$slot}_title", '', $post_id);
        $description = viar_field_value("viar_tour_experience_{$slot}_description", '', $post_id);
        $image = viar_image_url("viar_tour_experience_{$slot}_image", '', $post_id);

        if ($title === '' && $description === '' && $image === '') {
            continue;
        }

        $rows[] = [
            'title' => $title,
            'description' => $description,
            'image' => $image,
        ];
    }

    if ($rows !== []) {
        return $rows;
    }

    // Legacy fallback: ACF Pro repeater data saved before fixed fields were added.
    if (!function_exists('have_rows') || !have_rows('viar_tour_experiences', $post_id)) {
        return [];
    }

    while (have_rows('viar_tour_experiences', $post_id)) {
        the_row();
        $image = get_sub_field('experience_image');
        $image_url = '';

        if (is_array($image) && !empty($image['url'])) {
            $image_url = (string) $image['url'];
        } elseif (is_numeric($image)) {
            $src = wp_get_attachment_image_url((int) $image, 'full');
            $image_url = is_string($src) ? $src : '';
        } elseif (is_string($image)) {
            $image_url = $image;
        }

        $rows[] = [
            'title' => (string) get_sub_field('experience_title'),
            'description' => (string) get_sub_field('experience_description'),
            'image' => $image_url,
        ];
    }

    return $rows;
}

/**
 * File URL from an ACF file field.
 */
function viar_file_url(string $field_key, string $fallback = '', ?int $post_id = null): string {
    $post_id = $post_id ?: get_the_ID();

    if (function_exists('get_field')) {
        $value = get_field($field_key, $post_id);
        if (is_array($value) && !empty($value['url'])) {
            return (string) $value['url'];
        }
        if (is_string($value) && trim($value) !== '') {
            return $value;
        }
    }

    $meta_value = get_post_meta($post_id, $field_key, true);
    if (is_string($meta_value) && trim($meta_value) !== '') {
        return $meta_value;
    }

    return $fallback;
}

/**
 * Render full-page sections from editor content.
 */
function viar_render_editor_sections_page(?int $post_id = null): void {
    $post_id = $post_id ?: get_the_ID();
    if (!$post_id) {
        return;
    }

    $content = get_post_field('post_content', $post_id);
    if (!is_string($content) || trim(wp_strip_all_tags($content)) === '') {
        return;
    }
    ?>
    <main id="primary" class="site-main">
        <section class="mx-auto w-full max-w-[1440px] min-w-0 overflow-x-hidden px-6 py-16 md:px-12 md:py-24 prose prose-slate">
            <?php echo apply_filters('the_content', $content); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
        </section>
    </main>
    <?php
}
