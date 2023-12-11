window.addEventListener('scroll', function(){
    var contenedor_barra_navegadora = document.querySelector(".navegador");
    contenedor_barra_navegadora.classList.toggle("navegadorAbajo", window.scrollY>0)
  })


window.addEventListener('scroll', function () {
    var cambiarColorLetra = document.querySelectorAll("header nav ul li a");
    cambiarColorLetra.forEach(function (elemento) {
        elemento.classList.toggle("aabajo", window.scrollY > 0);    
    });   
});



// cambio de imagen


function cambiarImagen(imagen) {
    imagen.src = "img/Del tolima.png";
}

function restaurarImagen(imagen) {
    imagen.src = "img/nosotros1.jpeg";
}

function cambiar_Imagen(imagen) {
    imagen.src = "img/nosotros4.jpeg";
    
}

function restaurar_Imagen(imagen) {
    imagen.src = "./img/nosotros2.jpeg";

}



const swiper = new Swiper('.swiper', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    autoplay: {
        delay: 6000,
        pauseOnMouseEnter: true,
        disableOnInteraction: false,
    },
  
    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
  
        // dynamicBullets: true
    },
  
    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  
    // And if we need scrollbar
    // scrollbar: {
    //   el: '.swiper-scrollbar',
    // },
  });



  // footer

document.addEventListener('DOMContentLoaded', function () {
    const accordionItems = document.querySelectorAll('.accordion_item');

    accordionItems.forEach(item => {
        const title = item.querySelector('h2');
        title.addEventListener('click', () => {
            accordionItems.forEach(innerItem => {
                if (innerItem !== item) {
                    innerItem.classList.remove('active');
                }
            });
            item.classList.toggle('active');
        });
    });
});

//end footer

