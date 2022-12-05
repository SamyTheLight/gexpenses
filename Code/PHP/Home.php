<?php
session_start();
//include 'nav.php';

include 'ConexionDB.php';


$query= "SELECT * FROM activitat";
$stmt=$conexion->query($query);
$registros=$stmt->fetchAll(PDO::FETCH_OBJ);



if ((isset($_POST['enviarActivitat'])) && (!empty($_POST["nomActivitat"])&&!empty($_POST['descripcionActivitat']))) {
  
   
    
    $nombreA=$_POST["nomActivitat"];    
   
    $descripcioActivitat=$_POST["descripcionActivitat"];
    
    $tipusDivisa=$_POST["divisa"];
   

$queryActividad = "INSERT INTO activitat (Nombre,Descripcion,Divisa) VALUES (:nombreA,:descripcionA,:divisaA)";

$consultaActivitat = $conexion->prepare($queryActividad);

$consultaActivitat->bindParam(':nombreA', $nombreA);
$consultaActivitat->bindParam(':descripcionA', $descripcioActivitat);
$consultaActivitat->bindParam(':divisaA', $tipusDivisa);


if($consultaActivitat->execute()){
    Header("Location: Invitaciones.php");

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

    <div class=act-card>
        <div id="card" class="card">
            <div  class="card-body">

                <h4 id="btn-anadir">AÑADE UNA ACTIVIDAD</h4>
                <form action="" id="act-form" method="POST">


                    <div class="form-group">
                        <input type="text" id="name" placeholder="Nombre de la actividad" class="form-control" name="nomActivitat">
                    </div>
                    <div class="form-group">
                        <input type="text" id="description" placeholder="Descripción de la actividad" class="form-control" name="descripcionActivitat">
                    </div>

                  
                    <div class="form-group">
                        <select name="divisa" id="divisa" class="form-control" name="divisa">
                        <option value="" selected>seleccione la divisa</option>
                            <option value="$">$</option>
                            <option value="€">€</option>
                            <option value="¥">¥</option>
                        </select>
                    </div>
                    <button class="btn-card" id="afegirActivitat" name="enviarActivitat">Enviar</button>

                    

                </form>
                <div id="btn-eliminar">
                    <button class="btn-eliminarHome" id="btn-eliminar">-</button>
                    </div>
                
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
                <?php foreach ($registros as $row) : ?>

                    <tr class="tableInsert">
                        <td><?php echo $row->id_activitat; ?></td>
                        <td><?php echo $row->Nombre; ?></td>
                        <td><?php echo $row->Descripcion; ?></td>
                        <td><?php echo $row->Divisa; ?></td>
                        <td><button class="buttonInvitar">Inv</button></td>
                    </tr>
                <?php endforeach; ?>

            </table>

        </div>
    </div>


</body>
<script src="Home.js"></script>

<?php

include 'footer.php';
?>

</html>