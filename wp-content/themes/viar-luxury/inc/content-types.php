<?php
/**
 * Custom post types and taxonomies.
 *
 * @package ViaR_Luxury
 */

function viar_register_content_types(): void {
    register_post_type('viar_fleet', [
        'labels' => [
            'name' => __('Fleets', 'viar-luxury'),
            'singular_name' => __('Fleet', 'viar-luxury'),
            'add_new_item' => __('Add New Fleet', 'viar-luxury'),
            'edit_item' => __('Edit Fleet', 'viar-luxury'),
        ],
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-car',
        'show_in_rest' => true,
        'rewrite' => ['slug' => 'fleet'],
        'supports' => ['title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'],
    ]);

    register_post_type('viar_bespoke_tour', [
        'labels' => [
            'name' => __('Bespoke Tours', 'viar-luxury'),
            'singular_name' => __('Bespoke Tour', 'viar-luxury'),
            'add_new_item' => __('Add New Bespoke Tour', 'viar-luxury'),
            'edit_item' => __('Edit Bespoke Tour', 'viar-luxury'),
        ],
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-palmtree',
        'show_in_rest' => true,
        'rewrite' => ['slug' => 'tour'],
        'supports' => ['title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'],
    ]);

    register_taxonomy('viar_tour_region', ['viar_bespoke_tour'], [
        'labels' => [
            'name' => __('Regions', 'viar-luxury'),
            'singular_name' => __('Region', 'viar-luxury'),
        ],
        'public' => true,
        'hierarchical' => true,
        'show_in_rest' => true,
        'rewrite' => ['slug' => 'tour-region'],
    ]);

    register_taxonomy('viar_tour_experience_type', ['viar_bespoke_tour'], [
        'labels' => [
            'name' => __('Experience Types', 'viar-luxury'),
            'singular_name' => __('Experience Type', 'viar-luxury'),
        ],
        'public' => true,
        'hierarchical' => true,
        'show_in_rest' => true,
        'rewrite' => ['slug' => 'tour-experience'],
    ]);
}
add_action('init', 'viar_register_content_types');

function viar_flush_rewrites_on_theme_switch(): void {
    viar_register_content_types();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'viar_flush_rewrites_on_theme_switch');

function viar_maybe_flush_rewrites(): void {
    $version = get_option('viar_content_types_version', '1.0');
    $target = '2.0';

    if (version_compare((string) $version, $target, '>=')) {
        return;
    }

    flush_rewrite_rules(false);
    update_option('viar_content_types_version', $target);
}
add_action('init', 'viar_maybe_flush_rewrites', 30);
