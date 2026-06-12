<?php
/**
 * Theme icon helpers.
 *
 * @package ViaR_Luxury
 */

/**
 * Allowed icon slugs.
 *
 * @return string[]
 */
function viar_icon_slugs(): array {
    return ['address', 'email', 'phone', 'whatsapp', 'viber'];
}

/**
 * Absolute URL for a theme icon asset.
 */
function viar_get_icon_url(string $slug): string {
    if (!in_array($slug, viar_icon_slugs(), true)) {
        return '';
    }

    return get_template_directory_uri() . '/assets/images/icons/' . $slug . '.png';
}

/**
 * Render a masked icon tinted with theme colors.
 *
 * @param array<string, mixed> $args {
 *     @type string $size  sm|md|lg|xl
 *     @type string $color gold|navy|muted|current
 *     @type string $class Extra CSS classes.
 *     @type string $label Accessible label. Empty hides from assistive tech.
 * }
 */
function viar_render_icon(string $slug, array $args = []): void {
    if (!in_array($slug, viar_icon_slugs(), true)) {
        return;
    }

    $args = wp_parse_args($args, [
        'size' => 'md',
        'color' => 'gold',
        'class' => '',
        'label' => '',
    ]);

    $sizes = ['sm', 'md', 'lg', 'xl'];
    $colors = ['gold', 'navy', 'muted', 'current'];

    $size = in_array($args['size'], $sizes, true) ? $args['size'] : 'md';
    $color = in_array($args['color'], $colors, true) ? $args['color'] : 'gold';

    $classes = array_filter([
        'viar-icon',
        'viar-icon--' . $slug,
        'viar-icon--' . $size,
        'viar-icon--' . $color,
        is_string($args['class']) ? trim($args['class']) : '',
    ]);

    $attributes = [
        'class' => implode(' ', $classes),
    ];

    if (is_string($args['label']) && $args['label'] !== '') {
        $attributes['role'] = 'img';
        $attributes['aria-label'] = $args['label'];
    } else {
        $attributes['aria-hidden'] = 'true';
    }

    $attr_string = '';
    foreach ($attributes as $key => $value) {
        $attr_string .= sprintf(' %s="%s"', esc_attr($key), esc_attr($value));
    }

    printf('<span%s></span>', $attr_string); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

/**
 * Build a tel: href from a display phone number.
 */
function viar_phone_href(string $phone): string {
    $normalized = preg_replace('/[^0-9+]/', '', $phone);

    return $normalized !== '' ? 'tel:' . $normalized : '';
}
