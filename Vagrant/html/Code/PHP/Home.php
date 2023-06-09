<?php
session_start();
include 'nav.php';
include 'conexion_db.php';
include 'user_is_logued.php';
include 'Repositories/ActividadRepository.php';
include 'Repositories/SesionRepository.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//TODO antes de hacer ninguna otra cosa, comprobar la sesión
$sesion_repository = new SesionRepository($conexion);
$res = $sesion_repository->consultarSesion($_SESSION['token'], $_SESSION['id_usuario']);
if($res == false) {
    $_SESSION['token'] = null;
    $_SESSION['id_usuario'] = null;
    header("location: ../index.php");
}

//Crear instancia clase ActividadRepository
$actividadRepository = new ActividadRepository($conexion);

// Llamar a la función insertarActividad si se ha enviado el formulario
if ((isset($_POST['enviarActivitat']))) {
    if ((!empty($_POST['nomActivitat'])) && (!empty($_POST['descripcionActivitat']))) {
        $nombreActividad = $_POST["nomActivitat"];
        $descripcioActivitat = $_POST["descripcionActivitat"];
        $tipoDivisa = $_POST["divisa"];
        $tipoActividad = $_POST["tipusActivitat"];

        $id_actividad = $actividadRepository->insertarActividad($nombreActividad, $descripcioActivitat, $tipoDivisa, $tipoActividad, $_SESSION['id_usuario']);
        if ($id_actividad <> 0) {
            echo 'Envio bien';
            Header("Location: invitacion.php?actividad_id_actividad=" . $id_actividad);
            exit();
        }
    }
}

$sort_fecha = "creacion";
// Obtener lista de actividades
if ($_GET['sort_fecha']){
    $sort_fecha = $_GET['sort_fecha'];
}

$registros = $actividadRepository->listarActividades($_SESSION['id_usuario'], $sort_fecha);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/home.css">
    <title>Home</title>
</head>

<body>
    <!-- POPUP -->
    <div class="act-card">
        <div class="btn-form">
            <button id="form-btn" class="form-btn">AÑADIR</button>
            <button name="fecha" id="btn-ordenar-fecha" class="form-btn">ORDENAR FECHA</button>
            <button name="modificacion" id="btn-ordenar-modificacion" class="form-btn">ORDENAR MODIFICACIÓN</button>
        </div>
        <?php        
        if ((isset($_POST['asc']))) {
            $btn = $_POST['asc'];
            var_dump($btn);
            $queryasc = "SELECT * FROM actividad ORDER BY fecha ASC";
            $stmt = $conexion->query($queryasc);
            $ordena = $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        ?>
        <!-- CARDS DE LES ACTIVITATS -->
        <div id="act-list">
            <?php foreach ($registros as $row) : ?>
            <div class="card">
            <div class="face front">
                    <img src="Images/Viaje_Combinado.png" alt="">
                    
                    <h3><?php echo strtoupper($row->nombre) ?></h3>
                </div>
                <div class="face back">
                    <h1><?php echo strtoupper($row->nombre) ?></h1>
                    <p id="description"><?php echo $row->descripcion ?></p>
                    <p class="divisa"><b>Divisa: </b><?php echo $row->divisa ?></p>
                    <div class="link"><a href="detalle_actividad.php?id_actividad=<?php echo $row->id_actividad?>"><b>DETAILS</b></a></div>
                </div>

            </div>
            <?php endforeach; ?>
        </div>

    </div>

</body>
<script src="../Scripts/home.js"></script>

</html>
<?php

include 'footer.php';
?>