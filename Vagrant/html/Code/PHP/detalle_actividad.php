<?php
session_start();
include 'nav.php';
include 'conexion_db.php';
include 'Repositories/GastoRepository.php';
include 'Repositories/ActividadRepository.php';

if(isset($_GET['id_actividad'])){
    $id_actividad = $_GET['id_actividad'];
}

//Consulta para seleccionar la fecha de la actividad del usuario
// TODO Cambiar por ActividadRepository consultarActividad
$actividadRepository = new ActividadRepository($conexion);
// $registros = $actividadRepository->consultarActividad($id_actividad);


//TODO usar el GastoRepository con el ListarGasto

$queryPago1 = $conexion->prepare("SELECT id_gasto, concepto,pagador,cantidad FROM gasto WHERE actividad_id_actividad = $id_actividad ORDER BY fecha DESC ");
$queryPago1->execute();
$registros11 = $queryPago1->fetchAll(PDO::FETCH_OBJ);
$queryImporte = $conexion->prepare("SELECT cantidad FROM gasto");
$queryImporte->execute();
$registroImporte = $queryImporte->fetchAll(PDO::FETCH_OBJ);

$resultado = 0;
foreach ($registroImporte as $rowImportes) :
    $resultado += ($rowImportes->cantidad);
endforeach;
// ?>

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
                <button id="btn-gasto">Añadir Gasto +</button>
            </div>
            <div class="import">
                <h3><?php echo $resultado; ?></h3>
            </div>
            <div class="members">
                <span class="material-icons">person</span>
                    <span class="material-icons">person</span>
                        <span class="material-icons">person</span>
                        <?php
                        if (isset($_GET['aceptat'])) {
                        ?>
                        <?php
                        if ($_GET['aceptat'] === '1') {
                        ?>
                        <span class="material-icons">person</span>
                        <?php
                        }
                        ?>
                        <?php
                        }
                        ?>
            </div>

            <div class="paymentsList">
                <table class="registros">
                    <tr id="rows">
                        <th class="concepto1"><b>Concepto</b></th>
                        <th class="cantidad1"><b>Repartir</b></th>
                        <th class="cantidad1"><b>Cantidad</b></th>
                        <th class="pagador1"><b>Pagador</b></th>
                    </tr>
                    <?php foreach ($registros11 as $rowPago) : ?>
                    <tr>                        
                        <th class="concepto"><?php echo ($rowPago->concepto) ?></th>
                        <th class="cantidad"><a href="reparto.php?id_gasto="<?php echo $rowPago->id_gasto; ?>>Repartir gasto</a></th>
                        <th class="cantidad"><?php echo $rowPago->cantidad ?></th>
                        <th class="pagador"><?php echo $rowPago->pagador ?></th>
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