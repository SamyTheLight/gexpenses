<?php
session_start();
//include 'nav.php';

include 'ConexionDB.php';

var_dump($_POST['btn-enviar']);

if(isset($_POST['btn-enviar'])){

    var_dump($_POST['btn-enviar']);
    $emailE=$_POST['enviarCorreo'];

    var_dump($emailE);

    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $queryEmail = $conexion->prepare("SELECT email FROM invitacio WHERE email = :emailP ");


    $queryEmail->bindParam(":emailP", $emailE);
    

    $queryEmail->execute();

    $trobat = $queryEmail->fetch(PDO::FETCH_ASSOC);

    if(!$trobat){
        include 'sendMailRegister.php';
    }else{
       include 'sendMailVerify.php';
    }

}

//include 'ConexionDB.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invitaciones</title>
    <link rel="stylesheet" href="Invitaciones.css">
</head>

<body>
<form action="" id="act-form" method="POST">
    <div class="form-target">
        <h1>Nombre Actividad</h1>
        <label class="label-description">Descripción Actividad</label>
        <table id="invitaciones-table">
        </table>
        <button class="btn-email">+</button>
        <input name="enviarCorreo" id="enviarCorreo">
        <button class="btn-enviar" name="btn-enviar" id="btn-enviar">ENVIAR</button>
    </div>
</form>
</body>
<!-- <script src=" Invitaciones.js"></script> -->

</html>
<?php

include 'footer.php';
?>