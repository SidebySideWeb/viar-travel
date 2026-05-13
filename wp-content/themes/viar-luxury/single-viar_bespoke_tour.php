<?php
/**
 * Single Bespoke Tour template.
 *
 * @package ViaR_Luxury
 */

get_header();

if (viar_has_editor_sections()) {
    viar_render_editor_sections_page();
    get_footer();
    return;
}

while (have_posts()) :
    the_post();
    $tour_regions = wp_get_post_terms(get_the_ID(), 'viar_tour_region', ['fields' => 'names']);
    $tour_experiences = wp_get_post_terms(get_the_ID(), 'viar_tour_experience_type', ['fields' => 'names']);
    $tour_meta = trim(implode(' • ', array_filter([$tour_regions[0] ?? '', $tour_experiences[0] ?? ''])));
    $tour_shortcode = viar_field_value('viar_tour_booking_shortcode', '[bookingpress_form service_id="2"]', get_the_ID());
    $tour_hero_image = viar_image_url('viar_tour_hero_image', '', get_the_ID());
    ?>
    <main class="site-main">
        <section class="max-w-[1440px] mx-auto px-12 py-20">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
                <div class="lg:col-span-7">
                    <?php if ($tour_hero_image !== '') : ?>
                        <img src="<?php echo esc_url($tour_hero_image); ?>" class="w-full h-[620px] object-cover" alt="<?php echo esc_attr(get_the_title()); ?>">
                    <?php endif; ?>
                </div>
                <div class="lg:col-span-5">
                    <?php if ($tour_meta !== '') : ?>
                        <span class="font-label-caps text-label-caps text-[#C5A059] mb-4 block"><?php echo esc_html($tour_meta); ?></span>
                    <?php endif; ?>
                    <h1 class="font-headline-h1 text-headline-h1 text-[#00234B] mb-6"><?php the_title(); ?></h1>
                    <p class="font-body-lg text-body-lg text-[#00234B]/70 mb-10"><?php echo esc_html(get_the_excerpt()); ?></p>
                    <div class="bg-white border border-[#C5A059]/30 p-8 mb-12">
                        <?php echo do_shortcode($tour_shortcode); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="max-w-[1440px] mx-auto px-12 py-10">
            <div class="prose prose-slate max-w-none">
                <?php the_content(); ?>
            </div>
        </section>
    </main>
<?php
endwhile;

get_footer();
