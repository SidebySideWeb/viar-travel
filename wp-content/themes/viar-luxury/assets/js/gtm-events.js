/**
 * Custom Google Tag Manager dataLayer events.
 */
(function () {
  window.dataLayer = window.dataLayer || [];

  function pushEvent(payload) {
    window.dataLayer = window.dataLayer || [];
    window.dataLayer.push(payload);
  }

  document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('form').forEach(function (form) {
      form.addEventListener('submit', function () {
        pushEvent({
          event: 'form_submission',
          form_id: form.id || 'unknown',
          form_class: form.className || 'unknown',
          page_url: window.location.href,
        });
      });
    });

    document.querySelectorAll('a[href*="wa.me"], a[href*="whatsapp"]').forEach(function (el) {
      el.addEventListener('click', function () {
        pushEvent({
          event: 'whatsapp_click',
          click_url: el.href,
          page_url: window.location.href,
        });
      });
    });

    document.querySelectorAll('a[href*="viber"]').forEach(function (el) {
      el.addEventListener('click', function () {
        pushEvent({
          event: 'viber_click',
          click_url: el.href,
          page_url: window.location.href,
        });
      });
    });
  });
})();
