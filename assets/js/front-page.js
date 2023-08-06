const accordionItems = document.querySelectorAll('.accordion-item');

accordionItems.forEach(item => {
  const header = item.querySelector('.accordion-header');

  header.addEventListener('click', () => {
    // Toggle the active class on the clicked item to show/hide the content
    item.classList.toggle('active');
  });
});


  
  
  
  
  
  
  

