<?php
session_start();
//include 'nav.php';

include 'ConexionDB.php';

var_dump($_POST['btn-enviar']);

if (isset($_POST['btn-enviar'])) {

    var_dump($_POST['btn-enviar']);
    $emailE = $_POST['enviarCorreo'];

    var_dump($emailE);

    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $queryEmail = $conexion->prepare("SELECT email FROM invitacio WHERE email = :emailP ");


    $queryEmail->bindParam(":emailP", $emailE);


    $queryEmail->execute();

    $trobat = $queryEmail->fetch(PDO::FETCH_ASSOC);

    if (!$trobat) {
        include 'sendMailRegister.php';
    } else {
        include 'sendMailVerify.php';
    }
}

$nomActivitat = $_POST['nomActivitat'];
$description = $_POST['descripcionActivitat'];

//include 'ConexionDB.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invitaciones</title>
    <link rel="stylesheet" href="Invitaciones.css">
</head>

<body>
    <form action="" id="act-form" method="POST">
        <div class="form-target">
            <h1 id="nom-activitat"><?php echo $nomActivitat ?></h1>
            <p id="description"><?php echo $description ?></p>
            <table id="invitaciones-table">
            </table>
            <button class="btn-email">+</button>
            <input name="enviarCorreo" id="enviarCorreo">
            <button class="btn-enviar" name="btn-enviar" id="btn-enviar">ENVIAR</button>

            <?php

            if (isset($_GET['aceptat'])) {
            ?>
                <?php
                if ($_GET['aceptat'] === '1') {
                ?>
                    <div class="alert-success" id="has_registered">
                        <p>Se ha aceptado la invitación</p>
                    </div>

                    <style>
                        .alert-success {
                            text-align: center;
                            background-color: green;
                            color: white;
                            display: block;
                            border-radius: 20px;
                            margin-top: 20px;
                            font-size: 20px;
                        }
                    </style>
                <?php
                }
                ?>

            <?php
            }
            ?>
        </div>
    </form>
</body>
<!-- <script src=" Invitaciones.js"></script> -->

</html>
<?php

include 'footer.php';
?>