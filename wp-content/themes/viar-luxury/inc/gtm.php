<?php
/**
 * Google Tag Manager container and dataLayer event tracking.
 *
 * @package ViaR_Luxury
 */

/**
 * GTM container ID. Override with the `viar_gtm_container_id` filter.
 */
function viar_gtm_container_id(): string {
    $id = apply_filters('viar_gtm_container_id', 'GTM-N2JRQGVZ');

    return is_string($id) ? trim($id) : '';
}

/**
 * GA4 measurement ID for GTM tags. Override with the `viar_ga4_measurement_id` filter.
 */
function viar_ga4_measurement_id(): string {
    $id = apply_filters('viar_ga4_measurement_id', 'G-X87X5KQ5Z7');

    return is_string($id) ? trim($id) : '';
}

/**
 * Whether GTM should load on the current request.
 */
function viar_should_load_gtm(): bool {
    if (is_admin()) {
        return false;
    }

    return viar_gtm_container_id() !== '';
}

/**
 * Output GTM head snippet as early as possible.
 */
function viar_gtm_head_snippet(): void {
    if (!viar_should_load_gtm()) {
        return;
    }

    $container_id = viar_gtm_container_id();
    $ga4_id = viar_ga4_measurement_id();
    ?>
<!-- Google Tag Manager -->
<script>window.dataLayer=window.dataLayer||[];<?php if ($ga4_id !== '') : ?>window.dataLayer.push({ga4_measurement_id:<?php echo wp_json_encode($ga4_id); ?>});<?php endif; ?>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','<?php echo esc_js($container_id); ?>');</script>
<!-- End Google Tag Manager -->
    <?php
}
add_action('wp_head', 'viar_gtm_head_snippet', 1);

/**
 * Output GTM noscript snippet immediately after the opening body tag.
 */
function viar_gtm_body_snippet(): void {
    if (!viar_should_load_gtm()) {
        return;
    }

    $container_id = viar_gtm_container_id();
    ?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo esc_attr($container_id); ?>"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <?php
}
add_action('wp_body_open', 'viar_gtm_body_snippet', 1);

/**
 * Enqueue custom dataLayer event tracking script in the footer.
 */
function viar_enqueue_gtm_events(): void {
    if (!viar_should_load_gtm()) {
        return;
    }

    wp_enqueue_script(
        'viar-gtm-events',
        get_template_directory_uri() . '/assets/js/gtm-events.js',
        [],
        '1.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'viar_enqueue_gtm_events');
