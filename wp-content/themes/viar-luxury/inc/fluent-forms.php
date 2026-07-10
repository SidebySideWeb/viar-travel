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
 * Anchor ID for the tour booking form on bespoke tour singles.
 */
function viar_tour_booking_form_anchor(): string {
    return 'tour-booking-request';
}

/**
 * Tour booking form href for a bespoke tour (same-page anchor or full URL).
 */
function viar_tour_booking_form_href(?int $post_id = null): string {
    $post_id = $post_id ?: get_the_ID();

    if ($post_id > 0 && is_single($post_id)) {
        return '#' . viar_tour_booking_form_anchor();
    }

    if ($post_id > 0) {
        return get_permalink($post_id) . '#' . viar_tour_booking_form_anchor();
    }

    return '#' . viar_tour_booking_form_anchor();
}

/**
 * Fluent Forms shortcode for the contact page form.
 */
function viar_contact_form_shortcode(): string {
    $form_id = (int) apply_filters('viar_contact_fluentform_id', 1);

    return '[fluentform id="' . $form_id . '"]';
}

/**
 * Render the contact page Fluent Form.
 */
function viar_render_contact_form(): void {
    if (!shortcode_exists('fluentform')) {
        echo '<p class="font-body-md text-[#00234B]/70">' . esc_html__('The contact form is temporarily unavailable. Please email us directly.', 'viar-luxury') . '</p>';
        return;
    }

    echo '<div class="viar-fluent-form">';
    echo do_shortcode(viar_contact_form_shortcode()); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    echo '</div>';
}

/**
 * Fluent Forms shortcode for the bespoke tour booking form.
 */
function viar_tour_booking_form_shortcode(): string {
    $form_id = (int) apply_filters('viar_tour_booking_fluentform_id', 4);

    return '[fluentform id="' . $form_id . '"]';
}

/**
 * Render the tour booking Fluent Form.
 *
 * Must run in the context of the tour post so {embed_post.post_title} resolves.
 */
function viar_render_tour_booking_form(?int $post_id = null): void {
    if (!shortcode_exists('fluentform')) {
        echo '<p class="font-body-md text-[#00234B]/70">' . esc_html__('The booking form is temporarily unavailable. Please contact us directly.', 'viar-luxury') . '</p>';
        return;
    }

    $post_id = $post_id ?: get_the_ID();
    $restore_post = null;

    if ($post_id > 0 && (int) get_the_ID() !== $post_id) {
        $restore_post = $GLOBALS['post'] ?? null;
        $GLOBALS['post'] = get_post($post_id); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
        setup_postdata($GLOBALS['post']);
    }

    echo '<div class="viar-fluent-form">';
    echo do_shortcode(viar_tour_booking_form_shortcode()); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    echo '</div>';

    if ($restore_post instanceof WP_Post) {
        $GLOBALS['post'] = $restore_post; // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
        setup_postdata($restore_post);
    } elseif ($restore_post === null && $post_id > 0 && (int) get_the_ID() !== $post_id) {
        wp_reset_postdata();
    }
}

/**
 * Resolve the inquiry CTA URL for a tour (defaults to on-page booking form).
 */
