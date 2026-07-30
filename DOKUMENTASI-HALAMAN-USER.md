# Dokumentasi Lengkap Halaman User LSP-API

Dokumen ini memetakan seluruh halaman publik/user beserta menu, section, teks, komponen, dan alur interaksinya per 29 Juli 2026. Konten yang kosong atau hanya muncul dalam kondisi tertentu diberi keterangan.

## Keterangan Redesign

Project ini akan **di-redesign menggunakan Vite, React, dan Tailwind CSS**. Dokumen ini berfungsi sebagai acuan konten dan struktur halaman dalam proses redesign tersebut.

Ketentuan umum redesign:

- **Vite** digunakan sebagai build tool dan development environment.
- **React** digunakan untuk membangun halaman dan komponen antarmuka yang reusable.
- **Tailwind CSS** digunakan untuk styling, layout, responsive design, dan konsistensi visual.
- Seluruh menu, section, teks, informasi, formulir, tombol, dan alur user yang tercantum dalam dokumen ini perlu dipertahankan atau disesuaikan secara terarah pada versi redesign.
- Tampilan baru dapat dibuat lebih modern dan responsif tanpa menghilangkan informasi penting yang sudah tersedia.
- Komponen global seperti navbar, footer, kartu, modal, form field, tombol, notifikasi, dan status page sebaiknya dibuat sebagai komponen React yang dapat digunakan kembali.

## 1. Struktur Navigasi Global

### 1.1 Header/navbar

Navbar tampil pada halaman publik yang memakai layout `layouts.user`.

- Identitas/logo: gambar logo IAPA dan teks **“LSP - API”**.
- Menu **Beranda** menuju `/`.
- Menu **Informasi** menuju `/informasi`.
- Menu dropdown **Sertifikasi**, berisi:
  - **Skema Sertifikasi** menuju `/sertifikasi`.
  - **Jadwal Uji Kompetensi** menuju `/jadwal`.
- Menu **Galeri** menuju `/galeri`.
- Menu **Berita** menuju `/berita`.
- Tombol **Pendaftaran** menuju `/pendaftaran`.

Menu aktif ditandai dengan warna oranye. Halaman autentikasi seperti formulir pendaftaran dan upload surat pendukung tidak memakai navbar ini.

### 1.2 Footer

Footer tampil pada seluruh halaman yang memakai layout user.

#### Kolom identitas

- Judul: **“LSP - API”**.
- Deskripsi:
  > Mewujudkan profesionalisme dan standar kompetensi administrasi publik Indonesia melalui sertifikasi yang kredibel dan terpercaya.
- Ikon media sosial: Facebook, Twitter, Instagram, dan LinkedIn.
- Saat dokumentasi dibuat, tautan media sosial belum tersedia.

#### Kolom Informasi

- **Tentang Kami** — anchor ke `#tentang-kami`.
- **Profil Pengelola** — anchor ke `#profil-pengelola`.
- **Visi & Misi** — anchor ke `#visi-misi`.
- **Skema Sertifikasi** — anchor ke `#skema-sertifikasi`.

Catatan: anchor tersebut paling relevan di beranda. Jika footer dibuka dari halaman lain, sebagian target section tidak tersedia pada halaman aktif.

#### Kolom Kontak

- Alamat: **Jl. Pd. Benowo Indah No.1-3, Babat Jerawat, Kec. Pakal, Surabaya, Jawa Timur 60197**.
- Nomor telepon: **+62895364711840**.
- Email: **lsp.api.iapa@gmail.com**.
- Alamat dapat diklik dan membuka Google Maps.

---

## 2. Menu Beranda

**URL:** `/`  
**Judul tab browser:** `LSP API - Beranda`

### 2.1 Hero

- Menampilkan tiga logo: BNSP, IAPA, dan LSP.
- Judul utama:
  > Lembaga Sertifikasi Profesi Administrasi Publik Indonesia
- Deskripsi:
  > LSP-API Mewujudkan profesionalisme dan standar kompetensi administrasi publik Indonesia melalui sertifikasi yang kredibel dan terpercaya.
