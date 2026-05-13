<?php
/**
 * BookingPress design integration.
 *
 * @package ViaR_Luxury
 */

function viar_bookingpress_css_overrides(string $css): string {
    $custom = '
.bookingpress-main-container, .bookingpress-form-wrapper { font-family: Manrope, sans-serif; }
.bookingpress-main-container .bookingpress_btn, .bookingpress-form-wrapper button { background: #C5A059 !important; border-color: #C5A059 !important; color: #00234B !important; text-transform: uppercase; letter-spacing: .08em; }
.bookingpress-main-container input, .bookingpress-main-container select, .bookingpress-main-container textarea { border-radius: 0 !important; border: 1px solid #C5A059 !important; }
';
    return $css . $custom;
}
add_filter('bookingpress_front_css', 'viar_bookingpress_css_overrides');
