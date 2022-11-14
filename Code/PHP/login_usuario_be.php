<?php  
session_start();

include 'ConexionDB.php'; 

$nameuserL = $_POST['usernameLogin'];
$passwordL = $_POST['passwordLogin'];
//$passwordL= hash('sha512', $passwordL);

$queryLogin = $conexion->prepare("SELECT * FROM usuario WHERE nombre = :nombreUser and 
 contrasena =:passwordUser");

$consultaLogin -> bindParam(":nombreUser",$nameuserL);
$consultaLogin -> bindParam(":passwordUser",$passwordL);


$consultaLogin-> execute();

$user= $consultaLogin->fetch(PDO::FETCH_ASSOC);



 if($user){
    $_SESSION['usuario'] = $user['nombre'];
    header ("location: bienvenida.php");
 }else {
    echo '
    <script>
        alert("Usuario no existe,por favor verifique los datos introducidos");
        window.location = "../GExpenses.php";
    </script>
    
';

 }



?>