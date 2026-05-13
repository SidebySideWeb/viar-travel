<?php
/**
 * ACF local field groups for editable page content.
 *
 * @package ViaR_Luxury
 */

function viar_register_acf_fields(): void {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    acf_add_local_field_group([
        'key' => 'group_viar_page_hero_content',
        'title' => 'ViaR Hero Content',
        'fields' => [
            [
                'key' => 'field_viar_hero_eyebrow',
                'label' => 'Hero Eyebrow',
                'name' => 'viar_hero_eyebrow',
                'type' => 'text',
            ],
            [
                'key' => 'field_viar_hero_title',
                'label' => 'Hero Title',
                'name' => 'viar_hero_title',
                'type' => 'text',
            ],
            [
                'key' => 'field_viar_hero_description',
                'label' => 'Hero Description',
                'name' => 'viar_hero_description',
                'type' => 'textarea',
                'rows' => 3,
            ],
            [
                'key' => 'field_viar_hero_image',
                'label' => 'Hero Image',
                'name' => 'viar_hero_image',
                'type' => 'image',
                'return_format' => 'url',
                'preview_size' => 'medium',
                'library' => 'all',
            ],
            [
                'key' => 'field_viar_card_image',
                'label' => 'Card / Secondary Image',
                'name' => 'viar_card_image',
                'type' => 'image',
                'return_format' => 'url',
                'preview_size' => 'medium',
                'library' => 'all',
                'instructions' => 'Optional secondary image used by page sections/cards where supported by template.',
            ],
            [
                'key' => 'field_viar_home_tours_label',
                'label' => 'Homepage Tours Label',
                'name' => 'viar_home_tours_label',
                'type' => 'text',
            ],
            [
                'key' => 'field_viar_home_tours_title',
                'label' => 'Homepage Tours Title',
                'name' => 'viar_home_tours_title',
                'type' => 'text',
            ],
            [
                'key' => 'field_viar_home_zigzag_row1_label',
                'label' => 'Homepage Zigzag Row 1 Label',
                'name' => 'viar_home_zigzag_row1_label',
                'type' => 'text',
            ],
            [
                'key' => 'field_viar_home_zigzag_row1_title',
                'label' => 'Homepage Zigzag Row 1 Title',
                'name' => 'viar_home_zigzag_row1_title',
                'type' => 'text',
            ],
            [
                'key' => 'field_viar_home_zigzag_row1_description',
                'label' => 'Homepage Zigzag Row 1 Description',
                'name' => 'viar_home_zigzag_row1_description',
                'type' => 'textarea',
                'rows' => 4,
            ],
            [
                'key' => 'field_viar_home_zigzag_row1_cta_label',
                'label' => 'Homepage Zigzag Row 1 CTA Label',
                'name' => 'viar_home_zigzag_row1_cta_label',
                'type' => 'text',
            ],
            [
                'key' => 'field_viar_home_zigzag_row1_cta_url',
                'label' => 'Homepage Zigzag Row 1 CTA URL',
                'name' => 'viar_home_zigzag_row1_cta_url',
                'type' => 'url',
            ],
            [
                'key' => 'field_viar_home_zigzag_row1_image',
                'label' => 'Homepage Zigzag Row 1 Image',
                'name' => 'viar_home_zigzag_row1_image',
                'type' => 'image',
                'return_format' => 'url',
                'preview_size' => 'medium',
                'library' => 'all',
            ],
            [
                'key' => 'field_viar_home_zigzag_row2_label',
                'label' => 'Homepage Zigzag Row 2 Label',
                'name' => 'viar_home_zigzag_row2_label',
                'type' => 'text',
            ],
            [
                'key' => 'field_viar_home_zigzag_row2_title',
                'label' => 'Homepage Zigzag Row 2 Title',
                'name' => 'viar_home_zigzag_row2_title',
                'type' => 'text',
            ],
            [
                'key' => 'field_viar_home_zigzag_row2_description',
                'label' => 'Homepage Zigzag Row 2 Description',
                'name' => 'viar_home_zigzag_row2_description',
                'type' => 'textarea',
                'rows' => 4,
            ],
            [
                'key' => 'field_viar_home_zigzag_row2_cta_label',
                'label' => 'Homepage Zigzag Row 2 CTA Label',
                'name' => 'viar_home_zigzag_row2_cta_label',
                'type' => 'text',
            ],
            [
                'key' => 'field_viar_home_zigzag_row2_cta_url',
                'label' => 'Homepage Zigzag Row 2 CTA URL',
                'name' => 'viar_home_zigzag_row2_cta_url',
                'type' => 'url',
            ],
            [
                'key' => 'field_viar_home_zigzag_row2_image',
                'label' => 'Homepage Zigzag Row 2 Image',
                'name' => 'viar_home_zigzag_row2_image',
                'type' => 'image',
                'return_format' => 'url',
                'preview_size' => 'medium',
                'library' => 'all',
            ],
            [
                'key' => 'field_viar_home_standard_label',
                'label' => 'Homepage Standards Label',
                'name' => 'viar_home_standard_label',
                'type' => 'text',
            ],
            [
                'key' => 'field_viar_home_standard_title',
                'label' => 'Homepage Standards Title',
                'name' => 'viar_home_standard_title',
                'type' => 'text',
            ],
            [
                'key' => 'field_viar_home_standard_item1_title',
                'label' => 'Homepage Standards Item 1 Title',
                'name' => 'viar_home_standard_item1_title',
                'type' => 'text',
            ],
            [
                'key' => 'field_viar_home_standard_item1_desc',
                'label' => 'Homepage Standards Item 1 Description',
                'name' => 'viar_home_standard_item1_desc',
                'type' => 'textarea',
                'rows' => 3,
            ],
            [
                'key' => 'field_viar_home_standard_item2_title',
                'label' => 'Homepage Standards Item 2 Title',
                'name' => 'viar_home_standard_item2_title',
                'type' => 'text',
            ],
            [
                'key' => 'field_viar_home_standard_item2_desc',
                'label' => 'Homepage Standards Item 2 Description',
                'name' => 'viar_home_standard_item2_desc',
                'type' => 'textarea',
                'rows' => 3,
            ],
            [
                'key' => 'field_viar_home_standard_item3_title',
                'label' => 'Homepage Standards Item 3 Title',
                'name' => 'viar_home_standard_item3_title',
                'type' => 'text',
            ],
            [
                'key' => 'field_viar_home_standard_item3_desc',
                'label' => 'Homepage Standards Item 3 Description',
                'name' => 'viar_home_standard_item3_desc',
                'type' => 'textarea',
                'rows' => 3,
            ],
            [
                'key' => 'field_viar_home_testimonials_label',
                'label' => 'Homepage Testimonials Label',
                'name' => 'viar_home_testimonials_label',
                'type' => 'text',
            ],
            [
                'key' => 'field_viar_home_testimonials_title',
                'label' => 'Homepage Testimonials Title',
                'name' => 'viar_home_testimonials_title',
                'type' => 'text',
            ],
            [
                'key' => 'field_viar_home_testimonial_1_quote',
                'label' => 'Homepage Testimonial 1 Quote',
                'name' => 'viar_home_testimonial_1_quote',
                'type' => 'textarea',
                'rows' => 3,
            ],
            [
                'key' => 'field_viar_home_testimonial_1_author',
                'label' => 'Homepage Testimonial 1 Author',
                'name' => 'viar_home_testimonial_1_author',
                'type' => 'text',
            ],
            [
                'key' => 'field_viar_home_testimonial_2_quote',
                'label' => 'Homepage Testimonial 2 Quote',
                'name' => 'viar_home_testimonial_2_quote',
                'type' => 'textarea',
                'rows' => 3,
            ],
            [
                'key' => 'field_viar_home_testimonial_2_author',
                'label' => 'Homepage Testimonial 2 Author',
                'name' => 'viar_home_testimonial_2_author',
                'type' => 'text',
            ],
            [
                'key' => 'field_viar_hero_cta_label',
                'label' => 'Hero CTA Label',
                'name' => 'viar_hero_cta_label',
                'type' => 'text',
            ],
            [
                'key' => 'field_viar_hero_cta_url',
                'label' => 'Hero CTA URL',
                'name' => 'viar_hero_cta_url',
                'type' => 'url',
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                ],
            ],
        ],
        'style' => 'default',
        'position' => 'normal',
    ]);

    acf_add_local_field_group([
        'key' => 'group_viar_fleet_booking',
        'title' => 'ViaR Fleet Booking Content',
        'fields' => [
            [
                'key' => 'field_viar_fleet_subtitle',
                'label' => 'Fleet Subtitle',
                'name' => 'viar_fleet_subtitle',
                'type' => 'text',
            ],
            [
                'key' => 'field_viar_fleet_title',
                'label' => 'Fleet Title',
                'name' => 'viar_fleet_title',
                'type' => 'text',
            ],
            [
                'key' => 'field_viar_fleet_description',
                'label' => 'Fleet Description',
                'name' => 'viar_fleet_description',
                'type' => 'textarea',
                'rows' => 4,
            ],
            [
                'key' => 'field_viar_fleet_image',
                'label' => 'Fleet Image URL',
                'name' => 'viar_fleet_image',
                'type' => 'url',
            ],
            [
                'key' => 'field_viar_fleet_booking_shortcode',
                'label' => 'BookingPress Shortcode',
                'name' => 'viar_fleet_booking_shortcode',
                'type' => 'text',
                'instructions' => 'Example: [bookingpress_form service_id=\"1\"]',
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'templates/page-fleet-booking.php',
                ],
            ],
        ],
        'style' => 'default',
        'position' => 'normal',
    ]);

    acf_add_local_field_group([
        'key' => 'group_viar_fleet_post_fields',
        'title' => 'ViaR Fleet Post Fields',
        'fields' => [
            [
                'key' => 'field_viar_fleet_card_label',
                'label' => 'Fleet Card Label',
                'name' => 'viar_fleet_card_label',
                'type' => 'text',
                'instructions' => 'Small text shown on VIP Transfers listing card.',
            ],
            [
                'key' => 'field_viar_fleet_card_image',
                'label' => 'Fleet Card Image',
                'name' => 'viar_fleet_card_image',
                'type' => 'image',
                'return_format' => 'url',
                'preview_size' => 'medium',
                'library' => 'all',
            ],
            [
                'key' => 'field_viar_fleet_hero_image',
                'label' => 'Fleet Hero Image (Single Page)',
                'name' => 'viar_fleet_hero_image',
                'type' => 'image',
                'return_format' => 'url',
                'preview_size' => 'medium',
                'library' => 'all',
            ],
            [
                'key' => 'field_viar_fleet_booking_shortcode_post',
                'label' => 'BookingPress Shortcode',
                'name' => 'viar_fleet_booking_shortcode',
                'type' => 'text',
                'instructions' => 'Example: [bookingpress_form service_id="1"]',
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'viar_fleet',
                ],
            ],
        ],
        'style' => 'default',
        'position' => 'normal',
    ]);

    acf_add_local_field_group([
        'key' => 'group_viar_tour_post_fields',
        'title' => 'ViaR Bespoke Tour Fields',
        'fields' => [
            [
                'key' => 'field_viar_tour_booking_shortcode',
                'label' => 'BookingPress Shortcode',
                'name' => 'viar_tour_booking_shortcode',
                'type' => 'text',
                'instructions' => 'Example: [bookingpress_form service_id="2"]',
            ],
            [
                'key' => 'field_viar_tour_card_image',
                'label' => 'Tour Card Image',
                'name' => 'viar_tour_card_image',
                'type' => 'image',
                'return_format' => 'url',
                'preview_size' => 'medium',
                'library' => 'all',
            ],
            [
                'key' => 'field_viar_tour_hero_image',
                'label' => 'Tour Hero Image (Single Page)',
                'name' => 'viar_tour_hero_image',
                'type' => 'image',
                'return_format' => 'url',
                'preview_size' => 'medium',
                'library' => 'all',
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'viar_bespoke_tour',
                ],
            ],
        ],
        'style' => 'default',
        'position' => 'normal',
    ]);
}
add_action('acf/init', 'viar_register_acf_fields');
