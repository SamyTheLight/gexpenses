<?php
session_start();
include 'nav.php';
include 'conexion_db.php';
include 'user_is_logued.php';
include 'Repositories/ActividadRepository.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Crear instancia clase ActividadRepository
$actividadRepository = new ActividadRepository($conexion);

// Llamar a la función insertarActividad si se ha enviado el formulario
if ((isset($_POST['enviarActivitat']))) {
    if ((!empty($_POST['nomActivitat'])) && (!empty($_POST['descripcionActivitat']))) {
        $nombreActividad = $_POST["nomActivitat"];
        $descripcioActivitat = $_POST["descripcionActivitat"];
        $tipoDivisa = $_POST["divisa"];
        $tipoActividad = $_POST["tipusActivitat"];

        if ($actividadRepository->insertarActividad($nombreActividad, $descripcioActivitat, $tipoDivisa, $tipoActividad, $_SESSION['id_usuario'])) {
            echo 'Envio bien';
            Header("Location: invitacion.php");
            exit();
        }
    }
}

// Obtener lista de actividades
$registros = $actividadRepository->listarActividades($_SESSION['id_usuario']);

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
            <button name="asc" id="btn-ordenar">ASC</button>
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
                    <?php
                        /*$tiposActivitat = $_POST["tipusActivitat"];
                        $queryEmail = $conexion->prepare("SELECT TipusAct FROM activitat ");

                        $queryEmail->bindParam(":tiposA", $tiposActivitat);
            
                        $queryEmail->execute();
                        $user = $queryLogin->fetch(PDO::FETCH_ASSOC);*/
                        ?>
                    <img src="Images/Viaje_Combinado.png" alt="">
                    
                    <h3><?php echo strtoupper($row->nombre) ?></h3>
                </div>
                <div class="face back">
                    <h1><?php echo strtoupper($row->nombre) ?></h1>
                    <p id="description"><?php echo $row->descripcion ?></p>
                    <p class="divisa"><b>Divisa: </b><?php echo $row->divisa ?></p>
                    <div class="link"><a href="detalle_actividad.php?id_actividad=<?php echo $row->id_actividad?>"><b>DETAILS</b></a>
                    </div>
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