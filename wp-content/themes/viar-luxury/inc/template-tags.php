<?php
/**
 * Template utility helpers.
 *
 * @package ViaR_Luxury
 */

/**
 * Inline style for the fixed-header spacer on the current view.
 */
function viar_get_header_spacer_style(): string {
    if (is_page_template('templates/page-about.php')) {
        return 'height:150px';
    }

    return '';
}

/**
 * Whether the header spacer uses a fixed height (not synced to header offset).
 */
function viar_header_spacer_is_fixed(): bool {
    return is_page_template('templates/page-about.php');
}

/**
 * Whether the header spacer height should stay stable on first paint.
 */
function viar_header_spacer_is_static(): bool {
    return is_front_page();
}

/**
 * Standard layout for default pages (privacy policy, terms, etc.).
 */
function viar_render_simple_page(): void {
    if (!have_posts()) {
        return;
    }

    while (have_posts()) {
        the_post();
        ?>
        <main class="site-main w-full max-w-full min-w-0 overflow-x-clip">
            <article <?php post_class('mx-auto w-full max-w-3xl px-6 py-16 md:px-12 md:py-24'); ?>>
                <header class="mb-10 border-b border-[#C5A059]/20 pb-8">
                    <h1 class="font-headline-h1 text-headline-h1 text-primary-container"><?php the_title(); ?></h1>
                </header>
                <div class="entry-content viar-entry-content prose prose-slate max-w-none font-body-lg text-body-lg text-on-surface-variant">
                    <?php the_content(); ?>
                </div>
            </article>
        </main>
        <?php
    }
}

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
 * Homepage hero MP4 URL (Customizer overrides the Home page ACF field).
 */
