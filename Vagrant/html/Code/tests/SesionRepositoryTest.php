<?php
//  require_once '../../autoload.php';

use PHPUnit\Framework\TestCase;

class SesionRepositoryTest extends TestCase
{
    //Declaro la conexion a la base de datos, instancio la clase SesionRepository y incluyo el id del usuario
    private $conexionDB;
    private $sesionRepository;
    private $usuario_id_usuario;

    public function setUp(): void
    {
        // Aquí se debe crear un objeto PDO que se conecte a una base de datos de prueba SQLite.
        // Esta base de datos se crea en memoria y se destruye después de cada prueba.
        $this->conexionDB = new PDO('sqlite::memory:');
        $this->conexionDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Crear la tabla actividad en la base de datos de prueba.
        $this->conexionDB->exec("
        CREATE TABLE sesion (
            id_sesion INTEGER PRIMARY KEY AUTOINCREMENT,
            usuario_id_usuario INTEGER NOT NULL,
            fecha_inicio TIMESTAMP NOT NULL DEFAULT (strftime('%Y-%m-%d %H:%M:%S', 'now', 'localtime')),
            fecha_fin TIMESTAMP NULL,
            token CHAR(32) NOT NULL
        );
        ");

        $this->sesionRepository = new SesionRepository($this->conexionDB);
        $this->usuario_id_usuario = 1;
    }

    public function testInsertarSesion(){

        $res = $this->sesionRepository->insertarSesion($this->usuario_id_usuario);

        $this->assertTrue($res <> false);
        $this->assertTrue(strlen($res) == 32);
    }

    public function testConsultarSesion(){
        $token = $this->sesionRepository->insertarSesion($this->usuario_id_usuario);

        $this->assertTrue($token <> false);
        $this->assertTrue(strlen($token) == 32);

        $res = $this->sesionRepository->consultarSesion($token, $this->usuario_id_usuario);

        $this->assertEquals($token, $res->token);
    }

    public function testConsultarSesionError(){
        $token = $this->sesionRepository->insertarSesion($this->usuario_id_usuario);

        $this->assertTrue($token <> false);
        $this->assertTrue(strlen($token) == 32);

        $token = substr_replace($token, "pepito", -6);

        $res = $this->sesionRepository->consultarSesion($token, $this->usuario_id_usuario);

        $this->assertFalse($res);
    }

    public function testCerrarSesion(){
        $token = $this->sesionRepository->insertarSesion($this->usuario_id_usuario);

        $this->assertTrue($token <> false);
        $this->assertTrue(strlen($token) == 32);

        $res = $this->sesionRepository->consultarSesion($token, $this->usuario_id_usuario);

        $this->assertEquals($token, $res->token);

        $res = $this->sesionRepository->cerrarSesion($token, $this->usuario_id_usuario);
        $this->assertEquals($res, 1);

        $res = $this->sesionRepository->consultarSesion($token, $this->usuario_id_usuario);
        $this->assertFalse($res);
    }

}