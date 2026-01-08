<?php
// 1. Panggil Controller untuk minta data mobil
require_once 'app/Controllers/MobilController.php';
$controller = new MobilController();
$data_mobil = $controller->index();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Rental Mobil</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/css/style.css">

    <style>
        /* CSS Tambahan Khusus Dashboard agar tabel lebih rapi */
        body { background-color: #f8f9fc; }
        
        .dashboard-card {
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.05);
            border: none;
            overflow: hidden; /* Supaya sudut tabel ikut melengkung */
        }

        .table thead th {
            background-color: #f1f3f9;
            color: #4e73df;
            font-weight: 700;
            border-bottom: 2px solid #e3e6f0;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
        }

        .table-hover tbody tr:hover {
            background-color: #f8f9fc;
            transform: scale(1.01); /* Efek zoom dikit saat hover baris */
            transition: 0.2s;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            position: relative;
            z-index: 1;
        }

        .img-thumbnail-custom {
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            object-fit: cover;
            width: 80px;
            height: 60px;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark mb-5">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="bi bi-speedometer2"></i> Admin Panel</a>
            
            <div class="d-flex align-items-center gap-3">
                <div class="text-white d-none d-md-block text-end">
                    <small class="d-block text-white-50" style="font-size: 0.8rem;">Login sebagai:</small>
                    <span class="fw-bold"><?= $_SESSION['username'] ?? 'Administrator'; ?></span>
                </div>
                <div class="bg-white text-primary rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 40px; height: 40px;">
                    <i class="bi bi-person-fill fs-5"></i>
                </div>
               <a href="#" onclick="konfirmasiLogout(event)" class="btn btn-danger btn-sm rounded-pill px-3 shadow-sm ms-2">
    Logout
</a>
            </div>
        </div>
    </nav>

    <div class="container">
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold text-dark mb-1">Manajemen Data Mobil</h3>
                <p class="text-muted mb-0">Kelola armada rental dengan mudah.</p>
            </div>
            <a href="tambah_mobil" class="btn btn-primary shadow-sm px-4 py-2 rounded-pill">
                <i class="bi bi-plus-lg me-2"></i>Tambah Mobil
            </a>
        </div>

        <div class="card dashboard-card mb-5">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th class="ps-4 py-3">No</th>
                                <th class="py-3">Gambar</th>
                                <th class="py-3">Info Mobil</th>
                                <th class="py-3">Harga Sewa</th>
                                <th class="py-3">Status</th>
                                <th class="text-center py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(empty($data_mobil)): ?>
                                <tr>
                                    <td colspan="6" class="text-center py-5 text-muted">
                                        <i class="bi bi-folder-x display-4 d-block mb-3"></i>
                                        Belum ada data mobil. Silakan tambah data baru.
                                    </td>
                                </tr>
                            <?php else: ?>
                                <?php $no = 1; foreach($data_mobil as $row): ?>
                                <tr style="transition: all 0.2s;">
                                    <td class="ps-4 fw-bold text-secondary"><?= $no++; ?></td>
                                    <td>
                                        <img src="public/img/<?= $row['gambar']; ?>" alt="Mobil" class="img-thumbnail-custom">
                                    </td>
                                    <td>
                                        <h6 class="mb-0 fw-bold text-dark"><?= $row['merk'] . " " . $row['model']; ?></h6>
                                        <small class="text-muted"><i class="bi bi-upc-scan"></i> <?= $row['nopol']; ?></small>
                                    </td>
                                    <td class="fw-bold text-primary">
                                        Rp <?= number_format($row['harga'], 0, ',', '.'); ?>
                                        <small class="text-muted fw-normal">/ hari</small>
                                    </td>
                                    <td>
                                        <?php if($row['status'] == 'tersedia'): ?>
                                            <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill border border-success">
                                                <i class="bi bi-check-circle-fill me-1"></i> Tersedia
                                            </span>
                                        <?php else: ?>
                                            <span class="badge bg-secondary bg-opacity-10 text-secondary px-3 py-2 rounded-pill border border-secondary">
                                                <i class="bi bi-lock-fill me-1"></i> Disewa
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a href="edit_mobil?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm text-white shadow-sm" data-bs-toggle="tooltip" title="Edit Data">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a href="#" onclick="konfirmasiHapus(event, 'hapus_mobil?id=<?= $row['id']; ?>')" class="btn btn-danger btn-sm shadow-sm" data-bs-toggle="tooltip" title="Hapus Data">
                                                <i class="bi bi-trash-fill"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="public/js/script.js"></script>
    
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
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