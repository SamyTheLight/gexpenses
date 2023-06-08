<?php
class AdscritoRepository
{

    private $conexionDB;

    public function __construct($conexionDB)
    {
        $this->conexionDB = $conexionDB;
    }

    public function insertarAdscrito($usuario_id_usuario, $nombre_adscrito, $actividad_id_actividad)
    {

        $query = "INSERT INTO adscrito (usuario_id_usuario, nombre_adscrito, actividad_id_actividad) VALUES (:usuario_id_usuario, :nombre_adscrito, :actividad_id_actividad)";

        $consulta = $this->conexionDB->prepare($query);
        $consulta->bindParam(':usuario_id_usuario', $usuario_id_usuario);
        $consulta->bindParam(':nombre_adscrito', $nombre_adscrito);
        $consulta->bindParam(':actividad_id_actividad', $actividad_id_actividad);

        return $consulta->execute();
    }

    public function consultarAdscrito($id_adscrito)
    {
        echo "<script type='text/javascript'>console.log('condultar_adscrito: " . $id_adscrito . "');</script>";
        $query = "SELECT * FROM adscrito WHERE id_adscrito = :id_adscrito";
        $consulta = $this->conexionDB->prepare($query);
        $consulta->bindParam(':id_adscrito', $id_adscrito);
        $consulta->execute();

        return $consulta->fetch(PDO::FETCH_OBJ);
    }

    public function listarAdscrito($actividad_id_actividad)
    {
        $query = "SELECT * FROM adscrito WHERE actividad_id_actividad = :actividad_id_actividad";
        $consulta = $this->conexionDB->prepare($query);
        $consulta->bindParam(':actividad_id_actividad', $actividad_id_actividad);
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }
}