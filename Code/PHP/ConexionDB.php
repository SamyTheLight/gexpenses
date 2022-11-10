<?php
 

  $conexion= mysqli_connect("localhost","root","","gexpenses");

  if($conexion) {
    echo 'Has entrat a la BBDD';
  }else {
    echo 'No has pogut accedir';
  }





 /*
 Prueba en pdo
 try {
    $db = new PDO('mysql:host=localhost;dbname=gexpenses;', 'root', '');
   

    if($db){
      echo 'Conectado a '.$db->getAttribute(PDO::ATTR_CONNECTION_STATUS);
        echo 'Conectado Crack';
    }else {
        echo 'Try again';
    }
  } catch(PDOException $ex) {
    echo 'Error conectando a la BBDD. '.$ex->getMessage(); 
  }
  */