### Bisloka adalah aplikasi pemesanan kendaraan

### Cara Install
- Clone atau download project di repository ini
- Ekstrak dan buka projek
- Pastikan sudah menginstall composer, ketik perintah cmd "composer install"
- Buat database, nama terserah anda
- Copy .env.example, lalu ubah menjadi .env
- Sesuaikan konfigurasi di .env, untuk DB_DATABASE gunakan db yg sudah dibuat
- Jalankan perintah cmd "php artisan key:generate"
- Lalu ketik perintah cmd "php artisan migrate", untuk membuat table pada db tersebut
- Untuk menjalankan ketik "php artisan serve"

### Tips
- Eror saat melakukan "php artisan migrate" yang disebabkan versi MySQL dibawah 5.7.7
  https://stackoverflow.com/questions/42244541/laravel-migration-error-syntax-error-or-access-violation-1071-specified-key-wa
