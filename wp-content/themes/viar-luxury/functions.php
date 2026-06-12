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
function viar_print_google_places_script(): void {
    $api_key = viar_google_maps_api_key();
    if ($api_key === '') {
        return;
    }

    $maps_url = add_query_arg(
        [
            'key' => $api_key,
            'libraries' => 'places',
            'v' => 'weekly',
            'callback' => 'initPlaces',
            'loading' => 'async',
        ],
        'https://maps.googleapis.com/maps/api/js'
    );
    ?>
    <script>
    window.initPlaces = function() {
        var request = {
            componentRestrictions: { country: 'gr' },
            types: ['geocode']
        };

        var pickupWrapper = document.getElementById('pickup_location_wrapper');
        if (pickupWrapper) {
            var pickupInput = document.createElement('input');
            pickupInput.type = 'text';
            pickupInput.id = 'pickup_location_js';
            pickupInput.placeholder = 'Start typing location...';
            pickupInput.autocomplete = 'off';
            pickupInput.style.cssText = 'width:100%; padding:10px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px; box-sizing:border-box; background:#fff;';
            pickupWrapper.appendChild(pickupInput);

            var pickupAuto = new google.maps.places.Autocomplete(pickupInput, request);
            pickupAuto.addListener('place_changed', function() {
                var place = pickupAuto.getPlace();
                document.querySelectorAll('input[type="hidden"]').forEach(function(el) {
                    if (el.name && el.name.includes('pickup_location')) {
                        el.value = place.formatted_address || pickupInput.value;
                    }
                });
            });
        }

        var destWrapper = document.getElementById('pickup_destination_wrapper');
        if (destWrapper) {
            var destInput = document.createElement('input');
            destInput.type = 'text';
            destInput.id = 'pickup_destination_js';
            destInput.placeholder = 'Start typing destination...';
            destInput.autocomplete = 'off';
            destInput.style.cssText = 'width:100%; padding:10px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px; box-sizing:border-box; background:#fff;';
            destWrapper.appendChild(destInput);

            var destAuto = new google.maps.places.Autocomplete(destInput, request);
            destAuto.addListener('place_changed', function() {
                var place = destAuto.getPlace();
                document.querySelectorAll('input[type="hidden"]').forEach(function(el) {
                    if (el.name && el.name.includes('pickup_destination')) {
                        el.value = place.formatted_address || destInput.value;
                    }
                });
            });
        }
    };

    (function() {
        var script = document.createElement('script');
        script.src = <?php echo wp_json_encode($maps_url); ?>;
        script.async = true;
        script.defer = true;
        document.head.appendChild(script);
    })();
    </script>
    <?php
}
add_action('wp_footer', 'viar_print_google_places_script', 5);
