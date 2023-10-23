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




//filtro


const todosRadio = document.getElementById("todosRadio");
const BrownieRadio = document.getElementById("BrownieRadio");
const Brownie_almendras_radio = document.getElementById("Brownie_almendras_radio");
const Brownie_arroz_radio = document.getElementById("Brownie_arroz_radio");


const cajas__Radio = document.getElementById("cajas__Radio");
const cajas_almendras_radio = document.getElementById("cajas_almendras_radio");
const cajas_avena_radio = document.getElementById("cajas_avena_radio");
const cajas_arroz_radio = document.getElementById("cajas_arroz_radio");




const oferta__Radio = document.getElementById("oferta__Radio");
const P__vendi__Radio = document.getElementById("P__vendi__Radio");
const combo__Radio = document.getElementById("combo__Radio");


const libras__Radio = document.getElementById("libras__Radio");
const kilo__Radio = document.getElementById("kilo__Radio");
const unidad__Radio = document.getElementById("unidad__Radio");
const litro__Radio = document.getElementById("litro__Radio");
const gramos__Radio = document.getElementById("gramos__Radio");
const otros__Radio = document.getElementById("otros__Radio");



const cinco__Radio = document.getElementById("5.000__Radio");
const diez__Radio = document.getElementById("10.000__Radio");
const veinte__Radio = document.getElementById("20.000__Radio");
const treinta__Radio = document.getElementById("30.000__Radio");


const BrownieRadio2 = document.getElementById("BrownieRadio2");
const cajas__Radio2 = document.getElementById("cajas__Radio2");
const cafe__Radio = document.getElementById("cafe__Radio");
const Browniemiel__Radioadio2 = document.getElementById("miel__Radio");
const aromatica__Radio = document.getElementById("aromatica__Radio");
const aguacate__Radio = document.getElementById("aguacate__Radio");
const kumis__Radio = document.getElementById("kumis__Radio");
const panela__Radio = document.getElementById("panela__Radio");
const mantequilla__Radio = document.getElementById("mantequilla__Radio");

const contenedores = document.querySelectorAll(".pro__contedor__caja");

todosRadio.addEventListener("change", () => {
    if (todosRadio.checked) {
        filterBoxes("todos");
    }
});

BrownieRadio.addEventListener("change", () => {
    if (BrownieRadio.checked) {
        filterBoxes("Brownie");
    }
});

Brownie_almendras_radio.addEventListener("change", () => {
    if (Brownie_almendras_radio.checked) {
        filterBoxes("Brownie_almendras");
    }
});

Brownie_arroz_radio.addEventListener("change", () => {
    if (Brownie_arroz_radio.checked) {
        filterBoxes("Brownie_arroz");
    }
});

Brownie_avena_radio.addEventListener("change", () => {
    if (Brownie_avena_radio.checked) {
        filterBoxes("Brownie_avena");
    }
});











cajas__Radio.addEventListener("change", () => {
    if (cajas__Radio.checked) {
        filterBoxes("cajas");
    }
});


cajas_almendras_radio.addEventListener("change", () => {
    if (cajas_almendras_radio.checked) {
        filterBoxes("cajas_almendras");
    }
});


cajas_avena_radio.addEventListener("change", () => {
    if (cajas_avena_radio.checked) {
        filterBoxes("cajas_avena");
    }
});

cajas_arroz_radio.addEventListener("change", () => {
    if (cajas_arroz_radio.checked) {
        filterBoxes("cajas_arroz");
    }
});







oferta__Radio.addEventListener("change", () => {
    if (oferta__Radio.checked) {
        filterBoxes("oferta");
    }
});

P__vendi__Radio.addEventListener("change", () => {
    if (P__vendi__Radio.checked) {
        filterBoxes("P__vendi");
    }
});

combo__Radio.addEventListener("change", () => {
    if (combo__Radio.checked) {
        filterBoxes("combo");
    }
});





libras__Radio.addEventListener("change", () => {
    if (libras__Radio.checked) {
        filterBoxes("libras");
    }
});


kilo__Radio.addEventListener("change", () => {
    if (kilo__Radio.checked) {
        filterBoxes("kilo");
    }
});


unidad__Radio.addEventListener("change", () => {
    if (unidad__Radio.checked) {
        filterBoxes("unidad");
    }
});


litro__Radio.addEventListener("change", () => {
    if (litro__Radio.checked) {
        filterBoxes("litro");
    }
});


gramos__Radio.addEventListener("change", () => {
    if (gramos__Radio.checked) {
        filterBoxes("gramos");
    }
});

otros__Radio.addEventListener("change", () => {
    if (otros__Radio.checked) {
        filterBoxes("otros");
    }
});






cinco__Radio.addEventListener("change", () => {
    if (cinco__Radio.checked) {
        filterBoxes("5.000");
    }
});


diez__Radio.addEventListener("change", () => {
    if (diez__Radio.checked) {
        filterBoxes("10.000");
    }
});



veinte__Radio.addEventListener("change", () => {
    if (veinte__Radio.checked) {
        filterBoxes("20.000");
    }
});



treinta__Radio.addEventListener("change", () => {
    if (treinta__Radio.checked) {
        filterBoxes("30.000");
    }
});









BrownieRadio2.addEventListener("change", () => {
    if (BrownieRadio2.checked) {
        filterBoxes("Brownie2");
    }
});


cajas__Radio2.addEventListener("change", () => {
    if (cajas__Radio2.checked) {
        filterBoxes("cajas2");
    }
});

cafe__Radio.addEventListener("change", () => {
    if (cafe__Radio.checked) {
        filterBoxes("cafe");
    }
});

miel__Radio.addEventListener("change", () => {
    if (miel__Radio.checked) {
        filterBoxes("miel");
    }
});

aromatica__Radio.addEventListener("change", () => {
    if (aromatica__Radio.checked) {
        filterBoxes("aromatica");
    }
});

aguacate__Radio.addEventListener("change", () => {
    if (aguacate__Radio.checked) {
        filterBoxes("aguacate");
    }
});

kumis__Radio.addEventListener("change", () => {
    if (kumis__Radio.checked) {
        filterBoxes("kumis");
    }
});

panela__Radio.addEventListener("change", () => {
    if (panela__Radio.checked) {
        filterBoxes("panela");
    }
});


mantequilla__Radio.addEventListener("change", () => {
    if (mantequilla__Radio.checked) {
        filterBoxes("mantequilla");
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



//cambio imagen

  function cambiarImagen(imagen) {
            imagen.src = "../img/almendras.jpg";
        }

        function restaurarImagen(imagen) {
            imagen.src = "../img/brawni_almendras2-removebg-preview1.png";
        }





        // boton filtro 



        function mostrarDiv(numero) {
            var div = document.getElementById("div-" + numero);
                if (div.style.display === "none") {
                div.style.display = "block";
            } else {
            div.style.display = "none";
            }
        }
