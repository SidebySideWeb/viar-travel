<?php
/**
 * Template Name: Vip Transfers Services
 * Template generated from `vip_transfers_services/code.html`
 *
 * @package ViaR_Luxury
 */

get_header();

if (viar_has_editor_sections()) {
    viar_render_editor_sections_page();
    get_footer();
    return;
}

$viar_hero_image = viar_image_url('viar_hero_image', get_template_directory_uri() . '/assets/images/remote-bc1dabf815b0.jpg');
?>
<main class="site-main">
<!-- Hero Section -->
<header class="relative w-full h-[921px] flex items-center overflow-hidden">
<div class="absolute inset-0 z-0">
<img class="w-full h-full object-cover" data-alt="A cinematic, high-angle shot of a sleek black luxury sedan parked on a clean, minimalist cobblestone driveway in front of a modern architectural villa. The lighting is soft morning gold, casting long, elegant shadows. The overall mood is quiet, exclusive, and serene, utilizing a palette of deep navy, charcoal, and alabaster white to match a high-end luxury travel aesthetic." src="<?php echo esc_url($viar_hero_image); ?>"/>
<div class="absolute inset-0 bg-primary/20"></div>
</div>
<div class="relative z-10 max-w-[1440px] mx-auto px-12 w-full">
<div class="max-w-2xl text-white">
<span class="font-label-caps text-label-caps mb-6 block text-secondary-fixed uppercase tracking-[0.3em]">Precision in Motion</span>
<h1 class="font-display text-display mb-8">Seamless Logistics for the Discerning Traveler</h1>
<p class="font-body-lg text-body-lg opacity-90 mb-10 leading-relaxed">
                    Elevate your journey with our bespoke transport solutions. From armored executive protection to private airside greetings, we manage every detail with absolute discretion.
                </p>
<button class="bg-[#C5A059] text-primary px-10 py-5 font-cta text-cta uppercase tracking-widest hover:bg-[#b08d48] transition-all">
                    Inquire for Logistics
                </button>
</div>
</div>
</header>
<!-- Services Grid: Asymmetric Layout -->
<section class="py-[120px] max-w-[1440px] mx-auto px-12">
<div class="grid grid-cols-12 gap-gutter items-start">
<!-- Intro Text Column -->
<div class="col-span-12 lg:col-span-4 sticky top-32 mb-16 lg:mb-0">
<h2 class="font-headline-h1 text-headline-h1 text-primary-container mb-8">Our Signature Services</h2>
<p class="font-body-md text-body-md text-on-surface-variant mb-12 max-w-sm">
                    We believe that luxury is found in the things you don't have to think about. Our logistical experts ensure your arrival is as effortless as your destination.
                </p>
<div class="flex items-center gap-4 group cursor-pointer">
<span class="w-12 h-[1px] bg-secondary group-hover:w-20 transition-all duration-500"></span>
<span class="font-label-caps text-label-caps text-secondary uppercase">View Full Fleet</span>
</div>
</div>
<!-- Services Bento Grid -->
<div class="col-span-12 lg:col-span-8 grid grid-cols-1 md:grid-cols-2 gap-12">
<!-- Service 01 -->
<div class="group">
<div class="aspect-[4/5] overflow-hidden mb-6">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" data-alt="A sleek black luxury SUV parked on a private tarmac in Mykonos, Greece, under a clear blue Mediterranean sky. The Aegean sea is visible in the distance, emphasizing exclusive island arrival." src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/remote-36673107cc96.jpg"/>
</div>
<h3 class="font-headline-h2 text-headline-h2 text-primary mb-3">Private Airport Transfers</h3>
<p class="font-body-md text-body-md text-on-surface-variant">
                        Airside assistance and direct tarmac pickup in over 150 global hubs. Expedited customs clearance and porter services included.
                    </p>
</div>
<!-- Service 02 -->
<div class="group mt-12 md:mt-24">
<div class="aspect-[4/5] overflow-hidden mb-6">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" data-alt="View from the interior of a luxury limousine driving along the Athens Riviera. Through the window, the shimmering Saronic Gulf and coastal palm trees are visible, conveying a premium Greek travel experience." src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/remote-539c1667511c.jpg"/>
</div>
<h3 class="font-headline-h2 text-headline-h2 text-primary mb-3">Travel Concierge</h3>
<p class="font-body-md text-body-md text-on-surface-variant">
                        Beyond the ride. We handle restaurant reservations, local security, and last-minute itinerary adjustments around the clock.
                    </p>
</div>
<!-- Service 03 -->
<div class="group">
<div class="aspect-[4/5] overflow-hidden mb-6">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" data-alt="An armored luxury black SUV stationed outside an exclusive beach club in Mykonos. The architecture is minimalist Greek whitewashed stone, with professional security personnel discreetly positioned nearby." src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/remote-508800e2d306.jpg"/>
</div>
<h3 class="font-headline-h2 text-headline-h2 text-primary mb-3">Executive Protection</h3>
<p class="font-body-md text-body-md text-on-surface-variant">
                        Specialized security personnel and armored vehicle options for high-profile clients visiting complex urban environments.
                    </p>
</div>
<!-- Service 04 -->
<div class="group mt-12 md:mt-24">
<div class="aspect-[4/5] overflow-hidden mb-6">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" data-alt="A high-end courier vehicle parked near a traditional yet modern Greek estate. The setting captures the blend of ancient Mediterranean charm and modern logistical efficiency for sensitive transfers." src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/remote-186711d44c3c.jpg"/>
</div>
<h3 class="font-headline-h2 text-headline-h2 text-primary mb-3">Inter-City Couriers</h3>
<p class="font-body-md text-body-md text-on-surface-variant">
                        Seamless transport of high-value items or sensitive documents between European capitals via private ground or air assets.
                    </p>