- Tombol **“Cari Skema Sertifikasi”** menuju halaman `/sertifikasi`.

### 2.2 Profil Perusahaan

Judul section: **“Profil Perusahaan”**.

Isi teks:

> LSP Administrasi Publik Indonesia (LSP-API) adalah LPS Pihak ketiga yang dibentuk oleh Yayasan yang Bernama Yayasan Ilmu Administrasi Publik Negara Indonesia dalam Bahasa Inggris disebut Indonesian Association For Public Administration disingkat IAPA.

> LSP API berkedudukan di Jalan Raya Benowo No. 1-3 Surabaya (Kampus Universitas Wijaya Putra), didirikan berdasarkan Akta Pendirian Perseroan Terbatas Nomor 17 tertanggal 14 Januari 2022 yang dibuat dihadapan Notaris Christiana Inawati, SH. beralamat di Jalan Gayungsari I nomor 15, Surabaya dan telah mendapat Pengesahan berdasarkan Keputusan Menteri Hukum dan Hak Asasi Manusia Republik Indonesia Nomor AHU-0004508.AH.01.01. tahun 2022 tentang Pengesahan pendirian Badan Hukum Perseroan Terbatas PT Sertifikasi Profesi Administrasi Publik Indonesia.

> Fungsi LSP Administrasi Publik Indonesia (LSP-API) didirikan guna meningkatkan kompetensi sumber daya manusia Indonesia melalui penyelenggaraan standarisasi kompetensi profesi di bidang Administrasi Publik/ Negara, sehingga mampu mengisi dan memenuhi kebutuhan tenaga kompeten bidang Administrasi Publik/ Negara baik di sektor publik maupun privat.

Di sisi kanan terdapat gambar profil perusahaan `uwp.jpg`.

### 2.3 Susunan Pengurus LSP-API

Judul section: **“Susunan Pengurus LSP-API”**.

Struktur yang ditampilkan:

- **Sri Juni Woro Astuti** — Direktur.
- Departemen Sertifikasi:
  - **M. Husni Tamrin** — Manajer.
  - **Denny Iswanto** — Anggota.
- Departemen Manajemen Mutu:
  - **Yanuar Fauzuddin** — Manajer.
  - **Supriyanto** — Anggota.
- Departemen Administrasi:
  - **Arie Ambarwati** — Manajer.
  - **Arini Sulistyowati** — Anggota.

Setiap pengurus ditampilkan dalam kartu berisi foto, nama, dan jabatan.

### 2.4 Visi, Misi & Nilai Perusahaan

Judul section: **“Visi, Misi & Nilai Perusahaan”**.

Teks pengantar:

> Landasan filosofi yang mengarahkan setiap langkah kami dalam mengembangkan kompetensi profesional

#### Visi

> Menjadi lembaga serfikasi profesi terkemuka untuk menghasilkan tenaga kompeten bidang Administrasi Publik di Indonesia.

#### Misi

1. Mengembangkan dan mengevaluasi skema kompetensi sesuai dengan kebutuhan profesi bidang administrasi publik.
2. Menyelenggarakan serfikasi kompetensi bidang administrasi publik secara profesional.
3. Menjamin mutu proses serfikasi sesuai dengan standar yang berlaku.
4. Menyelenggarakan tata kelola kelembagaan LSP yang akuntabel.
5. Meningkatkan sumber daya yang kompeten dalam pengelolaan LSP.

#### Sasaran

1. Terselenggaranya uji kompetensi bagi tenaga kompeten bidang administrasi publik secara berkelanjutan.
2. Tercapainya kompetensi sumber daya manusia bidang administrasi publik sesuai standar mutu yang telah ditetapkan.
3. Adanya pengembangan skema uji kompetensi yang sesuai kebutuhan profesi bidang administrasi publik.

---

## 3. Menu Informasi

**URL:** `/informasi`  
**Judul tab browser:** `LSP API - Informasi`

Halaman ini terdiri atas dua section.

### 3.1 Tempat Uji Kompetensi

Judul section: **“Tempat Uji Kompetensi”**.

