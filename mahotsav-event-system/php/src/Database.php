<?php

class Database {
    private $host = "mariadb";   // container name
    private $db = "mahotsav";
    private $user = "root";
    private $pass = "rootpassword";
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db}",
                $this->user,
                $this->pass
            );

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            die("DB Connection Failed: " . $e->getMessage());
        }

        return $this->conn;
    }
}
