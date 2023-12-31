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


//car 

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

// function addProduct(e) {
    
//     if (e.target.classList.contains('btn-agregar-carito')) {
//         e.preventDefault();
//         const selectProduct = e.target.parentElement;
//         readTheContent(selectProduct);
//         updateCart();
//     }
// }

function addProduct(e) {
    // Evita el comportamiento predeterminado solo si el clic proviene de un botón con la clase 'btn-agregar-carito'
    if (e.target.classList.contains('btn-agregar-carito')) {
        e.preventDefault();
        const selectProduct = e.target.parentElement;
        readTheContent(selectProduct);
    }
}


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




function toggleDropdown() {
    var dropdownContent = document.getElementById("ff");
    if (dropdownContent.style.display === "none") {
        dropdownContent.style.display = "block";
    } else {
        dropdownContent.style.display = "none";
    }
}



var iconoMenu = document.querySelector('.icon_menu');
var contenidoMenuR = document.querySelector('.menuR');

//    window.onload = function() {
//        if (window.getComputedStyle(contenidoMenuR).display === 'flex') {
//            contenidoMenuR.style.maxHeight = '500px';
//        } else {
//            contenidoMenuR.style.maxHeight = '0px';
//        }
//    };

function menu_despegable(){
var contenidoMenuR = document.querySelector('.menuR');
   if (contenidoMenuR.style.display === 'none') {
       contenidoMenuR.style.display = 'block';
   } else {
       contenidoMenuR.style.display = 'none';
   }
}