<?php
/**
 * Template generated from `viar_home/code.html`
 *
 * @package ViaR_Luxury
 */

get_header();

if (viar_has_editor_sections()) {
    viar_render_editor_sections_page();
    get_footer();
    return;
}

$viar_hero_title = viar_field_value('viar_hero_title', 'Travel as an Art Form.');
$viar_hero_description = viar_field_value('viar_hero_description', 'Curation for the discerning few. We design experiences that transcend the ordinary.');
$viar_hero_cta_label = viar_field_value('viar_hero_cta_label', 'Begin Your Journey');
$viar_hero_cta_url = viar_field_value('viar_hero_cta_url', home_url('/inquiry'));
$viar_hero_image = viar_image_url('viar_hero_image', get_template_directory_uri() . '/assets/images/remote-2018f584e2ab.jpg');
$viar_hero_vimeo_id = viar_get_home_hero_vimeo_id();
$viar_hero_has_popup_video = $viar_hero_vimeo_id !== '';
$viar_home_tours_label = viar_field_value('viar_home_tours_label', 'WORLDWIDE CURATION');
$viar_home_tours_title = viar_field_value('viar_home_tours_title', 'EXPLORE OUR TRIPS');
$viar_home_zigzag_row1_label = viar_field_value('viar_home_zigzag_row1_label', 'Personalized Vision');
$viar_home_zigzag_row1_title = viar_field_value('viar_home_zigzag_row1_title', 'Unrivaled Expertise');
$viar_home_zigzag_row1_description = viar_field_value('viar_home_zigzag_row1_description', 'Our consultants don\'t just book travel; they architect memories. We spend hundreds of hours each year scouting locations, vetting properties, and building relationships with local luminaries to ensure your journey is seamless.');
$viar_home_zigzag_row1_cta_label = viar_field_value('viar_home_zigzag_row1_cta_label', 'Learn About Our Process');
$viar_home_zigzag_row1_cta_url = viar_field_value('viar_home_zigzag_row1_cta_url', home_url('/about'));
$viar_home_zigzag_row1_image = viar_image_url('viar_home_zigzag_row1_image', get_template_directory_uri() . '/assets/images/remote-bb60d3b02c37.jpg');
$viar_home_zigzag_row2_label = viar_field_value('viar_home_zigzag_row2_label', 'Global Network');
$viar_home_zigzag_row2_title = viar_field_value('viar_home_zigzag_row2_title', 'Beyond the Guidebook');
$viar_home_zigzag_row2_description = viar_field_value('viar_home_zigzag_row2_description', 'Through our exclusive network of global partners, we provide access to places that aren\'t on the map. From private museum tours after hours to dinner with a Michelin chef in their own home, we open doors that are closed to others.');
$viar_home_zigzag_row2_cta_label = viar_field_value('viar_home_zigzag_row2_cta_label', 'Explore Access');
$viar_home_zigzag_row2_cta_url = viar_field_value('viar_home_zigzag_row2_cta_url', home_url('/contact'));
$viar_home_zigzag_row2_image = viar_image_url('viar_home_zigzag_row2_image', get_template_directory_uri() . '/assets/images/remote-18886ca600da.jpg');
$viar_home_standard_label = viar_field_value('viar_home_standard_label', 'THE VIAR STANDARD');
$viar_home_standard_title = viar_field_value('viar_home_standard_title', 'Luxury is not a price point. It is a level of service and a commitment to detail.');
$viar_home_standard_item1_title = viar_field_value('viar_home_standard_item1_title', 'VIP Transfers');
$viar_home_standard_item1_desc = viar_field_value('viar_home_standard_item1_desc', 'Our fleet of Mercedes-Benz S-Class and V-Class vehicles ensures your transition from port to property is as refined as the destination itself. Professional chauffeurs trained in the highest standards of discretion and safety.');
$viar_home_standard_item2_title = viar_field_value('viar_home_standard_item2_title', '24/7 Concierge');
$viar_home_standard_item2_desc = viar_field_value('viar_home_standard_item2_desc', 'A single point of contact available at any hour, in any time zone. Whether it\'s a last-minute table reservation or a sudden change in flight plans, our team manages the logistics while you enjoy the journey.');
$viar_home_standard_item3_title = viar_field_value('viar_home_standard_item3_title', 'Travel Insurance');
$viar_home_standard_item3_desc = viar_field_value('viar_home_standard_item3_desc', 'Comprehensive protection tailored for high-value itineraries. We manage every aspect of risk, ensuring your investment and your peace of mind are fully secured throughout your travels.');
$viar_home_testimonials_label = viar_field_value('viar_home_testimonials_label', 'TESTIMONIALS');
$viar_home_testimonials_title = viar_field_value('viar_home_testimonials_title', 'Voices of the Discerning');
$viar_home_testimonial_1_quote = viar_field_value('viar_home_testimonial_1_quote', '"ViaR didn\'t just plan a trip; they understood our family\'s dynamic and created a space where we could truly reconnect. Every detail was handled with invisible precision."');
$viar_home_testimonial_1_author = viar_field_value('viar_home_testimonial_1_author', '— ARTHUR W., LONDON');
$viar_home_testimonial_2_quote = viar_field_value('viar_home_testimonial_2_quote', '"Their access to private estates in Tuscany is something I haven\'t seen in twenty years of luxury travel. The transfers were flawless, and the local guides were true experts."');
$viar_home_testimonial_2_author = viar_field_value('viar_home_testimonial_2_author', '— ELENA G., NEW YORK');

