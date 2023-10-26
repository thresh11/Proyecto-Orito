const verCarrito = (x) => document.getElementById("products-id").style.display = "block";
const cerrarCarrito = () => document.getElementById("products-id").style.display = "none"; 

let allContainerCart = document.querySelector('.products');
let containerBuyCart = document.querySelector('.card-items');
let priceTotal = document.querySelector('.precio-total')
let amountProduct = document.querySelector('.count-product');

let buyThings = [];
let totalCard = 0;
let countProduct = 0;


loadEventListenrs();
function loadEventListenrs() {
    allContainerCart.addEventListener('click', addProduct);
    containerBuyCart.addEventListener('click', deleteProduct);
}

function addProduct(e) {
    e.preventDefault();
    if (e.target.classList.contains('btn-agregar-carito')) {
        const selectProduct = e.target.parentElement;
        readTheContent(selectProduct);
    }
}

function deleteProduct(e) {
    if (e.target.classList.contains('delete-product')) {
        const deleteId = e.target.getAttribute('data-id');

        const indexToDelete = buyThings.findIndex(product => product.id == deleteId);
        if (indexToDelete !== -1) {
            const productToDelete = buyThings[indexToDelete];
            let priceReduce = parseFloat(productToDelete.price) * parseFloat(productToDelete.amount);

            if (productToDelete.amount > 1) {
                productToDelete.amount--; // Reduce la cantidad en 1
            } else {
                buyThings.splice(indexToDelete, 1); // Elimina el producto si su cantidad es 1
            }

            countProduct--;
        }
    }

    if (buyThings.length === 0) {
        priceTotal.innerHTML = 0;
        amountProduct.innerHTML = 0;
    }

    loadHtml(); // Llama a loadHtml para actualizar la interfaz y el precio total
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
            if(product.id === infoProduct.id){
                product.amount++;
                return product;
            }else{
                return product;
            }
        });
        buyThings = [...pro];
    }else{
        buyThings = [...buyThings,infoProduct]
        countProduct++;
    }
    loadHtml();
}

function loadHtml() {
    clearHtml();

    totalCard = 0; // Reinicia el precio total a 0 antes de recalcularlo

    buyThings.forEach(product => {
        const { image, title, price, amount, id } = product;
        const row = document.createElement('div');
        row.classList.add('item');
        row.innerHTML = `
        <img src="${image}" alt="">
        <div class="item-content">
            <h5>${title}</h5>
            <h5 class="cart-price">${price}$</h5>
            <h6>Cantidad: ${amount}</h6>
        </div>
    
        
        `;

        containerBuyCart.appendChild(row);

        totalCard += parseFloat(price) * amount; // Recalcula el precio total
        totalCard = totalCard.toFixed(2);

        priceTotal.innerHTML = totalCard;

        amountProduct.innerHTML = countProduct;
    });
}

function clearHtml() {
    containerBuyCart.innerHTML = '';
}