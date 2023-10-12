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



const todosRadio = document.getElementById("todosRadio");
const brauniRadio = document.getElementById("brauniRadio");
const comboRadio = document.getElementById("comboRadio");
const ofertaRadio = document.getElementById("ofertaRadio");

const contenedores = document.querySelectorAll(".pro__contedor__caja");

todosRadio.addEventListener("change", () => {
    if (todosRadio.checked) {
        filterBoxes("todos");
    }
});

brauniRadio.addEventListener("change", () => {
    if (brauniRadio.checked) {
        filterBoxes("brauni");
    }
});

comboRadio.addEventListener("change", () => {
    if (comboRadio.checked) {
        filterBoxes("combo");
    }
});

ofertaRadio.addEventListener("change", () => {
    if (ofertaRadio.checked) {
        filterBoxes("oferta");
    }
});

function filterBoxes(categoria) {
    contenedores.forEach((pro__contedor__caja) => {
        if (categoria === "todos" || pro__contedor__caja.classList.contains(categoria)) {
            pro__contedor__caja.style.display = "block";
        } else {
            pro__contedor__caja.style.display = "none";
        }
    });
}