Setiap TUK ditampilkan sebagai kartu berisi gambar, nama, dan alamat.

1. **Universitas Wijaya Putra**
   - Alamat: FISIP, Universitas Wijaya Putra Jl. Raya Benowo (Sememi) No. 1-3, Kel. Pakal, Kec. Benowo, Kota Surabaya.
2. **Universitas Brawijaya**
   - Alamat: Fakultas Ilmu Administrasi Universitas Brawijaya, Jl. MT. Haryono No.163, Ketawanggede, Kec. Lowokwaru, Kota Malang, Jawa Timur 65145.
3. **Universitas Indonesia**
   - Alamat: Fakultas Ilmu Administrasi Universitas Indonesia, Gedung M Lantai 2, Komplek FISIP, Jl. Prof. DR. Selo Soemardjan, Pondok Cina, Kecamatan Beji, Kota Depok, Jawa Barat 16424.

### 3.2 Asesor Bersertifikat

Judul section: **“Asesor Bersertifikat”**.

Teks pengantar:

> Profil asesor bersertifikat dan berpengalaman

Setiap kartu menampilkan nama, universitas, dan nomor registrasi:

1. Achmad Lutfi — Universitas Indonesia — No. Reg. MET.000.004872 2023.
2. Bevaola Kusumasari — Universitas Gadjah Mada — No. Reg. MET.000.004865 2023.
3. Bhayu Rhama — Universitas Palangka Raya — No. Reg. MET.000.004883 2024.
4. Dina Suryawati — Universitas Jember — No. Reg. MET.000.004880 2023.
5. Erna Setijaningrum — Universitas Airlangga — No. Reg. MET.000.004874 2023.
6. Ida Ayu Putu Sri Widnyani — Universitas Ngurah Rai — No. Reg. MET.000.004882 2023.
7. Lina Miftahul Jannah — Universitas Indonesia — No. Reg. MET.000.004871 2023.
8. M. Husni Tamrin — Universitas Hangtuah — No. Reg. MET.000.004884 2023.
9. Mas Dadang Enjat Munajat — Universitas Padjadjaran — No. Reg. MET.000.004866 2023.
10. Muh Tang Abdullah — Universitas Hasanuddin — No. Reg. MET.000.004877 2023.
11. Mujibur Rahman Khairul Muluk — Universitas Brawijaya — No. Reg. MET.000.004870 2023.
12. Oscar Radyan Danar — Universitas Brawijaya — No. Reg. MET.000.004868 2023.
13. Ratminto — Universitas Gadjah Mada — No. Reg. MET.000.004881 2023.
14. Rd. Ahmad Buchari — Universitas Padjadjaran — No. Reg. MET.000.004876 2023.
15. Rutiana Dwi Wahyunengseh — Universitas Sebelas Maret — No. Reg. MET.000.004878 2023.
16. Selfi Budi Helpiastuti — Universitas Jember — No. Reg. MET.000.004875 2023.
17. Sinta Ningrum — Universitas Padjadjaran — No. Reg. MET.000.004887 2023.
18. Siska Sasmita — Universitas Negeri Padang — No. Reg. MET.000.004869 2023.
19. Siti Hajar — Universitas Muhammadiyah Sumatra Utara — No. Reg. MET.000.004873 2023.
20. Sri Juni Woro Astuti — Universitas Wijaya Putra — No. Reg. MET.000.004867 2023.
21. Tri Yuniningsih — Universitas Diponegoro — No. Reg. MET.000.004886 2023.
22. Yanuar Fauzuddin — Universitas Wijaya Putra — No. Reg. MET.000.004885 2023.
23. Yaya Mulyana — Universitas Pasundan — No. Reg. MET.000.004879 2023.

---

## 4. Menu Sertifikasi

Menu Sertifikasi pada navbar merupakan dropdown dengan dua submenu.

### 4.1 Submenu Skema Sertifikasi

**URL:** `/sertifikasi`  
**Judul tab browser:** `LSP API - Sertifikasi`

#### Hero

