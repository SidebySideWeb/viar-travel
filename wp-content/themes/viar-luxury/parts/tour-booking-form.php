<?php
/**
 * Bespoke tour booking form section.
 *
 * @package ViaR_Luxury
 */

$post_id = get_the_ID();
?>
<section
    id="<?php echo esc_attr(viar_tour_booking_form_anchor()); ?>"
    class="viar-tour-booking-form px-8 py-24 md:px-12 md:py-[120px] bg-white border-t border-[#00234B]/5 scroll-mt-28 max-w-[1440px] mx-auto"
>
    <div class="max-w-[800px] mx-auto">
        <div class="text-center mb-12">
            <span class="font-label-caps text-label-caps text-[#C5A059] mb-3 block tracking-[0.3em] uppercase">
                <?php esc_html_e('Reserve Your Journey', 'viar-luxury'); ?>
            </span>
            <h2 class="font-['Noto_Serif'] text-3xl md:text-4xl text-[#00234B] mb-4">
                <?php esc_html_e('Book This Tour', 'viar-luxury'); ?>
            </h2>
            <p class="font-['Manrope'] text-base md:text-lg text-[#43474e] max-w-xl mx-auto leading-relaxed">
                <?php esc_html_e('Complete the form below to request availability for', 'viar-luxury'); ?>
                <span class="text-[#00234B]"><?php echo esc_html(get_the_title($post_id)); ?></span>.
                <?php esc_html_e('Our consultants will respond with a tailored proposal.', 'viar-luxury'); ?>
            </p>
        </div>
        <div class="bg-[#F9F9F9] p-8 md:p-12 border border-[#e2e2e2]">
            <?php viar_render_tour_booking_form($post_id); ?>
        </div>
    </div>
</section>
