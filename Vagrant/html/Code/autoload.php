<?php

spl_autoload_register(function ($class) {
    // convierte el namespace en ruta del directorio,
    // por ejemplo, "App\Controller\Test" se convierte en "App/Controller/Test.php"
    $path = str_replace('\\', '/', $class);
    
    // añade la extensión .php al final
    $file = $path . '.php';
    
    // verifica si el archivo existe
    if (file_exists($file)) {
        // si existe, lo incluye
        require_once $file;
    }

    $base_dir = __DIR__ . '/PHP/Repositories/';
    
    $file = $base_dir . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});