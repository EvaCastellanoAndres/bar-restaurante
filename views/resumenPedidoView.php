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
                <th>Precio</th>
                <th>Foto</th>
            </tr>
            <?php foreach ($resumen as $producto): ?>
                <tr>
                    <td class="centrado"><?= $producto['cantidad'] ?></td>
                    <td><?= $producto['nombre'] ?></td>
                    <td><?= $producto['descripcion'] ?></td>
                    <td><?= $producto['categoria'] ?></td>
                    <td class="centrado"><?= $producto['precio'] ?> €</td>
                    <td></td>
                </tr>
                <?php $total += $producto['precio'] * $producto['cantidad']; ?>
            <?php endforeach; ?>
        </table>
        <p><b>Total: <?= $total ?>€</b></p>

        <form action="index.php?url=produto/listar" method="post">
            <input type="submit" value="Volver">
        </form>

        <form action="index.php?url=pedido/realizarPedido" method="post">
            <input type="submit" value="Pedir">
        </form>
    </div>
</div>