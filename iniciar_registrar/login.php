<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/database.php";
    
    // $sql = sprintf("SELECT * FROM user WHERE email = '%s'", $mysqli->real_escape_string($_POST["email"]));
    $sql = sprintf("SELECT * FROM usuarios WHERE correo = '%s'", $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        // if (password_verify($_POST["password"], $user["password_hash"])) {
            if (password_verify($_POST["password"], $user["contraseña"])) {
            
            session_start();
            
            session_regenerate_id();
            
            // $_SESSION["user_id"] = $user["id"];
            $_SESSION["user_id"] = $user["id"];
            
            // header("Location: index.php");
            header("Location: ../inicio/inicio.php");
            exit;
        }
    }
    
    $is_invalid = true;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"> -->
    <link rel="stylesheet" href="estilos_inicio_sesion.css">
    
</head>
<body>
    <body class="body_register_iniciar">
    <section class="contenedor_register_iniciar">
        <div>
        <div class="logoo">
            <a href="../inicio/inicio.php"><img src="../img/logo_pnj.png" alt="logo" class="logo"></a>
        </div> 
        <div class="cabeza_registrar">
                <h1 class="register_iniciar_sesion">Iniciar Sesión</h1>
            </div>

                    <?php if ($is_invalid): ?>
                        <div class="error_iniciar_session">
                        <em>correo y/o contraseña incorrecto</em>
                        </div>
                       
                    <?php endif; ?>

                    <form method="post" class="form">
                    <div class="form_section">
                    <label for="email">Correo</label>
                        <input type="email" name="email" id="email" placeholder="Ingrese su correo electronico" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
                    </div>
                        
                    <div class="form_section">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Ingrese su contraseña">
                    </div>

                        
                        <button>Iniciar Sesión</button>
                        <p class="pregunta">¿No tienes cuenta?<span><a href="signup.html" class="sub_pregunta">Registrar</a></span></p>
                    <!-- </div> -->
                    </form>     
                
        </div>
    </section>
    
</body>
</html>








