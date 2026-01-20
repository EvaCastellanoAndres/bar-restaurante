<?php
function autoload ($class)
{
    $rutas = [
        __DIR__ . "/controllers/$class.php",
        __DIR__ . "/models/$class.php",
        __DIR__ . "/config/$class.php"
    ];

    foreach ($rutas as $ruta) {
        if (file_exists($ruta)) {
            require_once $ruta;
        }
    }

};
spl_autoload_register("autoload");