<?php
if (!isset($_GET['id'])) { header("Location: dashboard"); exit; }
require_once 'app/Controllers/MobilController.php';
$controller = new MobilController();
$mobil = $controller->getById($_GET['id']);
if (!$mobil) { echo "Data tidak ditemukan!"; exit; }
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mobil</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body { background-color: #f8f9fc; }
        .img-preview { 
            width: 100%; 
            max-width: 200px; 
            border-radius: 10px; 
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header bg-warning bg-gradient text-dark text-center py-4 rounded-top">
                        <h4 class="mb-0 fw-bold"><i class="bi bi-pencil-square me-2"></i> Edit Data Mobil</h4>
                    </div>
                    
                    <div class="card-body p-5">
                        <form action="proses_edit_mobil?id=<?= $mobil['id']; ?>" method="POST" enctype="multipart/form-data">
                            
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Merk</label>
                                    <input type="text" name="merk" class="form-control" value="<?= $mobil['merk']; ?>" required>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Model</label>
                                    <input type="text" name="model" class="form-control" value="<?= $mobil['model']; ?>" required>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Nomor Polisi</label>
                                <input type="text" name="nopol" class="form-control" value="<?= $mobil['nopol']; ?>" required>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Harga Sewa</label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="number" name="harga" class="form-control" value="<?= $mobil['harga']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Status Ketersediaan</label>
                                    <select name="status" class="form-select">
                                        <option value="tersedia" <?= $mobil['status'] == 'tersedia' ? 'selected' : ''; ?>>✅ Tersedia</option>
                                        <option value="disewa" <?= $mobil['status'] == 'disewa' ? 'selected' : ''; ?>>⛔ Sedang Disewa</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label d-block">Gambar Saat Ini</label>
                                <img src="public/img/<?= $mobil['gambar']; ?>" class="img-preview mb-3">
                                
                                <label class="form-label text-muted small d-block">Ganti Gambar (Opsional)</label>
                                <input type="file" name="gambar" class="form-control">
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5">
                                <a href="dashboard" class="btn btn-light btn-lg px-4 me-md-2 border">Batal</a>
                                <button type="submit" class="btn btn-warning btn-lg px-5 shadow fw-bold">
                                    <i class="bi bi-check-circle-fill me-2"></i> Update Data
                                </button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>