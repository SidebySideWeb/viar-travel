<?php
/**
 * Template Name: Availability Results
 * Template generated from `availability_results/code.html`
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
<!-- TopAppBar -->
<!-- SideNavBar (Hidden on main content flow as per suppression rules for focused tasks, but including shell for context) -->
<aside class="hidden lg:flex flex-col pt-24 pb-12 h-screen w-72 fixed left-0 top-0 border-r border-[#00234B]/10 bg-[#F2F0ED]">
<div class="px-8 mb-12">
<p class="font-label-caps text-[10px] text-slate-500 uppercase mb-1">Your Private Concierge</p>
<h3 class="font-headline-h2 text-xl text-[#00234B]">Welcome, Member</h3>
</div>
<nav class="flex-1 space-y-1">
<a class="flex items-center gap-4 px-8 py-4 text-slate-500 hover:bg-white/50 transition-all font-label-caps text-sm tracking-widest uppercase" href="#">
<span class="material-symbols-outlined" data-icon="dashboard">dashboard</span> Dashboard
            </a>
<a class="flex items-center gap-4 px-8 py-4 bg-white text-[#00234B] font-bold border-l-4 border-[#C5A059] font-label-caps text-sm tracking-widest uppercase" href="#">
<span class="material-symbols-outlined" data-icon="calendar_today">calendar_today</span> Active Bookings
            </a>
<a class="flex items-center gap-4 px-8 py-4 text-slate-500 hover:bg-white/50 transition-all font-label-caps text-sm tracking-widest uppercase" href="#">
<span class="material-symbols-outlined" data-icon="history">history</span> Transfer History
            </a>
<a class="flex items-center gap-4 px-8 py-4 text-slate-500 hover:bg-white/50 transition-all font-label-caps text-sm tracking-widest uppercase" href="#">
<span class="material-symbols-outlined" data-icon="event_available">event_available</span> Availability
            </a>
<a class="flex items-center gap-4 px-8 py-4 text-slate-500 hover:bg-white/50 transition-all font-label-caps text-sm tracking-widest uppercase" href="#">
<span class="material-symbols-outlined" data-icon="settings">settings</span> Account Settings
            </a>
</nav>
<div class="px-8 mt-auto">
<button class="w-full py-4 bg-[#C5A059] text-[#00234B] font-cta text-label-caps uppercase tracking-widest hover:opacity-90 transition-opacity">
                Request New Transfer
            </button>
</div>
</aside>
<!-- Main Content -->
<main class="lg:ml-72 pt-32 pb-24 px-8 md:px-16 max-w-[1440px]">
<!-- Search Header -->
<header class="mb-16">
<div class="flex items-center gap-2 text-slate-400 mb-4 font-label-caps text-[10px]">
<span>London Heathrow (LHR)</span>
<span class="material-symbols-outlined text-xs">arrow_forward</span>
<span>The Connaught, Mayfair</span>
</div>
<h1 class="font-headline-h1 text-[#00234B] mb-4">Select Your Vehicle</h1>
<p class="font-body-lg text-on-surface-variant max-w-2xl">
                Our curated fleet represents the pinnacle of automotive luxury and reliability. Choose the asset that best complements your journey requirements.
            </p>
</header>
<!-- Search Results Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-12">
<!-- Result 1 -->
<div class="group luxury-card flex flex-col bg-white border border-[#F2F0ED] transition-all hover:border-[#C5A059]/30">
<div class="relative aspect-[16/10] overflow-hidden bg-surface-container-low">
<img class="w-full h-full object-cover grayscale-[0.2] group-hover:grayscale-0 transition-all duration-700" data-alt="A pristine, deep metallic black Range Rover Autobiography parked in front of a modern architectural building with clean limestone walls. The car is polished to a high mirror shine, reflecting the soft golden hour sunlight. The composition is clean and architectural, highlighting the vehicle's elegant lines against a minimalist background." src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/remote-60d1d104da09.jpg"/>
<div class="absolute top-4 right-4 bg-white/90 backdrop-blur px-3 py-1 font-label-caps text-[10px] text-[#00234B]">First Class</div>
</div>
<div class="p-8 flex flex-col flex-1">
<h2 class="font-headline-h2 text-2xl text-[#00234B] mb-2">Range Rover Autobiography</h2>
<p class="font-body-md text-slate-500 mb-8 leading-relaxed">The ultimate expression of refined capability and sophisticated luxury for up to three passengers.</p>
<div class="flex items-center gap-8 border-t border-[#F2F0ED] pt-6 mb-8">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[#C5A059]" data-icon="person">person</span>
<span class="font-label-caps text-xs">3 Seats</span>
</div>
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[#C5A059]" data-icon="luggage">luggage</span>
<span class="font-label-caps text-xs">2 Large</span>
</div>
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[#C5A059]" data-icon="wifi">wifi</span>
<span class="font-label-caps text-xs">Onboard</span>
</div>
</div>
<div class="mt-auto flex items-center justify-between">
<div>
<span class="font-label-caps text-[10px] text-slate-400 block mb-1">Inclusive of VAT</span>
<span class="font-headline-h2 text-2xl text-[#00234B]">£245.00</span>
</div>
<button class="action-button px-8 py-3 border border-[#C5A059] text-[#C5A059] font-cta text-label-caps transition-all duration-300">
                            Select &amp; Book
                        </button>
</div>
</div>
</div>
<!-- Result 2 -->
<div class="group luxury-card flex flex-col bg-white border border-[#F2F0ED] transition-all hover:border-[#C5A059]/30">
<div class="relative aspect-[16/10] overflow-hidden bg-surface-container-low">
<img class="w-full h-full object-cover grayscale-[0.2] group-hover:grayscale-0 transition-all duration-700" data-alt="A side view of a sleek, navy blue Mercedes-Benz V-Class luxury MPV. The vehicle features tinted privacy glass and chrome accents that catch the bright daylight. It is positioned on a clean paved driveway of a luxury manor. The aesthetic is professional, spacious, and extremely high-end, using cool tones and sharp focus." src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/remote-eb6d03543a35.jpg"/>
<div class="absolute top-4 right-4 bg-white/90 backdrop-blur px-3 py-1 font-label-caps text-[10px] text-[#00234B]">Executive Van</div>
</div>
<div class="p-8 flex flex-col flex-1">
<h2 class="font-headline-h2 text-2xl text-[#00234B] mb-2">Mercedes-Benz V-Class</h2>
<p class="font-body-md text-slate-500 mb-8 leading-relaxed">Unrivalled space and comfort for small groups or families, featuring conference seating and privacy glass.</p>
<div class="flex items-center gap-8 border-t border-[#F2F0ED] pt-6 mb-8">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[#C5A059]" data-icon="group">group</span>
<span class="font-label-caps text-xs">7 Seats</span>
</div>
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[#C5A059]" data-icon="luggage">luggage</span>
<span class="font-label-caps text-xs">6 Large</span>
</div>
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[#C5A059]" data-icon="ac_unit">ac_unit</span>
<span class="font-label-caps text-xs">Climate</span>
</div>
</div>
<div class="mt-auto flex items-center justify-between">
<div>
<span class="font-label-caps text-[10px] text-slate-400 block mb-1">Inclusive of VAT</span>
<span class="font-headline-h2 text-2xl text-[#00234B]">£310.00</span>
</div>
<button class="action-button px-8 py-3 border border-[#C5A059] text-[#C5A059] font-cta text-label-caps transition-all duration-300">
                            Select &amp; Book
                        </button>
</div>
</div>
</div>
<!-- Result 3 -->
<div class="group luxury-card flex flex-col bg-white border border-[#F2F0ED] transition-all hover:border-[#C5A059]/30">
<div class="relative aspect-[16/10] overflow-hidden bg-surface-container-low">
<img class="w-full h-full object-cover grayscale-[0.2] group-hover:grayscale-0 transition-all duration-700" data-alt="A front-profile shot of a silver Bentley Mulsanne parked under the canopy of a five-star luxury hotel at night. The hotel's warm exterior lighting creates sparkling highlights on the car's metallic finish and iconic grille. The mood is opulent, prestigious, and extremely exclusive, focusing on the craftsmanship and status of the vehicle." src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/remote-561d7e4fac0c.jpg"/>
<div class="absolute top-4 right-4 bg-white/90 backdrop-blur px-3 py-1 font-label-caps text-[10px] text-[#00234B]">Prestige Plus</div>
</div>
<div class="p-8 flex flex-col flex-1">
<h2 class="font-headline-h2 text-2xl text-[#00234B] mb-2">Bentley Mulsanne</h2>
<p class="font-body-md text-slate-500 mb-8 leading-relaxed">The pinnacle of British coachbuilding. A sanctuary of handcrafted leather and polished veneers.</p>
<div class="flex items-center gap-8 border-t border-[#F2F0ED] pt-6 mb-8">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[#C5A059]" data-icon="person">person</span>
<span class="font-label-caps text-xs">2 Seats</span>
</div>
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[#C5A059]" data-icon="luggage">luggage</span>
<span class="font-label-caps text-xs">2 Large</span>
</div>
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[#C5A059]" data-icon="bottle_soft_drink">water_bottle</span>
<span class="font-label-caps text-xs">Champagne</span>
</div>
</div>
<div class="mt-auto flex items-center justify-between">
<div>
<span class="font-label-caps text-[10px] text-slate-400 block mb-1">Inclusive of VAT</span>
<span class="font-headline-h2 text-2xl text-[#00234B]">£580.00</span>
</div>
<button class="action-button px-8 py-3 border border-[#C5A059] text-[#C5A059] font-cta text-label-caps transition-all duration-300">
                            Select &amp; Book
                        </button>
</div>
</div>
</div>
</div>
<!-- Footnote / USP Section -->
<section class="mt-24 pt-12 border-t border-[#F2F0ED] grid grid-cols-1 md:grid-cols-3 gap-12 text-center md:text-left">
<div>
<h4 class="font-label-caps text-[10px] text-[#C5A059] mb-4">The ViaR Standard</h4>
<p class="font-body-md text-on-surface-variant text-sm">Professional chauffeurs, vetted for discretion and expertise in VIP handling.</p>
</div>
<div>
<h4 class="font-label-caps text-[10px] text-[#C5A059] mb-4">Complete Flexibility</h4>
<p class="font-body-md text-on-surface-variant text-sm">Complimentary waiting time and seamless flight tracking integration.</p>
</div>
<div>
<h4 class="font-label-caps text-[10px] text-[#C5A059] mb-4">Luxury Provisions</h4>
<p class="font-body-md text-on-surface-variant text-sm">High-speed Wi-Fi, premium water, and daily newspapers in every vehicle.</p>
</div>
</section>
</main>
</main>
<?php get_footer(); ?>
