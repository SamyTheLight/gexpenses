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
    ;
    $mail->addAddress('joancanals23@gmail.com');

    $aceptat=1;
    
    $mail->Subject = 'Verificación actividad';
    $mail->isHTML(true);
    $mailContent = "<h1>Para aceptar la invitación a la actividad, por favor, haga click al enlace que aparece en pantalla. <h1>";
    $mailLogo->AddEmbeddedImage("Images/Logo.php","Logo");

    $mailink="http://localhost/php/M07/GExpensesABP/gexpensesabp/Code/PHP/Invitaciones.php?aceptat=1";
    $mail->Body = '<img src="cid:Logo">'.$mailContent . "<a href=$mailink >Enviar</a>";

    $mail->AltBody ="Si desea crear una cuenta en GExpenses, por favor, acceda al enlace que aparece en pantalla.";

   if( $mail->send()){
    echo 'Correo enviado';
   }else echo 'error al enviar correo';


   $mail->smtpClose();
} catch (Exception $ex) {
    echo $ex->message;
}



