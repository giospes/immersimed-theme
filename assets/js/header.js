document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.getElementById('menuToggle');
    const navbarMenu = document.getElementById('navbarNav1');

    menuToggle.addEventListener('click', function() {
        navbarMenu.classList.toggle('show');
    });
});

document.getElementById('menuToggle').addEventListener('click', function() {
    this.classList.toggle('open');
  });
  

const fixedHeader = document.getElementById('fixed-header');

// Add a scroll event listener
window.addEventListener('scroll', () => {
// Check the scroll position
if (window.scrollY > 0) {
    // Add a shadow when scrolling starts
    fixedHeader.style.boxShadow = '0 5px 5px rgba(0, 0, 0, 0.2)';
} else {
    // Remove the shadow when scrolling is at the top
    fixedHeader.style.boxShadow = 'none';
}
});






