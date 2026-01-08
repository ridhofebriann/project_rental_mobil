<?php
// Memanggil file koneksi database
require_once 'config/Database.php';

class AuthController {
    private $db;

    public function __construct() {
        // Bikin koneksi database saat class dipanggil
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function login($username, $password) {
        // 1. Cek User di Database
        $query = "SELECT * FROM users WHERE username = :username";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // 2. Verifikasi Password
        // Note: Di database tadi kita pakai password_hash, jadi verifikasinya pakai password_verify
        if ($user && password_verify($password, $user['password'])) {
            
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            
            // --- TAMBAHKAN BARIS INI UNTUK POPUP ---
            $_SESSION['login_success'] = true; 
            // ---------------------------------------

            if ($user['role'] == 'admin') {
                header("Location: dashboard");
            } else {
                header("Location: katalog");
            }
            exit;
        } else {
            // Login Gagal
            $_SESSION['error'] = "Username atau Password salah!";
            header("Location: login");
            exit;
        }
    }

   public function logout() {
        session_destroy();
        // Kita kirim parameter ?pesan=logout ke halaman login
        header("Location: login?pesan=logout");
    }
}
?>