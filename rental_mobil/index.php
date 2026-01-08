<?php
// 1. MULAI SESSION (Wajib ada di baris paling atas)
session_start();

// 2. LOAD FILE KONEKSI
require_once 'config/Database.php';

// 3. TANGKAP URL DARI .HTACCESS
// Jika user membuka website tanpa alamat khusus, arahkan ke 'home'
$url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : 'home';

// 4. LOGIKA ROUTING (PENGATUR LALU LINTAS)
switch ($url) {
    
    // =================================================================
    // BAGIAN PUBLIK 
    // =================================================================
    case 'home':
        require_once 'app/Views/home.php';
        break;

    case 'login':
        // Jika sudah login, cek role-nya dan arahkan ke halaman yang sesuai
        if (isset($_SESSION['user_id'])) {
            if ($_SESSION['role'] == 'admin') {
                header("Location: dashboard");
            } else {
                header("Location: katalog");
            }
            exit;
        }
        require_once 'app/Views/login.php';
        break;

    // =================================================================
    // BAGIAN AUTENTIKASI (PROSES LOGIN & LOGOUT)
    // =================================================================
    case 'auth_process':
        require_once 'app/Controllers/AuthController.php';
        $controller = new AuthController();
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $controller->login($_POST['username'], $_POST['password']);
        }
        break;

    case 'logout':
        require_once 'app/Controllers/AuthController.php';
        $controller = new AuthController();
        $controller->logout();
        break;

    // =================================================================
    // BAGIAN ADMIN (DASHBOARD & CRUD)
    // =================================================================
    case 'dashboard':
        // Cek apakah Admin?
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
            header("Location: login"); exit;
        }
        require_once 'app/Views/dashboard.php';
        break;

    case 'tambah_mobil':
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
            header("Location: login"); exit;
        }
        require_once 'app/Views/tambah_mobil.php';
        break;

    case 'proses_tambah_mobil':
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
            header("Location: login"); exit;
        }
        require_once 'app/Controllers/MobilController.php';
        $controller = new MobilController();
        
        if ($controller->tambah($_POST, $_FILES)) {
            header("Location: dashboard");
        } else {
            echo "Gagal Menambah Data!";
        }
        break;

    case 'edit_mobil':
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
            header("Location: login"); exit;
        }
        require_once 'app/Views/edit_mobil.php';
        break;

    case 'proses_edit_mobil':
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
            header("Location: login"); exit;
        }
        require_once 'app/Controllers/MobilController.php';
        $controller = new MobilController();
        
        // Ambil ID dari URL (?id=...)
        $id = $_GET['id'];
        
        if ($controller->update($id, $_POST, $_FILES)) {
            header("Location: dashboard");
        } else {
            echo "Gagal Update Data!";
        }
        break;

    case 'hapus_mobil':
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
            header("Location: login"); exit;
        }
        require_once 'app/Controllers/MobilController.php';
        $controller = new MobilController();
        
        if (isset($_GET['id'])) {
            $controller->hapus($_GET['id']);
        }
        header("Location: dashboard");
        break;

    // =================================================================
    // BAGIAN USER (KATALOG & SEWA) - TAHAP SELANJUTNYA
    // =================================================================
    case 'katalog':
        // User wajib login
        if (!isset($_SESSION['user_id'])) {
            header("Location: login"); exit;
        }
        // File ini belum kita buat, nanti error kalau dibuka sekarang
        // Kita buat setelah ini ya!
        require_once 'app/Views/katalog.php'; 
        break;

    // =================================================================
    // BAGIAN ERROR 404
    // =================================================================
    default:
        http_response_code(404);
        echo "<div style='display:flex; justify-content:center; align-items:center; height:100vh; flex-direction:column; font-family:sans-serif;'>";
        echo "<h1 style='font-size:3rem;'>404</h1>";
        echo "<p>Halaman tidak ditemukan.</p>";
        echo "<a href='home' style='padding:10px 20px; background:#0d6efd; color:white; text-decoration:none; border-radius:5px;'>Kembali ke Home</a>";
        echo "</div>";
        break;
}
?>