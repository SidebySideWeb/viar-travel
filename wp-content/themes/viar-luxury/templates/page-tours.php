<?php
/**
 * Template Name: Tours
 * Template generated from `bespoke_tours/code.html`
 *
 * @package ViaR_Luxury
 */

get_header();

if (viar_has_editor_sections()) {
    viar_render_editor_sections_page();
    get_footer();
    return;
}

$viar_hero_title = viar_field_value('viar_hero_title', 'Bespoke Tours');
$viar_hero_description = viar_field_value('viar_hero_description', 'We do not simply book trips; we architect experiences. Our consulting approach begins with a deep understanding of your preferences, crafting exclusive itineraries that merge cultural depth with the absolute height of luxury. From private island charters to after-hours museum access, every detail is curated for the discerning few.');
$viar_hero_cta_label = viar_field_value('viar_hero_cta_label', 'Start Your Inquiry');
$viar_hero_cta_url = viar_field_value('viar_hero_cta_url', home_url('/inquiry'));

$selected_region = isset($_GET['region']) ? sanitize_text_field(wp_unslash($_GET['region'])) : '';
$selected_experience = isset($_GET['experience']) ? sanitize_text_field(wp_unslash($_GET['experience'])) : '';

$regions = get_terms([
    'taxonomy' => 'viar_tour_region',
    'hide_empty' => true,
]);
$experience_types = get_terms([
    'taxonomy' => 'viar_tour_experience_type',
    'hide_empty' => true,
]);

$tax_query = ['relation' => 'AND'];
if ($selected_region !== '') {
    $tax_query[] = [
        'taxonomy' => 'viar_tour_region',
        'field' => 'slug',
        'terms' => $selected_region,
    ];
}
if ($selected_experience !== '') {
    $tax_query[] = [
        'taxonomy' => 'viar_tour_experience_type',
        'field' => 'slug',
        'terms' => $selected_experience,
    ];
}

$tour_query_args = [
    'post_type' => 'viar_bespoke_tour',
    'post_status' => 'publish',
    'posts_per_page' => 12,
];
if (count($tax_query) > 1) {
    $tour_query_args['tax_query'] = $tax_query;
}
$tour_query = new WP_Query($tour_query_args);
?>
<main class="site-main">
<!-- Hero Header Section -->
<header class="pt-[180px] pb-[80px] bg-white">
<div class="max-w-[1440px] mx-auto px-12">
<div class="max-w-3xl">
<h1 class="font-headline-h1 text-headline-h1 text-[#00234B] mb-6"><?php echo esc_html($viar_hero_title); ?></h1>
<p class="font-body-lg text-body-lg text-[#00234B]/70 leading-relaxed"><?php echo esc_html($viar_hero_description); ?></p>
</div>
</div>
</header>
<!-- Filter & Utility Section -->
<section class="sticky top-[88px] z-40 bg-white/95 backdrop-blur-md border-y border-[#F2F0ED] py-6 mb-12">
<form method="get" class="max-w-[1440px] mx-auto px-12 flex flex-col md:flex-row justify-between items-center gap-6">
<div class="flex flex-col md:flex-row gap-6 md:gap-12 w-full md:w-auto">
<label class="font-label-caps text-label-caps text-[#00234B] flex items-center gap-2">
          Region
          <span class="relative inline-flex items-center">
          <select name="region" class="appearance-none border border-[#00234B]/20 pl-3 pr-9 py-2 text-xs bg-white min-w-[170px]">
              <option value="">All Regions</option>
              <?php foreach ($regions as $region) : ?>
                  <option value="<?php echo esc_attr($region->slug); ?>" <?php selected($selected_region, $region->slug); ?>>
                      <?php echo esc_html($region->name); ?>
                  </option>
              <?php endforeach; ?>
          </select>
          <span class="pointer-events-none absolute right-3 text-[10px] text-[#00234B]/60">▼</span>
          </span>
      </label>
<label class="font-label-caps text-label-caps text-[#00234B] flex items-center gap-2">
          Experience Type
          <span class="relative inline-flex items-center">
          <select name="experience" class="appearance-none border border-[#00234B]/20 pl-3 pr-9 py-2 text-xs bg-white min-w-[190px]">
              <option value="">All Types</option>
              <?php foreach ($experience_types as $experience_type) : ?>
                  <option value="<?php echo esc_attr($experience_type->slug); ?>" <?php selected($selected_experience, $experience_type->slug); ?>>
                      <?php echo esc_html($experience_type->name); ?>
                  </option>
              <?php endforeach; ?>
          </select>
          <span class="pointer-events-none absolute right-3 text-[10px] text-[#00234B]/60">▼</span>
          </span>
      </label>
