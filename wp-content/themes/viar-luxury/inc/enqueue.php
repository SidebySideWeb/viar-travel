<?php
/**
 * Asset enqueue.
 *
 * @package ViaR_Luxury
 */

function viar_luxury_enqueue_assets(): void {
    $version = wp_get_theme()->get('Version');

    wp_enqueue_style(
        'viar-luxury-google-fonts',
        'https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,400;1,400&family=Manrope:wght@400;500;600&display=swap',
        [],
        null
    );
    wp_enqueue_style(
        'viar-luxury-material-symbols',
        'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap',
        [],
        null
    );

    wp_enqueue_style('viar-luxury-main', get_template_directory_uri() . '/assets/css/style.css', [], $version);
    wp_enqueue_style('viar-luxury-layout', get_template_directory_uri() . '/assets/css/layout.css', ['viar-luxury-main'], $version);
    wp_enqueue_style('viar-luxury-forms', get_template_directory_uri() . '/assets/css/forms.css', ['viar-luxury-main', 'viar-luxury-layout'], $version);
    wp_enqueue_style('viar-luxury-bookingpress', get_template_directory_uri() . '/assets/css/bookingpress.css', ['viar-luxury-main', 'viar-luxury-forms'], $version);

    $custom_css = '.material-symbols-outlined{font-variation-settings:"FILL" 0,"wght" 300,"GRAD" 0,"opsz" 24}.no-scrollbar::-webkit-scrollbar{display:none}.no-scrollbar{-ms-overflow-style:none;scrollbar-width:none}.viar-logo .custom-logo-link{display:inline-flex;align-items:center}.viar-logo .custom-logo{max-height:58px;width:auto;height:auto;display:block}.viar-hero-video__iframe{position:absolute;top:50%;left:50%;width:100vw;height:56.25vw;min-height:100vh;min-width:177.77vh;transform:translate(-50%,-50%);pointer-events:none;border:0}.viar-hero-video__native{pointer-events:none;object-fit:cover}';
    wp_add_inline_style('viar-luxury-main', $custom_css);

    wp_enqueue_script('viar-luxury-navigation', get_template_directory_uri() . '/assets/js/navigation.js', [], $version, true);
    wp_enqueue_script('viar-luxury-animations', get_template_directory_uri() . '/assets/js/animations.js', [], $version, true);
}
add_action('wp_enqueue_scripts', 'viar_luxury_enqueue_assets');
