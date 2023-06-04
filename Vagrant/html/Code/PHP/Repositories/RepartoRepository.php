<?php
class RepartoRepository
{

    private $conexionDB;

    public function __construct($conexionDB)
    {
        $this->conexionDB = $conexionDB;
    }

    public function insertarReparto($id_reparto, $gasto_id_gasto, $usuario_id_usuario, $deuda)
    {

        try {
            // Crear y ejecutar la consulta
            echo ' insertarGasto ';
            $queryActividad = "INSERT INTO reparto (id_reparto, gasto_id_gasto, usuario_id_usuario, deuda) VALUES (:id_reparto, :gasto_id_gasto, :usuario_id_usuario, :deuda)";
            echo ' prepare ';
            $consultaActivitat = $this->conexionDB->prepare($queryActividad);
            $consultaActivitat->bindParam(':id_reparto', $id_reparto);
            $consultaActivitat->bindParam(':gasto_id_gasto', $gasto_id_gasto);
            $consultaActivitat->bindParam(':usuario_id_usuario', $usuario_id_usuario);
            $consultaActivitat->bindParam(':deuda', $deuda);
            echo ' execute ';
            $consultaActivitat->execute();

            if ($consultaActivitat) {
                echo ' lastInsertId ';

                $idInsertado = $this->conexionDB->lastInsertId();

                echo 'return id_reparto';
                return $idInsertado;
            } else {
                return false;
            }
        } catch (Exception $e) {
            // Manejo del error
            echo "Error en la consulta: " . $e->getMessage();
        }
        return false;
    }

    public function consultarReparto($id_reparto)
    {
        $query = "SELECT * FROM reparto WHERE id_reparto = :id_reparto";
        $consulta = $this->conexionDB->preprare($query);
        $consulta->bindParam(':id_reparto', $id_reparto);
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }

    //Listar repartos en una tabla ?
    public function listarReparto($gasto_id_gasto)
    {

        $query = "SELECT * FROM reparto WHERE gasto_id_gasto = :gasto_id_gasto";
        $consulta = $this->conexionDB->prepare($query);
        $consulta->bindParam(':gasto_id_gasto', $gasto_id_gasto);
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }

    //TODO función update Reparto (id_gasto, id_adscrito, cantidad)

    public function updateReparto($id_reparto, $deuda)
    {
        try {
            // Crear y ejecutar la consulta
            $query = "UPDATE reparto SET deuda = :deuda WHERE id_reparto = :id_reparto";
            $consulta = $this->conexionDB->prepare($query);
            $consulta->bindParam(':deuda', $deuda);
            $consulta->bindParam(':id_reparto', $id_reparto);
            $consulta->execute();

            // Verificar si la consulta se ejecutó correctamente
            if ($consulta->rowCount() > 0) {
                return true; // Actualización exitosa
            } else {
                return false; // No se encontró el registro o no se realizó ninguna actualización
            }
        } catch (Exception $e) {
            // Manejo del error
            echo "Error en la consulta: " . $e->getMessage();
        }

        return false; // Actualización fallida
    }
}
