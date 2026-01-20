<?php
class Plato
{
    private $db;

    public function __construct()
    {
        $this->db = new Db();
    }

    public function listar()
    {
        $sql = "SELECT * FROM platos";
        return $this->db->lanzar_consulta($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}