- Judul: **“Skema Sertifikasi”**.
- Deskripsi:
  > Pilih skema sertifikasi yang sesuai dengan keahlian dan jalur karir anda

#### Daftar skema

Setiap kartu menampilkan gambar header, nama skema, dan tautan **“Lihat Detail”**.

1. **SKEMA SERTIFIKASI KKNI KUALIFIKASI 5 BIDANG ANALISIS KEBIJAKAN PUBLIK**
2. **SKEMA SERTIFIKASI KKNI KUALIFIKASI 6 BIDANG ANALISIS KEBIJAKAN PUBLIK**
3. **SKEMA SERTIFIKASI KKNI KUALIFIKASI 7 BIDANG ANALISIS KEBIJAKAN PUBLIK**

### 4.2 Halaman Detail Skema

**Pola URL:** `/sertifikasi/{slug}`  
**Judul tab browser:** `LSP API - Detail Skema`

Halaman detail berisi satu panel informasi:

- **Nama Skema** — menampilkan nama lengkap skema.
- **Harga Skema**:
  - Kualifikasi 5: **Rp1.500.000**.
  - Kualifikasi 6: **Rp2.000.000**.
  - Kualifikasi 7: **Rp2.500.000**.
- **Deskripsi Skema** — uraian lengkap mengenai skema sertifikasi.
- **Dokumen Detail Skema** — nama berkas PDF dan tombol **“Buka”**.

Dokumen per skema:

- Kualifikasi 5: `SCHEME_DOC_20250917122656.pdf`.
- Kualifikasi 6: `SCHEME_DOC_20250917122826.pdf`.
- Kualifikasi 7: `SCHEME_DOC_20250917122928.pdf`.

Ringkasan isi deskripsi:

- Kualifikasi 5 menjelaskan skema sertifikasi KKNI Level 5 Bidang Analisis Kebijakan Publik sebagai acuan asesmen dan pemastian kompetensi, dengan rujukan sejumlah SKKNI, Peraturan LAN Nomor 14 Tahun 2019, dan Keputusan Kepala LAN Nomor 547/K.1/HKM.02.2/2019.
- Kualifikasi 6 menjelaskan skema KKNI Level 6 Bidang Analisis Kebijakan Publik yang diadopsi Komite Skema LSP Administrasi Publik Indonesia, rujukan standar nasionalnya, serta penggunaannya dalam asesmen kompetensi.
- Kualifikasi 7 memiliki struktur penjelasan serupa untuk pemastian kompetensi KKNI Level 7 Bidang Analisis Kebijakan Publik.

Catatan: terdapat rancangan formulir pendaftaran lama pada halaman detail skema, tetapi bagian tersebut tidak tampil kepada user.

### 4.3 Submenu Jadwal Uji Kompetensi

**URL:** `/jadwal`  
**Judul tab browser:** `LSP API - Jadwal`

#### Hero

- Judul: **“Jadwal Uji Kompetensi”**.
- Deskripsi:
  > Tentukan jadwal uji kompetensi Anda dengan menyesuaikan ketersediaan waktu.

#### Kartu jadwal

Setiap kartu menampilkan:

- Nama acara.
- Lokasi yang dipotong maksimal sekitar 30 karakter pada kartu.
- Tanggal.
- Jam mulai dalam format `HH:mm WIB`.
- Tombol **“Detail”**.
- Tombol **“Daftar”** menuju formulir `/pendaftaran`.

Jadwal aktif saat dokumentasi:

- Nama: **Sertifikasi Analisis Kebijakan LSP P3 API Tahun 2025**.
- Lokasi: **Universitas Wijaya Putra - FISIP, Universitas Wijaya Putra Jl. Raya Benowo (Sememi) No. 1-3, Kel. Pakal, Kec. Benowo, Kota Surabaya.**
- Tanggal: **18 September 2025**.
- Jam mulai: **12:00 WIB**.
- Deskripsi: belum diisi.

#### Modal Detail Jadwal

Judul modal: **“Detail Jadwal”**. Isinya:

