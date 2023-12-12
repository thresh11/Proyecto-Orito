<?php
require '../config/config.php';
require '../config/database.php';
$db = new Database();
$con = $db->conectar();

$id = isset($_GET['id_producto']) ? $_GET['id_producto'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';

if ($id == '' || $token == ''){
	echo 'Error al procesar la peticion ';
	exit;
} else{
	$token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);

	if ($token == $token_tmp){


		$sql = $con->prepare("SELECT count(id_producto) FROM productos WHERE id_producto=? AND activo=1 ");
		$sql->execute([$id]);
		if ($sql -> fetchColumn() > 0){
			
			$sql = $con->prepare("SELECT nombre_producto, 2nombre_producto, descripcion_producto, precio_producto, unidad_producto  FROM productos WHERE id_producto=? AND activo=1 limit 1");
			$sql->execute([$id]);
			$row = $sql -> fetch(PDO::FETCH_ASSOC);

			
			$nombre = $row ['nombre_producto'];
			$nombre2 = $row ['2nombre_producto'];
			$precio = $row ['precio_producto'];
			$unidaed = $row ['unidad_producto'];
			$descripcion = $row ['descripcion_producto'];



			$dir_img  = '../img/productos/' . $id .  '/';
			$rutaIMG1 = $dir_img ."img_carrusel1.png";
			$rutaIMG2 = $dir_img ."img_carrusel2.png";
			$rutaIMG3 = $dir_img ."img_carrusel3.png";
			

			if (!file_exists($rutaIMG1) || !file_exists($rutaIMG2) || !file_exists($rutaIMG3)) {
				$rutaIMG = '../img/logo.jpeg';
			}
			// $imagenes = array();
			// $dir = dir($dir_img);
			// while(($archivo = $dir -> read()) != false){
			// 	if ($archivo != 'producto.png' && (strpos($archivo,'png')));{
			// 	$imagenes [] = $dir_img . $archivo;
			// }

			// }
			// $dir -> close();

		}

		
	}else{
		echo 'Error al procesar la peticion ';
	exit;
	}
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1.0"/>
		<title>Pagina Producto</title>
		<link rel="stylesheet" href="index2.css" /><link rel="icon" href="../img/aguacatico.png">
        <script defer src="index2.js"></script>
	</head>
<body>

    <header>
        <div class="navegador">     
            <a href="../inicio/inicio.html"><h1><span class="color_0">O</span>rito verde</h1></a>

                <nav>
                    <ul>
                        <div class="desaparecer">
                            <li><a href="inicio.html">Inicio</a></li>
                            <li><a href="../sobre nosotros/sobrenosotros.html">Sobre Nosotros</a></li>
                            <li><a href="../productos/productos2.php">productos</a></li>
                            <li><a href="../iniciar_registrar/iniciar_sesion.html">Iniciar Sesión</a></li>
                        </div>
                            <li class="icon_menu">
                                <a href="#"><span class="material-symbols-outlined" id="tamaño">Menú</span></a>
                                    <ul class="contenido_vertical">
                                        <li><a href="inicio.html">Inicio</a></li>
                                        <li><a href="../sobre nosotros/sobrenosotros.html">Sobre Nosotros</a></li>
                                        <li><a href="../productos/productos.html">Productos</a></li>
                                        <li><a href="../iniciar_registrar/registrar.html">Iniciar Sesión</a></li>
                                    </ul>
                            </li>
                    </ul>

                        <div class="header-section container">
                            <img onclick="verCarrito(this)" class="cart" src="../img/carrito.png" alt="carrito">
                            <p class="count-product">0</p>
                        </div>
                        <div class="cart-products" id="products-id">
                            <p class="close-btn" onclick="cerrarCarrito()">X</p>
                            <h3>Mi carrito</h3>
                            <div class="card-items">
                        
                            </div>
                            <h2>Total: $ <strong class="precio-total">0</strong></h2>
                            <a href="../carrito/carrito.html"><input type="submit" value="ver el carrito" id="btn_ver_carrito"></a>
                        </div>
                </nav>
        </div>     
    </header>
    <div class="barra"></div>
<div class="todo">
	
    <div class="titulooo">
        <h1><span> Descripcion </span> de productos</h1>
	</div>

    <div class="container-title"><b><?php echo $nombre2;?></b></div>

		<main>
			<div class="container-img">
			<section id="container-slider">    
					<a href="javascript: funcionEjecutar('anterior');" class="arrowPrev"><i class="fas fa-chevron-circle-left"></i></a>
					<a href="javascript: funcionEjecutar('siguiente');" class="arrowNext"><i class="fas fa-chevron-circle-right"></i></a>
					<ul class="listslider">
						<li><a itlist="itList_0" href="#" class="item-select-slid"></a></li>
						<li><a itlist="itList_1" href="#"></a></li>
						<li><a itlist="itList_2" href="#"></a></li>
					</ul>
					<ul id="slider">
						<li style="background-image: url('<?php echo $rutaIMG1 ?>'); z-index:0; opacity: 1;">
						<div class="content_slider" >
						
						</div>
						</li>
						<li style="background-image: url('<?php echo $rutaIMG2 ?>'); ">
						<div class="content_slider" >
						
						</div>
						</li>
						<li style="background-image: url('<?php echo $rutaIMG3 ?>'); ">
						<div class="content_slider" >
							
						</div>
						</li>
					</ul>
					</section>
			</div>
			<div class="container-info-product">
				<div class="container-price">
					<span> $<?php echo number_format($precio, 2, ',', '.');  ?></span>
					<i class="fa-solid fa-angle-right"></i>
				</div>

				<div class="container-details-product">
					<div class="form-group">
						<label for="colour">Brownies</label>
						<select name="colour" id="colour">
							<option disabled selected value="">
								Escoge una opción
							</option>
							<option value="rojo">Brownie de Arroz</option>
							<option value="blanco">Brownie de Almendras</option>
							<option value="beige">Brownie de Avena</option>
						</select>
					</div>
				
				</div>

				<div class="container-add-cart">
					<div class="container-quantity">
						<input
							type="number"
							placeholder="1"
							value="1"
							min="1"
							class="input-quantity"
						/>
						<div class="btn-increment-decrement">
							<i class="fa-solid fa-chevron-up" id="increment"></i>
							<i class="fa-solid fa-chevron-down" id="decrement"></i>
						</div>
					</div>
					<button class="btn-add-to-cart">
						<i class="fa-solid fa-plus"></i>
						Añadir al carrito
						<!-- <a href="" data-id="<?php echo $row ['id_producto'];?>" class="btn-agregar-carito">Añadir al carrito</a> -->
					</button>
				</div>

				<div class="container-description">
					<div class="title-description">
						<h4>Descripción</h4>
						<i class="fa-solid fa-chevron-down"></i>
					</div>
					<div class="text-description">
						<p>
							<?php echo $descripcion; ?>
						</p>
					</div>
				</div>

				<div class="container-additional-information">
					<div class="title-additional-information">
						<h4>Información adicional</h4>
						<i class="fa-solid fa-chevron-down"></i>
					</div>
					<div class="text-additional-information hidden">
						<p><li>El envío se realiza de manera terrestre y tarda de 3 a 7 días hábiles</li></p>
						<p><li>Tu compra se entregan en una bolsa de seguridad que protege la integridad del producto</li></p>
						<h4>CAMBIOS y DEVOLUCIONES</h4>
						<p><li>Realizar una devolución es muy facil</li></p>
						<p><li>Puedes revisar las condiciones y procedimiento en nuestras preguntas frecuentes sobre devoluciones</li></p>
					</div>
				</div>

				<div class="container-social">
					<span>Compartir</span>
					<div class="container-buttons-social">
						<a href="#"><i class="fa-solid fa-envelope"></i></a>
						<a href="#"><i class="fa-brands fa-facebook"></i></a>
						<a href="#"><i class="fa-brands fa-twitter"></i></a>
						<a href="#"><i class="fa-brands fa-instagram"></i></a>
						<a href="#"><i class="fa-brands fa-pinterest"></i></a>
					</div>
				</div>
			</div>
		</main>
		<br>
		<br>
		<div class="titulooo"><h2>Productos <span>Relacionados</span></h2></div>


		<section class="container-related-products">
			

			<?php
			$sql = $con->prepare("SELECT id_producto, nombre_producto,  precio_producto, unidad_producto  FROM productos WHERE activo =1");
			$sql->execute();
			$resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
			$contador = 0;

			?>


				<div class="products">
				<?php foreach($resultado as $row){
				if ($id != $row['id_producto'] ){ 
					
					?>
				
				<?php
                    $id_img = $row["id_producto"];
                    $imagen = "../img/productos/" . $id_img .  "/producto.PNG";

                    if (!file_exists($imagen)){
                        $imagen = "../img/logo.jpeg";
                    }
                    ?>

						<div class="carta ">
								<img src="<?php  echo $imagen; ?>" alt="browni_arroz">
							<div class="contenido_texto">
								<h1 class="titulo"><?php  echo $row['nombre_producto']; $contador++;?> </h1>
								<p><?php echo $row ['unidad_producto']; ?></p>
								<p class="precio">$<span><?php echo number_format($row['precio_producto'], 0, ',','.' )   ?></span> pesos</p>  
							</div>
								<a href="index2.php?id_producto=<?php echo $row ["id_producto"]; ?>&token=<?php echo hash_hmac('sha1', $row["id_producto"], KEY_TOKEN); ?>" class="btn-conoce-mas">Conoce mas!</a> 
								<a href="" data-id="<?php echo $row["id_producto"];?>" class="btn-agregar-carito">Añadir al carrito</a> 
						</div>
						<?php 
							if ($contador == 4){
							break;
							
						}}} ?>

					

						<?php ?>
						
				</div>

		</section>
</div>


		<div class="footer_abajo">
        <footer>
            <h1><span class="color_0">O</span>rito verde</h1>
            

            <!-- Nuevo contenedor para los elementos del acordeón -->
            <div class="accordion_container">
                <div class="accordion_item" id="info_accordion">
                    <h2><a>ACERCA DE ORITO</a></h2>
                    <div class="informacion_footer">
                        <p><a href="../redaccion/terminos_condiciones.html"><u>terminos del servicio</u></a></p>
                        <p><a href="../redaccion/politicas_privadas.html"><u>Política de privacidad</u></a></p>
                        <p><a href="../sobre nosotros/sobre_nosotros.html"><u>sobre nosotros</u></a></p>
                    </div>
                </div>
                <div class="accordion_item" id="contact_accordion">
                    <h2><a >CONÉCTATE CON NOSOTROS</a></h2>
                    <div class="contactanos_footer">
                        <p>Disponible todos los días de 8:00 a.m. <br> a 6:00 p.m. IBAGUE-TOLIMA</p>
                        <p>WhatsApp: (+57) 314 300 4662</p>
                        <p>E-MAIL: oritoverde@gmail.com </p>
                    </div>
                </div>
                <div class="accordion_item" id="follow_accordion">
                    <h2><a >SíGUENOS</a></h2>
                    <div class="mensaje_footer">
                        <p>¡Si te gusta lo que haces, ni los lunes <br> te quitarán LA SONRISA! <br><br>
                        Gracias por apoyar este emprendimiento</p>
                        <div class="logos">
                            <img src="../img/logos/instagram_03.png" alt="logo_intagram">
                            <img src="../img/logos/twitter.png" alt="logo_twitter">
                            <img src="../img/logos/facebook.png" alt="logo_facebook">
                            <img src="../img/logos/youtube.png" alt="logo_youtube">
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

		<script
			src="https://kit.fontawesome.com/81581fb069.js"
			crossorigin="anonymous"></script>
		<script>
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


		</script>


<script>document.addEventListener('DOMContentLoaded', function () {
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
});</script>

<div class="blue"></div>

<div id="formulario" onclick="toggleCuestionario()">?</div>

<div id="cuestionario">
    <div id="cerrar" onclick="cerrarCuestionario()">X</div>
    <h4>Comentanos</h4>
    <form>
        <label for="Nombre">Nombre:</label>
        <input type="text" name="Nombre" required><br>

        <label for="Correo">Correo:</label>
        <input type="email" name="Correo" required><br>

        <label for="Telefono">Telefono:</label>
        <input type="text" name="Telefono" required><br>

        <label for="Mensaje">Mensaje:</label>
        <textarea name="Mensaje" required></textarea><br>

        <input type="submit" value="Enviar">
    </form>
</div>

	</body>
</html>
