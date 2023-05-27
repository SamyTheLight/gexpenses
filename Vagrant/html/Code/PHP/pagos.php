<?php
session_start();
include 'nav.php';
include 'ConexionDB.php';
include 'Repositories/GastoRepository.php';

if(isset($_GET['actividad_id_actividad'])){
    $actividad_id_actividad = $_GET["actividad_id_actividad"];
    var_dump("actividad_id_actividad");
}

if ((isset($_POST['enviarActivitat2']))) {

    if ((!empty($_POST['concepto'])) && (!empty($_POST['import']))) {

        $actividad_id_actividad = $_GET["actividad_id_actividad"];
        var_dump("actividad_id_actividad");
        $concepto = $_POST["concepto"];
        var_dump("concepto");
        $pagador = $_POST["pagador"];
        var_dump("pagador");
        $cantidad = $_POST["import"];
        var_dump("import");
        $membersPago = $_POST["members"];
        // $countGasto = count($membersPago);
        // var_dump($countGasto);

        echo '\n actividad_id_actividad';
        print_r($actividad_id_actividad);
        echo '\n concepto';
        print_r($concepto);
        echo '\n pagador';
        print_r($pagador);
        echo '\n cantidad';
        print_r($cantidad);
        echo '\n membersPago';
        print_r($membersPago);

        $gasto_repository = new GastoRepository($conexion);
        $id_gasto = $gasto_repository->insertarGasto($actividad_id_actividad, $concepto, $pagador, $cantidad);

        //Insertar gastos

        // $queryPago = $conexion->prepare("SELECT MAX(actividad_id_actividad) FROM gasto");
        // $queryPago->execute();
        // $id_gasto = $queryPago->fetch(PDO::FETCH_COLUMN);
        // var_dump($id_gasto);

        // foreach ($membersPago as $rowUsuario) :

        //     $queryActividad1 = "INSERT INTO reparto (usuario_id_usuario,gasto_actividad_id_actividad,miembros,gasto, importe) VALUES (:rowUsuario,:idGasto,:miembros,:gasto,:importeA)";
        //     $consultaActivitat1 = $conexion->prepare($queryActividad1);
        //     $consultaActivitat1->bindParam(':rowUsuario', $rowUsuario);
        //     $consultaActivitat1->bindParam(':cantidadA', $cantidad);
        //     $consultaActivitat1->bindParam(':miembros', $miembros);
        //     $importe = $cantidad / $countGasto;
        //     $consultaActivitat1->bindParam(':importeA', $importe);
        //     $auxPago = (int) $id_gasto;
        //     $consultaActivitat1->bindParam(':idGasto', $auxPago);
        //     $consultaActivitat1->execute();
        // endforeach;

        // Header("Location: reparto.php");
    }
}
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
                    <input type="text" id="concepto" placeholder="Elige un concepto" class="form-control"
                        name="concepto">

                    <label for="description">Importe</label>
                    <input type="number" placeholder="Elige un importe" class="form-control" id="importe" name="import">

                    <label for="mensaje">Pagador</label>
                    <select name="pagador" id="divisa" class="pagadores">
                        <option selected disabled value="" class="pagador">Elige un pagador</option>
                        <option value="Oscar" class="pagador">Oscar</option>
                        <option value="Joan" class="pagador">Joan</option>
                        <option value="Samuel" class="pagador">Samuel</option>
                    </select>
                    <label for="tipusAct">Miembros</label>
                    <label id="user" for="">Oscar
                        <input type="checkbox" value="Oscar" name="members[]" id="users" class="users">
                    </label>
                    <label id="user" for="">Joan
                        <input type="checkbox" value="Joan" name="members[]" id="users" class="users">
                    </label>
                    <label id="user" for="">Samuel
                        <input type="checkbox" value="Samuel" name="members[]" id="users" class="users">
                    </label>
                        <input type="hidden" name="actividad_id_actividad" value="<?php echo $actividad_id_actividad  ?>">
                    <button class="btn-card" name="enviarActivitat2">GUARDAR</button>
                </div>
            </form>
        </div>
</body>
<!-- <script src="../Scripts/pagos.js"></script> -->
<?php
include 'footer.php';
?>

</html>