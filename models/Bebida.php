<?php

class Bebida
{
    private $db;

    public function __construct()
    {
        $this->db = new Db();
    }

    public function listar()
    {
        $sql = "SELECT * FROM bebidas";
        return $this->db->lanzar_consulta($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}