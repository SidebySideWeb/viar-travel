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

$page_id = get_queried_object_id() ?: get_the_ID();

$hero_eyebrow = viar_field_value('viar_about_hero_eyebrow', '', $page_id);
$hero_title = viar_field_value('viar_about_hero_title', '', $page_id);
$hero_description = viar_field_value('viar_about_hero_description', '', $page_id);
$hero_image = viar_field_image_url('viar_about_hero_image', $page_id);

$philosophy_title = viar_field_value('viar_about_philosophy_title', '', $page_id);

$narrative_1_title = viar_field_value('viar_about_narrative_1_title', '', $page_id);
$narrative_1_body = viar_field_value('viar_about_narrative_1_body', '', $page_id);
$narrative_1_bullet_1 = viar_field_value('viar_about_narrative_1_bullet_1', '', $page_id);
$narrative_1_bullet_2 = viar_field_value('viar_about_narrative_1_bullet_2', '', $page_id);
$narrative_1_image = viar_field_image_url('viar_about_narrative_1_image', $page_id);

$narrative_2_title = viar_field_value('viar_about_narrative_2_title', '', $page_id);
$narrative_2_body = viar_field_value('viar_about_narrative_2_body', '', $page_id);
$narrative_2_cta_label = viar_field_value('viar_about_narrative_2_cta_label', '', $page_id);
$narrative_2_cta_url = viar_field_value('viar_about_narrative_2_cta_url', '', $page_id);
$narrative_2_image = viar_field_image_url('viar_about_narrative_2_image', $page_id);

$narrative_3_title = viar_field_value('viar_about_narrative_3_title', '', $page_id);
$narrative_3_body = viar_field_value('viar_about_narrative_3_body', '', $page_id);
$narrative_3_bullet_1 = viar_field_value('viar_about_narrative_3_bullet_1', '', $page_id);
$narrative_3_bullet_2 = viar_field_value('viar_about_narrative_3_bullet_2', '', $page_id);
$narrative_3_image = viar_field_image_url('viar_about_narrative_3_image', $page_id);

$secondary_eyebrow = viar_field_value('viar_about_secondary_eyebrow', '', $page_id);
$secondary_title = viar_field_value('viar_about_secondary_title', '', $page_id);
$secondary_description = viar_field_value('viar_about_secondary_description', '', $page_id);
$secondary_image = viar_field_image_url('viar_about_secondary_image', $page_id);

$consultants_eyebrow = viar_field_value('viar_about_consultants_eyebrow', '', $page_id);
$consultants_title = viar_field_value('viar_about_consultants_title', '', $page_id);

$consultants = [
    [
        'name'  => viar_field_value('viar_about_consultant_1_name', '', $page_id),
        'role'  => viar_field_value('viar_about_consultant_1_role', '', $page_id),
        'bio'   => viar_field_value('viar_about_consultant_1_bio', '', $page_id),
        'image' => viar_field_image_url('viar_about_consultant_1_image', $page_id),
    ],
    [
        'name'  => viar_field_value('viar_about_consultant_2_name', '', $page_id),
        'role'  => viar_field_value('viar_about_consultant_2_role', '', $page_id),
        'bio'   => viar_field_value('viar_about_consultant_2_bio', '', $page_id),
        'image' => viar_field_image_url('viar_about_consultant_2_image', $page_id),
    ],
    [
        'name'  => viar_field_value('viar_about_consultant_3_name', '', $page_id),
        'role'  => viar_field_value('viar_about_consultant_3_role', '', $page_id),
        'bio'   => viar_field_value('viar_about_consultant_3_bio', '', $page_id),
        'image' => viar_field_image_url('viar_about_consultant_3_image', $page_id),
    ],
];

$cta_title = viar_field_value('viar_about_cta_title', '', $page_id);
$cta_description = viar_field_value('viar_about_cta_description', '', $page_id);
$cta_label = viar_field_value('viar_about_cta_label', '', $page_id);
$cta_url = viar_field_value('viar_about_cta_url', '', $page_id);

