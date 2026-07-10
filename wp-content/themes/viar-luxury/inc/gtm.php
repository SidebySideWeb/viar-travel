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
<script>window.dataLayer=window.dataLayer||[];<?php if ($ga4_id !== '') : ?>window.dataLayer.push({ga4_measurement_id:<?php echo wp_json_encode($ga4_id); ?>});<?php endif; ?>(function(){var loaded=false;function loadGtm(){if(loaded){return;}loaded=true;(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;j.onload=function(){var e=d.createElement('script');e.src=<?php echo wp_json_encode(viar_gtm_events_script_url()); ?>;e.async=true;d.body.appendChild(e);};f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer',<?php echo wp_json_encode($container_id); ?>);}['pointerdown','keydown'].forEach(function(type){window.addEventListener(type,loadGtm,{once:true,passive:true});});})();</script>
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
 * URL for the theme dataLayer event tracking script.
 */
function viar_gtm_events_script_url(): string {
    $version = '1.0';

    return get_template_directory_uri() . '/assets/js/gtm-events.js?ver=' . rawurlencode($version);
}

/**
 * Register the GTM events script so deferred loaders can resolve its URL.
 */
function viar_register_gtm_events_script(): void {
    if (!viar_should_load_gtm()) {
        return;
    }

    wp_register_script(
        'viar-gtm-events',
        viar_gtm_events_script_url(),
        [],
        null,
        true
    );
}
add_action('wp_enqueue_scripts', 'viar_register_gtm_events_script');
