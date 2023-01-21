<?php
session_start();
include 'nav.php';
include 'ConexionDB.php';

$queryRegistro = "SELECT * FROM activitat ORDER BY id_activitat DESC limit 1";
$stmtRegistro = $conexion->query($queryRegistro);
$registroInvitacio = $stmtRegistro->fetchAll(PDO::FETCH_OBJ);

$nombreActividadR = "";
$descripcionActividadR = "";

foreach ($registroInvitacio as $row) {
    $nombreActividadR = $row->Nombre;
    $descripcionActividadR = $row->Descripcion;
}
var_dump($nombreActividadR);
var_dump($descripcionActividadR);

function idUserInvitacion($conexion, $emailI)
{
    $queryUserInvitacio = $conexion->prepare("SELECT id_usuario FROM usuario WHERE email =:emailUserInvitacio ");

    $queryUserInvitacio->bindParam(":emailUserInvitacio", $emailI);

    $queryUserInvitacio->execute();

    $userIdInvitacio =  $queryUserInvitacio->fetch(PDO::FETCH_ASSOC);

    return $userIdInvitacio;
}

$emailE = $_POST['emailEnviados'];

$cont = 0;

$idUserInvitacio1 = idUserInvitacion($conexion, $mail);


function insertarInvitacio($conexion, $mail,  $nombreActividadR, $descripcionActividadR, $idUserInvitacio1)
{
    $nombreI = $nombreActividadR;

    $descripcioI =  $descripcionActividadR;

    $idUserInvitacio1 = idUserInvitacion($conexion, $mail);

    // var_dump($idUserInvitacio1);
    // die();


    $queryInvitacio = "INSERT INTO invitacio (Nombre,Descripcion,Email,usuario_id) VALUES (:nombreI,:descripcioI,:emailI,:userIdA)";

    $consultaInvitacio = $conexion->prepare($queryInvitacio);

    $consultaInvitacio->bindParam(':nombreI', $nombreI);

    $consultaInvitacio->bindParam(':descripcioI', $descripcioI);

    $consultaInvitacio->bindParam(':emailI', $mail);

    $nullV = null;
    if ($idUserInvitacio1 == false) $consultaInvitacio->bindParam(':userIdA',  $nullV);
    else {
        $aux = (int) $idUserInvitacio1;
        $consultaInvitacio->bindParam(':userIdA', $aux);
    }


    if ($consultaInvitacio->execute())
        echo 'Execute correcte';
}

function generateToken($length = 10)
{
    return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
}

$tokenI = generateToken($length = 10);






function guardarToken($conexion, $token, $idUserInvitacio1, $mail)
{
    $boolCreat = 1;
    $idUserInvitacio1 = idUserInvitacion($conexion, $mail);

    $CurrentDateInv = date_create("now")->format("Y-m-d H:i:s");

    $queryToken = "INSERT INTO Token (token,invitacio_id,fecha,estado) VALUES (:tokenI,:invitacio_idI,:fechaInv,:estadoI)";

    $consultaToken = $conexion->prepare($queryToken);

    $consultaToken->bindParam(':tokenI', $token);
    // var_dump($token);
    // die();

    $auxInvit = (int) $idUserInvitacio1;
    var_dump($idUserInvitacio1);
    $consultaToken->bindParam(':invitacio_idI', $auxInvit);

    // var_dump($auxInvit);
    // die();

    $consultaToken->bindParam(':fechaInv', $CurrentDateInv);

    // var_dump($CurrentDateInv);
    // die();

    $consultaToken->bindParam(':estadoI', $boolCreat);

    // var_dump($boolCreat);
    // die();

    $consultaToken->execute();
}



foreach ($emailE as $rowEmail) :
    if (filter_var($rowEmail, FILTER_VALIDATE_EMAIL)) {


        insertarInvitacio($conexion, $rowEmail, $nombreActividadR, $descripcionActividadR, $idUserInvitacio1);

        guardarToken($conexion, $tokenI, $idUserInvitacio1, $rowEmail);



        $queryEmail = $conexion->prepare("SELECT email FROM usuario WHERE email = :emailP ");

        $queryEmail->bindParam(':emailP', $rowEmail);

        var_dump($rowEmail);

        $queryEmail->execute();

        $trobat = $queryEmail->fetch(PDO::FETCH_ASSOC);
        var_dump($trobat);


        $_SESSION['mailEnviat'] = $trobat;
        if ($trobat == false) {
            echo 'Registre';

            include 'sendMailRegister.php';
        } else {
            echo 'Verify';

            include 'sendMailVerify.php';
        }
    }
endforeach;


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invitaciones</title>
    <link rel="stylesheet" href="/html/Code/Styles/Invitaciones.css">
</head>

<body>
    <form action="" id="act-form" method="POST">
        <div class="card">
            <img class="card-image" src="./Images/Viaje_Combinado.png">
            <div class="card-text">
                <span class="date">4 days ago</span>

                <?php foreach ($registroInvitacio as $rowR) { ?>
                <h1><?php echo $rowR->Nombre;
                        ?></h1>
                <hr>
                <div class="ex1">
                    <p id="description"><?php echo $rowR->Descripcion;
                                            ?></p>
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
                <button type="submit" class="btn-enviar" name="submit" id="btn-enviar">ENVIAR</button>
            </div>
        </div>




    </form>

</body>
<script src="/html/Code/Scripts/Invitaciones.js"></script>

</html>
<?php

include 'footer.php';
?>