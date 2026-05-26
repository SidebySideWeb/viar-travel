<?php
/**
 * Rank Math schema integration.
 *
 * @package ViaR_Luxury
 */

function viar_rankmath_schema_data(array $data, $jsonld): array {
    $subtitle = viar_get_logo_subtitle();
    $logo_url = viar_get_custom_logo_url();

    $organization = [
        '@type' => 'TravelAgency',
        'name' => get_bloginfo('name'),
        'url' => home_url('/'),
        'slogan' => $subtitle,
        'description' => $subtitle,
        'telephone' => get_theme_mod('viar_footer_phone', '+30 000 000 0000'),
        'email' => get_theme_mod('viar_footer_email', 'concierge@viartravel.com'),
    ];

    if ($logo_url !== '') {
        $organization['logo'] = [
            '@type' => 'ImageObject',
            'url' => $logo_url,
        ];
    }

    if (isset($data['Organization']) && is_array($data['Organization'])) {
        $data['Organization'] = array_merge($data['Organization'], $organization);
    } else {
        $data['Organization'] = $organization;
    }

    return $data;
}
add_filter('rank_math/json_ld', 'viar_rankmath_schema_data', 99, 2);
