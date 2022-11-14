<?php

    $firstname = $_POST["username"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password= $_POST["contrasena"];


    include 'ConexionDB.php';

   
   
        
        $query = "INSERT INTO usuario (nombre,apellidos,email,contrasena) VALUES (:nombre,:apellidos,:email,:contrasena)";

        $consulta = $conexion->prepare($query);

     
        $consulta->bindParam(':nombre', $firstname);
        $consulta->bindParam(':apellidos', $lastname);
        $consulta->bindParam(':email', $email);
        $consulta->bindParam(':contrasena', $password);


       
        if($consulta->execute()){
            echo 'Datos guardados correctamente';
        }else {
            echo 'Error al subir los datos';
        };



    
   




