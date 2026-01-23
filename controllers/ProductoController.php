<?php
class ProductoController
{

    public function listarProductos(): void
    {
        session_start();

        $plato = new Plato();
        $bebida = new Bebida();
        $filtro = $_GET['filtrar'] ?? "";

        $platos = $plato->listar($filtro);
        $bebidas = $bebida->listar($filtro);


        if (isset($_SESSION['usuario'])) {
            $usuario=$_SESSION['usuario'];

            require __DIR__ . '/../views/listarProductosUsuarioView.php';
        } else {
            require __DIR__ . '/../views/listarProductosView.php';
        }
    }

}
