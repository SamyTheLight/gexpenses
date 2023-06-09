<?php
session_start();
include 'nav.php';
include 'conexion_db.php';
include 'Repositories/DeudorRepository.php';
include 'Repositories/AdscritoRepository.php';
include 'Repositories/GastoRepository.php';
include 'Repositories/RepartoRepository.php';
include 'Repositories/SesionRepository.php';

//TODO antes de hacer ninguna otra cosa, comprobar la sesión
$sesion_repository = new SesionRepository($conexion);
$res = $sesion_repository->consultarSesion($_SESSION['token'], $_SESSION['id_usuario']);
if($res == false) {
    $_SESSION['token'] = null;
    $_SESSION['id_usuario'] = null;
    header("location: ../index.php");
}

$adscrito_repository = new AdscritoRepository($conexion);
$deudor_repository = new DeudorRepository($conexion);
$gasto_repository = new GastoRepository($conexion);
$reparto_repository = new RepartoRepository($conexion);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['deuda']) && isset($_POST['id_adscrito']) && isset($_POST['id_gasto'])) {
        //TODO añadir a base de datos las deudas de los deudores una a una
        $deudas = $_POST['deuda'];
        $adscritos = $_POST['id_adscrito'];
        $id_gasto = $_POST['id_gasto'];

        $longitud = count($deudas);
        for($i = 0; $i <$longitud; $i++) 
        {
            $deudor_repository->updateDeudor($id_gasto, $adscritos[$i], $deudas[$i]);
        }

        //después de hacer los update, no vamos a detalle actividad.
        //necesitamos el id_actividad
        $gasto=$gasto_repository->consultarGasto($id_gasto);
        header("location:detalle_actividad.php?id_actividad=" . $gasto->actividad_id_actividad);
        
    }
}

if (isset($_GET['id_gasto'])) {
    $id_gasto = $_GET['id_gasto'];
    var_dump("id_gasto");
}

//obtener los detalles del gasto
$gasto = $gasto_repository->consultarGasto($id_gasto);

$lista_deudores = $deudor_repository->listarDeudor($id_gasto);

$deudores = array();

foreach ($lista_deudores as $deudor) {
    echo "<script type='text/javascript'>console.log('dentro del foreach');</script>";
    $adscrito = $adscrito_repository->consultarAdscrito($deudor->adscrito_id_adscrito);
    echo "<script type='text/javascript'>console.log('adscrito: " . json_encode($adscrito) . "');</script>";
    $deudores[] = $adscrito;
}
echo "<script type='text/javascript'>console.log('deudores: " . json_encode($deudores) . "');</script>";

$deuda_a_repartir = $gasto->cantidad;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/gasto.css">
    <title>gasto</title>
</head>

<body>
    <div id="back-form1">
        <div id="form-act1">
            <section class="cantact_info1">
                <section class="info_title1">
                    <h2>REPARTE TUS GASTOS</h2>
                    <section class="info_items1">
                        <p>¡Reparte el gasto con tus amigos! </p>
                    </section>
                </section>
            </section>
            <form action="" id="act-form1" method="POST">
                <button id="btn-cerrar1">X</button>
                <div id="form-pay1">
                    <label for="tipusAct1">Tipo de pago: </label>
                    <select name="tipusActivitat" id="tipusActivitat1" class="form-control1">
                        <option value="" selected disabled>Selecciona un pago</option>
                        <option value="Pago básico">Pago básico</option>
                        <option value="Pago avanzado por importe">Pago avanzado por importe</option>
                        <option value="Pago avanzado por proporciones">Pago avanzado por proporciones</option>
                    </select>
                </div>
                <div id="reparto" class="oculto">
                    <div class="pago-total">
                        <label for="" class="despesa_total">Pago total: </label>
                        <input type="number" value="<?php echo $deuda_a_repartir; ?>" id="despesaTotal" name="despesaTotal" readOnly=true>
                    </div>
                    <div class="pago-total">
                        <label for="" class="despesa_total">Total a repartir: </label>
                        <input type="number" value="<?php echo $deuda_a_repartir; ?>" id="despesa_a_repartir" name="despesa_a_repartir" readOnly=true>
                    </div>
                    <input type="hidden" value=<?php echo $id_gasto ?> id="id_gasto" name="id_gasto">
                    <hr>

                    <div class="pago-individual">
                        <?php foreach ($deudores as $deudor) : ?>
                            <label for="" id="nombre"><?php echo  $deudor->nombre_adscrito; ?></label>
                            <input type="number" value=0 id="deuda" name="deuda[]" readOnly=true><br>
                            <input type="hidden" id="id_adscrito" value="<?php echo $deudor->id_adscrito; ?>" name="id_adscrito[]">
                        <?php endforeach; ?>
                    </div>
                </div>
                <button class="btn-card1" id="afegirActivitat1">SELECCIONAR</button>
                <button class="btn-card2" id="aceptar">ACEPTAR</button>
        </div>
        </form>
    </div>

</body>
<script src="../Scripts/reparto.js"></script>
<?php
include 'footer.php';
?>

</html>