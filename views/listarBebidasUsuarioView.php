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
<?php require 'layout/asideUsuario.php'; ?>

<!-- TABLA -->

<div class="col-10">
    <div class="cuerpo">
        <form action="index.php?url=pedido/resumenPedido" method="post"> <!-- TODO -->

            <label class="select_servicio">
                Tipo de servicio:
                <select name="servicio" required>
                    <option disabled selected value="">Seleccione el tipo de servicio</option>
                    <option value="mesa">En mesa</option>
                    <option value="llevar">Para llevar</option>
                    <option value="domicilio">Entregar a domicilio</option>
                </select>
            </label>

            <table>
            <tr>
                <th>Pedir</th>
                <th>Bebida</th>
                <th>Descripción</th>
                <th>Categoría</th>
                <th>Precio</th>
                <th>Disponible</th>
                <th>Foto</th>
            </tr>
            <?php foreach ($bebidas as $bebida): ?>
                <tr>
                    <td>
                        <input type="number" class="inputPedir" name="bebidas[<?= $bebida['id'] ?>]" min="0" value="0">
                    </td>
                    <td class="centrado"><?= $bebida['nombre'] ?></td>
                    <td><?= $bebida['descripcion'] ?></td>
                    <td class="centrado"><?= $bebida['categoria'] ?></td>
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
            <input type="submit" value="Realizar pedido" class="boton">
        </form>
    </div>
</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>
</html>
