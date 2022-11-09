<?php
 
 try {
    $db = new PDO('mysql:host=localhost;dbname=gexpenses;', 'root', '');
    echo 'Conectado a '.$db->getAttribute(PDO::ATTR_CONNECTION_STATUS);

    if($db){
        echo 'Conectado Crack';
    }else {
        echo 'Try again';
    }
  } catch(PDOException $ex) {
    echo 'Error conectando a la BBDD. '.$ex->getMessage(); 
  }