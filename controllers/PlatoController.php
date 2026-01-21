<?php

class PlatoController
{
    public function listar(): void
    {
        session_start();

        $plato = new Plato();
        $platos = $plato->listar();

        if (isset($_SESSION['usuario'])) {
            require __DIR__ . '/../views/listarPlatosUsuarioView.php';
        } else {
            require __DIR__ . '/../views/listarPlatosView.php';
        }
    }
}