- **Nama Acara**.
- **Tanggal**, ditampilkan sebagai nama hari, tanggal, bulan, dan tahun.
- **Jam**, dirancang menampilkan jam mulai–selesai dan akhiran WIB.
- **Lokasi**.
- **Deskripsi**, atau tanda `-` jika kosong.
- Tombol silang dengan teks aksesibilitas **“Close modal”**.

---

## 5. Menu Galeri

**URL:** `/galeri`  
**Judul tab browser:** `LSP API - Galeri`

### 5.1 Hero

- Judul: **“Galeri”**.
- Deskripsi:
  > Dokumentasi kegiatan pelaksanaan uji kompetensi dan lain-lain

### 5.2 Daftar galeri

- Saat dokumentasi dibuat terdapat **4 gambar**.
- Gambar ditampilkan dalam grid empat kolom.
- Setiap gambar memiliki tombol perbesar.
- Saat tombol ditekan, gambar dimuat ke overlay berlatar gelap.
- Overlay memiliki ikon silang untuk menutup tampilan.
- Galeri tidak memiliki judul atau caption per gambar; hanya berkas gambar yang ditampilkan.

---

## 6. Menu Berita

**URL:** `/berita`  
**Judul tab browser:** `LSP API - Berita`

### 6.1 Hero

- Judul: **“Berita”**.
- Deskripsi:
  > Dapatkan informasi terbaru seputar sertifikasi profesi, perkembangan, dan tren industri digital yang dapat membantu mengembangkan karier Anda.

### 6.2 Daftar berita

Setiap kartu berita dirancang menampilkan:

- Thumbnail.
- Jumlah view dengan akhiran **“Views”**.
- Hari dan tanggal publikasi.
- Judul berita, dipotong maksimal 50 karakter.
- Tautan **“Lihat Detail”**.

Saat dokumentasi dibuat, belum tersedia konten berita sehingga setelah hero tidak ada kartu berita.

### 6.3 Detail Berita

**Pola URL:** `/berita/{slug}`  
**Judul tab browser:** `LSP API - Detail Berita`

Jika berita tersedia, halaman menampilkan:

- Judul lengkap berita.
- Hari dan tanggal publikasi.
- Jumlah view.
- Gambar thumbnail.
- Isi/body berita.
- Section **“Flyer”**:
  - Nama file flyer.
  - Tombol **“Buka”** untuk membuka file.
- Sidebar **“Berita Lainnya”** berisi maksimal tiga berita:
  - Thumbnail.
  - Judul singkat.
  - Tanggal.
  - Jumlah view.

Membuka halaman detail otomatis menambah jumlah view sebanyak satu. Saat ini tidak ada contoh detail aktual karena data berita kosong.

---

## 7. Menu Pendaftaran

**URL:** `/pendaftaran`  
**Judul tab browser:** `LSP API - Pendaftaran`

Halaman menggunakan layout autentikasi, tanpa navbar dan footer publik. Bagian atas menampilkan gambar header pendaftaran.

Tanda bintang merah (`*`) berarti field ditampilkan sebagai wajib.

### 7.1 Pemilihan skema dan jadwal

1. **Skema Sertifikasi*** — dropdown dengan placeholder **“-- Pilih--”** dan tiga skema aktif.
2. **Jadwal Uji Kompetensi*** — awalnya nonaktif dengan teks **“-- Harap Pilih Skema Terlebih Dahulu --”**. Pilihan jadwal dimuat setelah user memilih skema.

### 7.2 Proses uji

Field **“Proses Uji”*** memiliki dua pilihan:

- **Uji Langsung ( Tidak Berpengalaman)**.
- **Uji Portofolio ( Berpengalaman )**.

### 7.3 Data pribadi

- **Nama Lengkap (sesuai KTP tanpa gelar)*** — input teks.
- **NIK*** — input teks.
- **Tempat Lahir*** — input teks.
- **Tanggal Lahir*** — input tanggal.
- **Jenis Kelamin***:
  - Laki-laki.
  - Perempuan.
- **Alamat*** — input teks.
- **No. Handphone / Whatsapp*** — input teks.
- **Email*** — input email.

### 7.4 Pendidikan dan pekerjaan

