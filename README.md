# Olimpiade Laravel

Projek ini adalah aplikasi untuk menyelenggarakan olimpiade dengan berbagai kategori dengan sistem pendaftaran yang dinamis.

## Cara Install

Secara keseluruhan projek ini menggunakan laravel dan vite dalam pembangunannya. Jadi proses install sama dengan proses install projek laravel pada umumnya.

1. Install dependency dengan composer dan npm: `composer install` & `npm install`
2. Buat file .env: `cp .env.example .env`
3. Generate key: `php artisan key:generate`
4. Persiapkan database dan tambahkan credential ke file .env
5. Lakukan migrasi: `php artisan migrate`
6. Lakukan seeding: `php artisan db:seed`
7. Build vite: `npm run build`
8. Projek siap dijalankan

## Sistem Monitoring Pengerjaan

Pada aplikasi ini, kita bisa memonitor hal-hal yang dilakukan oleh peserta antara lain:

[ ] Ubah ukuran window browser
[ ] Berpindah tab
[ ] Melakukan refresh