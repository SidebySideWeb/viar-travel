</div>
<?php
$logo_subtitle = viar_get_logo_subtitle();
$footer_phone = get_theme_mod('viar_footer_phone', '+30 000 000 0000');
$footer_email = get_theme_mod('viar_footer_email', 'concierge@viartravel.com');
$footer_copyright = get_theme_mod('viar_footer_copyright', '© 2024 ViaR Travel Solutions. All rights reserved.');
$footer_tagline = get_theme_mod('viar_footer_tagline', 'Quiet luxury, perfectly realized.');
?>
<footer class="w-full pt-32 pb-12 bg-[#F2F0ED] dark:bg-slate-900 border-t border-[#00234B]/10 dark:border-white/10">
  <div class="max-w-[1440px] mx-auto px-6 md:px-12 flex flex-col md:flex-row justify-between gap-12">
    <div class="mb-12 md:mb-0 max-w-sm">
      <div class="viar-logo text-[#00234B] dark:text-white mb-4">
        <?php if (function_exists('the_custom_logo') && has_custom_logo()) : ?>
          <?php the_custom_logo(); ?>
        <?php else : ?>
          <a href="<?php echo esc_url(home_url('/')); ?>" class="font-['Cormorant_Garamond'] text-2xl tracking-[0.08em] text-[#00234B] dark:text-white">VIAR</a>
        <?php endif; ?>
      </div>
      <?php viar_render_messenger_buttons(['context' => 'footer']); ?>
      <p class="viar-logo-subtitle font-sans text-sm text-[#00234B]/60 dark:text-slate-400 mb-8"><?php echo esc_html($logo_subtitle); ?></p>
      <p class="font-sans text-sm text-[#00234B]/60 dark:text-slate-400">
        <?php if ($footer_phone !== '') : ?>
          <?php echo esc_html($footer_phone); ?><br>
        <?php endif; ?>
        <?php if ($footer_email !== '') : ?>
          <a class="hover:text-[#C5A059] transition-colors" href="mailto:<?php echo esc_attr($footer_email); ?>"><?php echo esc_html($footer_email); ?></a>
        <?php endif; ?>
      </p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-24 gap-y-8">
      <div class="flex flex-col gap-4">
        <span class="font-label-caps text-[10px] text-primary uppercase tracking-widest mb-2">Explore</span>
        <?php
        wp_nav_menu([
            'theme_location' => 'footer',
            'container' => false,
            'fallback_cb' => false,
            'menu_class' => 'space-y-4',
            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'link_before' => '<span class="font-sans text-sm tracking-wide text-[#00234B]/60 dark:text-slate-400 hover:text-[#C5A059] underline-offset-4 hover:underline transition-all duration-300">',
            'link_after' => '</span>',
        ]);
        ?>
      </div>
      <div class="flex flex-col gap-4">
        <span class="font-label-caps text-[10px] text-primary uppercase tracking-widest mb-2">Legal</span>
        <?php
        wp_nav_menu([
            'theme_location' => 'legal',
            'container' => false,
            'fallback_cb' => false,
            'menu_class' => 'space-y-4',
            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'link_before' => '<span class="font-sans text-sm tracking-wide text-[#00234B]/60 dark:text-slate-400 hover:text-[#C5A059] underline-offset-4 hover:underline transition-all duration-300">',
            'link_after' => '</span>',
        ]);
        ?>
      </div>
    </div>
  </div>
  <div class="max-w-[1440px] mx-auto px-6 md:px-12 mt-24 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 border-t border-[#00234B]/5 pt-8">
    <span class="font-sans text-[10px] text-[#00234B]/40 uppercase tracking-widest"><?php echo esc_html($footer_copyright); ?></span>
    <span class="font-serif italic text-sm text-primary"><?php echo esc_html($footer_tagline); ?></span>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