- **Pendidikan*** — pilihan:
  - SMA.
  - D1.
  - D2.
  - D3.
  - S1.
  - S2.
  - S3.
- **Jurusan / Bidang Studi*** — input teks.
- **Pekerjaan*** — input teks.
- **Jabatan*** — input teks.
- **Pangkat/golongan** — wajib jika isi pekerjaan mengandung `ASN` atau `PNS`; pada UI terdapat keterangan **“(ASN wajib mengisi)”**.
- **Alamat Rumah*** — textarea.
- **Alamat Instansi*** — textarea.
- **Tujuan Mengikuti Sertifikasi*** — textarea.

### 7.5 Kepesertaan dan IAPA

- **Jenis Kepesertaan***:
  - Individu.
  - Institusi.
- **Asal Instansi** — input teks.
- **Keanggotaan IAPA***:
  - Anggota Individu.
  - Anggota Institusi.
  - Bukan Anggota IAPA.
- **No. Anggota IAPA (jika bukan anggota, tidak perlu mengisi)** — input teks.

### 7.6 Dokumen

- **Scan KTP*** — input file.
- **Scan Ijazah Pendidikan Terakhir*** — input file.
- **Surat Usulan Institusi (Jika ada)** — input file opsional.

### 7.7 Aksi

- Tombol utama: **“Mendaftar”**.
- Tautan: **“Kembali ke beranda”**.

### 7.8 Halaman berhasil mendaftar

**Pola URL:** `/pendaftaran/{slug}/done`

Isi:

- Ikon berhasil.
- Teks **“Berhasil Melakukan Pendaftaran”**.
- Nama acara yang didaftarkan.
- Pesan:
  > Harap menghubungi nomor dibawah ini, untuk melakukan pembayaran
- Kontak pembayaran: **+6281322113049 (Shiva)**.
- Tombol **“Kembali ke beranda”**.

### 7.9 Halaman pendaftaran ditutup

**Pola URL:** `/pendaftaran/{slug}/close`

Isi:

- Ikon batal.
- Teks **“Pendaftaran Ditutup”**.
- Nama acara.
- Pesan:
  > Pantau terus informasi pendaftaran di website kami agar tidak ketinggalan informasi
- Tombol **“Kembali ke beranda”**.

---

## 8. Alur Upload Surat Pendukung

Alur ini bukan menu navbar, tetapi merupakan halaman user publik yang terkait proses sertifikasi.

### 8.1 Pengecekan NIK

**Pola URL:** `/sertifikasi/upload-surat-pendukung/{slug}`

- Judul: **“Upload Surat Pendukung”**.
- Instruksi:
  > Silahkan masukkan NIK anda, kami akan melakukan pengecekan terlebih dahulu
- Input NIK dengan placeholder **“Input NIK Disini”**.
- Tombol **“Selanjutnya”**.

Jika NIK tidak ditemukan untuk acara tersebut, notifikasi menampilkan:

- Judul: **“Tidak Ditemukan”**.
- Pesan:
  > NIK yang anda masukkan tidak terdaftar pada program ini

### 8.2 Form upload

**Pola URL:** `/sertifikasi/upload-surat-pendukung/{event_id}/{nik}/create`

- Judul: **“Upload Surat Pendukung”**.
- Menampilkan nama peserta.
- Menampilkan NIK peserta.
- Label file: **“Pilih File”**.
- Jenis file yang diterima: PDF, DOC, DOCX, XLS, XLSX, PPT, PPTX, TXT, ODT, ODS, dan ODP.
- Tombol **“Kirim”**.

### 8.3 Berhasil upload

**Pola URL:** `/sertifikasi/upload-surat-pendukung/{slug}/done`

- Ikon berhasil.
- Teks **“Berhasil Mengunggah Surat Pendukung”**.
- Nama acara.
- Pesan:
  > Harap bersabar sampai kami mengecek surat pendukung anda, E-Sertifikat akan dikirimkan melalui email anda, harap cek email secara berkala, terima kasih!
- Tombol **“Kembali ke beranda”**.

---

