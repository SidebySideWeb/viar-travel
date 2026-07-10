<?php
/**
 * Conditional asset loading helpers.
 *
 * @package ViaR_Luxury
 */

/**
 * Page templates that render a Fluent Form.
 *
 * @return string[]
 */
function viar_fluent_form_page_templates(): array {
    return [
        'templates/page-vip-transfers-services.php',
        'templates/page-transfers.php',
        'templates/page-fleet-booking.php',
        'templates/page-contact.php',
    ];
}

/**
 * Whether the current view renders a Fluent Form.
 */
function viar_page_uses_fluent_forms(): bool {
    if (is_admin()) {
        return false;
    }

    if (is_singular(['viar_fleet', 'viar_bespoke_tour'])) {
        return true;
    }

    foreach (viar_fluent_form_page_templates() as $template) {
        if (is_page_template($template)) {
            return true;
        }
    }

    return (bool) apply_filters('viar_page_uses_fluent_forms', false);
}

/**
 * Whether the current view needs theme forms.css.
 */
function viar_page_needs_forms_styles(): bool {
    if (viar_page_uses_fluent_forms()) {
        return true;
    }

    if (is_page_template('templates/page-tours.php')) {
        return true;
    }

    return (bool) apply_filters('viar_page_needs_forms_styles', false);
}

/**
 * Whether messenger button styles should load.
 */
function viar_page_needs_messenger_styles(): bool {
    return viar_has_messenger_buttons();
}

/**
 * Typography stylesheet URLs (text + icon fonts).
 *
 * Override via `viar_typography_stylesheet_urls` for self-hosted fonts.
 *
 * @return array{text: string, icons: string}
 */
/**
 * Critical Material Symbols CSS (inlined into main bundle so CDN/file cache cannot break icons).
 */
function viar_get_icon_font_css(): string {
    $font_url = get_template_directory_uri() . '/assets/fonts/material-symbols-outlined.woff2';

    return "@font-face{font-family:'Material Symbols Outlined';font-style:normal;font-weight:100 700;font-display:swap;src:url({$font_url}) format('woff2');}"
        . ".material-symbols-outlined{font-family:'Material Symbols Outlined';font-weight:normal;font-style:normal;font-size:24px;line-height:1;letter-spacing:normal;text-transform:none;display:inline-block;white-space:nowrap;word-wrap:normal;direction:ltr;font-feature-settings:'liga';-webkit-font-feature-settings:'liga';-webkit-font-smoothing:antialiased;font-variation-settings:'FILL' 0,'wght' 300,'GRAD' 0,'opsz' 24;}";
}

function viar_get_typography_stylesheet_urls(): array {
    $theme_uri = get_template_directory_uri();
    $defaults = [
        'text' => $theme_uri . '/assets/css/fonts-text.css',
        'icons' => $theme_uri . '/assets/css/fonts-icons.css',
    ];

    $urls = apply_filters('viar_typography_stylesheet_urls', $defaults);

    return [
        'text' => isset($urls['text']) && is_string($urls['text']) ? $urls['text'] : $defaults['text'],
        'icons' => isset($urls['icons']) && is_string($urls['icons']) ? $urls['icons'] : $defaults['icons'],
    ];
}

/**
 * Whether any typography URL still points at Google Fonts.
 */
function viar_uses_google_fonts(): bool {
    foreach (viar_get_typography_stylesheet_urls() as $url) {
        if (str_contains($url, 'fonts.googleapis.com') || str_contains($url, 'fonts.gstatic.com')) {
            return true;
        }
    }

    if (viar_typography_uses_gstatic_font_files()) {
        return true;
    }

    return false;
}

/**
 * Whether theme typography CSS loads font files from Google CDN.
 */
function viar_typography_uses_gstatic_font_files(): bool {
    $paths = [
        get_template_directory() . '/assets/css/fonts-text.css',
        get_template_directory() . '/assets/css/fonts-icons.css',
    ];

    foreach ($paths as $path) {
        if (!is_readable($path)) {
            continue;
        }

        $css = (string) file_get_contents($path);
        if (str_contains($css, 'fonts.gstatic.com')) {
            return true;
        }
    }

    return (bool) apply_filters('viar_typography_uses_gstatic_font_files', false);
}

/**
 * Style handles that can load without blocking first paint.
 *
 * @return string[]
 */
function viar_get_async_style_handles(): array {
    $handles = [
        'viar-luxury-text-fonts',
        'viar-luxury-icons',
        'viar-luxury-material-symbols',
    ];

    if (viar_page_needs_messenger_styles()) {
        $handles[] = 'viar-luxury-messenger-buttons';
    }

    if (viar_page_needs_forms_styles()) {
        $handles[] = 'viar-luxury-forms';

        if (viar_page_uses_fluent_forms()) {
            $handles[] = 'viar-luxury-fluent-forms';
        }
    }

    return apply_filters('viar_async_style_handles', $handles);
}
