function viarSyncHeaderHeight() {
  const header = document.querySelector('.viar-header');
  if (!header) {
    return;
  }

  const height = `${header.offsetHeight}px`;
  document.documentElement.style.setProperty('--viar-header-height', height);

  const spacer = document.querySelector('.viar-header-spacer');
  if (spacer) {
    spacer.style.height = height;
  }
}

function viarObserveHeaderHeight() {
  const header = document.querySelector('.viar-header');
  if (!header || typeof ResizeObserver === 'undefined') {
    return;
  }

  new ResizeObserver(viarSyncHeaderHeight).observe(header);
}

viarSyncHeaderHeight();

document.addEventListener('DOMContentLoaded', () => {
  viarSyncHeaderHeight();
  viarObserveHeaderHeight();
  window.addEventListener('resize', viarSyncHeaderHeight);

  if (document.fonts && document.fonts.ready) {
    document.fonts.ready.then(viarSyncHeaderHeight);
  }

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
