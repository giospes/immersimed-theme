const accordionItems = document.querySelectorAll('.accordion-item');

accordionItems.forEach(item => {
  const header = item.querySelector('.accordion-header');

  header.addEventListener('click', () => {
    // Toggle the active class on the clicked item to show/hide the content
    item.classList.toggle('active');
  });
});

window.addEventListener('load', function() {
  const imageContainer = document.querySelector('.right-side');
  
  function loadLargeImage() {
    const windowWidth = window.innerWidth;
    
    if (windowWidth > 992) {
      const largeImage = new Image();
      largeImage.src = '<?php echo esc_url($desktop_hero_img_url); ?>'; // Replace with the actual image path
      largeImage.alt = 'Large Image';
      
      imageContainer.appendChild(largeImage);
    }
  }
  
  loadLargeImage(); // Load image when the page loads
  window.addEventListener('resize', loadLargeImage); // Load image when the window is resized
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

// // Detect touchstart event and pause the animation
// recensioni_container.addEventListener('touchstart', () => {
//     pauseAnimation();
// });

// // Detect touchend event and resume the animation
// recensioni_container.addEventListener('touchend', () => {
//     resumeAnimation();
// });
  
recensioni_container.addEventListener('touchstart', pauseAnimation, { passive: true });

// Detect touchend event and resume the animation with passive listener
recensioni_container.addEventListener('touchend', resumeAnimation, { passive: true });
  
  
  
  
  