function viar_get_home_hero_mp4_url(?int $post_id = null): string {
    $customizer_url = get_theme_mod('viar_home_hero_mp4_url', '');
    if (is_string($customizer_url) && trim($customizer_url) !== '') {
        return esc_url(trim($customizer_url));
    }

    return esc_url(viar_field_value('viar_hero_mp4_url', '', $post_id));
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
 * Whether the homepage hero opens a Vimeo popup from the play button.
 */
function viar_home_hero_has_popup_video(?int $post_id = null): bool {
    return viar_get_home_hero_vimeo_id($post_id) !== '';
}

/**
 * Vimeo player URL for the hero popup modal.
 */
function viar_vimeo_modal_embed_url(string $video_id): string {
    return add_query_arg(
        [
            'autoplay' => '1',
            'title' => '0',
            'byline' => '0',
            'portrait' => '0',
        ],
        'https://player.vimeo.com/video/' . rawurlencode($video_id)
    );
}

/**
 * Parsed Vimeo ID for the homepage hero popup player.
 */
function viar_get_home_hero_vimeo_id(?int $post_id = null): string {
    return viar_parse_vimeo_id(viar_get_home_hero_vimeo_url($post_id));
}

/**
 * Get intrinsic dimensions for a media URL when stored in the media library.
 *
 * @return array{width: int, height: int}
 */
function viar_get_image_dimensions(string $image_url): array {
    if ($image_url === '') {
        return [];
    }

    $attachment_id = attachment_url_to_postid($image_url);
    if ($attachment_id <= 0) {
        return [];
    }

    $metadata = wp_get_attachment_metadata($attachment_id);
    if (!is_array($metadata) || empty($metadata['width']) || empty($metadata['height'])) {
        return [];
    }

    return [
        'width' => (int) $metadata['width'],
        'height' => (int) $metadata['height'],
    ];
}

/**
 * Resolve a media-library attachment ID from an ACF/meta image field.
 */
function viar_image_attachment_id(string $field_key, ?int $post_id = null): int {
    $post_id = $post_id ?: get_the_ID();

    if (function_exists('get_field')) {
        $value = get_field($field_key, $post_id);
        if (is_array($value) && !empty($value['ID'])) {
            return (int) $value['ID'];
        }
        if (is_numeric($value)) {
            return (int) $value;
        }
    }

    $meta_value = get_post_meta($post_id, $field_key, true);
    if (is_numeric($meta_value)) {
        return (int) $meta_value;
    }

    if (has_post_thumbnail($post_id)) {
        return (int) get_post_thumbnail_id($post_id);
    }

    return 0;
}

/**
 * Prefer a bundled WebP asset for theme fallback images when available.
 */
function viar_prefer_modern_image_url(string $url): string {
    $theme_uri = get_template_directory_uri();
    $theme_dir = get_template_directory();

    if (!str_starts_with($url, $theme_uri)) {
        return $url;
    }

    $relative_path = substr($url, strlen($theme_uri));
    $source_path = $theme_dir . $relative_path;
    $webp_path = preg_replace('/\.(jpe?g|png)$/i', '.webp', $source_path);

    if (is_string($webp_path) && is_readable($webp_path)) {
        return $theme_uri . substr($webp_path, strlen($theme_dir));
    }

    return $url;
}

/**
 * Render a responsive image using WordPress srcset when possible.
 *
 * @param array{
 *     attachment_id?: int,
 *     url?: string,
 *     size?: string,
 *     class?: string,
 *     alt?: string,
 *     loading?: string,
 *     fetchpriority?: string,
 *     sizes?: string,
 *     decoding?: string,
 *     lcp?: bool
 * } $args
 */
function viar_render_responsive_image(array $args): void {
    $args = wp_parse_args($args, [
        'attachment_id' => 0,
        'url' => '',
        'size' => 'large',
        'class' => '',
        'alt' => '',
        'loading' => 'lazy',
        'fetchpriority' => '',
        'sizes' => '100vw',
        'decoding' => 'async',
        'lcp' => false,
    ]);

    $attributes = [
        'class' => $args['class'],
        'loading' => $args['loading'],
        'decoding' => $args['decoding'],
        'sizes' => $args['sizes'],
    ];

    if ($args['alt'] !== '') {
        $attributes['alt'] = $args['alt'];
    }

    if ($args['fetchpriority'] !== '') {
        $attributes['fetchpriority'] = $args['fetchpriority'];
    }

    if ($args['lcp']) {
        $attributes['class'] = trim($attributes['class'] . ' viar-lcp-image no-lazyload skip-lazy');
        $attributes['loading'] = 'eager';
        $attributes['fetchpriority'] = 'high';
        $attributes['data-no-lazy'] = '1';
    }

    if ($args['attachment_id'] > 0) {
        // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped by core.
        echo wp_get_attachment_image((int) $args['attachment_id'], (string) $args['size'], false, $attributes);
        return;
    }

    if ($args['url'] === '') {
        return;
    }

    $image_url = viar_prefer_modern_image_url((string) $args['url']);
    $dimensions = viar_get_image_dimensions((string) $args['url']);
    ?>
    <img
        class="<?php echo esc_attr($args['class']); ?>"
        alt="<?php echo esc_attr($args['alt']); ?>"
        src="<?php echo esc_url($image_url); ?>"
        loading="<?php echo esc_attr($args['loading']); ?>"
        decoding="<?php echo esc_attr($args['decoding']); ?>"
        <?php if ($args['fetchpriority'] !== '') : ?>
            fetchpriority="<?php echo esc_attr($args['fetchpriority']); ?>"
        <?php endif; ?>
        <?php if ($args['lcp']) : ?>
            data-no-lazy="1"
        <?php endif; ?>
        <?php if (!empty($dimensions)) : ?>
            width="<?php echo esc_attr((string) $dimensions['width']); ?>"
            height="<?php echo esc_attr((string) $dimensions['height']); ?>"
        <?php endif; ?>
    >
    <?php
}

/**
 * Homepage hero image URL used for LCP preloading.
 */
function viar_get_home_hero_image_url(): string {
    if (!is_front_page()) {
        return '';
    }

    $post_id = (int) get_queried_object_id();
    $fallback = get_template_directory_uri() . '/assets/images/remote-2018f584e2ab.jpg';
    $attachment_id = viar_image_attachment_id('viar_hero_image', $post_id > 0 ? $post_id : null);

    if ($attachment_id > 0) {
        $src = wp_get_attachment_image_url($attachment_id, 'viar-hero');
        if (is_string($src) && $src !== '') {
            return $src;
        }
    }

    return viar_prefer_modern_image_url(viar_image_url('viar_hero_image', $fallback, $post_id > 0 ? $post_id : null));
}

/**
 * Render a full-bleed hero background image.
 */
function viar_render_hero_background(
    string $image_url,
    string $image_alt = '',
    string $image_class = 'w-full h-full object-cover grayscale-[20%]',
    ?int $post_id = null,
    ?string $field_key = 'viar_hero_image'
): void {
    $post_id = $post_id ?: get_the_ID();
    $attachment_id = $field_key ? viar_image_attachment_id($field_key, $post_id) : 0;

    if ($attachment_id <= 0) {
        $attachment_id = attachment_url_to_postid($image_url);
    }
    ?>
    <div class="absolute inset-0 z-0 viar-hero-background">
        <?php if ($image_url !== '' || $attachment_id > 0) : ?>
            <?php
            viar_render_responsive_image([
                'attachment_id' => $attachment_id,
                'url' => $image_url,
                'size' => 'viar-hero',
                'sizes' => '100vw',
                'class' => trim($image_class . ' viar-lcp-image'),
                'alt' => $image_alt,
                'loading' => 'eager',
                'fetchpriority' => 'high',
                'lcp' => true,
            ]);
            ?>
        <?php endif; ?>
        <div class="absolute inset-0 bg-black/30 backdrop-brightness-90"></div>
    </div>
    <?php
}

/**
 * Render a full-bleed LCP hero image with srcset and the viar-hero size.
 *
 * @param array{
 *     field_key?: string,
 *     fallback_url?: string,
 *     post_id?: int,
 *     alt?: string,
 *     class?: string,
 *     sizes?: string
 * } $args
 */
function viar_render_lcp_hero_image(array $args): void {
    $args = wp_parse_args($args, [
        'field_key' => '',
        'fallback_url' => '',
        'post_id' => 0,
        'alt' => '',
        'class' => 'absolute inset-0 h-full w-full object-cover',
        'sizes' => '100vw',
    ]);

    $post_id = (int) ($args['post_id'] ?: get_the_ID());
    $field_key = (string) $args['field_key'];
    $image_url = $field_key !== ''
        ? viar_image_url($field_key, (string) $args['fallback_url'], $post_id)
        : (string) $args['fallback_url'];
    $attachment_id = $field_key !== '' ? viar_image_attachment_id($field_key, $post_id) : 0;

    if ($image_url === '' && $attachment_id <= 0) {
        return;
    }

    if ($attachment_id <= 0 && $image_url !== '') {
        $attachment_id = (int) attachment_url_to_postid($image_url);
    }

    viar_render_responsive_image([
        'attachment_id' => $attachment_id,
        'url' => $image_url,
        'size' => 'viar-hero',
        'sizes' => (string) $args['sizes'],
        'class' => trim((string) $args['class'] . ' viar-lcp-image'),
        'alt' => (string) $args['alt'],
        'loading' => 'eager',
        'fetchpriority' => 'high',
        'lcp' => true,
    ]);
}

/**
 * Hero play button that opens the Vimeo popup.
 */
function viar_render_hero_play_button(): void {
    ?>
    <button
        type="button"
        class="viar-hero-play-btn group"
        data-viar-video-open
        aria-label="<?php esc_attr_e('Play video', 'viar-luxury'); ?>"
    >
        <span class="viar-hero-play-btn__ring" aria-hidden="true"></span>
        <span class="viar-hero-play-btn__ring viar-hero-play-btn__ring--delayed" aria-hidden="true"></span>
        <span class="material-symbols-outlined viar-hero-play-btn__icon" aria-hidden="true">play_arrow</span>
    </button>
    <?php
}

/**
 * Vimeo popup modal for the mobile homepage hero.
 */
function viar_render_hero_video_modal(string $vimeo_id): void {
    if ($vimeo_id === '') {
        return;
    }
    ?>
    <div
        id="viar-hero-video-modal"
        class="viar-hero-video-modal"
        hidden
        aria-hidden="true"
    >
        <div class="viar-hero-video-modal__backdrop" data-viar-video-close></div>
        <div
            class="viar-hero-video-modal__dialog"
            role="dialog"
            aria-modal="true"
            aria-label="<?php esc_attr_e('Promotional video', 'viar-luxury'); ?>"
        >
            <button
                type="button"
                class="viar-hero-video-modal__close"
                data-viar-video-close
                aria-label="<?php esc_attr_e('Close video', 'viar-luxury'); ?>"
            >
                <span class="material-symbols-outlined" aria-hidden="true">close</span>
            </button>
            <div class="viar-hero-video-modal__frame">
                <iframe
                    class="viar-hero-video-modal__iframe"
                    data-viar-vimeo-iframe
                    data-src="<?php echo esc_url(viar_vimeo_modal_embed_url($vimeo_id)); ?>"
                    title="<?php esc_attr_e('ViaR promotional video', 'viar-luxury'); ?>"
                    allow="autoplay; fullscreen; picture-in-picture"
                ></iframe>
            </div>
        </div>
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
 * Image URL from ACF/meta only — no featured image or theme fallback.
 */
function viar_field_image_url(string $field_key, ?int $post_id = null, string $fallback = ''): string {
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