## 9. Halaman Asesor Lama yang Tidak Memiliki Route

Terdapat rancangan halaman asesor lama, tetapi halaman tersebut tidak tersedia melalui navigasi publik. Informasi asesor yang benar-benar dapat diakses user saat ini berada di menu **Informasi**.

Isi rancangan halaman lama:

- Judul: **“Daftar Asesor”**.
- Deskripsi:
  > Temukan asesor bersertifikat dan berpengalaman yang siap menilai kompetensi Anda sesuai dengan standar industri terkini.
- Kolom pencarian dengan placeholder **“Cari Asesor...”**.
- Filter **“Semua Kategori”**.
- Contoh kartu statis:
  - Dr. Ahmad Rahman, M.Kom.
  - Senior Web Developer.
  - 12 Tahun Pengalaman.
  - Judul **“Skema Kompetensi :”**.
  - Junior Web Developer.
  - Frontend Developer.
  - Fullstack Developer.
  - Tombol **“Lihat Detail”**.

Karena tidak memiliki route, konten ini tidak termasuk menu user yang aktif.

---

## 10. Ringkasan Menu dan Halaman

| Menu/alur | URL | Section utama |
|---|---|---|
| Beranda | `/` | Hero, Profil Perusahaan, Susunan Pengurus, Visi, Misi, Sasaran |
| Informasi | `/informasi` | Tempat Uji Kompetensi, Asesor Bersertifikat |
| Skema Sertifikasi | `/sertifikasi` | Hero dan daftar skema |
| Detail Skema | `/sertifikasi/{slug}` | Nama, harga, deskripsi, dokumen PDF |
| Jadwal Uji Kompetensi | `/jadwal` | Hero, kartu jadwal, modal detail |
| Galeri | `/galeri` | Hero, grid gambar, overlay preview |
| Berita | `/berita` | Hero dan kartu berita |
| Detail Berita | `/berita/{slug}` | Isi berita, flyer, berita lainnya |
| Pendaftaran | `/pendaftaran` | Pilihan skema/jadwal, proses uji, data diri, pekerjaan, kepesertaan, dokumen |
| Pendaftaran berhasil | `/pendaftaran/{slug}/done` | Konfirmasi dan kontak pembayaran |
| Pendaftaran ditutup | `/pendaftaran/{slug}/close` | Informasi penutupan |
| Cek NIK surat pendukung | `/sertifikasi/upload-surat-pendukung/{slug}` | Input dan validasi NIK |
| Upload surat pendukung | `/sertifikasi/upload-surat-pendukung/{event_id}/{nik}/create` | Identitas dan input file |
| Upload berhasil | `/sertifikasi/upload-surat-pendukung/{slug}/done` | Konfirmasi upload |

## 11. Catatan Kondisi Konten dan Implementasi

- Konten dinamis dapat berubah melalui halaman admin; daftar pada dokumen ini menggambarkan isi halaman saat dokumentasi dibuat.
- Berita belum memiliki data, sehingga menu Berita hanya menampilkan hero.
- Galeri memiliki empat gambar tetapi tidak menyimpan/menampilkan caption.
- Link media sosial masih kosong karena informasinya belum tersedia.
- Jadwal aktif yang ditampilkan bertanggal 18 September 2025, sedangkan dokumentasi dibuat pada 29 Juli 2026.
- Modal jadwal dirancang menampilkan jam selesai, tetapi informasi jam selesai belum tersedia. Bagian tersebut perlu diperhatikan saat proses redesign.
- Tombol pada halaman pendaftaran ditutup berupa elemen button tanpa link/aksi eksplisit, sehingga teks “Kembali ke beranda” belum tentu benar-benar mengarahkan user.
- Beberapa field diberi tanda wajib pada tampilan, tetapi tidak semuanya memiliki atribut HTML `required` atau validasi server yang setara.
- Alur upload surat pendukung dan alur pendaftaran memiliki beberapa penamaan navigasi yang sama. Pada redesign React, kedua alur perlu diberi struktur route dan nama komponen yang jelas agar tidak saling bertabrakan.
