<?php
/**
 * Template Name: Inquiry
 * Template generated from `travel_consulting_greek_aesthetic/code.html`
 *
 * @package ViaR_Luxury
 */

get_header();

if (viar_has_editor_sections()) {
    viar_render_editor_sections_page();
    get_footer();
    return;
}

$viar_hero_eyebrow = viar_field_value('viar_hero_eyebrow', 'THE ART OF CONSULTING');
$viar_hero_title = viar_field_value('viar_hero_title', 'Where Vision Meets Unparalleled Execution');
$viar_hero_description = viar_field_value('viar_hero_description', 'Beyond mere travel planning, we orchestrate life-defining experiences through the lens of architectural precision and cultural depth.');
$viar_hero_cta_label = viar_field_value('viar_hero_cta_label', 'Begin Your Consultation');
$viar_hero_image = viar_image_url('viar_hero_image', get_template_directory_uri() . '/assets/images/remote-e6e41969906c.jpg');
$viar_card_image = viar_image_url('viar_card_image', get_template_directory_uri() . '/assets/images/remote-5110d57fda35.jpg');
?>
<main class="site-main">
<main>
<!-- Hero Section -->
<section class="relative h-[921px] flex items-center justify-center overflow-hidden bg-primary-container">
<div class="absolute inset-0 z-0">
<img class="w-full h-full object-cover opacity-60" data-alt="A cinematic, wide-angle shot of a lone luxury yacht anchored in a secluded, turquoise Mediterranean cove during the golden hour. The sunlight reflects softly off the water, creating a serene and exclusive atmosphere. The overall aesthetic is one of quiet luxury and atmospheric minimalism, utilizing deep navies and warm champagne gold tones. The lighting is soft and directional, emphasizing the stillness and privacy of the location." src="<?php echo esc_url($viar_hero_image); ?>"/>
<div class="absolute inset-0 hero-gradient"></div>
</div>
<div class="relative z-10 max-w-[1440px] mx-auto px-12 text-center">
<span class="font-label-caps text-label-caps text-[#C5A059] block mb-6"><?php echo esc_html($viar_hero_eyebrow); ?></span>
<h1 class="font-display text-display text-white mb-8 max-w-4xl mx-auto"><?php echo esc_html($viar_hero_title); ?></h1>
<p class="font-body-lg text-body-lg text-white/80 max-w-2xl mx-auto mb-12"><?php echo esc_html($viar_hero_description); ?></p>
<div class="w-px h-24 bg-[#C5A059] mx-auto"></div>
</div>
</section>
<!-- The Art of Consulting / Narrative Section -->
<section class="py-[120px] bg-white">
<div class="max-w-[1440px] mx-auto px-12 grid grid-cols-12 gap-gutter items-center">
<div class="col-span-12 md:col-span-5">
<span class="font-label-caps text-label-caps text-[#00234B] opacity-50 block mb-4 text-left">ESTABLISHED TRUST</span>
<h2 class="font-headline-h1 text-headline-h1 text-[#00234B] mb-8 leading-tight">The Art of the <br/><span class="italic">Personalized Vision</span></h2>
<p class="font-body-md text-body-md text-on-surface-variant mb-6">True travel consulting is a collaborative dialogue. We don't just book destinations; we decode your aspirations to build a temporal sanctuary. Every journey is a blank canvas, treated with the reverence of a masterpiece.</p>
<p class="font-body-md text-body-md text-on-surface-variant mb-12">Our methodology blends high-touch human intuition with exclusive global intelligence, ensuring your time is spent in meaningful pursuit of rarity.</p>
<button class="border border-[#C5A059] text-[#00234B] px-10 py-4 font-cta text-cta hover:bg-[#C5A059] transition-all duration-300">Read Our Manifesto</button>
</div>
<div class="col-span-12 md:col-start-7 md:col-span-6 relative">
<img class="w-full aspect-[4/5] object-cover" data-alt="An editorial-style photograph of a minimalist, high-end design studio with floor-to-ceiling windows overlooking a misty landscape. A large oak table holds architectural sketches and a single antique compass, lit by soft, natural northern light. The palette is dominated by alabaster and muted navy tones, evoking a sense of calm, professional curation and quiet intellectualism. The mood is focused and serene, suggesting the thoughtful planning of a bespoke journey." src="<?php echo esc_url($viar_card_image); ?>"/>
<div class="absolute -bottom-8 -left-8 bg-[#F2F0ED] p-12 hidden lg:block">
<div class="text-4xl font-serif text-[#00234B] mb-2 italic">18</div>
<div class="font-label-caps text-label-caps text-[#00234B]/60">YEARS OF CURATION</div>
</div>
</div>
</div>
</section>
<!-- Strategic Itinerary Design / Bento Grid -->
<section class="py-[120px] bg-primary-container text-white overflow-hidden">
<div class="max-w-[1440px] mx-auto px-12">
<div class="flex flex-col md:flex-row justify-between items-end mb-20 border-b border-white/10 pb-12">
<div class="max-w-xl">
<span class="font-label-caps text-label-caps text-[#C5A059] block mb-4">METHODOLOGY</span>
<h2 class="font-headline-h1 text-headline-h1">Strategic Itinerary Design</h2>
</div>
<p class="font-body-md text-body-md text-white/60 max-w-md hidden md:block">A rigorous framework that balances logistical precision with the serendipity of discovery.</p>
</div>
<div class="grid grid-cols-12 gap-8">
<!-- Bento Card 1 -->
<div class="col-span-12 md:col-span-8 group relative overflow-hidden">
<div class="aspect-[16/9] overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" data-alt="A breathtaking, wide shot of an architectural masterpiece villa perched on a cliffside in Switzerland, surrounded by snow-capped peaks and mirrored in a crystal-clear alpine lake. The lighting is crisp and blue-toned, reflecting a high-key, modern aesthetic. The atmosphere is one of profound isolation and luxury, perfectly aligning with the brand's commitment to strategic and exclusive destination selection." src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/remote-3416b76834bb.jpg"/>
</div>
<div class="absolute inset-0 bg-gradient-to-t from-primary-container via-transparent to-transparent opacity-60"></div>
<div class="absolute bottom-0 left-0 p-10">
<h3 class="font-headline-h2 text-headline-h2 mb-2">Architectural Flow</h3>
<p class="font-body-md text-white/70 max-w-sm">Designing routes that follow the natural rhythm of your energy and curiosity.</p>
</div>
</div>
<!-- Bento Card 2 -->
<div class="col-span-12 md:col-span-4 bg-white/5 backdrop-blur-sm p-10 flex flex-col justify-between border border-white/10">
<span class="material-symbols-outlined text-[#C5A059] text-4xl" data-icon="hub">hub</span>
<div>
<h3 class="font-headline-h2 text-headline-h2 mb-4">Global Network</h3>
<p class="font-body-md text-white/70">Instant access to on-the-ground intelligence in over 140 sovereign territories.</p>
</div>
</div>
<!-- Bento Card 3 -->
<div class="col-span-12 md:col-span-4 border border-white/10 p-10 flex flex-col justify-between">
<span class="material-symbols-outlined text-[#C5A059] text-4xl" data-icon="schedule">schedule</span>
<div>
<h3 class="font-headline-h2 text-headline-h2 mb-4">Precision Timing</h3>
<p class="font-body-md text-white/70">Seamless transitions managed by our dedicated flight and transfer coordination desk.</p>
</div>
</div>
<!-- Bento Card 4 -->
<div class="col-span-12 md:col-span-8 group relative overflow-hidden">
<div class="aspect-[16/7] overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" data-alt="A minimalist, high-angle view of a vintage car driving along a winding coastal road in the South of France during sunset. The golden hour light casts long, elegant shadows and highlights the warm champagne gold of the horizon. The image represents the fluidity and prestige of VIP transfers, maintaining a clean, editorial look with high contrast and sophisticated colors." src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/remote-98120acf7f15.jpg"/>
</div>
<div class="absolute inset-0 bg-gradient-to-t from-primary-container via-transparent to-transparent opacity-60"></div>
<div class="absolute bottom-0 left-0 p-10">
<h3 class="font-headline-h2 text-headline-h2 mb-2">The Transit Experience</h3>
<p class="font-body-md text-white/70 max-w-sm">Elevating the space between destinations into a curated environment of comfort.</p>
</div>
</div>
</div>
</div>
</section>
<!-- Cultural Curation Section -->
<section class="py-[120px] bg-[#F2F0ED]">
<div class="max-w-[1440px] mx-auto px-12">
<div class="text-center mb-24">
<span class="font-label-caps text-label-caps text-[#00234B] opacity-50 block mb-4">THE INTELLECTUAL LENS</span>
<h2 class="font-display text-display text-[#00234B]">Cultural Curation</h2>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-16">
<div class="space-y-8">
<img class="w-full aspect-square object-cover" data-alt="A close-up, high-detail shot of artisanal silk weaving in a dimly lit studio in Kyoto. The focus is on the golden threads catching a single beam of light, highlighting the texture and heritage of the craft. The atmosphere is reverent and quiet, representing cultural curation and the brand's focus on deep, authentic experiences. Muted navy and gold accents dominate the lighting." src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/remote-af11d251cfad.jpg"/>
<div>
<h4 class="font-headline-h2 text-[#00234B] mb-4">Heritage Access</h4>
<p class="font-body-md text-[#00234B]/70">Private viewings of national archives and closed-door sessions with master artisans.</p>
</div>
</div>
<div class="space-y-8 md:pt-24">
<img class="w-full aspect-square object-cover" data-alt="The grand interior of a historic European opera house, captured from the perspective of a private royal box. The velvet curtains are deep navy, and the ornate gold leaf detailing on the balconies is illuminated by soft, warm chandeliers. The setting is luxurious and exclusive, emphasizing the brand's ability to provide private access to the world's most prestigious cultural venues." src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/remote-6983f39c38f1.jpg"/>
<div>
<h4 class="font-headline-h2 text-[#00234B] mb-4">Artisan Liaison</h4>
<p class="font-body-md text-[#00234B]/70">Curated introductions to contemporary tastemakers and cultural stewards.</p>
</div>
</div>
<div class="space-y-8">
<img class="w-full aspect-square object-cover" data-alt="A minimalist table setting at a high-end, private vineyard in Tuscany during twilight. A single glass of red wine sits next to a handwritten menu on textured paper. The background shows rolling hills under a deep indigo sky. The lighting is moody and atmospheric, focusing on the sensory and exclusive nature of the dining experience, consistent with the brand's minimalist and high-end aesthetic." src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/remote-9e4220ef974b.jpg"/>
<div>
<h4 class="font-headline-h2 text-[#00234B] mb-4">Sensory Narratives</h4>
<p class="font-body-md text-[#00234B]/70">Culinary and olfactory journeys designed to mirror the soul of a destination.</p>
</div>
</div>
</div>
</div>
</section>
<!-- Private Access Section -->
<section class="py-[120px] bg-white border-t border-[#F2F0ED]">
<div class="max-w-[1440px] mx-auto px-12 text-center">
<div class="max-w-3xl mx-auto">
<span class="material-symbols-outlined text-[#C5A059] text-5xl mb-8" data-icon="key">key</span>
<h2 class="font-headline-h1 text-headline-h1 text-[#00234B] mb-8 italic">Private Access is the Ultimate Luxury</h2>
<p class="font-body-lg text-body-lg text-on-surface-variant mb-12">Our clients exist in a world where everything is available but very little is truly private. We specialize in the unreachable—exclusive-use properties, after-hours museum tours, and unscheduled air corridors.</p>
<div class="grid grid-cols-2 md:grid-cols-4 gap-8 py-12 border-y border-[#F2F0ED]">
<div class="text-center">
<div class="font-display text-4xl text-[#00234B] mb-2">94%</div>
<div class="font-label-caps text-label-caps text-[#C5A059]">OFF-MARKET LISTINGS</div>
</div>
<div class="text-center">
<div class="font-display text-4xl text-[#00234B] mb-2">24/7</div>
<div class="font-label-caps text-label-caps text-[#C5A059]">GLOBAL CONCIERGE</div>
</div>
<div class="text-center">
<div class="font-display text-4xl text-[#00234B] mb-2">Instant</div>
<div class="font-label-caps text-label-caps text-[#C5A059]">FLIGHT CHARTERING</div>
</div>
<div class="text-center">
<div class="font-display text-4xl text-[#00234B] mb-2">Zero</div>
<div class="font-label-caps text-label-caps text-[#C5A059]">PUBLIC FOOTPRINT</div>
</div>
</div>
</div>
</div>
</section>
<!-- CTA Section -->
<section class="py-[120px] bg-[#00234B]">
<div class="max-w-[1440px] mx-auto px-12 flex flex-col items-center">
<h2 class="font-display text-display text-white text-center mb-12"><?php echo esc_html($viar_hero_cta_label); ?></h2>
<div class="w-full max-w-xl">
<form class="space-y-8">
<div>
<label class="font-label-caps text-label-caps text-white/50 block mb-2">NAME</label>
<input class="w-full bg-transparent border-0 border-b border-white/20 text-white focus:ring-0 focus:border-[#C5A059] py-4 transition-colors" type="text"/>
</div>
<div>
<label class="font-label-caps text-label-caps text-white/50 block mb-2">EMAIL ADDRESS</label>
<input class="w-full bg-transparent border-0 border-b border-white/20 text-white focus:ring-0 focus:border-[#C5A059] py-4 transition-colors" type="email"/>
</div>
<div>
<label class="font-label-caps text-label-caps text-white/50 block mb-2">VISION &amp; INTERESTS</label>
<textarea class="w-full bg-transparent border-0 border-b border-white/20 text-white focus:ring-0 focus:border-[#C5A059] py-4 min-h-[100px] transition-colors"></textarea>
</div>
<div class="pt-8">
<button class="w-full bg-[#C5A059] text-[#00234B] py-6 font-cta text-cta uppercase tracking-widest hover:bg-[#D4B373] transition-colors">Submit Inquiry</button>
</div>
</form>
</div>
</div>
</section>
<?php viar_render_editor_content(); ?>
</main>
</main>
<?php get_footer(); ?>
