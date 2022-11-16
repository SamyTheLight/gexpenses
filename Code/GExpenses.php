<?php
session_start();
include 'PHP/ConexionDB.php';
$registered = false;

var_dump($_POST);
if ((isset($_POST['buttonRegister']))) {
    

    $firstname = $_POST["username"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["contrasena"];


    $query = "INSERT INTO usuario (nombre,apellidos,email,contrasena) VALUES (:nombre,:apellidos,:email,:contrasena)";

    $consulta = $conexion->prepare($query);


    $consulta->bindParam(':nombre', $firstname);
    $consulta->bindParam(':apellidos', $lastname);
    $consulta->bindParam(':email', $email);
    $consulta->bindParam(':contrasena', $password);



    if ($consulta->execute()) {
        $registered = true;
        echo 'Datos guardados correctamente';
      
    } else {
        echo 'Error al subir los datos';
    };
} else if ((isset($_POST['buttonLogin']))) {


    $nameuserL = $_POST['usernameLogin'];
    $passwordL = $_POST['passwordLogin'];


    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $queryLogin = $conexion->prepare("SELECT * FROM usuario WHERE nombre = :nombreUser and 
    contrasena = :passwordUser");

    $queryLogin->bindParam(":nombreUser", $nameuserL);
    $queryLogin->bindParam(":passwordUser", $passwordL);


    $queryLogin->execute();

    $user = $queryLogin->fetch(PDO::FETCH_ASSOC);



    if ($user) {
        $_SESSION['usuario'] = $user['nombre'];
        header("location: PHP/Home.php");
    } else {
        echo '
    <script>
        alert("Usuario no existe,por favor verifique los datos introducidos");
        window.location = "../GExpenses.php";
    </script>
    
';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="GExpenses.css">
    <link rel="stylesheet" href="PHP/footer.css">
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


            <form action="" class="form_block formulari-login " method="POST">
                <h2>Iniciar Sesión</h2><br>
                <input type="text" placeholder="Nombre de Usuario" class="input-nameuser-login" name="usernameLogin">
                <input placeholder="Password" type="password" class="input-password-login" placeholder="Password" name="passwordLogin">
                <button id="buttonLogin" name="buttonLogin" value="1">
                    <h3>Login</h3>
                </button>
            </form>



            <form action="" class="form_block formulari-register" method="POST">
                <?php
                if ($registered) {
                ?>
                    <div class="alert success" id="has_registered">
                        <p>Se ha registrado correctamente</p>
                    </div>

                <?php
                }
                ?>
                <h2>Registrate</h2>
                <input type="text" placeholder="Nombre de Usuario" class="input-nameuser-register" name="username">
                <input type="text" placeholder="Apellidos" class="input-lastname-register" name="lastname">
                <input type="text" placeholder="Correo electrónico" class="input-mail-register" name="email">
                <input type="password" placeholder="Contraseña" class="input-password-register" name="contrasena">
                <button id="buttonRegister" name="buttonRegister" value="1">
                    <h3>Registrar</h3>
                </button>

            </form>

        </div>

    </div>
    


    <script src="GExpenses.js"></script>




</body>

</html>

<?php

include 'PHP/footer.php';
?>