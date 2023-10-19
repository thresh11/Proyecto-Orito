<?php
include("conex.php");

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Nombre = $_POST["Nombre"];
    $Correo = $_POST["Correo"];
    $Telefono = $_POST["Telefono"];
    $Mensaje = $_POST["Mensaje"];

    $sql = "INSERT INTO formulario (Nombre, Correo, Telefono, Mensaje) 
            VALUES ('$Nombre', '$Correo', '$Telefono', '$Mensaje')";

    $resultado = mysqli_query($conex,$sql);

    if( $resultado){

        header ("location: Inicio.php");
    }
} 
?>