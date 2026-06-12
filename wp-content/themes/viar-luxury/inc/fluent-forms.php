<?php
/**
 * Fluent Forms integration.
 *
 * @package ViaR_Luxury
 */

/**
 * Anchor ID for the VIP transfer request form on the VIP Transfers page.
 */
function viar_vip_transfer_form_anchor(): string {
    return 'vip-transfer-request';
}

/**
 * VIP Transfers page URL.
 */
function viar_vip_transfer_page_url(): string {
    return home_url('/vip-transfers/');
}

/**
 * VIP transfer request form URL with page anchor.
 */
function viar_vip_transfer_form_url(): string {
    return viar_vip_transfer_page_url() . '#' . viar_vip_transfer_form_anchor();
}

/**
 * Form href for the current page (same-page anchor) or full URL elsewhere.
 */
function viar_vip_transfer_form_href(?bool $same_page = null): string {
    if ($same_page === null) {
        $same_page = is_page(['vip-transfers', 'vip-transfers-services']);
    }

    return $same_page ? '#' . viar_vip_transfer_form_anchor() : viar_vip_transfer_form_url();
}

/**
 * Escape a VIP transfer form href (fragment or full URL).
 */
function viar_esc_vip_transfer_href(string $href): string {
    if (str_starts_with($href, '#')) {
        return esc_attr($href);
    }

    return esc_url($href);
}

/**
 * Fluent Forms shortcode for the VIP transfer request form.
 */
function viar_vip_transfer_form_shortcode(): string {
    $form_id = (int) apply_filters('viar_vip_transfer_fluentform_id', 3);

    return '[fluentform id="' . $form_id . '"]';
}

/**
 * Render the VIP transfer Fluent Form and messenger buttons.
 */
function viar_render_vip_transfer_form(): void {
    if (!shortcode_exists('fluentform')) {
        echo '<p class="font-body-md text-[#00234B]/70">' . esc_html__('The transfer request form is temporarily unavailable. Please contact us directly.', 'viar-luxury') . '</p>';
        return;
    }

    echo '<div class="viar-fluent-form">';
    echo do_shortcode(viar_vip_transfer_form_shortcode()); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    viar_render_messenger_buttons(['context' => 'form']);
    echo '</div>';
}

/**
 * Google Maps API key for Places Autocomplete on transfer forms.
 */
function viar_google_maps_api_key(): string {
    if (!defined('VIAR_GOOGLE_MAPS_API_KEY')) {
        return (string) apply_filters('viar_google_maps_api_key', '');
    }

    $key = VIAR_GOOGLE_MAPS_API_KEY;

    return (string) apply_filters('viar_google_maps_api_key', is_string($key) ? trim($key) : '');
}

/**
 * Google Places Autocomplete for VIP transfer pickup and destination fields.
 */
function viar_output_google_places_autocomplete(): void {
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
    ?>
    <!-- Google Places Autocomplete -->
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
            if (el.name && el.name.includes('pickup_location')) el.value = pickupInput.value;
          });
        });
      }

      if (destInput) {
        var destAuto = new google.maps.places.Autocomplete(destInput, greeceOptions);
        destAuto.addListener('place_changed', function() {
          document.querySelectorAll('input[type="hidden"]').forEach(function(el) {
            if (el.name && el.name.includes('pickup_destination')) el.value = destInput.value;
          });
        });
      }
    }
    </script>
    <script async defer src="<?php echo esc_url($maps_url); ?>"></script>
    <?php
}
add_action('wp_footer', 'viar_output_google_places_autocomplete', 99);
