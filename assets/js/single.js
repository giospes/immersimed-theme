window.addEventListener('scroll', () => {
    const progressBar = document.getElementById('progress-bar');
    const totalHeight = document.querySelector('main').clientHeight + 64;
    const progress = (window.scrollY / totalHeight) * 100;
    
    progressBar.style.width = `${progress}%`;
  }, { passive: true });
  