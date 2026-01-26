<?php $total = 0;
?>

<?php require 'layout/header.php'; ?>
</div>
<?php require 'layout/asideUsuario.php'; ?>


<div class="col-10">
    <div class="cuerpo">
        <h2>Resumen del pedido</h2>
        <table>
            <tr>
                <th>Cantidad</th>
                <th>Producto</th>
                <th>Descripción</th>
                <th>Categoría</th>
                <th>Precio unidad</th>
                <th>Foto</th>
            </tr>
            <?php foreach ($resumen as $producto): ?>
                <tr>
                    <td class="centrado"><?= $producto['cantidad'] ?></td>
                    <td><?= $producto['nombre'] ?></td>
                    <td><?= $producto['descripcion'] ?></td>
                    <td><?= $producto['categoria'] ?></td>
                    <td class="centrado"><?= $producto['precio'] ?> €</td>
                    <td class="centrado"><img src="img/<?= $producto['foto'] ?>" alt="<?= $producto['nombre'] ?>"></td>
                </tr>
                <?php $total += $producto['precio'] * $producto['cantidad']; ?>
            <?php endforeach; ?>
        </table>
        <p class="total"><b>Total: <?= $total ?>€</b></p>

        <div class="enLinea">

            <!-- boton de volver atras y que se guarden los datos -->
            <form action="index.php?url=producto/listarProductos" method="post">
                <?php foreach ($resumen as $producto): ?>
                    <?php if ($producto['tipo'] === 'plato'): ?>
                        <input type="hidden" name="platos[<?= $producto['id'] ?>]" value="<?= $producto['cantidad'] ?>">
                    <?php else: ?>
                        <input type="hidden" name="bebidas[<?= $producto['id'] ?>]" value="<?= $producto['cantidad'] ?>">
                    <?php endif; ?>
                <?php endforeach; ?>

                <input type="hidden" name="servicio" value="<?= $_POST['servicio'] ?>">
                <input type="submit" value="Volver">
            </form>




            <form action="index.php?url=pedido/realizarPedido" method="post">
                <?php foreach ($resumen as $producto): ?>
                    <?php if ($producto['tipo'] === 'plato'): ?>
                        <input type="hidden" name="platos[<?= $producto['id'] ?>]" value="<?= $producto['cantidad'] ?>">
                    <?php else: ?>
                        <input type="hidden" name="bebidas[<?= $producto['id'] ?>]"
                               value="<?= $producto['cantidad'] ?>">
                    <?php endif; ?>
                <?php endforeach; ?>
                <input type="hidden" name="servicio" value="<?= $_POST['servicio'] ?>">

                <input type="submit" value="Pedir">
            </form>
        </div>
    </div>
</div>