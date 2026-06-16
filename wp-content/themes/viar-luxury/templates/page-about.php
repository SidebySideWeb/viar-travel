<?php
/**
 * Template Name: About
 * Template generated from `our_story_greek_aesthetic/code.html`
 *
 * @package ViaR_Luxury
 */

get_header();

if (viar_has_editor_sections()) {
    viar_render_editor_sections_page();
    get_footer();
    return;
}

$theme_uri = get_template_directory_uri();

$hero_eyebrow = viar_field_value('viar_about_hero_eyebrow', 'OUR PHILOSOPHY');
$hero_title = viar_field_value('viar_about_hero_title', 'Crafting the Unattainable');
$hero_description = viar_field_value(
    'viar_about_hero_description',
    'ViaR Travel is not a booking platform. We are architects of time and curators of experience, dedicated to uncovering the soul of Greece for those who demand the extraordinary.'
);
$hero_image = viar_image_url('viar_about_hero_image', $theme_uri . '/assets/images/remote-412940dffd89.jpg');

$philosophy_title = viar_field_value('viar_about_philosophy_title', 'Our Philosophy');

$narrative_1_title = viar_field_value('viar_about_narrative_1_title', 'Unrivaled Access');
$narrative_1_body = viar_field_value(
    'viar_about_narrative_1_body',
    'Our network spans the length of the Hellenic peninsula, from the hidden vineyards of Nemea to the restricted monasteries of Meteora. We provide keys to gates that remain closed to the public, ensuring your journey is defined by intimacy rather than crowds.'
);
$narrative_1_bullet_1 = viar_field_value('viar_about_narrative_1_bullet_1', 'PRIVATE ESTATES');
$narrative_1_bullet_2 = viar_field_value('viar_about_narrative_1_bullet_2', 'OFF-MARKET CHARTERS');
$narrative_1_image = viar_image_url('viar_about_narrative_1_image', $theme_uri . '/assets/images/remote-576fe30197aa.jpg');

$narrative_2_title = viar_field_value('viar_about_narrative_2_title', 'The Art of Consulting');
$narrative_2_body = viar_field_value(
    'viar_about_narrative_2_body',
    'We do not offer packages. Every itinerary starts with a dialogue. We listen to your preferences for light, pace, and gastronomy to construct a narrative that resonates with your personal identity. This is travel as a form of bespoke portraiture.'
);
$narrative_2_cta_label = viar_field_value('viar_about_narrative_2_cta_label', 'DISCOVER OUR PROCESS');
$narrative_2_cta_url = viar_field_value('viar_about_narrative_2_cta_url', home_url('/inquiry'));
$narrative_2_image = viar_image_url('viar_about_narrative_2_image', $theme_uri . '/assets/images/remote-b1b81a886280.jpg');

$narrative_3_title = viar_field_value('viar_about_narrative_3_title', 'Rooted in Greece');
$narrative_3_body = viar_field_value(
    'viar_about_narrative_3_body',
    'Our team lives and works across the archipelago, cultivating relationships with artisans, vintners, and custodians of heritage. Every recommendation is grounded in firsthand knowledge and a deep respect for the communities we introduce you to.'
);
$narrative_3_bullet_1 = viar_field_value('viar_about_narrative_3_bullet_1', 'LOCAL PARTNERSHIPS');
$narrative_3_bullet_2 = viar_field_value('viar_about_narrative_3_bullet_2', 'CULTURAL STEWARDSHIP');
$narrative_3_image = viar_image_url('viar_about_narrative_3_image', $theme_uri . '/assets/images/remote-3416b76834bb.jpg');

$secondary_eyebrow = viar_field_value('viar_about_secondary_eyebrow', 'THE VIAR STANDARD');
$secondary_title = viar_field_value('viar_about_secondary_title', 'Experience Without Compromise');
$secondary_description = viar_field_value(
    'viar_about_secondary_description',
    'From the first conversation to your final transfer, every detail is orchestrated with precision. We design journeys that feel effortless, personal, and unmistakably Greek.'
);
$secondary_image = viar_image_url('viar_about_secondary_image', $theme_uri . '/assets/images/remote-e6e41969906c.jpg');

