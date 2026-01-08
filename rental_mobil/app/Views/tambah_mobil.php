<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mobil Baru</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body { background-color: #f8f9fc; }
        .form-label { font-weight: 600; color: #5a5c69; }
        .form-control:focus { box-shadow: 0 0 0 0.25rem rgba(78, 115, 223, 0.25); border-color: #4e73df; }
    </style>
</head>
<body>

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header bg-primary text-white text-center py-4 rounded-top">
                        <h4 class="mb-0 fw-bold"><i class="bi bi-plus-circle-dotted me-2"></i> Tambah Armada Baru</h4>
                    </div>
                    
                    <div class="card-body p-5">
                        <form action="proses_tambah_mobil" method="POST" enctype="multipart/form-data">
                            
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Merk Mobil</label>
                                    <input type="text" name="merk" class="form-control form-control-lg" placeholder="Cth: Toyota" required>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Model / Tipe</label>
                                    <input type="text" name="model" class="form-control form-control-lg" placeholder="Cth: Avanza Veloz" required>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Nomor Polisi (Plat)</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-postcard"></i></span>
                                    <input type="text" name="nopol" class="form-control form-control-lg" placeholder="B 1234 ABC" required>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Harga Sewa (per Hari)</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light fw-bold">Rp</span>
                                    <input type="number" name="harga" class="form-control form-control-lg" placeholder="350000" required>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Foto Mobil</label>
                                <input type="file" name="gambar" class="form-control" accept="image/*" required>
                                <small class="text-muted fst-italic">*Gunakan foto landscape (mendatar) agar tampilan maksimal.</small>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5">
                                <a href="dashboard" class="btn btn-secondary btn-lg px-4 me-md-2">Batal</a>
                                <button type="submit" class="btn btn-primary btn-lg px-5 shadow">
                                    <i class="bi bi-save me-2"></i> Simpan Data
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