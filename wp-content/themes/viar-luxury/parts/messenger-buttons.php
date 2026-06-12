<?php
/**
 * WhatsApp and Viber button markup.
 *
 * @package ViaR_Luxury
 *
 * @var array<string, mixed> $args
 */

$context = isset($args['context']) ? (string) $args['context'] : 'form';
$whatsapp_url = isset($args['whatsapp_url']) ? (string) $args['whatsapp_url'] : '';
$viber_url = isset($args['viber_url']) ? (string) $args['viber_url'] : '';

if ($whatsapp_url === '' && $viber_url === '') {
    return;
}

$wrapper_class = 'viar-messenger-buttons';
if ($context !== '') {
    $wrapper_class .= ' viar-messenger-buttons--' . sanitize_html_class($context);
}

?>
<div class="<?php echo esc_attr($wrapper_class); ?>">
    <?php if ($whatsapp_url !== '') : ?>
        <a class="viar-messenger-btn viar-messenger-btn--whatsapp" href="<?php echo viar_esc_messenger_href($whatsapp_url); ?>" target="_blank" rel="noopener noreferrer">
            <span class="viar-messenger-btn__icon">
                <?php viar_render_icon('whatsapp', ['size' => 'md', 'color' => 'gold']); ?>
            </span>
            <span class="viar-messenger-btn__label"><?php esc_html_e('Find us in WhatsApp', 'viar-luxury'); ?></span>
        </a>
    <?php endif; ?>

    <?php if ($viber_url !== '') : ?>
        <a class="viar-messenger-btn viar-messenger-btn--viber" href="<?php echo viar_esc_messenger_href($viber_url); ?>" target="_blank" rel="noopener noreferrer">
            <span class="viar-messenger-btn__icon">
                <?php viar_render_icon('viber', ['size' => 'md', 'color' => 'gold']); ?>
            </span>
            <span class="viar-messenger-btn__label"><?php esc_html_e('Find us in Viber', 'viar-luxury'); ?></span>
        </a>
    <?php endif; ?>
</div>