$consultants_eyebrow = viar_field_value('viar_about_consultants_eyebrow', 'THE CURATORS');
$consultants_title = viar_field_value('viar_about_consultants_title', 'Meet Our Consultants');

$consultants = [
    [
        'name'  => viar_field_value('viar_about_consultant_1_name', 'Katerina Lykaios'),
        'role'  => viar_field_value('viar_about_consultant_1_role', 'SENIOR ARCHAEOLOGY SPECIALIST'),
        'bio'   => viar_field_value('viar_about_consultant_1_bio', 'Specializing in Peloponnesian history and private access to UNESCO heritage sites.'),
        'image' => viar_image_url('viar_about_consultant_1_image', $theme_uri . '/assets/images/remote-a481d43ed135.jpg'),
    ],
    [
        'name'  => viar_field_value('viar_about_consultant_2_name', 'Andreas Pappas'),
        'role'  => viar_field_value('viar_about_consultant_2_role', 'LOGISTICS & VIP OPERATIONS'),
        'bio'   => viar_field_value('viar_about_consultant_2_bio', 'Expert in seamless Mediterranean transport, from private jet charters to yacht logistics.'),
        'image' => viar_image_url('viar_about_consultant_2_image', $theme_uri . '/assets/images/remote-af6892e3132c.jpg'),
    ],
    [
        'name'  => viar_field_value('viar_about_consultant_3_name', 'Marina Sideris'),
        'role'  => viar_field_value('viar_about_consultant_3_role', 'GASTRONOMY & LIFESTYLE'),
        'bio'   => viar_field_value('viar_about_consultant_3_bio', 'Curating culinary journeys that connect travelers with Michelin-starred chefs and local producers.'),
        'image' => viar_image_url('viar_about_consultant_3_image', $theme_uri . '/assets/images/remote-043a04ceb5d9.jpg'),
    ],
];

