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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sobre nosotros</title>
    <link rel="icon" href="./img/aguacatico.png">
    <script defer src="sobrenosotros.js"></script>
    <link rel="stylesheet" href="sobre_nosotros.css">
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>
<body class="fondo">
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
        <div class="swiper-slide"><img src="img/Diapositiva1.png" alt=""></div>
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


    <section class="history">

        <div class="titulooo"> 
            <h1><span> Quienes</span> somos</h1>
        </div>

        
        <div class="history_container">
            <div class="history_container__text">
                <p>Orito verde es una empresa   dedicada a la transformación de productos del campo, específicamente la producción de brownies saludables a base de aguacate hass e 
                    ingredientes naturales para personas que necesitan cuidar de su salud y que desean mejorar sus hábitos alimenticios. <br><br>
                    Este producto además de los beneficios nutricionales cuenta con la ventaja de tener un gran
                    sabor, similar a los disponibles en el mercado, hechos con ingredientes altos en grasas nocivas (grasas saturadas y grasas trans), azucares y carbohidratos simples, causantes de sobrepeso, obesidad y múltiples afecciones de salud. <br> <br> 
                    Con este emprendimiento, apoyamos a los pequeños productores de las fincas campesinas del departamento del Tolima, adquiriendo sus productos a un precio acorde a las dinámicas del mercado, para incorporarlo como materia prima de nuestra cadena de producción</p>
            </div>

            <div class="history_container-video">

                <video width="520" height="300" controls>
                <source src="../img/CORITO .1.mp4" type="video/mp4">
                </video>
                
            </div>

        </div>
    </section>


    <section class="AboutUs">




        <div class="aboutUs__container">
            
            <div class="texto1">
                <div class="titulooo"> 
                    <h1><span>Qué buscamos </span> </h1>
                </div>

                    <p>Orito verde busca mejorar los hábitos alimenticios y posicionar el concepto de que la comida saludable puede tener un buen sabor y textura, ofreciendo un producto saludable a base de aguacate hass que está al alcance de las familias, de los entornos laborales, y, de cualquier persona que busque un snack en su día a día, a un excelente precio, para saciar el hambre sin afectar su salud física (sobrepeso, colesterol y glicemia elevados, etc.) y mental (adicción a la comida chatarra, ansiedad, entre otros desórdenes alimenticios), por factores provenientes de la mala alimentación que es la causante del mayor porcentaje de enfermedades que aquejan a la población actualmente. Por otra parte, se busca incentivar el consumo del aguacate aprovechando al máximo sus propiedades nutricionales, a través de un producto que no pasa por grandes procesos de industrialización. 
                        Además, se quiere contribuir al desarrollo agrícola de los productores de la región, al garantizarles la compra de sus cosechas a un precio justo y directamente en sus predios, lo que les reduce los costos de transporte y almacenamiento.
                        </p>
                    <img class="segunda_img" src="../img/braunis.png" ></img>
            </div>
            <img class="primera" src="../img/braunis.png" >
        </div>




        <div class="aboutUs__container">
            <img class="primera" src="../img/img_2.jpeg" >
            <div class="texto1">
                <div class="titulooo"> 
                    <h1><span> Propuesta  </span>de valor</h1>	
                </div>

                    <p>La propuesta de valor en este caso es un producto saludable y diferente a lo disponible en el mercado y con un precio al público asequible para cualquier persona que desee mejorar su alimentación, su delicioso sabor hace que las personas quieran consumirlo y sin los remordimientos por el daño que pueda causar a su salud; además contiene un alto contenido de vitaminas, minerales y ácidos grasos saludables, como la vitamina D, omega 3, magnesio, entre otros que son fuente de vida para nuestro cuerpo y mente.
                        Al ser un producto de fabricación artesanal y no pasas por un proceso altamente industrializado, se convierte en una fuente de generación de empleo.
                        </p>

                    <img class="segunda_img" src="../img/img_2.jpeg" ></img>
            </div>
        </div>





        <div class="aboutUs__container">
            
            <div class="texto1">
                <div class="titulooo"> 
                    <h1><span> Visión:</span></h1>
                </div>

                    <p>"Nos visualizamos como un referente en la industria alimentaria, reconocidos por nuestra innovación en la creación de productos saludables y sostenibles. Aspiramos a expandir nuestra oferta a nivel nacional e internacional, manteniendo siempre nuestro compromiso con la calidad, la salud, el apoyo a los pequeños productores y el cuidado del medio ambiente. Buscamos inspirar a otros a adoptar prácticas comerciales responsables y a contribuir activamente al bienestar de las comunidades y del planeta."<br><br>
                        Estos enunciados reflejan el propósito de la empresa, destacando su compromiso con la calidad de los productos, el apoyo a los productores locales, la sostenibilidad ambiental y la aspiración de crecimiento y reconocimiento en el mercado.</p>
                    <img class="segunda_img" src="../img/campo.jpg" ></img>
            </div>
            <img class="primera" src="../img/campo.jpg" >
        </div>



        <div class="aboutUs__container">
            <img class="primera" src="../img/img_5.jpeg" >
            <div class="texto1">
                <div class="titulooo"> 
                    <h1><span> Misión:</span></h1>
                </div>

                    <p>"En Orito Verde, nos comprometemos a ofrecer alternativas saludables y deliciosas a 
                        través de nuestros brownies de aguacate, utilizando ingredientes naturales provenientes 
                        de pequeños productores del Tolima. Nos esforzamos por impulsar y promover los productos 
                        locales de la región, al mismo tiempo que abrazamos un enfoque ambiental. Cada venta de 
                        nuestros productos contribuye a la reforestación, plantando árboles en los municipios del 
                        Tolima, fortaleciendo así nuestro compromiso con la 
                        sostenibilidad y la comunidad."</p>

                    <img class="segunda_img" src="../img/img_5.jpeg" ></img>
            </div>
           
        </div>
        
     
    </section>
    <br>
    <br>
    <br>
    <br>



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