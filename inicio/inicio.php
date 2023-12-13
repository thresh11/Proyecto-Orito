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

require '../config/database.php';
require '../config/config.php';
$db = new Database();
$con = $db->conectar();

$sql = $con->prepare("SELECT id_producto, nombre_producto,  precio_producto , unidad_producto FROM productos WHERE activo =1");
$sql->execute();
$resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orito Verde</title>
    
    <script defer src="inicio.js"></script><link rel="icon" href="../img/aguacatico.png">
   
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="inicio.css">
    <!-- <link rel="stylesheet" href="inicio_pruva.css">  -->
</head>
<body>

    <!-- hola mundo -->
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
                                    <!-- <span><img src="../img/icono_user.svg" alt=""></span> -->
                                    <span class="nombre_usuario" onclick="toggleDropdown()">Hola <?= htmlspecialchars($user["nombre"]) ?></span>
                                        <li class="ff" id="ff">
                                            <div class="uc_superior">
                                                <h3><span>o</span>rito verde</h3>
                                                <a href="../iniciar_registrar/logout.php" class="btn-cerrar-session">Cerrar sesión</a>
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
                <li><a href="../iniciar_registrar/login.php">Iniciar sesión</a></p>
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
        <div class="swiper-slide"><img src="../img/0.jpg" alt=""></div>
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

    <div class="titulo_3">
        <h1>Programa <span>"tu brownie,</span> tu vida"</h1> 
    </div>
    <section class="section_targeta_publicitaria">
        <div class="targeta_publicitaria"> 
        </div>
        <p>Nuestros brownies de aguacate combinan sabor y salud. Con ácidos grasos buenos para el corazón y antioxidantes que protegen
            las células, cada bocado es un paso hacia el bienestar. Son ricos en fibra y minerales esenciales, perfectos para disfrutar
            sin culpa. ¡Elige lo mejor para ti con nuestros brownies!
        </p>
    </section>
    
    

    <div class="titulooo"> 
        <h1>Productos <span>estrella</span></h1>
    </div>

    <section class="container">
        <div class="products">
        <?php 
        $contador = 0;
        foreach($resultado as $row)   {  ?>
                <div class="carta">
                        <?php
                    $id = $row["id_producto"];
                    $imagen = "../img/productos/" . $id .  "/producto.PNG";
                    if (!file_exists($imagen)){
                        $imagen = "../img/logo.jpeg";
                    }
                    ?>
                    <h5>más vendido</h5>
                    <img src="<?php  echo $imagen; ?>" alt="foto" >
                    <div class="contenido_texto">
                        <h1 class="titulo"><?php  echo $row ['nombre_producto']; $contador++;?></h1>
                        <p><?php echo $row ['unidad_producto']; ?></p>
                        <p class="precio">$<span><?php echo number_format( $row ['precio_producto'], 0, ',','.' );?></span> pesos</p> 
                    </div>
                    <a href="../prueva/index2.php?id_producto=<?php echo $row ["id_producto"]; ?>&token=<?php echo hash_hmac('sha1', $row["id_producto"], KEY_TOKEN); ?>" class="btn-conoce-mas">Conoce mas!</a> 
                    <a href="" data-id="<?php echo $row ['id_producto'];?>" class="btn-agregar-carito">Añadir al carrito</a>                
                </div>
                    
            <?php if ($contador == 3) {
                break;
            } } ?>
            <!-- <div class="carta">
                    <h5>mas vendido</h5> 
                    <img src="../img/brawni_almendras2-removebg-preview.png" alt="brawni_almendras">
                <div class="contenido_texto">
                    <h1 class="titulo">Brownie de aguacate con almendra</h1>
                    <p>la unidad</p>
                    <p class="precio">$<span>5.500</span> pesos</p> 
                </div>
                    <a href=""  class="btn-conoce-mas">Conoce mas!</a> 
                    <a href="" data-id="1" class="btn-agregar-carito">Añadir al Carrito</a>                
            </div>
                <div class="carta">
                    <h5>Más Vendido</h5>
                        <img src="../img/brawni_arroz2-removebg-preview.png" alt="Cafe">
                    <div class="contenido_texto">
                        <h1 class="titulo">Brownie de aguacate con arroz</h1>
                        <p>la unidad</p>
                        <p class="precio">$<span>5.000</span> Pesos</p>  
                    </div>
                        <a href=""  class="btn-conoce-mas">Conoce mas!</a> 
                        <a href="" data-id="2" class="btn-agregar-carito">Añadir al carrito</a> 
                </div>
                    <div class="carta">
                        <h5>mas vendido</h5>
                            <img src="../img/brawni_avena2-removebg-preview.png" alt="kumis">
                        <div class="contenido_texto">
                            <h1 class="titulo">Brownie de aguacate y avena</h1>
                            <p>la unidad</p>
                            <p class="precio">$<span>5.000</span> pesos</p>  
                        </div>
                            <a href=""  class="btn-conoce-mas">Conoce mas!</a> 
                            <a href="" data-id="3" class="btn-agregar-carito">Añadir al carrito</a> 
                    </div>  -->
        </div>                                   
    </section>

    <div class="titulo_2">
        <h1><span>Disfruta</span> de las delicias agrícolas con orito verde</h1>
    </div>
        <section class="galeria_img">
            <div class="img_grande"><img src="../img/img_5.jpeg" alt=""></div>
            <div class="lateral_derecho">
                <div class="lsd_imagenes">
                    <div class="img_lsdi"><img src="../img/img_4.jpeg" alt=""></div>
                    <div class="img_lsdd"><img src="../img/img_3.jpeg" alt=""></div>
                </div>
                <div class="img_pd"><img src="../img/img_2.jpeg" alt=""></div>
            </div>
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
                    <p><a href="../sobre nosotros/sobre_nosotros.php"><u>sobre nosotros</u></a></p>
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
  
    <!-- ipconfig -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
</body>
</html>
