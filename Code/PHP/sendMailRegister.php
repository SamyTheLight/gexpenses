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
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';

    $mail->setFrom('mailcopernicprova@gmail.com');
    ;
    $mail->addAddress('joancanals23@gmail.com');
    
    $mail->Subject = 'Registro GExpenses';
    $mail->isHTML(true);

    $mailContent = "<h1>Si desea crear una cuenta en GExpenses, por favor, acceda al enlace que aparece a continuación.<h1>";

    

    $mailLogo->AddEmbeddedImage("Images/Logo.php","Logo");
    
   

    $mailink="http://localhost/php/M07/GExpensesABP/gexpensesabp/Code/GExpenses.php?aceptado=true";
    $mail->Body = '<img src="cid:Logo">'.$mailContent . "<a href=$mailink >Enviar</a>";

    $mail->AltBody ="Si desea crear una cuenta en GExpenses, por favor, acceda al enlace que aparece a continuación.";

    



    


   if( $mail->send()){
    echo 'Correo enviado';
   }else echo 'error al enviar correo';


   $mail->smtpClose();
} catch (Exception $ex) {
    echo $ex->message;
}



