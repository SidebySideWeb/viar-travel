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

        var pickupWrapper = document.getElementById('pickup_location_wrapper');
        if (pickupWrapper) {
            var pickupInput = document.createElement('input');
            pickupInput.type = 'text';
            pickupInput.id = 'pickup_location_js';
            pickupInput.placeholder = 'Start typing location...';
            pickupInput.autocomplete = 'off';
            pickupInput.className = 'ff-el-form-control';
            pickupWrapper.appendChild(pickupInput);

            var pickupAuto = new google.maps.places.Autocomplete(pickupInput, greeceOptions);
            pickupAuto.addListener('place_changed', function() {
                document.querySelectorAll('input[type="hidden"]').forEach(function(el) {
                    if (el.name && el.name.includes('pickup_location')) {
                        el.value = pickupInput.value;
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
            destInput.className = 'ff-el-form-control';
            destWrapper.appendChild(destInput);

            var destAuto = new google.maps.places.Autocomplete(destInput, greeceOptions);
            destAuto.addListener('place_changed', function() {
                document.querySelectorAll('input[type="hidden"]').forEach(function(el) {
                    if (el.name && el.name.includes('pickup_destination')) {
                        el.value = destInput.value;
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
