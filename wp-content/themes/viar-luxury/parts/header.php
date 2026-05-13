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
  <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
    <div class="viar-logo text-[#00234B]">
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
      'menu_class' => 'hidden md:flex items-center gap-7 font-[Manrope] text-sm uppercase tracking-[0.08em] text-[#2D3F4A]',
      'fallback_cb' => false,
    ]);
    ?>
  </div>
</header>
<div class="pt-[76px]">
