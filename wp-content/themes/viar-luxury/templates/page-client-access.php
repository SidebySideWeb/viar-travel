<?php
/**
 * Template Name: Client Access
 * Template generated from `client_access/code.html`
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
<!-- Auth Split Layout Container -->
<main class="flex h-screen w-full overflow-hidden">
<!-- Left: Cinematic Image Sidebar -->
<section class="hidden lg:flex w-1/2 relative bg-primary overflow-hidden">
<div class="absolute inset-0 z-0">
<img class="w-full h-full object-cover opacity-80 brightness-90" data-alt="An ultra-luxurious, cinematic view of a private infinity pool overlooking the Mediterranean coast at twilight. The sky is a deep, velvety indigo transitioning to soft peach at the horizon, matching a sophisticated and calm luxury aesthetic. Reflections of warm, golden architectural lights shimmer on the water surface, emphasizing a serene, high-end travel mood. The overall composition is architectural and minimalist, conveying exclusivity and the quiet confidence of a premium consulting travel brand." src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/remote-8db45962952a.jpg"/>
</div>
<!-- Branding Overlay -->
<div class="relative z-10 p-16 flex flex-col justify-between w-full h-full text-on-primary">
<div>
<h1 class="font-headline-h1 text-display italic mb-4">ViaR Travel</h1>
<div class="h-px w-12 bg-[#C5A059] mb-8"></div>
<p class="font-body-lg max-w-md opacity-90 leading-relaxed">
                        Curating bespoke journeys for the discerning traveler. Welcome back to your world of exclusive horizons.
                    </p>
</div>
<div class="flex items-center gap-4">
<span class="material-symbols-outlined text-sm opacity-60">lock</span>
<p class="font-label-caps text-label-caps opacity-60">Encrypted Private Access</p>
</div>
</div>
<!-- Gradient Overlay for Depth -->
<div class="absolute inset-0 bg-gradient-to-t from-primary/60 via-transparent to-transparent pointer-events-none"></div>
</section>
<!-- Right: Elegant Login Form Section -->
<section class="w-full lg:w-1/2 flex flex-col items-center justify-center p-8 md:p-16 lg:p-24 bg-white relative">
<!-- Mobile Branding Only -->
<div class="lg:hidden absolute top-12 text-center">
<h2 class="font-headline-h2 text-[#00234B] italic">ViaR Travel</h2>
</div>
<!-- Form Wrapper -->
<div class="w-full max-w-[440px] flex flex-col">
<!-- Tab Headers -->
<div class="flex gap-8 mb-12 border-b border-[#F2F0ED]">
<button class="pb-4 font-label-caps text-label-caps border-b border-[#C5A059] text-[#00234B]">
                        Sign In
                    </button>
<button class="pb-4 font-label-caps text-label-caps text-[#00234B]/40 hover:text-[#C5A059] transition-colors">
                        Create an Account
                    </button>
</div>
<header class="mb-10">
<h2 class="font-headline-h1 text-headline-h2 text-[#00234B] mb-2">Welcome Back</h2>
<p class="font-body-md text-on-surface-variant">Please enter your credentials to access your itineraries.</p>
</header>
<!-- Form -->
<form action="#" class="space-y-8">
<!-- Email Field -->
<div class="flex flex-col space-y-1">
<label class="font-label-caps text-label-caps text-[#00234B]/60" for="email">Email Address</label>
<input class="border-0 border-b border-[#00234B]/20 bg-transparent py-3 px-0 font-body-md text-[#00234B] form-input-focus placeholder:text-[#00234B]/20" id="email" name="email" placeholder="name@example.com" required="" type="email"/>
</div>
<!-- Password Field -->
<div class="flex flex-col space-y-1">
<div class="flex justify-between items-end">
<label class="font-label-caps text-label-caps text-[#00234B]/60" for="password">Password</label>
<a class="text-[10px] uppercase tracking-widest text-[#C5A059] hover:underline underline-offset-4" href="#">Forgot?</a>
</div>
<input class="border-0 border-b border-[#00234B]/20 bg-transparent py-3 px-0 font-body-md text-[#00234B] form-input-focus placeholder:text-[#00234B]/20" id="password" name="password" placeholder="••••••••" required="" type="password"/>
</div>
<!-- Options -->
<div class="flex items-center justify-between py-2">
<label class="flex items-center space-x-3 cursor-pointer group">
<div class="relative">
<input class="peer hidden" type="checkbox"/>
<div class="w-4 h-4 border border-[#00234B]/20 peer-checked:bg-[#00234B] peer-checked:border-[#00234B] transition-all"></div>
<span class="material-symbols-outlined absolute inset-0 text-[12px] text-white opacity-0 peer-checked:opacity-100 flex items-center justify-center">check</span>
</div>
<span class="font-label-caps text-[10px] text-on-surface-variant group-hover:text-[#00234B] transition-colors">Remember this device</span>
</label>
</div>
<!-- Primary Action -->
<div class="pt-6">
<button class="w-full bg-[#C5A059] hover:bg-[#b08d4b] text-white font-cta text-cta py-5 transition-all duration-300 transform active:scale-[0.99] flex justify-between items-center px-8 shadow-sm" type="submit">
                            Access Your Account
                            <span class="material-symbols-outlined text-sm">arrow_forward</span>
</button>
</div>
</form>
<!-- Social/Expert Consult -->
<div class="mt-16 pt-12 border-t border-[#F2F0ED] flex flex-col items-center text-center">
<p class="font-body-md text-on-surface-variant mb-6 italic">Require assistance with your profile?</p>
<button class="font-label-caps text-label-caps text-[#C5A059] border border-[#C5A059] py-3 px-8 hover:bg-[#C5A059] hover:text-white transition-all duration-300">
                        Consult an Expert
                    </button>
</div>
</div>
<!-- Footer Small -->
</section>
</main>
</main>
<?php get_footer(); ?>
