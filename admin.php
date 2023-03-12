<?php

require_once("config/app.php");

session_start();

// Si no hay un usuario logueado redirigimos a la página de login
if (!isset($_SESSION["username"])) {
    header("Location: modules/user/user.login.php");
}

// Variable que indica a los distintos módulos
// que estamos en modo administración
$manage = true;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Jquery-->
    <script src="vendor/js/jquery-3.6.3.min.js"></script>
    <!--Popper.js-->
    <script src="vendor/js/popper.min.js"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="vendor/css/bootstrap.min.css">
    <script src="vendor/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="vendor/fontawesome/css/all.min.css">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="favicon.png">
    <!-- Título de la página -->
    <title>
        <?= SITE_TITLE ?> - Panel de Administración
    </title>
</head>

<body>
    <!-- Cabecera -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="nav-link" href="index.php">
                <a href="index.php"><i class="fa-solid fa-house"></i></a>
            </a>
            <span class="navbar-text">Panel de Administración</span>
            <div class="ml-auto">
                <a class='btn btn-danger' href='modules/user/user.logout.php' role='button'>
                    <i class='fa-solid fa-right-from-bracket'></i>
                    Logout
                </a>
            </div>
        </div>
    </nav>

    <!-- Contenido -->
    <div class="container" style="margin-top: 40px;">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="galeria-tab" data-toggle="tab" href="#galeria" role="tab"
                    aria-controls="galeria" aria-selected="true">Galería</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="eventos-tab" data-toggle="tab" href="#eventos" role="tab"
                    aria-controls="eventos" aria-selected="false">Eventos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="cuentas-tab" data-toggle="tab" href="#cuentas" role="tab"
                    aria-controls="cuentas" aria-selected="false">Cuenta</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <!-- Administración de la galería -->
            <?php require_once("modules/gallery/gallery.manage.php") ?>
            <!-- Administración de eventos -->
            <?php require_once("modules/events/events.manage.php") ?>
            <!-- Administración de usuarios -->
            <?php require_once("modules/user/user.manage.php") ?>
        </div>
    </div>

</body>

</html>