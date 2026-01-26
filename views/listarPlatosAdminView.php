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

        <!-- TODO: hacer que estén los botones en línea -->
        <div class="botones">
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

                <tr class="tr_producto"> <!-- TODO -->

                <td class="centrado"><?= $plato['nombre'] ?></td>
                <td><?= $plato['descripcion'] ?></td>
                <td class="centrado"><?= $plato['categoria'] ?></td>
                <td class="centrado"><?= $plato['precio'] ?>€</td>
                <td class="centrado"><?php if ($plato['disponible'] == 1) {
                        echo "Sí";
                    } else {
                        echo "No";
                    } ?></td>
                <td><img src="img/croquetas.jpg" alt="<?= $plato['nombre'] ?>"></td>
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
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>
</html>
