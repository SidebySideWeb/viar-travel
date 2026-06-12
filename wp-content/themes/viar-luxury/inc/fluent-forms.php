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
