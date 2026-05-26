<?php
/**
 * WordPress 7 compatibility helpers.
 *
 * @package ViaR_Luxury
 */

/**
 * Minimum supported WordPress version for this theme.
 */
function viar_minimum_wp_version(): string {
    return '6.5';
}

/**
 * Warn admins when the site runs below the theme minimum.
 */
function viar_admin_wp_version_notice(): void {
    if (!current_user_can('update_core')) {
        return;
    }

    if (version_compare(get_bloginfo('version'), viar_minimum_wp_version(), '>=')) {
        return;
    }

    echo '<div class="notice notice-warning"><p>';
    echo esc_html(
        sprintf(
            'ViaR Luxury Travel requires WordPress %s or newer. Please update WordPress to avoid theme compatibility issues.',
            viar_minimum_wp_version()
        )
    );
    echo '</p></div>';
}
add_action('admin_notices', 'viar_admin_wp_version_notice');
