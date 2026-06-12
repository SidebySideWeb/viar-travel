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
        var greeceOptions = {
            types: ['geocode'],
            componentRestrictions: { country: 'gr' }
        };

        var inputStyle = 'width:100%; padding:10px 12px; border:1px solid #74777f; border-radius:0; font-size:16px; font-family:Manrope,sans-serif; box-sizing:border-box; background:#fff;';

        var pickupWrapper = document.getElementById('pickup_location_wrapper');
        if (pickupWrapper) {
            pickupWrapper.innerHTML = '';
            var pickupInput = document.createElement('input');
            pickupInput.type = 'text';
            pickupInput.id = 'pickup_location_js';
            pickupInput.placeholder = 'Start typing location...';
            pickupInput.autocomplete = 'off';
            pickupInput.style.cssText = inputStyle;
            pickupWrapper.appendChild(pickupInput);

            var pickupAuto = new google.maps.places.Autocomplete(pickupInput, greeceOptions);
            pickupAuto.addListener('place_changed', function() {
                var place = pickupAuto.getPlace();
                var val = place.formatted_address || pickupInput.value;
                pickupInput.value = val;
                var hiddenPickup = document.querySelector('input[name="pickup_location"]');
                if (hiddenPickup) {
                    hiddenPickup.value = val;
                }
            });
        }

        var destWrapper = document.getElementById('pickup_destination_wrapper');
        if (destWrapper) {
            destWrapper.innerHTML = '';
            var destInput = document.createElement('input');
            destInput.type = 'text';
            destInput.id = 'pickup_destination_js';
            destInput.placeholder = 'Start typing destination...';
            destInput.autocomplete = 'off';
            destInput.style.cssText = inputStyle;
            destWrapper.appendChild(destInput);

            var destAuto = new google.maps.places.Autocomplete(destInput, greeceOptions);
            destAuto.addListener('place_changed', function() {
                var place = destAuto.getPlace();
                var val = place.formatted_address || destInput.value;
                destInput.value = val;
                var hiddenDest = document.querySelector('input[name="pickup_destination"]');
                if (hiddenDest) {
                    hiddenDest.value = val;
                }
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
