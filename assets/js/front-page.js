const accordionItems = document.querySelectorAll('.accordion-item');

accordionItems.forEach(item => {
  const header = item.querySelector('.accordion-header');

  header.addEventListener('click', () => {
    // Toggle the active class on the clicked item to show/hide the content
    item.classList.toggle('active');
  });
});






const recensioni_container = document.querySelector('.recensioni-cards');
let animationPaused = false;

// Function to pause the animation
function pauseAnimation() {
    recensioni_container.style.animationPlayState = 'paused';
    animationPaused = true;
}

// Function to resume the animation
function resumeAnimation() {
    recensioni_container.style.animationPlayState = 'running';
    animationPaused = false;
}


  
recensioni_container.addEventListener('touchstart', pauseAnimation, { passive: true });

// Detect touchend event and resume the animation with passive listener
recensioni_container.addEventListener('touchend', resumeAnimation, { passive: true });
  
  
  
  
  


