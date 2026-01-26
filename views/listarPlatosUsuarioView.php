<?php require 'layout/header.php'; ?>
<ul class="nav justify-content-center nav-tabs">
    <li class="nav-item">
        <a class="nav-link" href="index.php?url=producto/listarProductos">Todos los productos</a>
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
        <form action="index.php?url=pedido/resumenPedido" method="post">

            <label class="select_servicio">
                Tipo de servicio:
                <select name="servicio" required>
                    <option value="mesa">En mesa</option>
                    <option value="llevar">Para llevar</option>
                    <option value="domicilio">Entregar a domicilio</option>
                </select>
            </label>

        <table>
            <tr>
                <th>Pedir</th>
                <th>Plato</th>
                <th>Descripción</th>
                <th>Categoría</th>
                <th>Precio</th>
                <th>Disponible</th>
                <th>Foto</th>
            </tr>
            <?php foreach ($platos as $plato) : ?>
                <tr class="tr_producto">
                    <td>
                        <input type="number" class="inputPedir" name="platos[<?= $plato['id'] ?>]" min="0" value="0" <?php if($plato['disponible']==0):?>disabled<?php endif;?>>
                    </td>
                    <td class="centrado" data-bs-toggle="modal" data-bs-target="#modalDetalles<?= $plato['id'] ?>"><?= $plato['nombre'] ?></td>
                    <td data-bs-toggle="modal" data-bs-target="#modalDetalles<?= $plato['id'] ?>"><?= $plato['descripcion'] ?></td>
                    <td class="centrado" data-bs-toggle="modal" data-bs-target="#modalDetalles<?= $plato['id'] ?>"><?= $plato['categoria'] ?></td>
                    <td class="centrado" data-bs-toggle="modal" data-bs-target="#modalDetalles<?= $plato['id'] ?>"><?= $plato['precio'] ?>€</td>
                    <td class="centrado" data-bs-toggle="modal" data-bs-target="#modalDetalles<?= $plato['id'] ?>"><?php if ($plato['disponible'] == 1) {
                            echo "Sí";
                        } else {
                            echo "No";
                        } ?></td>
                    <td class="centrado" data-bs-toggle="modal" data-bs-target="#modalDetalles<?= $plato['id'] ?>"><img src="img/<?=$plato['foto']?>" alt="<?= $plato['nombre'] ?>"></td>
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
            <?php endforeach; ?>
        </table>
            <input type="submit" value="Realizar pedido" class="boton">
        </form>
    </div>
</div>
<?php require 'layout/footer.php'; ?>
