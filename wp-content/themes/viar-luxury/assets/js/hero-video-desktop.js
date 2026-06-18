document.addEventListener('DOMContentLoaded', () => {
  const button = document.querySelector('[data-viar-hero-unmute]');
  if (!button) {
    return;
  }

  const video = document.querySelector('[data-viar-hero-native]');
  const iframe = document.querySelector('[data-viar-hero-vimeo]');
  const icon = button.querySelector('.material-symbols-outlined');
  let vimeoPlayer = null;

  const setSoundState = (isMuted) => {
    button.setAttribute('aria-pressed', isMuted ? 'false' : 'true');
    button.setAttribute(
      'aria-label',
      isMuted ? 'Unmute video' : 'Mute video'
    );

    if (icon) {
      icon.textContent = isMuted ? 'volume_off' : 'volume_up';
    }
  };

  const toggleNative = async () => {
    if (!video) {
      return;
    }

    video.muted = !video.muted;

    if (!video.muted) {
      video.volume = 1;

      try {
        await video.play();
      } catch (error) {
        // Autoplay policies may block resumed playback after unmute.
      }
    }

    setSoundState(video.muted);
  };

  const toggleVimeo = async () => {
    if (!iframe || !window.Vimeo) {
      return;
    }

    if (!vimeoPlayer) {
      vimeoPlayer = new window.Vimeo.Player(iframe);
    }

    const isMuted = await vimeoPlayer.getMuted();
    await vimeoPlayer.setMuted(!isMuted);

    if (isMuted) {
      await vimeoPlayer.setVolume(1);
    }

    setSoundState(!isMuted);
  };

  button.addEventListener('click', () => {
    if (video) {
      toggleNative();
      return;
    }

    if (iframe) {
      toggleVimeo();
    }
  });

  setSoundState(true);
});
