<?php
if (!isset($_SESSION)) {
    session_start();
}
include 'nav.php';
include 'conexion_db.php';
include 'Repositories/InvitacionRepository.php';
include 'Repositories/ActividadRepository.php';
include 'Repositories/AdscritoRepository.php';

if (isset($_GET['actividad_id_actividad'])) {
    $actividad_id_actividad = $_GET["actividad_id_actividad"];
    var_dump("actividad_id_actividad");
}

$actividad_repository = new ActividadRepository($conexion);

$queryRegistro = "SELECT * FROM actividad ORDER BY id_actividad DESC limit 1";
$stmtRegistro = $conexion->query($queryRegistro);
$registroInvitacio = $actividad_repository->consultarActividad($actividad_id_actividad);

$nombreActividadR = $registroInvitacio->nombre;
$descripcionActividadR = $registroInvitacio->descripcion;

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

function insertarInvitacio($conexion, $mail,  $nombreActividadR, $descripcionActividadR, $idUserInvitacio1, $actividad_id_actividad)
{
    $nombreI = $nombreActividadR;
    $descripcioI =  $descripcionActividadR;
    $idUserInvitacio1 = idUserInvitacion($conexion, $mail);

    $usuario_id_usuario = null;
    if ($idUserInvitacio1 <> false){
        $usuario_id_usuario =  (int) $idUserInvitacio1;
    }

    $invitacion_repository = new InvitacionRepository($conexion);
    $invitacion_repository->insertarInvitacion($usuario_id_usuario, $actividad_id_actividad, $nombreI, $descripcioI, $mail);
}

if (!empty($emailE)) {
    foreach ($emailE as $rowEmail) :
        if (filter_var($rowEmail, FILTER_VALIDATE_EMAIL)) {

            $idUserInvitacio1 = idUserInvitacion($conexion, $mail);
            var_dump($idUserInvitacio1);

            $token = bin2hex(openssl_random_pseudo_bytes(16));

            insertarInvitacio($conexion, $rowEmail, $nombreActividadR, $descripcionActividadR, $idUserInvitacio1, $actividad_id_actividad);

            $queryEmail = $conexion->prepare("SELECT email FROM usuario WHERE email = :emailP ");
            $queryEmail->bindParam(':emailP', $rowEmail);
            $queryEmail->execute();

            $trobat = $queryEmail->fetch(PDO::FETCH_ASSOC);

            $_SESSION['mailEnviat'] = $trobat;
            if ($trobat == false) {
                include 'sendMailRegister.php';
            } else {
                include 'sendMailVerify.php';
                echo 'enviado correctamente';
            }
        }
    endforeach;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invitaciones</title>
    <link rel="stylesheet" href="../Styles/invitacion.css">
</head>

<body>
    <form action="" id="act-form" method="POST">
        <div class="card">
            <img class="card-image" src="./Images/Viaje_Combinado.png">
            <div class="card-text">
                <span class="date">  </span>

                <?php foreach ($registroInvitacio as $rowR) { ?>
                <h1><?php echo $rowR->Nombre;
                        ?></h1>
                <hr>
                <div class="ex1">
                    <p id="description"><?php echo $rowR->Descripcion;?></p>
                </div>
                <?php }
                ?>
                <div class="afegir-mail" id="addmail">
                    <input type="email" class="mails" name="emailEnviados[]" id="mails" placeholder="EMAIL">
                    <button class="btn-email" id="btn-emial">+</button>
                </div>
                <hr>
                <div class="emails" id="emails">
                    <h3 id="title-emails">¡AÑADE PARTICIPANTES A LA ACTIVIDAD!</h3>
                </div>
            </div>
            <div class="card-stats">
                <button type="submit" class="btn-enviar" name="submit" id="btn-enviar">ENVIAR</button>
            </div>
        </div>
    </form>

</body>
<script src="../Scripts/invitacion.js"></script>

</html>
<?php

include 'footer.php';
?>