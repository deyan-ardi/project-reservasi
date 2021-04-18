# Sistem Informasi Reservasi

## Pre-Request
- git
- composer
- xampp/laragon
- teks editor (disarankan visual code)
- Versi php minimal `php 7.2`

Pastikan beberapa ekstension ini aktif (secara default sudah aktif)
- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) i
Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)

## Installation & updates

### Clone Repositori
- Pergi ke folder `xampp/htdocs` lalu klik kanan pilih `git bash here`
- Clone repositori dengan syntax `git clone https://github.com/deyan-ardi/project-reservasi.git`

### Mengimport Database
- Hidupkan XAMPP (Apache dan Mysql)
- Buka folder `project-reservasi` yang ada pada folder `xampp/htdocs`
- Pada browser akses `localhost/phpmyadmin`
- Pada phpmyadmin Buat Database baru dengan nama `db_reservasi_fix`
- Pada phpmyadmin, pilih database `db_reservasi_fix` lalu pilih `impor`
- Pada bagian `Berkas Untuk Impor`, pilih berkas yang ada pada `project-reservasi/sql/db_reservasi_fix.sql`
- Setelah berhasil diimpor, selanjutnya buka `project-reservasi` pada `Visual Studio Code`
- Kemudian liat pada root repositori, apakah ada file dengan nama `.env`? Jika tidak, rename file `env_rename` menjadi `.env`. 

### Folder Vendor
Folder Vendor merupakan folder system dari Codeigniter 4, terkadang ketika mengupload ke github folder ini tidak disertakan. Untuk itu silahkan dilihat, apakah folder `vendor` ada pada root repositori
- Jika folder `vendor` tidak ada di root repositori, silahkan buka `Visual Studio Code`, kemudian pilih `Terminal` yang ada disamping bar `Help` pada bar yang ada diatas `Visual Studio Code`.
- Pilih `New Terminal`, makan akan muncul terminal dibawah `Visual Studio Code`
- Tulis syntax `composer update`, maka composer akan melakukan update terhadap repositori
- Jika berhasil, maka seharusnya sekarang folder vendor ada pada root repositori

## Menjalankan Project
Pastikan proses sebelumnya sudah berhasil dilakukan dan tanpa ada error, selanjutnya untuk menjalankan project silahkan hidupkan terlebih dahulu XAMPP (Mysql dan Apache), kemudian buka `project-reservasi` pada Visual Studio Code dan pilih `Terminal` lalu `New Terminal`.

Selanjutnya, tuliskan syntax `php spark serve`, selanjutnya buka browser lalu tuliskan `localhost:8080/`. Jika tidak ada masalah seharusnya aplikasi telah berhasil dijalankan

## Membuat akun
Untuk membuat akun, silahkan pilih `masuk` lalu masukkan data yang diminta, pastikan email benar. Selanjutnya periksa email anda untuk mendapatkan kode aktivasi

## Membuat super admin
Secara default, setelah melakukan pendaftaran maka user yang mendaftar akan langsung masuk sebagai `member`, namun karena kita butuh akun yang menjadi super admin dari aplikasi ini, maka kita harus melakukan hal berikut

Setelah berhasil membuat akun, selanjutnya untuk membuat `Super Admin` silahkan buka `localhost/phpmyadmin` kemudian pilih `db_reservasi_fix` lalu pilih tabel `auth_groups_users`, perhatikan pada kolom `user_id`, pilih `ubah` pada id user yang ingin diubah jabatannya. Kemudian ganti `group_id` dengan angka 1 kemudian simpan.

Kode Jabatan
1 => Super Admin
2 => Admin
3 => User/Member

Setelah itu, silahkan masuk ke halaman `localhost:8080/login`, lalu masukkan username dan password dari akun `Super Admin` tadi

## Membuat admin
Untuk membuat akun admin, silahkan lakukan pendaftaran melalui menu register yang ada pada halaman `localhost:8080/register`, masukkan data yang diminta, kemudian cek email untuk mendapatkan kode aktivasi. Secara default, akun yang baru dibuat ini akan masuk kedalam jabatan `user/member`, untuk menjadikannya admin, lakukan cara berikut.

- Login menggunakan akun `Super Admin` pada halaman `localhost:8080/login`, setelah masuk ke Dashboard, kemudian pilih `manajemen user`. Pilih tombol `ubah` pada user yang ingin dijadikan `admin`
- Setelah masuk ke menu ubah, silahkan pilih `staff` pada pilihan paling bawah lalu `simpan`

## Melakukan update repositori
Karena kita sudah melakukan clone repositori, maka seharusnya nanti jika dari `developer` melakukan update repositori, Anda cukup melakukan dua hal berikut
- Buka `project-resevasi` pada `Visual Studio Code` lalu pilih  `Terminal => New Terminal`
- Tuliskan syntax `git fetch origin master`, lalu enter
- Setelah itu, tuliskan syntax `git pull origin master`, lalu enter

Seharusnya setelah itu, maka aplikasi otomatis diperbaharui

## Fitur yang belum
- Seluruh Fitur Sudah Dibuat

### Assets yang diperlukan
Untuk pembuatan tampilan website, Saya membutuhkan beberapa asset berikut
- Gambar Bungalow (Kamar, Keadaan Lingkungan, Kantor, Dll)
- Deskripsi Bungalow (Bisa sejarahnya, keunggulan, dll)
- Video Bungalownya (Upload di youtube)
- No Telp, Email, Instagram, Facebook, dan media sosial lain (yang dimiliki)
- Deskripsi terkait dengan makanan, layanan yang disediakan, dll
- Data Kamar dan Kategori Kamar (disertai gambar masing-masing kamar)


## Bug dan Laporan
Silahkan hubungi `Developer` jika menemukan bug



