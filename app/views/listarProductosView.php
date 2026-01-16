<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bar-Restaurante de Eva</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
          crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<!-- HEADER -->
<div class="header">
    <h1>Bar-Restaurante de Eva</h1>

    <ul class="nav justify-content-center nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Todos los productos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Comidas</a>
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
        <div class="col-10">
            <div class="cuerpo">
                <table>
                    <tr>
                    <th>ID</th>
                    <th>Plato</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Disponible</th>
                    <th>Foto</th>
                    <th>Categoría</th>
                    </tr>
                    <?php foreach ($datos as $plato): ?>
                    <tr>
                        <td class="idPlato"><?= $plato['id_plato'] ?></td>
                        <td><?= $plato['nombre'] ?></td>
                        <td><?= $plato['descripcion'] ?></td>
                        <td><?= $plato['precio'] ?>€</td>
                        <td><?= $plato['disponible'] ?></td>

                        <td><?= $plato['foto'] ?></td>
                        <td><?= $plato['id_categoria'] ?></td>
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
