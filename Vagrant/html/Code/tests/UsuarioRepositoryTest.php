<?php
//  require_once '../../autoload.php';

use PHPUnit\Framework\TestCase;

class UsuarioRepositoryTest extends TestCase
{
    private $conexionDB;
    private $usuario_repository;

    private $nombre = "juanito";
    private $contrasena = "P123456*p";
    private $email = "juanito@correo.com";

    public function setUp(): void
    {
        // Aquí se debe crear un objeto PDO que se conecte a una base de datos de prueba SQLite.
        // Esta base de datos se crea en memoria y se destruye después de cada prueba.
        $this->conexionDB = new PDO('sqlite::memory:');
        $this->conexionDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Crear la tabla usuario en la base de datos de prueba.
        $this->conexionDB->exec("
        CREATE TABLE IF NOT EXISTS usuario (
            id_usuario INTEGER PRIMARY KEY AUTOINCREMENT,
            nombre VARCHAR(16) NOT NULL,
            contrasena VARCHAR(60) NOT NULL,
            email VARCHAR(255) NOT NULL,
            create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
          );
        ");

        $this->usuario_repository = new UsuarioRepository($this->conexionDB);
    }

    public function testInsertarUsuario()
    {
        $hash_password = password_hash($this->contrasena, PASSWORD_DEFAULT);

        $res = $this->usuario_repository->insertarUsuario($this->nombre, $hash_password, $this->email);

        $this->assertTrue($res <> false);

        $res = $this->usuario_repository->consultarUsuario($this->email);
        $this->assertTrue($this->nombre == $res->nombre);
        $this->assertTrue($this->email == $res->email);
        $this->assertTrue($hash_password == $res->contrasena);
    }

    public function testConsultarUsuario()
    {
        $hash_password = password_hash($this->contrasena, PASSWORD_DEFAULT);

        $id_usuario = $this->usuario_repository->insertarUsuario($this->nombre, $hash_password, $this->email);

        $this->assertTrue($id_usuario <> false);

        $res = $this->usuario_repository->consultarUsuario($this->email);

        $this->assertEquals($id_usuario, $res->id_usuario);
        $this->assertEquals($this->nombre, $res->nombre);
        $this->assertEquals($this->email, $res->email);
        $this->assertEquals($hash_password, $res->contrasena);
    }

    public function testValidarUsuario()
    {
        $hash_password = password_hash($this->contrasena, PASSWORD_DEFAULT);

        $id_usuario = $this->usuario_repository->insertarUsuario($this->nombre, $hash_password, $this->email);

        $this->assertTrue($id_usuario <> false);

        $res = $this->usuario_repository->validarUsuario($this->nombre, $hash_password);

        $this->assertEquals($id_usuario, $res->id_usuario);
        $this->assertEquals($this->nombre, $res->nombre);
        $this->assertEquals($this->email, $res->email);
        $this->assertEquals($hash_password, $res->contrasena);
    }

    public function testValidarUsuarioError()
    {
        $hash_password = password_hash($this->contrasena, PASSWORD_DEFAULT);

        $id_usuario = $this->usuario_repository->insertarUsuario($this->nombre, $hash_password, $this->email);

        $this->assertTrue($id_usuario <> false);

        $res = $this->usuario_repository->validarUsuario($this->nombre, "123");

        $this->assertFalse($res);
    }

    public function testConsultarUsuarioPorNombre()
    {
        $hash_password = password_hash($this->contrasena, PASSWORD_DEFAULT);

        $id_usuario = $this->usuario_repository->insertarUsuario($this->nombre, $hash_password, $this->email);

        $this->assertTrue($id_usuario <> false);

        $res = $this->usuario_repository->consultarUsuarioPorNombre($this->nombre);

        $this->assertEquals($id_usuario, $res->id_usuario);
        $this->assertEquals($this->nombre, $res->nombre);
        $this->assertEquals($this->email, $res->email);
        $this->assertEquals($hash_password, $res->contrasena);
    }

}
