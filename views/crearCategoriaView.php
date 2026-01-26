<?php require 'layout/header.php'; ?>
</div>

<div class="fondo">
    <div class="caja">
        <h2>Añadir nueva categoría</h2>
        <form action="index.php?url=producto/crearCategoria" method="post">

            <label class="labelNuevoProducto">
                Nombre de la categoria
                <br>
                <input type="text" name="nombre">
            </label>

            <br>
            <label class="labelNuevoProducto">
                Tipo de producto al que pertenece
                <br>
                <select name="tipoProducto" class="selectTipoProducto">
                    <option value="platos">Platos</option>
                    <option value="bebidas">Bebidas</option>
                </select>
            </label>

            <br>
            <input type="submit" value="Añadir" class="botonAñadir">
        </form>
    </div>
</div>

</body>
</html>