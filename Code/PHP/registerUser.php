<?php


    include 'ConexionDB.php';

    
    $username=  $_POST['username'];
    $lastname= $_POST['lastname'];
    $email=  $_POST['email'];
    $contrasena= $_POST['password'];


    //$query= "INSERT INTO  usuarios (id,nombre,apellidos,email,contrasena) values 

$query = "INSERT INTO usuarios (nombre,apellidos,email,contrasena)
VALUES ('$username', '$lastname', '$email', '$contrasena')"; 


$executeQuery= mysqli_query($conexion,$query);