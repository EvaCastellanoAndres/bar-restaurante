<?php
class ProductoController
{

    public function listarProductos(): void
    {
        session_start();

        $plato = new Plato();
        $bebida = new Bebida();

        $platos = $plato->listar();
        $bebidas = $bebida->listar();


        if (isset($_SESSION['usuario'])) {
            require __DIR__ . '/../views/listarProductosUsuarioView.php';
        } else {
            require __DIR__ . '/../views/listarProductosView.php';
        }
    }



}
