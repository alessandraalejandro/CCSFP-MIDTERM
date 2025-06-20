<?php
class Database
{
    private $host;
    private $db_name;
    private $username;
    private $password;
    private $port; // add for changed port
    public $conn;

    public function __construct()
    {
        // Check if the server is running on localhost
        if ($_SERVER['SERVER_NAME'] === 'localhost' || $_SERVER['SERVER_ADDR'] === '127.0.0.1') {
            // Localhost connection
            $this->host = "localhost";
            $this->db_name = "magrent";
            $this->username = "root";
            $this->password = "";
            $this->port = "3307"; // for changed port
        } else {
            // Live server connection
            $this->host = "localhost";
            $this->db_name = "u297724503_magrent_2023";
            $this->username = "u297724503_magrent_2023";
            $this->password = "Magrent_2023";
        }
    }

    public function dbConnection()
    {
        $this->conn = null;
        try {
            // $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password); // for default port (3306)
            $this->conn = new PDO("mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db_name, $this->username, $this->password); // for changed port
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
