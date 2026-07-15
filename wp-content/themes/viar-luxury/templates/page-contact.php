<?php
/**
 * Template Name: ViaR Contact
 *
 * Contact page with Fluent Forms integration
 *
 * @package ViaR_Luxury
 */

get_header();

$page_id = get_queried_object_id() ?: get_the_ID();

$contact_phone = get_theme_mod('viar_footer_phone', '+30 000 000 0000');
$contact_email = get_theme_mod('viar_footer_email', 'concierge@viartravel.com');
$contact_address = get_theme_mod('viar_footer_address', 'Athens, Greece');
$contact_phone_href = viar_phone_href($contact_phone);

$other_ways_title = viar_field_value('viar_contact_other_title', 'Other Ways To Reach Us', $page_id);
$other_ways_intro = viar_field_value('viar_contact_other_intro', 'Prefer to contact us directly? We\'re here to help.', $page_id);
$phone_card_title = viar_field_value('viar_contact_phone_title', 'Phone', $page_id);
$phone_card_description = viar_field_value('viar_contact_phone_description', "Call us Monday - Friday\n9:00 AM - 6:00 PM (EET)", $page_id);
$email_card_title = viar_field_value('viar_contact_email_title', 'Email', $page_id);
$email_card_description = viar_field_value('viar_contact_email_description', "Send us an email anytime\nWe'll respond within 24 hours", $page_id);
$office_card_title = viar_field_value('viar_contact_office_title', 'Office', $page_id);
$office_card_description = viar_field_value('viar_contact_office_description', "Visit us at our Athens office\nBy appointment only", $page_id);

$hours_title = viar_field_value('viar_contact_hours_title', 'Business Hours', $page_id);
$hours_monfri_label = viar_field_value('viar_contact_hours_monfri_label', 'Monday - Friday', $page_id);
$hours_monfri_time = viar_field_value('viar_contact_hours_monfri_time', '9:00 AM - 6:00 PM', $page_id);
$hours_sat_label = viar_field_value('viar_contact_hours_sat_label', 'Saturday', $page_id);
$hours_sat_time = viar_field_value('viar_contact_hours_sat_time', '10:00 AM - 4:00 PM', $page_id);
$hours_sun_label = viar_field_value('viar_contact_hours_sun_label', 'Sunday', $page_id);
$hours_sun_time = viar_field_value('viar_contact_hours_sun_time', 'Closed', $page_id);
$hours_note = viar_field_value('viar_contact_hours_note', '24/7 emergency support available for our traveling clients', $page_id);

if (viar_has_editor_sections()) {
    viar_render_editor_sections_page();
    get_footer();
    return;
}

?>

