<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="GExpenses.css">
    <title>Document</title>
</head>

<body>

    <div class="Card">

        <!-- 
        <div class="back-box">
            <div class="back-box-register">
                <h3>¿Aún no tienes cuenta?</h3>
                <p>Regístrate para que puedas iniciar sesión</p>
            </div>
            <div class="back-box-login">
                <h3>¿Ya tienes cuenta?</h3>
                <p>Inicia sesión para entrar en la página</p>
                <button id="BackBoxButtonLogin">Registrar</button>
            </div>
           
        </div>

-->

       <div class="data">
        <h4 id="titol-gexpenses">GExpenses</h4> 
            <div class="Login">
                <form action="PHP\login_usuario_be.php" class="formulari-login" method="POST">
                    <h2>Iniciar Sesión</h2><br>
                    <input type="text" placeholder="Nombre de Usuario" class="input-nameuser-login" name="usernameLogin">
                    <input placeholder="Password" class="input-password-login" placeholder="Password" name="passwordLogin">
                    <button id="buttonSingUp">Sign Up</button>
                </form>
            </div>

            <div class="Register">
                <form action="PHP\registerUser.php" class="formulari-register" method="POST">
                    <h2>Registrate</h2>
                    <input type="text" placeholder="Nombre de Usuario" class="input-nameuser-register" name="username">
                    <input type="text" placeholder="Apellidos" class="input-lastname-register"  name="lastname">
                    <input type="text" placeholder="Correo electrónico" class="input-mail-register" name="email">
                    <input type="password" placeholder="Contraseña" class="input-password-register" name="password">
                    <button id="buttonRegister">Register</button>

                </form>
            </div>
        </div>
    
    </div>



<script src="GExpenses.js"></script>




</body>

</html>