<?php
/**
 * Template Name: ViaR Contact
 *
 * Contact page with WPForms integration
 *
 * @package ViaR_Luxury
 */

get_header();

$contact_phone = get_theme_mod('viar_footer_phone', '+30 000 000 0000');
$contact_email = get_theme_mod('viar_footer_email', 'concierge@viartravel.com');
$contact_address = get_theme_mod('viar_footer_address', 'Athens, Greece');
$contact_phone_href = viar_phone_href($contact_phone);

if (viar_has_editor_sections()) {
    viar_render_editor_sections_page();
    get_footer();
    return;
}

?>

<main id="primary" class="site-main">

    <!-- SECTION 1: HERO SECTION -->
    <section class="viar-hero-flush relative h-[60vh] flex items-center justify-center overflow-hidden">
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

            <!-- WPForms Contact Form -->
            <div class="bg-[#F9F9F9] p-8 md:p-12 border border-[#e2e2e2]">
                <?php echo do_shortcode('[wpforms id="15" title="false"]'); ?>
            </div>

        </div>
    </section>

    <!-- SECTION 3: CONTACT INFORMATION -->
    <section class="py-[120px] bg-[#F2F0ED]">
        <div class="max-w-[1440px] mx-auto px-6 md:px-12">

            <div class="text-center mb-16">
                <h2 class="font-['Noto_Serif'] text-4xl text-[#00234B] mb-4">
                    Other Ways To Reach Us
                </h2>
                <p class="font-['Manrope'] text-lg text-[#43474e]">
                    Prefer to contact us directly? We're here to help.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">

                <!-- Phone -->
                <div class="text-center">
                    <div class="viar-contact-card__icon">
                        <?php viar_render_icon('phone', ['size' => 'xl', 'color' => 'gold', 'label' => __('Phone', 'viar-luxury')]); ?>
                    </div>
                    <h3 class="font-['Noto_Serif'] text-2xl text-[#00234B] mb-3">
                        Phone
                    </h3>
                    <p class="font-['Manrope'] text-[#43474e] mb-4">
                        Call us Monday - Friday<br>
                        9:00 AM - 6:00 PM (EET)
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
                        Email
                    </h3>
                    <p class="font-['Manrope'] text-[#43474e] mb-4">
                        Send us an email anytime<br>
                        We'll respond within 24 hours
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
                        Office
                    </h3>
                    <p class="font-['Manrope'] text-[#43474e] mb-4">
                        Visit us at our Athens office<br>
                        By appointment only
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
                Business Hours
            </h2>

            <div class="bg-[#F9F9F9] p-8 md:p-12 border border-[#e2e2e2]">
                <div class="space-y-4 font-['Manrope']">
                    <div class="flex justify-between items-center pb-4 border-b border-[#e2e2e2]">
                        <span class="text-[#00234B] font-semibold">Monday - Friday</span>
                        <span class="text-[#43474e]">9:00 AM - 6:00 PM</span>
                    </div>
                    <div class="flex justify-between items-center pb-4 border-b border-[#e2e2e2]">
                        <span class="text-[#00234B] font-semibold">Saturday</span>
                        <span class="text-[#43474e]">10:00 AM - 4:00 PM</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-[#00234B] font-semibold">Sunday</span>
                        <span class="text-[#43474e]">Closed</span>
                    </div>
                </div>

                <div class="mt-8 pt-8 border-t border-[#e2e2e2]">
                    <p class="text-sm text-[#43474e] italic">
                        24/7 emergency support available for our traveling clients
                    </p>
                </div>
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
