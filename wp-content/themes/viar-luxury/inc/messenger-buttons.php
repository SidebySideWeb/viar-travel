<?php
/**
 * WhatsApp and Viber contact buttons.
 *
 * @package ViaR_Luxury
 */

/**
 * Sanitize a phone number to digits only.
 */
function viar_messenger_phone_digits(string $phone): string {
    return preg_replace('/[^0-9]/', '', $phone);
}

/**
 * Configured WhatsApp number (falls back to footer phone).
 */
function viar_get_whatsapp_number(): string {
    $number = get_theme_mod('viar_whatsapp_number', '');
    if (is_string($number) && trim($number) !== '') {
        return trim($number);
    }

    $footer_phone = get_theme_mod('viar_footer_phone', '');
    return is_string($footer_phone) ? trim($footer_phone) : '';
}

/**
 * Configured Viber number or link (falls back to footer phone).
 */
function viar_get_viber_contact(): string {
    $contact = get_theme_mod('viar_viber_number', '');
    if (is_string($contact) && trim($contact) !== '') {
        return trim($contact);
    }

    $footer_phone = get_theme_mod('viar_footer_phone', '');
    return is_string($footer_phone) ? trim($footer_phone) : '';
}

/**
 * WhatsApp chat URL.
 */
function viar_get_whatsapp_url(): string {
    $digits = viar_messenger_phone_digits(viar_get_whatsapp_number());
    if ($digits === '') {
        return '';
    }

    return 'https://wa.me/' . $digits;
}

/**
 * Viber chat URL.
 */
function viar_get_viber_url(): string {
    $contact = viar_get_viber_contact();
    if ($contact === '') {
        return '';
    }

    if (preg_match('/^viber:\/\//i', $contact) || preg_match('/^https?:\/\//i', $contact)) {
        return esc_url($contact);
    }

    $digits = viar_messenger_phone_digits($contact);
    if ($digits === '') {
        return '';
    }

    return 'viber://chat?number=%2B' . $digits;
}

/**
 * Whether at least one messenger link is available.
 */
function viar_has_messenger_buttons(): bool {
    return viar_get_whatsapp_url() !== '' || viar_get_viber_url() !== '';
}

/**
 * Render WhatsApp and Viber buttons.
 *
 * @param array<string, mixed> $args {
 *     @type string $context Optional layout context: form, footer.
 * }
 */
function viar_render_messenger_buttons(array $args = []): void {
    if (!viar_has_messenger_buttons()) {
        return;
    }

    $context = isset($args['context']) && is_string($args['context']) ? $args['context'] : 'form';

    get_template_part('parts/messenger-buttons', null, [
        'context' => $context,
        'whatsapp_url' => viar_get_whatsapp_url(),
        'viber_url' => viar_get_viber_url(),
    ]);
}

/**
 * Append messenger buttons below WPForms submit areas.
 *
 * @param array<string, mixed> $form_data Form configuration.
 * @param string               $button    Button type.
 */
function viar_wpforms_messenger_buttons($form_data, string $button): void {
    if ($button !== 'submit') {
        return;
    }

    viar_render_messenger_buttons(['context' => 'form']);
}
add_action('wpforms_display_submit_after', 'viar_wpforms_messenger_buttons', 20, 2);
