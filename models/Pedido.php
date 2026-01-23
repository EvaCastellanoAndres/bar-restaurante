<?php

class Pedido
{
    private $db;

    public function __construct()
    {
        $this->db = new Db();
    }

    public function resumen($platos, $bebidas) : array
    {
        $resumen = [];
        foreach ($platos as $id => $cantidad) {
            if ((int)$cantidad > 0) {
                $stmt = $this->db->lanzar_consulta("SELECT * FROM platos WHERE id = ?", [$id]);
                $producto = $stmt->fetch(PDO::FETCH_ASSOC);
                if (!$producto) continue;

                $producto['cantidad'] = (int)$cantidad;
                $producto['tipo'] = 'plato';
                $resumen[] = $producto;
            }
        }
        foreach ($bebidas as $id => $cantidad) {
            if ((int)$cantidad > 0) {
                $stmt = $this->db->lanzar_consulta("SELECT * FROM bebidas WHERE id = ?", [$id]);
                $producto = $stmt->fetch(PDO::FETCH_ASSOC);
                if (!$producto) continue;

                $producto['cantidad'] = (int)$cantidad;
                $producto['tipo'] = 'bebida';
                $resumen[] = $producto;
            }
        }
        return $resumen;
    }


    public function realizarPedido()
    {
        if (!isset($_SESSION['usuario'])) {
            throw new Exception("No hay usuario logueado");
        }

        // Recoger datos del formulario
        $platos = $_POST['platos'] ?? [];
        $bebidas = $_POST['bebidas'] ?? [];
        $tipoServicio = $_POST['servicio'] ?? 'en mesa';

        // Usuario
        $stmt = $this->db->lanzar_consulta("SELECT id FROM usuarios WHERE usuario = :usuario", [
            ':usuario' => $_SESSION['usuario']
        ]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$usuario) {
            throw new Exception("Usuario no encontrado");
        }
        $idUsuario = $usuario['id'];

        // Resumen y total
        $resumen = $this->resumen($platos, $bebidas);
        if (empty($resumen)) {
            throw new Exception("No hay productos seleccionados");
        }

        $total = 0;
        foreach ($resumen as $item) {
            $total += $item['precio'] * $item['cantidad'];
        }

        // Insertar pedido
        $this->db->lanzar_consulta(
            "INSERT INTO pedidos (id_usuario, tipo_servicio) VALUES (:id_usuario, :tipo_servicio)",
            [':id_usuario' => $idUsuario, ':tipo_servicio' => $tipoServicio]
        );
        $idPedido = $this->db->lastInsertId();

        // Insertar detalle
        foreach ($resumen as $item) {
            if ($item['tipo'] === 'plato') {
                $sql = "INSERT INTO pedido_detalle (id_pedido, id_plato, cantidad, precio_unidad)
                        VALUES (:id_pedido, :id_plato, :cantidad, :precio_unidad)";
                $params = [
                    ':id_pedido' => $idPedido,
                    ':id_plato' => $item['id'],
                    ':cantidad' => $item['cantidad'],
                    ':precio_unidad' => $item['precio']
                ];
            } else { // bebida
                $sql = "INSERT INTO pedido_detalle (id_pedido, id_bebida, cantidad, precio_unidad)
                        VALUES (:id_pedido, :id_bebida, :cantidad, :precio_unidad)";
                $params = [
                    ':id_pedido' => $idPedido,
                    ':id_bebida' => $item['id'],
                    ':cantidad' => $item['cantidad'],
                    ':precio_unidad' => $item['precio']
                ];
            }
            $this->db->lanzar_consulta($sql, $params);
        }

        return $idPedido;
    }
}
