<?php
session_start();
include 'nav.php';
include 'conexion_db.php';
include 'Repositories/GastoRepository.php';
include 'Repositories/ActividadRepository.php';
include 'Repositories/SesionRepository.php';
include 'Repositories/AdscritoRepository.php';

//TODO antes de hacer ninguna otra cosa, comprobar la sesión
$sesion_repository = new SesionRepository($conexion);
$res = $sesion_repository->consultarSesion($_SESSION['token'], $_SESSION['id_usuario']);
if($res == false) {
    $_SESSION['token'] = null;
    $_SESSION['id_usuario'] = null;
    header("location: ../index.php");
}

if (isset($_GET['id_actividad'])) {
    $id_actividad = $_GET['id_actividad'];
}

//Consulta para seleccionar la fecha de la actividad del usuario


$gasto_repository = new GastoRepository($conexion);
$gastos = $gasto_repository->listarGasto($id_actividad);

$sumatorio_gastos = 0;
foreach ($gastos as $g) :
    $sumatorio_gastos += ($g->cantidad);
endforeach;

$adscritoRepository = new AdscritoRepository($conexion);
$adscritos = $adscritoRepository->listarAdscrito($id_actividad);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../Styles/detalle_actividad.css">
    <title>Detall Activitat</title>
</head>

<body>
    <div class="details">
        <div class="activityDetails">
            <div class="date">
                <h3><?php echo $registros[0]->Fecha; ?></h3>
            </div>
            <div class="buttonPayment">
                <!-- TODO cambiar el botón por un link al que se le puede pasar una variable como en el caso del link DETAILS de home-->
                <!-- <button id="btn-gasto">Añadir Gasto +</button> -->
                <button id="btn-gasto" class="link"><a href="gasto.php?actividad_id_actividad=<?php echo $id_actividad?>"><b>Añadir Gasto +</b></a></button>
            </div>
            <div class="import">
                <h3><?php echo $sumatorio_gastos; ?></h3>
            </div>
            <div class="members">
                <?php foreach ($adscritos as $adscrito) : ?>
                    <div class="member">
                        <span class="material-icons">person</span>
                        <span class="adscrito"><?php echo $adscrito->nombre_adscrito; ?></span>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="paymentsList">
                <table class="registros">
                    <tr id="rows">
                        <th class="concepto1"><b>Concepto</b></th>
                        <th class="cantidad1"><b>Repartir</b></th>
                        <th class="cantidad1"><b>Cantidad</b></th>
                        <th class="pagador1"><b>Pagador</b></th>
                    </tr>
                    <?php foreach ($gastos as $g) : ?>
                        <tr>
                            <th class="concepto"><?php echo ($g->concepto) ?></th>
                            <th class="cantidad"><a href="reparto.php?id_gasto=" <?php echo $g->id_gasto; ?>>Repartir gasto</a></th>
                            <th class="cantidad"><?php echo $g->cantidad ?></th>
                            <th class="pagador"><?php echo $g->pagador ?></th>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</body>
<script src="../Scripts/detalle_actividad.js"></script>
<?php
include 'footer.php';
?>

</html>