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
    // allContainerCart.addEventListener('click', addProduct);
    containerBuyCart.addEventListener('click', deleteProduct);
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

        buyThings = buyThings.filter(product => product.id != deleteId);
        countProduct--;
        updateCart();
    }
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
        <div class="todoContenido">
        <img src="${image}" alt="">
        <div class="item-content">
            <div>
                <h5>${title}</h5>
                <h5 class="cart-price">${price}$</h5>
            </div> 
            <div class="aumentador">
                <div class="minus">-</div>
                <div class="text">${amount}</div>
                <div class="btn-agregar-carito">+</div>
            </div>
        </div>
        <span class="delete-product" data-id="${id}">X</span> 
        </div>
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
    countProduct = buyThings.length;
    
    priceTotal.innerHTML = totalCard;
    amountProduct.innerHTML = countProduct;
    localStorage.setItem('cart', JSON.stringify(buyThings));
}


    let mimus = document.querySelector(".minus"),
    text = document.querySelector(".text"),
    plus = document.querySelector(".btn-agregar-carito"),
    num = 1;

    const elemento = document.querySelector(".text");
    const obtenerValorNumero = () =>{
        if (elemento) {
            const valor = elemento.innerHTML;
            return valor;
        }
    }


    plus.addEventListener("click",()=>{
        num++;
        num = (num < 10) ? "0" + num : num;
        text.innerHTML = num;
       console.log(obtenerValorNumero());
    })

    mimus.addEventListener("click",()=>{
        if (num > 0) {
            num --;
            num = (num < 10) ? "0" + num : num;
            text.innerHTML = num;
            console.log();
            console.log(obtenerValorNumero());
    }});