<?php  

session_start();

include 'ConexionDB.php'; 

$usuarioLogin = $_POST['nombre'];
$contrasenaUser = $_POST['contrasena'];
$userID = $_POST['id_usuario'];

$validar_login = $conexion->prepare("SELECT * FROM usuario WHERE nombre = $usuarioLogin, 
contrasena = $contrasenaUser and id_usuario = $userID");

if(mysqli_num_rows($validar_login) > 0) {
   $_SESSION[`usuario`] = $usuarioLogin;
   header("location: Home.php");
   exit;
}

$queryLogin -> bindParam(":nombreUser",$usuarioLogin);
$queryLogin -> bindParam(":passwordUser",$contrasenaLogin);

$queryLogin-> execute();

$user= $queryLogin->fetch(PDO::FETCH_ASSOC);


 if($user){
    $_SESSION['usuario'] = $user['nombre'];
    header("location: ../index.php");
 }