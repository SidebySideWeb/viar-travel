document.addEventListener('DOMContentLoaded', () => {
  const video = document.querySelector('[data-viar-hero-native]');
  const iframe = document.querySelector('[data-viar-hero-vimeo]');

  if (!video && !iframe) {
    return;
  }

  let soundEnabled = false;
  let vimeoPlayer = null;

  const waitForVimeo = () =>
    new Promise((resolve) => {
      if (window.Vimeo) {
        resolve();
        return;
      }

      const started = Date.now();
      const timer = window.setInterval(() => {
        if (window.Vimeo || Date.now() - started > 5000) {
          window.clearInterval(timer);
          resolve();
        }
      }, 50);
    });

  const enableSound = async () => {
    if (soundEnabled) {
      return;
    }

    soundEnabled = true;
    removeListeners();

    if (video) {
      video.muted = false;
      video.volume = 1;

      try {
        await video.play();
      } catch (error) {
        // Browser may still block playback until a direct gesture.
      }

      return;
    }

    if (!iframe) {
      return;
    }

    await waitForVimeo();

    if (!window.Vimeo) {
      return;
    }

    if (!vimeoPlayer) {
      vimeoPlayer = new window.Vimeo.Player(iframe);
    }

    await vimeoPlayer.setMuted(false);
    await vimeoPlayer.setVolume(1);
  };

  const onInteraction = () => {
    enableSound();
  };

  const interactionEvents = ['pointerdown', 'keydown', 'touchstart', 'wheel'];

  const removeListeners = () => {
    interactionEvents.forEach((eventName) => {
      document.removeEventListener(eventName, onInteraction);
    });
    window.removeEventListener('scroll', onInteraction);
  };

  interactionEvents.forEach((eventName) => {
    document.addEventListener(eventName, onInteraction, { passive: true });
  });

  window.addEventListener('scroll', onInteraction, { passive: true });
});
