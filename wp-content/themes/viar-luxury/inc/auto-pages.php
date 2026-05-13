<?php
/**
 * Auto-Create WordPress Pages on Theme Activation.
 *
 * @package ViaR_Luxury
 */

function viar_create_all_pages(): void {
    if (get_option('viar_pages_created')) {
        return;
    }

    $pages = [
        ['title' => 'Home', 'slug' => 'home', 'template' => ''],
        ['title' => 'About Us', 'slug' => 'about', 'template' => 'templates/page-about.php'],
        ['title' => 'Transfer Availability', 'slug' => 'availability-results', 'template' => 'templates/page-availability-results.php'],
        ['title' => 'Bespoke Tours', 'slug' => 'bespoke-tours', 'template' => 'templates/page-tours.php'],
        ['title' => 'Availability Request', 'slug' => 'check-availability', 'template' => 'templates/page-check-availability.php'],
        ['title' => 'Private Client Access', 'slug' => 'client-access', 'template' => 'templates/page-client-access.php'],
        ['title' => 'Client Transfer Dashboard', 'slug' => 'client-dashboard-vip-transfers', 'template' => 'templates/page-client-dashboard-vip-transfers.php'],
        ['title' => 'Contact', 'slug' => 'contact', 'template' => 'templates/page-contact.php'],
        ['title' => 'Edit Transfer Details', 'slug' => 'edit-transfer-details', 'template' => 'templates/page-edit-transfer-details.php'],
        ['title' => 'Inquiry', 'slug' => 'inquiry', 'template' => 'templates/page-inquiry.php'],
        ['title' => 'Modify Journey', 'slug' => 'modify-journey-greek-aesthetic', 'template' => 'templates/page-modify-journey-greek-aesthetic.php'],
        ['title' => 'Our Story & Philosophy', 'slug' => 'our-story-philosophy', 'template' => 'templates/page-our-story-philosophy.php'],
        ['title' => 'Payment Confirmation', 'slug' => 'payment-confirmation', 'template' => 'templates/page-payment-confirmation.php'],
        ['title' => 'Secure Booking Checkout', 'slug' => 'secure-booking', 'template' => 'templates/page-secure-booking.php'],
        ['title' => 'VIP Concierge Dashboard', 'slug' => 'vip-dashboard-greek-aesthetic', 'template' => 'templates/page-vip-dashboard-greek-aesthetic.php'],
        ['title' => 'VIP Transfer Dashboard', 'slug' => 'vip-dashboard-transfers-only', 'template' => 'templates/page-vip-dashboard-transfers-only.php'],
        ['title' => 'VIP Transfers', 'slug' => 'vip-transfers', 'template' => 'templates/page-vip-transfers-services.php'],
        ['title' => 'VIP Transfer Services', 'slug' => 'vip-transfers-services', 'template' => 'templates/page-vip-transfers-services.php'],
    ];

    $created_pages = [];

    foreach ($pages as $page) {
        $existing_page = get_page_by_path($page['slug']);
        if (!$existing_page) {
            $page_id = wp_insert_post([
                'post_title' => $page['title'],
                'post_name' => $page['slug'],
                'post_status' => 'publish',
                'post_type' => 'page',
                'post_content' => '',
            ]);

            if (!empty($page['template']) && !is_wp_error($page_id)) {
                update_post_meta($page_id, '_wp_page_template', $page['template']);
            }

            if (!is_wp_error($page_id)) {
                $created_pages[$page['slug']] = $page_id;
            }
        } else {
            $created_pages[$page['slug']] = $existing_page->ID;
            if (!empty($page['template'])) {
                update_post_meta($existing_page->ID, '_wp_page_template', $page['template']);
            }
        }

        if (!empty($page['parent_slug']) && isset($created_pages[$page['slug']], $created_pages[$page['parent_slug']])) {
            wp_update_post([
                'ID' => $created_pages[$page['slug']],
                'post_parent' => $created_pages[$page['parent_slug']],
            ]);
        }

        if (!empty($page['meta']) && isset($created_pages[$page['slug']])) {
            foreach ($page['meta'] as $meta_key => $meta_value) {
                update_post_meta($created_pages[$page['slug']], $meta_key, $meta_value);
            }
        }
    }

    if (isset($created_pages['home'])) {
        update_option('page_on_front', $created_pages['home']);
        update_option('show_on_front', 'page');
    }

    viar_create_menus($created_pages);

    update_option('viar_pages_created', true);
    update_option('viar_page_ids', $created_pages);
}

