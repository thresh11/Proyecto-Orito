const inputQuantity = document.querySelector('.input-quantity');
const btnIncrement = document.querySelector('#increment');
const btnDecrement = document.querySelector('#decrement');

let valueByDefault = parseInt(inputQuantity.value);

// Funciones Click

btnIncrement.addEventListener('click', () => {
	valueByDefault += 1;
	inputQuantity.value = valueByDefault;
});

btnDecrement.addEventListener('click', () => {
	if (valueByDefault === 1) {
		return;
	}
	valueByDefault -= 1;
	inputQuantity.value = valueByDefault;
});




// Toggle
// Constantes Toggle Titles
const toggleDescription = document.querySelector(
	'.title-description'
);
const toggleAdditionalInformation = document.querySelector(
	'.title-additional-information'
);
const toggleReviews = document.querySelector('.title-reviews');

// Constantes Contenido Texto
const contentDescription = document.querySelector(
	'.text-description'
);
const contentAdditionalInformation = document.querySelector(
	'.text-additional-information'
);
const contentReviews = document.querySelector('.text-reviews');





// Funciones Toggle
toggleDescription.addEventListener('click', () => {
	contentDescription.classList.toggle('hidden');
});

toggleAdditionalInformation.addEventListener('click', () => {
	contentAdditionalInformation.classList.toggle('hidden');
});

toggleReviews.addEventListener('click', () => {
	contentReviews.classList.toggle('hidden');
});


function myFunction() {
    var x = document.getElementById("myForm");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }




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
//car 
