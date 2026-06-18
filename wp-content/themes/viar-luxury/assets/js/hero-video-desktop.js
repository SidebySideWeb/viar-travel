document.addEventListener('DOMContentLoaded', () => {
  const hero = document.querySelector('.viar-home-hero');
  const video = document.querySelector('[data-viar-hero-native]');
  const iframe = document.querySelector('[data-viar-hero-vimeo]');

  if (!hero || (!video && !iframe)) {
    return;
  }

  let soundEnabled = false;
  let vimeoPlayer = null;
  let heroVisible = true;

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

  const getVimeoPlayer = async () => {
    if (!iframe || !window.Vimeo) {
      await waitForVimeo();
    }

    if (!iframe || !window.Vimeo) {
      return null;
    }

    if (!vimeoPlayer) {
      vimeoPlayer = new window.Vimeo.Player(iframe);
    }

    return vimeoPlayer;
  };

  const pausePlayback = async () => {
    if (video) {
      video.pause();
      return;
    }

    const player = await getVimeoPlayer();
    if (player) {
      await player.pause();
    }
  };

  const resumePlayback = async () => {
    if (!heroVisible) {
      return;
    }

    if (video) {
      try {
        await video.play();
      } catch (error) {
        // Autoplay policies may block resumed playback.
      }
      return;
    }

    const player = await getVimeoPlayer();
    if (player) {
      await player.play();
    }
  };

  const setHeroVisibility = (isVisible) => {
    heroVisible = isVisible;

    if (isVisible) {
      resumePlayback();
      return;
    }

    pausePlayback();
  };

  const enableSound = async () => {
    if (soundEnabled) {
      return;
    }

    soundEnabled = true;
    removeInteractionListeners();

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

    const player = await getVimeoPlayer();
    if (!player) {
      return;
    }

    await player.setMuted(false);
    await player.setVolume(1);
  };

  const onInteraction = () => {
    enableSound();
  };

  const interactionEvents = ['pointerdown', 'keydown', 'touchstart', 'wheel'];

  const removeInteractionListeners = () => {
    interactionEvents.forEach((eventName) => {
      document.removeEventListener(eventName, onInteraction);
    });
    window.removeEventListener('scroll', onInteraction);
  };

  interactionEvents.forEach((eventName) => {
    document.addEventListener(eventName, onInteraction, { passive: true });
  });

  window.addEventListener('scroll', onInteraction, { passive: true });

  if (typeof IntersectionObserver !== 'undefined') {
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          setHeroVisibility(entry.isIntersecting);
        });
      },
      { threshold: 0 }
    );

    observer.observe(hero);
  }
});
