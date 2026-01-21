<?php
class BebidaController
{
    public function listar(): void
    {
        session_start();

        $bebida = new Bebida();
        $bebidas = $bebida->listar();

        if (isset($_SESSION['usuario'])) {
            require __DIR__ . '/../views/listarBebidasUsuarioView.php';
        } else {
            require __DIR__ . '/../views/listarBebidasView.php';
        }
    }
}