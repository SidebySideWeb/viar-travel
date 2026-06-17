<?php
/**
 * Template Name: Payment Confirmation
 * Template generated from `payment_confirmation/code.html`
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
<!-- Main Content Canvas -->
<main class="pb-32 max-w-7xl mx-auto px-12">
<div class="grid grid-cols-12 gap-12">
<!-- Payment Column -->
<div class="col-span-12 lg:col-span-7">
<header class="mb-12">
<h1 class="font-headline-h1 text-headline-h1 text-primary mb-4">Secure Your Journey</h1>
<p class="font-body-lg text-body-lg text-on-surface-variant max-w-lg">Confirm your bespoke travel arrangements through our encrypted portal.</p>
</header>
<!-- Payment Form Section -->
<section class="space-y-12">
<div class="flex gap-8 border-b border-surface-container pb-4">
<button class="font-label-caps text-label-caps text-[#C5A059] border-b-2 border-[#C5A059] pb-4">Credit Card</button>
<button class="font-label-caps text-label-caps text-on-surface-variant hover:text-primary transition-colors pb-4">Wire Transfer</button>
</div>
<form class="space-y-8">
<div class="space-y-6">
<div class="relative">
<label class="font-label-caps text-label-caps block mb-2 text-primary">Cardholder Name</label>
<input class="w-full bg-transparent border-b border-primary py-3 px-0 focus:ring-0 focus:border-[#C5A059] transition-colors placeholder:text-surface-variant" placeholder="ALEXANDER VANE" type="text"/>
</div>
<div class="relative">
<label class="font-label-caps text-label-caps block mb-2 text-primary">Card Number</label>
<div class="flex items-center border-b border-primary">
<input class="w-full bg-transparent py-3 px-0 focus:ring-0 border-none placeholder:text-surface-variant" placeholder="0000 0000 0000 0000" type="text"/>
<span class="material-symbols-outlined text-on-surface-variant mr-2">credit_card</span>
</div>
</div>
<div class="grid grid-cols-2 gap-12">
<div class="relative">
<label class="font-label-caps text-label-caps block mb-2 text-primary">Expiry Date</label>
<input class="w-full bg-transparent border-b border-primary py-3 px-0 focus:ring-0 focus:border-[#C5A059] transition-colors placeholder:text-surface-variant" placeholder="MM / YY" type="text"/>
</div>
<div class="relative">
<label class="font-label-caps text-label-caps block mb-2 text-primary">CVV</label>
<input class="w-full bg-transparent border-b border-primary py-3 px-0 focus:ring-0 focus:border-[#C5A059] transition-colors placeholder:text-surface-variant" placeholder="***" type="password"/>
</div>
</div>
</div>
<div class="pt-8">
<button class="w-full bg-[#C5A059] text-[#00234B] font-cta text-cta py-6 uppercase tracking-widest hover:bg-[#b38f4d] transition-all flex justify-center items-center gap-4" type="submit">
                                Confirm &amp; Secure Payment
                                <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'wght' 600;">lock</span>
</button>
<p class="mt-6 text-center font-label-caps text-[10px] text-on-surface-variant flex items-center justify-center gap-2">
<span class="material-symbols-outlined text-xs">verified_user</span>
                                BANK-GRADE ENCRYPTION SECURED BY AES-256
                            </p>
</div>
</form>
</section>
<!-- Hidden Success State (Concept only for structure) -->
<!-- 
                <section class="bg-[#F2F0ED] p-12 mt-12 border border-[#C5A059]/20">
                    <span class="material-symbols-outlined text-6xl text-[#C5A059] mb-6" data-weight="fill">check_circle</span>
                    <h2 class="font-headline-h2 text-headline-h2 text-primary mb-2">Payment Successful</h2>
                    <p class="font-body-md text-body-md text-on-surface-variant mb-8">Ref: VR-9823-XLS</p>
                    <button class="border border-[#C5A059] text-[#C5A059] px-8 py-3 font-cta text-cta hover:bg-[#C5A059] hover:text-[#00234B] transition-all">Contact Your Dedicated Consultant</button>
                </section>
                -->
</div>
<!-- Itinerary Summary Column -->
<div class="col-span-12 lg:col-span-5">
<aside class="sticky top-40 bg-[#F2F0ED] p-10 space-y-10">
<div>
<h3 class="font-label-caps text-label-caps text-on-surface-variant mb-6 border-b border-on-surface/5 pb-4">Itinerary Summary</h3>
<div class="space-y-6">
<div class="flex gap-6 items-start">
<div class="w-24 h-24 overflow-hidden shrink-0">
<img class="w-full h-full object-cover" data-alt="A high-resolution, editorial style photograph of a vintage luxury sports car driving along the winding coastal roads of the French Riviera at dusk. The warm golden hour light reflects off the ocean and the polished metallic finish of the car. The composition is clean and minimalist, focusing on the elegance of private travel and the serene atmosphere of a high-end Mediterranean vacation." src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/remote-70b4941b3261.jpg"/>
</div>
<div>
<h4 class="font-headline-h2 text-lg text-primary">Côte d'Azur Grand Tour</h4>
<p class="font-body-md text-sm text-on-surface-variant">Private Chauffeur &amp; Helicopter Transfer</p>
<p class="font-body-md text-sm text-on-surface-variant mt-1">Oct 14 — Oct 21, 2024</p>
</div>
</div>
<div class="space-y-3 pt-6 border-t border-on-surface/5">
<div class="flex justify-between font-body-md text-on-surface-variant">
<span>Bespoke Itinerary Curation</span>
<span>€12,500.00</span>
</div>
<div class="flex justify-between font-body-md text-on-surface-variant">
<span>Luxury Transfers (VIP)</span>
<span>€4,200.00</span>
</div>
<div class="flex justify-between font-body-md text-on-surface-variant">
<span>Consulting &amp; Concierge Fee</span>
<span>€1,800.00</span>
</div>
</div>
<div class="pt-6 border-t border-on-surface/10">
<div class="flex justify-between items-baseline">
<span class="font-headline-h2 text-headline-h2 text-primary">Total</span>
<div class="text-right">
<span class="font-headline-h2 text-headline-h2 text-primary">€18,500.00</span>
<p class="font-label-caps text-[10px] text-on-surface-variant mt-1">VAT INCLUDED</p>
</div>
</div>
</div>
</div>
</div>
<div class="bg-white p-6 space-y-4">
<div class="flex gap-4 items-center">
<span class="material-symbols-outlined text-[#C5A059]">support_agent</span>
<div>
<p class="font-label-caps text-[11px] text-on-surface-variant">DEDICATED CONSULTANT</p>
<p class="font-body-md font-semibold text-primary">Julian St. Clair</p>
</div>
</div>
</div>
</aside>
</div>
</div>
<!-- Success Message Hidden by default, showing layout pattern -->
<div class="mt-24 bg-[#00234B] text-white p-16 grid md:grid-cols-2 gap-12 items-center">
<div>
<div class="flex items-center gap-4 mb-6">
<span class="material-symbols-outlined text-[#C5A059] text-5xl" style="font-variation-settings: 'FILL' 1;">verified</span>
<h2 class="font-headline-h1 text-headline-h2">Reservation Confirmed</h2>
</div>
<p class="font-body-lg text-slate-300 mb-8 max-w-md">Your bespoke experience is now being finalized by our elite travel team. You will receive a secure digital dossier within 4 hours.</p>
<div class="space-y-2">
<p class="font-label-caps text-slate-400">REFERENCE NUMBER</p>
<p class="font-body-md tracking-[0.3em] font-bold text-[#C5A059]">VIA-7729-DELUXE</p>
</div>
</div>
<div class="flex flex-col gap-4 items-start md:items-end">
<button class="bg-[#C5A059] text-[#00234B] px-10 py-4 font-cta text-cta hover:bg-white transition-all uppercase w-full md:w-auto">Contact Your Dedicated Consultant</button>
<button class="border border-white/20 text-white px-10 py-4 font-cta text-cta hover:border-[#C5A059] hover:text-[#C5A059] transition-all uppercase w-full md:w-auto">Download Receipt (PDF)</button>
</div>
</div>
</main>
</main>
<?php get_footer(); ?>
