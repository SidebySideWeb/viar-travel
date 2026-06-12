<?php
/**
 * Theme bootstrap.
 *
 * @package ViaR_Luxury
 */

require_once get_template_directory() . '/inc/setup.php';
require_once get_template_directory() . '/inc/compatibility.php';
require_once get_template_directory() . '/inc/enqueue.php';
require_once get_template_directory() . '/inc/auto-pages.php';
require_once get_template_directory() . '/inc/fluent-forms.php';
require_once get_template_directory() . '/inc/rankmath.php';
require_once get_template_directory() . '/inc/security.php';
require_once get_template_directory() . '/inc/performance.php';
require_once get_template_directory() . '/inc/template-tags.php';
require_once get_template_directory() . '/inc/acf-fields.php';
require_once get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/inc/media.php';
require_once get_template_directory() . '/inc/content-types.php';
require_once get_template_directory() . '/inc/editor-help.php';
require_once get_template_directory() . '/inc/wpforms.php';
require_once get_template_directory() . '/inc/icons.php';
require_once get_template_directory() . '/inc/messenger-buttons.php';

// Google Places Autocomplete (VIP transfer form).
function viar_enqueue_google_places_script(): void {
    $api_key = viar_google_maps_api_key();
    if ($api_key === '') {
        return;
    }

    $maps_url = add_query_arg(
        [
            'key' => $api_key,
            'libraries' => 'places',
            'callback' => 'initPlaces',
        ],
        'https://maps.googleapis.com/maps/api/js'
    );

    wp_enqueue_script(
        'viar-google-places',
        $maps_url,
        [],
        null,
        true
    );
}
add_action('wp_enqueue_scripts', 'viar_enqueue_google_places_script');

function viar_google_places_script_loader_tag(string $tag, string $handle, string $src): string {
    if ($handle === 'viar-google-places') {
        return '<script async defer src="' . esc_url($src) . '"></script>' . "\n";
    }

    return $tag;
}
add_filter('script_loader_tag', 'viar_google_places_script_loader_tag', 10, 3);

function viar_print_places_init_script(): void {
    if (viar_google_maps_api_key() === '') {
        return;
    }
    ?>
    <script>
    function initPlaces() {
        var greeceOptions = {
            types: ['geocode'],
            componentRestrictions: { country: 'gr' }
        };

        var pickupInput = document.getElementById('pickup_location_display');
        var destInput   = document.getElementById('pickup_destination_display');

        if (pickupInput) {
            var pickupAuto = new google.maps.places.Autocomplete(pickupInput, greeceOptions);
            pickupAuto.addListener('place_changed', function() {
                document.querySelectorAll('input[type="hidden"]').forEach(function(el) {
                    if (el.name && el.name.includes('pickup_location')) {
                        el.value = pickupInput.value;
                    }
                });
            });
        }

        if (destInput) {
            var destAuto = new google.maps.places.Autocomplete(destInput, greeceOptions);
            destAuto.addListener('place_changed', function() {
                document.querySelectorAll('input[type="hidden"]').forEach(function(el) {
                    if (el.name && el.name.includes('pickup_destination')) {
                        el.value = destInput.value;
                    }
                });
            });
        }
    }
    </script>
    <?php
}
add_action('wp_footer', 'viar_print_places_init_script', 5);
