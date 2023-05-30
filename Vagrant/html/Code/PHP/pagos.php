<?php
session_start();
include 'nav.php';
include 'ConexionDB.php';
include 'Repositories/GastoRepository.php';
//inclusdo deudor repository

if(isset($_GET['actividad_id_actividad'])){
    $actividad_id_actividad = $_GET["actividad_id_actividad"];
    var_dump("actividad_id_actividad");
}

//TODO del id_actividad obtener los adscritos
//con esos datos rellenar el formulario de miembros

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
        $members_gasto = $_POST["members"];

        // echo '\n actividad_id_actividad';
        // print_r($actividad_id_actividad);
        // echo '\n concepto';
        // print_r($concepto);
        // echo '\n pagador';
        // print_r($pagador);
        // echo '\n cantidad';
        // print_r($cantidad);
        // echo '\n membersPago';
        // print_r($membersPago);

        $gasto_repository = new GastoRepository($conexion);
        $id_gasto = $gasto_repository->insertarGasto($actividad_id_actividad, $concepto, $pagador, $cantidad);

        //TODO insertar deudores de la variable $members_gasto con el $id_gasto obtenido anteriormente


        Header("Location: reparto.php?id_gasto=$id_gasto");
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

                    //Aqui mostrar todos los adscritos
                    <label for="mensaje">Pagador</label>
                    <select name="pagador" id="divisa" class="pagadores">
                        <option selected disabled value="" class="pagador">Elige un pagador</option>
                        <option value="Oscar" class="pagador">Oscar</option>
                        <option value="Joan" class="pagador">Joan</option>
                        <option value="Samuel" class="pagador">Samuel</option>
                    </select>
                    //Aqui mostrar todos los adscritos
                    <label for="tipusAct">Miembros</label>
                    <label id="user" for="">Oscar
                        <input type="checkbox" value="Oscar" name="members[]" id="users" class="users">
                        <input type="hidden" name="id_adscrito[]" value="1">
                    </label>
                    <label id="user" for="">Joan
                        <input type="checkbox" value="Joan" name="members[]" id="users" class="users">
                        <input type="hidden" name="id_adscrito[]" value="2">
                    </label>
                    <label id="user" for="">Samuel
                        <input type="checkbox" value="Samuel" name="members[]" id="users" class="users">
                        <input type="hidden" name="id_adscrito[]" value="3">
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