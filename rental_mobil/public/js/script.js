/* --- FILE: public/js/script.js --- */

// 1. Fungsi Konfirmasi Hapus
function konfirmasiHapus(event, url) {
  event.preventDefault();

  Swal.fire({
    title: "Yakin hapus data ini?",
    text: "Data yang dihapus tidak bisa dikembalikan!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
    confirmButtonText: "Ya, Hapus!",
    cancelButtonText: "Batal",
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = url;
    }
  });
}

// 2. Fungsi Konfirmasi Logout (PERBAIKAN UTAMA)
function konfirmasiLogout(event) {
  event.preventDefault(); // Mencegah link jalan duluan

  Swal.fire({
    title: "Yakin ingin keluar?",
    text: "Anda harus login lagi nanti.",
    icon: "question",
    showCancelButton: true,
    confirmButtonColor: "#3085d6", // Warna biru untuk tombol Ya
    cancelButtonColor: "#d33", // Warna merah untuk Batal
    confirmButtonText: "Ya, Keluar!",
    cancelButtonText: "Batal",
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = "logout";
    }
  });
}

// 3. Efek Animasi Card saat dimuat
document.addEventListener("DOMContentLoaded", function () {
  const cards = document.querySelectorAll(".card");
  cards.forEach((card, index) => {
    card.style.opacity = 0;
    card.style.transform = "translateY(20px)";
    setTimeout(() => {
      card.style.transition = "all 0.5s ease";
      card.style.opacity = 1;
      card.style.transform = "translateY(0)";
    }, index * 100);
  });
});
