<?php
class PedidoController
{
    public function resumenPedido(): void
    {
        session_start();

        $platos = $_POST['platos'] ?? [];
        $bebidas = $_POST['bebidas'] ?? [];
        $pedido = new Pedido();
        $resumen = $pedido->resumen($platos, $bebidas);

        require __DIR__ . '/../views/resumenPedidoView.php';
    }

    public function realizarPedido(): void
    {
        session_start();

        $pedido = new Pedido();
        $pedidoRealizado = $pedido->realizarPedido();


        require __DIR__ . '/../views/realizarPedidoView.php'; // TODO
    }
}