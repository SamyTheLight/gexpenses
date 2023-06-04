<?php
class DeudorRepository
{

    private $conexionDB;

    public function __construct($conexionDB)
    {
        $this->conexionDB = $conexionDB;
    }

    public function insertarDeudor($adscrito_id_adscrito, $gasto_id_gasto)
    {

        $query = "INSERT INTO deudor ( adscrito_id_adscrito, gasto_id_gasto) VALUES (:adscrito_id_adscrito, :gasto_id_gasto)";

        $consulta = $this->conexionDB->prepare($query);
        $consulta->bindParam(':adscrito_id_adscrito', $adscrito_id_adscrito);
        $consulta->bindParam(':gasto_id_gasto', $gasto_id_gasto);

        $consulta->execute();
        if ($consulta) {
            $idInsertado = $this->conexionDB->lastInsertId();

            return $idInsertado;
        } else {
            return 0;
        }
    }

    public function consultarDeudor($id_deudor)
    {
        $query = "SELECT * FROM deudor WHERE id_deudor = :id_deudor";
        $consulta = $this->conexionDB->prepare($query);
        $consulta->bindParam(':id_deudor', $id_deudor);
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }

    public function listarDeudor($gasto_id_gasto)
    {
        $query = "SELECT * FROM deudor WHERE gasto_id_gasto = :gasto_id_gasto";
        $consulta = $this->conexionDB->prepare($query);
        $consulta->bindParam(':gasto_id_gasto', $gasto_id_gasto);
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }
}
