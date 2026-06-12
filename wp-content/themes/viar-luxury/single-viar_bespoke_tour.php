<?php
/**
 * Single Bespoke Tour template.
 * Generated from `bespoke_tour_detail_cretan_sanctuary` and `bespoke_tour_detail_mobile`.
 *
 * @package ViaR_Luxury
 */

get_header();

while (have_posts()) :
    the_post();

    $post_id = get_the_ID();

    $collection_label = viar_field_value('viar_tour_collection_label', 'Signature Collection', $post_id);
    $hero_image = viar_image_url('viar_tour_hero_image', '', $post_id);
    $intro_title = viar_field_value('viar_tour_intro_title', '', $post_id);
    $intro_lead = viar_field_value('viar_tour_intro_lead', get_the_excerpt(), $post_id);
    $intro_body = viar_field_value('viar_tour_intro_body', '', $post_id);
    if ($intro_body === '') {
        $intro_body = wp_strip_all_tags(get_the_content());
    }

    $duration = viar_field_value('viar_tour_duration', '', $post_id);
    $location = viar_field_value('viar_tour_location', '', $post_id);
    $pace = viar_field_value('viar_tour_pace', '', $post_id);
    $best_season = viar_field_value('viar_tour_best_season', '', $post_id);
    $glance_items = array_filter([
        ['label' => 'Duration', 'value' => $duration],
        ['label' => 'Location', 'value' => $location],
        ['label' => 'Pace', 'value' => $pace],
        ['label' => 'Best Season', 'value' => $best_season],
    ], static fn(array $item): bool => $item['value'] !== '');

    $experiences_label = viar_field_value('viar_tour_experiences_label', 'The Narrative', $post_id);
    $experiences_title = viar_field_value('viar_tour_experiences_title', 'Curated Experiences', $post_id);
    $experiences = viar_get_tour_experiences($post_id);

    $quote = viar_field_value('viar_tour_quote', '', $post_id);
    $quote_attribution = viar_field_value('viar_tour_quote_attribution', '', $post_id);

    $cta_title = viar_field_value('viar_tour_cta_title', 'Begin Your Inquiry', $post_id);
    $cta_description = viar_field_value(
        'viar_tour_cta_description',
        'Connect with our consultants to tailor this odyssey to your personal requirements. Availability for this collection is strictly limited to four expeditions per season.',
        $post_id
    );
    $cta_label = viar_field_value('viar_tour_cta_label', 'Inquire About This Journey', $post_id);
    $cta_url = viar_tour_inquiry_cta_url($post_id);
    $brochure_url = viar_file_url('viar_tour_brochure', '', $post_id);
    $cta_bg_image = viar_image_url('viar_tour_cta_bg_image', '', $post_id);
    $desktop_experience_layouts = [
        ['col' => 'col-span-12 md:col-span-8', 'aspect' => 'aspect-[16/9]'],
        ['col' => 'col-span-12 md:col-span-4 md:mt-24', 'aspect' => 'aspect-[3/4]'],
        ['col' => 'col-span-12 md:col-span-5', 'aspect' => 'aspect-square'],
        ['col' => 'col-span-12 md:col-span-6', 'aspect' => 'aspect-[4/5]'],
        ['col' => 'col-span-12 md:col-span-7', 'aspect' => 'aspect-[16/10]'],
        ['col' => 'col-span-12 md:col-span-5 md:col-start-8', 'aspect' => 'aspect-[3/4]'],
    ];
    ?>
    <main class="site-main w-full max-w-full min-w-0 overflow-x-clip bg-background text-on-background">
        <!-- Hero -->
        <section class="viar-hero-flush relative h-[min(85vh,751px)] md:h-[min(92vh,1024px)] w-full overflow-hidden">
            <?php if ($hero_image !== '') : ?>
                <img
                    src="<?php echo esc_url($hero_image); ?>"
                    alt="<?php echo esc_attr(get_the_title()); ?>"
                    class="absolute inset-0 h-full w-full object-cover"
                >
            <?php endif; ?>
            <div class="absolute inset-0 bg-black/20 md:bg-black/20"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-primary/80 via-transparent to-transparent md:from-black/30 md:via-transparent md:to-transparent"></div>
            <div class="absolute inset-0 flex flex-col justify-end px-8 pb-16 md:px-12 md:pb-24 max-w-[1440px] mx-auto w-full">
                <?php if ($collection_label !== '') : ?>
                    <p class="font-label-caps text-label-caps text-secondary-fixed-dim md:text-white mb-4 uppercase tracking-[0.3em]">
                        <?php echo esc_html($collection_label); ?>
                    </p>
                <?php endif; ?>
                <h1 class="font-display text-headline-h1-mobile md:text-display text-white max-w-4xl italic leading-tight">
                    <?php the_title(); ?>
                </h1>
            </div>
        </section>

        <!-- Editorial Introduction -->
        <?php if ($intro_title !== '' || $intro_lead !== '' || $intro_body !== '') : ?>
            <section class="bg-white px-8 py-20 md:px-12 md:py-[120px] max-w-[1440px] mx-auto">
                <div class="max-w-md mx-auto md:max-w-none md:grid md:grid-cols-12 md:gap-gutter">
                    <?php if ($intro_title !== '') : ?>
                        <div class="md:col-span-5 mb-8 md:mb-0">
                            <h2 class="font-headline-h2-mobile md:font-headline-h1 text-headline-h2-mobile md:text-headline-h1 text-primary-container mb-8">
                                <?php echo esc_html($intro_title); ?>
                            </h2>
                            <div class="w-12 md:w-24 h-px bg-[#C5A059] md:bg-secondary-container"></div>
                        </div>
                    <?php endif; ?>
                    <div class="<?php echo $intro_title !== '' ? 'md:col-span-6 md:col-start-7' : 'md:col-span-12'; ?>">
                        <?php if ($intro_lead !== '') : ?>
                            <p class="font-body-lg text-body-lg text-primary/80 md:text-on-surface-variant mb-6 italic leading-relaxed">
                                <?php echo esc_html($intro_lead); ?>
                            </p>
                        <?php endif; ?>
                        <?php if ($intro_body !== '') : ?>
                            <p class="font-body-md text-body-md text-primary/70 md:text-on-surface-variant leading-relaxed">
                                <?php echo esc_html($intro_body); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <!-- At a Glance -->
        <?php if ($glance_items !== []) : ?>
            <section class="bg-[#F2F0ED] md:bg-surface-container-low px-8 py-16 md:px-12 md:py-[120px]">
                <div class="max-w-md mx-auto md:max-w-[1440px]">
                    <div class="grid grid-cols-2 gap-y-12 gap-x-8 md:grid-cols-4 md:gap-12 md:border-t md:border-b md:border-outline-variant/30 md:py-16">
                        <?php foreach ($glance_items as $item) : ?>
                            <div class="flex flex-col border-l border-[#00234B]/10 md:border-0 pl-4 md:pl-0">
                                <span class="font-label-caps text-[10px] md:text-label-caps text-primary/50 md:text-secondary-container mb-1 md:mb-2 uppercase tracking-widest">
                                    <?php echo esc_html($item['label']); ?>
                                </span>
                                <span class="font-body-lg md:font-headline-h2 text-primary md:text-headline-h2 md:text-primary-container font-medium md:font-normal">
                                    <?php echo esc_html($item['value']); ?>
                                </span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <!-- Curated Experiences -->
        <section class="bg-white px-8 py-24 md:px-12 md:py-[120px] max-w-[1440px] mx-auto">
            <div class="mb-12 md:mb-16">
                    <?php if ($experiences_label !== '') : ?>
                        <p class="font-label-caps text-label-caps text-secondary-container mb-4 uppercase tracking-[0.2em]">
                            <?php echo esc_html($experiences_label); ?>
                        </p>
                    <?php endif; ?>
                    <?php if ($experiences_title !== '') : ?>
                        <h2 class="font-headline-h2-mobile md:font-headline-h1 text-headline-h2-mobile md:text-headline-h1 text-primary-container">
                            <?php echo esc_html($experiences_title); ?>
                        </h2>
                    <?php endif; ?>
            </div>

            <!-- Mobile: vertical stack -->
                <?php if ($experiences !== []) : ?>
                    <div class="space-y-24 md:hidden">
                        <?php foreach ($experiences as $experience) : ?>
                            <article class="flex flex-col">
                                <?php if ($experience['image'] !== '') : ?>
                                    <div class="relative aspect-[3/4] mb-8 overflow-hidden">
                                        <img
                                            src="<?php echo esc_url($experience['image']); ?>"
                                            alt="<?php echo esc_attr($experience['title']); ?>"
                                            class="h-full w-full object-cover"
                                        >
                                    </div>
                                <?php endif; ?>
                                <?php if ($experience['title'] !== '') : ?>
                                    <h3 class="font-headline-h2-mobile text-headline-h2-mobile text-primary mb-4">
                                        <?php echo esc_html($experience['title']); ?>
                                    </h3>
                                <?php endif; ?>
                                <?php if ($experience['description'] !== '') : ?>
                                    <p class="font-body-md text-body-md text-primary/70">
                                        <?php echo esc_html($experience['description']); ?>
                                    </p>
                                <?php endif; ?>
                            </article>
                        <?php endforeach; ?>
                    </div>
            <?php endif; ?>

            <!-- Desktop: editorial grid -->
            <?php if ($experiences !== [] || $quote !== '') : ?>
                <div class="hidden md:grid md:grid-cols-12 md:gap-8">
                        <?php foreach ($experiences as $index => $experience) :
                            $layout = $desktop_experience_layouts[$index] ?? $desktop_experience_layouts[0];
                            ?>
                            <article class="<?php echo esc_attr($layout['col']); ?> group overflow-hidden">
                                <?php if ($experience['image'] !== '') : ?>
                                    <div class="<?php echo esc_attr($layout['aspect']); ?> mb-6 overflow-hidden">
                                        <img
                                            src="<?php echo esc_url($experience['image']); ?>"
                                            alt="<?php echo esc_attr($experience['title']); ?>"
                                            class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105"
                                        >
                                    </div>
                                <?php endif; ?>
                                <?php if ($experience['title'] !== '') : ?>
                                    <h3 class="font-headline-h2 text-headline-h2 text-primary-container mb-2 italic">
                                        <?php echo esc_html($experience['title']); ?>
                                    </h3>
                                <?php endif; ?>
                                <?php if ($experience['description'] !== '') : ?>
                                    <p class="font-body-md text-body-md text-on-surface-variant max-w-2xl">
                                        <?php echo esc_html($experience['description']); ?>
                                    </p>
                                <?php endif; ?>
                            </article>
                        <?php endforeach; ?>

                        <?php if ($quote !== '') : ?>
                            <div class="col-span-12 md:col-span-7 group overflow-hidden flex flex-col justify-center md:px-12">
                                <blockquote class="border-l-2 border-secondary-container pl-12 py-8">
                                    <p class="font-display text-headline-h1 text-primary-container mb-6 italic leading-snug">
                                        <?php echo esc_html($quote); ?>
                                    </p>
                                    <?php if ($quote_attribution !== '') : ?>
                                        <cite class="font-label-caps text-label-caps text-secondary-container uppercase tracking-widest not-italic">
                                            <?php echo esc_html($quote_attribution); ?>
                                        </cite>
                                    <?php endif; ?>
                                </blockquote>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <!-- Mobile pull quote -->
                <?php if ($quote !== '') : ?>
                    <section class="mt-24 px-0 py-24 bg-[#00234B] text-center md:hidden">
                        <div class="max-w-xs mx-auto">
                            <span class="material-symbols-outlined text-[#C5A059] text-4xl mb-6" aria-hidden="true">format_quote</span>
                            <blockquote class="font-headline-h2-mobile text-headline-h2-mobile text-white italic mb-8">
                                <?php echo esc_html($quote); ?>
                            </blockquote>
                            <?php if ($quote_attribution !== '') : ?>
                                <cite class="font-label-caps text-secondary-fixed-dim block not-italic">
                                    <?php echo esc_html($quote_attribution); ?>
                                </cite>
                            <?php endif; ?>
                        </div>
                    </section>
                <?php endif; ?>
        </section>

        <!-- CTA -->
        <section class="px-8 py-24 md:px-12 md:mb-[120px] bg-[#F2F0ED] md:bg-transparent text-center border-t border-[#00234B]/5 md:border-0 max-w-[1440px] mx-auto">
            <div class="md:bg-primary-container md:py-24 md:px-12 lg:px-24 text-center relative overflow-hidden">
                <?php if ($cta_bg_image !== '') : ?>
                    <div class="absolute inset-0 opacity-10 hidden md:block" aria-hidden="true">
                        <img src="<?php echo esc_url($cta_bg_image); ?>" alt="" class="h-full w-full object-cover">
                    </div>
                <?php endif; ?>
                <div class="relative z-10">
                    <h2 class="font-headline-h2-mobile md:font-display text-headline-h2-mobile md:text-display text-primary md:text-white mb-4 md:mb-8">
                        <?php echo esc_html($cta_title); ?>
                    </h2>
                    <?php if ($cta_description !== '') : ?>
                        <p class="font-body-md md:font-body-lg text-body-md md:text-body-lg text-primary/70 md:text-white/70 max-w-xs md:max-w-2xl mx-auto mb-10 md:mb-12">
                            <?php echo esc_html($cta_description); ?>
                        </p>
                    <?php endif; ?>
                    <a
                        href="<?php echo esc_url($cta_url); ?>"
                        class="inline-block w-full md:w-auto py-5 md:px-12 bg-[#C5A059] text-primary md:text-[#00234B] font-cta text-cta uppercase tracking-widest md:tracking-[0.3em] hover:opacity-90 md:hover:bg-white transition-all duration-300 md:duration-500 md:active:scale-95 md:shadow-xl"
                    >
                        <?php echo esc_html($cta_label); ?>
                    </a>
                    <?php if ($brochure_url !== '') : ?>
                        <a
                            href="<?php echo esc_url($brochure_url); ?>"
                            class="mt-4 inline-block w-full py-5 border border-[#C5A059] text-primary font-cta text-cta uppercase tracking-widest hover:bg-[#C5A059]/5 transition-all duration-300 md:hidden"
                            download
                        >
                            Download Brochure
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <?php get_template_part('parts/tour-booking-form'); ?>

        <?php viar_render_editor_content(); ?>
    </main>
    <?php
endwhile;

get_footer();
