<?php
spl_autoload_register(function ($class)
{
    $rutas = [
        __DIR__ . "/app/controllers/$class.php",
        __DIR__ . "/app/models/$class.php",
        __DIR__ . "/app/config/$class.php"
    ];

    foreach ($rutas as $ruta) {
        if (file_exists($ruta)) {
            require_once $ruta;
        }
    }

});

