<?php require 'layout/header.php'; ?>
<ul class="nav justify-content-center nav-tabs">
    <li class="nav-item">
        <a class="nav-link" href="index.php?url=producto/listarProductos">Todos los productos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="index.php?url=plato/listar">Platos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">Bebidas</a>
    </li>
</ul>
</div>

<!-- SESIONES -->
<?php require 'layout/aside.php'; ?>

<!-- TABLA -->

<div class="col-10">
    <div class="cuerpo">
        <table>
            <tr>
                <th>Producto</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Disponible</th>
                <th>Foto</th>
            </tr>
            <?php foreach ($bebidas as $bebida): ?>
                <tr class="tr_producto" data-bs-toggle="modal" data-bs-target="#modalDetallesBebida<?= $bebida['id'] ?>">
                    <td class="centrado"><?= $bebida['nombre'] ?></td>
                    <td><?= $bebida['descripcion'] ?></td>
                    <td class="centrado"><?= $bebida['precio'] ?>€</td>
                    <td class="centrado"><?php if ($bebida['disponible'] == 1) {
                            echo "Sí";
                        } else {
                            echo "No";
                        } ?></td>
                    <td class="centrado"><img src="img/<?= $bebida['foto'] ?>" alt="<?= $bebida['nombre'] ?>"></td>
                </tr>

                <!-- Tarjeta detalle bebida -->
                <div class="modal fade"
                     id="modalDetallesBebida<?= $bebida['id'] ?>"
                     tabindex="-1"
                     aria-hidden="true">

                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h3 class="modal-title">
                                    <?= $bebida['nombre'] ?>
                                </h3>
                                <button type="button" class="btn-close"
                                        data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <p><?= $bebida['descripcion'] ?></p>
                                <p><?= $bebida['precio'] ?>€</p>
                                <p><?php if ($bebida['disponible'] == 1) {
                                        echo "Está disponible para pedir";
                                    } else {
                                        echo "No está disponible para pedir";
                                    } ?></p>
                                <img src="img/<?= $bebida['foto'] ?>" alt=" <?= $bebida['nombre'] ?>">
                            </div>

                            <div class="modal-footer">
                                <button type="button"
                                        class="btn btn-secondary"
                                        data-bs-dismiss="modal">
                                    Cerrar
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </table>
    </div>
</div>
    <!-- FOOTER -->
<?php require 'layout/footer.php'; ?>