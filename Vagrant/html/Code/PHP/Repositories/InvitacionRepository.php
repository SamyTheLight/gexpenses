<?php
class InvitacionRepository
{

    private $conexionDB;

    public function __construct($conexionDB)
    {
        $this->conexionDB = $conexionDB;
    }

    public function insertarInvitacion($usuario_id_usuario, $actividad_id_actividad, $nombre, $descripcion, $email)
    {

        try {
            // Crear y ejecutar la consulta
            $token = bin2hex(openssl_random_pseudo_bytes(16));
            $query = "INSERT INTO invitacion (usuario_id_usuario, actividad_id_actividad, nombre, descripcion, email, token) 
                        VALUES (:usuario_id_usuario, :actividad_id_actividad, :nombre, :descripcion, :email, :token)";
                        
            $consulta = $this->conexionDB->prepare($query);
            $consulta->bindParam(':usuario_id_usuario', $usuario_id_usuario);
            $consulta->bindParam(':actividad_id_actividad', $actividad_id_actividad);
            $consulta->bindParam(':nombre', $nombre);
            $consulta->bindParam(':descripcion', $descripcion);
            $consulta->bindParam(':email', $email);
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

    public function consultarInvitacion($id_adscrito)
    {
        echo "<script type='text/javascript'>console.log('condultar_adscrito: " . $id_adscrito . "');</script>";
        $query = "SELECT * FROM adscrito WHERE id_adscrito = :id_adscrito";
        $consulta = $this->conexionDB->prepare($query);
        $consulta->bindParam(':id_adscrito', $id_adscrito);
        $consulta->execute();

        return $consulta->fetch(PDO::FETCH_OBJ);
    }
}
