document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.querySelector('.carousel');
    let scrollValue = 0;

    function scrollCarousel() {
        scrollValue += 300; // Ajusta este valor según el ancho de tu carrusel
        if (scrollValue > (carousel.scrollWidth - carousel.clientWidth)) {
            scrollValue = 0;
        }
        carousel.style.transform = `translateX(-${scrollValue}px)`;
    }

    setInterval(scrollCarousel, 3000); // Cambia las imágenes cada 3 segundos (ajusta este valor según tus necesidades)
});

