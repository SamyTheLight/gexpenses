<?php

require __DIR__ . '/../../vendor/autoload.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;


try {
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->Username = 'mailcopernicprova@gmail.com';
    $mail->Password = 'tusuihvzulctfnta';

    $mail->setFrom('mailcopernicprova@gmail.com');
    $mail->addAddress($rowEmail);

    $aceptat = 1;

    $mail->Subject = 'Verificación actividad';
    $mail->isHTML(true);
    $mailContent = "<head>
    <style>
            body {
                font-family: 'Inter', sans-serif;
            }
            .mail{
                display:flex;
                flex-direction: column;
            }
            .title-logo{
                display:flex;
                flex-direction: row;
            }
            .title1{
                color:#6CD4B5;
    
            }
            .title2{
            color: #1C3144;
            }
            .img-logo {
                margin-top: 15px;
                margin-right: 5px;
                width: 90px;
                height: 90px;
    
            }
        </style>
    </head>
    
    <body>
        <div class='mail'>
        
            
                <h1 class='title1'>GE</h1>
                <h1 class='title2'>XPENSES</h1>
             </div>
            <div class='texto'>
                <h1 class=' inline m-L'>Saludos $nombre</h1>
                <h2 class='text'>Para aceptar la invitación a la actividad, por favor, haga click al enlace que aparece en pantalla.</h2>
           <br />
                <h4 class='bold'>Atentamente:</h4>
                <p>Oscar Ramírez, Joan Canals y Samuel García</p>
               <p>Saludos.</p><br />
            </div>
        </div>
    </body>;";

    $mail->AddEmbeddedImage("Images/logo.PNG", "Logo");

    $mailink = "http://localhost/php/M07/GExpensesABP/gexpensesabp/Code/PHP/Invitaciones.php?aceptat=1";
    $mail->Body = '<img class=img-logo src=cid:Logo  height= 140px width=140px />' . $mailContent . "<a href=$mailink >Enviar</a>";

    $mail->AltBody = "Si desea crear una cuenta en GExpenses, por favor, acceda al enlace que aparece en pantalla.";

    if ($mail->send()) {
        echo 'Correo enviado';
    } else echo 'error al enviar correo';


    $mail->smtpClose();
} catch (Exception $ex) {
    echo $ex->message;
}