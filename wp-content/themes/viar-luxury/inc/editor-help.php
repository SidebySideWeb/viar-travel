<?php
/**
 * Editor guidance panel.
 *
 * @package ViaR_Luxury
 */

/**
 * Build editor guidance copy for supported post types.
 */
function viar_editor_help_message(string $post_type): string {
    if ($post_type === 'page') {
        return 'ViaR Editor Guide: Use ViaR Hero Content. Hero Image controls the main hero visual; Card / Secondary Image controls supporting section visuals where the template supports them. Keep the page editor empty to use the designed layout.';
    }

    if ($post_type === 'viar_fleet') {
        return 'ViaR Editor Guide: Use Fleet Card Image for VIP listing cards and Fleet Hero Image for the single fleet page. Transfer requests use the Fluent Form on the VIP Transfers page.';
    }

    return 'ViaR Editor Guide: Use Tour Card Image for listings, then fill Hero & Introduction, At a Glance, Experience 1–3 (title, description, image), quote, and Inquiry CTA for the tour detail page.';
}

/**
 * Classic edit screen notice (fallback for non-block contexts).
 */
function viar_editor_help_notice(): void {
    $screen = get_current_screen();
    if (!$screen || !in_array($screen->base, ['post', 'post-new'], true)) {
        return;
    }

    $post_type = $screen->post_type;
    if (!in_array($post_type, ['page', 'viar_fleet', 'viar_bespoke_tour'], true)) {
        return;
    }

    echo '<div class="notice notice-info"><p><strong>';
    echo esc_html(viar_editor_help_message($post_type));
    echo '</strong></p></div>';
}
add_action('admin_notices', 'viar_editor_help_notice');

/**
 * Block editor notice for WordPress 7 iframed editor.
 */
function viar_enqueue_block_editor_help(): void {
    $screen = function_exists('get_current_screen') ? get_current_screen() : null;
    if (!$screen || !in_array($screen->post_type, ['page', 'viar_fleet', 'viar_bespoke_tour'], true)) {
        return;
    }

    $message = viar_editor_help_message((string) $screen->post_type);
    $script = sprintf(
        'wp.domReady(function(){if(window.wp&&wp.data&&wp.data.dispatch){wp.data.dispatch("core/notices").createNotice("info",%s,{isDismissible:true});}});',
        wp_json_encode($message)
    );

    wp_add_inline_script('wp-edit-post', $script);
}
add_action('enqueue_block_editor_assets', 'viar_enqueue_block_editor_help');
