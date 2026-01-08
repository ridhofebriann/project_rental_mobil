<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Rental Mobil</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
            /* Pastikan tinggi minimal 100% layar device */
            min-height: 100vh;
            display: flex;
            align-items: center;     /* Tengahkan Vertikal */
            justify-content: center; /* Tengahkan Horizontal */
            margin: 0;
            padding: 20px; /* Jaga-jaga kalau dibuka di HP layar kecil */
        }

        .login-wrapper {
            width: 100%;
            max-width: 400px; /* Batasi lebar maksimal agar tidak kemelaratan */
        }

        .login-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.15); /* Bayangan lebih halus */
            background: #ffffff;
            padding: 40px 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        /* Hiasan bulat di belakang icon */
        .icon-circle {
            width: 70px;
            height: 70px;
            background: #f0f4ff;
            color: #4e73df;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            margin-bottom: 20px;
        }

        .form-floating > label {
            padding-left: 20px;
        }

        .form-control {
            border-radius: 12px;
            background-color: #f8f9fa;
            border: 1px solid #eee;
            padding-left: 20px;
        }

        .form-control:focus {
            background-color: #fff;
            box-shadow: 0 0 0 4px rgba(78, 115, 223, 0.1);
            border-color: #4e73df;
        }

        .btn-login {
            border-radius: 12px;
            padding: 12px;
            font-weight: 600;
            font-size: 16px;
            background: linear-gradient(90deg, #4e73df 0%, #224abe 100%);
            border: none;
            width: 100%;
            margin-top: 10px;
            transition: 0.3s;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(78, 115, 223, 0.3);
        }

        .link-back {
            display: inline-block;
            margin-top: 25px;
            color: #888;
            font-size: 0.9rem;
            text-decoration: none;
            transition: 0.2s;
        }

        .link-back:hover {
            color: #4e73df;
        }
    </style>
</head>
<body>

    <div class="login-wrapper">
        <div class="login-card">
            
            <div class="icon-circle">
                <i class="bi bi-car-front-fill"></i>
            </div>
            
            <h4 class="fw-bold text-dark mb-1">Selamat Datang</h4>
            <p class="text-muted small mb-4">Silakan login admin / user</p>

            <form action="auth_process" method="POST" id="formLogin">
                <div class="form-floating mb-3 text-start">
                    <input type="text" name="username" class="form-control" id="username" placeholder="Username" required>
                    <label for="username">Username</label>
                </div>
                
                <div class="form-floating mb-4 text-start">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>

                <button type="submit" class="btn btn-primary btn-login text-white">MASUK SEKARANG</button>
            </form>

            <a href="home" class="link-back">
                <i class="bi bi-arrow-left me-1"></i> Kembali ke Halaman Utama
            </a>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // 1. Script Loading
        const form = document.getElementById('formLogin');
        if (form) {
            form.addEventListener('submit', function(e) {
                Swal.fire({
                    title: 'Memeriksa Akun...',
                    timer: 5000,
                    timerProgressBar: true,
                    didOpen: () => { Swal.showLoading() }
                });
            });
        }

        // 2. Script Error
        <?php if(isset($_SESSION['error'])): ?>
            Swal.fire({
                icon: 'error',
                title: 'Login Gagal',
                text: '<?= $_SESSION['error']; ?>',
                confirmButtonColor: '#d33'
            });
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        // 3. Script Logout Sukses
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('pesan') === 'logout') {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil Keluar',
                text: 'Sampai jumpa lagi! 👋',
                timer: 3000,
                showConfirmButton: false
            });
            window.history.replaceState({}, document.title, window.location.pathname);
        }
    </script>

</body>
</html>