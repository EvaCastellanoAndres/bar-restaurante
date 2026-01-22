<?php
if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-2">
            <aside>

                <h2>Bienvenidx, <?= $usuario ?></h2>
                <hr>

                <br><br><br><br><br>
                <form action="index.php?url=usuario/cerrarSesion" method="post">
                    <input type="submit" value="Cerrar sesión">
                </form>

            </aside>
        </div>
