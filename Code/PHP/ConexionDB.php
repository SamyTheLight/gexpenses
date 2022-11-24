<?php
define('DATABASE',   'gexpenses');
define('BD_USUARIO', 'root');
define('BD_CLAVE',  '');
define('SERVER_MYSQL', 'mysql:host=localhost;dbname='.DATABASE.';charset=utf8');
try
{
	$conexion = new PDO(SERVER_MYSQL, BD_USUARIO, BD_CLAVE);	
 
        
}
catch(Exception $e)
{

        echo 'Error conectando a la BBDD. '.$e->getMessage(); 
}
 
 