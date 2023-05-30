<?php
class GastoRepository{

    private $conexionDB;

    public function __construct($conexionDB) {
        $this->conexionDB = $conexionDB;
    }

    public function insertarGasto($actividad_id_actividad, $concepto, $pagador, $cantidad){
        
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

                echo ' return id_actividad ';
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

    public function consultarGasto($id_gasto){

    }

    public function listarGasto($id_usuario){

        
    }
} 