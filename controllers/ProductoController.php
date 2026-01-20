<?php
class ProductoController
{
    public function listarPlatos(): void
    {
        $plato = new Plato();
        $platos = $plato->listar();
        require __DIR__ . '/../views/listarProductosView.php';
    }

    public function listarBebidas(): void
    {
        $bebida = new Bebida();
        $bebidas = $bebida->listar();
        require __DIR__ . '/../views/listarProductosView.php';
    }

    public function listarProductos(): void
    {
        $plato = new Plato();
        $platos = $plato->listar();
        require __DIR__ . '/../views/listarProductosView.php';
    }


}
