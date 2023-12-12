<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Config/config.php';

class Clientes {
    private $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=" . HOST_NAME . ";dbname=" . DB_NAME, USER_NAME, PASSWORD);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
          throw new Exception("Error al conectar: " . $e->getMessage());
        }
    }
    public function obtenerConexion() {
        return $this->conn;
    }

    
    public function cerrarConexion() {
        $this->conn = null;
    }


    public function all() {
        try {
            $query = "SELECT * FROM clientes";
            $stmt = $this->conn->query($query);
            $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $clientes;
        } catch (PDOException $e) {
            throw new Exception("Error al obtener datos de clientes: " . $e->getMessage());
        }
    }

}