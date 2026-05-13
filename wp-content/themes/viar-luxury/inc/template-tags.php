<?php
/**
 * Template utility helpers.
 *
 * @package ViaR_Luxury
 */

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
    <section class="max-w-[1440px] mx-auto px-12 py-20 prose prose-slate max-w-none">
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
        <section class="max-w-[1440px] mx-auto px-6 md:px-12 py-16 md:py-24 prose prose-slate max-w-none">
            <?php echo apply_filters('the_content', $content); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
        </section>
    </main>
    <?php
}
