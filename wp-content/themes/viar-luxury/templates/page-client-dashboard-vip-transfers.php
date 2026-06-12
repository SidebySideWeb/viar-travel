<?php
/**
 * Template Name: Client Dashboard Vip Transfers
 * Template generated from `client_dashboard_vip_transfers/code.html`
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
<!-- SideNavBar Component -->
<nav class="fixed left-0 top-0 h-full w-72 bg-[#00234B] dark:bg-slate-900 flex flex-col pt-24 pb-12 z-40 border-r border-[#00234B]/10">
<div class="px-8 mb-12">
<h1 class="font-headline-h2 text-[#C5A059] text-xl mb-1">Welcome, Member</h1>
<p class="font-label-caps text-[#C5A059]/60 text-[10px]">Your Private Concierge</p>
</div>
<div class="flex-1 space-y-2">
<a class="flex items-center gap-4 px-8 py-4 text-slate-400 hover:bg-white/5 transition-all duration-300 font-noto-serif text-sm uppercase tracking-widest" href="#">
<span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
<span>Dashboard</span>
</a>
<a class="flex items-center gap-4 px-8 py-4 bg-white/10 text-[#C5A059] font-bold border-l-4 border-[#C5A059] font-noto-serif text-sm uppercase tracking-widest" href="#">
<span class="material-symbols-outlined" data-icon="calendar_today">calendar_today</span>
<span>Active Bookings</span>
</a>
<a class="flex items-center gap-4 px-8 py-4 text-slate-400 hover:bg-white/5 transition-all duration-300 font-noto-serif text-sm uppercase tracking-widest" href="#">
<span class="material-symbols-outlined" data-icon="history">history</span>
<span>Transfer History</span>
</a>
<a class="flex items-center gap-4 px-8 py-4 text-slate-400 hover:bg-white/5 transition-all duration-300 font-noto-serif text-sm uppercase tracking-widest" href="#">
<span class="material-symbols-outlined" data-icon="event_available">event_available</span>
<span>Availability</span>
</a>
<a class="flex items-center gap-4 px-8 py-4 text-slate-400 hover:bg-white/5 transition-all duration-300 font-noto-serif text-sm uppercase tracking-widest" href="#">
<span class="material-symbols-outlined" data-icon="settings">settings</span>
<span>Account Settings</span>
</a>
</div>
<div class="px-8 mt-auto space-y-4">
<a href="<?php echo esc_url(viar_vip_transfer_form_url()); ?>" class="block w-full py-4 text-center bg-[#C5A059] text-[#00234B] font-cta text-sm uppercase tracking-widest transition-all hover:opacity-90">
                Request New Transfer
            </a>
<div class="flex flex-col gap-2 pt-6 border-t border-white/10">
<a class="flex items-center gap-3 text-slate-400 hover:text-white transition-colors text-[10px] uppercase tracking-widest" href="#">
<span class="material-symbols-outlined text-sm" data-icon="support_agent">support_agent</span>
<span>Support</span>
</a>
<a class="flex items-center gap-3 text-slate-400 hover:text-white transition-colors text-[10px] uppercase tracking-widest" href="#">
<span class="material-symbols-outlined text-sm" data-icon="gavel">gavel</span>
<span>Legal</span>
</a>
</div>
</div>
</nav>
<!-- Main Content Canvas -->
<main class="ml-72 min-h-screen bg-[#F2F0ED]">
<!-- TopAppBar -->
<!-- Page Content -->
<div class="viar-content-below-header px-12 pb-24 max-w-[1440px] mx-auto">
<header class="mb-16">
<span class="font-label-caps text-[#C5A059] mb-4 block">Executive Overview</span>
<h2 class="font-headline-h1 text-[#00234B]">Active Bookings</h2>
<div class="w-24 h-1 bg-[#C5A059] mt-6"></div>
</header>
<!-- Featured VIP Transfer Hero Card -->
<section class="mb-16 relative overflow-hidden bg-white shadow-sm border border-[#00234B]/5 group">
<div class="flex flex-col md:flex-row">
<div class="w-full md:w-1/2 aspect-video md:aspect-auto">
<img alt="Luxury Transfer Vehicle" class="w-full h-full object-cover" data-alt="A sleek black Mercedes S-Class sedan parked in front of a modern minimalist airport terminal during the golden hour. The sunlight reflects off the polished chrome details and deep navy paint. The atmosphere is quiet, exclusive, and high-end, evoking a sense of effortless luxury travel and elite concierge service." src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/remote-44f0b89bd4f9.jpg"/>
</div>
<div class="w-full md:w-1/2 p-12 flex flex-col justify-center">
<div class="flex justify-between items-start mb-8">
<div>
<span class="font-label-caps text-[#C5A059] block mb-2">Upcoming Transfer</span>
<h3 class="font-headline-h2 text-[#00234B]">Athens International to Amanzoe</h3>
</div>
<span class="px-4 py-1 border border-[#C5A059] text-[#C5A059] font-label-caps text-[10px]">Confirmed</span>
</div>
<div class="grid grid-cols-2 gap-8 mb-12">
<div>
<p class="font-label-caps text-slate-400 text-[10px] uppercase mb-1">Date &amp; Time</p>
<p class="font-noto-serif text-[#00234B]">October 14, 2024 — 14:30</p>
</div>
<div>
<p class="font-label-caps text-slate-400 text-[10px] uppercase mb-1">Vehicle Class</p>
<p class="font-noto-serif text-[#00234B]">Mercedes S-Class 580</p>
</div>
<div>
<p class="font-label-caps text-slate-400 text-[10px] uppercase mb-1">Chauffeur</p>
<p class="font-noto-serif text-[#00234B]">Nikolas P. (VIP Certified)</p>
</div>
<div>
<p class="font-label-caps text-slate-400 text-[10px] uppercase mb-1">Passengers</p>
<p class="font-noto-serif text-[#00234B]">2 Adults</p>
</div>
</div>
<div class="flex gap-4">
<button class="flex-1 py-4 bg-[#00234B] text-white font-cta uppercase text-xs tracking-widest hover:bg-[#00234B]/90 transition-all">
                                View Details
                            </button>
<button class="flex-1 py-4 border border-[#00234B]/20 text-[#00234B] font-cta uppercase text-xs tracking-widest hover:bg-[#00234B]/5 transition-all">
                                Contact Driver
                            </button>
</div>
</div>
</div>
</section>
<!-- Transfer List (Bento Grid Style) -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
<!-- Transfer Card 1 -->
<div class="bg-white p-8 border border-[#00234B]/5 shadow-sm hover:shadow-md transition-shadow">
<div class="flex justify-between items-start mb-6">
<span class="material-symbols-outlined text-[#C5A059]" data-icon="flight_takeoff">flight_takeoff</span>
<span class="font-label-caps text-green-600 text-[9px] bg-green-50 px-2 py-1">In Progress</span>
</div>
<h4 class="font-noto-serif text-[#00234B] text-lg mb-2">Santorini Port to Canaves Oia</h4>
<p class="font-label-caps text-slate-400 text-[10px] mb-6">Oct 12 — 11:00 AM</p>
<div class="flex items-center gap-3 pt-6 border-t border-[#F2F0ED]">
<div class="w-8 h-8 rounded-full bg-[#F2F0ED] flex items-center justify-center">
<span class="material-symbols-outlined text-sm text-[#00234B]" data-icon="directions_car">directions_car</span>
</div>
<span class="font-label-caps text-[#00234B] text-[11px]">Range Rover Autobiography</span>
</div>
</div>
<!-- Transfer Card 2 -->
<div class="bg-white p-8 border border-[#00234B]/5 shadow-sm hover:shadow-md transition-shadow">
<div class="flex justify-between items-start mb-6">
<span class="material-symbols-outlined text-[#C5A059]" data-icon="hotel">hotel</span>
<span class="font-label-caps text-slate-400 text-[9px] bg-slate-50 px-2 py-1">Scheduled</span>
</div>
<h4 class="font-noto-serif text-[#00234B] text-lg mb-2">Four Seasons to Mykonos Airport</h4>
<p class="font-label-caps text-slate-400 text-[10px] mb-6">Oct 18 — 09:30 AM</p>
<div class="flex items-center gap-3 pt-6 border-t border-[#F2F0ED]">
<div class="w-8 h-8 rounded-full bg-[#F2F0ED] flex items-center justify-center">
<span class="material-symbols-outlined text-sm text-[#00234B]" data-icon="directions_car">directions_car</span>
</div>
<span class="font-label-caps text-[#00234B] text-[11px]">Mercedes V-Class</span>
</div>
</div>
<!-- Map Integration Card -->
<div class="bg-white border border-[#00234B]/5 shadow-sm overflow-hidden relative group">
<img alt="Location map placeholder" class="w-full h-full object-cover grayscale brightness-50 group-hover:grayscale-0 group-hover:brightness-100 transition-all duration-700" data-alt="An artistic, high-contrast map of the Athens coastline and Aegean sea in a minimalist deep navy and champagne gold color scheme. The map features elegant topography lines and subtle light accents, maintaining an architectural and curated aesthetic consistent with high-end luxury travel branding." data-location="Athens" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/remote-7d8b415aae6c.jpg"/>
<div class="absolute inset-0 bg-gradient-to-t from-[#00234B]/80 to-transparent p-8 flex flex-col justify-end">
<h4 class="font-noto-serif text-white text-lg">Real-time Tracking</h4>
<p class="text-white/60 font-label-caps text-[10px]">Active for Athens Transfer</p>
</div>
</div>
</div>
</div>
</main>
</main>
<?php get_footer(); ?>
