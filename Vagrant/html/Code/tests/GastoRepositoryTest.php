<?php
//  require_once '../../autoload.php';

use PHPUnit\Framework\TestCase;

class GastoRepositoryTest extends TestCase
{
    private $conexionDB;
    private $gasto_repository;
    private $id_gasto = 1;
    private $actividad_id_actividad = 1;
    private $concepto = 'Comprar pelotas';
    private $pagador = 'Pepe';
    private $cantidad = 100.50;

    public function setUp(): void
    {
        // Aquí debes crear un objeto PDO que se conecte a una base de datos de prueba SQLite.
        // Esta base de datos se crea en memoria y se destruye después de cada prueba.
        $this->conexionDB = new PDO('sqlite::memory:');
        $this->conexionDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Crear la tabla actividad en la base de datos de prueba.
        $this->conexionDB->exec("
        CREATE TABLE IF NOT EXISTS gasto (
            id_gasto INTEGER PRIMARY KEY AUTOINCREMENT,
            actividad_id_actividad INTEGER NOT NULL,
            concepto VARCHAR(200) DEFAULT NULL,
            pagador VARCHAR(45) DEFAULT NULL,
            cantidad DECIMAL(6,2) DEFAULT NULL,
            fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (actividad_id_actividad)
              REFERENCES actividad (id_actividad)
              ON DELETE NO ACTION
              ON UPDATE NO ACTION
          );
          ");
        $this->gasto_repository = new GastoRepository($this->conexionDB);
    }

    public function testInsertarGasto()
    {
        // Ejecutar la función a probar
        $id_gasto = $this->gasto_repository->insertarGasto($this->actividad_id_actividad, $this->concepto, $this->pagador, $this->cantidad);

        // Verificar el resultado
        $this->assertGreaterThan(0, $id_gasto);
        $this->assertEquals(1, $id_gasto);
        $this->assertTrue($id_gasto <> false);

        $query ="SELECT * FROM gasto WHERE id_gasto = :id_gasto";
        $consulta = $this->conexionDB->prepare($query);
        $consulta->bindParam(':id_gasto', $id_gasto);
        $consulta->execute();
        $gasto = $consulta->fetch(PDO::FETCH_OBJ);

        $this->assertEquals($this->actividad_id_actividad, $gasto->actividad_id_actividad);
        $this->assertEquals($this->concepto, $gasto->concepto);
        $this->assertEquals($this->pagador, $gasto->pagador);
        $this->assertEquals($this->cantidad, $gasto->cantidad);
        $this->assertEquals($id_gasto, $gasto->id_gasto);
    }

    public function testConsultarGasto(){
        $this->id_gasto = $this->gasto_repository->insertarGasto($this->actividad_id_actividad, $this->concepto, $this->pagador, $this->cantidad, $this->id_gasto);

        $gasto = $this->gasto_repository->consultargasto($this->id_gasto);

        $this->assertEquals($this->id_gasto, $gasto->id_gasto);
        $this->assertEquals($this->actividad_id_actividad, $gasto->actividad_id_actividad);
        $this->assertEquals($this->concepto, $gasto->concepto);
        $this->assertEquals($this->pagador, $gasto->pagador);
        $this->assertEquals($this->cantidad, $gasto->cantidad);
    }

    public function testListarGasto(){
        $this->id_gasto = $this->gasto_repository->insertarGasto($this->actividad_id_actividad, $this->concepto, $this->pagador, $this->cantidad);
        $this->id_gasto = $this->gasto_repository->insertarGasto($this->actividad_id_actividad, $this->concepto, $this->pagador, $this->cantidad);
        $this->id_gasto = $this->gasto_repository->insertarGasto($this->actividad_id_actividad+1, $this->concepto, $this->pagador, $this->cantidad);

        $resultado = $this->gasto_repository->listarGasto( $this->actividad_id_actividad);

        $this->assertTrue(count($resultado) == 2);

        $resultado = $this->gasto_repository->listarGasto( $this->actividad_id_actividad + 1);

        $this->assertTrue(count($resultado) == 1);

        $resultado = $this->gasto_repository->listarGasto( $this->actividad_id_actividad + 2);

        $this->assertTrue(count($resultado) == 0);
    }
}