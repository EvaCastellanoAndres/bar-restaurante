
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
            <?php foreach ($pedido as $detalle): ?>
                <tr>
                    <td class="centrado"><?= $detalle['tipo_servicio'] ?></td>
                    <td><?= $detalle['estado'] ?></td>
                    <td><?= $detalle['fecha_hora'] ?></td>
                    <td></td>
                </tr>
            <?php endforeach; ?>
        </table>




    </div>
</div>