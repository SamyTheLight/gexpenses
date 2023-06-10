<?php
session_start();
include 'nav.php';
include 'conexion_db.php';
include 'Repositories/DeudorRepository.php';
include 'Repositories/ActividadRepository.php';
include 'Repositories/GastoRepository.php';
include 'Repositories/AdscritoRepository.php';

//página para mostrar los detalles de un gasto con sus deudores

if (isset($_GET['id_gasto']) && isset($_GET['id_actividad'])) {
    $id_gasto = $_GET['id_gasto'];
    $id_actividad = $_GET['id_actividad'];
}

$act_repo = new ActividadRepository($conexion);
$gasto_repo = new GastoRepository($conexion);
$deudor_repo = new DeudorRepository($conexion);
$adscrito_repo = new AdscritoRepository($conexion);

$deudores = $deudor_repo->getListaDetallesDeudor($id_gasto);
echo "<script type='text/javascript'>console.log('" . json_encode($deudores) . "');</script>";

$actividad = $act_repo->consultarActividad($id_actividad);
echo "<script type='text/javascript'>console.log('" . json_encode($actividad) . "');</script>";
$gasto = $gasto_repo->consultarGasto($id_gasto);
echo "<script type='text/javascript'>console.log('" . json_encode($gasto) . "');</script>";

$pagador = $adscrito_repo->consultarAdscrito($gasto->pagador);
echo "<script type='text/javascript'>console.log('" . json_encode($pagador) . "');</script>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/detalle_gasto.css">
    <title>Detalle gasto</title>
</head>

<body>

    <div id="form-act">
        <section class="cantact_info">
            <section class="info_title">
                <h2>DETALLE GASTO</h2>
                <section class="info_items">
                    <p>Aquí puedes ver la información del reparto creado</p>
                </section>
            </section>
        </section>

        <div id="act-form">
            <h2>Concepto: <?php echo  $gasto->concepto; ?></h2>
            <div class=" user_info">
                <label for="names">Pagador: <?php echo $pagador->nombre_adscrito; ?></label>


                <label for="description">Miembros: </label>


                <!-- Aqui mostrar todos los adscritos -->
                <div id="contenedor-miembros">
                    <?php foreach ($deudores as $deudor) : ?>
                        <label for="tipusAct" id="nombre"><?php echo  $deudor->nombre_adscrito; ?></label>
                        <label for="tipusAct" id="nombre">Importe : <?php echo  $deudor->cantidad_deuda; ?></label>
                    <?php endforeach; ?>
                </div>

                <a class="btn-card" name="enviarActivitat2" href="detalle_actividad.php?id_actividad=<?php echo $id_actividad; ?>">Volver</a>
            </div>
        </div>
    </div>



</body>

<?php
include 'footer.php';
?>

</html>