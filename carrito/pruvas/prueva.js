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
        const { image, title, price, amount, id } = product;
        const row = document.createElement('div');
        row.classList.add('item');
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
                    <span class="delete-product" data-id="${id}">X</span> 
        `;

        containerBuyCart.appendChild(row);

        priceTotal.innerHTML = totalCard;

        amountProduct.innerHTML = countProduct;
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
    const product = buyThings.find(product => product.id === id);
    if (product) {
        product.amount++;
        updateCart();
    }
}

function decrementAmount(id) {
    const product = buyThings.find(product => product.id === id);
    if (product && product.amount > 1) {
        product.amount--;
        updateCart();
    }
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

