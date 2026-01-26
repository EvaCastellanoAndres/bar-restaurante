<?php
class BebidaController
{
    public function listar(): void
    {
        session_start();

        $bebida = new Bebida();
        $bebidas = $bebida->listar();

        if (!isset($_SESSION['usuario'])) {
            require __DIR__ . '/../views/listarBebidasView.php';
            return;
        }

        if ($_SESSION['rol'] === 'administrador') {
            require __DIR__ . '/../views/listarBebidasAdminView.php';
        } else {
            require __DIR__ . '/../views/listarBebidasUsuarioView.php';
        }
    }

    public function editar(): void
    {
        session_start();

        if (!isset($_GET['id'])) {
            header('Location: index.php?url=producto/listarProductos');
            exit();
        }

        $bebida = new Bebida();
        $datosBebida = $bebida->obtenerPorId((int)$_GET['id']);

        if (!$datosBebida) {
            header('Location: index.php?url=producto/listarProductos');
            exit();
        }

        $categorias = $bebida->obtenerCategoria();

        require __DIR__ . '/../views/editarBebidaView.php';
    }

    public function editarBebida(): void
    {
        session_start();

        $foto = $_POST['foto_actual'];

        if (!empty($_FILES['foto']['name'])) {
            $foto = $_FILES['foto']['name'];
            move_uploaded_file($_FILES['foto']['tmp_name'], 'img/' . $foto);
        }

        $bebida = new Bebida();
        $bebida->actualizar([
            'id' => $_POST['id'],
            'nombre' => $_POST['nombre'],
            'descripcion' => $_POST['descripcion'],
            'precio' => $_POST['precio'],
            'categoria' => $_POST['categoria'],
            'foto' => $foto
        ]);

        header('Location: index.php?url=producto/listarProductos');
        exit();
    }

    public function eliminar(): void
    {
        session_start();

        if (!isset($_GET['id'])) {
            header('Location: index.php?url=producto/listarProductos');
            exit();
        }

        $bebida = new Bebida();
        $bebida->eliminar((int)$_GET['id']);

        header('Location: index.php?url=producto/listarProductos');
        exit();
    }
}