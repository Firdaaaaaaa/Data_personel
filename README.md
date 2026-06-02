# Sistem Informasi Kepegawaian Personel Kepolisian

## 📌 Deskripsi Sistem

Sistem Informasi Kepegawaian Personel Kepolisian adalah aplikasi berbasis web yang digunakan untuk mengelola data kepegawaian personel secara terstruktur. Sistem ini mencakup pengelolaan data personel, pangkat, jabatan, pendidikan, serta unit kerja seperti Polsek.

Aplikasi ini dikembangkan menggunakan framework **Laravel** dengan panel administrasi **Filament** untuk mempermudah pengelolaan data.

---

## 🎯 Tujuan Sistem

- Mengelola data personel secara terpusat  
- Mempermudah pendataan berdasarkan Polsek  
- Meningkatkan efisiensi pencarian dan pengelolaan data  
- Mengurangi kesalahan pencatatan manual  
- Menyediakan data yang akurat dan terstruktur  

---

## ⚙️ Fitur Sistem

- Manajemen data personel  
- Manajemen data Polsek (unit kerja)  
- Manajemen data pangkat  
- Manajemen data jabatan  
- Manajemen pendidikan umum  
- Manajemen pendidikan pembentukan  
- Manajemen pendidikan kejuruan / pengembangan  
- Rekap data personel berdasarkan Polsek  
- Admin panel untuk pengelolaan seluruh data  

---

## 🛠️ Teknologi yang Digunakan

- Laravel Framework  
- Filament Admin Panel  
- PHP  
- MySQL / MariaDB  
- Vite  

---

## 🚀 Cara Instalasi

```bash
git clone <url-repository-kamu>
cd nama-project

composer install
npm install

cp .env.example .env
php artisan key:generate

php artisan migrate --seed

npm run build
php artisan serve

