<?php
session_start();
include 'nav.php';
include 'ConexionDB.php';

$queryRegistro = "SELECT * FROM activitat ORDER BY id_activitat DESC limit 1";
$stmtRegistro = $conexion->query($queryRegistro);
$registroInvitacio = $stmtRegistro->fetchAll(PDO::FETCH_OBJ);

function idUserInvitacion($conexion, $emailI)
{
    $queryUserInvitacio = $conexion->prepare("SELECT id_usuario FROM usuario WHERE email =:emailUserInvitacio ");

    $queryUserInvitacio->bindParam(":emailUserInvitacio", $emailI);


    $queryUserInvitacio->execute();

    $userIdInvitacio =  $queryUserInvitacio->fetch(PDO::FETCH_ASSOC);


    return $userIdInvitacio;
}
/*
var_dump($_POST['submit']);
var_dump($_POST['emailEnviados']);

if ((isset($_POST['emailEnviados'])) && isset($_POST['submit'])) {
    echo 'hola';
    if ((!empty($_POST['nomActivitat'])) && (!empty($_POST['descripcionActivitat']))) {
        echo 'adios';
        $nombreI = $_POST["nomActivitat"];

        $descripcioI = $_POST["descripcionActivitat"];

        $emailI = $_POST["emailInvitacio"];

        echo 'error no muestra id';
        $idUserIvitacio = idUserInvitacion($conexion, $emailI);
        var_dump($idUserIvitacio);

        $queryInvitacio = "INSERT INTO invitacio (Nombre,Descripcion,Email,usuario_id) VALUES (:nombreI,:descripcioI,:emailI,:userIdA)";

        $consultaInvitacio = $conexion->prepare($queryInvitacio);

        $consultaInvitacio->bindParam(':nombreI', $nombreI);
        $consultaInvitacio->bindParam(':descripcionI', $descripcioI);
        $consultaInvitacio->bindParam(':emailI', $emailI);
        $consultaInvitacio->bindParam(':userIdA',  $idUserIvitacio);


        $consultaInvitacio->execute();
    }
*/
$emailE = $_POST['emailEnviados'];

$cont = 0;



function insertarInvitacio($conexion, $mail, $registroInvitacio)
{
    foreach ($registroInvitacio as $rowR)
        $nombreI = $rowR->Nombre;
    //var_dump($rowR->Nombre);
    //die();
    $descripcioI =  $rowR->Descripcion;
    //var_dump($descripcioI);
    //die();
    $idUserIvitacio = idUserInvitacion($conexion, $mail);
    //var_dump($idUserIvitacio);
    //die();



    $queryInvitacio = "INSERT INTO invitacio (Nombre,Descripcion,Email,usuario_id) VALUES (:nombreI,:descripcioI,:emailI,:userIdA)";

    $consultaInvitacio = $conexion->prepare($queryInvitacio);

    $consultaInvitacio->bindParam(':nombreI', $nombreI);
    //var_dump($nombreI);
    //die();
    $consultaInvitacio->bindParam(':descripcionI', $descripcioI);
    // var_dump($descripcioI);
    // die();
    $consultaInvitacio->bindParam(':emailI', $mail);
    // var_dump($mail);
    // die();
    $consultaInvitacio->bindParam(':userIdA',  $idUserIvitacio);
    var_dump($idUserIvitacio);
    die();

    $consultaInvitacio->execute();
    var_dump($consultaInvitacio);
    die();
}


foreach ($emailE as $rowEmail) :
    if (filter_var($rowEmail, FILTER_VALIDATE_EMAIL)) {

        insertarInvitacio($conexion, $rowEmail, $registroInvitacio);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        var_dump("stop");
        die();

        $queryEmail = $conexion->prepare("SELECT email FROM invitacio WHERE email = :emailP ");

        $queryEmail->bindParam(':emailP', $rowEmail);

        $queryEmail->execute();

        $trobat = $queryEmail->fetch(PDO::FETCH_ASSOC);


        $_SESSION['mailEnviat'] = $trobat;
        if (!$trobat) {
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
    <link rel="stylesheet" href="/Code/Styles/Invitaciones.css">
</head>

<body>
    <form action="" id="act-form" method="POST">
        <div class="card">
            <img class="card-image" src="./Images/Viaje_Combinado.png">
            <div class="card-text">
                <span class="date">4 days ago</span>

                <?php foreach ($registroInvitacio as $rowR) { ?>
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
                <button type="submit" class="btn-enviar" name="submit" id="btn-enviar">ENVIAR</button>
            </div>
        </div>




    </form>

</body>
<script src="/Code/Scripts/Invitaciones.js"></script>

</html>
<?php

include 'footer.php';
?>