<?php
/**
 * Asset enqueue.
 *
 * @package ViaR_Luxury
 */

/**
 * Header layout CSS (inlined into main bundle so cache plugins keep it).
 */
function viar_get_layout_css(): string {
    static $css = null;

    if ($css !== null) {
        return $css;
    }

    $path = get_template_directory() . '/assets/css/layout.css';
    $css = is_readable($path) ? (string) file_get_contents($path) : '';

    return $css;
}

function viar_luxury_enqueue_assets(): void {
    $version = wp_get_theme()->get('Version');
    $typography = viar_get_typography_stylesheet_urls();

    wp_enqueue_style('viar-luxury-text-fonts', $typography['text'], [], null);
    wp_enqueue_style('viar-luxury-material-symbols', $typography['icons'], [], null);

    wp_enqueue_style('viar-luxury-main', get_template_directory_uri() . '/assets/css/style.css', [], $version);
    wp_enqueue_style('viar-luxury-icons', get_template_directory_uri() . '/assets/css/icons.css', ['viar-luxury-main'], $version);

    if (viar_page_needs_forms_styles()) {
        wp_enqueue_style('viar-luxury-forms', get_template_directory_uri() . '/assets/css/forms.css', ['viar-luxury-main'], $version);

        if (viar_page_uses_fluent_forms()) {
            wp_enqueue_style('viar-luxury-fluent-forms', get_template_directory_uri() . '/assets/css/fluent-forms.css', ['viar-luxury-forms'], $version);
        }
    }

    if (viar_page_needs_messenger_styles()) {
        wp_enqueue_style('viar-luxury-messenger-buttons', get_template_directory_uri() . '/assets/css/messenger-buttons.css', ['viar-luxury-icons'], $version);
    }

    $custom_css = '.material-symbols-outlined{font-variation-settings:"FILL" 0,"wght" 300,"GRAD" 0,"opsz" 24}.no-scrollbar::-webkit-scrollbar{display:none}.no-scrollbar{-ms-overflow-style:none;scrollbar-width:none}.viar-logo .custom-logo-link{display:inline-flex;align-items:center}.viar-logo .custom-logo{max-height:58px;width:auto;height:auto;display:block}.viar-logo--header .custom-logo{max-height:70px}.viar-logo--header>a:not(.custom-logo-link){font-size:1.8rem;line-height:1}.viar-hero-video__iframe{position:absolute;top:50%;left:50%;width:100vw;height:56.25vw;min-height:100vh;min-width:177.77vh;transform:translate(-50%,-50%);pointer-events:none;border:0}.viar-hero-video__native{pointer-events:none;object-fit:cover}@media (max-width:767px){.viar-hero-media--desktop{display:none!important}}@media (min-width:768px){.viar-hero-bg-image--mobile-only{display:none}}.viar-hero-play-btn{position:relative;display:inline-flex;align-items:center;justify-content:center;width:5.5rem;height:5.5rem;border:0;border-radius:9999px;background:rgba(197,160,89,.92);color:#00234B;cursor:pointer;transition:transform .3s ease,background-color .3s ease}.viar-hero-play-btn:hover,.viar-hero-play-btn:focus-visible{transform:scale(1.05);background:#C5A059;outline:none}.viar-hero-play-btn__icon{font-size:2.5rem;margin-left:.15rem}.viar-hero-play-btn__ring{position:absolute;inset:0;border-radius:9999px;border:1px solid rgba(197,160,89,.65);animation:viar-hero-play-pulse 2.4s ease-out infinite}.viar-hero-play-btn__ring--delayed{animation-delay:1.2s}@keyframes viar-hero-play-pulse{0%{transform:scale(1);opacity:.85}100%{transform:scale(1.8);opacity:0}}.viar-hero-video-modal{position:fixed;inset:0;z-index:100;display:flex;align-items:center;justify-content:center;padding:1.5rem}.viar-hero-video-modal[hidden]{display:none}.viar-hero-video-modal__backdrop{position:absolute;inset:0;background:rgba(0,35,75,.88)}.viar-hero-video-modal__dialog{position:relative;z-index:1;width:min(100%,56rem)}.viar-hero-video-modal__frame{position:relative;width:100%;padding-top:56.25%;background:#000;box-shadow:0 24px 80px rgba(0,0,0,.35)}.viar-hero-video-modal__iframe{position:absolute;inset:0;width:100%;height:100%;border:0}.viar-hero-video-modal__close{position:absolute;top:-3rem;right:0;display:inline-flex;align-items:center;justify-content:center;width:2.75rem;height:2.75rem;border:0;border-radius:9999px;background:rgba(255,255,255,.12);color:#fff;cursor:pointer}.viar-hero-sound-btn{position:absolute;right:1.5rem;bottom:6rem;z-index:10;align-items:center;justify-content:center;width:3rem;height:3rem;border:0;border-radius:9999px;background:rgba(0,35,75,.72);color:#fff;cursor:pointer;transition:transform .3s ease,background-color .3s ease}.viar-hero-sound-btn:hover,.viar-hero-sound-btn:focus-visible{transform:scale(1.05);background:rgba(197,160,89,.92);color:#00234B;outline:none}';
    wp_add_inline_style('viar-luxury-main', $custom_css);

    $layout_css = viar_get_layout_css();
    if ($layout_css !== '') {
        wp_add_inline_style('viar-luxury-main', $layout_css);
    }

    wp_enqueue_script('viar-luxury-navigation', get_template_directory_uri() . '/assets/js/navigation.js', [], $version, true);
    wp_enqueue_script('viar-luxury-animations', get_template_directory_uri() . '/assets/js/animations.js', [], $version, true);

    if (is_front_page() && viar_home_hero_has_desktop_video()) {
        if (viar_get_home_hero_mp4_url() === '' && viar_get_home_hero_vimeo_id() !== '') {
            wp_enqueue_script(
                'vimeo-player',
                'https://player.vimeo.com/api/player.js',
                [],
                null,
                true
            );
        }

        wp_enqueue_script(
            'viar-luxury-hero-video-desktop',
            get_template_directory_uri() . '/assets/js/hero-video-desktop.js',
            viar_get_home_hero_mp4_url() === '' && viar_get_home_hero_vimeo_id() !== ''
                ? ['vimeo-player']
                : [],
            $version,
            true
        );
    }

    if (is_front_page() && viar_get_home_hero_vimeo_id() !== '') {
        wp_enqueue_script(
            'viar-luxury-hero-video-modal',
            get_template_directory_uri() . '/assets/js/hero-video-modal.js',
            [],
            $version,
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'viar_luxury_enqueue_assets');
