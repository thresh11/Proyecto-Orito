let contenedorCarroDeCompra = document.querySelector('.card-items');
let contenedorResumenDeCompra = document.querySelector('.tabla_resumen_compra')
// let precioTotal = document.querySelector('.precio-total')
// let cantidadDeProductos = document.querySelector('.count-product');

let comprarCosas = [];
let totalCard = 0;
let countProduct = 0;
let costoEnvio = 10;
let total;

window.addEventListener('load', () => {
    const guardarCarrito = localStorage.getItem('cart');
    if (guardarCarrito) {
        comprarCosas = JSON.parse(guardarCarrito);
        updateCart();
    }
});

loadEventListenrs();
function loadEventListenrs() {
    contenedorCarroDeCompra.addEventListener('click', deleteProduct);
}

function deleteProduct(e) {
    if (e.target.classList.contains('eliminar-producto')) {
        const deleteId = e.target.getAttribute('data-id');

        comprarCosas = comprarCosas.filter(product => product.id != deleteId);
        countProduct--;
        updateCart();
    }
}

function loadHtml() {
    clearHtml();
    comprarCosas.forEach(product => {
        const { image, title, price, amount, id } = product;
        const row = document.createElement('div');
        row.innerHTML = `
        <div class="todoContenido">
                <div class="item-content">
                <img src="${image}" alt="">
                    <div>
                        <h5>${title}</h5>
                        <h5 class="cart-price">${price}$</h5>
                    </div> 
                </div>
                    <div class="aumentador">
                        <div class="minus" data-id="${id}">-</div>
                        <div class="text">${amount}</div>
                        <div class="btn-agregar-carito" data-id="${id}">+</div>
                    </div>
                <span class="eliminar-producto" data-id="${id}">X</span>         
        `;
        clearHtml_2();
        const fila = document.createElement('div');
                fila.innerHTML = `
                <div class="f">
                <p>productos(${countProduct})</p>
                <p>$ ${totalCard}</p>
                </div>
                <div class="f">
                <p>Envio</p>
                <p>$ ${costoEnvio.toFixed(3)}</p>
                </div>
                <div class="f">
                <p>Total</p>
                <p>$ ${total}</p>
                </div>
                
     
                `;

        contenedorResumenDeCompra.appendChild(fila);
        contenedorCarroDeCompra.appendChild(row);
        // precioTotal.innerHTML = totalCard;
        // cantidadDeProductos.innerHTML = countProduct;
    });

    // Agregar event listeners para los botones de aumento y disminución
    const plusButtons = document.querySelectorAll('.btn-agregar-carito');
    const minusButtons = document.querySelectorAll('.minus');

    plusButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            const id = e.target.getAttribute('data-id');
            incrementAmount(id);
        });
    });

    minusButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            const id = e.target.getAttribute('data-id');
            decrementAmount(id);
        });
    });
}


function incrementAmount(id) {
    const product = comprarCosas.find(product => product.id === id);
    if (product) {
        product.amount++;
        updateCart();
    }
}

function decrementAmount(id) {
    const product = comprarCosas.find(product => product.id === id);
    if (product && product.amount > 1) {
        product.amount--;
        updateCart();
    }
}

const clearHtml = () => contenedorCarroDeCompra.innerHTML = '';
const clearHtml_2 = () => contenedorResumenDeCompra.innerHTML = '';


function updateCart() {
    loadHtml();
    totalCard = comprarCosas.reduce((total, product) => total + (parseFloat(product.price) * product.amount), 0);
    total = totalCard + costoEnvio;
    totalCard = totalCard.toFixed(3);
    total = total.toFixed(3);
    countProduct = comprarCosas.length;
    // costoEnvio = costoEnvio.toFixed(3);

    loadHtml();
    // precioTotal.innerHTML = totalCard;
    // cantidadDeProductos.innerHTML = countProduct;
    localStorage.setItem('cart', JSON.stringify(comprarCosas));
}






// let coste_envio = 400000
// coste_envio = coste_envio.toFixed(3);
// console.log(coste_envio);

const formatearConSeparadores = (num) => num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        // let coste_envio = 5000;
        // coste_envio = formatearConSeparadores(coste_envio);