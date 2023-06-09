<?php
//  require_once '../../autoload.php';

use PHPUnit\Framework\TestCase;

class ActividadRepositoryTest extends TestCase
{
    private $conexionDB;
    private $actividadRepository;

    private $nombre = 'Actividad 1';
    private $descripcion = 'Descripción 1';
    private $divisa = 'USD';
    private $tipo_actividad = 'Tipo 1';
    private $id_usuario = 1;
    private $id_actividad = null;

    public function setUp(): void
    {
        // Aquí debes crear un objeto PDO que se conecte a una base de datos de prueba SQLite.
        // Esta base de datos se crea en memoria y se destruye después de cada prueba.
        $this->conexionDB = new PDO('sqlite::memory:');
        $this->conexionDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Crear la tabla actividad en la base de datos de prueba.
        $this->conexionDB->exec("
            CREATE TABLE actividad (
                id_actividad INTEGER PRIMARY KEY AUTOINCREMENT,
                nombre TEXT,
                descripcion TEXT,
                divisa TEXT,
                tipo_actividad TEXT,
                usuario_id_usuario INTEGER,
                fecha DATETIME DEFAULT (datetime('now')),
                fecha_ultima_modificacion DATETIME DEFAULT (datetime('now'))
            )
        ");

        $this->actividadRepository = new ActividadRepository($this->conexionDB);
    }

    public function testInsertarActividad()
    {
        $resultado = $this->actividadRepository->insertarActividad($this->nombre, $this->descripcion, $this->divisa, $this->tipo_actividad, $this->id_usuario);
        $this->assertTrue($resultado <> false);

        $this->id_actividad = $resultado;

        $query = $this->conexionDB->query('SELECT * FROM actividad');
        $actividad = $query->fetch(PDO::FETCH_OBJ);

        $this->assertEquals($this->nombre, $actividad->nombre);
        $this->assertEquals($this->descripcion, $actividad->descripcion);
        $this->assertEquals($this->divisa, $actividad->divisa);
        $this->assertEquals($this->tipo_actividad, $actividad->tipo_actividad);
        $this->assertEquals($this->id_usuario, $actividad->usuario_id_usuario);
    }

    public function testConsultarActividad(){
        $this->id_actividad = $this->actividadRepository->insertarActividad($this->nombre, $this->descripcion, $this->divisa, $this->tipo_actividad, $this->id_usuario);

        $actividad = $this->actividadRepository->consultarActividad($this->id_actividad, $this->id_usuario);

        $this->assertEquals($this->id_actividad, $actividad->id_actividad);
        $this->assertEquals($this->nombre, $actividad->nombre);
        $this->assertEquals($this->descripcion, $actividad->descripcion);
        $this->assertEquals($this->divisa, $actividad->divisa);
        $this->assertEquals($this->tipo_actividad, $actividad->tipo_actividad);
        $this->assertEquals($this->id_usuario, $actividad->usuario_id_usuario);
    }

    public function testListarActividades(){
        $id_actividad1 = $this->actividadRepository->insertarActividad($this->nombre, $this->descripcion, $this->divisa, $this->tipo_actividad, $this->id_usuario);
        sleep(1);
        $id_actividad2 = $this->actividadRepository->insertarActividad($this->nombre, $this->descripcion, $this->divisa, $this->tipo_actividad, $this->id_usuario);
        $id_actividad3 = $this->actividadRepository->insertarActividad($this->nombre, $this->descripcion, $this->divisa, $this->tipo_actividad, $this->id_usuario + 1);

        $resultado = $this->actividadRepository->listarActividades( $this->id_usuario);

        $this->assertTrue(count($resultado) == 2);

        $resultado = $this->actividadRepository->listarActividades( $this->id_usuario + 1);

        $this->assertTrue(count($resultado) == 1);

        $resultado = $this->actividadRepository->listarActividades( $this->id_usuario + 2);

        $this->assertTrue(count($resultado) == 0);


        $actividades = $this->actividadRepository->listarActividades( $this->id_usuario);

        $this->assertTrue($actividades[0]->id_actividad == $id_actividad2);

        sleep(1);

        $this->actividadRepository->modificarActividad($id_actividad1);
        $lista = $this->actividadRepository->listarActividades( $this->id_usuario);
        $lista_modificada = $this->actividadRepository->listarActividades( $this->id_usuario, "modificacion");

        $this->assertTrue($lista[0]->id_actividad == $id_actividad2);
        $this->assertTrue($lista_modificada[0]->id_actividad == $id_actividad1);
    }

    public function testModificarActividad(){

        $this->id_actividad = $this->actividadRepository->insertarActividad($this->nombre, $this->descripcion, $this->divisa, $this->tipo_actividad, $this->id_usuario);

        $actividad = $this->actividadRepository->consultarActividad($this->id_actividad);

        $fecha_inicial = $actividad->fecha_ultima_modificacion;

        sleep(1);

        $this->actividadRepository->modificarActividad($this->id_actividad);

        $actividad_modificada = $this->actividadRepository->consultarActividad($this->id_actividad);

        json_encode($actividad_modificada);

        $fecha_modificada = $actividad_modificada->fecha_ultima_modificacion;

        $this->assertTrue($fecha_modificada>$fecha_inicial);

    }
}