<?php
class PedidoController
{
    public function resumenPedido(): void
    {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php?url=producto/listarProductos');
            exit();
        }

        $platos = $_POST['platos'] ?? [];
        $bebidas = $_POST['bebidas'] ?? [];

        $pedido = new Pedido();
        $resumen = $pedido->resumen($platos, $bebidas);

        require __DIR__ . '/../views/resumenPedidoView.php';
    }

    public function realizarPedido(): void
    {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php?url=producto/listarProductos');
            exit();
        }

        $pedido = new Pedido();
        $idPedido = $pedido->realizarPedido();

        $tipoServicio = $_POST['servicio'] ?? 'en mesa';
        $pedidoDetalle = $pedido->getPedidoDetalle($idPedido);

        require __DIR__ . '/../views/realizarPedidoView.php';
    }
}
