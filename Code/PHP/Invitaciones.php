<?php
session_start();
//include 'nav.php';

include 'ConexionDB.php';


if (isset($_POST['btn-enviar'])) {


    $nomInvitacio = $_POST['nomActivitat'];
    $descriptionInvitacio = $_POST['descripcionActivitat'];
    $emailE = $_POST['enviarCorreo'];

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

    if(isset($_GET['aceptat'])){
        if ($_GET['aceptat'] === '1'){

            $queryActividad = "INSERT INTO invitacio (Nombre,Descripcion,Email) VALUES (:nombreI,:descripcionI,:emailI)";

            $consultaActivitat = $conexion->prepare($queryActividad);


            $consultaActivitat->bindParam(':nombreI', $nomInvitacio);
            $consultaActivitat->bindParam(':descripcionI', $descriptionInvitacio);
            $consultaActivitat->bindParam(':emailI', $emailE);
          




if($consultaActivitat->execute()){
    echo 'se ha insertado en la taula invitacio ';

}else {
    echo 'no se ha insertado en invitacio';
};
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
    <title>Invitaciones</title>
    <link rel="stylesheet" href="Invitaciones.css">
</head>

<body>

   

<form action="" id="act-form" method="POST">
    <div class="form-target">
        <div class="NameInvitacio">
            <h1>Nombre Actividad</h1>
            <input type="text" class="inputName">
        </div>
        <div class="DescripcioInvitacio">
            <h1 class="label-description">Descripción Actividad</h1>
            <input type="textarea" class="inputDescripcion">
        </div>
        <div class="Emailnvitacio">
            <h1 class="label-description">Email</h1>
            <input name="enviarCorreo" id="enviarCorreo">
        </div>
       
        
        
        <button class="btn-enviar" name="btn-enviar" id="btn-enviar">ENVIAR</button>


            <?php

            if (isset($_GET['aceptat'])) {
            ?>
                <?php
                if ($_GET['aceptat'] === '1') {
                    ?>
                    <div class="alert-success" id="has_registered">

                    <?php 
                    if($_GET['aceptat']==='1'){


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
            <?php
            }
            ?>
        </div>
    </form>
</body>
<!-- <script src=" Invitaciones.js"></script>  -->

</html>
<?php

include 'footer.php';
?>