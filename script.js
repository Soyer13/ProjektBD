
// Znajdź wszystkie kontenery i przypisz do zmiennych
const scrollContainers = document.querySelectorAll('.scroll-container');

scrollContainers.forEach(container => {
    const productContainer = container.querySelector('.product-container');
    const prevButton = container.querySelector('.prev-button');
    const nextButton = container.querySelector('.next-button');

    let scrollPosition = 0;

    prevButton.addEventListener('click', () => {
        if (scrollPosition > 0) {
            scrollPosition -= 200; // Przesuwanie o 200 pikseli w lewo (możesz dostosować tę wartość)
            productContainer.style.transform = `translateX(-${scrollPosition}px)`;
        }
    });

    nextButton.addEventListener('click', () => {
        if (scrollPosition < productContainer.scrollWidth - productContainer.clientWidth) {
            scrollPosition += 200; // Przesuwanie o 200 pikseli w prawo (możesz dostosować tę wartość)
            productContainer.style.transform = `translateX(-${scrollPosition}px)`;
        }
    });
});
