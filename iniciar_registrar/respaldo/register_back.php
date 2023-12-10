<?php 
include('conexion.php');

    if(isset($_POST['button_register'])){
        $nombre=($_POST['nombre']);
        $apellido=($_POST['apellido']);
        $telefono=($_POST['telefono']);
        $correo=($_POST['correo']);
        // $contraseña=($_POST['contraseña']);
        $contraseña=md5($_POST['contraseña']);
        $fecha= date("d/m/y");
        $consulta = "INSERT INTO datos (nombre,apellido,telefono,correo,contraseña,fecha)
                            VALUE ('$nombre','$apellido','$telefono',' $correo','$contraseña','$fecha')";

        $resultado = mysqli_query($conex,$consulta);

        if($resultado){ 
            header("location: registrar.php");
        }

    }
?>

