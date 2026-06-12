<?php
/**
 * Template Name: Transfers
 * Template generated from `search_vip_transfer/code.html`
 *
 * @package ViaR_Luxury
 */

get_header();

if (viar_has_editor_sections()) {
    viar_render_editor_sections_page();
    get_footer();
    return;
}

$viar_hero_title = viar_field_value('viar_hero_title', 'Transfer Availability Check');
$viar_hero_description = viar_field_value('viar_hero_description', 'Verify real-time availability for our executive fleet. From coastal villas to private airstrips, ensure your journey is as seamless as your destination.');
$viar_hero_cta_label = viar_field_value('viar_hero_cta_label', 'Check Availability');
?>
<main class="site-main">
<!-- Side Navigation Shell -->
<aside class="fixed left-0 top-0 h-full w-72 border-r border-[#00234B]/10 bg-[#F2F0ED] flex flex-col pt-24 pb-12 z-40 hidden md:flex">
<div class="px-8 mb-12">
<p class="font-label-caps text-[10px] text-slate-400 mb-1">Your Private Concierge</p>
<h3 class="font-headline-h2 text-lg text-[#00234B]">Welcome, Member</h3>
</div>
<nav class="flex-1 px-4 space-y-2">
<a class="flex items-center gap-4 px-4 py-3 text-slate-500 hover:bg-white/50 transition-all font-label-caps text-[11px]" href="#">
<span class="material-symbols-outlined text-lg" data-icon="dashboard">dashboard</span>
                Dashboard
            </a>
<a class="flex items-center gap-4 px-4 py-3 text-slate-500 hover:bg-white/50 transition-all font-label-caps text-[11px]" href="#">
<span class="material-symbols-outlined text-lg" data-icon="calendar_today">calendar_today</span>
                Active Bookings
            </a>
<a class="flex items-center gap-4 px-4 py-3 bg-white text-[#00234B] font-bold border-l-4 border-[#C5A059] font-label-caps text-[11px]" href="#">
<span class="material-symbols-outlined text-lg" data-icon="event_available">event_available</span>
                Availability
            </a>
<a class="flex items-center gap-4 px-4 py-3 text-slate-500 hover:bg-white/50 transition-all font-label-caps text-[11px]" href="#">
<span class="material-symbols-outlined text-lg" data-icon="history">history</span>
                Transfer History
            </a>
<a class="flex items-center gap-4 px-4 py-3 text-slate-500 hover:bg-white/50 transition-all font-label-caps text-[11px]" href="#">
<span class="material-symbols-outlined text-lg" data-icon="settings">settings</span>
                Account Settings
            </a>
</nav>
<div class="mt-auto px-8 space-y-4">
<button class="w-full bg-[#C5A059] text-[#00234B] font-cta text-[11px] uppercase py-3 tracking-widest hover:opacity-90 transition-opacity">
                Request New Transfer
            </button>
<div class="pt-6 space-y-2">
<a class="flex items-center gap-2 text-slate-400 font-label-caps text-[10px] hover:text-[#C5A059] transition-colors" href="#">
<span class="material-symbols-outlined text-sm" data-icon="support_agent">support_agent</span>
                    Support
                </a>
<a class="flex items-center gap-2 text-slate-400 font-label-caps text-[10px] hover:text-[#C5A059] transition-colors" href="#">
<span class="material-symbols-outlined text-sm" data-icon="gavel">gavel</span>
                    Legal
                </a>
