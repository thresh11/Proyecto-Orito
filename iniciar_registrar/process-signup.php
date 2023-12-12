<?php 


if (empty($_POST["name"])) {
    die("Name is required");
}

if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if (strlen($_POST["password"]) < 4) {
    die("Password must be at least 4 characters");
}







$fecha= date("d/m/y");
$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database.php";
// $sql = "INSERT INTO user (name, email, password_hash) VALUES (?, ?, ?)";
$sql = "INSERT INTO usuarios (nombre, apellido ,telefono,correo,contraseña,fecha) VALUES (?, ?, ?,?,?,?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}
        
// $stmt->bind_param("sss", $_POST["name"],$_POST["email"],$password_hash);
$stmt->bind_param("ssisss", $_POST["name"],$_POST["last_name"],$_POST["cel"],$_POST["email"],$password_hash,$fecha);

                  
if ($stmt->execute()) {

    header("Location: signup-success.html");
    exit;
    
}else {
    
    if ($mysqli->errno === 1062) {
        die("email already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}














