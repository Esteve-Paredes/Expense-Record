<?php

class ConnectionDB {
    private string $host;
    private string $db_name;
    private string $db_user;
    private string $db_password;
    private ?PDO $connection;

    public function __construct() {
        $this->host = getenv('DB_HOST');
        $this->db_name = getenv('DB_NAME');
        $this->db_user = getenv('DB_USER');
        $this->db_password = getenv('DB_PASSWORD');
    }

    function connect()
    {
        try {
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->db_user, $this->db_password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error de connexión: " . $e->getMessage() . "<br/>";
        }
    }

    function disconnect(): void
    {
        $this->connection = null;
    }

    function get_connection(): ?PDO
    {
        return $this->connection;
    }
}