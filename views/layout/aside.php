<div class="container-fluid">
    <div class="row">
        <div class="col-2">
            <aside>
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
                    <input type="submit" value="Entrar" class="boton">
                </form>
                <hr>

                <h2>Registrarse</h2>
                <form action="index.php?url=usuario/registro" method="post">
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
                    <input type="submit" value="Entrar" class="boton">
                </form>
            </aside>
        </div>