<?php
// Importamos los modelos necesarios
require_once("../../modules/database/database.php");
require_once("user.model.php");

// Inicializamos la variable que usaremos para mostrar mensajes en caso de algún error
$msg = "";

// Si nos están enviando el formulario...
if (isset($_POST["user"])) {
    // Obtenemos el nombre de usuario y contraseña
    $usuario = $_POST["user"];
    $password = $_POST["password"];

    // Nos conectamos a la base de datos
    $db = new Database();
    $user = new User($db->getConnection());

    // Y llamamos al método login para iniciar sesión
    if ($user->login($usuario, $password)) {
        // Login correcto, iniciamos sesión
        session_start();
        // Guardamos la variable de sesión username
        // que utilizaremos posteriormente para comprobar que haya un usuario logueado
        $_SESSION["username"] = $usuario;
        // Finalmente redirigimos a la página de administración
        header("Location: ../../admin.php");
    } else {
        // Login incorrecto, guardamos el mensaje de error a mostrar más abajo
        $msg = "Usuario y/o contraseña incorrectos.";
    }
}

?>

<!-- Encabezado de página -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- JQuery -->
    <script src="../../vendor/js/jquery-3.6.3.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../vendor/fontawesome/css/all.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../../vendor/css/bootstrap.min.css">
    <script src="../../vendor/js/bootstrap.bundle.min.js"></script>
    <!-- Mis estilos -->
    <link rel="stylesheet" href="user.css">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="../../favicon.png">
    <!-- Título de la página -->
    <title>Transylvania - Login</title>
</head>

<body>
    <!-- Header -->
    <header>
        <nav class="navbar navbar-expand-xxxl">
            <!-- Botón para ir al index -->
            <div class="nav-link">
                <a href="../../index.php"><i class="fa-solid fa-house"></i></a>
            </div>
            <!-- Logo -->
            <div class="d-flex">
                <span>Panel de Aministración</span>
            </div>
        </nav>
    </header>

    <!-- Contenido de la página -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <!-- Título del formulario -->
                    <h2 class="section-title">Inicia sesión</h2>
                    <!-- Formulario de inicio de sesión -->
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="user" class="form-label">Nombre de usuario</label>
                            <input type="text" class="form-control" name="user" placeholder="Nombre de usuario" required
                                autofocus>
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                        <!-- Mostramos el mensaje de error, si lo hubiera, si no estaría vacío "" -->
                        <div class="form-group">
                            <p class='error-text'>
                                <?php echo $msg; ?>
                            </p>
                        </div>
                        <div class="form-group">
                            <button type="submit" value="Login" class="btn btn-danger">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!--Pie de página-->
    <footer class="footer fixed-bottom">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <!--Copyright-->
                    <p>&copy; 2023 Jessmann</p>
                    <!--Email-->
                    <p><a href="mailto: servicios@jessmann.com" class="mail"><i class="fas fa-envelope"></i>
                            servicios@jessmann.com</a></p>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>