</div>
</div>
</aside>
<!-- Main Content Canvas -->
<main class="viar-content-below-header md:ml-72 pb-24 px-8 md:px-16 min-h-screen">
<div class="max-w-5xl mx-auto">
<!-- Header Section -->
<div class="flex items-center gap-4 mb-12">
<div class="flex items-center gap-3">
<span class="w-8 h-8 rounded-full bg-[#00234B] text-white flex items-center justify-center font-label-caps text-[12px]">01</span>
<span class="font-label-caps text-[11px] tracking-widest text-[#00234B]">SEARCH</span>
</div>
<div class="h-[1px] w-12 bg-[#00234B]/10"></div>
<div class="flex items-center gap-3 opacity-30">
<span class="w-8 h-8 rounded-full border border-[#00234B] flex items-center justify-center font-label-caps text-[12px]">02</span>
<span class="font-label-caps text-[11px] tracking-widest text-[#00234B]">VEHICLE</span>
</div>
<div class="h-[1px] w-12 bg-[#00234B]/10"></div>
<div class="flex items-center gap-3 opacity-30">
<span class="w-8 h-8 rounded-full border border-[#00234B] flex items-center justify-center font-label-caps text-[12px]">03</span>
<span class="font-label-caps text-[11px] tracking-widest text-[#00234B]">CONFIRM</span>
</div>
</div><div class="mb-16">
<span class="font-label-caps text-[#C5A059] mb-4 block">Fleet Concierge</span>
<h1 class="font-headline-h1 text-[#00234B] mb-6"><?php echo esc_html($viar_hero_title); ?></h1>
<p class="font-body-lg text-slate-600 max-w-2xl leading-relaxed"><?php echo esc_html($viar_hero_description); ?></p>
</div>
<!-- Search Interface Grid -->
<div class="bg-white p-12 border border-[#00234B]/5 shadow-sm">
<div class="grid grid-cols-1 lg:grid-cols-2 gap-x-16 gap-y-12">
<!-- Route Selection -->
<div class="space-y-12">
<div class="relative">
<label class="font-label-caps text-[10px] text-[#00234B] mb-2 block">Origin Point</label>
<div class="flex items-center gap-4 border-b border-[#00234B]/10 pb-4 focus-within:border-[#C5A059] transition-colors">
<span class="material-symbols-outlined text-[#C5A059]" data-icon="location_on">location_on</span>
<input class="bg-transparent border-none focus:ring-0 w-full font-body-md text-[#00234B] placeholder:text-slate-300" placeholder="e.g., Mykonos Port" type="text"/>
</div>
</div>
<div class="relative">
<label class="font-label-caps text-[10px] text-[#00234B] mb-2 block">Destination Address</label>
<div class="flex items-center gap-4 border-b border-[#00234B]/10 pb-4 focus-within:border-[#C5A059] transition-colors">
<span class="material-symbols-outlined text-[#C5A059]" data-icon="villa">villa</span>
<input class="bg-transparent border-none focus:ring-0 w-full font-body-md text-[#00234B] placeholder:text-slate-300" placeholder="e.g., Private Villa, Psarou" type="text"/>
</div>
</div>
</div>
<!-- Date & Time Selection -->
<div class="space-y-12">
<div class="grid grid-cols-2 gap-8">
<div class="relative">
<label class="font-label-caps text-[10px] text-[#00234B] mb-2 block">Transfer Date</label>
<div class="flex items-center gap-4 border-b border-[#00234B]/10 pb-4 focus-within:border-[#C5A059] transition-colors">
<span class="material-symbols-outlined text-[#C5A059]" data-icon="calendar_month">calendar_month</span>
<input class="bg-transparent border-none focus:ring-0 w-full font-body-md text-[#00234B] placeholder:text-slate-300" placeholder="DD / MM / YY" type="text"/>
</div>
</div>
<div class="relative">
<label class="font-label-caps text-[10px] text-[#00234B] mb-2 block">Pick-up Time</label>
<div class="flex items-center gap-4 border-b border-[#00234B]/10 pb-4 focus-within:border-[#C5A059] transition-colors">
<span class="material-symbols-outlined text-[#C5A059]" data-icon="schedule">schedule</span>
<input class="bg-transparent border-none focus:ring-0 w-full font-body-md text-[#00234B] placeholder:text-slate-300" placeholder="00:00" type="text"/>
</div>
</div>
</div>
<div class="relative">
<label class="font-label-caps text-[10px] text-[#00234B] mb-2 block">Number of Passengers</label>
<div class="flex items-center justify-between border-b border-[#00234B]/10 pb-4">
<div class="flex items-center gap-4">
<span class="material-symbols-outlined text-[#C5A059]" data-icon="group">group</span>
<span class="font-body-md text-[#00234B]">02 Adults, 01 Luggage</span>
</div>
<button class="text-[10px] font-label-caps text-[#C5A059] hover:underline">Modify</button>
</div>
</div>
</div>
</div>
<!-- Action Section -->
<div class="mt-16 pt-12 border-t border-[#F2F0ED] flex flex-col md:flex-row justify-between items-center gap-8">
<div class="flex items-center gap-4 text-slate-400">
<span class="material-symbols-outlined" data-icon="verified_user">verified_user</span>
<p class="font-label-caps text-[10px]">Guaranteed Executive Class Vehicles</p>
</div>
<button class="w-full md:w-auto bg-[#C5A059] text-[#00234B] font-cta text-sm uppercase px-12 py-5 tracking-widest hover:opacity-90 active:scale-95 transition-all"><?php echo esc_html($viar_hero_cta_label); ?></button>
</div>
</div><div class="mt-16">
<div class="flex justify-between items-end mb-8">
<div>
<span class="font-label-caps text-[#C5A059] mb-2 block">The Collection</span>
<h2 class="font-headline-h2 text-[#00234B]">Our Executive Fleet</h2>
</div>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-8">
<div class="group cursor-pointer">
<div class="aspect-[16/9] overflow-hidden bg-slate-200 mb-4">
<img alt="Luxury sedan on the Athens Riviera coastal road" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105 contrast-125 grayscale" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/remote-a8dae0725b5f.jpg"/>
</div>
<div class="flex justify-between items-center">
<span class="font-label-caps text-[11px] text-[#00234B]">Executive Sedan</span>
<span class="font-label-caps text-[10px] text-slate-400">Athens Riviera</span>
</div>
</div>
<div class="group cursor-pointer">
<div class="aspect-[16/9] overflow-hidden bg-slate-200 mb-4">
<img alt="Luxury SUV at a private villa driveway in Mykonos" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105 contrast-125 grayscale" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/remote-a8dae0725b5f.jpg"/>
</div>
<div class="flex justify-between items-center">
<span class="font-label-caps text-[11px] text-[#00234B]">Premium SUV</span>
<span class="font-label-caps text-[10px] text-slate-400">Mykonos Estate</span>
</div>
</div>
</div>
</div>
<!-- Contextual Information -->
</div>
</main>
<!-- Footer Section -->
<section class="max-w-6xl mx-auto px-6 py-16"><div class="bg-white/90 border border-[#C5A059]/30 p-8"><?php echo do_shortcode('[bookingpress_form service_id="1"]'); ?><?php viar_render_messenger_buttons(['context' => 'form']); ?></div></section>
<?php viar_render_editor_content(); ?>
</main>
<?php get_footer(); ?>
