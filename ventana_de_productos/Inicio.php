
<?php
include("conex.php");
$conex;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="inicio.css">
    <script src="boton.js"></script>
</head>
<body>
    <section class="container">
        <div class="slider-wrapper">
       <div class="slider">
        <img id="img_1" src="img/imagen.png" alt="">
        <img id="img_2" src="img/foto.png" alt="">
        <img  id="img_3" src="img/aguacate.png" alt="">

       </div>
       <div class="slider-nav">
        <a href="#img_1"><img class="img_color1 " src="img/imagen.png" alt=""></a>
        <a href="#img_2"><img class="img_color1 " src="img/foto.png" alt=""></a>
        <a href="#img_3"><img class="img_color1 " src="img/aguacate.png" alt=""></a>

       </div>
    </div>
        <div class="info">
             <h1 class="titulo_info">BROWNIE DE AGUACATE CON HARINAS DE ALMENDRAS Y MIEL CON COBERTURA DE CHOCOLATE DE 55G</h1><br>
             <a href=""><img class="img_boton" src="img/home.png" alt=""></a>
             <h1 class=" precio">Precio: $5.000 </h1>
             <br>


             <div class="boton-conta">
                <button class="butt" onclick="myFunction()"></button> 
                <form id="myForm" style="display:none;" class="but" action="from.php" method="post" > 
                <br>
                <h1>Formulario</h1>
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
                </div>
          
            <br>
             <div class="info_pro">
             <h1 class="saber">¡Lo que tienes que saber de este producto!</h1><br>
             <p>Lleva esta increíble promoción de ¡AÑO NUEVOO! Que te ayudara a fortalecer tu cabello, aportando vitalidad y volumen, además de fortalecer tus uñas y cuidar tu piel,  productos 100% Naturales, Compra 2 Biotina Mountain 10.000Mcg x 100 caps y lleva completamente GRATIS 1 Colágeno en Polvo Biotti</p>
            </div>
            <br>
            <a href="javascript:abrir()"> Informacion del envio </a>
            <nav class="botan">
             <button class="batum1"><a href="">COMPRAR AHORA</a></button>
             <input type="number" class="batum2">
             <button class="batum3"><a href="">PAGO CONTRAENTREGA</a></button>
            </nav>
           
            <div class="Ventana" id="vent">
                <div class="cerrar"><a href="javascript.cerrar()"><img class="image" src="img/error.png"></a></div>
                INFORMACIÓN DE ENVÍO
            </div>
       
    </div>
       


    </section>
    
</body>
</html>