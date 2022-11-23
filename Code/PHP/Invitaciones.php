<?php
session_start();
include 'nav.php';

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
    <div class="form-target">
        <h1>Nombre Actividad</h1>
        <label class="label-description">Descripción Actividad</label>
        <table id="invitaciones-table">
        </table>
        <button class="btn-email">+</button>
        <button class="btn-enviar">ENVIAR</button>
    </div>

</body>
<script src=" Invitaciones.js"></script>

</html>
<?php

include 'footer.php';
?>