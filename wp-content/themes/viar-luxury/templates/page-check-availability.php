<?php
/**
 * Template Name: Check Availability
 * Template generated from `check_availability/code.html`
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
<a href="<?php echo esc_url(viar_vip_transfer_form_url()); ?>" class="block w-full text-center bg-[#C5A059] text-[#00234B] font-cta text-[11px] uppercase py-3 tracking-widest hover:opacity-90 transition-opacity">
                Request New Transfer
            </a>
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
<div class="mb-16">
<span class="font-label-caps text-[#C5A059] mb-4 block">Fleet Concierge</span>
<h1 class="font-headline-h1 text-[#00234B] mb-6">Transfer Availability Check</h1>
<p class="font-body-lg text-slate-600 max-w-2xl leading-relaxed">
                    Verify real-time availability for our executive fleet. From coastal villas to private airstrips, ensure your journey is as seamless as your destination.
                </p>
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
<a href="<?php echo esc_url(viar_vip_transfer_form_url()); ?>" class="inline-block w-full md:w-auto text-center bg-[#C5A059] text-[#00234B] font-cta text-sm uppercase px-12 py-5 tracking-widest hover:opacity-90 active:scale-95 transition-all">
                        Check Availability
                    </a>
</div>
</div>
<!-- Contextual Information -->
<div class="mt-20 grid grid-cols-1 md:grid-cols-3 gap-12">
<div class="space-y-4">
<h4 class="font-headline-h2 text-xl text-[#00234B]">Range Rover Autobiography</h4>
<img alt="Luxury SUV" class="w-full aspect-[4/3] object-cover grayscale hover:grayscale-0 transition-all duration-700" data-alt="A side-profile shot of a sleek, black Range Rover Autobiography parked on a sun-drenched coastal road in the Mediterranean. The lighting is golden-hour, casting long shadows and highlighting the vehicle's metallic finish. The background shows a hazy blue sea and white-washed architecture. The overall aesthetic is minimalist, expensive, and tranquil." src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/remote-0070a840fbae.jpg"/>
<p class="font-label-caps text-[10px] text-slate-500 uppercase">Available for all routes</p>
</div>
<div class="space-y-4">
<h4 class="font-headline-h2 text-xl text-[#00234B]">Mercedes-Benz V-Class</h4>
<img alt="Luxury MPV" class="w-full aspect-[4/3] object-cover grayscale hover:grayscale-0 transition-all duration-700" data-alt="A luxurious dark gray Mercedes-Benz V-Class van positioned in front of a modern, minimalist private airport terminal. The image is captured with a shallow depth of field, emphasizing the vehicle's elegant lines. The sky is a clear, pale blue, contributing to a high-key, clean light-mode atmosphere that exudes exclusivity and professional transport services." src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/remote-5b0a98a9829b.jpg"/>
<p class="font-label-caps text-[10px] text-slate-500 uppercase">Ideal for families &amp; luggage</p>
</div>
<div class="space-y-4">
<h4 class="font-headline-h2 text-xl text-[#00234B]">Bespoke Chauffeur</h4>
<img alt="Chauffeur Service" class="w-full aspect-[4/3] object-cover grayscale hover:grayscale-0 transition-all duration-700" data-alt="A close-up, detail-oriented shot of a chauffeur's hand in a white glove opening the door of a high-end luxury sedan. The vehicle's paint is a deep navy, reflecting a sophisticated city evening light. The image focus is on the textures of the leather, the gleam of the chrome, and the professional service. The mood is silent, attentive, and extremely high-end." src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/remote-e9e36f1bfcd7.jpg"/>
<p class="font-label-caps text-[10px] text-slate-500 uppercase">Multilingual professional drivers</p>
</div>
</div>
</div>
</main>
<!-- Footer Section -->
</main>
<?php get_footer(); ?>
