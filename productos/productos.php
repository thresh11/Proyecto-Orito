<?php
require '../config/config.php';
require '../config/database.php';
$db = new Database();
$con = $db->conectar();


$sql = $con->prepare("SELECT id_producto, nombre_producto, precio_producto, unidad_producto FROM productos WHERE activo = 1 "); 
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet"  href="estilosproductos.css">
    <script defer src="scrit_productos.js"></script>




</head>

<body>
    <header>
        <div class="navegador">
            <a href="../inicio/inicio.html"><h1><span class="color_0">O</span>rito Verde</h1></a>
            <nav>
                <ul>
                    <div class="desaparecer">
                        <li><a href="../inicio/inicio.html">Inicio</a></li>
                        <li><a href="../sobre nosotros/sobrenosotros.html">Sobre nosotros</a></li>
                        <li><a href="productos.html">Productos</a></li>
                        <li><a href="../iniciar_registrar/registrar.html">Registrar</a></li>
                    </div>
                        <li class="icon_menu">
                            <a href="#"><span class="material-symbols-outlined" id="tamaño">Menú</span></a>
                                <ul class="contenido_vertical">
                                    <li><a href="#">Servicios</a></li>
                                    <li><a href="#">Productos</a></li>
                                    <li><a href="#">Guardería</a></li>
                                    <li><a href="#">Promociones</a></li>
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
                    </div>               
            </nav>
        </div>
    
    </header>


    <div class="titulooo"> 
        <h1>Nuestros <span>Productos</span></h1>
    </div>

  
    <section class="pro__contedor__busqueda">
        
        

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


                <button onclick="mostrarDiv(2)" class="filtro__texto__button"> Cajas de Brownies </button>

                    <div id="div-2" class="div-oculto">
                        <input type="radio" name="categoria" value="cajas" id="cajas__Radio">Nuestras cajas de Brownies<br>
                        <input type="radio" name="categoria" value="cajas_almendras" id="cajas_almendras_radio"> Caja de Brownie de Almendras<br>
                        <input type="radio" name="categoria" value="cajas_arroz" id="cajas_arroz_radio">  Caja de Brownie de Arroz <br>
                        <input type="radio" name="categoria" value="cajas_avena" id="cajas_avena_radio">  Caja de Brownie de Avena
                    </div>
                    

                <button onclick="mostrarDiv(3)" class="filtro__texto__button"> Ofertas</button>

                    <div id="div-3" class="div-oculto">
                        <input type="radio" name="categoria" value="oferta" id="oferta__Radio"> Ofertas del mes <br>
                        <input type="radio" name="categoria" value="P__vendi" id="P__vendi__Radio"> Productos más vendidos<br>
                        <input type="radio" name="categoria" value="combo" id="combo__Radio"> ¡Gran Combo!<br>
                    </div>

                <button onclick="mostrarDiv(4)" class="filtro__texto__button"> Categorizado por</button>

                    <div id="div-4" class="div-oculto">
                        <input type="radio" name="categoria" value=" libra" id="libras__Radio"> libra<br>
                        <input type="radio" name="categoria" value=" kilo" id="kilo__Radio"> Kilo<br>
                        <input type="radio" name="categoria" value="unidad" id="unidad__Radio"> Unidad<br>
                        <input type="radio" name="categoria" value="Litro" id="litro__Radio"> litro<br>
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
                        <input type="radio" name="categoria" value="cajas2" id="cajas__Radio2">Nuestras Cajas de Brownies<br>
                        <input type="radio" name="categoria" value="cafe" id="cafe__Radio"> Café tostado molido<br>
                        <input type="radio" name="categoria" value="miel" id="miel__Radio"> Miel<br>
                        <input type="radio" name="categoria" value="aromatica" id="aromatica__Radio"> Aromática<br>
                        <input type="radio" name="categoria" value="aguacate" id="aguacate__Radio"> Aguacate Hass <br>
                        <input type="radio" name="categoria" value="kumis" id="kumis__Radio"> Kumis sin azúcar<br>
                        <input type="radio" name="categoria" value="panela" id="panela__Radio"> Panela pulverizada<br>
                        <input type="radio" name="categoria" value="mantequilla" id="mantequilla__Radio"> Mantequilla de maní <br>
                    </div>

                    <!-- Agrega el formulario -->
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <label>
                            <input type="checkbox" name="categoria[]" value="Categoria1"> Categoria1
                        </label>
                        <!-- Agrega más checkboxes según las categorías en tu base de datos -->
                        <input type="submit" value="Filtrar">
                    </form>
                <!-- <input type="radio" name="categoria" value="brauni" id="brauniRadio"> braunis<br>
                <input type="radio" name="categoria" value="combo" id="comboRadio"> combos<br>
                <input type="radio" name="categoria" value="oferta" id="ofertaRadio"> oferta  -->
            </div>


            
            
            