function viar_tour_inquiry_cta_url(int $post_id): string {
    $booking_href = viar_tour_booking_form_href($post_id);
    $saved_cta_url = viar_field_value('viar_tour_cta_url', '', $post_id);

    if ($saved_cta_url === '') {
        return $booking_href;
    }

    $legacy_inquiry_urls = array_filter([
        home_url('/inquiry'),
        home_url('/inquiry/'),
    ]);

    if (in_array(untrailingslashit($saved_cta_url), array_map('untrailingslashit', $legacy_inquiry_urls), true)) {
        return $booking_href;
    }

    return $saved_cta_url;
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
 * Use a modern flatpickr build without legacy Object.assign polyfills.
 */
function viar_register_modern_flatpickr(): void {
    if (!viar_page_uses_fluent_forms() || !wp_script_is('flatpickr', 'registered')) {
        return;
    }

    $theme_version = wp_get_theme()->get('Version');

    wp_deregister_script('flatpickr');
    wp_register_script(
        'flatpickr',
        get_template_directory_uri() . '/assets/js/flatpickr.min.js',
        ['jquery'],
        '4.6.9-viar-' . $theme_version,
        true
    );
}
add_action('wp_enqueue_scripts', 'viar_register_modern_flatpickr', 15);

/**
 * Script handles that must stay synchronous on Fluent Forms pages.
 *
 * Inline Fluent footer handlers (DateTime initPicker, etc.) are plain synchronous
 * scripts and run as soon as they are parsed. If jQuery/flatpickr are deferred
 * or moved to the end by an optimizer, those inlines execute first and fail.
 *
 * @return string[]
 */
function viar_get_fluent_form_sync_script_handles(): array {
    return [
        'jquery',
        'jquery-core',
        'jquery-migrate',
        'flatpickr',
        'fluent-form-submission',
    ];
}

/**
 * Strip defer/async from Fluent Form dependencies on the frontend.
 */
function viar_sync_fluent_form_scripts(): void {
    if (!viar_page_uses_fluent_forms()) {
        return;
    }

    $scripts = wp_scripts();

    foreach (viar_get_fluent_form_sync_script_handles() as $handle) {
        if (!isset($scripts->registered[$handle])) {
            continue;
        }

        unset($scripts->registered[$handle]->extra['strategy']);
        $scripts->registered[$handle]->args = false;
    }
}
add_action('wp_enqueue_scripts', 'viar_sync_fluent_form_scripts', 999);
add_action('wp_print_scripts', 'viar_sync_fluent_form_scripts', 0);
add_action('wp_print_footer_scripts', 'viar_sync_fluent_form_scripts', 0);

/**
 * Remove defer/async attributes optimizers may add to Fluent Form dependencies.
 */
function viar_fluent_form_script_loader_tag(string $tag, string $handle, string $src): string {
    if (!viar_page_uses_fluent_forms() || !in_array($handle, viar_get_fluent_form_sync_script_handles(), true)) {
        return $tag;
    }

    $tag = preg_replace('/\sdefer(=[\'"][^\'"]*[\'"])?/i', '', $tag) ?? $tag;
    $tag = preg_replace('/\sasync(=[\'"][^\'"]*[\'"])?/i', '', $tag) ?? $tag;

    return $tag;
}
add_filter('script_loader_tag', 'viar_fluent_form_script_loader_tag', 999, 3);

/**
 * Minimal Fluent Forms globals for footer bootstrap fallbacks.
 *
 * @return array<string, mixed>
 */
function viar_get_fluent_form_global_vars(): array {
    $step_text = __('Step %activeStep% of %totalStep% - %stepTitle%', 'viar-luxury');
    $date_i18n = [];

    if (class_exists('\FluentForm\App\Modules\Component\Component')) {
        $date_i18n = \FluentForm\App\Modules\Component\Component::getDatei18n();
    }

    $vars = [
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'forms' => [],
        'step_text' => $step_text,
        'step_completed_text' => __('Completed', 'viar-luxury'),
        'is_rtl' => is_rtl(),
        'date_i18n' => $date_i18n,
        'force_init' => false,
    ];

    return (array) apply_filters('fluentform/global_form_vars', $vars);
}

/**
 * Print Fluent Forms globals and flatpickr before inline wp_footer handlers.
 */
function viar_bootstrap_fluent_form_footer_assets(): void {
    static $printed = false;

    if ($printed || !viar_page_uses_fluent_forms()) {
        return;
    }

    $scripts = wp_scripts();
    if (!isset($scripts->registered['fluent-form-submission'])) {
        return;
    }

    $printed = true;

    if (!wp_script_is('jquery', 'done')) {
        wp_enqueue_script('jquery');
        viar_sync_fluent_form_scripts();
        $scripts->do_item('jquery');
    }

    $localized = $scripts->get_data('fluent-form-submission', 'data');

    echo "<script id='viar-fluentform-bootstrap'>\n";
    if (!empty($localized)) {
        if (is_array($localized)) {
            foreach ($localized as $chunk) {
                if (is_string($chunk) && $chunk !== '') {
                    echo $chunk . "\n";
                }
            }
        } elseif (is_string($localized)) {
            echo $localized . "\n";
        }
        unset($scripts->registered['fluent-form-submission']->extra['data']);
    } else {
        echo 'window.fluentFormVars = ' . wp_json_encode(viar_get_fluent_form_global_vars()) . ";\n";
    }
    echo "</script>\n";

    if (isset($scripts->registered['flatpickr']) && !wp_script_is('flatpickr', 'done')) {
        unset($scripts->registered['flatpickr']->extra['strategy']);
        $scripts->do_item('flatpickr');
    }
}
add_action('wp_footer', 'viar_bootstrap_fluent_form_footer_assets', 1);

/**
 * Prevent Fluent Forms from rendering reCAPTCHA twice on the same element.
 */
function viar_guard_fluent_recaptcha_render(): void {
    if (!viar_page_uses_fluent_forms()) {
        return;
    }
    ?>
    <script>
    (function () {
        if (window.viarFluentRecaptchaGuard) {
            return;
        }
        window.viarFluentRecaptchaGuard = true;

        function patchRecaptchaRender() {
            if (!window.grecaptcha || typeof window.grecaptcha.render !== 'function' || window.grecaptcha.render.__viarPatched) {
                return false;
            }

            var originalRender = window.grecaptcha.render;
            window.grecaptcha.render = function (container, parameters) {
                var element = typeof container === 'string' ? document.getElementById(container) : container;
                if (element && element.getAttribute('data-viar-recaptcha-rendered') === '1') {
                    var existingWidgetId = element.getAttribute('data-widget-id');
                    return existingWidgetId ? parseInt(existingWidgetId, 10) : 0;
                }

                var widgetId = originalRender.apply(this, arguments);
                if (element) {
                    element.setAttribute('data-viar-recaptcha-rendered', '1');
                    if (widgetId !== undefined && widgetId !== null) {
                        element.setAttribute('data-widget-id', String(widgetId));
                    }
                }

                return widgetId;
            };
            window.grecaptcha.render.__viarPatched = true;
            return true;
        }

        if (!patchRecaptchaRender()) {
            var attempts = 0;
            var timer = window.setInterval(function () {
                attempts += 1;
                if (patchRecaptchaRender() || attempts > 40) {
                    window.clearInterval(timer);
                }
            }, 50);
        }
    })();
    </script>
    <?php
}
add_action('wp_footer', 'viar_guard_fluent_recaptcha_render', 2);

/**
 * Keep Breeze from deferring or combining critical Fluent Forms scripts.
 *
 * @param string[] $scripts
 * @return string[]
 */
function viar_breeze_exclude_fluent_form_scripts(array $scripts): array {
    $needles = [
        'fluentform',
        'fluent-form-submission',
        'form-submission.js',
        'flatpickr',
        'recaptcha',
        'jquery',
    ];

    return array_values(array_unique(array_merge($scripts, $needles)));
}
add_filter('breeze_filter_js_exclude', 'viar_breeze_exclude_fluent_form_scripts');
add_filter('default_scripts_gnore_from_delay', 'viar_breeze_exclude_fluent_form_scripts');

/**
 * Load Fluent Forms plugin CSS without blocking first paint.
 *
 * @param string[] $handles
 * @return string[]
 */
function viar_add_fluent_form_async_style_handles(array $handles): array {
    if (!viar_page_uses_fluent_forms()) {
        return $handles;
    }

    $handles[] = 'flatpickr-css';
    $handles[] = 'fluent-form-styles';
    $handles[] = 'fluentform-public-default';
    $handles[] = 'viar-luxury-material-symbols';

    return $handles;
}
add_filter('viar_async_style_handles', 'viar_add_fluent_form_async_style_handles');

