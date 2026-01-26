<?php

class Producto
{
    private $db;

    public function __construct()
    {
        $this->db = new Db();
    }

    public function crearProducto($datos): void
    {
        if ($datos['tipoProducto'] === "plato") {
            $sql = "INSERT INTO platos (nombre, descripcion, precio, categoria, foto)
                VALUES (:nombre, :descripcion, :precio, :categoria, :foto)";
        }else{
            $sql = "INSERT INTO bebidas (nombre, descripcion, precio, categoria, foto)
                VALUES (:nombre, :descripcion, :precio, :categoria, :foto)";
        }

        $this->db->lanzar_consulta($sql, [
            ':nombre' => $datos['nombre'],
            ':descripcion' => $datos['descripcion'],
            ':precio' => $datos['precio'],
            ':categoria' => $datos['categoria'],
            ':foto' => $datos['foto']
        ]);
    }

    public function crearCategoria(string $nombre, string $tipo): void
    {
        if ($tipo === 'platos') {
            $sql = "INSERT INTO platos (nombre, precio, categoria)
                VALUES ('__categoria__', 0, :categoria)";
        } else {
            $sql = "INSERT INTO bebidas (nombre, precio, categoria)
                VALUES ('__categoria__', 0, :categoria)";
        }

        $this->db->lanzar_consulta($sql, [
            ':categoria' => $nombre
        ]);
    }

}