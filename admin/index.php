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
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<section class="container">
        <div class="products">
        <?php foreach($resultado as $row)   {  ?>
                <div class="carta">
                    <div class="corte">
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
                    </div>
                      
                    <a href="editar_producto.php?id_producto=<?php echo $row['id_producto']; ?>" class="btn-editar">Editar</a>                  
                </div>

            <?php  } ?>
        </div>                                   
    </section>
</body>
</html>