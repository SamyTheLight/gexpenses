<?php  
session_start();

include 'conexion_be.php'; 

$nameuser = $_POST['nameuser'];
$password = $_POST['password'];
$password = hash('sha512', $password);

$validar_login = mysqli_query($conexion,"SELECT * FROM usuario WHERE nombre_usuario ='$nameuser' and 
 password ='$password'");

 if(mysqli_num_rows($validar_login)> 0){
    $_SESSION['usuario'] = $nameuser;
    header("location: ../bienvenida.php");
    exit;
 }else{
    echo '
        <script>
            alert("Usuario no existe,por favor verifique los datos introducidos");
            window.location = "../GExpenses.html";
        </script>
        
    ';
    exit;
 }


?>