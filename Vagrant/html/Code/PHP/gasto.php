<?php
session_start();
include 'nav.php';
include 'conexion_db.php';
include 'Repositories/GastoRepository.php';
include 'Repositories/AdscritoRepository.php';
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

$adscrito_repository = new AdscritoRepository($conexion);
$adscritos = $adscrito_repository->listarAdscrito($actividad_id_actividad);
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
                    <input type="text" id="concepto" placeholder="Elige un concepto" class="form-control"
                        name="concepto">

                    <label for="description">Importe</label>
                    <input type="number" placeholder="Elige un importe" class="form-control" id="importe" name="import">

                    //Aqui mostrar todos los adscritos
                    <label for="mensaje">Pagador</label>
                    <select name="pagador" id="divisa" class="pagadores">
                        <option selected disabled value="" class="pagador">Elige un pagador</option>
                        <?php foreach ($adscritos as $adscrito){ ?>
                        <option value=<?php echo $adscrito->id_adscrito;?> class="pagador"><?php echo $adscrito->nombre_adscrito;?></option>
                        <?php } ?>
                    </select>
                    //Aqui mostrar todos los adscritos
                    <label for="tipusAct">Miembros</label>
                    <?php foreach ($adscritos as $adscrito){ ?>
                    <label id="user" for=""><?php echo $adscrito->nombre_adscrito;?>
                        <input type="checkbox" value="<?php echo $adscrito->nombre_adscrito;?>" name="members[]" id="users" class="users">
                        <input type="hidden" name="id_adscrito[]" value="<?php echo $adscrito->id_adscrito;?>">
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