<?php
class Plato
{
    private $db;

    public function __construct()
    {
        $this->db = new Db();
    }

    public function listar($filtro = "")
    {
        if ($filtro != "" && $filtro != "todo") {
            $sql = "SELECT * FROM platos WHERE categoria = :categoria";
            $stmt = $this->db->lanzar_consulta($sql, [':categoria' => $filtro]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }else {
            $sql = "SELECT * FROM platos";
            $stmt = $this->db->lanzar_consulta($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }


    }

    public function obtenerCategoria()
    {
        $sql = "SELECT categoria FROM platos";

        $stmt = $this->db->lanzar_consulta($sql);
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    public function obtenerPorId(int $id): array
    {
        $sql = "SELECT * FROM platos WHERE id = :id";
        return $this->db->lanzar_consulta($sql, [
            ':id' => $id
        ])->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar(array $datos): void
    {
        $sql = "UPDATE platos
            SET nombre = :nombre,
                descripcion = :descripcion,
                precio = :precio,
                categoria = :categoria,
                foto = :foto
            WHERE id = :id";

        $this->db->lanzar_consulta($sql, [
            ':id' => $datos['id'],
            ':nombre' => $datos['nombre'],
            ':descripcion' => $datos['descripcion'],
            ':precio' => $datos['precio'],
            ':categoria' => $datos['categoria'],
            ':foto' => $datos['foto']
        ]);
    }

    public function eliminar(int $id): void
    {
        $sql = "DELETE FROM platos WHERE id = :id";
        $this->db->lanzar_consulta($sql, [
            ':id' => $id
        ]);
    }


}
