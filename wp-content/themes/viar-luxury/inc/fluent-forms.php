<?php
/**
 * Fluent Forms integration.
 *
 * @package ViaR_Luxury
 */

/**
 * Anchor ID for the VIP transfer request form on the VIP Transfers page.
 */
function viar_vip_transfer_form_anchor(): string {
    return 'vip-transfer-request';
}

/**
 * VIP Transfers page URL.
 */
function viar_vip_transfer_page_url(): string {
    return home_url('/vip-transfers/');
}

/**
 * VIP transfer request form URL with page anchor.
 */
function viar_vip_transfer_form_url(): string {
    return viar_vip_transfer_page_url() . '#' . viar_vip_transfer_form_anchor();
}

/**
 * Form href for the current page (same-page anchor) or full URL elsewhere.
 */
function viar_vip_transfer_form_href(?bool $same_page = null): string {
    if ($same_page === null) {
        $same_page = is_page(['vip-transfers', 'vip-transfers-services']);
    }

    return $same_page ? '#' . viar_vip_transfer_form_anchor() : viar_vip_transfer_form_url();
}

/**
 * Escape a VIP transfer form href (fragment or full URL).
 */
function viar_esc_vip_transfer_href(string $href): string {
    if (str_starts_with($href, '#')) {
        return esc_attr($href);
    }

    return esc_url($href);
}

/**
 * Fluent Forms shortcode for the VIP transfer request form.
 */
function viar_vip_transfer_form_shortcode(): string {
    $form_id = (int) apply_filters('viar_vip_transfer_fluentform_id', 3);

    return '[fluentform id="' . $form_id . '"]';
}

/**
 * Render the VIP transfer Fluent Form and messenger buttons.
 */
function viar_render_vip_transfer_form(): void {
    if (!shortcode_exists('fluentform')) {
        echo '<p class="font-body-md text-[#00234B]/70">' . esc_html__('The transfer request form is temporarily unavailable. Please contact us directly.', 'viar-luxury') . '</p>';
        return;
    }

    echo '<div class="viar-fluent-form">';
    echo do_shortcode(viar_vip_transfer_form_shortcode()); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    viar_render_messenger_buttons(['context' => 'form']);
    echo '</div>';
}

/**
 * Anchor ID for the tour booking form on bespoke tour singles.
 */
function viar_tour_booking_form_anchor(): string {
    return 'tour-booking-request';
}

/**
 * Tour booking form href for a bespoke tour (same-page anchor or full URL).
 */
function viar_tour_booking_form_href(?int $post_id = null): string {
    $post_id = $post_id ?: get_the_ID();

    if ($post_id > 0 && is_single($post_id)) {
        return '#' . viar_tour_booking_form_anchor();
    }

    if ($post_id > 0) {
        return get_permalink($post_id) . '#' . viar_tour_booking_form_anchor();
    }

    return '#' . viar_tour_booking_form_anchor();
}

/**
 * Fluent Forms shortcode for the contact page form.
 */
function viar_contact_form_shortcode(): string {
    $form_id = (int) apply_filters('viar_contact_fluentform_id', 1);

    return '[fluentform id="' . $form_id . '"]';
}

/**
 * Render the contact page Fluent Form.
 */
function viar_render_contact_form(): void {
    if (!shortcode_exists('fluentform')) {
        echo '<p class="font-body-md text-[#00234B]/70">' . esc_html__('The contact form is temporarily unavailable. Please email us directly.', 'viar-luxury') . '</p>';
        return;
    }

    echo '<div class="viar-fluent-form">';
    echo do_shortcode(viar_contact_form_shortcode()); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    echo '</div>';
}

/**
 * Fluent Forms shortcode for the bespoke tour booking form.
 */
function viar_tour_booking_form_shortcode(): string {
    $form_id = (int) apply_filters('viar_tour_booking_fluentform_id', 4);

    return '[fluentform id="' . $form_id . '"]';
}

/**
 * Render the tour booking Fluent Form.
 *
 * Must run in the context of the tour post so {embed_post.post_title} resolves.
 */
function viar_render_tour_booking_form(?int $post_id = null): void {
    if (!shortcode_exists('fluentform')) {
        echo '<p class="font-body-md text-[#00234B]/70">' . esc_html__('The booking form is temporarily unavailable. Please contact us directly.', 'viar-luxury') . '</p>';
        return;
    }

    $post_id = $post_id ?: get_the_ID();
    $restore_post = null;

    if ($post_id > 0 && (int) get_the_ID() !== $post_id) {
        $restore_post = $GLOBALS['post'] ?? null;
        $GLOBALS['post'] = get_post($post_id); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
        setup_postdata($GLOBALS['post']);
    }

    echo '<div class="viar-fluent-form">';
    echo do_shortcode(viar_tour_booking_form_shortcode()); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    echo '</div>';

    if ($restore_post instanceof WP_Post) {
        $GLOBALS['post'] = $restore_post; // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
        setup_postdata($restore_post);
    } elseif ($restore_post === null && $post_id > 0 && (int) get_the_ID() !== $post_id) {
        wp_reset_postdata();
    }
}

/**
 * Resolve the inquiry CTA URL for a tour (defaults to on-page booking form).
 */
function viar_tour_inquiry_cta_url(int $post_id): string {
    $booking_href = viar_tour_booking_form_href($post_id);
    $saved_cta_url = viar_field_value('viar_tour_cta_url', '', $post_id);

    if ($saved_cta_url === '') {
        return $booking_href;
    }

    $legacy_inquiry_urls = array_filter([
        home_url('/inquiry'),
        home_url('/inquiry/'),
    ]);

    if (in_array(untrailingslashit($saved_cta_url), array_map('untrailingslashit', $legacy_inquiry_urls), true)) {
        return $booking_href;
    }

    return $saved_cta_url;
}

/**
 * Google Maps API key for Places Autocomplete on transfer forms.
 */
function viar_google_maps_api_key(): string {
    if (!defined('VIAR_GOOGLE_MAPS_API_KEY')) {
        return (string) apply_filters('viar_google_maps_api_key', '');
    }

    $key = VIAR_GOOGLE_MAPS_API_KEY;

    return (string) apply_filters('viar_google_maps_api_key', is_string($key) ? trim($key) : '');
}

