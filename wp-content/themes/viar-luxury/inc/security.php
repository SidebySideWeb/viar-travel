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

/**
 * Recommended CSP-Report-Only policy for Cloudflare / hosting configuration.
 *
 * The live site currently reports violations for a policy like:
 *   script-src 'unsafe-inline' 'unsafe-eval'
 *   connect-src 'none'
 * That policy is too strict (no 'self', no analytics hosts) and is not set by the theme.
 * Update or remove it in Cloudflare before switching CSP to enforce mode.
 *
 * @return string
 */
function viar_get_recommended_csp_report_only(): string {
    $directives = [
        "default-src 'self'",
        "script-src 'self' 'unsafe-inline' 'unsafe-eval' https://www.googletagmanager.com https://www.google.com https://www.gstatic.com https://maps.googleapis.com",
        "style-src 'self' 'unsafe-inline'",
        "img-src 'self' data: blob: https:",
        "font-src 'self' data:",
        "connect-src 'self' https://www.google-analytics.com https://*.google-analytics.com https://region1.google-analytics.com https://www.googletagmanager.com https://www.google.com https://maps.googleapis.com",
        "frame-src 'self' https://www.googletagmanager.com https://www.google.com https://www.recaptcha.net",
        "worker-src 'self' blob:",
        "object-src 'none'",
        "base-uri 'self'",
        "frame-ancestors 'self'",
    ];

    return (string) apply_filters('viar_recommended_csp_report_only', implode('; ', $directives));
}

/**
 * Optionally send a corrected CSP-Report-Only header from WordPress.
 * Enable with `define('VIAR_CSP_REPORT_ONLY', true);` in wp-config.php only after
 * removing any conflicting Cloudflare CSP transform rule.
 */
function viar_maybe_send_csp_report_only_header(): void {
    if (
        is_admin()
        || (defined('REST_REQUEST') && REST_REQUEST)
        || !defined('VIAR_CSP_REPORT_ONLY')
        || !VIAR_CSP_REPORT_ONLY
    ) {
        return;
    }

    header('Content-Security-Policy-Report-Only: ' . viar_get_recommended_csp_report_only());
}
add_action('send_headers', 'viar_maybe_send_csp_report_only_header', 0);
