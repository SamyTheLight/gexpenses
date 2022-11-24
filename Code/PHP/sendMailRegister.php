<?php

require __DIR__ . '/../../vendor/autoload.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

//include 'Invitaciones.php';

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
    

    $perRegistrar=1;
    $mail->addAddress($_POST['enviarCorreo']);
    
    $correoAdreca=$_POST['enviarCorreo'];
    $mail->Subject = 'Registro GExpenses';
    $mail->isHTML(true);
    $mailContent = "<h1>Si desea crear una cuenta en GExpenses, por favor, acceda al enlace que aparece a continuación.<h1>";
   

    $mailink="http://localhost/php/M07/GExpensesABP/gexpensesabp/Code/GExpenses.php?perRegistrar=1?correoAdreca";
    $mail->Body = $mailContent . "<a href=$mailink >Enviar</a>";

   if( $mail->send()){
    echo 'Correo enviado';
   }else echo 'error al enviar correo';


   $mail->smtpClose();
} catch (Exception $ex) {
    echo $ex->message;
}



