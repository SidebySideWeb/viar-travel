<?php
/**
 * Access control for private client pages.
 *
 * @package ViaR_Luxury
 */

/**
 * Redirect guests away from private portal pages.
 */
function viar_restrict_private_pages(): void {
    if (is_admin() || wp_doing_ajax() || !is_page()) {
        return;
    }

    $private_slugs = [
        'availability-results',
        'check-availability',
        'client-dashboard-vip-transfers',
        'edit-transfer-details',
        'modify-journey-greek-aesthetic',
        'payment-confirmation',
        'secure-booking',
        'vip-dashboard-greek-aesthetic',
        'vip-dashboard-transfers-only',
    ];

    if (!is_user_logged_in() && is_page($private_slugs)) {
        wp_safe_redirect(home_url('/client-access'));
        exit;
    }

    if (is_user_logged_in() && is_page('client-access')) {
        wp_safe_redirect(home_url('/client-dashboard-vip-transfers'));
        exit;
    }
}
add_action('template_redirect', 'viar_restrict_private_pages');
