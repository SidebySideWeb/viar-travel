document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('[data-fade]').forEach((el) => {
    el.animate([{ opacity: 0, transform: 'translateY(12px)' }, { opacity: 1, transform: 'translateY(0)' }], {
      duration: 700,
      fill: 'forwards',
      easing: 'ease-out',
    });
  });
});
