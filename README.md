# 🌐 Website SMK PGRI 3 Malang

![Laravel](https://img.shields.io/badge/Laravel-11.x-ff2d20?logo=laravel&logoColor=white)
![Vite](https://img.shields.io/badge/Vite-frontend-646cff?logo=vite&logoColor=yellow)
![TailwindCSS](https://img.shields.io/badge/TailwindCSS-3.x-38b2ac?logo=tailwind-css&logoColor=white)
![Fullstack](https://img.shields.io/badge/Fullstack-yes-blue)

> 🚀 Website resmi **SMK PGRI 3 Malang** dengan core feature **Rekomendasi Jurusan**.  
> Dibangun menggunakan **Fullstack Laravel + Vite + TailwindCSS** untuk performa modern, responsif, dan cepat.

---

## ✨ Fitur Utama

- 🎓 **Rekomendasi Jurusan**  
  Membantu siswa baru memilih jurusan sesuai minat, bakat, dan hasil tes.
- 📰 **Berita & Informasi Sekolah**  
  Update kegiatan, pengumuman, dan event terbaru.
- 📅 **Agenda Sekolah**  
  Jadwal kegiatan akademik dan non-akademik.
- 📱 **Responsive Design**  
  Desain mobile-friendly dengan **TailwindCSS**.

---

## 🛠️ Teknologi yang Digunakan

- **Backend**: [Laravel 11](https://laravel.com/)  
- **Frontend**: [Vite](https://vitejs.dev/) + [TailwindCSS](https://tailwindcss.com/)  
- **Database**: MySQL/MariaDB  
- **Server Requirement**: PHP ≥ 8.2, Composer ≥ 2.x, Node.js ≥ 18.x  

---

## ⚙️ Instalasi & Setup

Ikuti langkah berikut agar instalasi berjalan lancar:

### 1. Clone Repository
```bash
git clone https://github.com/Margareth3ya/CTRL-C-JHIC.git
cd CTRL-C-JHIC
```

### 2. Konfigurasi Backend (Laravel)
1. Install dependency Laravel
   ```bash
   composer install
   ```
2. Copy file `.env`
   ```bash
   cp .env.example .env
   ```
3. Generate application key
   ```bash
   php artisan key:generate
   ```
4. Sesuaikan konfigurasi database di file `.env`
### 3. Setup Database
```bash
php artisan migrate --seed
```
> Perintah `--seed` akan mengisi data awal (contoh user admin & jurusan).

### 4. Konfigurasi Frontend (Vite + TailwindCSS)
1. Install dependency frontend:
   ```bash
   npm install
   ```
2. Jalankan build asset untuk production:
   ```bash
   npm run build
   ```
   atau untuk development:
   ```bash
   npm run dev
   ```

### 5. Jalankan Server Laravel
```bash
php artisan serve
```
Akses di browser:  
👉 `http://127.0.0.1:8000`

---

## 🔑 Akun Default (Seeder)

- **Admin**
  - Email: `root`
  - Password: `admin`

> Segera ganti password default demi keamanan ⚠️

---

## 📌 Catatan untuk SysAdmin

- Pastikan server memenuhi requirement PHP, Composer, dan Node.js.  
- Untuk **deployment production**, gunakan:
  ```bash
  php artisan config:cache
  php artisan route:cache
  php artisan view:cache
  npm run build
  ```
- Gunakan **supervisor / pm2** jika ingin menjalankan queue worker Laravel.

---

## 👨‍💻 Kontributor

- Tim IT **SMK PGRI 3 Malang**  
- Dibangun dengan ❤️ oleh siswa-siswi dan guru pembimbing.

---

## 📜 Lisensi
Proyek ini dilindungi oleh lisensi **MIT**.  
Silakan digunakan, dikembangkan, dan disesuaikan untuk kepentingan pendidikan.
