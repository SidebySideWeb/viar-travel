<?php
/**
 * Theme Customizer settings for editable footer content.
 *
 * @package ViaR_Luxury
 */

function viar_customize_register(WP_Customize_Manager $wp_customize): void {
    $wp_customize->add_section('viar_homepage_hero', [
        'title' => __('ViaR Homepage Hero', 'viar-luxury'),
        'priority' => 155,
    ]);

    $wp_customize->add_setting('viar_home_hero_vimeo_url', [
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('viar_home_hero_vimeo_url', [
        'label' => __('Hero Vimeo Video URL', 'viar-luxury'),
        'description' => __('Paste a Vimeo link (e.g. https://vimeo.com/123456789). Leave empty to use the hero image only.', 'viar-luxury'),
        'section' => 'viar_homepage_hero',
        'type' => 'url',
    ]);

    $wp_customize->add_section('viar_footer_content', [
        'title' => __('ViaR Footer Content', 'viar-luxury'),
        'priority' => 160,
    ]);

    $wp_customize->add_setting('viar_logo_subtitle', [
        'default' => viar_logo_subtitle_default(),
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);
    $wp_customize->add_control('viar_logo_subtitle', [
        'label' => __('Logo Subtitle (footer & schema)', 'viar-luxury'),
        'section' => 'viar_footer_content',
        'type' => 'textarea',
    ]);

    $fields = [
        'viar_footer_phone' => ['Concierge Phone', '+30 000 000 0000'],
        'viar_footer_email' => ['Concierge Email', 'concierge@viartravel.com'],
        'viar_footer_copyright' => ['Copyright Text', '© 2024 ViaR Travel Solutions. All rights reserved.'],
        'viar_footer_tagline' => ['Footer Tagline', 'Quiet luxury, perfectly realized.'],
    ];

    foreach ($fields as $setting_id => [$label, $default]) {
        $wp_customize->add_setting($setting_id, [
            'default' => $default,
            'sanitize_callback' => 'sanitize_text_field',
        ]);

        $wp_customize->add_control($setting_id, [
            'label' => __($label, 'viar-luxury'),
            'section' => 'viar_footer_content',
            'type' => 'text',
        ]);
    }
}
add_action('customize_register', 'viar_customize_register');
