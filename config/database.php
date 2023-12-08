<?php

class Database {

    private $hostname = "localhost";
    private $database = "orito_verde";
    private $username = "root";
    private $password = "";
    private $charset = "utf8";

    function conectar()
    {
        try {
            // Construir la cadena de conexión
            $conexion = "mysql:host=" . $this->hostname . "; dbname=" . $this->database . "; charset=" . $this->charset;

            // Configuración de opciones para la conexión PDO
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,  // Configura el modo de error para lanzar excepciones
                PDO::ATTR_EMULATE_PREPARES => false  // Desactiva la emulación de consultas preparadas
            ];

            // Crear una instancia de la clase PDO para la conexión a la base de datos
            $pdo = new PDO($conexion, $this->username, $this->password, $options);

            // Devolver la instancia de PDO
            return $pdo;
        } catch (PDOException $e) {
            // Manejar excepciones en caso de error en la conexión
            echo 'Error de conexión: ' . $e->getMessage();
            exit;
        }
    }

}
?>
