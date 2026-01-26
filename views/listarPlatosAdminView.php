<?php require 'layout/header.php'; ?>

<ul class="nav justify-content-center nav-tabs">
    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="index.php?url=producto/listarProductos">Todos los productos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">Platos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="index.php?url=bebida/listar">Bebidas</a>
    </li>
</ul>
</div>

<!-- SESIONES -->
<?php require 'layout/asideUsuario.php'; ?>

<!-- TABLA -->

<div class="col-10">
    <div class="cuerpo">

        <div class="botones enLinea">
            <form action="index.php?url=producto/formulario" method="post">
                <input type="submit" value="Añadir producto">
            </form>
            <form action="index.php?url=producto/categoria" method="post">
                <input type="submit" value="Añadir categoría">
            </form>
        </div>

        <table>
            <tr>
                <th>Producto</th>
                <th>Descripción</th>
                <th>Categoría</th>
                <th>Precio</th>
                <th>Disponible</th>
                <th>Foto</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
            <?php foreach ($platos as $plato) : ?>

                <tr class="tr_producto" data-bs-toggle="modal" data-bs-target="#modalDetalles<?= $plato['id'] ?>">

                <td class="centrado"><?= $plato['nombre'] ?></td>
                <td><?= $plato['descripcion'] ?></td>
                <td class="centrado"><?= $plato['categoria'] ?></td>
                <td class="centrado"><?= $plato['precio'] ?>€</td>
                <td class="centrado"><?php if ($plato['disponible'] == 1) {
                        echo "Sí";
                    } else {
                        echo "No";
                    } ?></td>
                    <td class="centrado"><img src="img/<?=$plato['foto']?>" alt="<?= $plato['nombre'] ?>"></td>
                <td class="centrado">
                    <a href="index.php?url=plato/editar&id=<?= $plato['id'] ?>">
                        <img src="img/icons/editar.png" alt="icono editar" class="icono">
                    </a>
                </td>
                <td class="centrado">
                    <a data-bs-toggle="modal" data-bs-target="#modalEliminar<?= $plato['id'] ?>">
                        <img src="img/icons/borrar.png" alt="icono borrar" class="icono">
                    </a>
                </td>
                </tr>

                <!-- Tarjeta detalle plato -->
                <div class="modal fade"
                     id="modalDetalles<?= $plato['id'] ?>"
                     tabindex="-1"
                     aria-hidden="true">

                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h3 class="modal-title">
                                    <?= $plato['nombre'] ?>
                                </h3>
                                <button type="button" class="btn-close"
                                        data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <p><?= $plato['descripcion'] ?></p>
                                <p><?= $plato['precio'] ?>€</p>
                                <p><?php if ($plato['disponible'] == 1) {
                                        echo "Está disponible para pedir";
                                    } else {
                                        echo "No está disponible para pedir";
                                    } ?></p>
                                <img src="img/<?= $plato['foto'] ?>" alt=" <?= $plato['nombre'] ?>">
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

            <!-- tarjeta confirmación eliminar -->
                <div class="modal fade"
                     id="modalEliminar<?= $plato['id'] ?>"
                     tabindex="-1"
                     aria-hidden="true">

                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h3 class="modal-title">
                                    ¿Eliminar plato <b><?= $plato['nombre'] ?></b>?
                                </h3>
                                <button type="button" class="btn-close"
                                        data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-footer">
                                <button type="button"
                                        class="btn btn-secondary"
                                        data-bs-dismiss="modal">
                                    Cancelar
                                </button>

                                <a href="index.php?url=plato/eliminar&id=<?= $plato['id'] ?>"
                                   class="btn btn-danger">
                                    Eliminar
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </table>
    </div>
</div>
<?php require 'layout/footer.php'; ?>
