<?php
class Database {
    private $host = "localhost";
    private $db_name = "rental_mobil";
    private $username = "root";
    private $password = ""; // Kosongkan jika pakai XAMPP default
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Koneksi Gagal: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>