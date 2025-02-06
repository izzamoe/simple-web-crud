# Simple Web CRUD Application with Laravel

## Deskripsi Proyek

Proyek ini adalah aplikasi web sederhana yang dibangun menggunakan Laravel. Aplikasi ini mengambil data produk dari API yang disediakan, menyimpannya dalam database, dan menampilkan data tersebut di halaman web. Aplikasi ini juga menyediakan fitur CRUD (Create, Read, Update, Delete) untuk produk dengan validasi input dan konfirmasi penghapusan.

## Fitur

1. Mengambil data produk dari API dan menyimpannya dalam database.
2. Menampilkan data produk yang memiliki status "bisa dijual".
3. Fitur CRUD (Create, Read, Update, Delete) untuk produk.
4. Validasi input pada form tambah dan edit produk.
5. Konfirmasi penghapusan produk.

## Teknologi yang Digunakan

- Laravel
- MySQL
- HTML
- Blade Templating Engine
- JavaScript

## Instalasi

### Prasyarat

- PHP >= 7.3
- Composer
- MySQL

### Langkah-langkah Instalasi

1. **Clone Repository**

   ```bash
   git clone <repository-url>
   cd tes-junior-programmer
   ```

2. **Install Dependencies**

   ```bash
   composer install
   ```

3. **Setup Environment Variables**

   Salin file `.env.example` menjadi `.env` dan sesuaikan konfigurasi database Anda:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=tes_junior_programmer
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4. **Generate Application Key**

   ```bash
   php artisan key:generate
   ```

5. **Migrate Database**

   ```bash
   php artisan migrate
   ```

6. **Fetch Data from API**

   Jalankan perintah berikut untuk mengambil data produk dari API dan menyimpannya dalam database:

   ```bash
   php artisan fetch:products
   ```

7. **Start Development Server**

   ```bash
   php artisan serve
   ```

   Akses aplikasi di browser melalui URL: `http://127.0.0.1:8000`

## Penggunaan

### Menampilkan Produk

Halaman utama menampilkan daftar produk yang memiliki status "bisa dijual". Anda dapat mengakses halaman ini dengan membuka URL `http://127.0.0.1:8000`.

### Menambah Produk

1. Klik tombol "Tambah Produk" di halaman utama.
2. Isi form dengan nama produk, harga, kategori, dan status.
3. Klik tombol "Simpan" untuk menambahkan produk.

### Mengedit Produk

1. Klik tombol "Edit" pada produk yang ingin Anda edit di halaman utama.
2. Ubah data produk sesuai kebutuhan.
3. Klik tombol "Update" untuk menyimpan perubahan.

### Menghapus Produk

1. Klik tombol "Hapus" pada produk yang ingin Anda hapus di halaman utama.
2. Konfirmasi penghapusan dengan mengklik "OK" pada dialog konfirmasi.

## Struktur Database

### Tabel `kategoris`

| Kolom         | Tipe Data | Keterangan         |
|---------------|-----------|--------------------|
| id_kategori   | BIGINT    | Primary Key        |
| nama_kategori | VARCHAR   | Nama Kategori      |
| created_at    | TIMESTAMP | Timestamp Created  |
| updated_at    | TIMESTAMP | Timestamp Updated  |

### Tabel `statuses`

| Kolom       | Tipe Data | Keterangan         |
|-------------|-----------|--------------------|
| id_status   | BIGINT    | Primary Key        |
| nama_status | VARCHAR   | Nama Status        |
| created_at  | TIMESTAMP | Timestamp Created  |
| updated_at  | TIMESTAMP | Timestamp Updated  |

### Tabel `produks`

| Kolom       | Tipe Data | Keterangan         |
|-------------|-----------|--------------------|
| id_produk   | BIGINT    | Primary Key        |
| nama_produk | VARCHAR   | Nama Produk        |
| harga       | INT       | Harga Produk       |
| kategori_id | BIGINT    | Foreign Key to `kategoris` |
| status_id   | BIGINT    | Foreign Key to `statuses`  |
| created_at  | TIMESTAMP | Timestamp Created  |
| updated_at  | TIMESTAMP | Timestamp Updated  |

## Dokumentasi API

### Endpoint

- **URL**: `https://recruitment.fastprint.co.id/tes/api_tes_programmer`
- **Metode**: GET
- **Autentikasi**: Basic Auth
    - **Username**: `tesprogrammer060225C15`
    - **Password**: `md5('bisacoding-' . date('d') . '-' . date('m') . '-' . date('y'))`

### Contoh Response

```json
{
    "error": 0,
    "version": "220523.0.1",
    "data": [
        {
            "no": "7",
            "id_produk": "6",
            "nama_produk": "ALCOHOL GEL POLISH CLEANSER GP-CLN01",
            "kategori": "L QUEENLY",
            "harga": "12500",
            "status": "bisa dijual"
        },
        ...
    ]
}
```

## Kontribusi

Jika Anda ingin berkontribusi pada proyek ini, silakan fork repository ini dan buat pull request dengan perubahan yang Anda usulkan.

## Lisensi

Proyek ini dilisensikan di bawah MIT License. Lihat file [LICENSE](LICENSE) untuk informasi lebih lanjut.

## Kontak

Jika Anda memiliki pertanyaan atau masalah, silakan hubungi kami melalui email:

- prog3.fastprintsby@gmail.com
- adm.hrdfastprint@gmail.com

## Video Dokumentasi

Untuk dokumentasi lebih lengkap, termasuk video tutorial, silakan lihat [tautan ini](#).

---

Terima kasih telah menggunakan aplikasi ini!
