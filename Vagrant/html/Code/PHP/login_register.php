<?php
session_start();
include 'conexion_db.php';
include 'Repositories/SesionRepository.php';
include 'Repositories/UsuarioRepository.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$usuario_repository = new UsuarioRepository($conexion);

$registered = false;

function validarDadesFormulari($firstname, $email, $passwordReg, $valid)
{
    $password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,15}$/";
    if ((empty($firstname))) {
        $valid = false;
    }
    if (empty($email)) {
        $valid = false;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $valid = false;
    }

    if (empty($passwordReg)) {
        $valid = false;
    } else if (!preg_match($password_regex, $passwordReg)) {
        $valid = false;
    }

    return $valid;
}

if ((!empty($_POST['email']))) {


    $firstname = $_POST["username"];
    $passwordReg = $_POST["contrasena"];
    $email = $_POST["email"];

    $valid = true;

    $resultatvalidacio = validarDadesFormulari($firstname, $email, $passwordReg, $valid);

    if ($resultatvalidacio == true) {
        $hash_password = password_hash($passwordReg, PASSWORD_DEFAULT);

        $res = $usuario_repository->insertarUsuario($firstname, $hash_password, $email);

        if ($res <> false) {
            $registered = true;
        }
    }
}

if ((isset($_POST['buttonLogin']))) {

    $nameuserL = $_POST['usernameLogin'];

    $passwordL = $_POST['passwordLogin'];

    $user = $usuario_repository->consultarUsuarioPorNombre($nameuserL);

    if (password_verify($passwordL, $user->contrasena)) {
        $_SESSION['usuario'] = $nameuserL;
        $_SESSION['id_usuario'] = $user->id_usuario;

        //TODO insertar sesión
        $sesion_repository = new SesionRepository($conexion);
        $token = $sesion_repository->insertarSesion($_SESSION['id_usuario']);
        //TODO guardar id_usuario y token en $_SESSION
        $_SESSION['token'] = $token;

        header("location: PHP/home.php");
    } else {
        //TODO hacer algo con la falta de validación
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/login_registro.css">
    <title>Document</title>
</head>

<body>

    <div class="Card">

        <div class="back-box">

            <div class="back-box-login">
                <h3>¿Ya tienes cuenta?</h3>
                <p>Inicia sesión para entrar en la página</p>
                <button id="BackBoxButtonLogin">Login</button>
            </div>
            <div class="back-box-register">
                <h3>¿Aún no tienes cuenta?</h3>
                <p>Regístrate para que puedas iniciar sesión</p>
                <button id="BackBoxButtonRegister">Registrar</button>
            </div>

        </div>

        <div class="data">

            <form action="" class="form_block formulari-login" method="POST">
                <h2>Iniciar Sesión</h2><br>
                <input type="text" placeholder="Nombre de Usuario" class="input-nameuser-login" name="usernameLogin">
                <input placeholder="Password" type="password" class="input-password-login" placeholder="Password" name="passwordLogin">
                <button id="buttonLogin" name="buttonLogin" value="1">
                    <h3>Login</h3>
                </button>
            </form>

            <form action="" id="formRegistre" class="form_block formulari-register" method="POST">
                <h2>Regístrate</h2>
                <input type="text" placeholder="Nombre de Usuario" class="input-nameuser-register" id="input-nameuser-register" name="username">
                <input type="email" placeholder="Correo electrónico" class="input-mail-register" id="input-mail-register" name="email">
                <input type="password" placeholder="Contrasena" class="input-password2-register" id="input-password2-register" name="contrasena">

                <?php
                if ($registered) {
                ?>

                    <div class="alert-success" id="has_registered">
                        <p>Se ha registrado correctamente</p>
                    </div>

                    <style>
                        .alert-success {
                            text-align: center;
                            background-color: green;
                            color: white;
                            display: block;
                            border-radius: 20px;
                            margin-top: 20px;
                            font-size: 20px;
                        }
                    </style>
                <?php
                }
                ?>
                <button type="submit" id="buttonRegister" name="buttonRegister" value="1">
                    <h3>Registrar</h3>
                </button>

            </form>

        </div>

    </div>

    <script src="../Scripts/login_registro.js"></script>

</body>

</html>