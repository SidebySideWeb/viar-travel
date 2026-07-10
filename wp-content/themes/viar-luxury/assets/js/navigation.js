(function () {
  const header = document.querySelector('.viar-header');
  const spacer = document.querySelector('.viar-header-spacer');

  if (!header || !spacer) {
    return;
  }

  const isStaticSpacer = spacer.classList.contains('viar-header-spacer--static');
  const isFixedSpacer = spacer.classList.contains('viar-header-spacer--fixed');
  const needsHeightSync = !isStaticSpacer && !isFixedSpacer;
  const desktopQuery = window.matchMedia('(min-width: 768px)');

  let lastHeight = 0;
  let pendingHeight = 0;
  let heightFrame = 0;
  let resizeObserver = null;

  function canSyncHeight() {
    return needsHeightSync && !desktopQuery.matches;
  }

  function readHeight(entry) {
    if (entry.borderBoxSize && entry.borderBoxSize.length > 0) {
      return Math.round(entry.borderBoxSize[0].blockSize);
    }

    return Math.round(entry.contentRect.height);
  }

  function applyHeaderHeight(heightPx) {
    if (!canSyncHeight()) {
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

  function startHeightObserver() {
    if (!canSyncHeight() || resizeObserver || typeof ResizeObserver === 'undefined') {
      return;
    }

    resizeObserver = new ResizeObserver((entries) => {
      for (const entry of entries) {
        scheduleHeaderHeight(readHeight(entry));
      }
    });

    resizeObserver.observe(header);
  }

  function stopHeightObserver() {
    if (!resizeObserver) {
      return;
    }

    resizeObserver.disconnect();
    resizeObserver = null;
  }

  function syncHeightObserverState() {
    if (canSyncHeight()) {
      startHeightObserver();
      return;
    }

    stopHeightObserver();
  }

  if (needsHeightSync) {
    const bootHeightSync = () => {
      requestAnimationFrame(() => {
        requestAnimationFrame(syncHeightObserverState);
      });
    };

    if (document.readyState === 'complete') {
      if ('requestIdleCallback' in window) {
        requestIdleCallback(bootHeightSync, { timeout: 2000 });
      } else {
        window.setTimeout(bootHeightSync, 0);
      }
    } else {
      window.addEventListener('load', bootHeightSync, { once: true, passive: true });
    }

    if (typeof desktopQuery.addEventListener === 'function') {
      desktopQuery.addEventListener('change', () => {
        requestAnimationFrame(syncHeightObserverState);
      });
    } else if (typeof desktopQuery.addListener === 'function') {
      desktopQuery.addListener(() => {
        requestAnimationFrame(syncHeightObserverState);
      });
    }
  }

  document.addEventListener('DOMContentLoaded', () => {
    const btn = document.querySelector('.viar-nav-toggle');
    const menu = document.getElementById('primary-menu') || document.querySelector('.menu');
    if (!btn || !menu) {
      return;
    }

    let viewportFrame = 0;

    function onViewportChange() {
      if (viewportFrame) {
        return;
      }

      viewportFrame = requestAnimationFrame(() => {
        viewportFrame = 0;

        if (!desktopQuery.matches) {
          menu.classList.add('hidden');
          btn.setAttribute('aria-expanded', 'false');
        }

        syncHeightObserverState();
      });
    }

    window.addEventListener('resize', onViewportChange, { passive: true });

    btn.addEventListener('click', () => {
      if (desktopQuery.matches) {
        return;
      }

      const expanded = btn.getAttribute('aria-expanded') === 'true';
      btn.setAttribute('aria-expanded', String(!expanded));
      menu.classList.toggle('hidden');
    });
  });
})();
