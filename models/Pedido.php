<?php

class Pedido
{
    private $db;

    public function __construct()
    {
        $this->db = new Db();
    }

    public function resumen($platos, $bebidas)
    {
        $resumen = [];

        foreach ($platos as $id => $cantidad) {
            if ($cantidad > 0) {
                $sql = "SELECT * FROM platos WHERE id = ?";
                $stmt = $this->db->lanzar_consulta($sql, [$id]);
                $producto = $stmt->fetch(PDO::FETCH_ASSOC);
                $producto['cantidad'] = $cantidad;
                $producto['tipo'] = 'plato';
                $resumen[] = $producto;
            }
        }

        foreach ($bebidas as $id => $cantidad) {
            if ($cantidad > 0) {
                $sql = "SELECT * FROM bebidas WHERE id = ?";
                $stmt = $this->db->lanzar_consulta($sql, [$id]);
                $producto = $stmt->fetch(PDO::FETCH_ASSOC);
                $producto['cantidad'] = $cantidad;
                $producto['tipo'] = 'bebida';
                $resumen[] = $producto;
            }
        }

        return $resumen;
    }

    public function realizarPedido($platos, $bebidas, $tipoServicio = 'en mesa', $mesa = null)
    {
        session_start();

        $usuario = $_SESSION['usuario'];

        $sql = "SELECT id FROM usuarios WHERE usuario = :usuario";
        $stmt = $this->db->lanzar_consulta($sql, [':usuario' => $usuario]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        $idUsuario = $usuario['id'];

        $total = 0;
        $resumen = $this->resumen($platos, $bebidas);
        foreach ($resumen as $item) {
            $total += $item['precio'] * $item['cantidad'];
        }

        $sql = "INSERT INTO pedidos (id_usuario, tipo_servicio, mesa, coste_total) 
                VALUES (:id_usuario, :tipo_servicio, :mesa, :coste_total)";
        $stmt = $this->db->lanzar_consulta($sql, [
            ':id_usuario' => $idUsuario,
            ':tipo_servicio' => $tipoServicio,
            ':mesa' => $mesa,
            ':coste_total' => $total
        ]);

        $idPedido = $this->db->getConexion()->lastInsertId();

        foreach ($resumen as $item) {
            $sql = "INSERT INTO pedido_detalle (id_pedido, tipo, id_producto, cantidad, precio)
                    VALUES (:id_pedido, :tipo, :id_producto, :cantidad, :precio)";
            $this->db->lanzar_consulta($sql, [
                ':id_pedido' => $idPedido,
                ':tipo' => $item['tipo'],
                ':id_producto' => $item['id'],
                ':cantidad' => $item['cantidad'],
                ':precio' => $item['precio']
            ]);
        }

        return $idPedido; // opcional: devolver id para mostrar resumen
    }
}