<main id="primary" class="site-main">

    <!-- SECTION 1: HERO SECTION -->
    <section class="viar-hero-flush viar-hero-flush--soft relative h-[60vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/contact-hero.jpg"
                 class="w-full h-full object-cover grayscale-[20%]"
                 alt="Contact ViaR Travel">
            <div class="absolute inset-0 bg-[#00234B]/80"></div>
        </div>

        <div class="relative z-10 text-center text-white px-6 max-w-3xl mx-auto">
            <span class="font-['Manrope'] text-xs font-semibold uppercase tracking-[0.15em] text-[#C5A059] mb-4 block">
                REACH OUT
            </span>
            <h1 class="font-['Noto_Serif'] text-5xl md:text-6xl mb-6">
                Get In Touch
            </h1>
            <p class="font-['Manrope'] text-lg opacity-90">
                We'd love to hear from you. Our team is ready to assist with your luxury travel needs.
            </p>
        </div>
    </section>

    <!-- SECTION 2: CONTACT FORM -->
    <section class="py-[120px] bg-white">
        <div class="max-w-[800px] mx-auto px-6 md:px-12">

            <div class="text-center mb-12">
                <h2 class="font-['Noto_Serif'] text-4xl text-[#00234B] mb-4">
                    Send Us A Message
                </h2>
                <p class="font-['Manrope'] text-lg text-[#43474e] max-w-xl mx-auto">
                    Fill out the form below and we'll get back to you within 24 hours.
                </p>
            </div>

            <!-- Contact Form -->
            <div class="bg-[#F9F9F9] p-8 md:p-12 border border-[#e2e2e2]">
                <?php viar_render_contact_form(); ?>
            </div>

        </div>
    </section>

    <!-- SECTION 3: CONTACT INFORMATION -->
    <section class="py-[120px] bg-[#F2F0ED]">
        <div class="max-w-[1440px] mx-auto px-6 md:px-12">

            <div class="text-center mb-16">
                <h2 class="font-['Noto_Serif'] text-4xl text-[#00234B] mb-4">
                    <?php echo esc_html($other_ways_title); ?>
                </h2>
                <p class="font-['Manrope'] text-lg text-[#43474e]">
                    <?php echo esc_html($other_ways_intro); ?>
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">

                <!-- Phone -->
                <div class="text-center">
                    <div class="viar-contact-card__icon">
                        <?php viar_render_icon('phone', ['size' => 'xl', 'color' => 'gold', 'label' => __('Phone', 'viar-luxury')]); ?>
                    </div>
                    <h3 class="font-['Noto_Serif'] text-2xl text-[#00234B] mb-3">
                        <?php echo esc_html($phone_card_title); ?>
                    </h3>
                    <p class="font-['Manrope'] text-[#43474e] mb-4">
                        <?php echo nl2br(esc_html($phone_card_description)); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                    </p>
                    <?php if ($contact_phone !== '') : ?>
                        <?php if ($contact_phone_href !== '') : ?>
                            <a href="<?php echo esc_url($contact_phone_href); ?>"
                               class="font-['Manrope'] text-lg font-semibold text-[#C5A059] hover:text-[#00234B] transition-colors">
                                <?php echo esc_html($contact_phone); ?>
                            </a>
                        <?php else : ?>
                            <p class="font-['Manrope'] text-lg font-semibold text-[#C5A059]">
                                <?php echo esc_html($contact_phone); ?>
                            </p>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>

                <!-- Email -->
                <div class="text-center">
                    <div class="viar-contact-card__icon">
                        <?php viar_render_icon('email', ['size' => 'xl', 'color' => 'gold', 'label' => __('Email', 'viar-luxury')]); ?>
                    </div>
                    <h3 class="font-['Noto_Serif'] text-2xl text-[#00234B] mb-3">
                        <?php echo esc_html($email_card_title); ?>
                    </h3>
                    <p class="font-['Manrope'] text-[#43474e] mb-4">
                        <?php echo nl2br(esc_html($email_card_description)); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                    </p>
                    <?php if ($contact_email !== '') : ?>
                        <a href="mailto:<?php echo esc_attr($contact_email); ?>"
                           class="font-['Manrope'] text-lg font-semibold text-[#C5A059] hover:text-[#00234B] transition-colors">
                            <?php echo esc_html($contact_email); ?>
                        </a>
                    <?php endif; ?>
                </div>

                <!-- Office -->
                <div class="text-center">
                    <div class="viar-contact-card__icon">
                        <?php viar_render_icon('address', ['size' => 'xl', 'color' => 'gold', 'label' => __('Office', 'viar-luxury')]); ?>
                    </div>
                    <h3 class="font-['Noto_Serif'] text-2xl text-[#00234B] mb-3">
                        <?php echo esc_html($office_card_title); ?>
                    </h3>
                    <p class="font-['Manrope'] text-[#43474e] mb-4">
                        <?php echo nl2br(esc_html($office_card_description)); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                    </p>
                    <?php if ($contact_address !== '') : ?>
                        <p class="font-['Manrope'] text-lg font-semibold text-[#C5A059]">
                            <?php echo esc_html($contact_address); ?>
                        </p>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </section>

    <!-- SECTION 4: BUSINESS HOURS -->
    <section class="py-[120px] bg-white">
        <div class="max-w-[800px] mx-auto px-6 md:px-12 text-center">

            <h2 class="font-['Noto_Serif'] text-4xl text-[#00234B] mb-12">
                <?php echo esc_html($hours_title); ?>
            </h2>

            <div class="bg-[#F9F9F9] p-8 md:p-12 border border-[#e2e2e2]">
                <div class="space-y-4 font-['Manrope']">
                    <div class="flex justify-between items-center pb-4 border-b border-[#e2e2e2]">
                        <span class="text-[#00234B] font-semibold"><?php echo esc_html($hours_monfri_label); ?></span>
                        <span class="text-[#43474e]"><?php echo esc_html($hours_monfri_time); ?></span>
                    </div>
                    <div class="flex justify-between items-center pb-4 border-b border-[#e2e2e2]">
                        <span class="text-[#00234B] font-semibold"><?php echo esc_html($hours_sat_label); ?></span>
                        <span class="text-[#43474e]"><?php echo esc_html($hours_sat_time); ?></span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-[#00234B] font-semibold"><?php echo esc_html($hours_sun_label); ?></span>
                        <span class="text-[#43474e]"><?php echo esc_html($hours_sun_time); ?></span>
                    </div>
                </div>

                <?php if ($hours_note !== '') : ?>
                    <div class="mt-8 pt-8 border-t border-[#e2e2e2]">
                        <p class="text-sm text-[#43474e] italic">
                            <?php echo esc_html($hours_note); ?>
                        </p>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </section>

    <!-- SECTION 5: CTA SECTION -->
    <section class="py-[120px] bg-[#00234B] text-white">
        <div class="max-w-[1440px] mx-auto px-6 md:px-12 text-center">
            <h2 class="font-['Noto_Serif'] text-4xl md:text-5xl mb-6">
                Ready To Start Planning?
            </h2>
            <p class="font-['Manrope'] text-lg mb-12 max-w-2xl mx-auto opacity-90">
                Browse our curated tours or design a completely bespoke experience.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="<?php echo esc_url(home_url('/bespoke-tours')); ?>"
                   class="px-10 py-5 bg-[#C5A059] text-[#00234B] font-['Manrope'] text-sm font-medium uppercase tracking-[0.05em] hover:bg-white transition-all">
                    Explore Tours
                </a>
                <a href="<?php echo esc_url(viar_vip_transfer_form_url()); ?>"
                   class="px-10 py-5 border-2 border-white text-white font-['Manrope'] text-sm font-medium uppercase tracking-[0.05em] hover:bg-white hover:text-[#00234B] transition-all">
                    VIP Transfers
                </a>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
