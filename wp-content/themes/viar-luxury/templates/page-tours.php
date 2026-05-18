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
<main class="site-main w-full max-w-full min-w-0 overflow-x-clip">
<!-- Hero Header Section -->
<header class="viar-content-below-header pb-[80px] pt-8 bg-white">
<div class="max-w-[1440px] mx-auto px-6 md:px-12">
<div class="max-w-3xl">
<h1 class="font-headline-h1 text-headline-h1 text-[#00234B] mb-6"><?php echo esc_html($viar_hero_title); ?></h1>
<p class="font-body-lg text-body-lg text-[#00234B]/70 leading-relaxed"><?php echo esc_html($viar_hero_description); ?></p>
</div>
</div>
</header>
<!-- Filter & Utility Section (static: sticky + z-index was painting over tour cards on scroll) -->
<section class="bg-white border-y border-[#F2F0ED] py-6 mb-12">
<form method="get" class="max-w-[1440px] mx-auto px-6 md:px-12 flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between lg:gap-10">
<div class="grid w-full grid-cols-1 gap-6 sm:grid-cols-2 sm:gap-x-8 lg:max-w-2xl lg:flex-1">
<div class="flex min-w-0 flex-col gap-2">
<span id="viar-filter-region-label" class="font-label-caps text-label-caps text-[#00234B]">Region</span>
<span class="relative block w-full">
          <select name="region" aria-labelledby="viar-filter-region-label" class="w-full appearance-none border border-[#00234B]/20 bg-white py-2.5 pl-3 pr-9 text-xs text-[#00234B]">
              <option value="">All Regions</option>
              <?php foreach ($regions as $region) : ?>
                  <option value="<?php echo esc_attr($region->slug); ?>" <?php selected($selected_region, $region->slug); ?>>
                      <?php echo esc_html($region->name); ?>
                  </option>
              <?php endforeach; ?>
          </select>
          <span class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 text-[10px] text-[#00234B]/60">▼</span>
          </span>
      </div>
<div class="flex min-w-0 flex-col gap-2">
<span id="viar-filter-experience-label" class="font-label-caps text-label-caps text-[#00234B]">Experience Type</span>
<span class="relative block w-full">
          <select name="experience" aria-labelledby="viar-filter-experience-label" class="w-full appearance-none border border-[#00234B]/20 bg-white py-2.5 pl-3 pr-9 text-xs text-[#00234B]">
              <option value="">All Types</option>
              <?php foreach ($experience_types as $experience_type) : ?>
                  <option value="<?php echo esc_attr($experience_type->slug); ?>" <?php selected($selected_experience, $experience_type->slug); ?>>
                      <?php echo esc_html($experience_type->name); ?>
                  </option>
              <?php endforeach; ?>
          </select>
          <span class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 text-[10px] text-[#00234B]/60">▼</span>
          </span>
      </div>
</div>
<div class="flex flex-col gap-4 sm:flex-row sm:flex-wrap sm:items-center lg:shrink-0">
<div class="flex flex-wrap items-center gap-3">
<button type="submit" class="bg-[#C5A059] text-[#00234B] px-5 py-2.5 text-xs uppercase tracking-[0.08em]">Apply</button>
<?php if ($selected_region || $selected_experience) : ?>
<a href="<?php echo esc_url(get_permalink()); ?>" class="text-xs uppercase tracking-[0.08em] text-[#00234B]/60 hover:text-[#00234B]">Reset</a>
      <?php endif; ?>
</div>
<div class="font-label-caps text-label-caps text-[#00234B]/40 sm:ml-auto">
        Showing <?php echo esc_html((string) $tour_query->post_count); ?> Curated Journeys
      </div>
</div>
</form>
</section>
<!-- Masonry Gallery Section -->
<div class="max-w-[1440px] mx-auto px-6 md:px-12 mb-32 min-w-0">
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
</div>
<!-- CTA Section (Alabaster Background) -->
<section class="bg-[#F2F0ED] py-32">
<div class="max-w-[1440px] mx-auto px-6 md:px-12 text-center">
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