function viar_create_menus(array $page_ids): void {
    $menus = [
        'primary' => [
            'name' => 'Primary Menu',
            'items' => [
                ['slug' => 'home', 'title' => 'Home'],
                ['slug' => 'bespoke-tours', 'title' => 'Bespoke Tours'],
                ['slug' => 'vip-transfers', 'title' => 'VIP Transfers'],
                ['slug' => 'about', 'title' => 'About'],
                ['slug' => 'contact', 'title' => 'Contact'],
            ],
        ],
        'client_portal' => [
            'name' => 'Client Portal Menu',
            'items' => [
                ['slug' => 'client-access', 'title' => 'Portal Access'],
                ['slug' => 'client-dashboard-vip-transfers', 'title' => 'Dashboard'],
                ['slug' => 'availability-results', 'title' => 'Availability'],
                ['slug' => 'check-availability', 'title' => 'Request Availability'],
                ['slug' => 'modify-journey-greek-aesthetic', 'title' => 'Modify Journey'],
            ],
        ],
        'legal' => [
            'name' => 'Legal Menu',
            'items' => [
                ['slug' => 'secure-booking', 'title' => 'Booking Terms'],
                ['slug' => 'payment-confirmation', 'title' => 'Payment Confirmation'],
                ['slug' => 'contact', 'title' => 'Contact Concierge'],
            ],
        ],
        'footer' => [
            'name' => 'Footer Menu',
            'items' => [
                ['slug' => 'bespoke-tours', 'title' => 'Bespoke Tours'],
                ['slug' => 'vip-transfers', 'title' => 'VIP Transfers'],
                ['slug' => 'about', 'title' => 'About'],
                ['slug' => 'contact', 'title' => 'Contact'],
            ],
        ],
    ];

    $locations = get_theme_mod('nav_menu_locations');
    $locations = is_array($locations) ? $locations : [];

    foreach ($menus as $location => $config) {
        $menu = wp_get_nav_menu_object($config['name']);
        $menu_id = $menu ? (int) $menu->term_id : 0;

        if (!$menu_id) {
            $menu_id = wp_create_nav_menu($config['name']);
            foreach ($config['items'] as $item) {
                if (!isset($page_ids[$item['slug']])) {
                    continue;
                }

                wp_update_nav_menu_item($menu_id, 0, [
                    'menu-item-title' => $item['title'],
                    'menu-item-object-id' => $page_ids[$item['slug']],
                    'menu-item-object' => 'page',
                    'menu-item-type' => 'post_type',
                    'menu-item-status' => 'publish',
                ]);
            }
        }

        if ($menu_id) {
            $locations[$location] = $menu_id;
        }
    }

    set_theme_mod('nav_menu_locations', $locations);
}

add_action('after_switch_theme', 'viar_create_all_pages');

/**
 * Run lightweight schema migrations for page map changes.
 */
function viar_maybe_migrate_page_schema(): void {
    $current_version = get_option('viar_pages_schema_version', '1.0');
    $target_version = '3.0';

    if (version_compare((string) $current_version, $target_version, '>=')) {
        return;
    }

    delete_option('viar_pages_created');
    viar_create_all_pages();
    update_option('viar_pages_schema_version', $target_version);
}
add_action('init', 'viar_maybe_migrate_page_schema');

/**
 * Ensure key menus stay assigned after schema/theme changes.
 */
function viar_ensure_required_menus(): void {
    $locations = get_theme_mod('nav_menu_locations');
    $locations = is_array($locations) ? $locations : [];

    $required_locations = ['primary', 'client_portal', 'legal', 'footer'];
    $missing = false;
    foreach ($required_locations as $location) {
        if (empty($locations[$location])) {
            $missing = true;
            break;
        }
    }

    if (!$missing) {
        return;
    }

    $page_ids = get_option('viar_page_ids', []);
    if (is_array($page_ids) && !empty($page_ids)) {
        viar_create_menus($page_ids);
    }
}
add_action('init', 'viar_ensure_required_menus', 40);
