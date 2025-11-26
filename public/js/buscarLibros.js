document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('searchInput');
    if (!input) return; // por seguridad
    const cards = document.querySelectorAll('.book-card');

    input.addEventListener('keyup', function() {
        const filter = input.value.toLowerCase();

        cards.forEach(card => {
            const title = card.querySelector('.card-title').textContent.toLowerCase();
            const author = card.querySelector('.card-text').textContent.toLowerCase();
            const category = card.querySelector('.badge.bg-primary').textContent.toLowerCase();

            if(title.includes(filter) || author.includes(filter) || category.includes(filter)) {
                card.style.display = '';
            } else {
                card.style.display = 'none';
            }
        });
    });
});
