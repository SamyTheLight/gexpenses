<?php
define('DATABASE',   'GExpensesBBDD');
define('BD_USUARIO', 'gexpensesuser');
define('BD_CLAVE', '1234');
define('SERVER_MYSQL', 'mysql:host=172.16.0.10;dbname=' . DATABASE . ';charset=utf8');
try {
        $conexion = new PDO(SERVER_MYSQL, BD_USUARIO, BD_CLAVE);
} catch (Exception $e) {

        echo 'Error conectando a la BBDD. ' . $e->getMessage();
}