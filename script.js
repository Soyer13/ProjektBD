// script.js
const productContainer = document.querySelector('.product-container');
const prevButton = document.querySelector('.prev-button');
const nextButton = document.querySelector('.next-button');

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
