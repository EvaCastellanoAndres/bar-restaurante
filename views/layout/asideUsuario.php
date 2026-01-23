<?php
if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
}

$filtro = "";

if (isset($_GET['filtrar'])) {
    $filtro = $_GET['filtrar'];
}

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-2">
            <aside>

                <h2>Bienvenidx, <?= $usuario ?></h2>
                <hr>
                <p><b>Filtrar productos</b></p>
                <form action="index.php?url=producto/listarProductos" method="get">
                    <select name="filtrar">
                        <option value="todo" selected>Mostrar todo</option>
                        <option value="entrante">Entrante</option>
                        <option value="plato principal">Plato principal</option>
                        <option value="postre">Postre</option>
                        <option value="refresco">Refresco</option>
                        <option value="cerveza">Cerveza</option>
                        <option value="vino">Vino</option>
                    </select>
                    <input type="submit" value="Filtrar">
                </form>
                <br><br><br><br><br>
                <form action="index.php?url=usuario/cerrarSesion" method="post">
                    <input type="submit" value="Cerrar sesión">
                </form>

            </aside>
        </div>
