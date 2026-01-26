<?php
// use Intervention\Image\ImageManagerStatic as Image;
class PlatoController
{
    public function listar(): void
    {
        session_start();

        $plato = new Plato();
        $platos = $plato->listar();

        if (!isset($_SESSION['usuario'])) {
            require __DIR__ . '/../views/listarPlatosView.php';
            return;
        }

        if ($_SESSION['rol'] === 'administrador') {
            require __DIR__ . '/../views/listarPlatosAdminView.php';
        } else {
            require __DIR__ . '/../views/listarPlatosUsuarioView.php';
        }
    }

    public function editar(): void
    {
        session_start();

        if (!isset($_GET['id'])) {
            header('Location: index.php?url=producto/listarProductos');
            exit();
        }

        $plato = new Plato();
        $datosPlato = $plato->obtenerPorId((int)$_GET['id']);

        if (!$datosPlato) {
            header('Location: index.php?url=producto/listarProductos');
            exit();
        }

        $categorias = $plato->obtenerCategoria();

        require __DIR__ . '/../views/editarPlatoView.php';
    }

    public function editarPlato(): void
    {
        session_start();

        $foto = $_POST['foto_actual'];

        if (!empty($_FILES['foto']['name'])) {
            $foto = $_FILES['foto']['name'];
            move_uploaded_file($_FILES['foto']['tmp_name'], 'img/' . $foto);
        }

        $plato = new Plato();
        $plato->actualizar([
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

        $plato = new Plato();
        $plato->eliminar((int)$_GET['id']);

        header('Location: index.php?url=producto/listarProductos');
        exit();
    }


}