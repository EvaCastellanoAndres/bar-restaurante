<?php
namespace controllers;

use models\Plato;

class ProductosController
{
    public function listarPlatos()
    {
        $plato = new Plato();
        $datos = $plato->listar();
        require __DIR__ . '/../views/listarProductosView.php';
    }
}
