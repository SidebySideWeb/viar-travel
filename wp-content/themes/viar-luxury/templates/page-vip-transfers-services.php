<?php
/**
 * Template Name: Vip Transfers Services
 * Template generated from `vip_transfers_services/code.html`
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
$form_href = viar_vip_transfer_form_href();

$hero_eyebrow = viar_field_value('viar_vip_hero_eyebrow', '', $page_id);
$hero_title = viar_field_value('viar_vip_hero_title', '', $page_id);
$hero_description = viar_field_value('viar_vip_hero_description', '', $page_id);
$hero_image = viar_field_image_url('viar_vip_hero_image', $page_id);
$hero_cta_label = viar_field_value('viar_vip_hero_cta_label', '', $page_id);
$hero_cta_url = viar_field_value('viar_vip_hero_cta_url', '', $page_id);
$hero_cta_href = $hero_cta_url !== '' ? $hero_cta_url : $form_href;

$services_title = viar_field_value('viar_vip_services_title', '', $page_id);
$services_description = viar_field_value('viar_vip_services_description', '', $page_id);
$services_link_label = viar_field_value('viar_vip_services_link_label', '', $page_id);
$services_link_url = viar_field_value('viar_vip_services_link_url', '', $page_id);

$services = [];
for ($i = 1; $i <= 4; $i++) {
    $services[] = [
        'title' => viar_field_value("viar_vip_service_{$i}_title", '', $page_id),
        'body'  => viar_field_value("viar_vip_service_{$i}_body", '', $page_id),
        'image' => viar_field_image_url("viar_vip_service_{$i}_image", $page_id),
    ];
}
$services = array_values(array_filter($services, static function (array $service): bool {
    return $service['title'] !== '' || $service['body'] !== '' || $service['image'] !== '';
}));

$fleet_eyebrow = viar_field_value('viar_vip_fleet_eyebrow', '', $page_id);
$fleet_title = viar_field_value('viar_vip_fleet_title', '', $page_id);
$fleet_book_label = viar_field_value('viar_vip_fleet_book_label', '', $page_id);

$form_eyebrow = viar_field_value('viar_vip_form_eyebrow', '', $page_id);
$form_title = viar_field_value('viar_vip_form_title', '', $page_id);
$form_description = viar_field_value('viar_vip_form_description', '', $page_id);

$stats_title = viar_field_value('viar_vip_stats_title', '', $page_id);
$stats = array_values(array_filter([
    [
        'value' => viar_field_value('viar_vip_stat_1_value', '', $page_id),
        'label' => viar_field_value('viar_vip_stat_1_label', '', $page_id),
    ],
    [
        'value' => viar_field_value('viar_vip_stat_2_value', '', $page_id),
        'label' => viar_field_value('viar_vip_stat_2_label', '', $page_id),
    ],
    [
        'value' => viar_field_value('viar_vip_stat_3_value', '', $page_id),
        'label' => viar_field_value('viar_vip_stat_3_label', '', $page_id),
    ],
], static fn(array $stat): bool => $stat['value'] !== '' || $stat['label'] !== ''));

$cta_title = viar_field_value('viar_vip_cta_title', '', $page_id);
$cta_description = viar_field_value('viar_vip_cta_description', '', $page_id);
$cta_primary_label = viar_field_value('viar_vip_cta_primary_label', '', $page_id);
$cta_primary_url = viar_field_value('viar_vip_cta_primary_url', '', $page_id);
$cta_primary_href = $cta_primary_url !== '' ? $cta_primary_url : $form_href;
$cta_secondary_label = viar_field_value('viar_vip_cta_secondary_label', '', $page_id);
$cta_secondary_url = viar_field_value('viar_vip_cta_secondary_url', '', $page_id);

$map_image = viar_field_image_url('viar_vip_map_image', $page_id);
$map_label = viar_field_value('viar_vip_map_label', '', $page_id);

$has_hero = $hero_eyebrow !== '' || $hero_title !== '' || $hero_description !== '' || $hero_image !== '' || $hero_cta_label !== '';
$has_services_intro = $services_title !== '' || $services_description !== '' || ($services_link_label !== '' && $services_link_url !== '');
$has_services_section = $has_services_intro || $services !== [];
$has_fleet_header = $fleet_eyebrow !== '' || $fleet_title !== '';
$has_form_header = $form_eyebrow !== '' || $form_title !== '' || $form_description !== '';
$has_stats = $stats_title !== '' || $stats !== [];
$has_cta = $cta_title !== '' || $cta_description !== '' || $cta_primary_label !== '' || $cta_secondary_label !== '';
$has_map = $map_image !== '' || $map_label !== '';
?>
<main class="site-main w-full max-w-full min-w-0 overflow-x-clip">
<?php if ($has_hero) : ?>
<!-- Hero Section -->
<header class="viar-hero-flush relative w-full h-[921px] flex items-center overflow-hidden">
    <?php if ($hero_image !== '') : ?>
    <div class="absolute inset-0 z-0">
        <img class="w-full h-full object-cover" alt="" src="<?php echo esc_url($hero_image); ?>">
        <div class="absolute inset-0 bg-primary/20"></div>
    </div>
    <?php endif; ?>
    <div class="relative z-10 max-w-[1440px] mx-auto px-6 md:px-12 w-full min-w-0">
        <div class="max-w-2xl text-white">
            <?php if ($hero_eyebrow !== '') : ?>
                <span class="font-label-caps text-label-caps mb-6 block text-secondary-fixed uppercase tracking-[0.3em]"><?php echo esc_html($hero_eyebrow); ?></span>
            <?php endif; ?>
            <?php if ($hero_title !== '') : ?>
                <h1 class="font-display text-display mb-8"><?php echo esc_html($hero_title); ?></h1>
            <?php endif; ?>
            <?php if ($hero_description !== '') : ?>
                <p class="font-body-lg text-body-lg opacity-90 mb-10 leading-relaxed"><?php echo esc_html($hero_description); ?></p>
            <?php endif; ?>
            <?php if ($hero_cta_label !== '') : ?>
                <a href="<?php echo viar_esc_vip_transfer_href($hero_cta_href); ?>" class="inline-block bg-[#C5A059] text-primary px-10 py-5 font-cta text-cta uppercase tracking-widest hover:bg-[#b08d48] transition-all">
                    <?php echo esc_html($hero_cta_label); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</header>
<?php endif; ?>

<?php if ($has_services_section) : ?>
<!-- Services Grid: Asymmetric Layout -->
<section class="py-[120px] max-w-[1440px] mx-auto px-6 md:px-12 min-w-0">
    <div class="grid grid-cols-12 gap-gutter items-start min-w-0">
        <?php if ($has_services_intro) : ?>
        <div class="col-span-12 lg:col-span-4 lg:self-start mb-16 lg:mb-0 min-w-0">
            <?php if ($services_title !== '') : ?>
                <h2 class="font-headline-h1 text-headline-h1 text-primary-container mb-8"><?php echo esc_html($services_title); ?></h2>
            <?php endif; ?>
            <?php if ($services_description !== '') : ?>
                <p class="font-body-md text-body-md text-on-surface-variant mb-12 max-w-sm"><?php echo esc_html($services_description); ?></p>
            <?php endif; ?>
            <?php if ($services_link_label !== '' && $services_link_url !== '') : ?>
                <a href="<?php echo esc_url($services_link_url); ?>" class="flex items-center gap-4 group">
                    <span class="w-12 h-[1px] bg-secondary group-hover:w-20 transition-all duration-500"></span>
                    <span class="font-label-caps text-label-caps text-secondary uppercase"><?php echo esc_html($services_link_label); ?></span>
                </a>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        <?php if ($services !== []) : ?>
        <div class="col-span-12 <?php echo $has_services_intro ? 'lg:col-span-8' : 'lg:col-span-12'; ?> grid grid-cols-1 md:grid-cols-2 gap-12 min-w-0">
            <?php foreach ($services as $index => $service) : ?>
                <div class="group<?php echo $index % 2 === 1 ? ' mt-12 md:mt-24' : ''; ?>">
                    <?php if ($service['image'] !== '') : ?>
                    <div class="aspect-[4/5] overflow-hidden mb-6">
                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="" src="<?php echo esc_url($service['image']); ?>">
                    </div>
                    <?php endif; ?>
                    <?php if ($service['title'] !== '') : ?>
                        <h3 class="font-headline-h2 text-headline-h2 text-primary mb-3"><?php echo esc_html($service['title']); ?></h3>
                    <?php endif; ?>
                    <?php if ($service['body'] !== '') : ?>
                        <p class="font-body-md text-body-md text-on-surface-variant"><?php echo esc_html($service['body']); ?></p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>

<section id="vip-fleet" class="py-[120px] bg-white border-t border-[#F2F0ED] scroll-mt-28">
    <div class="max-w-[1440px] mx-auto px-6 md:px-12 min-w-0">
        <?php if ($has_fleet_header) : ?>
        <div class="mb-14">
            <?php if ($fleet_eyebrow !== '') : ?>
                <span class="font-label-caps text-label-caps text-[#C5A059] mb-3 block"><?php echo esc_html($fleet_eyebrow); ?></span>
            <?php endif; ?>
            <?php if ($fleet_title !== '') : ?>
                <h2 class="font-headline-h1 text-headline-h1 text-[#00234B]"><?php echo esc_html($fleet_title); ?></h2>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
        <?php
        $fleet_query = new WP_Query([
            'post_type' => 'viar_fleet',
            'post_status' => 'publish',
            'posts_per_page' => 9,
        ]);
        if ($fleet_query->have_posts()) :
            while ($fleet_query->have_posts()) :
                $fleet_query->the_post();
                $fleet_excerpt = get_the_excerpt();
                $fleet_label = viar_field_value('viar_fleet_card_label', '', get_the_ID());
                $fleet_card_image = viar_field_image_url('viar_fleet_card_image', get_the_ID());
                ?>
                <article class="group border border-[#00234B]/10 hover:border-[#C5A059] transition-colors p-6">
                    <a href="<?php echo esc_url(get_permalink()); ?>" class="block">
                        <?php if ($fleet_card_image !== '') : ?>
                            <img src="<?php echo esc_url($fleet_card_image); ?>" class="w-full h-56 object-cover mb-5" alt="<?php echo esc_attr(get_the_title()); ?>">
                        <?php endif; ?>
                        <?php if ($fleet_label !== '') : ?>
                            <p class="font-label-caps text-[10px] text-[#C5A059] mb-2"><?php echo esc_html($fleet_label); ?></p>
                        <?php endif; ?>
                        <h3 class="font-headline-h2 text-2xl text-[#00234B] mb-2"><?php the_title(); ?></h3>
                        <?php if ($fleet_excerpt !== '') : ?>
                            <p class="font-body-md text-[#00234B]/70 mb-4"><?php echo esc_html($fleet_excerpt); ?></p>
                        <?php endif; ?>
                    </a>
                    <?php if ($fleet_book_label !== '') : ?>
                        <a href="<?php echo viar_esc_vip_transfer_href($form_href); ?>" class="font-cta text-cta uppercase tracking-[0.08em] text-[#C5A059] hover:text-[#00234B] transition-colors"><?php echo esc_html($fleet_book_label); ?></a>
                    <?php endif; ?>
                </article>
                <?php
            endwhile;
            wp_reset_postdata();
        else :
            ?>
            <p class="font-body-md text-[#00234B]/70"><?php esc_html_e('No fleet vehicles published yet. Add Fleet posts from the WordPress admin.', 'viar-luxury'); ?></p>
            <?php
        endif;
        ?>
        </div>
    </div>
</section>

<?php
get_template_part('parts/vip-transfer-form', null, [
    'eyebrow'      => $form_eyebrow,
    'title'        => $form_title,
    'description'  => $form_description,
    'show_header'  => $has_form_header,
]);
?>

<?php if ($has_stats) : ?>
<!-- Content / Stats Section -->
<section class="bg-[#F2F0ED] py-[120px]">
    <div class="max-w-[1440px] mx-auto px-6 md:px-12 min-w-0">
        <div class="border-l border-primary/10 pl-6 md:pl-12 max-w-4xl min-w-0">
            <?php if ($stats_title !== '') : ?>
                <h2 class="font-display text-headline-h1 text-primary-container mb-12 leading-tight"><?php echo esc_html($stats_title); ?></h2>
            <?php endif; ?>
            <?php if ($stats !== []) : ?>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-16">
                <?php foreach ($stats as $stat) : ?>
                <div>
                    <?php if ($stat['value'] !== '') : ?>
                        <div class="font-display text-4xl text-secondary mb-2"><?php echo esc_html($stat['value']); ?></div>
                    <?php endif; ?>
                    <?php if ($stat['label'] !== '') : ?>
                        <div class="font-label-caps text-label-caps text-on-surface-variant uppercase"><?php echo esc_html($stat['label']); ?></div>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if ($has_cta) : ?>
<!-- Call to Action Section -->
<section class="py-[160px] text-center max-w-[1440px] mx-auto px-6 md:px-12 min-w-0">
    <div class="max-w-3xl mx-auto">
        <?php if ($cta_title !== '') : ?>
            <h2 class="font-display text-display text-primary mb-8"><?php echo esc_html($cta_title); ?></h2>
        <?php endif; ?>
        <?php if ($cta_description !== '') : ?>
            <p class="font-body-lg text-body-lg text-on-surface-variant mb-12"><?php echo esc_html($cta_description); ?></p>
        <?php endif; ?>
        <?php if ($cta_primary_label !== '' || $cta_secondary_label !== '') : ?>
        <div class="flex flex-col sm:flex-row justify-center gap-6">
            <?php if ($cta_primary_label !== '') : ?>
                <a href="<?php echo viar_esc_vip_transfer_href($cta_primary_href); ?>" class="inline-block bg-[#C5A059] text-primary px-12 py-5 font-cta text-cta uppercase tracking-[0.2em] hover:bg-[#b08d48] transition-all">
                    <?php echo esc_html($cta_primary_label); ?>
                </a>
            <?php endif; ?>
            <?php if ($cta_secondary_label !== '') : ?>
                <?php if ($cta_secondary_url !== '') : ?>
                    <a href="<?php echo esc_url($cta_secondary_url); ?>" class="inline-block border border-[#C5A059] text-[#C5A059] px-12 py-5 font-cta text-cta uppercase tracking-[0.2em] hover:bg-[#C5A059]/5 transition-all">
                        <?php echo esc_html($cta_secondary_label); ?>
                    </a>
                <?php else : ?>
                    <button type="button" class="border border-[#C5A059] text-[#C5A059] px-12 py-5 font-cta text-cta uppercase tracking-[0.2em] hover:bg-[#C5A059]/5 transition-all">
                        <?php echo esc_html($cta_secondary_label); ?>
                    </button>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>

<?php if ($has_map) : ?>
<!-- Map Section Hint -->
<section class="relative h-[614px] w-full overflow-hidden grayscale opacity-50 hover:grayscale-0 transition-all duration-1000">
    <?php if ($map_image !== '') : ?>
        <img class="w-full h-full object-cover" alt="" src="<?php echo esc_url($map_image); ?>">
    <?php endif; ?>
    <?php if ($map_label !== '') : ?>
    <div class="absolute inset-0 flex items-center justify-center">
        <div class="bg-white px-8 py-4 shadow-xl">
            <span class="font-label-caps text-label-caps text-primary"><?php echo esc_html($map_label); ?></span>
        </div>
    </div>
    <?php endif; ?>
</section>
<?php endif; ?>
</main>
<?php get_footer(); ?>
