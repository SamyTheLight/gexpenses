<?php  
session_start();

include 'ConexionDB.php'; 

$nameuserL = $_POST['usernameLogin'];
$passwordL = $_POST['passwordLogin'];
//$passwordL= hash('sha512', $passwordL);

$queryLogin = $conexion->query ("SELECT * FROM usuarios WHERE nombre ='$nameuserL' and 
 contrasena ='$passwordL'");

 if($dades=$queryLogin->fetch_object()){
    $_SESSION['usuario'] = $nameuserL;
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