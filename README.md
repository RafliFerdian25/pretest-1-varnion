Cara install:
1. buat database dengan nama `pretest-vernion`
2. copy .env.example dan ubah menjadi .env
3. install library yang digunakan dengan menjalankan perintah berikut pada terminal:
`composer install`
4. lakukan migrate dan seeder untuk database dengan menjalankan perintah berikut pada terminal:
`php artisan migrate:fresh --seed`
5. jalankan aplikasi dengan:
`php artisan serve`

#Pretest-1
- Pretest-1 ini terdapat pada menu `Daftar Pengguna`
- Dalam menu `Daftar Pengguna` terdapat 2 tabel sesuai dengan petunjuk soal, yaitu data pengguna, dan data profesi
- untuk menambahkan 1 data pengguna dapat dilakukan dengan menekan tombol `tambah pengguna` pada card data pengguna