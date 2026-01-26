<div class="container-fluid">
    <div class="row">
        <div class="col-2">
            <aside>
                <div class="contenidoAside">
                <h2>Iniciar Sesión</h2>
                <form action="index.php?url=usuario/iniciarSesion" method="post">
                    <label>
                        Nombre de usuario
                        <input type="text" name="usuario">
                    </label>
                    <label>
                        Contraseña
                        <input type="password" name="password">
                    </label>
                    <?php
                    if (isset($_GET['error'])&&$_GET['error']==1) {
                        echo '<p class="error">Usuario o contraseña incorrectos</p>';
                    }
                    ?>

                    <input type="submit" value="Entrar" class="boton">
                </form>

                <hr>

                <h2>Registrarse</h2>
                <form action="index.php?url=usuario/registrar" method="post">
                    <label>
                        Email
                        <br>
                        <input type="email" name="email">
                    </label>
                    <label>
                        Nombre de usuario
                        <input type="text" name="usuario">
                    </label>
                    <label>
                        Contraseña
                        <input type="password" name="password">
                    </label>
                    <?php
                    if (isset($_GET['error'])&&$_GET['error']==2) {
                        echo '<p class="error">Usuario o email ya registrados</p>';
                    }
                    ?>

                    <input type="submit" value="Entrar" class="boton">
                </form>
                    </div>
            </aside>
        </div>