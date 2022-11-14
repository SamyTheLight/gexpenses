<?php  
session_start();

include 'ConexionDB.php'; 

$nameuserL = $_POST['usernameLogin'];
$passwordL = $_POST['passwordLogin'];


$conexion -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$queryLogin = $conexion->prepare("SELECT * FROM usuario WHERE nombre = :nombreUser and 
 contrasena = :passwordUser");

$queryLogin -> bindParam(":nombreUser",$nameuserL);
$queryLogin -> bindParam(":passwordUser",$passwordL);


$queryLogin-> execute();

$user= $queryLogin->fetch(PDO::FETCH_ASSOC);



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