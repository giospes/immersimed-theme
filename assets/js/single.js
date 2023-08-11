window.addEventListener('scroll', () => {
    const progressBar = document.getElementById('progress-bar');
    const totalHeight = document.body.scrollHeight - window.innerHeight;
    const progress = (window.scrollY / totalHeight) * 100;
    
    progressBar.style.width = `${progress}%`;
  });
  