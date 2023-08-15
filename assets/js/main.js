// Get all post card elements
const postCards = document.querySelectorAll('.post-card');

// Attach click event listener to each post card
postCards.forEach((postCard) => {
    postCard.addEventListener('click', () => {
        // Get the post permalink from data attribute
        const permalink = postCard.getAttribute('data-permalink');
        if (permalink) {
            // Navigate to the post permalink
            window.location.href = permalink;
        }
    });
});