$home_tours_query = new WP_Query([
    'post_type' => 'viar_bespoke_tour',
    'post_status' => 'publish',
    'posts_per_page' => 5,
]);
?>
<main class="site-main">
<!-- Section 1: Hero -->
<section class="viar-hero-flush viar-hero-flush--soft viar-home-hero relative h-screen w-full flex items-center justify-center overflow-hidden<?php echo $viar_hero_has_popup_video ? ' viar-home-hero--has-video' : ''; ?>">
<?php
viar_render_hero_background($viar_hero_image, 'ViaR Travel homepage hero', 'w-full h-full object-cover grayscale-[20%]', (int) get_queried_object_id(), 'viar_hero_image');
?>
<?php if ($viar_hero_has_popup_video) : ?>
<div class="viar-home-hero__content relative z-10 text-center text-white px-6">
<h1 class="font-display text-display mb-6 md:mb-8 max-w-4xl mx-auto"><?php echo esc_html($viar_hero_title); ?></h1>
<p class="font-body-lg text-body-lg mb-10 md:mb-12 max-w-xl mx-auto opacity-90"><?php echo esc_html($viar_hero_description); ?></p>
    <?php viar_render_hero_play_button(); ?>
</div>
<?php else : ?>
<div class="relative z-10 text-center text-white px-6">
<h1 class="font-display text-display mb-8 max-w-4xl mx-auto"><?php echo esc_html($viar_hero_title); ?></h1>
<p class="font-body-lg text-body-lg mb-12 max-w-xl mx-auto opacity-90"><?php echo esc_html($viar_hero_description); ?></p>
<a href="<?php echo esc_url($viar_hero_cta_url); ?>" class="px-10 py-5 bg-[#C5A059] text-[#00234B] font-cta text-cta uppercase tracking-widest hover:bg-white transition-colors duration-500 inline-block"><?php echo esc_html($viar_hero_cta_label); ?></a>
</div>
<?php endif; ?>
<div class="absolute bottom-12 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 opacity-50">
<span class="text-xs font-label-caps tracking-widest uppercase">Scroll</span>
<span class="material-symbols-outlined animate-bounce">expand_more</span>
</div>
</section>
<?php if ($viar_hero_has_popup_video) : ?>
    <?php viar_render_hero_video_modal($viar_hero_vimeo_id); ?>