$has_hero = $hero_eyebrow !== '' || $hero_title !== '' || $hero_description !== '' || $hero_image !== '';
$has_philosophy = $philosophy_title !== '';
$has_narrative_1 = $narrative_1_title !== '' || $narrative_1_body !== '' || $narrative_1_bullet_1 !== '' || $narrative_1_bullet_2 !== '' || $narrative_1_image !== '';
$has_narrative_2 = $narrative_2_title !== '' || $narrative_2_body !== '' || $narrative_2_image !== '' || ($narrative_2_cta_label !== '' && $narrative_2_cta_url !== '');
$has_narrative_3 = $narrative_3_title !== '' || $narrative_3_body !== '' || $narrative_3_bullet_1 !== '' || $narrative_3_bullet_2 !== '' || $narrative_3_image !== '';
$has_narratives = $has_narrative_1 || $has_narrative_2 || $has_narrative_3;
$has_secondary = $secondary_eyebrow !== '' || $secondary_title !== '' || $secondary_description !== '' || $secondary_image !== '';
$has_consultants_header = $consultants_eyebrow !== '' || $consultants_title !== '';
$has_consultants = array_filter($consultants, static fn(array $c): bool => $c['name'] !== '') !== [];
$has_cta = $cta_title !== '' || $cta_description !== '' || ($cta_label !== '' && $cta_url !== '');
?>
<main class="site-main w-full max-w-full min-w-0 overflow-x-clip">
    <?php if ($has_hero) : ?>
    <!-- Hero Section: Narrative Intro -->
    <section class="viar-content-below-header px-6 md:px-12 py-16 md:py-32 max-w-[1440px] mx-auto grid grid-cols-12 gap-gutter items-center min-w-0">
        <?php if ($hero_eyebrow !== '' || $hero_title !== '' || $hero_description !== '') : ?>
        <div class="col-span-12 md:col-span-5 mb-16 md:mb-0 min-w-0">
            <?php if ($hero_eyebrow !== '') : ?>
                <span class="font-label-caps text-label-caps text-secondary mb-6 block"><?php echo esc_html($hero_eyebrow); ?></span>
            <?php endif; ?>
            <?php if ($hero_title !== '') : ?>
                <h1 class="font-headline-h1 text-headline-h1 text-primary-container mb-8"><?php echo esc_html($hero_title); ?></h1>
            <?php endif; ?>
            <?php if ($hero_description !== '') : ?>
                <p class="font-body-lg text-body-lg text-on-surface-variant max-w-md"><?php echo esc_html($hero_description); ?></p>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        <?php if ($hero_image !== '') : ?>
        <div class="col-span-12 <?php echo ($hero_eyebrow !== '' || $hero_title !== '' || $hero_description !== '') ? 'md:col-span-7' : 'md:col-span-12'; ?> min-w-0">
            <div class="relative h-[320px] md:h-[600px] w-full overflow-hidden shadow-sm">
                <img class="w-full h-full object-cover" alt="" src="<?php echo esc_url($hero_image); ?>">
            </div>
        </div>
        <?php endif; ?>
    </section>
    <?php endif; ?>

    <?php if ($has_philosophy) : ?>
    <!-- Philosophy Title -->
    <section class="bg-surface-container-low py-16 md:py-24">
        <div class="max-w-[1440px] mx-auto px-6 md:px-12 min-w-0">
            <h2 class="font-headline-h2 text-headline-h2 text-primary-container"><?php echo esc_html($philosophy_title); ?></h2>
        </div>
    </section>
    <?php endif; ?>

    <?php if ($has_narratives) : ?>
    <!-- Narrative Content: Asymmetric Layout -->
    <section class="py-[120px]">
        <div class="max-w-[1440px] mx-auto px-6 md:px-12 min-w-0">
            <?php if ($has_narrative_1) : ?>
            <!-- Row 1: image left, text right -->
            <div class="grid grid-cols-12 gap-y-16 md:gap-y-0 gap-x-6 md:gap-x-12 items-center mb-16 md:mb-32 min-w-0">
                <?php if ($narrative_1_image !== '') : ?>
                <div class="col-span-12 md:col-span-6 order-2 md:order-1 min-w-0">
                    <div class="h-[500px] md:h-[700px] overflow-hidden">
                        <img class="w-full h-full object-cover" alt="" src="<?php echo esc_url($narrative_1_image); ?>">
                    </div>
                </div>
                <?php endif; ?>
                <?php if ($narrative_1_title !== '' || $narrative_1_body !== '' || $narrative_1_bullet_1 !== '' || $narrative_1_bullet_2 !== '') : ?>
                <div class="col-span-12 md:col-span-5 <?php echo $narrative_1_image !== '' ? 'md:col-start-8' : 'md:col-start-1'; ?> flex flex-col justify-center order-1 md:order-2 min-w-0">
                    <?php if ($narrative_1_title !== '') : ?>
                        <h2 class="font-headline-h2 text-headline-h2 text-primary mb-6"><?php echo esc_html($narrative_1_title); ?></h2>
                    <?php endif; ?>
                    <?php if ($narrative_1_body !== '') : ?>
                        <p class="font-body-md text-body-md text-on-surface-variant mb-8"><?php echo esc_html($narrative_1_body); ?></p>
                    <?php endif; ?>
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
                <?php endif; ?>
            </div>
            <?php endif; ?>

            <?php if ($has_narrative_2) : ?>
            <!-- Row 2: text left, image right -->
            <div class="grid grid-cols-12 gap-y-16 md:gap-y-0 gap-x-6 md:gap-x-12 items-center mb-16 md:mb-32 min-w-0">
                <?php if ($narrative_2_title !== '' || $narrative_2_body !== '' || ($narrative_2_cta_label !== '' && $narrative_2_cta_url !== '')) : ?>
                <div class="col-span-12 md:col-span-5 flex flex-col justify-center order-1 min-w-0">
                    <?php if ($narrative_2_title !== '') : ?>
                        <h2 class="font-headline-h2 text-headline-h2 text-primary mb-6"><?php echo esc_html($narrative_2_title); ?></h2>
                    <?php endif; ?>
                    <?php if ($narrative_2_body !== '') : ?>
                        <p class="font-body-md text-body-md text-on-surface-variant mb-8"><?php echo esc_html($narrative_2_body); ?></p>
                    <?php endif; ?>
                    <?php if ($narrative_2_cta_label !== '' && $narrative_2_cta_url !== '') : ?>
                        <a class="font-cta text-cta text-secondary border-b border-secondary pb-1 inline-block max-w-full break-words hover:opacity-70 transition-opacity" href="<?php echo esc_url($narrative_2_cta_url); ?>">
                            <?php echo esc_html($narrative_2_cta_label); ?>
                        </a>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                <?php if ($narrative_2_image !== '') : ?>
                <div class="col-span-12 md:col-span-6 md:col-start-7 order-2 min-w-0">
                    <div class="h-[500px] overflow-hidden">
                        <img class="w-full h-full object-cover" alt="" src="<?php echo esc_url($narrative_2_image); ?>">
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>

            <?php if ($has_narrative_3) : ?>
            <!-- Row 3: image left, text right -->
            <div class="grid grid-cols-12 gap-y-16 md:gap-y-0 gap-x-6 md:gap-x-12 items-center min-w-0">
                <?php if ($narrative_3_image !== '') : ?>
                <div class="col-span-12 md:col-span-6 order-2 md:order-1 min-w-0">
                    <div class="h-[500px] md:h-[700px] overflow-hidden">
                        <img class="w-full h-full object-cover" alt="" src="<?php echo esc_url($narrative_3_image); ?>">
                    </div>
                </div>
                <?php endif; ?>
                <?php if ($narrative_3_title !== '' || $narrative_3_body !== '' || $narrative_3_bullet_1 !== '' || $narrative_3_bullet_2 !== '') : ?>
                <div class="col-span-12 md:col-span-5 <?php echo $narrative_3_image !== '' ? 'md:col-start-8' : 'md:col-start-1'; ?> flex flex-col justify-center order-1 md:order-2 min-w-0">
                    <?php if ($narrative_3_title !== '') : ?>
                        <h2 class="font-headline-h2 text-headline-h2 text-primary mb-6"><?php echo esc_html($narrative_3_title); ?></h2>
                    <?php endif; ?>
                    <?php if ($narrative_3_body !== '') : ?>
                        <p class="font-body-md text-body-md text-on-surface-variant mb-8"><?php echo esc_html($narrative_3_body); ?></p>
                    <?php endif; ?>
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
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php endif; ?>

    <?php if ($has_secondary) : ?>
    <!-- Secondary Hero Section: Narrative Intro -->
    <section class="px-6 md:px-12 py-16 md:py-32 max-w-[1440px] mx-auto grid grid-cols-12 gap-gutter items-center min-w-0">
        <?php if ($secondary_eyebrow !== '' || $secondary_title !== '' || $secondary_description !== '') : ?>
        <div class="col-span-12 md:col-span-5 mb-16 md:mb-0 min-w-0">
            <?php if ($secondary_eyebrow !== '') : ?>
                <span class="font-label-caps text-label-caps text-secondary mb-6 block"><?php echo esc_html($secondary_eyebrow); ?></span>
            <?php endif; ?>
            <?php if ($secondary_title !== '') : ?>
                <h2 class="font-headline-h1 text-headline-h1 text-primary-container mb-8"><?php echo esc_html($secondary_title); ?></h2>
            <?php endif; ?>
            <?php if ($secondary_description !== '') : ?>
                <p class="font-body-lg text-body-lg text-on-surface-variant max-w-md"><?php echo esc_html($secondary_description); ?></p>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        <?php if ($secondary_image !== '') : ?>
        <div class="col-span-12 <?php echo ($secondary_eyebrow !== '' || $secondary_title !== '' || $secondary_description !== '') ? 'md:col-span-7' : 'md:col-span-12'; ?> min-w-0">
            <div class="relative h-[320px] md:h-[600px] w-full overflow-hidden shadow-sm">
                <img class="w-full h-full object-cover" alt="" src="<?php echo esc_url($secondary_image); ?>">
            </div>
        </div>
        <?php endif; ?>
    </section>
    <?php endif; ?>

    <?php if ($has_consultants_header || $has_consultants) : ?>
    <!-- Meet our Consultants Section -->
    <section class="bg-[#F2F0ED] py-[120px]">
        <?php if ($has_consultants_header) : ?>
        <div class="max-w-[1440px] mx-auto px-6 md:px-12 text-center mb-20 min-w-0">
            <?php if ($consultants_eyebrow !== '') : ?>
                <span class="font-label-caps text-label-caps text-secondary mb-4 block"><?php echo esc_html($consultants_eyebrow); ?></span>
            <?php endif; ?>
            <?php if ($consultants_title !== '') : ?>
                <h2 class="font-headline-h2 text-headline-h2 text-primary"><?php echo esc_html($consultants_title); ?></h2>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        <?php if ($has_consultants) : ?>
        <div class="max-w-[1440px] mx-auto px-6 md:px-12 grid grid-cols-1 md:grid-cols-3 gap-12 min-w-0">
            <?php foreach ($consultants as $consultant) : ?>
                <?php if ($consultant['name'] === '') {
                    continue;
                } ?>
                <div class="group cursor-pointer">
                    <?php if ($consultant['image'] !== '') : ?>
                    <div class="aspect-[4/5] overflow-hidden mb-8 bg-white">
                        <img class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-700" alt="" src="<?php echo esc_url($consultant['image']); ?>">
                    </div>
                    <?php endif; ?>
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
        <?php endif; ?>
    </section>
    <?php endif; ?>

    <?php if ($has_cta) : ?>
    <!-- Final CTA Section -->
    <section class="py-32 bg-primary-container text-white text-center">
        <div class="max-w-[800px] mx-auto px-6 md:px-12 min-w-0">
            <?php if ($cta_title !== '') : ?>
                <h2 class="font-display text-4xl mb-8 italic"><?php echo esc_html($cta_title); ?></h2>
            <?php endif; ?>
            <?php if ($cta_description !== '') : ?>
                <p class="font-body-lg mb-12 text-primary-fixed-dim"><?php echo esc_html($cta_description); ?></p>
            <?php endif; ?>
            <?php if ($cta_label !== '' && $cta_url !== '') : ?>
                <a href="<?php echo esc_url($cta_url); ?>" class="bg-[#C5A059] text-[#00234B] font-cta text-cta px-10 py-5 uppercase tracking-widest hover:bg-white transition-colors duration-300 inline-block"><?php echo esc_html($cta_label); ?></a>
            <?php endif; ?>
        </div>
    </section>
    <?php endif; ?>
    <?php viar_render_editor_content(); ?>
</main>
<?php get_footer(); ?>
