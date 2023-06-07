<?php
class SesionRepository
{

    private $conexionDB;

    public function __construct($conexionDB)
    {
        $this->conexionDB = $conexionDB;
    }

    public function insertarSesion($usuario_id_usuario,)
    {

        try {
            // Crear y ejecutar la consulta
            $token = bin2hex(openssl_random_pseudo_bytes(16));
            $query = "INSERT INTO sesion (usuario_id_usuario, token) VALUES (:usuario_id_usuario, :token)";
            $consulta = $this->conexionDB->prepare($query);
            $consulta->bindParam(':usuario_id_usuario', $usuario_id_usuario);
            $consulta->bindParam(':token', $token);

            $consulta->execute();

            if ($consulta) {
                return $token;
            } else {
                return false;
            }
        } catch (Exception $e) {
            // Manejo del error
            echo "Error en la consulta: " . $e->getMessage();
        }
        return false;
    }

    public function consultarSesion($token, $usuario_id_usuario)
    {
        $query = "SELECT * FROM sesion WHERE token = :token AND usuario_id_usuario = :usuario_id_usuario AND fecha_fin IS NULL";
        $consulta = $this->conexionDB->prepare($query);
        $consulta->bindParam(':token', $token);
        $consulta->bindParam(':usuario_id_usuario', $usuario_id_usuario);
        $consulta->execute();

        return $consulta->fetch(PDO::FETCH_OBJ);
    }

    public function cerrarSesion($token, $usuario_id_usuario)
    {
        $query = "UPDATE sesion SET fecha_fin = datetime('now') WHERE token = :token AND usuario_id_usuario = :usuario_id_usuario AND fecha_fin IS NULL";
        $consulta = $this->conexionDB->prepare($query);
        $consulta->bindParam(':token', $token);
        $consulta->bindParam(':usuario_id_usuario', $usuario_id_usuario);
        $consulta->execute();

        return $consulta->rowCount();
    }

}
