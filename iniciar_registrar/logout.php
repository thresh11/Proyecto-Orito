<?php

session_start();

session_destroy();

header("Location: ../inicio/inicio.php");
exit;