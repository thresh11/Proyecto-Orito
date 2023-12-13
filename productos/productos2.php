<?php

session_start();

if (isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__ . "/../iniciar_registrar/database.php"; 
    // $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";     
    $sql = "SELECT * FROM usuarios WHERE id = {$_SESSION["user_id"]}";     
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

?>


<?php
require '../config/config.php';
require '../config/database.php';
$db = new Database();
$con = $db->conectar();

$sql = $con->prepare("SELECT id_producto, nombre_producto,  precio_producto, unidad_producto, categoria  FROM productos WHERE activo =1");
$sql->execute();
$resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="productos2.css"><link rel="icon" href="../img/aguacatico.png">
    <script defer src="productos2.js"></script>
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>
<body>
<header class="navegador">
        <a href="../inicio/inicio.php"><h1><span class="color_0">O</span>rito verde</h1></a>
            <nav>
                <ul>
                    <div class="desaparecer">
                        <li><a href="../inicio/inicio.php">Inicio</a></li>
                        <li><a href="../productos/productos2.php">productos</a></li>
                        <li><a href="../sobre nosotros/sobre_nosotros.php">Sobre Nosotros</a></li>
                            <?php if (isset($user)): ?>
                                <li class="perfil">
                                    <span class="material-symbols-outlined">account_circle</span>    
                                    <span class="nombre_usuario" onclick="toggleDropdown()">Hola <?= htmlspecialchars($user["nombre"]) ?></span>
                                        <li class="ff" id="ff">
                                            <div class="uc_superior">
                                                <h3><span>o</span>rito verde</h3>
                                                <a href="../iniciar_registrar/logout.php" class="btn-cerrar-session">Cerrar seccion</a>
                                            </div>
                                            <div class="uc_posterior">
                                                <div class="a">
                                                    <img src="../img/icono_user.jpg" alt="">
                                                </div>  
                                                    <div class="b">
                                                        <h3><?= htmlspecialchars($user["nombre"]) ?></h3>
                                                        <h5><?= htmlspecialchars($user["correo"]) ?></h5>
                                                </div>      
                                            </div>
                                        </li>          
                                </li>
                                <?php else: ?>
                                <li><a href="../iniciar_registrar/login.php">Inicia sesión</a></p>
                            <?php endif; ?>
                    </div>
                        <li class="icon_menu" onclick="menu_despegable()"><img src="../img/menu.svg" alt="menu"></li>
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
    </header>

    

<div class="barra"></div>

<div class="menuR">
        <div class="lista">
            <?php if (isset($user)): ?>
                <li class="perfil">
                    <span class="material-symbols-outlined">account_circle</span>    
                    <span class="nombre_usuario" onclick="toggleDropdown()">Hola <?= htmlspecialchars($user["nombre"]) ?></span>
                </li>
            <?php else: ?>
                <li><a href="../iniciar_registrar/login.php">Inicia sesión</a></p>
            <?php endif; ?>
                <li><a href="../inicio/inicio.php">Inicio</a></li>
                <li><a href="../productos/productos2.php">productos</a></li>
                <li><a href="../sobre nosotros/sobre_nosotros.php">Sobre Nosotros</a></li>
        </div> 
    </div>

<section>
    <div class="carrusel">
        <!-- Slider main container -->
    <div class="swiper">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
    <!-- Slides -->
    <div class="swiper-slide"><img src="../img/imagenproductos.png" alt=""></div>
    <div class="swiper-slide"><img src="../img/aguacate-1.jpg" alt=""></div>
    <div class="swiper-slide"><img src="../img/aguacate-2.jpg" alt=""></div>
    
    </div>
    <!-- If we need pagination -->
    <div class="swiper-pagination"></div>

    <!-- If we need navigation buttons -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>

    <!-- If we need scrollbar -->
    <!-- <div class="swiper-scrollbar"></div> -->
    </div>
    </div>
</section>


    

    <div class="titulooo"> 
        <h1>Nuestros <span>Productos</span></h1>
    </div>

    <section class="todo_section">

        <div class="conterImg__filtro">

            
            <img class="conterImg__filtro__img" src="../img/logo.jpeg" alt="logo"><br>
            
            
            <div class="filtro__texto__titulo">
                <h1>Categorías</h1>
            </div><br>

            <input type="radio" name="categoria" value="todos" id="todosRadio" checked> Todos<br>
            

            <button onclick="mostrarDiv(1)"  class="filtro__texto__button"> Brownie</button>

                <div id="div-1" class="div-oculto">
                    <input type="radio" name="categoria" value="Brownie" id="BrownieRadio">Todos nuestros Brownies <br>
                    <input type="radio" name="categoria" value="Brownie_almendras" id="Brownie_almendras_radio"> Brownie de Almendras<br>
                    <input type="radio" name="categoria" value="Brownie_arroz" id="Brownie_arroz_radio">  Brownie de Arroz <br>
                    <input type="radio" name="categoria" value="Brownie_avena" id="Brownie_avena_radio">  Brownie de Avena
                </div>

                

            <button onclick="mostrarDiv(3)" class="filtro__texto__button"> Ofertas</button>

                <div id="div-3" class="div-oculto">
                    <input type="radio" name="categoria" value="oferta" id="oferta__Radio"> Ofertas del mes <br>
                    <input type="radio" name="categoria" value="P__vendi" id="P__vendi__Radio"> Productos más vendidos<br>
                    <input type="radio" name="categoria" value="combo" id="combo__Radio"> ¡Gran Combo!<br>
                </div>

            <button onclick="mostrarDiv(4)" class="filtro__texto__button"> Categorizado por</button>

                <div id="div-4" class="div-oculto">
                    <input type="radio" name="categoria" value="libra" id="libras__Radio"> libra<br>
                    <input type="radio" name="categoria" value="kilo" id="kilo__Radio"> Kilo<br>
                    <input type="radio" name="categoria" value="unidad" id="unidad__Radio"> Unidades<br>
                    <input type="radio" name="categoria" value="litro" id="litro__Radio"> litro<br>
                    <input type="radio" name="categoria" value="gramos" id="gramos__Radio"> Gramos<br>
                    <input type="radio" name="categoria" value="otros" id="otros__Radio"> Otros<br>
                </div>

            <button onclick="mostrarDiv(5)" class="filtro__texto__button"> Gama de precios</button>

                <div id="div-5" class="div-oculto">
                    <input type="radio" name="categoria" value="5.000" id="5.000__Radio"> $5.000 a $10.000<br>
                    <input type="radio" name="categoria" value="10.000" id="10.000__Radio"> $10.000 a $20.000<br>
                    <input type="radio" name="categoria" value="20.000" id="20.000__Radio"> $20.000 a 30.000 <br>
                    <input type="radio" name="categoria" value="30.000" id="30.000__Radio"> $30.000 a 50.000 <br>

                </div>

            <button onclick="mostrarDiv(6)" class="filtro__texto__button">Nuestros Productos</button>

                <div id="div-6" class="div-oculto">
                    <input type="radio" name="categoria" value="Brownie2" id="BrownieRadio2"> Nuestros Brownies<br>
                    <input type="radio" name="categoria" value="cafe" id="cafe__Radio"> Café tostado molido<br>
                    <input type="radio" name="categoria" value="miel" id="miel__Radio"> Miel<br>
                    <input type="radio" name="categoria" value="aromatica" id="aromatica__Radio"> Aromática<br>
                    <input type="radio" name="categoria" value="aguacate" id="aguacate__Radio"> Aguacate Hass <br>
                    <input type="radio" name="categoria" value="kumis" id="kumis__Radio"> Kumis sin azúcar<br>
                    <input type="radio" name="categoria" value="panela" id="panela__Radio"> Panela pulverizada<br>
                    <input type="radio" name="categoria" value="mantequilla" id="mantequilla__Radio"> Mantequilla de maní <br>
                    <input type="radio" name="categoria" value="chocolate" id="cajas__Radio2">chocolate molido<br>
                </div>
                
        </div>
        





        <div class="container">
            <div class="pro__contedor__busqueda_verde">
                <button class="pro__contedor__busqueda-button"><img src="../img/lupa.png" alt=""></button>
                <input type="text" class="pro__contedor__busqueda-box" placeholder="Buscar...">
            </div>


            <div class="products">


            <?php foreach($resultado as $row)   {     ?>
                <div class="carta <?php  echo $row['categoria'];   ?>  ">
                        <?php
                    $id = $row["id_producto"];
                    $imagen = "../img/productos/" . $id .  "/producto.PNG";
                    if (!file_exists($imagen)){
                        $imagen = "../img/logo.jpeg";
                    }
                    ?>
                    <img src="<?php  echo $imagen; ?>" alt="foto" >
                    <div class="contenido_texto">
                        <h1 class="titulo"><?php  echo $row ['nombre_producto'];?></h1>
                        <p><?php echo $row ['unidad_producto']; ?></p>
                        <p class="precio">$<span><?php echo number_format( $row ['precio_producto'], 0, ',','.' );?></span> pesos</p> 
                    </div>
                        <a href="../prueva/index2.php?id_producto=<?php echo $row ["id_producto"]; ?>&token=<?php echo hash_hmac('sha1', $row["id_producto"], KEY_TOKEN); ?>" class="btn-conoce-mas">Conoce mas!</a> 
                        <a href="" data-id="<?php echo $row ['id_producto'];?>" class="btn-agregar-carito">Añadir al carrito</a>                
                </div>
            <?php  } ?>




        </div>
    </section>



</section>
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
                    <p>Disponible todos los días de 8:00 a.m. <br> a 6:00 p.m. IBAGUE - TOLIMA</p>
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
  
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>



    
</body>
</html>