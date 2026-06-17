function viarSyncHeaderHeight() {
  const header = document.querySelector('.viar-header');
  if (!header) {
    return;
  }

  document.documentElement.style.setProperty('--viar-header-height', `${header.offsetHeight}px`);
}

viarSyncHeaderHeight();

document.addEventListener('DOMContentLoaded', () => {
  viarSyncHeaderHeight();
  window.addEventListener('resize', viarSyncHeaderHeight);

  const btn = document.querySelector('.viar-nav-toggle');
  const menu = document.getElementById('primary-menu') || document.querySelector('.menu');
  if (!btn || !menu) return;

  window.addEventListener('resize', () => {
    if (!window.matchMedia('(min-width: 768px)').matches) {
      menu.classList.add('hidden');
      btn.setAttribute('aria-expanded', 'false');
    }
  });

  btn.addEventListener('click', () => {
    if (window.matchMedia('(min-width: 768px)').matches) {
      return;
    }
    const expanded = btn.getAttribute('aria-expanded') === 'true';
    btn.setAttribute('aria-expanded', String(!expanded));
    menu.classList.toggle('hidden');
    requestAnimationFrame(viarSyncHeaderHeight);
  });
});
