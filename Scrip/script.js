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

