document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.getElementById('menuToggle');
    const navbarMenu = document.getElementById('navbarNav1');

    menuToggle.addEventListener('click', function() {
        navbarMenu.classList.toggle('show');
    });
});
