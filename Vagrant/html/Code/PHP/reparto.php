<?php
session_start();
include 'nav.php';
include 'ConexionDB.php';

if(isset($_GET['id_gasto'])){
    $id_gasto = $_GET["id_gasto"];
    var_dump("id_gasto");
}

// //TODO obtenemos de BD todos los datos de gasto
// $queryGasto = "SELECT * FROM gasto WHERE id_gasto = :id_gasto";
// $consultaGasto->$this->conexionDB->preprare($queryGasto);
// $consultaGasto->bindParam(':id_gasto', $id_gasto);
// $consultaGasto->execute();
// $gasto = $consultaGasto->fetch(PDO::FETCH_ASSOC);

// //Obtener de BD un array con los deudores al pago
// usando el repositoryoi de deudores
// $queryAdscritos = "SELECT * FROM adscritos WHERE actividad_id_actividad = :actividad_id_actividad";
// $consultaAdscritos->$this->conexionDB->preprare($queryAdscritos);
// $consultaAdscritos->bindParam(':actividad_id_actividad', $actividad_id_actividad);
// $consultaAdscritos->execute();
// $adscritos = $consultaAdscritos->fetchAll(PDO::FETCH_ASSOC);

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



// $queryPago = $conexion->prepare("SELECT cantidad FROM gasto order by actividad_id_actividad DESC");

// $queryPago->execute();

// $cantidad = $queryPago->fetch(PDO::FETCH_OBJ);

// foreach ($cantidad as $rowImport) :
//     $queryReparto = $conexion->prepare("SELECT usuario_id_usuario, importe FROM reparto 
//                                         WHERE gasto = :gasto");

//     $queryReparto->bindParam(':gasto', $rowImport->cantidad);
//     $queryReparto->execute();

//     $reparto = $queryReparto->fetchAll(PDO::FETCH_OBJ);
//     var_dump($reparto);
// endforeach;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/pagos.css">
    <title>Pagos</title>
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
                        <input type="number" value="<?php echo $deuda_a_repartir; ?>" id="despesaTotal" readOnly=true>
                    </div>
                    <hr>
                    <div class="pago-individual">
                        <?php foreach ($deudores as $deudor) : ?>
                        <label for="" id="id_adscrito"><?php echo $deudor['id_adscrito']?></label>
                        <label for="" id="nombre"><?php echo  $deudor['nombre']; ?></label>
                        <input type="number" value=0 id="deuda" name="deuda[]" readOnly=true><br>
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