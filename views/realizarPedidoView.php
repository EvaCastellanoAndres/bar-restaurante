
<?php require 'layout/header.php'; ?>
</div>
<?php require 'layout/asideUsuario.php'; ?>

<div class="col-10">
    <div class="cuerpo">
        <h3>Tu pedido se ha realizado con éxito</h3>
        <h4>Detalles del pedido:</h4>
        <table>
            <tr>
                <th>Tipo de servicio</th>
                <th>Estado</th>
                <th>Fecha y hora</th>
            </tr>
            <?php foreach ($pedidoDetalle as $detalle): ?>
                <tr>
                    <td class="centrado"><?= $tipoServicio ?></td>
                    <td><?= $detalle['estado'] ?></td>
                    <td><?= $detalle['fecha_hora'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <a href="index.php?url=producto/listarProductos" class="linkBoton botones">Volver a la página principal</a>
    </div>
</div>