# Pretest-Varnion

## Cara Install

1. Buat database dengan nama `pretest-varnion`.
2. Copy `.env.example` dan ubah namanya menjadi `.env`.
3. Install library yang digunakan dengan menjalankan perintah berikut pada terminal:
    ```sh
    composer install
    ```
4. Lakukan migrasi dan seeding untuk database dengan menjalankan perintah berikut pada terminal:
    ```sh
    php artisan migrate:fresh --seed
    ```
5. Jalankan aplikasi dengan:
    ```sh
    php artisan serve
    ```

## Fitur Aplikasi

### Pretest-1: Daftar Pengguna

- **Menu Daftar Pengguna**: Menu ini berisi dua tabel yang sesuai dengan petunjuk soal:
  - **Data Pengguna**: Menampilkan keseluruhan data pengguna yang tersedia dalam database.
  - **Data Profesi**: Menampilkan data profesi serta jumlah pengguna yang menjalani masing-masing profesi.
  
- **Menambahkan Data Pengguna**:
  - Untuk menambahkan satu data pengguna, klik tombol Tambah Pengguna pada card data pengguna. Pengguna baru akan secara otomatis ditambahkan dengan mengambil data dari API Random User.

### Pretest-2: Daftar Barang

- **Menu Daftar Barang**: Menu ini berisi satu tabel yang sesuai dengan petunjuk soal:
  - **Data Barang**: Menampilkan daftar barang yang tersedia dalam database.

- **Menambahkan Data Barang**:
  - Untuk menambahkan satu data barang, klik tombol `Tambah Barang` pada card data barang. Isi form yang tersedia dengan data barang yang ingin ditambahkan.

- **Mengubah Data Barang**:
  - Untuk mengubah data barang, klik tombol dengan ikon `pensil` pada tabel daftar barang. Anda akan diarahkan ke form pengubahan barang.

- **Aturan Dalam Form Tambah/Ubah Barang**:
  - Pastikan untuk mengikuti aturan validasi yang ada saat memasukkan data ke dalam form tambah atau ubah barang.

## Struktur Database

Aplikasi ini menggunakan dua tabel utama:

1. **Pretest-1**
    - **hasil_response**:
        - Berisi informasi mengenai pengguna yang diambil dari API Random User.
    - **jenis_kelamin**
        - Berisi informasi jenis kelamin
    - **profesi**
        - Berisi informasi profesi

2. **Pretest-2**:
    - **barang**
        - Berisi informasi mengenai data barang
    - **kategori_barang**
        - Berisi informasi kategori dari barang
    - **satuan_barang**
        - Berisi informasi satuan dari barang

## Teknologi yang Digunakan

- Laravel 10: Framework PHP yang digunakan untuk membangun aplikasi ini dengan versi 10.
- MySQL: Database yang digunakan untuk menyimpan data aplikasi.
- Composer: Dependency manager untuk PHP yang digunakan untuk mengelola library dan dependensi.

## Akun 
- Akun Login
  - Email : varnion@varnion.com
  - Password : Secret123