<!-- <div id="contenedor"> -->
        <section id="pro__contedor">
        


            <div class="pro__contedor__busqueda_verde">
                <button class="pro__contedor__busqueda-button"><img src="../img/lupa.png" alt=""></button>
                <input type="text" class="pro__contedor__busqueda-box" placeholder="Buscar...">
            </div>


            
                <?php foreach($resultado as $row)   {     ?>
                    <div class="pro__contedor__caja <?php echo $row['unidad_producto'] ?>">
                    <?php
                    $id = $row["id_producto"];
                    $imagen = "../img/productos/" . $id .  "/producto.png";
                    if (!file_exists($imagen)){
                        $imagen = "../img/logo.jpeg";
                    }
                    ?>
                    <img src="<?php  echo $imagen; ?>" alt="foto" >
                    <div class="texto">
                        <h3> <?php  echo $row ['nombre_producto']?></h3>
                        <p><?php  echo $row ['id_producto']?></p>
                        <h1> <?php  echo $row ['precio_producto']?></h1>
                    </div>
                    <div class="conteImg__contenedor-caja-button">
                        <button class="conteImg__contenedor-caja-button-1">Conoce mas!</button>
                        <button class="conteImg__contenedor-caja-button-2">Añadir al carrito</button>
                    </div>
                    
                </div>
                <?php  } 
                ?>


                <!-- <div class="pro__contedor__caja Brownie Brownie_arroz 5.000 unidad Brownie2">
                    <
                    <img src="../img/brawni_arroz2-removebg-preview1.png" alt="foto">
                    <div class="texto">

                        <h3>  Brownie de aguacate con arroz </h3>
                        <p>la unidad</p>
                        <h1> $ 5.000</h1>

                    </div>
                    <div class="conteImg__contenedor-caja-button">
                        <button class="conteImg__contenedor-caja-button-1">Conoce mas!</button>
                        <button class="conteImg__contenedor-caja-button-2">Añadir al carrito</button>
                    </div>
                    
                    
                </div>

                <div class="pro__contedor__caja Brownie Brownie_avena 5.000 unidad Brownie2">
                    <img src="../img/brawni_avena2-removebg-preview1.png" alt="foto">
                    <div class="texto">
                        <h3> Brownie de aguacate y avena</h3>
                        <p>la unidad</p>
                        <h1> $ 5.000</h1>
                    </div>
                    <div class="conteImg__contenedor-caja-button">
                        <button class="conteImg__contenedor-caja-button-1">Conoce mas!</button>
                        <button class="conteImg__contenedor-caja-button-2">Añadir al carrito</button>
                    </div>
                
                
                </div>
                
                <div class="pro__contedor__caja cajas cajas_avena 30.000 unidad cajas2">
                    <img class="img_caj" src="../img/caja2.png" alt="foto">
                    <div class="texto">
                        <h3> Caja de brownies de aguacate y avena </h3>
                        <p>6 unidades</p>
                        <h1> $ 30.000</h1>
                    </div>
                    <div class="conteImg__contenedor-caja-button ">
                        <button class="conteImg__contenedor-caja-button-1">Conoce mas!</button>
                        <button class="conteImg__contenedor-caja-button-2">Añadir al carrito</button>
                    </div>

                </div>

                <div class="pro__contedor__caja  cajas cajas_almendras 30.000 unidad cajas2">
                    <img class="img_caj" src="../img/caja2.png" alt="foto">
                    <div class="texto">
                        <h3> Caja de brownies de aguacate y almendras </h3>
                        <p>6 unidades</p>
                        <h1> $ 32.000</h1>
                    </div>
                    <div class="conteImg__contenedor-caja-button">
                        <button class="conteImg__contenedor-caja-button-1">Conoce mas!</button>
                        <button class="conteImg__contenedor-caja-button-2">Añadir al carrito</button>
                    </div>

                </div>


                <div class="pro__contedor__caja cajas cajas_arroz 30.000 unidad cajas2" >
                    <img class="img_caj" src="../img/caja2.png" alt="foto">
                    <div class="texto">
                        <h3> Caja de brownies de aguacate y arroz </h3>
                        <p>6 unidades</p>
                        <h1> $ 30.000</h1>
                    </div>
                    <div class="conteImg__contenedor-caja-button">
                        <button class="conteImg__contenedor-caja-button-1">Conoce mas!</button>
                        <button class="conteImg__contenedor-caja-button-2">Añadir al carrito</button>
                    </div>

                </div>


                <div class="pro__contedor__caja cafe 20.000 libras">
                    
                    <img src="../img/cafe.png" alt="foto">
                    <div class="texto">
                        <h3> Café tostado molido </h3>
                        <p>1 libra</p>
                        <h1> $ 25.000</h1>
                    </div>
                    <div class="conteImg__contenedor-caja-button">
                        <button class="conteImg__contenedor-caja-button-1">Conoce mas!</button>
                        <button class="conteImg__contenedor-caja-button-2">Añadir al carrito</button>
                    </div>
                    
                </div>

                <div class="pro__contedor__caja aromatica 5.000 otros">
                    <img src="../img/SAXSA.png" alt="foto">
                    <div class="texto">
                        <h3> Aromática 100% orgánica  </h3>
                        <p>Caja con bolsas reutilizables</p>
                        <h1> $ 8.000</h1>
                    </div>
                    <div class="conteImg__contenedor-caja-button">
                        <button class="conteImg__contenedor-caja-button-1">Conoce mas!</button>
                        <button class="conteImg__contenedor-caja-button-2">Añadir al carrito</button>
                    </div>
                    
                    
                </div>

            
                <div class="pro__contedor__caja aguacate 5.000 kilo">
                    <img src="../img/aguacate-hass.jpeg" alt="foto">
                    <div class="texto">
                        <h3> Aguacate Hass de Fresno </h3>
                        <p>1 kilo</p>
                        <h1> $ 6.000</h1>
                    </div>
                    <div class="conteImg__contenedor-caja-button">
                        <button class="conteImg__contenedor-caja-button-1">Conoce mas!</button>
                        <button class="conteImg__contenedor-caja-button-2">Añadir al carrito</button>
                    </div>
                </div>

                <div class="pro__contedor__caja miel 30.000 otros">
                    <img src="../img/miel.png" alt="foto">
                    <div class="texto">
                        <h3> Miel 100% natural del </h3>
                        <p>Precio botella</p>
                        <h1> $ 43.000</h1>
                    </div>
                    <div class="conteImg__contenedor-caja-button">
                        <button class="conteImg__contenedor-caja-button-1">Conoce mas!</button>
                        <button class="conteImg__contenedor-caja-button-2">Añadir al carrito</button>
                    </div>

                </div>
                <div class="pro__contedor__caja kumis 10.000 litro">
                    <img src="../img/kumis.png" alt="foto">
                    <div class="texto">
                        <h3> Kumis sin azúcar natural </h3>
                        <p>1 litro</p>
                        <h1> $ 11.000</h1>
                    </div>
                    <div class="conteImg__contenedor-caja-button">
                        <button class="conteImg__contenedor-caja-button-1">Conoce mas!</button>
                        <button class="conteImg__contenedor-caja-button-2">Añadir al carrito</button>
                    </div>

                </div>
                <div class="pro__contedor__caja panela 5.000 libras">
                    <img src="../img/panela.png" alt="foto">
                    <div class="texto">
                        <h3> Panela pulverizada 100% </h3>
                        <p>1 libra</p>
                        <h1> $ 5.000</h1>
                    </div>
                    <div class="conteImg__contenedor-caja-button">
                        <button class="conteImg__contenedor-caja-button-1">Conoce mas!</button>
                        <button class="conteImg__contenedor-caja-button-2">Añadir al carrito</button>
                    </div>

                </div>

                <div class="pro__contedor__caja mantequilla 10.000 gramos">
                    <img src="../img/matequilla.png" alt="foto">
                    <div class="texto">
                        <h3> Mantequilla de mani sin sal </h3>
                        <p> 250 gr</p>
                        <h1> $ 11.000</h1>
                    </div>
                    <div class="conteImg__contenedor-caja-button">
                        <button class="conteImg__contenedor-caja-button-1">Conoce mas!</button>
                        <button class="conteImg__contenedor-caja-button-2">Añadir al carrito</button>
                    </div>

                </div>-->
                
                
            </section>
        </div>
        
    </section>

    <div class="footer_abajo">
        <footer>
            <h1><span class="color_0">O</span>rito verde</h1>
                <div class="informacion">
                    <p><a href="#">terminos y condicones</a></p>
                    <p><a href="#">politica de privacidad</a></p>
                    <p><a href="#">sobre nosotros</a></p>
                </div>
                    <div class="logos">
                        <img src="../img/logos/instagram_03.png" alt="logo_intagram">
                        <img src="../img/logos/twitter.png" alt="logo_twitter">
                        <img src="../img/logos/facebook.png" alt="logo_facebook">
                        <img src="../img/logos/youtube.png" alt="logo_youtube">
                    </div>
        </footer>
    </div>




    
</body>
</html>