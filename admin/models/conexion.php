<?php

declare(strict_types=1);
session_start();

class Conexion
{

    protected $db;

    public function __construct()
    {
        $this->db = $this->conexion();
    }

    public function conexion()
    {

        $host = 'localhost';
        $db = 'db_nexocash';
        $user = 'root';
        $password = '';

        try {
            $conn = new PDO(
                "mysql:host=$host;dbname=$db",
                $user,
                $password
            );
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->exec('SET CHARACTER SET UTF8');
        } catch (PDOException $e) {
            echo "Conexion no exitosa" . $e->getMessage();
        }
        return $conn;
    }

    public function ruta()
    {

        return "/nexo-cash/admin/";
    }
}
