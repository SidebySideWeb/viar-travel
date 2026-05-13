<?php
/**
 * Main theme fallback template.
 *
 * @package ViaR_Luxury
 */

get_header();
?>
<main class="site-main max-w-5xl mx-auto px-6 py-16">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <article <?php post_class('mb-12'); ?>>
                <h1 class="text-3xl mb-4"><?php the_title(); ?></h1>
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; ?>
    <?php else : ?>
        <article>
            <h1 class="text-3xl mb-4"><?php esc_html_e('Nothing found', 'viar-luxury'); ?></h1>
            <p><?php esc_html_e('No content is available yet.', 'viar-luxury'); ?></p>
        </article>
    <?php endif; ?>
</main>
<?php
get_footer();