<?php endif; ?>
<!-- Section 2: Explore Our Trips (Carousel) -->
<section class="py-[120px] bg-white">
<div class="max-w-[1440px] mx-auto px-6 md:px-12 min-w-0">
<div class="flex flex-col md:flex-row md:justify-between md:items-end gap-8 mb-16">
<div>
<span class="font-label-caps text-label-caps text-secondary mb-4 block"><?php echo esc_html($viar_home_tours_label); ?></span>
<h2 class="font-headline-h1 text-headline-h1 text-primary"><?php echo esc_html($viar_home_tours_title); ?></h2>
</div>
<div class="flex gap-4 shrink-0">
<button class="w-12 h-12 flex items-center justify-center border border-outline-variant hover:border-secondary transition-colors">
<span class="material-symbols-outlined">arrow_back</span>
</button>
<button class="w-12 h-12 flex items-center justify-center border border-outline-variant hover:border-secondary transition-colors">
<span class="material-symbols-outlined">arrow_forward</span>
</button>
</div>
</div>
<div class="flex min-w-0 overflow-x-auto gap-8 no-scrollbar pb-12">
<?php if ($home_tours_query->have_posts()) : ?>
    <?php while ($home_tours_query->have_posts()) : $home_tours_query->the_post(); ?>
        <?php
        $region_terms = wp_get_post_terms(get_the_ID(), 'viar_tour_region', ['fields' => 'names']);
        $experience_terms = wp_get_post_terms(get_the_ID(), 'viar_tour_experience_type', ['fields' => 'names']);
        $card_meta = trim(implode(' • ', array_filter([$region_terms[0] ?? '', $experience_terms[0] ?? ''])));
        ?>
        <article class="w-[min(100%,28rem)] max-w-[450px] shrink-0 min-w-0 group cursor-pointer">
            <a href="<?php echo esc_url(get_permalink()); ?>" class="block min-w-0 w-full">
                <div class="aspect-[4/5] overflow-hidden mb-6">
                    <?php
                    $tour_post_id = get_the_ID();
                    $tour_card_image = viar_image_url('viar_tour_card_image', '', $tour_post_id);
                    $tour_card_attachment_id = viar_image_attachment_id('viar_tour_card_image', $tour_post_id);
                    ?>
                    <?php if ($tour_card_image !== '' || $tour_card_attachment_id > 0) : ?>
                        <?php
                        viar_render_responsive_image([
                            'attachment_id' => $tour_card_attachment_id,
                            'url' => $tour_card_image,
                            'size' => 'viar-card',
                            'sizes' => '(max-width: 768px) 90vw, 450px',
                            'class' => 'w-full h-full object-cover transition-transform duration-700 group-hover:scale-105',
                            'alt' => get_the_title(),
                        ]);
                        ?>
                    <?php endif; ?>
                </div>
                <?php if ($card_meta !== '') : ?>
                    <span class="font-label-caps text-[10px] text-secondary tracking-[0.2em] mb-2 block"><?php echo esc_html($card_meta); ?></span>
                <?php endif; ?>
                <div class="min-w-0 w-full">
                <h3 class="font-headline-h2 text-headline-h2 text-primary mb-2 break-words"><?php the_title(); ?></h3>
                <p class="font-body-md text-body-md text-on-surface-variant line-clamp-2 break-words"><?php echo esc_html(get_the_excerpt()); ?></p>
                </div>
            </a>
        </article>
    <?php endwhile; wp_reset_postdata(); ?>
<?php else : ?>
    <p class="font-body-md text-on-surface-variant">No curated tours published yet.</p>
<?php endif; ?>
</div>
</div>
</section>
<!-- Section 3: Bespoke Consulting (Alternating) -->
<section class="bg-[#F2F0ED] py-[120px]">
<div class="max-w-[1440px] mx-auto px-6 md:px-12">
<!-- Row 1 -->
<div class="flex flex-col md:flex-row items-center gap-24 mb-32">
<div class="w-full md:w-1/2">
<?php
viar_render_responsive_image([
    'attachment_id' => viar_image_attachment_id('viar_home_zigzag_row1_image', (int) get_queried_object_id()),
    'url' => $viar_home_zigzag_row1_image,
    'size' => 'viar-content',
    'sizes' => '(max-width: 768px) 100vw, 50vw',
    'class' => 'w-full h-[280px] sm:h-[400px] md:h-[600px] object-cover shadow-sm',
    'alt' => '',
]);
?>
</div>
<div class="w-full md:w-1/2 space-y-8">
<span class="font-label-caps text-label-caps text-secondary uppercase tracking-[0.3em]"><?php echo esc_html($viar_home_zigzag_row1_label); ?></span>
<h2 class="font-headline-h1 text-headline-h1 text-primary"><?php echo esc_html($viar_home_zigzag_row1_title); ?></h2>
<p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed">
                        <?php echo esc_html($viar_home_zigzag_row1_description); ?>
                    </p>
