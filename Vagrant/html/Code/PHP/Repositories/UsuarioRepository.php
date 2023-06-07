<?php
class UsuarioRepository
{

    private $conexionDB;

    public function __construct($conexionDB)
    {
        $this->conexionDB = $conexionDB;
    }

    public function insertarUsuario($nombre, $contrasena, $email)
    {

        try {
            // Crear y ejecutar la consulta
            $query = "INSERT INTO usuario (nombre, contrasena, email) VALUES (:nombre, :contrasena, :email)";
            $consulta = $this->conexionDB->prepare($query);
            $consulta->bindParam(':nombre', $nombre);
            $consulta->bindParam(':contrasena', $contrasena);
            $consulta->bindParam(':email', $email);

            $consulta->execute();

            if ($consulta) {
                $idInsertado = $this->conexionDB->lastInsertId();

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

    public function validarUsuario($nombre, $contrasena)
    {
        $query = "SELECT * FROM usuario WHERE nombre = :nombre AND contrasena = :contrasena";
        $consulta = $this->conexionDB->prepare($query);
        $consulta->bindParam(':nombre', $nombre);
        $consulta->bindParam(':contrasena', $contrasena);
        $consulta->execute();

        return $consulta->fetch(PDO::FETCH_OBJ);
    }

    public function consultarUsuario($email)
    {
        $query = "SELECT * FROM usuario WHERE email = :email";
        $consulta = $this->conexionDB->prepare($query);
        $consulta->bindParam(':email', $email);
        $consulta->execute();

        return $consulta->fetch(PDO::FETCH_OBJ);
    } 
    
    public function consultarUsuarioPorNombre($nombre)
    {
        $query = "SELECT * FROM usuario WHERE nombre = :nombre";
        $consulta = $this->conexionDB->prepare($query);
        $consulta->bindParam(':nombre', $nombre);
        $consulta->execute();

        return $consulta->fetch(PDO::FETCH_OBJ);
    } 
}
