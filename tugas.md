# Jawaban Tugas Kelompok Pekerjaan 3: Operasional dan Perawatan Web

### 1. Definisi Framework (TMS)
* **Pengertian:** Kerangka kerja berisi kumpulan fungsi, library, dan aturan terorganisir untuk mempercepat pengembangan aplikasi tanpa menulis kode dari nol.
* **Contoh:** Laravel (PHP), React (JS), Django (Python), dan Tailwind (CSS).

---

### 2. Solusi Kendala Spesifikasi Perangkat (CMS)
* **Virtualisasi:** Menggunakan **Docker** untuk menjalankan *environment* pengembangan yang lebih ringan dan terisolasi.
* **Cloud IDE:** Memanfaatkan layanan seperti **GitHub Codespaces** atau Gitpod agar beban komputasi berpindah ke server cloud.
* **Hardware:** Melakukan upgrade RAM atau beralih ke SSD untuk meningkatkan performa laptop secara signifikan.
* **Negosiasi:** Menjelaskan batasan perangkat kepada supervisor dan menyarankan penggunaan versi framework yang lebih stabil (LTS).

---

### 3. Strategi Demonstrasi Cadangan (TRS)
* **Online Hosting:** Menunjukkan aplikasi yang sudah di-deploy ke hosting publik (seperti Vercel atau Heroku) melalui browser perangkat apa pun.
* **GitHub Repository:** Memperlihatkan progres kode, dokumentasi, dan struktur proyek langsung melalui akun GitHub.
* **Remote Tunneling:** Menggunakan **Ngrok** untuk mengekspos server lokal agar bisa diakses via smartphone selama laptop masih menyala sebentar.
* **Video Showcase:** Menyiapkan rekaman layar (*screen recording*) fitur utama sebagai antisipasi jika terjadi kendala teknis total pada perangkat.

---

### 4. Implementasi Class Mobil (JRES)
Implementasi kode program berorientasi objek (OOP) menggunakan bahasa PHP:

```php
<?php

class Mobil {
    // Atribut dengan tipe data spesifik
    public string $warna; 
    public int $tahunProduksi; 

    // Constructor untuk inisialisasi atribut
    public function __construct(string $warna, int $tahunProduksi) {
        $this->warna = $warna;
        $this->tahunProduksi = $tahunProduksi;
    }

    // Method untuk menampilkan informasi
    public function getInfo() {
        return "Mobil berwarna {$this->warna}, produksi tahun {$this->tahunProduksi}.";
    }
}

// Instansiasi Object
$mobilSaya = new Mobil("Hitam", 2026);
echo $mobilSaya->getInfo();
