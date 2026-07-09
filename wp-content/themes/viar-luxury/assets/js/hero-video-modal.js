document.addEventListener('DOMContentLoaded', () => {
  const modal = document.getElementById('viar-hero-video-modal');
  if (!modal) {
    return;
  }

  const iframe = modal.querySelector('[data-viar-vimeo-iframe]');
  const embedSrc = iframe?.dataset.src || '';
  const openButtons = document.querySelectorAll('[data-viar-video-open]');
  const closeTargets = modal.querySelectorAll('[data-viar-video-close]');
  let previousOverflow = '';
  let vimeoHintsAdded = false;

  const addVimeoResourceHints = () => {
    if (vimeoHintsAdded) {
      return;
    }

    vimeoHintsAdded = true;

    ['https://player.vimeo.com', 'https://i.vimeocdn.com'].forEach((href) => {
      const link = document.createElement('link');
      link.rel = 'preconnect';
      link.href = href;
      link.crossOrigin = 'anonymous';
      document.head.appendChild(link);
    });
  };

  const openModal = () => {
    if (!iframe || !embedSrc) {
      return;
    }

    addVimeoResourceHints();
    iframe.src = embedSrc;
    modal.hidden = false;
    modal.setAttribute('aria-hidden', 'false');
    previousOverflow = document.body.style.overflow;
    document.body.style.overflow = 'hidden';
    modal.querySelector('.viar-hero-video-modal__close')?.focus();
  };

  const closeModal = () => {
    modal.hidden = true;
    modal.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = previousOverflow;

    if (iframe) {
      iframe.removeAttribute('src');
    }
  };

  openButtons.forEach((button) => {
    button.addEventListener('pointerenter', addVimeoResourceHints, { once: true });
    button.addEventListener('focus', addVimeoResourceHints, { once: true });
    button.addEventListener('click', openModal);
  });

  closeTargets.forEach((target) => {
    target.addEventListener('click', closeModal);
  });

  document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape' && !modal.hidden) {
      closeModal();
    }
  });
});
