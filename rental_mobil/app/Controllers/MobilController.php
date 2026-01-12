<?php
require_once 'config/Database.php';

class MobilController {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    // 1. READ: Ambil semua data
    public function index() {
        $query = "SELECT * FROM mobil ORDER BY id DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 2. CREATE: Tambah data baru
    public function tambah($data, $file) {
        $nama_gambar = "default.jpg";
        if (!empty($file['gambar']['name'])) {
            $target_dir = "public/img/";
            $nama_gambar = time() . "_" . basename($file['gambar']['name']);
            move_uploaded_file($file['gambar']['tmp_name'], $target_dir . $nama_gambar);
        }

        $query = "INSERT INTO mobil (merk, model, nopol, harga, status, gambar) 
                  VALUES (:merk, :model, :nopol, :harga, 'tersedia', :gambar)";
        $stmt = $this->db->prepare($query);
        $params = [
            ':merk' => $data['merk'], ':model' => $data['model'], 
            ':nopol' => $data['nopol'], ':harga' => $data['harga'], 
            ':gambar' => $nama_gambar
        ];
        return $stmt->execute($params);
    }

    // 3. GET SINGLE DATA: Ambil 1 data untuk diedit
    public function getById($id) {
        $query = "SELECT * FROM mobil WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // 4. UPDATE: Simpan perubahan
    public function update($id, $data, $file) {
        // Cek apakah user upload gambar baru?
        if (!empty($file['gambar']['name'])) {
            // Upload gambar baru
            $target_dir = "public/img/";
            $nama_gambar = time() . "_" . basename($file['gambar']['name']);
            move_uploaded_file($file['gambar']['tmp_name'], $target_dir . $nama_gambar);
            
            // Update dengan gambar baru
            $query = "UPDATE mobil SET merk=:merk, model=:model, nopol=:nopol, harga=:harga, status=:status, gambar=:gambar WHERE id=:id";
            $params = [
                ':merk' => $data['merk'], ':model' => $data['model'], 
                ':nopol' => $data['nopol'], ':harga' => $data['harga'], 
                ':status' => $data['status'], ':gambar' => $nama_gambar, ':id' => $id
            ];
        } else {
            // Update TANPA ganti gambar
            $query = "UPDATE mobil SET merk=:merk, model=:model, nopol=:nopol, harga=:harga, status=:status WHERE id=:id";
            $params = [
                ':merk' => $data['merk'], ':model' => $data['model'], 
                ':nopol' => $data['nopol'], ':harga' => $data['harga'], 
                ':status' => $data['status'], ':id' => $id
            ];
        }

        $stmt = $this->db->prepare($query);
        return $stmt->execute($params);
    }

    // 5. DELETE: Hapus data & file gambar
    public function hapus($id) {
        // Ambil nama gambar dulu buat dihapus dari folder
        $data = $this->getById($id);
        if($data['gambar'] != 'default.jpg' && file_exists("public/img/" . $data['gambar'])){
            unlink("public/img/" . $data['gambar']); // Hapus file fisik
        }

        $query = "DELETE FROM mobil WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // 6. AMBIL DATA UNTUK KATALOG (DENGAN PAGING & CARI)
    public function getKatalog($halaman, $batas, $cari) {
        // Hitung mulai data dari mana (Offset)
        $mulai = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;
        
        // Query dengan Filter Pencarian
        $query = "SELECT * FROM mobil 
                  WHERE (merk LIKE :cari OR model LIKE :cari) 
                  AND status = 'tersedia' 
                  ORDER BY id DESC LIMIT :mulai, :batas";
        
        $stmt = $this->db->prepare($query);
        $keyword = "%$cari%"; // Tambahkan wildcard %
        
        $stmt->bindParam(':cari', $keyword);
        $stmt->bindParam(':mulai', $mulai, PDO::PARAM_INT);
        $stmt->bindParam(':batas', $batas, PDO::PARAM_INT);
        
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 7. HITUNG TOTAL DATA (UNTUK NOMOR HALAMAN)
    public function hitungTotal($cari) {
        $query = "SELECT COUNT(*) as total FROM mobil 
                  WHERE (merk LIKE :cari OR model LIKE :cari) 
                  AND status = 'tersedia'";
        
        $stmt = $this->db->prepare($query);
        $keyword = "%$cari%";
        $stmt->bindParam(':cari', $keyword);
        $stmt->execute();
        $hasil = $stmt->fetch(PDO::FETCH_ASSOC);
        return $hasil['total'];
    }
    
}
?>