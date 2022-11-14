<?php
session_start();
include 'nav.php'





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida</title>
</head>
<body>


   <h1><?php echo "<h1>Bienvenido - " .$_SESSION['usuario']."</h1>";?></h1>
    <a href="login/cerrar_sesion.php">Cerrar sesión</a>

    <div class="Card">

    
    </div>
</body>

</html>



<?php

include 'footer.php';
?>