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

  const openModal = () => {
    if (!iframe || !embedSrc) {
      return;
    }

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
