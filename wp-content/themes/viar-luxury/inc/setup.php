<?php
/**
 * Theme setup.
 *
 * @package ViaR_Luxury
 */

function viar_luxury_setup(): void {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script']);
    add_theme_support('responsive-embeds');
    add_theme_support('align-wide');
    add_theme_support('editor-styles');
    add_theme_support('custom-logo', [
        'height' => 120,
        'width' => 360,
        'flex-height' => true,
        'flex-width' => true,
        'unlink-homepage-logo' => false,
    ]);

    register_nav_menus([
        'primary' => __('Primary Menu', 'viar-luxury'),
        'client_portal' => __('Client Portal Menu', 'viar-luxury'),
        'legal' => __('Legal Menu', 'viar-luxury'),
        'footer' => __('Footer Menu', 'viar-luxury'),
    ]);
}
add_action('after_setup_theme', 'viar_luxury_setup');
