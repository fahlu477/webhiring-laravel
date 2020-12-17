## Requirement
1. PHP v7.1
2. Composer (untuk handling dependencies/packages) https://getcomposer.org
2. MySQL v5.7

## Libraries
1. `watson/active` https://github.com/dwightwatson/active
2. `laravolt/indonesia` https://github.com/laravolt/indonesia

## Setup Development
1. `git clone`
2. Buat file `.env` dengan meng-copy file `.env.example`
3. `composer install`.
4. Create MySQL database.
5. Sesuaikan konfigurasi yang benar di `.env`
6. `php artisan key:generate`
7. `php artisan migrate`
8. `php artisan db:seed`
9. `php artisan laravolt:indonesia:seed`
10. `php artisan serve`
14. Seharusnya sudah bisa akses `http://127.0.0.1:8000`
