<?php
session_start();
include 'nav.php';

include 'ConexionDB.php';







if ((isset($_POST['enviarActivitat']))) {
  

    $nombreA=$_POST["nomActivitat"];
   
    $descripcioActivitat=$_POST["descripcionActivitat"];
    
    $tipusDivisa=$_POST["divisa"];
   

$queryActividad = "INSERT INTO activitat (Nombre,Descripcion,Divisa) VALUES (:nombreA,:descripcionA,:divisaA)";

$consultaActivitat = $conexion->prepare($queryActividad);


$consultaActivitat->bindParam(':nombreA', $nombreA);
$consultaActivitat->bindParam(':descripcionA', $descripcioActivitat);
$consultaActivitat->bindParam(':divisaA', $tipusDivisa);




if($consultaActivitat->execute()){
    echo 'se ha insertado en la taula activitat ';
}else {
    echo 'no se ha insertado en activitat';
};


}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Home.css">
    <title>Home</title>
</head>

<body>
    <h1><?php echo "<h1>Bienvenido - " . $_SESSION['usuario'] . "</h1>"; ?></h1>

    <div class=act-card>
        <div class="card">
            <div class="card-body">
                <h4>AÑADE UNA ACTIVIDAD</h4>
                <form action="" id="act-form" method="POST">
                    <div class="form-group">
                        <input type="text" id="name" placeholder="Nombre de la actividad" class="form-control" name="nomActivitat">
                    </div>
                    <div class="form-group">
                        <input type="text" id="description" placeholder="Descripción de la actividad" class="form-control" name="descripcionActivitat">
                    </div>
                    <div class="form-group">
                        <select name="divisa" id='divisa' class="form-control" name="divisa">
                            <option value="$">$</option>
                            <option value="€">€</option>
                            <option value="¥">¥</option>
                        </select>
                    </div>
                    <button class="btn-card" id="afegirActivitat"  name="enviarActivitat">Enviar</button>
                  
                </form>
            </div>
        </div>
        <div id="act-list">
            <table id="table-act">
                <tr>
                    <td>ID</td>
                    <td>NOMBRE</td>
                    <td>DESCRIPCIÓN</td>
                    <td>DIVISA</td>
                </tr>

            </table>
            <tbody id="taulaMostrar"></tbody>
        </div>
    </div>


    <script src="Home.js"></script>
</body>

</html>



<?php

include 'footer.php';
?>