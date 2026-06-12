<?php
/**
 * Template Name: Fleet Booking
 *
 * @package ViaR_Luxury
 */

get_header();

if (viar_has_editor_sections()) {
    viar_render_editor_sections_page();
    get_footer();
    return;
}

$fleet_subtitle = viar_field_value('viar_fleet_subtitle', 'VIP Transfers');
$fleet_title = viar_field_value('viar_fleet_title', get_the_title());
$fleet_description = viar_field_value(
    'viar_fleet_description',
    'Reserve this fleet option with our concierge team and finalize your transfer details instantly.'
);
$fleet_image = viar_field_value(
    'viar_fleet_image',
    esc_url(get_template_directory_uri() . '/assets/images/remote-a8dae0725b5f.jpg')
);
$fleet_shortcode = viar_field_value('viar_fleet_booking_shortcode', '[bookingpress_form service_id="1"]');
?>
<main class="site-main">
    <section class="max-w-[1440px] mx-auto px-12 py-20">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            <div class="lg:col-span-6">
                <div class="overflow-hidden bg-[#F2F0ED]">
                    <img src="<?php echo esc_url($fleet_image); ?>" alt="<?php echo esc_attr($fleet_title); ?>" class="w-full h-[520px] object-cover">
                </div>
            </div>
            <div class="lg:col-span-6">
                <span class="font-label-caps text-label-caps text-[#C5A059] mb-4 block"><?php echo esc_html($fleet_subtitle); ?></span>
                <h1 class="font-headline-h1 text-headline-h1 text-[#00234B] mb-6"><?php echo esc_html($fleet_title); ?></h1>
                <p class="font-body-lg text-body-lg text-[#00234B]/70 mb-10"><?php echo esc_html($fleet_description); ?></p>
                <div class="bg-white border border-[#C5A059]/30 p-8">
                    <?php echo do_shortcode($fleet_shortcode); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                    <?php viar_render_messenger_buttons(['context' => 'form']); ?>
                </div>
            </div>
        </div>
    </section>
    <?php viar_render_editor_content(); ?>
</main>
<?php get_footer(); ?>
