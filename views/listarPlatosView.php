<?php require 'layout/header.php'; ?>
<h2>HOLAAA ESTAS EN LISTAR PLATOS VIEW</h2>
<ul class="nav justify-content-center nav-tabs">
    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="#">Todos los productos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">Platos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Bebidas</a>
    </li>
</ul>
</div>

<!-- SESIONES -->
<div class="container-fluid">
    <div class="row">
        <div class="col-2">
            <aside>
                <h2>Iniciar Sesión</h2>
                <form action="" method="post">
                    <label>
                        Nombre de usuario
                        <input type="text">
                    </label>
                    <label>
                        Contraseña
                        <input type="password">
                    </label>
                    <input type="submit" value="Entrar" class="boton">
                </form>
                <hr>

                <h2>Registrarse</h2>
                <form action="" method="post">
                    <label>
                        Email
                        <br>
                        <input type="email">
                    </label>
                    <label>
                        Nombre de usuario
                        <input type="text">
                    </label>
                    <label>
                        Contraseña
                        <input type="password">
                    </label>
                    <input type="submit" value="Entrar" class="boton">
                </form>
            </aside>
        </div>

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
                    <?php foreach ($platos as $plato) : ?>
                        <tr>
                            <td><?= $plato['nombre'] ?></td>
                            <td><?= $plato['descripcion'] ?></td>
                            <td><?= $plato['precio'] ?>€</td>
                            <td><?= $plato['disponible'] ?></td>
                            <td><?= $plato['foto'] ?></td>
                        </tr>
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
