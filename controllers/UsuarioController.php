<?php

class UsuarioController
{
    public function registrar(): void
    {
        if ($_POST) {
            $usuario = new Usuario();
            try {
                $usuario->registrar(
                    $_POST['email'],
                    $_POST['usuario'],
                    $_POST['password']
                );
                header('Location: index.php?url=producto/listarProductos');
                exit();
            } catch (Exception $e) {
                header('Location: index.php?url=producto/listarProductos&error=2');
            }
        }
    }


    public function iniciarSesion(): void
    {
        if ($_POST) {
            $usuario = new Usuario();
            $user = $usuario->iniciarSesion($_POST['usuario'], $_POST['password']);

            if ($user) {
                session_start();
                $_SESSION['usuario'] = $user['usuario'];
                $_SESSION['rol'] = $user['rol'];
                header('Location: index.php?url=producto/listarProductos');
            } else {
                header('Location: index.php?url=producto/listarProductos&error=1');
            }
        }
    }

    public function cerrarSesion(): void
    {
        session_start();
        session_destroy();
        header('Location: index.php');
    }
}
