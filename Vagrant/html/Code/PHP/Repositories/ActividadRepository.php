<?php
class ActividadRepository
{

    private $conexionDB;

    public function __construct($conexionDB)
    {
        $this->conexionDB = $conexionDB;
    }

    public function insertarActividad($nombre, $descripcion, $divisa, $tipo_actividad, $id_usuario)
    {

        //Insertamos una nueva actividad a la BD
        $queryActividad = "INSERT INTO actividad (nombre, descripcion, divisa, tipo_actividad, usuario_id_usuario) VALUES (:nombre, :descripcion, :divisa, :tipo_actividad, :usuario_id_usuario)";

        $consulta = $this->conexionDB->prepare($queryActividad);
        $consulta->bindParam(':nombre', $nombre);
        $consulta->bindParam(':descripcion', $descripcion);
        $consulta->bindParam(':divisa', $divisa);
        $consulta->bindParam(':tipo_actividad', $tipo_actividad);
        $consulta->bindParam(':usuario_id_usuario', $id_usuario);

        $resultado = $consulta->execute();

        if ($resultado) {
            $idInsertado = $this->conexionDB->lastInsertId();
            return $idInsertado;
        } else {
            return false;
        }
    }

    public function consultarActividad($id_actividad)
    {
        //Consulta de una actividad en concreto
        $query = "SELECT * FROM actividad WHERE id_actividad = :id_actividad LIMIT 1";
        $consulta = $this->conexionDB->prepare($query);
        $consulta->bindParam(':id_actividad', $id_actividad);
        $consulta->execute();

        return $consulta->fetch(PDO::FETCH_OBJ);
    }

    public function listarActividades($id_usuario, $modo = "creacion")
    {
        $query = "SELECT * FROM actividad WHERE usuario_id_usuario = :id_usuario ORDER BY fecha DESC";
        if ($modo == "modificacion"){
            $query = "SELECT * FROM actividad WHERE usuario_id_usuario = :id_usuario ORDER BY fecha_ultima_modificacion DESC";
        }
        
        $consulta = $this->conexionDB->prepare($query);
        $consulta->bindParam(':id_usuario', $id_usuario);
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }

    public function modificarActividad($id_actividad) 
    {
        echo "<script type='text/javascript'>console.log('query');</script>";
        $query = "UPDATE actividad SET fecha_ultima_modificacion = NOW() where id_actividad = :id_actividad";

        echo "<script type='text/javascript'>console.log('prepare');</script>";
        $consulta = $this->conexionDB->prepare($query);
        echo "<script type='text/javascript'>console.log('bind param');</script>";
        $consulta->bindParam(':id_actividad', $id_actividad);
        echo "<script type='text/javascript'>console.log('execute');</script>";
        $consulta->execute();

        echo "<script type='text/javascript'>console.log('rowcount');</script>";
        return $consulta->rowCount();
    }
}
