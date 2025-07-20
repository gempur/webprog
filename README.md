# Portofolio-Pemrograman-Web-202312082


Ini adalah repositori portofolio digital saya yang berisi seluruh hasil praktikum mata kuliah Pemrograman Web. Setiap modul akan memiliki foldernya sendiri yang berisi latihan dan tugas yang telah diselesaikan.

Nama = Gempur SR
NIM = 202312082
Dosen = Ir. ABADI NUGROHO, S.Kom., M.Kom.

---

## Daftar Isi

*   [Modul 1: HTML Dasar](#modul-1-html-dasar)
*   [Modul 2: Pengenalan CSS](#modul-2-pengenalan-css)
*   [Modul 3: Bootstrap](#modul-3-bootstrap)
*   [Modul 4: JavaScript](#modul-4-javascript)
*   [Modul 5: Dasar-dasar PHP](#modul-5-dasar-dasar-php)
*   [Modul 6: Pemrograman Web dengan PHP dan MySQL](#modul-6-pemrograman-web-dengan-php-dan-mysql)
*   [Modul 7: Git & GitHub](#modul-7-git--github)

---

## Modul 1: HTML Dasar

Modul ini bertujuan untuk **memahami struktur dokumen HTML** dan **membuat web sederhana menggunakan HTML** [1]. HTML (HyperText Markup Language) adalah **bahasa markup standar** yang digunakan untuk membuat dan menyusun halaman web. HTML **bukan bahasa pemrograman** karena tidak memiliki logika seperti kondisi atau perulangan, melainkan hanya untuk menyusun dan menampilkan konten [1]. HTML mendefinisikan struktur halaman web seperti teks, gambar, tabel, dan formulir, dan digunakan bersama dengan CSS untuk *styling* serta JavaScript untuk *interaktivitas* [2].

**Konsep utama yang dibahas meliputi:**
*   **Struktur dasar dokumen HTML** (`<!DOCTYPE html>`, `<html>`, `<head>`, `<body>`) [3, 4].
*   **Elemen HTML dasar** seperti heading (`<h1>` - `<h6>`), paragraf (`<p>`), link (`<a>`), gambar (`<img>`), dan daftar (`<ul>`, `<ol>`, `<li>`) [5].
*   Penggunaan **atribut HTML** seperti `href`, `src`, `alt`, dan `title` [6].
*   Format teks dengan tag seperti `<b>`, `<i>`, `<u>`, `<strong>`, dan `<em>` [7].
*   Pembuatan **daftar** (`<ol>`, `<ul>`, `<dl>`) [8], **tabel** (`<table>`, `<tr>`, `<th>`, `<td>`) [9], dan **formulir** (`<form>`, `<input>`, `<textarea>`, `<select>`, `<button>`) [10].
*   Penyisipan **multimedia** seperti video dan audio menggunakan tag `<video>` dan `<audio>` di HTML5 [11].

[Link ke Folder Modul 1](prak1/)

## Modul 2: Pengenalan CSS

Modul ini fokus pada pemahaman **dasar-dasar CSS** dan **properti CSS** untuk membuat program sederhana [12]. CSS (Cascading Style Sheets) adalah bahasa yang digunakan untuk **mengatur tampilan dan *layout* halaman web**, termasuk warna, ukuran, posisi, dan gaya elemen HTML agar menarik dan mudah dibaca [13].

**Pentingnya menggunakan CSS:**
*   **Memisahkan Konten dan Desain**: HTML untuk konten, CSS untuk tampilan [14].
*   **Efisiensi**: Satu file CSS dapat mengubah tampilan seluruh situs [14].
*   **Konsistensi**: Memastikan tampilan seragam di seluruh halaman web [14].
*   **Responsivitas**: Desain dapat menyesuaikan dengan berbagai ukuran layar [14].

**Konsep utama yang dibahas meliputi:**
*   **Sintaks CSS** (selector dan deklarasi) dan **tiga cara menyisipkan CSS** (Inline, Internal, External) [15].
*   Berbagai jenis **selector CSS** (elemen, kelas, ID) [16].
*   **Properti warna dan *background*** (`color`, `background-color`, `background-image`) [17].
*   **Properti teks dan *font*** (`font-family`, `font-size`, `font-weight`, `text-align`, `text-decoration`) [18].
*   **Box Model** (Content, Padding, Border, Margin) yang menganggap setiap elemen HTML sebagai kotak [19].
*   **Layout modern** menggunakan **Flexbox** untuk pengaturan elemen satu dimensi [20] dan **CSS Grid Layout** untuk layout dua dimensi [21].
*   **Responsive Design** menggunakan **media queries**, layout fleksibel, dan satuan relatif untuk tampilan optimal di berbagai perangkat [22, 23].

[Link ke Folder Modul 2](prak2/)

## Modul 3: Bootstrap

Modul ini memperkenalkan **Bootstrap sebagai *framework* CSS** yang populer untuk membangun website dan aplikasi web yang responsif [24]. Bootstrap 5 adalah versi terbaru yang membawa banyak perbaikan dan fitur modern [24].

**Keunggulan Bootstrap 5:**
*   **Mudah digunakan** dengan kelas-kelas CSS siap pakai [25].
*   Sistem **grid yang fleksibel** untuk *layout* responsif [25, 26].
*   Banyak **komponen UI siap pakai** seperti tombol, *navbar*, *card*, *modal*, dll. [25, 27].
*   Dukungan *utilities* untuk *styling* cepat [25, 28].
*   **Tidak lagi bergantung pada jQuery**, menjadikannya lebih ringan dan modern [25].

**Konsep utama yang dibahas meliputi:**
*   **Instalasi dan *Setup* Bootstrap** menggunakan CDN (Content Delivery Network) [25].
*   Pemahaman **sistem grid** yang membagi halaman menjadi 12 kolom dan kelas responsif (`.col-sm-`, `.col-md-`, `.col-lg-`, `.col-xl-`) [26].
*   **Typography dan Utilities** untuk mengatur teks, warna (*text colors*, *background colors*), dan utilitas *styling* cepat [28-30].
*   Berbagai **desain tabel** (misalnya `.table`, `.table-striped`, `.table-bordered`) [31].
*   Penggunaan **komponen Bootstrap** seperti Button, Navbars, Modal, Pagination, dan Card [27, 32-35].

[Link ke Folder Modul 3](prak3/)

## Modul 4: JavaScript

Modul ini mengajarkan bagaimana **JavaScript membuat halaman web menjadi hidup dan interaktif** [36]. JavaScript berbeda dari HTML dan CSS karena dapat **mengubah konten HTML dan CSS secara langsung di *browser*** tanpa perlu memuat ulang halaman [36].

**Pilar-pilar utama JavaScript yang dibahas:**
*   **Manipulasi DOM (Document Object Model)**: Representasi dokumen HTML dalam bentuk objek yang dapat diinteraksi dengan JavaScript untuk mengubah elemen (`document.getElementById()`, `.innerHTML`, `.style`) [37].
*   **Penanganan Kejadian (Event Handling)**: JavaScript dapat "mendengarkan" dan menjalankan fungsi tertentu ketika terjadi aksi pengguna (misalnya `onclick`, `onmouseover`, `onchange`, `onfocus`) [38, 39].
*   **Logika Percabangan (`if...else`)**: Memungkinkan program menjalankan blok kode berbeda berdasarkan kondisi, contoh studi kasus cek diskon belanja [40].
*   **Perulangan (`for`)**: Digunakan untuk menjalankan kode yang sama berulang kali, efektif untuk mengolah data *array* menjadi daftar [41].
*   **Validasi Form Sederhana**: Memastikan pengguna memasukkan data yang benar sebelum form diproses [42].
*   **Bekerja dengan *Array***: Variabel yang menampung banyak nilai, berguna untuk mengelola daftar data (contoh aplikasi To-Do List) [43].
*   **Kalkulator Sederhana**: Menggabungkan manipulasi DOM, *event handling*, dan logika perhitungan [44].
*   **Objek String**: Metode bawaan untuk memanipulasi teks (misalnya `.toUpperCase()`, `.length`, `.substring()`) [45].
*   **Objek Math**: Properti dan metode untuk fungsi matematika (`Math.random()`, `Math.floor()`) untuk menghasilkan angka acak [46].
*   **Objek Date**: Digunakan untuk bekerja dengan tanggal dan waktu, serta menampilkan jam dinamis menggunakan `setInterval()` [47].
*   **Image Slideshow Sederhana**: Manipulasi gambar dengan mengubah properti `.src` dari elemen `<img>` [48].

[Link ke Folder Modul 4](prak4/)

## Modul 5: Dasar-dasar PHP

Modul ini memperkenalkan **konsep dasar dan sintaks bahasa pemrograman PHP**, serta kemampuannya untuk **menghasilkan halaman web yang dinamis** dan **mengolah data dari *input form*** [49]. PHP (Hypertext Preprocessor) adalah bahasa skrip *open-source* yang dieksekusi di *server*, hasilnya dikirim ke *browser* dalam bentuk HTML biasa [49].

**PHP populer karena:**
*   Bersifat *open-source* (gratis) [50].
*   Berjalan di berbagai *platform* (Windows, Linux, macOS) [50].
*   Kompatibel dengan hampir semua *server web* [50].
*   Didukung oleh komunitas besar dan dokumentasi melimpah [50].

**Lingkungan pengembangan lokal** untuk PHP biasanya memerlukan Web Server (Apache), PHP, dan Database (MySQL/MariaDB), yang dapat diinstal dengan mudah menggunakan paket terintegrasi seperti **XAMPP atau Laragon** [50, 51].

**Konsep utama yang dibahas meliputi:**
*   **Sintaks dasar PHP** (`<?php ... ?>`, `echo`, titik koma) [51].
*   Penggunaan **komentar** satu baris (`//`, `#`) dan multibarisan (`/* ... */`) [52].
*   **Variabel** (`$`) untuk menyimpan data [53].
*   Berbagai **tipe data** PHP (String, Integer, Float, Boolean, Array) [54].
*   **Fungsi *String*** (`strlen()`, `str_word_count()`, `str_replace()`, `strtoupper()`) [55, 56].
*   Operasi **matematika** (`%`, `rand()`) [57].
*   **Konstanta** yang nilainya tidak dapat diubah (`define()`) [58].
*   **Operator** (perbandingan, logika) [59].
*   **Pernyataan kondisional** (`if...elseif...else` [60], `switch` [61]).
*   **Perulangan** (`for`, `while`, `foreach`) [62].
*   **Fungsi** yang dapat digunakan kembali [63].
*   **Array** (indeks numerik dan *associative array*) [64].
*   **Variabel *Superglobals*** (`$_POST`, `$_GET`) untuk mengambil data dari *form*, serta `htmlspecialchars()` untuk keamanan [65-67].

[Link ke Folder Modul 5](prak5/)

## Modul 6: Pemrograman Web dengan PHP dan MySQL

Modul ini berfokus pada **pengelolaan *database* menggunakan MySQL dengan bantuan Laragon dan phpMyAdmin**, serta **merancang dan membuat aplikasi web dinamis sederhana yang menghubungkan PHP dengan *database* MySQL** untuk melakukan operasi **CRUD (Create, Read, Update, Delete)** [68, 69].

**Peran teknologi:**
*   **PHP** (Hypertext Preprocessor): Bahasa skrip *open-source* untuk pengembangan web dinamis [69].
*   **MySQL**: Sistem manajemen basis data relasional (RDBMS) *open-source* yang populer untuk aplikasi web [69].
*   **Laragon**: Lingkungan pengembangan universal yang menyediakan Apache (server web), MySQL (database), PHP, dan alat lainnya seperti phpMyAdmin [70].

**Konsep utama yang dibahas meliputi:**
*   **Instalasi dan pengaturan lingkungan** menggunakan Laragon, termasuk menjalankan server Apache dan MySQL [71].
*   **Menjalankan file PHP di *browser*** melalui server web lokal (misalnya `http://localhost/proyek_anda/file.php`) [72, 73].
*   **Manajemen *Database* dengan phpMyAdmin**: Membuat *database* baru dan tabel dengan kolom serta properti (`PRIMARY KEY`, `AUTO_INCREMENT`) [74].
*   **Dasar-dasar pemrograman PHP** (`echo`, variabel, pernyataan kondisional `if-else`, perulangan `for`) [75-77].
*   **Menghubungkan PHP ke *database* MySQL** menggunakan ekstensi `mysqli` melalui file koneksi (`koneksi.php`) [78].
*   **Operasi CRUD:**
    *   **Read (Menampilkan Data)**: Mengambil data dari tabel menggunakan *query* `SELECT` dan menampilkannya di halaman web dengan perulangan `while` [79].
    *   **Create (Menyisipkan Data)**: Membuat *form* HTML untuk *input* data dan memprosesnya dengan PHP menggunakan *query* `INSERT INTO` [80, 81].
    *   **Update (Memperbarui Data)**: Membuat *form* *edit* yang terisi otomatis dan memproses pembaruan data dengan *query* `UPDATE WHERE id=` [82, 83].
    *   **Delete (Menghapus Data)**: Menghapus data dari *database* berdasarkan ID dengan *query* `DELETE FROM WHERE id=` [84].

[Link ke Folder Modul 6](prak6/)

## Modul 7: Git & GitHub

Modul ini mengenalkan **Git sebagai *Version Control System* (VCS)** dan **GitHub sebagai *platform hosting*** yang saling melengkapi dalam pengembangan web [85, 86].

**Perbedaan mendasar:**
*   **Git**: Diibaratkan sebagai **"mesin waktu" untuk kode Anda**. Ini adalah **perangkat lunak *lokal*** (Distributed Version Control System) yang berfungsi untuk melacak setiap perubahan pada file proyek. Dengan Git, Anda dapat "menyimpan" versi tertentu (*commit*), dan kembali ke versi sebelumnya jika diperlukan. Git **tidak memerlukan koneksi internet** untuk beroperasi [87].
*   **GitHub**: Diibaratkan sebagai **"garasi *online*" sekaligus "arena kolaborasi"** untuk proyek-proyek Git Anda. GitHub adalah **platform berbasis web** yang menyediakan layanan *hosting* untuk repositori Git. Ini memungkinkan Anda menyimpan salinan proyek secara *online* (sebagai *backup*), berbagi kode, dan bekerja sama dalam tim [88].

**Konsep utama yang dibahas meliputi:**
*   **Alur Kerja Dasar Git**: Meliputi tiga "area" utama:
    *   **Working Directory**: Folder proyek tempat pengeditan langsung dilakukan.
    *   **Staging Area (Index)**: Area persiapan untuk perubahan yang siap disimpan.
    *   **Local Repository (.git directory)**: Riwayat permanen dari semua *commit* [89].
    *   Alur kerjanya: **Working Directory → `git add` → Staging Area → `git commit` → Local Repository** [90].
*   **Konsep Branching (Percabangan)**: Fitur penting di Git untuk mengisolasi pekerjaan (fitur baru/eksperimen) dari kode stabil di cabang `main`/`master`. Setelah selesai, cabang dapat **digabungkan (*merge*)** kembali ke `main` [91].
*   **Instalasi Git** dan **konfigurasi awal** (`git config --global user.name`, `git config --global user.email`) [92, 93].
*   **Integrasi dengan Visual Studio Code** (VS Code) dan penggunaan *terminal* terintegrasi [93, 94].
*   **Perintah dasar Git**:
    *   `git init`: Menginisialisasi repositori Git baru [95].
    *   `git status`: Melihat status file (melacak perubahan, file belum dilacak) [96].
    *   `git add .`: Menambahkan semua perubahan ke *staging area* [96].
    *   `git commit -m "Pesan commit"`: Menyimpan perubahan ke riwayat repositori lokal dengan pesan deskriptif [97].
*   **Menghubungkan repositori lokal ke remote di GitHub** (`git remote add origin [URL_repositori]`) [98].
*   **Mendorong (*push*) perubahan** dari repositori lokal ke GitHub (`git push -u origin [nama_branch]`) [99].
*   **Pentingnya tidak melakukan *push* langsung ke `main`** dalam proyek tim dan peran **Pull Request** untuk *code review* [100].

[Link ke Folder Modul 7](prak7/)