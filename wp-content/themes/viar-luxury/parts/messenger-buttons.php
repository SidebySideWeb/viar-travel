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
        <a class="viar-messenger-btn viar-messenger-btn--whatsapp" href="<?php echo esc_url($whatsapp_url); ?>" target="_blank" rel="noopener noreferrer">
            <span class="viar-messenger-btn__icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" role="img" focusable="false">
                    <path fill="currentColor" d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.435 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.89-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                </svg>
            </span>
            <span class="viar-messenger-btn__label"><?php esc_html_e('Find us in WhatsApp', 'viar-luxury'); ?></span>
        </a>
    <?php endif; ?>

    <?php if ($viber_url !== '') : ?>
        <a class="viar-messenger-btn viar-messenger-btn--viber" href="<?php echo esc_url($viber_url); ?>" target="_blank" rel="noopener noreferrer">
            <span class="viar-messenger-btn__icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" role="img" focusable="false">
                    <path fill="currentColor" d="M11.4 0C9.473.028 5.77.344 3.34 2.626 1.504 4.342.635 6.881.5 10.38c-.047 1.2-.1 3.433.7 4.988l-.4 2.38 2.45-1.2c.95.5 2.01.9 3.15 1.1 1.14.2 2.35.3 3.55.3h.05c3.5 0 6.04-1.1 7.65-3.2 1.45-1.9 2.15-4.6 2.15-8.1C19.8 3.5 16.5.1 11.4 0zm.1 1.9c4.3 0 7.1 2.8 7.1 7.2 0 3.2-.6 5.5-1.8 7.1-1.3 1.7-3.4 2.6-6.3 2.6h-.05c-1.05 0-2.05-.1-3-.3-.85-.15-1.65-.4-2.4-.75l-.35-.15-1.45.7.25-1.45-.2-.35c-.35-.65-.6-1.4-.75-2.2-.15-.8-.2-1.65-.2-2.5 0-2.9.65-5.05 1.95-6.55C6.55 2.5 8.75 1.9 11.5 1.9zM8.2 6.5c-.15 0-.35.05-.5.25-.15.2-.6.6-.6 1.45 0 .85.6 1.65.65 1.75.05.1 1.15 1.85 2.85 2.55 1.4.55 1.7.45 2 .45.3 0 .95-.4 1.1-.75.15-.35.15-.65.1-.75-.05-.1-.15-.15-.35-.25-.2-.1-1.15-.55-1.3-.6-.15-.05-.25-.1-.35.1-.1.2-.4.6-.5.75-.1.15-.2.15-.35.1-.15-.05-.65-.25-1.25-.8-.45-.4-.75-.9-.85-1.05-.1-.15 0-.25.05-.35.05-.1.15-.25.2-.35.05-.1 0-.2-.05-.3-.05-.1-.45-1.1-.65-1.5-.15-.35-.3-.3-.5-.3z"/>
                </svg>
            </span>
            <span class="viar-messenger-btn__label"><?php esc_html_e('Find us in Viber', 'viar-luxury'); ?></span>
        </a>
    <?php endif; ?>
</div>
