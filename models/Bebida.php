<?php

class Bebida
{
    private $db;

    public function __construct()
    {
        $this->db = new Db();
    }

    public function listar($filtro = "")
    {
        if ($filtro != "" && $filtro != "todo") {
            $sql = "SELECT * FROM bebidas WHERE categoria = :categoria";
            $stmt = $this->db->lanzar_consulta($sql, [':categoria' => $filtro]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "SELECT * FROM bebidas";
            $stmt = $this->db->lanzar_consulta($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }


    }
}