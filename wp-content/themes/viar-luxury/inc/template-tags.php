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

    return 'height:6.5rem';
}

/**
 * Whether the header spacer uses a fixed height (not synced to header offset).
 */
function viar_header_spacer_is_fixed(): bool {
    return is_page_template('templates/page-about.php');
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
 * Whether the homepage hero uses a background video (MP4 or Vimeo).
 */
function viar_home_hero_has_video(?int $post_id = null): bool {
    return viar_get_home_hero_mp4_url($post_id) !== ''
        || viar_parse_vimeo_id(viar_get_home_hero_vimeo_url($post_id)) !== '';
}

/**
 * Whether the homepage hero plays a desktop background video (MP4 or Vimeo).
 */
function viar_home_hero_has_desktop_video(?int $post_id = null): bool {
    if (viar_get_home_hero_mp4_url($post_id) !== '') {
        return true;
    }

    return viar_get_home_hero_mp4_url($post_id) === ''
        && viar_get_home_hero_vimeo_id($post_id) !== '';
}

/**
 * Vimeo embed URL for full-bleed desktop hero videos (muted autoplay; unmute via UI).
 */
function viar_vimeo_background_embed_url(string $video_id): string {
    return add_query_arg(
        [
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
 * Vimeo player URL for the mobile popup modal.
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
 * Render a full-bleed hero background with optional MP4/Vimeo video and image fallback.
 */
function viar_render_hero_background(
    string $image_url,
    string $image_alt = '',
    string $image_class = 'w-full h-full object-cover grayscale-[20%]',
    ?int $post_id = null
): void {
    $mp4_url = viar_get_home_hero_mp4_url($post_id);
    $vimeo_id = viar_parse_vimeo_id(viar_get_home_hero_vimeo_url($post_id));
    $desktop_vimeo_id = $mp4_url === '' ? $vimeo_id : '';
    $desktop_hides_image = $mp4_url !== '' || $desktop_vimeo_id !== '';
    $image_classes = trim($image_class . ($desktop_hides_image ? ' viar-hero-bg-image--mobile-only' : ''));
    ?>
    <div class="absolute inset-0 z-0 viar-hero-background">
        <?php if ($image_url !== '') : ?>
            <img
                class="<?php echo esc_attr($image_classes); ?>"
                alt="<?php echo esc_attr($image_alt); ?>"
                src="<?php echo esc_url($image_url); ?>"
            >
        <?php endif; ?>
        <?php if ($mp4_url !== '') : ?>
            <video
                class="viar-hero-video__native viar-hero-media--desktop absolute inset-0 h-full w-full object-cover"
                data-viar-hero-native
                autoplay
                muted
                loop
                playsinline
                preload="auto"
                <?php if ($image_url !== '') : ?>
                    poster="<?php echo esc_url($image_url); ?>"
                <?php endif; ?>
            >
                <source src="<?php echo esc_url($mp4_url); ?>" type="video/mp4">
            </video>
        <?php elseif ($desktop_vimeo_id !== '') : ?>
            <div class="viar-hero-video viar-hero-media--desktop absolute inset-0 overflow-hidden">
                <iframe
                    class="viar-hero-video__iframe"
                    data-viar-hero-vimeo
                    src="<?php echo esc_url(viar_vimeo_background_embed_url($desktop_vimeo_id)); ?>"
                    title="<?php esc_attr_e('Homepage hero video', 'viar-luxury'); ?>"
                    allow="autoplay; fullscreen; picture-in-picture"
                ></iframe>
            </div>
        <?php endif; ?>
        <div class="absolute inset-0 bg-black/30 backdrop-brightness-90"></div>
    </div>
    <?php
}

/**
 * Mobile hero play button that opens the Vimeo popup.
 */
function viar_render_hero_mobile_play_button(): void {
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
                    allowfullscreen
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
