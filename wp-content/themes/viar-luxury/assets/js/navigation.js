(function () {
  const header = document.querySelector('.viar-header');
  const spacer = document.querySelector('.viar-header-spacer');

  if (!header || !spacer) {
    return;
  }

  const isStaticSpacer = spacer.classList.contains('viar-header-spacer--static');
  const isFixedSpacer = spacer.classList.contains('viar-header-spacer--fixed');
  let lastHeight = 0;
  let pendingHeight = 0;
  let heightFrame = 0;

  function readHeight(entry) {
    if (entry.borderBoxSize && entry.borderBoxSize.length > 0) {
      return Math.round(entry.borderBoxSize[0].blockSize);
    }

    return Math.round(entry.contentRect.height);
  }

  function applyHeaderHeight(heightPx) {
    if (isStaticSpacer || isFixedSpacer) {
      return;
    }

    if (!Number.isFinite(heightPx) || heightPx <= 0) {
      return;
    }

    if (Math.abs(heightPx - lastHeight) <= 2) {
      return;
    }

    lastHeight = heightPx;
    document.documentElement.style.setProperty('--viar-header-height', `${heightPx}px`);
  }

  function scheduleHeaderHeight(heightPx) {
    pendingHeight = heightPx;

    if (heightFrame) {
      return;
    }

    heightFrame = requestAnimationFrame(() => {
      heightFrame = 0;
      applyHeaderHeight(pendingHeight);
    });
  }

  if (!isStaticSpacer) {
    if (typeof ResizeObserver !== 'undefined') {
      const observer = new ResizeObserver((entries) => {
        for (const entry of entries) {
          scheduleHeaderHeight(readHeight(entry));
        }
      });

      observer.observe(header);
    } else {
      function measureHeaderHeight() {
        scheduleHeaderHeight(header.offsetHeight);
      }

      if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', measureHeaderHeight, { once: true });
      } else {
        measureHeaderHeight();
      }

      window.addEventListener('resize', measureHeaderHeight);
    }
  }

  document.addEventListener('DOMContentLoaded', () => {
    const btn = document.querySelector('.viar-nav-toggle');
    const menu = document.getElementById('primary-menu') || document.querySelector('.menu');
    if (!btn || !menu) {
      return;
    }

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
    });
  });
})();
