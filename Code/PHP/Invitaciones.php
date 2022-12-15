<?php

include 'nav.php';

include 'ConexionDB.php';

$queryRegistro = "SELECT * FROM activitat ORDER BY id_activitat DESC limit 1";
$stmtRegistro = $conexion->query($queryRegistro);
$registroActivitat = $stmtRegistro->fetchAll(PDO::FETCH_OBJ);


if ((isset($_POST['btn-enviar'])) && (isset($_POST['emailEnviados']))) {


    $nomActivitat = $_POST['nomActivitat'];
    $description = $_POST['descr ipcionActivitat'];

    $emailE = $_POST['emailEnviados'];


    $cont = 0;

    foreach ($emailE as $rowEmail) :
        if (filter_var($rowEmail, FILTER_VALIDATE_EMAIL)) {
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $queryEmail = $conexion->prepare("SELECT email FROM invitacio WHERE email = :emailP ");

            $queryEmail->bindParam(":emailP", $rowEmail);

            $queryEmail->execute();

            $trobat = $queryEmail->fetch(PDO::FETCH_ASSOC);
            var_dump($trobat);
            if (!$trobat) {
                echo 'Registre';
                include 'sendMailRegister.php';
            } else {
                echo 'Verify';
                include 'sendMailVerify.php';
            }
        }
    endforeach;
}




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
    <form action="" id="act-form" method="POST">
        <div class="card">
            <img class="card-image" src="/Code/Images/Viaje_Combinado.png">
            <div class="card-text">
                <span class="date">4 days ago</span>

                <?php foreach ($registroActivitat as $rowR) { ?>
                <h1><?php echo $rowR->Nombre; ?></h1>
                <hr>
                <div class="ex1">
                    <p id="description"><?php echo $rowR->Descripcion ?></p>
                </div>
                <?php }
                ?>
                <div class="afegir-mail" id="addmail">
                    <input type="email" class="mails" name="emailEnviados[]" id="mails" placeholder="EMAIL">
                    <button class="btn-email" id="btn-emial">+</button>

                </div>
                <div class="missage-error" id="missage-error">
                    <p id="error">¡El correo no es correcto, porfavor introduzca los carácteres necesarios!</p>
                </div>
                <hr>
                <div class="emails" id="emails">
                    <h3 id="title-emails">¡ESTOS SON LOS CORREOS A LOS QUE DESEAS ENVIAR LA INVITACIÓN!</h3>
                </div>
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

</html>
<?php

include 'footer.php';
?>