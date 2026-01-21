<?php

class Usuario
{
    private $db;

    public function __construct()
    {
        $this->db = new Db();
    }

    public function registrar($email, $usuario, $password)
    {
        $sql = "insert into usuarios (email, usuario, password) values (:email, :usuario, :password)";

        $stmt = $this->db->lanzar_consulta($sql);
        $stmt->execute([
            ':email' => $email,
            ':usuario' => $usuario,
            ':password' => password_hash($password, PASSWORD_DEFAULT)
        ]);
    }

    public function iniciarSesion($usuario, $password)
    {
        $sql = "select * from usuarios where usuario = :usuario";
        $stmt = $this->db->lanzar_consulta($sql);
        $stmt->execute([':usuario' => $usuario]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    }
}
