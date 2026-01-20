<?php

namespace controllers;
use models\Plato;

class PlatoController
{
    public function listarPlatos(): void
    {
        $plato = new Plato();
        $platos = $plato->listar();
        require __DIR__ . '/../views/listarProductosView.php';
    }
}