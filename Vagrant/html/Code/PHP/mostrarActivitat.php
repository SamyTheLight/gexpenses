<?php

include 'ConexionDB.php';


$mostrarActivitats=$conexion->prepare("SELECT * FROM actividad");
var_dump($mostrarActivitats);

$mostrarActivitats -> execute();

$data=[];

while($item = $mostrarActivitats -> fetch(PDO::FETCH_OBJ)){
    $data[]=[
        "id_actividad"=> $item->id_actividad,
        "nombre"=> $item ->nombre,
        "descripcion" =>$item ->descripcion,
        "divisa"=>$item -> divisa

    ];
    
} 

var_dump($data);

echo json_encode($data);

?>