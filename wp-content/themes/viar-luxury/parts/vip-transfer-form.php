<?php
/**
 * VIP transfer request form section.
 *
 * @package ViaR_Luxury
 */
?>
<section id="<?php echo esc_attr(viar_vip_transfer_form_anchor()); ?>" class="viar-vip-transfer-form py-[120px] bg-white border-t border-[#F2F0ED] scroll-mt-28">
    <div class="max-w-[800px] mx-auto px-6 md:px-12">
        <div class="text-center mb-12">
            <span class="font-label-caps text-label-caps text-[#C5A059] mb-3 block tracking-[0.3em] uppercase"><?php esc_html_e('Request a Transfer', 'viar-luxury'); ?></span>
            <h2 class="font-['Noto_Serif'] text-4xl md:text-5xl text-[#00234B] mb-4"><?php esc_html_e('Book Your VIP Transfer', 'viar-luxury'); ?></h2>
            <p class="font-['Manrope'] text-lg text-[#43474e] max-w-xl mx-auto leading-relaxed">
                <?php esc_html_e('Share your route, timing, and preferences. Our logistics team will confirm availability and send a tailored offer.', 'viar-luxury'); ?>
            </p>
        </div>
        <div class="bg-[#F9F9F9] p-8 md:p-12 border border-[#e2e2e2]">
            <?php viar_render_vip_transfer_form(); ?>
        </div>
    </div>
</section>
