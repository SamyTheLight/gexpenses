<?php
session_start();
include 'nav.php';

include 'ConexionDB.php';


$query = "SELECT * FROM activitat ORDER BY Fecha DESC";
$stmt = $conexion->query($query);
$registros = $stmt->fetchAll(PDO::FETCH_OBJ);

if ((isset($_POST['enviarActivitat']))) {

    if ((!empty($_POST['nomActivitat'])) && (!empty($_POST['descripcionActivitat']))) {

        $nombreA = $_POST["nomActivitat"];

        $descripcioActivitat = $_POST["descripcionActivitat"];

        $tipusDivisa = $_POST["divisa"];
        $tiposActivitat = $_POST["tipusActivitat"];

        var_dump("nomActivitat");
        var_dump("descripcionActivitat");
        var_dump("divisa");
        var_dump("tipusActivitat");

        $queryActividad = "INSERT INTO activitat (Nombre,Descripcion,Divisa,TipusAct) VALUES (:nombreA,:descripcionA,:divisaA,:tiposA)";

        $consultaActivitat = $conexion->prepare($queryActividad);

        $consultaActivitat->bindParam(':nombreA', $nombreA);
        $consultaActivitat->bindParam(':descripcionA', $descripcioActivitat);
        $consultaActivitat->bindParam(':divisaA', $tipusDivisa);
        $consultaActivitat->bindParam(':tiposA', $tiposActivitat);

        if ($consultaActivitat->execute()) {
            echo 'Envio bien';
            Header("Location: Invitaciones.php");
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Code/Styles/Home.css">
    <title>Home</title>
</head>

<body>
    <!-- POPUP -->
    <div class="act-card">
        <div class="btn-form">
            <button id="form-btn" class="form-btn">AÑADIR</button>
            <button name="asc" id="btn-ordenar">ASC</button>
        </div>
        <?php
        $btn = $_POST['asc'];
        var_dump($btn);
        if ((isset($_POST['asc']))) {
            $queryasc = "SELECT * FROM activitat ORDER BY Fecha ASC";
            $stmt = $conexion->query($queryasc);
            $ordena = $stmt->fetchAll(PDO::FETCH_OBJ);
        }



        ?>
        <!-- CARDS DE LES ACTIVITATS -->
        <div id="act-list">
            <?php foreach ($registros as $row) : ?>
            <div class="card">
                <div class="face front">
                    <?php
                        /*$tiposActivitat = $_POST["tipusActivitat"];
                        $queryEmail = $conexion->prepare("SELECT TipusAct FROM activitat ");

                        $queryEmail->bindParam(":tiposA", $tiposActivitat);
            
                        $queryEmail->execute();
                        $user = $queryLogin->fetch(PDO::FETCH_ASSOC);*/
                        ?>
                    <img src="/Code/PHP/Images/Viaje_Combinado.png" alt="">
                    <h3><?php echo strtoupper($row->Nombre) ?></h3>
                </div>
                <div class="face back">
                    <h1><?php echo strtoupper($row->Nombre) ?></h1>
                    <hr>
                    <p id="description"><?php echo $row->Descripcion ?></p>
                    <p class="divisa"><b>Divisa: </b><?php echo $row->Divisa ?></p>
                    <div class="link"><a href="detallActivitat.php"><b>DETAILS</b></a>
                    </div>
                </div>

            </div>
            <?php endforeach; ?>
        </div>

    </div>

</body>
<script src="/Code/Scripts/Home.js"></script>

</html>
<?php

include 'footer.php';
?>