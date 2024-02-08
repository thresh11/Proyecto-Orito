<?php
require '../config/database.php';
require '../config/config.php';

$db = new Database();
$con = $db->conectar();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recuperar datos del formulario
    $id_producto = $_POST['id_producto'];
    $nombre_producto = $_POST['nombre_producto'];
    $precio_producto = $_POST['precio_producto'];
    $unidad_producto = $_POST['unidad_producto'];
    // Agrega más campos según tus necesidades

    // Actualizar el producto en la base de datos
    // $sql = $con->prepare("UPDATE productos SET nombre_producto = :nombre_producto WHERE id_producto = :id_producto");
    $sql = $con->prepare("UPDATE productos SET nombre_producto = :nombre_producto, precio_producto = :precio_producto, unidad_producto = :unidad_producto WHERE id_producto = :id_producto");
    $sql->bindParam(':id_producto', $id_producto, PDO::PARAM_INT);
    $sql->bindParam(':nombre_producto', $nombre_producto, PDO::PARAM_STR);
    $sql->bindParam(':precio_producto', $precio_producto, PDO::PARAM_INT);
    $sql->bindParam(':unidad_producto', $unidad_producto, PDO::PARAM_STR);
    // Agrega más vinculaciones de parámetros según tus necesidades
    $sql->execute();

    // Redireccionar a la página de lectura después de la actualización
    header("Location: index.php");
    exit;
}
?>
