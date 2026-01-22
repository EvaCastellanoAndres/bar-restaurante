<?php require 'layout/header.php'; ?>

<ul class="nav justify-content-center nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">Todos los productos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="index.php?url=plato/listar">Platos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="index.php?url=bebida/listar">Bebidas</a>
    </li>
</ul>
</div>

<!-- SESIONES -->
<?php require 'layout/aside.php'; ?>

<!-- TABLA -->

<div class="col-10">
    <div class="cuerpo">
        <img src="../img/croquetas.jpg" alt="">
        <table>
            <tr>
                <th>Producto</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Disponible</th>
                <th>Foto</th>
            </tr>
            <?php foreach ($platos as $plato) : ?>

                    <tr class="tr_producto" onclick="window.location='detalle.php?id=<?= $plato['id'] ?>'"> <!-- TODO -->

                    <td class="centrado"><?= $plato['nombre'] ?></td>
                    <td><?= $plato['descripcion'] ?></td>
                    <td class="centrado"><?= $plato['precio'] ?>€</td>
                    <td class="centrado"><?php if ($plato['disponible'] == 1) {
                            echo "Sí";
                        } else {
                            echo "No";
                        } ?></td>
                    <td><img src="../img/croquetas.jpg" alt="<?= $plato['nombre'] ?>"></td>
                       </tr>

            <?php endforeach; ?>
            <?php foreach ($bebidas as $bebida): ?>
                <tr class="tr_producto">
                    <td class="centrado"><?= $bebida['nombre'] ?></td>
                    <td><?= $bebida['descripcion'] ?></td>
                    <td class="centrado"><?= $bebida['precio'] ?>€</td>
                    <td class="centrado"><?php if ($bebida['disponible'] == 1) {
                            echo "Sí";
                        } else {
                            echo "No";
                        } ?></td>
                    <td><?= $bebida['foto'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>
</html>
