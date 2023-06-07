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
        //Consulta para recuperar todas las actividades del usuario
        $query = "SELECT * FROM actividad WHERE id_actividad = :id_actividad ORDER BY fecha DESC";
        $consulta = $this->conexionDB->prepare($query);
        $consulta->bindParam(':id_actividad', $id_actividad);
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }

    public function listarActividades($id_usuario)
    {
        $query = "SELECT * FROM actividad WHERE usuario_id_usuario = :id_usuario ORDER BY fecha DESC";
        $consulta = $this->conexionDB->prepare($query);
        $consulta->bindParam(':id_usuario', $id_usuario);
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }
}
