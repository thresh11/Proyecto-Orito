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



//carrito

const verCarrito = (x) => document.getElementById("products-id").style.display = "block";
const cerrarCarrito = () => document.getElementById("products-id").style.display = "none"; 

let allContainerCart = document.querySelector('.products');
let containerBuyCart = document.querySelector('.card-items');
let priceTotal = document.querySelector('.precio-total')
let amountProduct = document.querySelector('.count-product');

let buyThings = [];
let totalCard = 0;
let countProduct = 0;


window.addEventListener('load', () => {
    const savedCart = localStorage.getItem('cart');
    if (savedCart) {
        buyThings = JSON.parse(savedCart);
        updateCart();
    }
});

loadEventListenrs();
function loadEventListenrs() {
    allContainerCart.addEventListener('click', addProduct);
    containerBuyCart.addEventListener('click', deleteProduct);
}



function addProduct(e) {
    // Evita el comportamiento predeterminado solo si el clic proviene de un botón con la clase 'btn-agregar-carito'
    if (e.target.classList.contains('btn-agregar-carito')) {
        e.preventDefault();
        const selectProduct = e.target.parentElement;
        readTheContent(selectProduct);
    }
}

// function addProduct(e) {
//     e.preventDefault();
//     if (e.target.classList.contains('btn-agregar-carito')) {
//         const selectProduct = e.target.parentElement;
//         readTheContent(selectProduct);
//         updateCart();
//     }
// }


function deleteProduct(e) {
    if (e.target.classList.contains('delete-product')) {
        const deleteId = e.target.getAttribute('data-id');

        // buyThings.forEach(value => {
        //     if (value.id == deleteId) {
        //         let priceReduce = parseFloat(value.price) * parseFloat(value.amount);
        //         totalCard = totalCard - priceReduce;
        //         totalCard = totalCard.toFixed(2);  
        //     }
        // });
        // buyThings = buyThings.filter(product => product.id != deleteId);

        // countProduct -- ;

        buyThings = buyThings.filter(product => product.id != deleteId);
        countProduct--;
        updateCart();

    }

    // if (buyThings.length === 0) {
    //     priceTotal.innerHTML = 0;
    //     amountProduct.innerHTML = 0;
    // }
    // loadHtml();
}




function readTheContent(product) {
    const infoProduct = {
        image: product.querySelector('div img').src,
        title: product.querySelector('.titulo').textContent,
        price: product.querySelector('div p span').textContent,
        id: product.querySelector('.btn-agregar-carito').getAttribute('data-id'),
        amount: 1
    }

    totalCard = parseFloat(totalCard) + parseFloat(infoProduct.price);
    totalCard = totalCard.toFixed(3);

    // const exist = buyThings.some(product => product.id === infoProduct.id);
    // if (exist) {
    //     const pro = buyThings.map(product => {
    //         if(product.id === infoProduct.id){
    //             product.amount++;
    //             return product;
    //         }else{
    //             return product;
    //         }
    //     });
    //     buyThings = [...pro];
    // }else{
    //     buyThings = [...buyThings,infoProduct]
    //     countProduct++;
    // }
    // loadHtml();

    const exist = buyThings.some(product => product.id === infoProduct.id);
    if (exist) {
        const pro = buyThings.map(product => {
            if (product.id === infoProduct.id) {
                product.amount++;
                return product;
            } else {
                return product;
            }
        });
        buyThings = [...pro];
    } else {
        buyThings = [...buyThings, infoProduct];
    }
    updateCart();
}

function loadHtml() {
    clearHtml();
    buyThings.forEach(product => {
        const {image,title,price,amount,id} = product;
        const row = document.createElement('div');
        row.classList.add('item');
        row.innerHTML = `
        <img src="${image}" alt="">
        <div class="item-content">
            <h5>${title}</h5>
            <h5 class="cart-price">${price}$</h5>
            <h6>Cantidad: ${amount}</h6>
        </div>
        <span class="delete-product" data-id="${id}">X</span>
        
        `;

        containerBuyCart.appendChild(row);

        priceTotal.innerHTML = totalCard;

        amountProduct.innerHTML = countProduct;
    });
}

function clearHtml() {
    containerBuyCart.innerHTML = '';
}

function updateCart() {
    loadHtml();
    totalCard = buyThings.reduce((total, product) => total + (parseFloat(product.price) * product.amount), 0);
    totalCard = totalCard.toFixed(3);
    // countProduct = buyThings.reduce((total, product) => total + product.amount, 0);
    countProduct = buyThings.length;
    

    priceTotal.innerHTML = totalCard;
    amountProduct.innerHTML = countProduct;
    


    const cartProducts = document.getElementById("products-id");
    if (buyThings.length > 3) {
        cartProducts.classList.add('scrollable');
    } else {
        cartProducts.classList.remove('scrollable');
    }

    localStorage.setItem('cart', JSON.stringify(buyThings));
}



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

const contenedores = document.querySelectorAll(".carta");

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
    contenedores.forEach((carta) => {
        if (categoria === "todos" || carta.classList.contains(categoria)) {
            carta.style.display = "block";
        } else {
            carta.style.display = "none";
        }
    });
}





//boton filtro


function mostrarDiv(numero) {
    var div = document.getElementById("div-" + numero);
        if (div.style.display === "none") {
        div.style.display = "block";
    } else {
    div.style.display = "none";
    }
}




