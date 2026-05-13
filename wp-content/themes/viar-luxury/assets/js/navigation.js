document.addEventListener('DOMContentLoaded', () => {
  const btn = document.querySelector('.viar-nav-toggle');
  const menu = document.querySelector('.menu');
  if (!btn || !menu) return;
  btn.addEventListener('click', () => {
    const expanded = btn.getAttribute('aria-expanded') === 'true';
    btn.setAttribute('aria-expanded', String(!expanded));
    menu.classList.toggle('hidden');
  });
});
