<?php
/**
 * Template Name: Secure Booking
 * Template generated from `secure_booking/code.html`
 *
 * @package ViaR_Luxury
 */

get_header();
if (viar_has_editor_sections()) {
    viar_render_editor_sections_page();
    get_footer();
    return;
}

?>
<main class="site-main">
<main class="viar-content-below-header pb-32">
<div class="max-w-[1440px] mx-auto px-12">
<div class="grid grid-cols-12 gap-gutter">
<!-- Content Left: Header & Branding -->
<div class="col-span-12 lg:col-span-4 mb-12 lg:mb-0">
<span class="font-label-caps text-label-caps text-secondary mb-4 block">EXCLUSIVITY REDEFINED</span>
<h1 class="font-headline-h1 text-headline-h1 text-primary-container mb-6">Secure Your Experience</h1>
<p class="font-body-lg text-body-lg text-on-surface-variant max-w-md">
                        Please provide the details for your upcoming journey. Our consultants curate each request to ensure absolute perfection upon your arrival.
                    </p>
<div class="mt-12 space-y-8">
<div class="flex items-start gap-4">
<span class="material-symbols-outlined text-[#C5A059]" data-icon="lock">lock</span>
<div>
<p class="font-body-md font-bold text-primary-container">Secure Processing</p>
<p class="text-sm text-on-surface-variant">Encrypted end-to-end luxury payment gateway.</p>
</div>
</div>
<div class="flex items-start gap-4">
<span class="material-symbols-outlined text-[#C5A059]" data-icon="support_agent">support_agent</span>
<div>
<p class="font-body-md font-bold text-primary-container">Priority Assistance</p>
<p class="text-sm text-on-surface-variant">Dedicated concierge for all inquiry modifications.</p>
</div>
</div>
</div>
</div>
<!-- Content Right: Booking Form -->
<div class="col-span-12 lg:col-span-8">
<div class="bg-primary-container p-12 lg:p-16 shadow-2xl relative overflow-hidden">
<!-- Decorative Branding Line -->
<div class="absolute top-0 right-0 w-32 h-32 opacity-10 pointer-events-none">
<div class="border-t-[1px] border-r-[1px] border-[#C5A059] w-full h-full"></div>
</div>
<form class="space-y-16">
<!-- Step 1: Select Service -->
<section>
<div class="flex items-center gap-4 mb-8">
<span class="font-label-caps text-on-primary opacity-40">01</span>
<h2 class="font-headline-h2 text-headline-h2 text-on-primary">Select Service</h2>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
<label class="group relative cursor-pointer">
<input checked="" class="peer sr-only" name="service" type="radio" value="bespoke"/>
<div class="p-6 border border-[#C5A059]/20 bg-white/5 transition-all duration-300 peer-checked:border-[#C5A059] peer-checked:bg-white/10 group-hover:bg-white/10">
<span class="material-symbols-outlined text-[#C5A059] mb-4 block" data-icon="travel_explore">travel_explore</span>
<p class="font-sans text-xs uppercase tracking-widest font-bold text-on-primary mb-1">Bespoke Tour</p>
<p class="text-xs text-on-primary/60">Tailored itineraries</p>
</div>
</label>
<label class="group relative cursor-pointer">
<input class="peer sr-only" name="service" type="radio" value="vip"/>
<div class="p-6 border border-[#C5A059]/20 bg-white/5 transition-all duration-300 peer-checked:border-[#C5A059] peer-checked:bg-white/10 group-hover:bg-white/10">
<span class="material-symbols-outlined text-[#C5A059] mb-4 block" data-icon="airport_shuttle">airport_shuttle</span>
<p class="font-sans text-xs uppercase tracking-widest font-bold text-on-primary mb-1">VIP Transfer</p>
<p class="text-xs text-on-primary/60">Luxury fleet transit</p>
</div>
</label>
<label class="group relative cursor-pointer">
<input class="peer sr-only" name="service" type="radio" value="consulting"/>
<div class="p-6 border border-[#C5A059]/20 bg-white/5 transition-all duration-300 peer-checked:border-[#C5A059] peer-checked:bg-white/10 group-hover:bg-white/10">
<span class="material-symbols-outlined text-[#C5A059] mb-4 block" data-icon="clinical_notes">clinical_notes</span>
<p class="font-sans text-xs uppercase tracking-widest font-bold text-on-primary mb-1">Consulting</p>
<p class="text-xs text-on-primary/60">Expert planning</p>
</div>
</label>
</div>
</section>
<!-- Step 2: Date Selection (Minimalist Widget) -->
<section>
<div class="flex items-center gap-4 mb-8">
<span class="font-label-caps text-on-primary opacity-40">02</span>
<h2 class="font-headline-h2 text-headline-h2 text-on-primary">Date &amp; Availability</h2>
</div>
<div class="bg-white/5 p-8 border border-white/10">
<div class="flex justify-between items-center mb-6">
<button class="text-[#C5A059]" type="button"><span class="material-symbols-outlined" data-icon="chevron_left">chevron_left</span></button>
<span class="font-sans text-xs uppercase tracking-widest text-on-primary">December 2024</span>
<button class="text-[#C5A059]" type="button"><span class="material-symbols-outlined" data-icon="chevron_right">chevron_right</span></button>
</div>
<div class="grid grid-cols-7 gap-2 text-center mb-4">
<div class="text-[10px] text-on-primary/40 uppercase">Su</div>
<div class="text-[10px] text-on-primary/40 uppercase">Mo</div>
<div class="text-[10px] text-on-primary/40 uppercase">Tu</div>
<div class="text-[10px] text-on-primary/40 uppercase">We</div>
<div class="text-[10px] text-on-primary/40 uppercase">Th</div>
<div class="text-[10px] text-on-primary/40 uppercase">Fr</div>
<div class="text-[10px] text-on-primary/40 uppercase">Sa</div>
</div>
<div class="grid grid-cols-7 gap-2 text-center font-sans text-xs">
<div class="py-2 text-on-primary/20">24</div>
<div class="py-2 text-on-primary/20">25</div>
<div class="py-2 text-on-primary/20">26</div>
<div class="py-2 text-on-primary/20">27</div>
<div class="py-2 text-on-primary/20">28</div>
<div class="py-2 text-on-primary/20">29</div>
<div class="py-2 text-on-primary/20">30</div>
<!-- Real days -->
<div class="py-2 text-on-primary hover:text-[#C5A059] cursor-pointer transition-colors">1</div>
<div class="py-2 text-on-primary hover:text-[#C5A059] cursor-pointer transition-colors">2</div>
<div class="py-2 text-on-primary hover:text-[#C5A059] cursor-pointer transition-colors">3</div>
<div class="py-2 bg-[#C5A059] text-primary-container font-bold">4</div>
<div class="py-2 text-on-primary hover:text-[#C5A059] cursor-pointer transition-colors">5</div>
<div class="py-2 text-on-primary hover:text-[#C5A059] cursor-pointer transition-colors">6</div>
<div class="py-2 text-on-primary hover:text-[#C5A059] cursor-pointer transition-colors">7</div>
<div class="py-2 text-on-primary hover:text-[#C5A059] cursor-pointer transition-colors">8</div>
<div class="py-2 text-on-primary hover:text-[#C5A059] cursor-pointer transition-colors">9</div>
<div class="py-2 text-on-primary hover:text-[#C5A059] cursor-pointer transition-colors">10</div>
<div class="py-2 text-on-primary hover:text-[#C5A059] cursor-pointer transition-colors">11</div>
<div class="py-2 text-on-primary hover:text-[#C5A059] cursor-pointer transition-colors">12</div>
<div class="py-2 text-on-primary hover:text-[#C5A059] cursor-pointer transition-colors">13</div>
<div class="py-2 text-on-primary hover:text-[#C5A059] cursor-pointer transition-colors">14</div>
</div>
</div>
</section>
<!-- Step 3: Passenger Details -->
<section>
<div class="flex items-center gap-4 mb-8">
<span class="font-label-caps text-on-primary opacity-40">03</span>
<h2 class="font-headline-h2 text-headline-h2 text-on-primary">Group Details</h2>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-12">
<div class="relative">
<label class="font-label-caps text-label-caps text-on-primary/60 block mb-2">FULL NAME</label>
<input class="w-full bg-transparent border-0 border-b border-white/20 text-on-primary font-body-md py-2 px-0 form-input-focus placeholder:text-on-primary/20" placeholder="Mr. Alexander Sterling" type="text"/>
</div>
<div class="relative">
<label class="font-label-caps text-label-caps text-on-primary/60 block mb-2">EMAIL ADDRESS</label>
<input class="w-full bg-transparent border-0 border-b border-white/20 text-on-primary font-body-md py-2 px-0 form-input-focus placeholder:text-on-primary/20" placeholder="sterling@private.com" type="email"/>
</div>
<div class="relative">
<label class="font-label-caps text-label-caps text-on-primary/60 block mb-2">PASSENGER COUNT</label>
<select class="w-full bg-transparent border-0 border-b border-white/20 text-on-primary font-body-md py-2 px-0 form-input-focus appearance-none">
<option class="bg-primary-container text-on-primary">Solo Traveler</option>
<option class="bg-primary-container text-on-primary">2 Travelers</option>
<option class="bg-primary-container text-on-primary">Small Group (3-5)</option>
<option class="bg-primary-container text-on-primary">Corporate Party (6+)</option>
</select>
</div>
<div class="relative">
<label class="font-label-caps text-label-caps text-on-primary/60 block mb-2">SPECIAL REQUIREMENTS</label>
<input class="w-full bg-transparent border-0 border-b border-white/20 text-on-primary font-body-md py-2 px-0 form-input-focus placeholder:text-on-primary/20" placeholder="e.g. Dietary, Language, Accessibility" type="text"/>
</div>
</div>
</section>
<!-- Step 4: Payment Summary -->
<section>
<div class="flex items-center gap-4 mb-8">
<span class="font-label-caps text-on-primary opacity-40">04</span>
<h2 class="font-headline-h2 text-headline-h2 text-on-primary">Payment &amp; Confirmation</h2>
</div>
<div class="bg-black/20 p-8 space-y-4">
<div class="flex justify-between border-b border-white/10 pb-4">
<span class="text-on-primary/60 text-sm">Consultation Deposit</span>
<span class="text-on-primary font-sans font-bold">$450.00</span>
</div>
<div class="flex justify-between pt-4">
<span class="text-on-primary font-bold">Total Due Now</span>
<span class="text-[#C5A059] text-2xl font-serif">$450.00</span>
</div>
<p class="text-[10px] text-on-primary/40 italic pt-6">
                                        High-end encrypted processing via Stripe Ultra. No banking data is stored on our servers. Final balance will be invoiced upon itinerary approval.
                                    </p>
</div>
<button class="w-full mt-12 bg-[#C5A059] text-[#00234B] py-6 font-sans text-xs uppercase tracking-[0.3em] font-bold hover:bg-[#DBC08C] transition-all duration-300" type="submit">
                                    Confirm Inquiry &amp; Payment
                                </button>
</section>
</form>
</div>
</div>
</div>
</div>
</main>
<!-- Decorative Canvas Image (Absolute Position for context) -->
<div class="fixed top-0 right-0 -z-10 w-1/3 h-full overflow-hidden opacity-5 pointer-events-none">
<img class="object-cover w-full h-full grayscale" data-alt="A macro photograph of high-end architectural details in a minimalist hotel lobby, featuring sharp geometric lines, premium marble textures, and soft champagne gold accents. The lighting is diffused and atmospheric, highlighting the quiet luxury and serene ambiance of a modern elite consulting space. The color palette is composed of alabaster, deep navy, and antique gold tones." src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/remote-9e3f4c014e93.jpg"/>
</div>
</main>
<?php get_footer(); ?>
