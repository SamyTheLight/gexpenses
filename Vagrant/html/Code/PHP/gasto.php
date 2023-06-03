<?php
session_start();
include 'nav.php';
include 'conexion_db.php';
include 'Repositories/GastoRepository.php';
include 'Repositories/AdscritoRepository.php';
include 'Repositories/RepartoRepository.php';


if (isset($_GET['actividad_id_actividad'])) {
    $actividad_id_actividad = $_GET["actividad_id_actividad"];
    var_dump("actividad_id_actividad");
}

$adscrito_repository = new AdscritoRepository($conexion);
$adscritos = $adscrito_repository->listarAdscrito($actividad_id_actividad);

echo "<script type='text/javascript'>console.log('POST data: " . json_encode($adscritos) . "');</script>";


//TODO del POST obtener los ID de los deudores -> lógica para insertar el gasto
if (isset($_POST['id_deudor'])) {
    $ids = $_POST['id_deudor'];
    //habría que comprobar si los ids son correctos

    //código para mostrar por consola
    echo "<script type='text/javascript'>console.log('POST data: " . json_encode($deudores) . "');</script>";
    var_dump("actividad_id_actividad");
    $concepto = $_POST["concepto"];
    var_dump("concepto");
    $pagador = $_POST["pagador"];
    var_dump("pagador");
    $cantidad = $_POST["import"];
    var_dump("import");

    $gasto_repository = new GastoRepository($conexion);
    $id_gasto = $gasto_repository->insertarGasto($actividad_id_actividad, $concepto, $pagador, $cantidad);

    // insertar en tabla deudores
    $deudor_repository = new DeudorRepository($conexion);
    foreach ($ids as $id_adscrito) {
        $deudor_repository->insertarDeudor($id_adscrito, $id_gasto);
    }

    header("Location: reparto.php?id_gasto=" . urlencode($id_gasto));
}


echo "<script type='text/javascript'>console.log('SERVER');</script>";
//código para desarrollo para saber qué hay en un POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<script type='text/javascript'>console.log('POST data: " . json_encode($_POST) . "');</script>";
}

if ((isset($_POST['enviarActivitat2']))) {

    if ((!empty($_POST['concepto'])) && (!empty($_POST['import']))) {
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/gasto.css">
    <title>Gastos</title>
</head>

<body>
    <!-- POP UP ================ -->
    <div id="btn-form">

    </div>
    <div id="back-form1">
        <div id="form-act">
            <section class="cantact_info">
                <section class="info_title">
                    <h2>AÑADE UN PAGO</h2>
                    <section class="info_items">
                        <p>¡Añade un pago para poder gestionar tus deudas! </p>
                    </section>
                </section>
            </section>
            <form action="" id="act-form" method="POST">
                <h2>Actividad 3</h2>
                <div class=" user_info">
                    <label for="names">Concepto </label>
                    <input type="text" id="concepto" placeholder="Elige un concepto" class="form-control" name="concepto">

                    <label for="description">Importe</label>
                    <input type="number" placeholder="Elige un importe" class="form-control" id="importe" name="import">

                    //Aqui mostrar todos los adscritos
                    <label for="mensaje">Pagador</label>
                    <select name="pagador" id="divisa" class="pagadores">
                        <option selected disabled value="" class="pagador">Elige un pagador</option>
                        <?php foreach ($adscritos as $adscrito) { ?>
                            <option value=<?php echo $adscrito->id_adscrito; ?> class="pagador"><?php echo $adscrito->nombre_adscrito; ?></option>
                        <?php } ?>
                    </select>
                    //Aqui mostrar todos los adscritos
                    <label for="tipusAct">Miembros</label>
                    <?php foreach ($adscritos as $adscrito) { ?>
                        <label id="user" for=""><?php echo $adscrito->nombre_adscrito; ?>
                            <input type="checkbox" value="<?php echo $adscrito->id_adscrito; ?>" name="id_deudor[]" id="users" class="users">
                        </label>
                    <?php } ?>
                    <input type="hidden" name="actividad_id_actividad" value="<?php echo $actividad_id_actividad  ?>">
                    <button class="btn-card" name="enviarActivitat2">GUARDAR</button>
                </div>
            </form>
        </div>
</body>
<!-- <script src="../Scripts/gasto.js"></script> -->
<?php
include 'footer.php';
?>

</html>