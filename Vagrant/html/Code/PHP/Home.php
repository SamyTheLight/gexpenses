<?php
session_start();
include 'nav.php';
//Obtiene el id del usuario que ha iniciado sesion
$sessionUserId = $_SESSION['id_usuario'];
include 'ConexionDB.php';
include 'user_is_logued.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Consulta para recuperar todas las actividades del usuario logueado (por id) de la base de datos
$query = "SELECT * FROM actividad
          INNER JOIN invitacion ON id_actividad = actividad_id_actividad
          WHERE usuario_id_usuario='" . $_SESSION['id_usuario'] . "' ORDER BY actividad.fecha DESC";

$stmt = $conexion->query($query);
$registros = $stmt->fetchAll(PDO::FETCH_OBJ);

//Si el formulario "enviarActividad" se ha enviado...
if ((isset($_POST['enviarActivitat']))) {

    if ((!empty($_POST['nomActivitat'])) && (!empty($_POST['descripcionActivitat']))) {

        //Obtenemos los valores del formulario 
        $nombreA = $_POST["nomActivitat"];
        $descripcioActivitat = $_POST["descripcionActivitat"];
        $tipusDivisa = $_POST["divisa"];
        $tiposActivitat = $_POST["tipusActivitat"];

        //Insertamos una nueva actividad a la BD
        $queryActividad = "INSERT INTO actividad (nombre, descripcion, divisa, fecha, tipo_actividad)
                           SELECT :nombreA, :descripcionA, :divisaA, :fechaA, :tipo_actividadA
                           FROM usuario
                           INNER JOIN invitacion ON usuario.id_usuario = invitacion.usuario_id_usuario
                           WHERE usuario.id_usuario = :userIdA";
        $consultaActividad = $conexion->prepare($queryActividad);
        $consultaActividad->bindParam(':nombreA', $nombreA);
        $consultaActividad->bindParam(':descripcionA', $descripcioActivitat);
        $consultaActividad->bindParam(':divisaA', $tipusDivisa);
        $consultaActividad->bindParam(':tipo_actividadA', $tiposActivitat);
        $consultaActividad->bindParam(':userIdA', $sessionUserId);

        if ($consultaActividad->execute()) {
            echo 'Envio bien';
            Header("Location: Invitaciones.php");
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/Home.css">
    <title>Home</title>
</head>

<body>
    <!-- POPUP -->
    <div class="act-card">
        <div class="btn-form">
            <button id="form-btn" class="form-btn">AÑADIR</button>
            <button name="asc" id="btn-ordenar">ASC</button>
        </div>
        <?php
        $btn = $_POST['asc'];
        var_dump($btn);
        if ((isset($_POST['asc']))) {
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
                    <?php
                        /*$tiposActivitat = $_POST["tipusActivitat"];
                        $queryEmail = $conexion->prepare("SELECT TipusAct FROM activitat ");

                        $queryEmail->bindParam(":tiposA", $tiposActivitat);
            
                        $queryEmail->execute();
                        $user = $queryLogin->fetch(PDO::FETCH_ASSOC);*/
                        ?>
                    <img src="Images/Viaje_Combinado.png" alt="">
                    <h3><?php echo strtoupper($row->Nombre) ?></h3>
                </div>
                <div class="face back">
                    <h1><?php echo strtoupper($row->Nombre) ?></h1>
                    <hr>
                    <p id="description"><?php echo $row->Descripcion ?></p>
                    <p class="divisa"><b>Divisa: </b><?php echo $row->Divisa ?></p>
                    <div class="link"><a href="detallActivitat.php"><b>DETAILS</b></a>
                    </div>
                </div>

            </div>
            <?php endforeach; ?>
        </div>

    </div>

</body>
<script src="../Scripts/Home.js"></script>

</html>
<?php

include 'footer.php';
?>