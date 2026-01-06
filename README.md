# project_rental_mobil
# 🚗 Sistem Informasi Rental Mobil (PHP Native MVC)

**Project UAS Pemrograman Web** **Nama:** M. Ridho Febrian  
**Program Studi:** Teknik Informatika  
**Universitas:** Universitas Pelita Bangsa  

---

## 📖 Deskripsi Project

Ini adalah aplikasi berbasis web yang saya kembangkan untuk mempermudah proses penyewaan mobil. Aplikasi ini dibangun menggunakan **PHP Native** (tanpa framework) namun tetap menerapkan konsep arsitektur **MVC (Model-View-Controller)** agar kode lebih rapi, terstruktur, dan mudah dikembangkan.

Saya juga mengimplementasikan **Routing Manual** menggunakan `.htaccess` untuk menciptakan URL yang bersih (*Pretty URL*), sehingga aplikasi terlihat lebih profesional layaknya menggunakan framework modern.

---

## 🛠️ Teknologi yang Digunakan

Dalam pengembangan aplikasi ini, saya menggunakan stack teknologi berikut:

* **Backend:** PHP 8.0+ (OOP Style)
* **Database:** MySQL / MariaDB
* **Frontend:** HTML5, CSS3, Bootstrap 5.3 (Responsif)
* **Javascript:** Vanilla JS & SweetAlert2 (untuk interaksi UI yang menarik)
* **Styling:** Google Fonts (Poppins) & Bootstrap Icons

---

## 📂 Struktur Direktori & Penjelasan File

Berikut adalah struktur folder yang saya rancang untuk memisahkan logika (Controller), tampilan (View), dan konfigurasi:

```text
rental_mobil/
│
├── 📁 app/                     # Inti logika aplikasi (MVC)
│   ├── 📁 Controllers/         # Otak aplikasi (menghubungkan Database & View)
│   │   ├── AuthController.php  # Menangani Login & Logout session
│   │   └── MobilController.php # Menangani CRUD Mobil, Pagination, & Pencarian
│   │
│   └── 📁 Views/               # Antarmuka pengguna (Tampilan HTML)
│       ├── dashboard.php       # Halaman Admin (Tabel Manajemen)
│       ├── edit_mobil.php      # Form Edit data
│       ├── home.php            # Landing Page Utama (Modern UI)
│       ├── katalog.php         # Halaman List Mobil untuk User
│       ├── login.php           # Halaman Login (Admin & User)
│       └── tambah_mobil.php    # Form Tambah Mobil Baru
│
├── 📁 config/                  # Konfigurasi Database
│   └── Database.php            # Koneksi ke MySQL menggunakan PDO
│
├── 📁 public/                  # Aset statis yang diakses publik
│   ├── 📁 css/
│   │   └── style.css           # Custom CSS (Glassmorphism, Gradient, dll)
│   ├── 📁 img/                 # Tempat penyimpanan foto mobil (Upload)
│   └── 📁 js/
│       └── script.js           # Logika JS (SweetAlert, Konfirmasi Hapus/Logout)
│
├── .htaccess                   # Konfigurasi Apache (Pretty URL & Routing)
├── index.php                   # Entry Point (Gerbang Utama / Router)
├── rental_mobil.sql            # File Database untuk di-import
└── README.md                   # Dokumentasi Project
