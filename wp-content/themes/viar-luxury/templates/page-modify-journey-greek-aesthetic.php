<?php
/**
 * Template Name: Modify Journey Greek Aesthetic
 * Template generated from `modify_journey_greek_aesthetic/code.html`
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
<div class="flex min-h-screen pt-20">
<!-- Sidebar Navigation -->
<aside class="fixed left-0 top-0 h-full w-72 border-r border-[#00234B]/10 bg-[#F2F0ED] flex flex-col pt-24 pb-12 z-40">
<div class="px-8 mb-10">
<div class="flex items-center gap-4 mb-4">
<img alt="Executive Client Avatar" class="w-12 h-12 rounded-full object-cover grayscale" data-alt="A sophisticated close-up portrait of a high-net-worth individual in a tailored charcoal suit, captured in soft, cinematic side-lighting. The background is a blurred, high-end architectural interior with warm wooden accents. The overall mood is professional, exclusive, and serene, reflecting a quiet luxury aesthetic with muted tones." src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/remote-857fe75a2208.jpg"/>
<div>
<p class="font-label-caps text-label-caps text-[#00234B] opacity-60">Welcome, Member</p>
<p class="font-headline-h2 text-sm font-bold text-[#00234B]">Your Private Concierge</p>
</div>
</div>
</div>
<nav class="flex-1">
<div class="space-y-1">
<a class="flex items-center gap-4 px-8 py-4 font-label-caps text-label-caps text-slate-500 hover:bg-white/50 transition-all group" href="#">
<span class="material-symbols-outlined">dashboard</span>
<span>Dashboard</span>
</a>
<a class="flex items-center gap-4 px-8 py-4 font-label-caps text-label-caps bg-white text-[#00234B] font-bold border-l-4 border-[#C5A059] group" href="#">
<span class="material-symbols-outlined">calendar_today</span>
<span>Active Bookings</span>
</a>
<a class="flex items-center gap-4 px-8 py-4 font-label-caps text-label-caps text-slate-500 hover:bg-white/50 transition-all group" href="#">
<span class="material-symbols-outlined">history</span>
<span>Transfer History</span>
</a>
<a class="flex items-center gap-4 px-8 py-4 font-label-caps text-label-caps text-slate-500 hover:bg-white/50 transition-all group" href="#">
<span class="material-symbols-outlined">event_available</span>
<span>Availability</span>
</a>
<a class="flex items-center gap-4 px-8 py-4 font-label-caps text-label-caps text-slate-500 hover:bg-white/50 transition-all group" href="#">
<span class="material-symbols-outlined">settings</span>
<span>Account Settings</span>
</a>
</div>
</nav>
<div class="px-8 mt-auto space-y-4">
<button class="w-full border border-[#C5A059] text-[#00234B] font-cta text-cta py-3 hover:bg-[#C5A059]/5 transition-colors">Request New Transfer</button>
<div class="flex gap-4 pt-6">
<a class="flex items-center gap-2 font-label-caps text-[10px] text-slate-400 hover:text-[#C5A059]" href="#">
<span class="material-symbols-outlined text-sm">support_agent</span> Support
                    </a>
<a class="flex items-center gap-2 font-label-caps text-[10px] text-slate-400 hover:text-[#C5A059]" href="#">
<span class="material-symbols-outlined text-sm">gavel</span> Legal
                    </a>
</div>
</div>
</aside>
<!-- Main Content Canvas -->
<main class="flex-1 ml-72 px-16 py-12 max-w-5xl">
<!-- Breadcrumbs -->
<div class="flex items-center gap-2 mb-12 text-[#00234B] opacity-50 font-label-caps text-[10px]">
<span>DASHBOARD</span>
<span class="material-symbols-outlined text-[12px]">chevron_right</span>
<span>ACTIVE BOOKINGS</span>
<span class="material-symbols-outlined text-[12px]">chevron_right</span>
<span class="text-[#00234B] opacity-100 font-bold">EDIT TRANSFER</span>
</div>
<section class="grid grid-cols-12 gap-12">
<!-- Left: Editorial Context -->
<div class="col-span-5">
<h1 class="font-headline-h1 text-headline-h1 text-[#00234B] mb-6">Modify Journey</h1>
<p class="font-body-lg text-body-lg text-on-surface-variant mb-12 leading-relaxed">
                        Refining your itinerary ensures every detail aligns with your evolving schedule. Our chauffeurs remain briefed on your preferences in real-time.
                    </p>
<div class="bg-white p-8 border border-[#F2F0ED] shadow-sm">
<div class="mb-8">
<span class="font-label-caps text-label-caps text-[#C5A059]">Vehicle Selected</span>
<h3 class="font-headline-h2 text-xl text-[#00234B] mt-2">Mercedes-Benz S-Class Maybach</h3>
</div>
<img alt="Luxury Sedan" class="w-full h-48 object-cover mb-6" data-alt="A prestigious Mercedes-Benz S-Class Maybach parked at the entrance of a luxury whitewashed estate in Santorini, overlooking the Aegean Sea. The architecture features iconic Cycladic curves and stone accents, with the golden hour light casting a warm glow over the scene, embodying ultimate Mediterranean luxury and exclusivity." src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/screen.png"/>
<div class="space-y-4">
<div class="flex justify-between items-center border-b border-[#F2F0ED] pb-2">
<span class="font-label-caps text-[10px] text-slate-400">Current Status</span>
<span class="font-label-caps text-[10px] text-[#00234B]">CONFIRMED</span>
</div>
<div class="flex justify-between items-center border-b border-[#F2F0ED] pb-2">
<span class="font-label-caps text-[10px] text-slate-400">Reservation ID</span>
<span class="font-label-caps text-[10px] text-[#00234B]">#VIA-8829-X</span>
</div>
</div>
</div>
</div>
<!-- Right: Focused Form -->
<div class="col-span-7 bg-white p-12 shadow-sm border border-[#F2F0ED]">
<form class="space-y-10">
<div>
<label class="font-label-caps text-label-caps text-[#00234B] block mb-2">Pickup Location</label>
<input class="form-input-minimal font-body-md text-[#00234B]" type="text" value="Hôtel Ritz Paris, 15 Pl. Vendôme"/>
</div>
<div class="grid grid-cols-2 gap-8">
<div>
<label class="font-label-caps text-label-caps text-[#00234B] block mb-2">Drop-off Destination</label>
<input class="form-input-minimal font-body-md text-[#00234B]" type="text" value="Paris Charles de Gaulle (CDG)"/>
</div>
<div>
<label class="font-label-caps text-label-caps text-[#00234B] block mb-2">Flight Number</label>
<input class="form-input-minimal font-body-md text-[#00234B]" type="text" value="AF006"/>
</div>
</div>
<div class="grid grid-cols-2 gap-8">
<div>
<label class="font-label-caps text-label-caps text-[#00234B] block mb-2">Date</label>
<input class="form-input-minimal font-body-md text-[#00234B]" type="date" value="2024-11-12"/>
</div>
<div>
<label class="font-label-caps text-label-caps text-[#00234B] block mb-2">Time</label>
<input class="form-input-minimal font-body-md text-[#00234B]" type="time" value="14:30"/>
</div>
</div>
<div>
<label class="font-label-caps text-label-caps text-[#00234B] block mb-4">Special Requirements &amp; Concierge Notes</label>
<textarea class="w-full border border-[#00234B]/10 p-4 font-body-md text-[#00234B] focus:outline-none focus:border-[#C5A059] resize-none" placeholder="e.g. Bollinger R.D. 2008 chilled to 8°C, child seat for 4-year-old, morning newspaper (FT)..." rows="4">Bollinger La Grande Année chilled, specific fragrance 'Santal 33' in-cabin, child seat (Group 1) requested.</textarea>
</div>
<div class="flex items-center gap-6 pt-6">
<button class="bg-[#C5A059] text-[#00234B] px-10 py-4 font-cta text-cta uppercase tracking-widest hover:bg-[#C5A059]/90 transition-all active:scale-95 shadow-md" type="submit">
                                Save Changes
                            </button>
<button class="text-slate-400 font-cta text-cta uppercase tracking-widest hover:text-[#00234B] transition-colors" type="button">
                                Cancel
                            </button>
</div>
</form>
</div>
</section>
<!-- Bottom Spacer -->
<div class="h-24"></div>
</main>
</div>
</main>
<?php get_footer(); ?>
