<?php
class PedidoController
{
    public function resumenPedido(): void
    {
        session_start();

        $platos = $_POST['plato'] ?? [];
        $bebidas = $_POST['bebida'] ?? [];
        $pedido = new Pedido();
        $resumen = $pedido->resumen($platos, $bebidas);

        require __DIR__ . '/../views/resumenPedidoView.php';
    }

    public function realizarPedido(): void
    {
        $platos = $_POST['plato'] ?? [];
        $bebidas = $_POST['bebida'] ?? [];
        $pedido = new Pedido();
        $pedidoRealizado = $pedido->realizarPedido($platos, $bebidas);


        require __DIR__ . '/../views/realizarPedidoView.php'; // TODO
    }
}