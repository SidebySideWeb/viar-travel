<?php
/**
 * Single Fleet template.
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
    $fleet_subtitle = viar_field_value('viar_fleet_card_label', 'VIP Fleet', get_the_ID());
    $fleet_description = get_the_excerpt() ?: 'Reserve this fleet option with our concierge team and finalize your transfer details instantly.';
    $fleet_hero_image = viar_image_url('viar_fleet_hero_image', '', get_the_ID());
    ?>
    <main class="site-main">
        <section class="max-w-[1440px] mx-auto px-6 md:px-12 py-20">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
                <div class="lg:col-span-6">
                    <div class="overflow-hidden bg-[#F2F0ED]">
                        <?php if ($fleet_hero_image !== '') : ?>
                        <?php
                        viar_render_responsive_image([
                            'attachment_id' => viar_image_attachment_id('viar_fleet_hero_image', get_the_ID()),
                            'url' => $fleet_hero_image,
                            'size' => 'viar-card',
                            'sizes' => '(max-width: 1024px) 100vw, 600px',
                            'class' => 'w-full h-[280px] md:h-[520px] object-cover',
                            'alt' => get_the_title(),
                            'loading' => 'eager',
                            'fetchpriority' => 'high',
                            'lcp' => true,
                        ]);
                        ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="lg:col-span-6">
                    <span class="font-label-caps text-label-caps text-[#C5A059] mb-4 block"><?php echo esc_html($fleet_subtitle); ?></span>
                    <h1 class="font-headline-h1 text-headline-h1 text-[#00234B] mb-6"><?php the_title(); ?></h1>
                    <p class="font-body-lg text-body-lg text-[#00234B]/70 mb-10"><?php echo esc_html($fleet_description); ?></p>
                    <div class="bg-[#F9F9F9] p-8 md:p-10 border border-[#e2e2e2]">
                        <?php viar_render_vip_transfer_form(); ?>
                    </div>
                </div>
            </div>
        </section>
        <?php viar_render_editor_content(); ?>
    </main>
<?php
endwhile;

get_footer();
