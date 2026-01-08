<?php
// Pastikan Controller sudah dipanggil
require_once 'app/Controllers/MobilController.php';
$controller = new MobilController();

// Konfigurasi Pagination & Pencarian
$batas = 6;
$halaman = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$cari = isset($_GET['cari']) ? $_GET['cari'] : '';

// Ambil data dari Controller
$data_mobil = $controller->getKatalog($halaman, $batas, $cari);
$total_data = $controller->hitungTotal($cari);
$total_halaman = ceil($total_data / $batas);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Mobil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark mb-4 sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="bi bi-car-front-fill"></i> Rental Mobilku</a>
            
            <div class="d-flex align-items-center gap-3">
                <span class="text-white me-2 d-none d-md-block">
                    Hi, <?= $_SESSION['username'] ?? 'User'; ?>
                </span>
                
                <a href="#" onclick="konfirmasiLogout(event)" class="btn btn-light btn-sm text-primary fw-bold">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </a>
            </div>
        </div>
    </nav>

    <div class="container mb-5">
        
        <div class="hero-section text-center p-5 bg-white rounded-4 shadow-sm mb-4">
            <h1 class="hero-title display-5 fw-bold text-primary">Temukan Mobil Impianmu</h1>
            <p class="text-muted">Perjalanan nyaman, harga aman, hati senang.</p>
            
            <form action="" method="GET" class="d-flex justify-content-center mt-4 gap-2 col-md-6 mx-auto">
                <input type="hidden" name="url" value="katalog">
                <input type="text" name="cari" class="form-control form-control-lg" placeholder="Cari merk (Cth: Honda)..." value="<?= $cari; ?>">
                <button type="submit" class="btn btn-primary btn-lg"><i class="bi bi-search"></i></button>
            </form>
        </div>

        <div class="row">
            <?php if(empty($data_mobil)): ?>
                <div class="col-12 text-center py-5">
                    <img src="https://cdni.iconscout.com/illustration/premium/thumb/search-result-not-found-2130361-1800925.png" width="200" alt="Not Found">
                    <h4 class="text-muted mt-3">Mobil tidak ditemukan :(</h4>
                </div>
            <?php else: ?>
                <?php foreach($data_mobil as $row): ?>
                
                <?php 
                    
                    $nomor_admin = "6281234567890"; 
                    
                    // Pesan otomatis
                    $pesan = "Halo Admin, saya tertarik menyewa mobil: \n" . 
                             "🚗 *" . $row['merk'] . " " . $row['model'] . "* \n" .
                             "🏷️ Harga: Rp " . number_format($row['harga'], 0, ',', '.') . "\n" .
                             "Apakah unit ini tersedia?";
                             
                    // Buat Link WA
                    $link_wa = "https://wa.me/" . $nomor_admin . "?text=" . urlencode($pesan);
                ?>

                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm border-0 hover-effect">
                        <div class="position-absolute top-0 end-0 m-3">
                            <span class="badge bg-success shadow">Tersedia</span>
                        </div>
                        
                        <img src="public/img/<?= $row['gambar']; ?>" class="card-img-top" alt="Mobil" style="height: 200px; object-fit: cover;">
                        
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-dark"><?= $row['merk'] . " " . $row['model']; ?></h5>
                            <p class="text-muted small">
                                <i class="bi bi-speedometer2"></i> Kilometer Rendah • Manual • <?= $row['nopol']; ?>
                            </p>
                            <hr>
                            
                            <div class="d-flex justify-content-between align-items-center mt-auto">
                                <div>
                                    <small class="text-muted d-block">Harga Sewa</small>
                                    <span class="fw-bold text-primary fs-5">Rp <?= number_format($row['harga'], 0, ',', '.'); ?></span>
                                </div>
                                
                                <a href="<?= $link_wa; ?>" target="_blank" class="btn btn-primary btn-sm px-4 rounded-pill">
                                    <i class="bi bi-whatsapp"></i> Sewa
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <?php if($total_halaman > 1): ?>
        <nav class="mt-4">
            <ul class="pagination justify-content-center">
                <li class="page-item <?= ($halaman <= 1) ? 'disabled' : ''; ?>">
                    <a class="page-link" href="?url=katalog&page=<?= $halaman - 1; ?>&cari=<?= $cari; ?>">Prev</a>
                </li>
                
                <?php for($x = 1; $x <= $total_halaman; $x++): ?>
                    <li class="page-item <?= ($halaman == $x) ? 'active' : ''; ?>">
                        <a class="page-link" href="?url=katalog&page=<?= $x; ?>&cari=<?= $cari; ?>"><?= $x; ?></a>
                    </li>
                <?php endfor; ?>
                
                <li class="page-item <?= ($halaman >= $total_halaman) ? 'disabled' : ''; ?>">
                    <a class="page-link" href="?url=katalog&page=<?= $halaman + 1; ?>&cari=<?= $cari; ?>">Next</a>
                </li>
            </ul>
        </nav>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="public/js/script.js"></script>

    <script>
    <?php if(isset($_SESSION['login_success'])): ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil Masuk!',
            text: 'Selamat datang kembali, <?= $_SESSION['username']; ?>!',
            timer: 2000,
            showConfirmButton: false
        });
        <?php unset($_SESSION['login_success']); ?>
    <?php endif; ?>
    </script>
</body>
</html>