<?php
/**
 * Editor guidance panel.
 *
 * @package ViaR_Luxury
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

    echo '<div class="notice notice-info"><p><strong>ViaR Editor Guide:</strong> ';
    if ($post_type === 'page') {
        echo 'Use <em>ViaR Hero Content</em>: Hero Image controls main hero visual, Card / Secondary Image controls supporting section visual (where template supports it).';
    } elseif ($post_type === 'viar_fleet') {
        echo 'Use Fleet Card Image for VIP listing cards, Fleet Hero Image for the single fleet page, and BookingPress Shortcode for the booking form.';
    } else {
        echo 'Use Tour Card Image for listings, then fill Hero & Introduction, At a Glance, Experience 1–3 (title, description, image), quote, and Inquiry CTA for the tour detail page. BookingPress shortcode is optional.';
    }
    echo '</p></div>';
}
add_action('admin_notices', 'viar_editor_help_notice');
