<?php
class DeudorRepository{

    private $conexionDB;

    public function __construct($conexionDB) {
        $this->conexionDB = $conexionDB;
    }

    public function insertarDeudor($id_deudor, $cantidad_deuda, $adscrito_id_adscrito, $gasto_id_gasto){
        
        $query = "INSERT INTO deudor (id_deudor, cantidad_deuda, adscrito_id_adscrito, gasto_id_gasto) VALUES (:id_deudor, :cantidad_deuda, :divisa, :adscrito_id_adscrito, :gasto_id_gasto)";

        $consulta = $this->conexionDB->prepare($query);
        $consulta->bindParam(':id_deudor', $id_deudor);
        $consulta->bindParam(':cantidad_deuda', $cantidad_deuda);
        $consulta->bindParam(':adscrito_id_adscrito', $adscrito_id_adscrito);
        $consulta->bindParam(':gasto_id_gasto', $gasto_id_gasto);

        return $consulta->execute();
    }

    public function consultarDeudor($id_deudor){
        //Consulta para recuperar todas las actividades del usuario
        $query = "SELECT * FROM deudor WHERE id_deudor = :id_deudor";
        $consulta->$this->conexionDB->preprare($query);
        $consulta->bindParam(':id_deudor', $id_deudor);
        $consulta->execute();
        
        return $consulta -> fetchAll(PDO::FETCH_OBJ);
    }

    public function listarDeudor($id_adscrito){
        $query = "SELECT * FROM deudor WHERE adscrito_id_adscrito = :id_adscrito";
        $consulta = $this->conexionDB->prepare($query);
        $consulta->bindParam(':id_adscrito', $id_adscrito);
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }
} 
