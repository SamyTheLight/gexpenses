<?php

require __DIR__ . '/vendor/autoload.php';


use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;


try{
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.mailtrap.io';
    $mail->SMTPAuth = true;
    $mail->Port = 2525;
    $mail->Username = '339a6e1c68d7d8';
    $mail->Password = '6feae4e9376030';

    //$mail = new PHPMailer();
    $mail->setFrom('joanc@gmail.cat', 'proves');
    // $mail->addReplyTo('info@mailtrap.io', 'Mailtrap');
    $mail->addAddress('josep.queralt@copernic.cat', 'Josep');
    // $mail->addCC('cc1@example.com', 'Elena');
    // $mail->addBCC('bcc1@example.com', 'Alex');

    $mail->Subject = 'Test Email via Mailtrap SMTP using PHPMailer';
    $mail->isHTML(true);
    $mailContent = "<h1>Send HTML Email using SMTP in PHP</h1>
    <p>This is a test email I’m sending using SMTP mail server with PHPMailer.</p>";
    $mail->Body = $mailContent;

    $mail->send();
} catch (Exception $ex) {
    echo $ex->message;
}


