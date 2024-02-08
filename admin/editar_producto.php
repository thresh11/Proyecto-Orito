<?php
require '../config/database.php';
require '../config/config.php';

$db = new Database();
$con = $db->conectar();

// Verificar si se recibió el parámetro id_producto en la URL
if (isset($_GET['id_producto'])) {
    $id_producto = $_GET['id_producto'];

    // Consultar el producto a editar
    $sql = $con->prepare("SELECT id_producto, nombre_producto, precio_producto, unidad_producto FROM productos WHERE id_producto = :id_producto AND activo = 1");
    $sql->bindParam(':id_producto', $id_producto, PDO::PARAM_INT);
    $sql->execute();
    $producto = $sql->fetch(PDO::FETCH_ASSOC);

    // Verificar si se encontró el producto
    if (!$producto) {
        echo 'Producto no encontrado.';
        exit;
    }
} else {
    echo 'ID del producto no proporcionado.';
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="body_form_actualizar">
    <section class="form_actualizar">
    <form action="actualizar_producto.php" method="post">
           <input type="hidden" name="id_producto" value="<?php echo $producto['id_producto']; ?>">

           <label for="nombre_producto">Nombre:</label><br>
           <input type="text" name="nombre_producto" value="<?php echo $producto['nombre_producto']; ?>" required><br>

           <label for="precio_producto">Precio:</label><br>
           <input type="text" name="precio_producto" value="<?php echo $producto['precio_producto']; ?>" required><br>

           <label for="unidad_producto">Unidad:</label><br>
           <input type="text" name="unidad_producto" value="<?php echo $producto['unidad_producto']; ?>" required><br>

           <!-- Agrega más campos según tus necesidades -->

           <button type="submit">Actualizar Producto</button>
       </form>
    </section>
</body>
</html>
