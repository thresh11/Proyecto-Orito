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
			
			$sql = $con->prepare("SELECT 2nombre_producto, descripcion_producto, precio_producto, unidad_producto  FROM productos WHERE id_producto=? AND activo=1 limit 1");
			$sql->execute([$id]);
			$row = $sql -> fetch(PDO::FETCH_ASSOC);

			$nombre = $row ['2nombre_producto'];
			$precio = $row ['precio_producto'];
			$unidaed = $row ['unidad_producto'];
			$descripcion = $row ['descripcion_producto'];



			$dir_img  = '../img/productos/' . $id .  '/';
			$rutaIMG = $dir_img ."producto.png";

			if (!file_exists($rutaIMG)){
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
			content="width=device-width, initial-scale=1.0"
		/>
		<title>Pagina Producto</title>
		<link rel="stylesheet" href="styles.css" />
	</head>
	<body>
		<header>
			<h1>Descripcion de productos</h1>
		</header>

		<div class="container-title"><?php echo $nombre;?></div>

		<main>
			<div class="container-img">
				<img
					src="<?php echo $rutaIMG ?>"
					alt="imagen-producto"
				/>
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
							<option value="beige">Brownie de Aguacate</option>
						</select>
					</div>
					<div class="form-group">
						<label for="size">Paquetes</label>
						<select name="size" id="size">
							<option disabled selected value="">
								Escoge una opción
							</option>
							<option value="3">3</option>
							<option value="5">5</option>
							<option value="10">10</option>
							<option value="15">15</option>
						</select>
					</div>
					<button class="btn-clean">Limpiar</button>
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
					</button>
				</div>

				<div class="container-description">
					<div class="title-description">
						<h4>Descripción</h4>
						<i class="fa-solid fa-chevron-down"></i>
					</div>
					<div class="text-description">
						<p>
							Lorem ipsum dolor, sit amet consectetur adipisicing
							elit. Laboriosam iure provident atque voluptatibus
							reiciendis quae rerum, maxime placeat enim cupiditate
							voluptatum, temporibus quis iusto. Enim eum qui delectus
							deleniti similique? Lorem, ipsum dolor sit amet
							consectetur adipisicing elit. Sint autem magni earum est
							dolorem saepe perferendis repellat ipsam laudantium cum
							assumenda quidem quam, vero similique? Iusto officiis
							quod blanditiis iste?
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
						<br>
						<h4>CAMBIOS y DEVOLUCIONES</h4>
						<br>
						<p><li>Realizar una devolución es muy facil</li></p>
						<p><li>Puedes revisar las condiciones y procedimiento en nuestras preguntas frecuentes sobre devoluciones</li></p>
					</div>
				</div>
                 
			 
				<button class="butt" onclick="myFunction()"></button>
                    <form id="myForm" style="display:none;" class="but">
					<br>
						<h4>Formulario</h4>
					<br>
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

		<section class="container-related-products">
			<h2>Productos Relacionados</h2>
			<div class="card-list-products">
				<div class="card">
					<div class="card-img">
						<img
							src="./img/verde-945418_1280.jpg"
							alt="producto-1"
						/>
					</div>
					<div class="info-card">
						<div class="text-product">
							
						</div>
						<div class="price">$5.000</div>
					</div>
				</div>
				<div class="card">
					<div class="card-img">
						<img
							src="./img/foto-882635_1280.jpg"
							alt="producto-2"
						/>
					</div>
					<div class="info-card">
						<div class="text-product">
							
						</div>
						<div class="price">$5.000</div>
					</div>
				</div>
				<div class="card">
					<div class="card-img">
						<img
							src="./img/fotografia-1518880_1280.jpg"
							alt="producto-3"
						/>
					</div>
					<div class="info-card">
						<div class="text-product">
							
						</div>
						<div class="price">$5.000</div>
					</div>
				</div>
				<div class="card">
					<div class="card-img">
						<img
							src="./img/aguacate-2351191_1280.jpg"
							alt="producto-4"
						/>
					</div>
					<div class="info-card">
						<div class="text-product">
		
						</div>
						<div class="price">$5.000</div>
					</div>
				</div>
			</div>
		</section>


		<footer>
			<p>¡Si te gusta lo que haces, ni los lunes te quitaran LA SONRISA!</p>
			<br>
			<P>Gracias por apoyar este emprendimiento</P>
		</footer>

		<script
			src="https://kit.fontawesome.com/81581fb069.js"
			crossorigin="anonymous"
		></script>
		<script src="index.js"></script>
	</body>
</html>
