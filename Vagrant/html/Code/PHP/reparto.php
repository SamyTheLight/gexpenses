<?php
session_start();
include 'nav.php';
include 'conexion_db.php';

if (isset($_GET['id_gasto'])) {
    $id_gasto = $_GET['id_gasto'];
    var_dump("id_gasto");
}

//TODO Obtener de la tabla deudores, los ids (adscrito_id_adscrito) de los deudores de este gasto
//Obtener de adscritos los datos de los deudores

//código para desarrollo para saber qué hay en un POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<script type='text/javascript'>console.log('POST data: " . json_encode($_POST) . "');</script>";
}

if (isset($_POST['']) && isset($_POST[''])) {
    // hacer un update id deudor (que es en realidad adscrito_id_adscrito), id_gasto, deuda
}

$deudores = array(
    array(
        'id_adscrito' => 1,
        'nombre' => 'Oscar'
    ),
    array(
        'id_adscrito' => 2,
        'nombre' => 'Joan'
    ),
    array(
        'id_adscrito' => 3,
        'nombre' => 'Samuel'
    )
);

$deuda_a_repartir = 100;

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
                        <option value="Pago avanzado">Pago avanzado</option>
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
                            <label for="" id="id_adscrito"><?php echo $deudor['id_adscrito'] ?></label>
                            <label for="" id="nombre"><?php echo  $deudor['nombre']; ?></label>
                            <input type="number" value=0 id="deuda" name="deuda[]" readOnly=true><br>
                            <input type="hidden" value=<?php echo $deudor['id_adscrito'] ?> id="deuda" name="id_deudor[]">
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