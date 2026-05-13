<?php
/**
 * Theme Customizer settings for editable footer content.
 *
 * @package ViaR_Luxury
 */

function viar_customize_register(WP_Customize_Manager $wp_customize): void {
    $wp_customize->add_section('viar_footer_content', [
        'title' => __('ViaR Footer Content', 'viar-luxury'),
        'priority' => 160,
    ]);

    $fields = [
        'viar_footer_heading' => ['Footer Heading', 'ViaR Travel Solutions'],
        'viar_footer_description' => ['Footer Description', 'Crafting bespoke itineraries for those who value time and exclusivity above all else.'],
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
