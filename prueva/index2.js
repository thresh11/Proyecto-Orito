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











  //formulario 


	var cuestionarioVisible = false;

	function toggleCuestionario() {
		if (cuestionarioVisible) {
			cerrarCuestionario();
		} else {
			mostrarCuestionario();
		}
	}

	function mostrarCuestionario() {
		document.getElementById('cuestionario').style.display = 'block';
		cuestionarioVisible = true;
	}

	function cerrarCuestionario() {
		document.getElementById('cuestionario').style.display = 'none';
		cuestionarioVisible = false;
	}



  // end formulario 



  //carrusel

	if(document.querySelector('#container-slider')){
		setInterval('funcionEjecutar("siguiente")',10000);
	}
	//------------------------------ LIST SLIDER -------------------------
	if(document.querySelector('.listslider')){
		let link = document.querySelectorAll(".listslider li a");
		link.forEach(function(link) {
		link.addEventListener('click', function(e){
			e.anteriorentDefault();
			let item = this.getAttribute('itlist');
			let arrItem = item.split("_");
			funcionEjecutar(arrItem[1]);
			return false;
		});
		});
	}
	
	function funcionEjecutar(side){
		let parentTarget = document.getElementById('slider');
		let elements = parentTarget.getElementsByTagName('li');
		let curElement, siguienteElement;
	
		for(var i=0; i<elements.length;i++){
	
			if(elements[i].style.opacity==1){
				curElement = i;
				break;
			}
		}
		if(side == 'anterior' || side == 'siguiente'){
	
			if(side=="anterior"){
				siguienteElement = (curElement == 0)?elements.length -1:curElement -1;
			}else{
				siguienteElement = (curElement == elements.length -1)?0:curElement +1;
			}
		}else{
			siguienteElement = side;
			side = (curElement > siguienteElement)?'anterior':'siguiente';
	
		}
		
		//PUNTOS INFERIORES
		let elementSel = document.getElementsByClassName("listslider")[0].getElementsByTagName("a");
		elementSel[curElement].classList.remove("item-select-slid");
		elementSel[siguienteElement].classList.add("item-select-slid");
		elements[curElement].style.opacity=0;
		elements[curElement].style.zIndex =0;
		elements[siguienteElement].style.opacity=1;
		elements[siguienteElement].style.zIndex =1;
	}

	//end  carrusel 




    
    // footer



//end footer

	
