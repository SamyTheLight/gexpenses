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
    $mail->addAddress('mailcopernicprova@gmail.com');
    
    $mail->Subject = 'Mail Enviado Correctamente PHPMAILER';
    $mail->isHTML(true);
    $mailContent = "<h1>Todo bien todo correcto</h1>
    <p>Y yo que me alegro.</p>";
    $mail->Body = $mailContent;

   if( $mail->send()){
    echo 'Correo enviado';
   }else echo 'error al enviar correo';


   $mail->smtpClose();
} catch (Exception $ex) {
    echo $ex->message;
}



