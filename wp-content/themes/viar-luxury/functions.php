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

    ?>
    <script>
    (function(apiKey) {
        (function(g) {
            var h, a, k, p = 'The Google Maps JavaScript API', c = 'google', l = 'importLibrary', q = '__ib__', m = document, b = window;
            b = b[c] || (b[c] = {});
            var d = b.maps || (b.maps = {}), r = new Set(), e = new URLSearchParams,
                u = function() {
                    return h || (h = new Promise(function(resolve, reject) {
                        a = m.createElement('script');
                        e.set('libraries', [].concat(Array.from(r)).join(''));
                        for (k in g) {
                            e.set(k.replace(/[A-Z]/g, function(t) { return '_' + t[0].toLowerCase(); }), g[k]);
                        }
                        e.set('callback', c + '.maps.' + q);
                        a.src = 'https://maps.' + c + 'apis.com/maps/api/js?' + e;
                        d[q] = resolve;
                        a.onerror = function() { reject(new Error(p + ' could not load.')); };
                        a.nonce = m.querySelector('script[nonce]')?.nonce || '';
                        m.head.append(a);
                    }));
                };
            d[l] ? console.warn(p + ' only loads once. Ignoring:', g) : d[l] = function(f) {
                var args = Array.prototype.slice.call(arguments, 1);
                r.add(f);
                return u().then(function() { return d[l].apply(d, [f].concat(args)); });
            };
        })({ key: apiKey, v: 'weekly' });

        function setFluentHiddenValue(fieldName, value) {
            var hidden = document.querySelector('input[name="' + fieldName + '"]');
            if (!hidden) {
                document.querySelectorAll('input[type="hidden"]').forEach(function(input) {
                    if (!hidden && input.name && input.name.indexOf(fieldName) !== -1) {
                        hidden = input;
                    }
                });
            }
            if (hidden) {
                hidden.value = value;
            }
        }

        function stylePlaceAutocompleteElement(element) {
            element.classList.add('viar-place-autocomplete');
            element.style.setProperty('width', '100%');
            element.style.setProperty('max-width', '100%');
            element.style.setProperty('display', 'block');
            element.style.setProperty('box-sizing', 'border-box');
            element.style.setProperty('margin', '0');
            element.style.setProperty('color-scheme', 'light');
            element.style.setProperty('background-color', '#fff');
            element.style.setProperty('border', '1px solid #74777f');
            element.style.setProperty('border-radius', '0');
            element.style.setProperty('color', '#1a1c1c');
            element.style.setProperty('font-family', 'Manrope, sans-serif');
            element.style.setProperty('font-size', '16px');
            element.style.setProperty('line-height', '1.6');
            element.style.setProperty('min-height', '48px');
        }

        function stylePlaceWrapper(wrapper) {
            wrapper.style.setProperty('width', '100%');
            wrapper.style.setProperty('max-width', '100%');
            wrapper.style.setProperty('display', 'block');
            wrapper.style.setProperty('margin', '0');
            wrapper.style.setProperty('padding', '0');
            wrapper.style.setProperty('box-sizing', 'border-box');
        }

        async function setupPlaceAutocomplete(wrapperId, hiddenFieldName, placeholder) {
            var wrapper = document.getElementById(wrapperId);
            if (!wrapper) {
                return;
            }

            stylePlaceWrapper(wrapper);
            wrapper.innerHTML = '';

            var places = await google.maps.importLibrary('places');
            var autocomplete = new places.PlaceAutocompleteElement({
                includedRegionCodes: ['gr'],
            });

            autocomplete.id = wrapperId.replace('_wrapper', '_js');
            autocomplete.placeholder = placeholder;
            stylePlaceAutocompleteElement(autocomplete);
            wrapper.appendChild(autocomplete);

            autocomplete.addEventListener('gmp-select', async function(event) {
                var placePrediction = event.placePrediction;
                if (!placePrediction) {
                    return;
                }

                var place = placePrediction.toPlace();
                await place.fetchFields({ fields: ['formattedAddress'] });
                var address = place.formattedAddress || '';
                setFluentHiddenValue(hiddenFieldName, address);
            });
        }

        async function initPlaces() {
            await setupPlaceAutocomplete('pickup_location_wrapper', 'pickup_location', 'Start typing location...');
            await setupPlaceAutocomplete('pickup_destination_wrapper', 'pickup_destination', 'Start typing destination...');
        }

        initPlaces().catch(function(error) {
            console.error('ViaR Places Autocomplete failed:', error);
        });
    })(<?php echo wp_json_encode($api_key); ?>);
    </script>
    <?php
}
add_action('wp_footer', 'viar_print_google_places_script', 5);
