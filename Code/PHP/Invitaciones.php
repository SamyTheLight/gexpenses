<?php

include 'nav.php';

include 'ConexionDB.php';



if (isset($_POST['btn-enviar'])) {


    $nomActivitat = $_POST['nomActivitat'];
    $description = $_POST['descr ipcionActivitat'];
    $emailE = $_POST['enviarCorreo'];



    if (filter_var($emailE, FILTER_VALIDATE_EMAIL)) {
        echo ("$emailE is a valid email address");
    } else {
        echo ("$emailE is not a valid email address");
    }

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



$arrayCorreos = $_POST["emailEnviados[]"];
$nomActivitat = $_POST["nomActivitat"];
$nomActivitat = strtoupper($nomActivitat);
$description = $_POST["descripcionActivitat"];
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
    <form action="Invitaciones.php" id="act-form" method="POST">
        <div class="card">
            <img class="card-image" src="/Code/Images/Viaje_Combinado.png">
            <div class="card-text">
                <span class="date">4 days ago</span>
                <h1><?php echo $nomActivitat ?></h1>
                <hr>
                <div class="ex1" <p id="description"><?php echo $description ?></p>
                </div>
                <div class="ex2" <table id="invitaciones-table">
                    <td id="td-act"><input type="text" class="input-mail" name="emailEnviados[]" id="input-mail" placeholder="EMAIL"></td>
                    </table>
                </div>
                <button class="btn-email" id="btn-emial">+</button>
            </div>
            <div class="card-stats">
                <button class="btn-enviar" name="btn-enviar" id="btn-enviar">ENVIAR</button>
            </div>
        </div>
        </div>

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
<script src=" Invitaciones.js"></script>
<script src=" validaCorreo.js"></script>

</html>
<?php

include 'footer.php';
?>