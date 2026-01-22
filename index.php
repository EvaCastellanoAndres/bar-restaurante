<?php
require_once 'autoload.php';
require_once 'vendor/autoload.php';

$url = $_GET['url'] ?? 'producto/listarProductos';

$partes = explode('/', $url);
$controlador = ucfirst($partes[0]) . "Controller";
$accion = $partes[1] ?? 'listarProductos';
$parametro = $partes[2] ?? null;
$controladorObjeto = new $controlador();

if (!method_exists($controladorObjeto, $accion)) {
    echo "Error: la acción '$accion' no existe.";
    exit;
}

if ($parametro !== null) {
    $controladorObjeto->$accion($parametro);
} else {
    $controladorObjeto->$accion();
}