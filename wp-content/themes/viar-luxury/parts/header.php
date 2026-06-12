<?php
/**
 * Site Header
 *
 * @package ViaR_Luxury
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class('bg-[#FDFCF8] text-[#2D3F4A]'); ?>>
<?php wp_body_open(); ?>
<header class="viar-header fixed top-0 left-0 right-0 z-50 bg-[#FDFCF8]/90 backdrop-blur border-b border-[#C5A059]/20">
  <div class="relative max-w-7xl mx-auto px-6 py-4 flex flex-wrap items-center justify-between gap-y-2">
    <div class="viar-logo viar-logo--header text-[#00234B] shrink-0">
      <?php if (function_exists('the_custom_logo') && has_custom_logo()) : ?>
        <?php the_custom_logo(); ?>
      <?php else : ?>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="font-['Cormorant_Garamond'] text-2xl tracking-[0.08em] text-[#00234B]">VIAR</a>
      <?php endif; ?>
    </div>
    <button class="viar-nav-toggle md:hidden text-[#00234B]" aria-expanded="false" aria-controls="primary-menu">Menu</button>
    <?php
    wp_nav_menu([
      'theme_location' => 'primary',
      'container' => false,
      'menu_id' => 'primary-menu',
      'menu_class' => 'menu viar-primary-menu order-3 flex w-full basis-full flex-col gap-6 border-t border-[#C5A059]/20 py-4 font-[Manrope] text-sm uppercase tracking-[0.08em] text-[#2D3F4A] hidden md:flex md:w-auto md:basis-auto md:flex-row md:items-center md:gap-7 md:border-0 md:py-0 md:order-none',
      'fallback_cb' => false,
    ]);
    ?>
  </div>
</header>
<div id="viar-site-content" class="viar-site-content min-w-0 max-w-full overflow-x-hidden">
