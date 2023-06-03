<?php
class GastoRepository
{

    private $conexionDB;

    public function __construct($conexionDB)
    {
        $this->conexionDB = $conexionDB;
    }

    public function insertarGasto($actividad_id_actividad, $concepto, $pagador, $cantidad)
    {

        try {
            // Crear y ejecutar la consulta
            echo ' insertarGasto ';
            $queryActividad = "INSERT INTO gasto (actividad_id_actividad, concepto, pagador, cantidad) VALUES (:actividad_id_actividad, :concepto, :pagador, :cantidad)";
            echo ' prepare ';
            $consultaActivitat = $this->conexionDB->prepare($queryActividad);
            $consultaActivitat->bindParam(':actividad_id_actividad', $actividad_id_actividad);
            $consultaActivitat->bindParam(':concepto', $concepto);
            $consultaActivitat->bindParam(':pagador', $pagador);
            $consultaActivitat->bindParam(':cantidad', $cantidad);
            echo ' execute ';
            $consultaActivitat->execute();

            if ($consultaActivitat) {
                echo ' lastInsertId ';

                $idInsertado = $this->conexionDB->lastInsertId();

                echo 'return id_actividad';
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

    public function consultarGasto($id_gasto)
    {
        $query = "SELECT * FROM gasto WHERE id_gasto = :id_gasto";
        $consulta = $this->conexionDB->preprare($query);
        $consulta->bindParam(':id_gasto', $id_gasto);
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }

    public function listarGasto($actividad_id_actividad)
    {

        $query = "SELECT * FROM gasto WHERE actividad_id_actividad = :actividad_id_actividad";
        $consulta = $this->conexionDB->prepare($query);
        $consulta->bindParam(':actividad_id_actividad', $actividad_id_actividad);
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }
}
