<?php
/**
 * VIP transfer request form section.
 *
 * @package ViaR_Luxury
 *
 * @var array<string, mixed> $args
 */

$args = isset($args) && is_array($args) ? $args : [];
$use_defaults = !array_key_exists('show_header', $args);

if ($use_defaults) {
    $eyebrow = __('Request a Transfer', 'viar-luxury');
    $title = __('Book Your VIP Transfer', 'viar-luxury');
    $description = __('Share your route, timing, and preferences. Our logistics team will confirm availability and send a tailored offer.', 'viar-luxury');
    $show_header = true;
} else {
    $eyebrow = isset($args['eyebrow']) ? (string) $args['eyebrow'] : '';
    $title = isset($args['title']) ? (string) $args['title'] : '';
    $description = isset($args['description']) ? (string) $args['description'] : '';
    $show_header = (bool) $args['show_header'];
}
?>
<section id="<?php echo esc_attr(viar_vip_transfer_form_anchor()); ?>" class="viar-vip-transfer-form py-[120px] bg-white border-t border-[#F2F0ED] scroll-mt-28">
    <div class="max-w-[800px] mx-auto px-6 md:px-12">
        <?php if ($show_header) : ?>
        <div class="text-center mb-12">
            <?php if ($eyebrow !== '') : ?>
                <span class="font-label-caps text-label-caps text-[#C5A059] mb-3 block tracking-[0.3em] uppercase"><?php echo esc_html($eyebrow); ?></span>
            <?php endif; ?>
            <?php if ($title !== '') : ?>
                <h2 class="font-['Noto_Serif'] text-4xl md:text-5xl text-[#00234B] mb-4"><?php echo esc_html($title); ?></h2>
            <?php endif; ?>
            <?php if ($description !== '') : ?>
                <p class="font-['Manrope'] text-lg text-[#43474e] max-w-xl mx-auto leading-relaxed"><?php echo esc_html($description); ?></p>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        <div class="bg-[#F9F9F9] p-8 md:p-12 border border-[#e2e2e2]">
            <?php viar_render_vip_transfer_form(); ?>
        </div>
    </div>
</section>
