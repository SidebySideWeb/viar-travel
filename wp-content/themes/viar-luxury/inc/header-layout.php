<?php
/**
 * Critical fixed-header layout (inlined so cache plugins cannot drop it).
 *
 * @package ViaR_Luxury
 */

/**
 * Print layout rules in head before any deferred stylesheets.
 */
function viar_print_critical_header_layout_css(): void {
    if (is_admin()) {
        return;
    }
    ?>
<style id="viar-header-layout-critical">
:root{--viar-header-height:6.5rem;--viar-header-clearance:1rem;--viar-hero-flush-pull:1}
.viar-header-spacer{display:block;width:100%;height:var(--viar-header-height);min-height:var(--viar-header-height);flex-shrink:0;pointer-events:none}
.viar-site-content{padding-top:0!important}
.viar-hero-flush{margin-top:calc(-1 * var(--viar-header-height) * var(--viar-hero-flush-pull));padding-top:var(--viar-header-height)}
.viar-hero-flush--soft{margin-top:-50px}
.viar-content-below-header{padding-top:var(--viar-header-clearance)}
</style>
    <?php
}
add_action('wp_head', 'viar_print_critical_header_layout_css', 0);