<a href="<?php echo esc_url($viar_home_zigzag_row1_cta_url); ?>" class="font-cta text-cta text-secondary border-b border-secondary pb-1 uppercase tracking-widest hover:text-primary transition-colors inline-block"><?php echo esc_html($viar_home_zigzag_row1_cta_label); ?></a>
</div>
</div>
<!-- Row 2 -->
<div class="flex flex-col-reverse md:flex-row items-center gap-24">
<div class="w-full md:w-1/2 space-y-8">
<span class="font-label-caps text-label-caps text-secondary uppercase tracking-[0.3em]"><?php echo esc_html($viar_home_zigzag_row2_label); ?></span>
<h2 class="font-headline-h1 text-headline-h1 text-primary"><?php echo esc_html($viar_home_zigzag_row2_title); ?></h2>
<p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed">
                        <?php echo esc_html($viar_home_zigzag_row2_description); ?>
                    </p>
<a href="<?php echo esc_url($viar_home_zigzag_row2_cta_url); ?>" class="font-cta text-cta text-secondary border-b border-secondary pb-1 uppercase tracking-widest hover:text-primary transition-colors inline-block"><?php echo esc_html($viar_home_zigzag_row2_cta_label); ?></a>
</div>
<div class="w-full md:w-1/2">
<?php
viar_render_responsive_image([
    'attachment_id' => viar_image_attachment_id('viar_home_zigzag_row2_image', (int) get_queried_object_id()),
    'url' => $viar_home_zigzag_row2_image,
    'size' => 'viar-content',
    'sizes' => '(max-width: 768px) 100vw, 50vw',
    'class' => 'w-full h-[280px] sm:h-[400px] md:h-[600px] object-cover shadow-sm',
    'alt' => '',
]);
?>
</div>
</div>
</div>
</section>
<!-- Section 4: The ViaR Standard -->
<section class="bg-primary-container text-white py-[120px]">
<div class="max-w-[1440px] mx-auto px-6 md:px-12 text-center">
<span class="font-label-caps text-label-caps text-secondary-fixed mb-8 block tracking-[0.4em]"><?php echo esc_html($viar_home_standard_label); ?></span>
<h2 class="font-headline-h1 text-headline-h1 mb-24 max-w-4xl mx-auto"><?php echo esc_html($viar_home_standard_title); ?></h2>
<div class="grid md:grid-cols-3 gap-16 text-left border-t border-white/10 pt-16">
<div class="space-y-6">
<h3 class="font-headline-h2 text-2xl text-secondary-fixed"><?php echo esc_html($viar_home_standard_item1_title); ?></h3>
<p class="font-body-md text-slate-400"><?php echo esc_html($viar_home_standard_item1_desc); ?></p>
</div>
<div class="space-y-6">
<h3 class="font-headline-h2 text-2xl text-secondary-fixed"><?php echo esc_html($viar_home_standard_item2_title); ?></h3>
<p class="font-body-md text-slate-400"><?php echo esc_html($viar_home_standard_item2_desc); ?></p>
</div>
<div class="space-y-6">
<h3 class="font-headline-h2 text-2xl text-secondary-fixed"><?php echo esc_html($viar_home_standard_item3_title); ?></h3>
<p class="font-body-md text-slate-400"><?php echo esc_html($viar_home_standard_item3_desc); ?></p>
</div>
</div>
</div>
</section>
<!-- Section 5: Client Reviews -->
<section class="py-[120px] bg-white">
<div class="max-w-[1440px] mx-auto px-6 md:px-12">
<div class="grid md:grid-cols-2 gap-12 md:gap-24 items-start">
<div>
<span class="font-label-caps text-label-caps text-secondary mb-4 block"><?php echo esc_html($viar_home_testimonials_label); ?></span>
<h2 class="font-headline-h1 text-headline-h1 text-primary"><?php echo esc_html($viar_home_testimonials_title); ?></h2>
</div>
<div class="space-y-24">
<div class="border-l-2 border-secondary pl-6 md:pl-12">
<p class="font-display text-2xl italic text-primary mb-6"><?php echo esc_html($viar_home_testimonial_1_quote); ?></p>
<span class="font-label-caps text-xs text-on-surface-variant"><?php echo esc_html($viar_home_testimonial_1_author); ?></span>
</div>
<div class="border-l-2 border-secondary pl-6 md:pl-12">
<p class="font-display text-2xl italic text-primary mb-6"><?php echo esc_html($viar_home_testimonial_2_quote); ?></p>
<span class="font-label-caps text-xs text-on-surface-variant"><?php echo esc_html($viar_home_testimonial_2_author); ?></span>
</div>
</div>
</div>
</div>
</section>
<?php viar_render_editor_content(); ?>
</main>
<?php get_footer(); ?>
