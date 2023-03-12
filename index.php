<?php
require_once("config/app.php");
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
    <!--Bootstrap-->
    <script src="vendor/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="vendor/css/bootstrap.min.css">
    <!--Font Awesome-->
    <link rel="stylesheet" href="vendor/fontawesome/css/all.min.css">
    <!--Mis estilos-->
    <link rel="stylesheet" href="css/style.css">
    <!--Favicon-->
    <link rel="icon" type="image/png" href="favicon.png">
    <!--Título de la página-->
    <title><?=SITE_TITLE?></title>
</head>

<body>

    <?php
    // Módulo Nav
    require_once("modules/nav/nav.php");
    // Módulo Caroussel
    require_once("modules/carousel/carousel.php");
    // Módulo About
    require_once("modules/about/about.php");
    // Módulo Gallery
    require_once("modules/gallery/gallery.php");
    // Módulo Events
    require_once("modules/events/events.php");
    // Módulo Merchandising
    require_once("modules/merchandising/merchandising.php");
    // Módulo Contact
    require_once("modules/contact/contact.php");
    // Módulo Map
    require_once("modules/map/map.php");
    // Módulo Footer
    require_once("modules/footer/footer.php");
    ?>

</body>

</html>