<?php
use Intervention\Image\ImageManagerStatic as Image;
class ProductoController
{

    public function listarProductos(): void
    {
        session_start();

        $plato = new Plato();
        $bebida = new Bebida();
        $filtro = $_GET['filtrar'] ?? "";

        $platos = $plato->listar($filtro);
        $bebidas = $bebida->listar($filtro);


        if (!isset($_SESSION['usuario'])) {
            require __DIR__ . '/../views/listarProductosView.php';
            return;
        }

        if ($_SESSION['rol'] === 'administrador') {
            require __DIR__ . '/../views/listarProductosAdminView.php';
        } else {
            require __DIR__ . '/../views/listarProductosUsuarioView.php';
        }
    }

    public function formulario(): void
    {
        session_start();

        $plato = new Plato();
        $bebida = new Bebida();

        $categoriaPlato = $plato->obtenerCategoria();
        $categoriaBebida = $bebida->obtenerCategoria();
        $categorias = array_unique(array_merge($categoriaPlato, $categoriaBebida));

        require __DIR__ . '/../views/crearProductoView.php';
    }
    public function crearProducto(): void
    {
        session_start();

        $foto = null;

        if (!empty($_FILES['foto']['name'])) {

            $extension = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
            $foto = uniqid() . '.' . $extension;

            Image::make($_FILES['foto']['tmp_name'])
                ->save('img/' . $foto);
        }


        $producto = new Producto();
        $producto->crearProducto([
            'tipoProducto' => $_POST['tipoProducto'],
            'nombre' => $_POST['nombre'],
            'descripcion' => $_POST['descripcion'],
            'precio' => $_POST['precio'],
            'categoria' => $_POST['categoria'],
            'foto' => $foto
        ]);

        header('Location: index.php?url=producto/listarProductos');
        exit();
    }


    public function categoria(): void
    {
        session_start();
        require __DIR__ . '/../views/crearCategoriaView.php';
    }

    public function crearCategoria(): void
    {
        session_start();

        $producto = new Producto();
        $producto->crearCategoria(
            $_POST['nombre'],
            $_POST['tipoProducto']
        );

        header('Location: index.php?url=producto/formulario');
        exit();
    }

    public function editar(): void
    {
        session_start();

        $id = $_GET['id'];

        $plato = new Plato();
        $datosPlato = $plato->obtenerPorId($id);

        $categorias = $plato->obtenerCategoria();

        require __DIR__ . '/../views/editarPlatoView.php';
    }



}
