<?php
if (!isset($_SESSION)) {
    session_start();
}

include 'nav.php';
include 'conexion_db.php';
include 'Repositories/ActividadRepository.php';
include 'Repositories/AdscritoRepository.php';

// Obtener el id de la actividad si está presente en la URL
if (isset($_GET['actividad_id_actividad'])) {
    $actividad_id_actividad = $_GET["actividad_id_actividad"];
}

// Consultar la última actividad
$actividad_repository = new ActividadRepository($conexion);
$actividad = $actividad_repository->consultarActividad($actividad_id_actividad);

if(isset($_POST['nombre_adscritos'])) {
    $adscrito_repository = new AdscritoRepository($conexion);
    $nombres = $_POST['nombre_adscritos'];
    foreach($nombres as $nombre){
        $adscrito_repository->insertarAdscrito(null, $nombre, $actividad_id_actividad);
    }

    header('location:home.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invitaciones</title>
    <link rel="stylesheet" href="../Styles/invitacion.css">
</head>

<body>
    <form action="" id="act-form" method="POST">
        <div class="card">
            <img class="card-image" src="./Images/Viaje_Combinado.png">
            <div class="card-text">
                <h1><?php echo $actividad->nombre;
                        ?></h1>
                <hr>
                <div class="ex1">
                    <p id="description"><?php echo $actividad->descripcion;?></p>
                </div>
                <div class="afegir-mail" id="addAdscrito">
                    <input type="text" class="mails" name="nombre" id="nombre" placeholder="NOMBRE">
                    <div class="btn-email" id="btn-adscrito">+</div>
                </div>
                <hr>
                <div class="emails" id="emails">
                    <h3 id="title-emails">¡AÑADE PARTICIPANTES A LA ACTIVIDAD!</h3>
                </div>
            </div>
            <div class="card-stats">
                <button type="submit" class="btn-enviar" name="submit" id="btn-enviar">ENVIAR</button>
            </div>
        </div>
    </form>

</body>
<script src="../Scripts/invitacion.js"></script>

</html>
<?php

include 'footer.php';
?>