<button type="submit" class="bg-[#C5A059] text-[#00234B] px-5 py-2 text-xs uppercase tracking-[0.08em]">Apply</button>
<?php if ($selected_region || $selected_experience) : ?>
<a href="<?php echo esc_url(get_permalink()); ?>" class="text-xs uppercase tracking-[0.08em] text-[#00234B]/60">Reset</a>
      <?php endif; ?>
</div>
<div class="font-label-caps text-label-caps text-[#00234B]/40">
        Showing <?php echo esc_html((string) $tour_query->post_count); ?> Curated Journeys
      </div>
</form>
</section>
<!-- Masonry Gallery Section -->
<main class="max-w-[1440px] mx-auto px-12 mb-32">
<div class="columns-1 md:columns-2 lg:columns-3 gap-8 space-y-8">
<?php if ($tour_query->have_posts()) : ?>
    <?php while ($tour_query->have_posts()) : $tour_query->the_post(); ?>
        <?php
        $region_terms = wp_get_post_terms(get_the_ID(), 'viar_tour_region', ['fields' => 'names']);
        $experience_terms = wp_get_post_terms(get_the_ID(), 'viar_tour_experience_type', ['fields' => 'names']);
        $card_meta = trim(implode(' • ', array_filter([
            $region_terms[0] ?? '',
            $experience_terms[0] ?? '',
        ])));
        ?>
        <article class="break-inside-avoid group cursor-pointer">
            <a href="<?php echo esc_url(get_permalink()); ?>" class="block">
                <div class="overflow-hidden bg-[#F2F0ED] mb-6">
                    <?php $tour_card_image = viar_image_url('viar_tour_card_image', '', get_the_ID()); ?>
                    <?php if ($tour_card_image !== '') : ?>
                        <img src="<?php echo esc_url($tour_card_image); ?>" class="w-full object-cover grayscale hover:grayscale-0 transition-all duration-700 ease-out scale-100 group-hover:scale-105" alt="<?php echo esc_attr(get_the_title()); ?>">
                    <?php endif; ?>
                </div>
                <div class="space-y-2">
                    <?php if ($card_meta !== '') : ?>
                        <span class="font-label-caps text-label-caps text-[#C5A059]"><?php echo esc_html($card_meta); ?></span>
                    <?php endif; ?>
                    <h3 class="font-headline-h2 text-headline-h2 text-[#00234B]"><?php the_title(); ?></h3>
                    <p class="font-body-md text-body-md text-[#00234B]/70"><?php echo esc_html(get_the_excerpt()); ?></p>
                    <span class="inline-block font-cta text-cta text-[#C5A059] border-b border-transparent hover:border-[#C5A059] transition-all pt-2">Discover More</span>
                </div>
            </a>
        </article>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
<?php else : ?>
    <p class="font-body-md text-[#00234B]/70">No bespoke tours found for the selected filters.</p>
<?php endif; ?>
</div>
</main>
<!-- CTA Section (Alabaster Background) -->
<section class="bg-[#F2F0ED] py-32">
<div class="max-w-[1440px] mx-auto px-12 text-center">
<h2 class="font-headline-h1 text-headline-h1 text-[#00234B] mb-8 max-w-2xl mx-auto">Design Your Own Signature Itinerary</h2>
<p class="font-body-lg text-body-lg text-[#00234B]/60 mb-12 max-w-xl mx-auto">Speak with a dedicated travel advisor to begin curating a journey that transcends the ordinary.</p>
<a href="<?php echo esc_url($viar_hero_cta_url); ?>" class="bg-[#00234B] text-white px-12 py-5 font-cta text-cta uppercase tracking-widest hover:bg-[#003a7a] transition-all duration-300 inline-block"><?php echo esc_html($viar_hero_cta_label); ?></a>
</div>
</section>
<!-- Footer Navigation Shell -->
<section class="max-w-6xl mx-auto px-6 py-16"><div class="bg-white/90 border border-[#C5A059]/30 p-8"><?php echo do_shortcode('[bookingpress_form service_id="2"]'); ?></div></section>
<?php viar_render_editor_content(); ?>
</main>
<?php get_footer(); ?>
