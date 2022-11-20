
<?php

include 'ConexionDB.php';


$mostrarActivitats=$conexion->prepare('SELECT * FROM activitat');
var_dump($mostrarActivitats);

$data=[];

while($item = $mostrarActivitats -> fetch(PDO::FETCH_OBJ)){
    $data[]=[
        'id_activitat'=> $item->id_activitat,
        'Nombre'=> $item ->Nombre,
        'Descripcion' =>$item ->Descripcion,
        'Divisa' =>$item -> Divisa

    ];
    
} 




?>