<?php
require '../config/config.php';
require '../config/database.php';
$db = new Database();
$con = $db->conectar();

$sql = $con->prepare("SELECT id_producto, nombre_producto,  precio_producto, unidad_producto  FROM productos WHERE activo =1");
$sql->execute();
$resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="productos2.css">
    <script defer src="productos2.js"></script>
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
                    <input type="checkbox" name="categoria" value="Brownie" id="BrownieRadio">Todos nuestros Brownies <br>
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
                    <input type="radio" name="categoria" value="libras" id="libras__Radio"> libra<br>
                    <input type="radio" name="categoria" value="kilo" id="kilo__Radio"> Kilo<br>
                    <input type="radio" name="categoria" value="unidad" id="unidad__Radio"> Unidad<br>
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
                    <input type="radio" name="categoria" value="cajas2" id="cajas__Radio2">Nuestras Cajas de Brownies<br>
                    <input type="radio" name="categoria" value="cafe" id="cafe__Radio"> Café tostado molido<br>
                    <input type="radio" name="categoria" value="miel" id="miel__Radio"> Miel<br>
                    <input type="radio" name="categoria" value="aromatica" id="aromatica__Radio"> Aromática<br>
                    <input type="radio" name="categoria" value="aguacate" id="aguacate__Radio"> Aguacate Hass <br>
                    <input type="radio" name="categoria" value="kumis" id="kumis__Radio"> Kumis sin azúcar<br>
                    <input type="radio" name="categoria" value="panela" id="panela__Radio"> Panela pulverizada<br>
                    <input type="radio" name="categoria" value="mantequilla" id="mantequilla__Radio"> Mantequilla de maní <br>
                </div>
            <!-- <input type="radio" name="categoria" value="brauni" id="brauniRadio"> braunis<br>
            <input type="radio" name="categoria" value="combo" id="comboRadio"> combos<br>
            <input type="radio" name="categoria" value="oferta" id="ofertaRadio"> oferta  -->
        </div>




        <div class="container">
            <div class="pro__contedor__busqueda_verde">
                <button class="pro__contedor__busqueda-button"><img src="../img/lupa.png" alt=""></button>
                <input type="text" class="pro__contedor__busqueda-box" placeholder="Buscar...">
            </div>


            <div class="products">


            <?php foreach($resultado as $row)   {     ?>
                <div class="carta  ">
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



                    <!-- <div class="carta Brownie Brownie_arroz 5.000 unidad Brownie2">
                        <h5>mas vendido</h5>
                            <img src="../img/brawni_arroz2-removebg-preview1.png" alt="browni_arroz">
                        <div class="contenido_texto">
                            <h1 class="titulo">Brawnie de aguacate con arroz</h1>
                            <p>la unidad</p>
                            <p class="precio">$<span>5.000</span> pesos</p>  
                        </div>
                            <a href=""  class="btn-conoce-mas">Conoce mas!</a> 
                            <a href="" data-id="2" class="btn-agregar-carito">Añadir al carrito</a> 
                    </div>

                        <div class="carta Brownie Brownie_avena 5.000 unidad Brownie2">
                            <h5>mas vendido</h5>
                                <img src="../img/brawni_avena2-removebg-preview1.png" alt="browni_avena">
                            <div class="contenido_texto">
                                <h1 class="titulo">Brawnie de aguacate y avena</h1>
                                <p>la unidad</p>
                                <p class="precio">$<span>5.000</span> pesos</p>  
                            </div>
                                <a href=""  class="btn-conoce-mas">Conoce mas!</a> 
                                <a href="" data-id="3" class="btn-agregar-carito">Añadir al carrito</a> 
                        </div>   
                        <div class="carta cajas cajas_almendras 30.000 unidad cajas2">
                                <img src="../img/caja2.png" alt="caja_almendras">
                            <div class="contenido_texto">
                                <h1 class="titulo">Caja de brownies de aguacate y almendras</h1>
                                <p>6 unidades</p>
                                <p class="precio">$<span>32.000</span> pesos</p>  
                            </div>
                                <a href=""  class="btn-conoce-mas">Conoce mas!</a> 
                                <a href="" data-id="4" class="btn-agregar-carito">Añadir al carrito</a> 
                        </div>   
                        
                        
                        <div class="carta Brownie Brownie_avena 5.000 unidad Brownie2">
                                <img src="../img/caja2.png" alt="caja_avena">
                            <div class="contenido_texto">
                                <h1 class="titulo">Caja de brownies de aguacate y avena</h1>
                                <p>6 unidades</p>
                                <p class="precio">$<span>30.000</span> pesos</p>  
                            </div>
                                <a href=""  class="btn-conoce-mas">Conoce mas!</a> 
                                <a href="" data-id="5" class="btn-agregar-carito">Añadir al carrito</a> 
                        </div> 
                        
                        
                                    <div class="carta cajas cajas_arroz 30.000 unidad cajas2 ">
                                            <img src="../img/caja2.png" alt="caja_arroz">
                                        <div class="contenido_texto">
                                            <h1 class="titulo">Caja de brownies de aguacate y arroz</h1>
                                            <p>6 unidades</p>
                                            <p class="precio">$<span>30.000</span> pesos</p>  
                                        </div>
                                            <a href=""  class="btn-conoce-mas">Conoce mas!</a> 
                                            <a href="" data-id="6" class="btn-agregar-carito">Añadir al carrito</a> 
                                    </div> 
                                    
                                    <div class="carta cafe 20.000 libras">
                                        <img src="../img/cafe.png" alt="kumis">
                                    <div class="contenido_texto">
                                        <h1 class="titulo">Café tostado molido</h1>
                                        <p>1 libra</p>
                                        <p class="precio">$<span>25.000</span> pesos</p>  
                                    </div>
                                        <a href=""  class="btn-conoce-mas">Conoce mas!</a> 
                                        <a href="" data-id="7" class="btn-agregar-carito">Añadir al carrito</a> 
                                </div>    
                                
                                
                                <div class="carta aromatica 5.000 otros">
                                    <img src="../img/SAXSA.png" alt="kumis">
                                <div class="contenido_texto">
                                    <h1 class="titulo">Aromática 100% orgánica</h1>
                                    <p>Caja con bolsas reutilizables</p>
                                    <p class="precio">$<span>8.000</span> pesos</p>  
                                </div>
                                    <a href=""  class="btn-conoce-mas">Conoce mas!</a> 
                                    <a href="" data-id="8" class="btn-agregar-carito">Añadir al carrito</a> 
                            </div>      



                                <div class="carta aguacate 5.000 kilo">
                                    <img src="../img/aguacate-hass.jpeg" alt="kumis">
                                <div class="contenido_texto">
                                    <h1 class="titulo">Aguacate Hass de Fresno </h1>
                                    <p>1 kilo</p>
                                    <p class="precio">$<span>6.000</span> pesos</p>  
                                </div>
                                    <a href=""  class="btn-conoce-mas">Conoce mas!</a> 
                                    <a href="" data-id="9" class="btn-agregar-carito">Añadir al carrito</a> 
                            </div>      



                                <div class="carta  miel 30.000 otros">
                                    <img src="../img/miel.png" alt="kumis">
                                <div class="contenido_texto">
                                    <h1 class="titulo">Miel 100% natural del</h1>
                                    <p>Precio botella</p>
                                    <p class="precio">$<span>43.000</span> pesos</p>  
                                </div>
                                    <a href=""  class="btn-conoce-mas">Conoce mas!</a> 
                                    <a href="" data-id="10" class="btn-agregar-carito">Añadir al carrito</a> 
                            </div>      


                                <div class="carta kumis 10.000 litro">
                                    <img src="../img/kumis.png" alt="kumis">
                                <div class="contenido_texto">
                                    <h1 class="titulo">Kumis sin azúcar natural</h1>
                                    <p>1 Litro</p>
                                    <p class="precio">$<span>11.000</span> pesos</p>  
                                </div>
                                    <a href=""  class="btn-conoce-mas">Conoce mas!</a> 
                                    <a href="" data-id="11" class="btn-agregar-carito">Añadir al carrito</a> 
                            </div>    
                            
                    
                            <div class="carta  panela 5.000 libras">
                                <img src="../img/panela.png" alt="kumis">
                            <div class="contenido_texto">
                                <h1 class="titulo">Panela pulverizada 100% </h1>
                                <p>1 libra</p>
                                <p class="precio">$<span>5.000</span> pesos</p>  
                            </div>
                                <a href=""  class="btn-conoce-mas">Conoce mas!</a> 
                                <a href="" data-id="12" class="btn-agregar-carito">Añadir al carrito</a> 
                        </div>   
 -->
                        <!-- <div class="carta mantequilla 10.000 gramos">
                            <img src="../img/matequilla.png" alt="kumis">
                        <div class="contenido_texto">
                            <h1 class="titulo">Mantequilla de mani sin sal </h1>
                            <p>250 gr</p>
                            <p class="precio">$<span>11.000</span> pesos</p>  
                        </div>
                            <a href="../iniciar_registrar/registrar.html"  class="btn-conoce-mas">Conoce mas!</a> 
                            <a href="" data-id="13" class="btn-agregar-carito">Añadir al carrito</a> 
                            <a href ="../iniciar_registrar/registrar.html">prueva</a>
                            <a href="../productos/productos.html">Productos</a>
                        </div>    -->







        </div>
    </section>



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

<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>



    
</body>
</html>