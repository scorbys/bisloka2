### Bisloka adalah aplikasi pemesanan kendaraan

### Cara Install
- Clone or download project di repository ini
- Ekstrak dan buka folder project tersbut
- Pastikan anda sudah menginstall composer laku ketik perintah cmd "composer install" di folder tersebut
- buat database, nama bebas terserah anda
- Copy env.example, lalu ubah menjadi .env saja
- Sesuaikan konfigurasi anda, untuk DB_DATABASE gunakan db yg anda buat tadi
- Jalankan perintah cmd "php artisan key:generate"
- Lalu jalankan perintah cmd "php artisan migrate", untuk membuat table pada db tersebut
- Setelah itu "php artisan serve"

### Tips
- Eror saat melakukan "php artisan migrate" yang disebabkan versi MySQL dibawah 5.7.7
  https://stackoverflow.com/questions/42244541/laravel-migration-error-syntax-error-or-access-violation-1071-specified-key-wa