$cta_title = viar_field_value('viar_about_cta_title', 'Ready to begin your narrative?');
$cta_description = viar_field_value(
    'viar_about_cta_description',
    'Join us for a private consultation to discuss your next Greek odyssey.'
);
$cta_label = viar_field_value('viar_about_cta_label', 'Book a Private Call');
$cta_url = viar_field_value('viar_about_cta_url', home_url('/contact'));
?>
<main class="site-main w-full max-w-full min-w-0 overflow-x-clip">
    <!-- Hero Section: Narrative Intro -->
    <section class="viar-content-below-header px-6 md:px-12 py-16 md:py-32 max-w-[1440px] mx-auto grid grid-cols-12 gap-gutter items-center min-w-0">
        <div class="col-span-12 md:col-span-5 mb-16 md:mb-0 min-w-0">
            <span class="font-label-caps text-label-caps text-secondary mb-6 block"><?php echo esc_html($hero_eyebrow); ?></span>
            <h1 class="font-headline-h1 text-headline-h1 text-primary-container mb-8"><?php echo esc_html($hero_title); ?></h1>
            <p class="font-body-lg text-body-lg text-on-surface-variant max-w-md"><?php echo esc_html($hero_description); ?></p>
        </div>
        <div class="col-span-12 md:col-span-7 min-w-0">
            <div class="relative h-[320px] md:h-[600px] w-full overflow-hidden shadow-sm">
                <img class="w-full h-full object-cover" alt="" src="<?php echo esc_url($hero_image); ?>">
            </div>
        </div>
    </section>

    <!-- Philosophy Title -->
    <section class="bg-surface-container-low py-16 md:py-24">
        <div class="max-w-[1440px] mx-auto px-6 md:px-12 min-w-0">
            <h2 class="font-headline-h2 text-headline-h2 text-primary-container"><?php echo esc_html($philosophy_title); ?></h2>
        </div>
    </section>

    <!-- Narrative Content: Asymmetric Layout -->
    <section class="py-[120px]">
        <div class="max-w-[1440px] mx-auto px-6 md:px-12 min-w-0">
            <!-- Row 1: image left, text right -->
            <div class="grid grid-cols-12 gap-y-16 md:gap-y-0 gap-x-6 md:gap-x-12 items-center mb-16 md:mb-32 min-w-0">
                <div class="col-span-12 md:col-span-6 order-2 md:order-1 min-w-0">
                    <div class="h-[500px] md:h-[700px] overflow-hidden">
                        <img class="w-full h-full object-cover" alt="" src="<?php echo esc_url($narrative_1_image); ?>">
                    </div>
                </div>
                <div class="col-span-12 md:col-span-5 md:col-start-8 flex flex-col justify-center order-1 md:order-2 min-w-0">
                    <h2 class="font-headline-h2 text-headline-h2 text-primary mb-6"><?php echo esc_html($narrative_1_title); ?></h2>
                    <p class="font-body-md text-body-md text-on-surface-variant mb-8"><?php echo esc_html($narrative_1_body); ?></p>
                    <?php if ($narrative_1_bullet_1 !== '' || $narrative_1_bullet_2 !== '') : ?>
                        <div class="border-t border-[#F2F0ED] pt-8">
                            <?php if ($narrative_1_bullet_1 !== '') : ?>
                                <div class="flex items-center space-x-4 mb-4">
                                    <span class="material-symbols-outlined text-secondary" style="font-variation-settings: 'FILL' 1;">verified</span>
                                    <span class="font-label-caps text-label-caps text-primary"><?php echo esc_html($narrative_1_bullet_1); ?></span>
                                </div>
                            <?php endif; ?>
                            <?php if ($narrative_1_bullet_2 !== '') : ?>
                                <div class="flex items-center space-x-4">
                                    <span class="material-symbols-outlined text-secondary" style="font-variation-settings: 'FILL' 1;">verified</span>
                                    <span class="font-label-caps text-label-caps text-primary"><?php echo esc_html($narrative_1_bullet_2); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Row 2: text left, image right -->
            <div class="grid grid-cols-12 gap-y-16 md:gap-y-0 gap-x-6 md:gap-x-12 items-center mb-16 md:mb-32 min-w-0">
                <div class="col-span-12 md:col-span-5 flex flex-col justify-center order-1 min-w-0">
                    <h2 class="font-headline-h2 text-headline-h2 text-primary mb-6"><?php echo esc_html($narrative_2_title); ?></h2>
                    <p class="font-body-md text-body-md text-on-surface-variant mb-8"><?php echo esc_html($narrative_2_body); ?></p>
                    <?php if ($narrative_2_cta_label !== '' && $narrative_2_cta_url !== '') : ?>
                        <a class="font-cta text-cta text-secondary border-b border-secondary pb-1 inline-block max-w-full break-words hover:opacity-70 transition-opacity" href="<?php echo esc_url($narrative_2_cta_url); ?>">
                            <?php echo esc_html($narrative_2_cta_label); ?>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="col-span-12 md:col-span-6 md:col-start-7 order-2 min-w-0">
                    <div class="h-[500px] overflow-hidden">
                        <img class="w-full h-full object-cover" alt="" src="<?php echo esc_url($narrative_2_image); ?>">
                    </div>
                </div>
            </div>

            <!-- Row 3: image left, text right -->
            <div class="grid grid-cols-12 gap-y-16 md:gap-y-0 gap-x-6 md:gap-x-12 items-center min-w-0">
                <div class="col-span-12 md:col-span-6 order-2 md:order-1 min-w-0">
                    <div class="h-[500px] md:h-[700px] overflow-hidden">
                        <img class="w-full h-full object-cover" alt="" src="<?php echo esc_url($narrative_3_image); ?>">
                    </div>
                </div>
                <div class="col-span-12 md:col-span-5 md:col-start-8 flex flex-col justify-center order-1 md:order-2 min-w-0">
                    <h2 class="font-headline-h2 text-headline-h2 text-primary mb-6"><?php echo esc_html($narrative_3_title); ?></h2>
                    <p class="font-body-md text-body-md text-on-surface-variant mb-8"><?php echo esc_html($narrative_3_body); ?></p>
                    <?php if ($narrative_3_bullet_1 !== '' || $narrative_3_bullet_2 !== '') : ?>
                        <div class="border-t border-[#F2F0ED] pt-8">
                            <?php if ($narrative_3_bullet_1 !== '') : ?>
                                <div class="flex items-center space-x-4 mb-4">
                                    <span class="material-symbols-outlined text-secondary" style="font-variation-settings: 'FILL' 1;">verified</span>
                                    <span class="font-label-caps text-label-caps text-primary"><?php echo esc_html($narrative_3_bullet_1); ?></span>
                                </div>
                            <?php endif; ?>
                            <?php if ($narrative_3_bullet_2 !== '') : ?>
                                <div class="flex items-center space-x-4">
                                    <span class="material-symbols-outlined text-secondary" style="font-variation-settings: 'FILL' 1;">verified</span>
                                    <span class="font-label-caps text-label-caps text-primary"><?php echo esc_html($narrative_3_bullet_2); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Secondary Hero Section: Narrative Intro -->
    <section class="px-6 md:px-12 py-16 md:py-32 max-w-[1440px] mx-auto grid grid-cols-12 gap-gutter items-center min-w-0">
        <div class="col-span-12 md:col-span-5 mb-16 md:mb-0 min-w-0">
            <span class="font-label-caps text-label-caps text-secondary mb-6 block"><?php echo esc_html($secondary_eyebrow); ?></span>
            <h2 class="font-headline-h1 text-headline-h1 text-primary-container mb-8"><?php echo esc_html($secondary_title); ?></h2>
            <p class="font-body-lg text-body-lg text-on-surface-variant max-w-md"><?php echo esc_html($secondary_description); ?></p>
        </div>
        <div class="col-span-12 md:col-span-7 min-w-0">
            <div class="relative h-[320px] md:h-[600px] w-full overflow-hidden shadow-sm">
                <img class="w-full h-full object-cover" alt="" src="<?php echo esc_url($secondary_image); ?>">
            </div>
        </div>
    </section>

    <!-- Meet our Consultants Section -->
    <section class="bg-[#F2F0ED] py-[120px]">
        <div class="max-w-[1440px] mx-auto px-6 md:px-12 text-center mb-20 min-w-0">
            <span class="font-label-caps text-label-caps text-secondary mb-4 block"><?php echo esc_html($consultants_eyebrow); ?></span>
            <h2 class="font-headline-h2 text-headline-h2 text-primary"><?php echo esc_html($consultants_title); ?></h2>
        </div>
        <div class="max-w-[1440px] mx-auto px-6 md:px-12 grid grid-cols-1 md:grid-cols-3 gap-12 min-w-0">
            <?php foreach ($consultants as $consultant) : ?>
                <?php if ($consultant['name'] === '') {
                    continue;
                } ?>
                <div class="group cursor-pointer">
                    <div class="aspect-[4/5] overflow-hidden mb-8 bg-white">
                        <img class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-700" alt="" src="<?php echo esc_url($consultant['image']); ?>">
                    </div>
                    <h3 class="font-display text-xl text-primary mb-2"><?php echo esc_html($consultant['name']); ?></h3>
                    <?php if ($consultant['role'] !== '') : ?>
                        <p class="font-label-caps text-[10px] text-secondary mb-4 tracking-widest"><?php echo esc_html($consultant['role']); ?></p>
                    <?php endif; ?>
                    <?php if ($consultant['bio'] !== '') : ?>
                        <p class="font-body-md text-sm text-on-surface-variant"><?php echo esc_html($consultant['bio']); ?></p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Final CTA Section -->
    <section class="py-32 bg-primary-container text-white text-center">
        <div class="max-w-[800px] mx-auto px-6 md:px-12 min-w-0">
            <h2 class="font-display text-4xl mb-8 italic"><?php echo esc_html($cta_title); ?></h2>
            <p class="font-body-lg mb-12 text-primary-fixed-dim"><?php echo esc_html($cta_description); ?></p>
            <?php if ($cta_label !== '' && $cta_url !== '') : ?>
                <a href="<?php echo esc_url($cta_url); ?>" class="bg-[#C5A059] text-[#00234B] font-cta text-cta px-10 py-5 uppercase tracking-widest hover:bg-white transition-colors duration-300 inline-block"><?php echo esc_html($cta_label); ?></a>
            <?php endif; ?>
        </div>
    </section>
    <?php viar_render_editor_content(); ?>
</main>
<?php get_footer(); ?>
