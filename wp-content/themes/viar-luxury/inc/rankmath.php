<?php
/**
 * Rank Math schema integration.
 *
 * @package ViaR_Luxury
 */

function viar_rankmath_schema_data(array $data, $jsonld): array {
    if (!is_front_page()) {
        return $data;
    }

    $data['Organization'] = [
        '@type' => 'TravelAgency',
        'name' => get_bloginfo('name'),
        'url' => home_url('/'),
        'description' => 'Luxury travel agency specializing in curated bespoke tours and VIP transfers.',
        'telephone' => '+30 000 000 0000',
        'email' => 'concierge@viartravel.com',
    ];

    return $data;
}
add_filter('rank_math/json_ld', 'viar_rankmath_schema_data', 99, 2);
