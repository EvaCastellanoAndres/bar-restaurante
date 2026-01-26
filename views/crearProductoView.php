<?php require 'layout/header.php'; ?>
</div>

<div class="fondo">
    <div class="caja">
        <h2>Añadir nuevo producto</h2>
        <form action="index.php?url=producto/crearProducto" method="post" enctype="multipart/form-data">

            <label class="labelNuevoProducto">
                Tipo de producto
                <br>
                <select name="tipoProducto" class="selectTipoProducto">
                    <option value="plato">Plato</option>
                    <option value="bebida">Bebida</option>
                </select>
            </label>

            <br>
            <label class="labelNuevoProducto">
                Nombre del producto
                <br>
                <input type="text" name="nombre">
            </label>

            <br>
            <label class="labelNuevoProducto">
                Descripción
                <br>
                <textarea name="descripcion" cols="30" rows="4"></textarea>
            </label>

            <br>
            <label class="labelNuevoProducto">
                Precio (€)
                <br>
                <input type="number" name="precio" min="0">
            </label>

            <br>
            <label class="labelNuevoProducto">
                Categoría
                <br>
                <select name="categoria" class="selectCategoria">
                    <?php foreach ($categorias as $categoria) : ?>
                        <option value="<?= $categoria ?>"><?= $categoria ?></option>
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
            <input type="submit" value="Añadir" class="botonAñadir">

        </form>
    </div>
</div>

</body>
</html>