</div>
</div>
</div>
</section>
<section class="py-[120px] bg-white border-t border-[#F2F0ED]">
<div class="max-w-[1440px] mx-auto px-12">
<div class="mb-14">
<span class="font-label-caps text-label-caps text-[#C5A059] mb-3 block">Fleet Booking</span>
<h2 class="font-headline-h1 text-headline-h1 text-[#00234B]">Select Your Vehicle</h2>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-10">
<?php
$fleet_query = new WP_Query([
    'post_type' => 'viar_fleet',
    'post_status' => 'publish',
    'posts_per_page' => 9,
]);
if ($fleet_query->have_posts()) :
    while ($fleet_query->have_posts()) :
        $fleet_query->the_post();
        $fleet_excerpt = get_the_excerpt();
        $fleet_label = viar_field_value('viar_fleet_card_label', 'VIP Fleet', get_the_ID());
        ?>
        <a href="<?php echo esc_url(get_permalink()); ?>" class="group block border border-[#00234B]/10 hover:border-[#C5A059] transition-colors p-6">
            <?php $fleet_card_image = viar_image_url('viar_fleet_card_image', '', get_the_ID()); ?>
            <?php if ($fleet_card_image !== '') : ?>
                <img src="<?php echo esc_url($fleet_card_image); ?>" class="w-full h-56 object-cover mb-5" alt="<?php echo esc_attr(get_the_title()); ?>">
            <?php endif; ?>
            <p class="font-label-caps text-[10px] text-[#C5A059] mb-2"><?php echo esc_html($fleet_label); ?></p>
            <h3 class="font-headline-h2 text-2xl text-[#00234B] mb-2"><?php the_title(); ?></h3>
            <p class="font-body-md text-[#00234B]/70 mb-4"><?php echo esc_html($fleet_excerpt); ?></p>
            <span class="font-cta text-cta uppercase tracking-[0.08em] text-[#C5A059]">Book This Fleet</span>
        </a>
        <?php
    endwhile;
    wp_reset_postdata();
else :
    ?>
    <p class="font-body-md text-[#00234B]/70">No fleet vehicles published yet. Add Fleet posts from the WordPress admin.</p>
    <?php
endif;
?>
</div>
</div>
</section>
<!-- Content / Stats Section -->
<section class="bg-[#F2F0ED] py-[120px]">
<div class="max-w-[1440px] mx-auto px-12">
<div class="border-l border-primary/10 pl-12 max-w-4xl">
<h2 class="font-display text-headline-h1 text-primary-container mb-12 leading-tight">
                    Travel is an art. Logistics is the frame that protects it.
                </h2>
<div class="grid grid-cols-1 md:grid-cols-3 gap-16">
<div>
<div class="font-display text-4xl text-secondary mb-2">99.8%</div>
<div class="font-label-caps text-label-caps text-on-surface-variant uppercase">Punctuality Rate</div>
</div>
<div>
<div class="font-display text-4xl text-secondary mb-2">150+</div>
<div class="font-label-caps text-label-caps text-on-surface-variant uppercase">Global Hubs</div>
</div>
<div>
<div class="font-display text-4xl text-secondary mb-2">24/7</div>
<div class="font-label-caps text-label-caps text-on-surface-variant uppercase">Support Desk</div>
</div>
</div>
</div>
</div>
</section>
<!-- Call to Action Section -->
<section class="py-[160px] text-center max-w-[1440px] mx-auto px-12">
<div class="max-w-3xl mx-auto">
<span class="material-symbols-outlined text-4xl text-secondary mb-8">transportation</span>
<h2 class="font-display text-display text-primary mb-8">Your Journey, Perfected.</h2>
<p class="font-body-lg text-body-lg text-on-surface-variant mb-12">
                Connect with our dedicated logistics desk to arrange your global transfers, security details, and concierge needs. One point of contact for every mile of your journey.
            </p>
<div class="flex flex-col sm:flex-row justify-center gap-6">
<button class="bg-[#C5A059] text-primary px-12 py-5 font-cta text-cta uppercase tracking-[0.2em] hover:bg-[#b08d48] transition-all">
                    Inquire for Logistics
                </button>
<button class="border border-[#C5A059] text-[#C5A059] px-12 py-5 font-cta text-cta uppercase tracking-[0.2em] hover:bg-[#C5A059]/5 transition-all">
                    Download Fleet PDF
                </button>
</div>
</div>
</section>
<!-- Map Section Hint -->
<section class="relative h-[614px] w-full overflow-hidden grayscale opacity-50 hover:grayscale-0 transition-all duration-1000">
<img class="w-full h-full object-cover" data-alt="An abstract, high-contrast digital map visualization of the Mediterranean basin, highlighting major logistics nodes and transport routes connecting Athens, the Greek Islands, and Southern Europe." data-location="Mediterranean &amp; Aegean Region" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/remote-90ce2d5059f6.jpg"/>
<div class="absolute inset-0 flex items-center justify-center">
<div class="bg-white px-8 py-4 shadow-xl">
<span class="font-label-caps text-label-caps text-primary">Global Operations Network</span>
</div>
</div>
</section>
<!-- Footer Component -->
</main>
<?php get_footer(); ?>
