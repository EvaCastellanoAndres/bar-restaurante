<?php require 'layout/header.php'; ?>
</div>

<div class="fondo">
    <div class="caja">
        <h2>Editar bebida "<?= $datosBebida['nombre'] ?>"</h2>
        <form action="index.php?url=bebida/editarBebida" method="post" enctype="multipart/form-data">


            <label class="labelNuevoProducto">
                Nombre del producto
                <br>
                <input type="text" name="nombre" value="<?= $datosBebida['nombre'] ?>">
            </label>

            <br>
            <label class="labelNuevoProducto">
                Descripción
                <br>
                <textarea name="descripcion" cols="30" rows="4"><?= $datosBebida['descripcion'] ?></textarea>
            </label>

            <br>
            <label class="labelNuevoProducto">
                Precio (€)
                <br>
                <input type="number" name="precio" min="0" value="<?= $datosBebida['precio'] ?>">
            </label>

            <br>
            <label class="labelNuevoProducto">
                Categoría
                <br>
                <select name="categoria" class="selectCategoria">
                    <?php
                    $categorias = array_unique($categorias);
                    foreach ($categorias as $categoria) : ?>
                        <option value="<?= $categoria ?>">
                            <?= $categoria ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </label>
            <br>
            <label class="labelNuevoProducto">
                Foto
                <br>
                <input type="file" name="foto">
            </label>

            <br>
            <input type="hidden" name="id" value="<?= $datosBebida['id'] ?>">
            <input type="submit" value="Añadir" class="botonAñadir">

        </form>
    </div>
</div>

</body>
</html>