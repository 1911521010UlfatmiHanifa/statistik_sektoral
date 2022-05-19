-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jan 2022 pada 03.09
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cakupan_wilayah`
--

CREATE TABLE `cakupan_wilayah` (
  `id_cakupan_wilayah` int(11) NOT NULL,
  `cakupan_wilayah` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cakupan_wilayah`
--

INSERT INTO `cakupan_wilayah` (`id_cakupan_wilayah`, `cakupan_wilayah`) VALUES
(1, 'Seluruh Wilayah Indonesia'),
(2, 'Sebagian Wilayah Indonesia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cara_pengumpulan_data`
--

CREATE TABLE `cara_pengumpulan_data` (
  `id_cara_pengumpulan` int(11) NOT NULL,
  `cara_pengumpulan` varchar(40) NOT NULL,
  `rincian_cara_pengumpulan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cara_pengumpulan_data`
--

INSERT INTO `cara_pengumpulan_data` (`id_cara_pengumpulan`, `cara_pengumpulan`, `rincian_cara_pengumpulan`) VALUES
(1, 'Pencacahan Lengkap', 'Cara pengumpulan data yang dilakukan melalui pencacahan seluruh unit populasi pada pengambilan sampel tahap terakhir untuk memperkirakan karakteristik suatu populasi pada saat tertentu.'),
(2, 'Survei', 'Cara pengumpulan data yang dilakukan melalui pencacahan sampel untuk memperkirakan karakteristik suatu populasi pada saat tertentu.'),
(3, 'Kompilasi produk administrasi', 'Cara pengumpulan, pengolahan, penyajian, dan analisis data didasarkan pada catatan administrasi yang ada pada pemerintah, swasta, dan atau masyarakat.'),
(4, 'Cara lain sesuai dengan perkembangan TI', 'Metode crawling seperti Pemanfaatan Big data seperti pengumpulan data dari Shopee, Tokopedia, Tagar Instagram, Tagar Twitter, dan lain-lain.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_jadwal_pilih`
--

CREATE TABLE `detail_jadwal_pilih` (
  `id_detail_jadwal_pilih` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `id_sub_jadwal` int(11) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_jadwal_pilih`
--

INSERT INTO `detail_jadwal_pilih` (`id_detail_jadwal_pilih`, `id_kegiatan`, `id_sub_jadwal`, `tanggal_mulai`, `tanggal_selesai`) VALUES
(1, 1, 2, '2022-01-12', '2022-01-14'),
(2, 1, 1, '2022-01-05', '2022-01-27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_jumlah_petugas`
--

CREATE TABLE `detail_jumlah_petugas` (
  `id_detail_jumlah` int(11) NOT NULL,
  `id_jumlah_petugas` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_jumlah_petugas`
--

INSERT INTO `detail_jumlah_petugas` (`id_detail_jumlah`, `id_jumlah_petugas`, `id_kegiatan`, `jumlah`) VALUES
(1, 2, 1, 3),
(2, 1, 1, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_metode_pengolahan`
--

CREATE TABLE `detail_metode_pengolahan` (
  `id_detail_metode` int(11) NOT NULL,
  `id_metode_pengolahan` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_metode_pengolahan`
--

INSERT INTO `detail_metode_pengolahan` (`id_detail_metode`, `id_metode_pengolahan`, `id_status`, `id_kegiatan`) VALUES
(1, 3, 1, 1),
(2, 4, 2, 1),
(3, 2, 2, 1),
(4, 1, 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_metode_pengumpulan`
--

CREATE TABLE `detail_metode_pengumpulan` (
  `id_detail_metode_pengumpulan` int(11) NOT NULL,
  `id_metode_pengumpulan` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_metode_pengumpulan`
--

INSERT INTO `detail_metode_pengumpulan` (`id_detail_metode_pengumpulan`, `id_metode_pengumpulan`, `id_kegiatan`) VALUES
(1, 2, 1),
(2, 8, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_metode_sampel`
--

CREATE TABLE `detail_metode_sampel` (
  `id_detail_metode` int(11) NOT NULL,
  `id_metode_pemilihan` int(11) NOT NULL,
  `metode_sampel` varchar(40) NOT NULL,
  `rincian_detail_metode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_metode_sampel`
--

INSERT INTO `detail_metode_sampel` (`id_detail_metode`, `id_metode_pemilihan`, `metode_sampel`, `rincian_detail_metode`) VALUES
(1, 1, 'Simple Random Sampling ', 'Metode pengambilan sampel yang dilakukan secara acak tanpa memperhatikan.'),
(2, 1, 'Systematic Sampling ', 'metode pengambilan sampel dengan mengurutkan unit sampel kemudian menentukan k atau interval. Pemilihan sampel dilakukan dengan unit sampel ke-k, 2k, dan seterusnya.'),
(3, 1, 'Stratified Sampling ', 'Biasa digunakan pada populasi yang mempunyai unit sampel yang bertingkat atau berkelompok. Metode ini digunakan jika populasi tidak homogen dan ingin membuat generalisasi untuk sub populasi.'),
(4, 1, 'Cluster Sampling', 'Metode pemilihan sampel dari kelompok-kelompok unit yang kecil. Metode ini didasarkan pada gugus atau cluster. \r\n'),
(5, 1, 'Multistage Sampling ', 'Cara pengambilan sampel dengan menggunakan kombinasi dari metode pengambilan sampel yang berbeda.'),
(6, 2, 'Quota Sampling', 'Penetapan sampel dengan menentukan kuota terlebih dahulu pada masing-masing kelompok (besar dan kriteria sampel telah ditentukan lebih dahulu).\r\n'),
(7, 2, 'Accidental Sampling', 'Penentuan sampel berdasarkan kebetulan ditemui.'),
(8, 2, 'Purposive Sampling', 'Pengambilan sampel dengan kriteria tertentu, disebut juga judgement sampling. Reponden dipilih berdasarkan pertimbangan bahwa responden tersebut mampu memberi informasi yang benar.\r\n'),
(9, 2, 'Snowball Sampling', 'Pengambilan sampel berantai, Informasi mengenai responden berikutnya diperoleh dari responden sebelumnya. Teknik ini diterapkan jika responden sulit untuk diidentifikasi.\r\n'),
(10, 2, 'Saturation Sampling', 'Pengambilan sampel bila semua anggota populasi digunakan sebagai sampel, ini syaratnya populasi tidak banyak, atau peneliti ingin membuat generalisasi dengan kesalahan sangat kecil.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_produk_hasil`
--

CREATE TABLE `detail_produk_hasil` (
  `id_detail_detail_produk_hasil` int(11) NOT NULL,
  `id_produk_hasil` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `waktu_rilis` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_produk_hasil`
--

INSERT INTO `detail_produk_hasil` (`id_detail_detail_produk_hasil`, `id_produk_hasil`, `id_status`, `id_kegiatan`, `waktu_rilis`) VALUES
(1, 3, 2, 1, NULL),
(2, 2, 1, 1, '2022-01-19'),
(3, 1, 1, 1, '2022-01-28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_tingkat_penyajian`
--

CREATE TABLE `detail_tingkat_penyajian` (
  `id_detail_tingkat_penyajian` int(11) NOT NULL,
  `id_tingkat_penyajian` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_tingkat_penyajian`
--

INSERT INTO `detail_tingkat_penyajian` (`id_detail_tingkat_penyajian`, `id_tingkat_penyajian`, `id_kegiatan`) VALUES
(1, 8, 1),
(2, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `frekuensi`
--

CREATE TABLE `frekuensi` (
  `id_frekuensi` int(11) NOT NULL,
  `frekuensi` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `frekuensi`
--

INSERT INTO `frekuensi` (`id_frekuensi`, `frekuensi`) VALUES
(1, 'Harian '),
(2, 'Mingguan'),
(3, 'Bulanan'),
(4, 'Triwulan'),
(5, 'Empat Bulanan'),
(6, 'Semesteran'),
(7, 'Tahunan'),
(8, '> Dua Tahunan'),
(9, 'Tidak Ada');

-- --------------------------------------------------------

--
-- Struktur dari tabel `indikator`
--

CREATE TABLE `indikator` (
  `id_indikator` int(11) NOT NULL,
  `id_diakses_umum` int(11) NOT NULL,
  `id_indikator_komposit` int(11) NOT NULL,
  `id_variabel` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `id_ukuran` int(11) NOT NULL,
  `id_klasifikasi` int(11) NOT NULL,
  `id_publikasi` int(11) NOT NULL,
  `id_variabel_pembangunan` int(11) NOT NULL,
  `nama_indikator` varchar(100) NOT NULL,
  `konsep` varchar(100) NOT NULL,
  `definisi` varchar(255) NOT NULL,
  `interpretasi` varchar(100) NOT NULL,
  `metode_perhitungan` varchar(100) NOT NULL,
  `level_estimasi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `indikator`
--

INSERT INTO `indikator` (`id_indikator`, `id_diakses_umum`, `id_indikator_komposit`, `id_variabel`, `id_satuan`, `id_ukuran`, `id_klasifikasi`, `id_publikasi`, `id_variabel_pembangunan`, `nama_indikator`, `konsep`, `definisi`, `interpretasi`, `metode_perhitungan`, `level_estimasi`) VALUES
(1, 1, 1, 1, 1, 1, 9, 1, 1, 'Jumlah Penderita Penyakit Menular', 'Jumlah Penderita Penyakit Menular', 'Jumlah Penderita Penyakit Menular', 'Jumlah Penderita Penyakit Menular', 'Menghitung Jumlah By Name', 'Kabupaten');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `jadwal` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `jadwal`) VALUES
(1, 'Perencanaan'),
(2, 'Pengumpulan'),
(3, 'Pemeriksaan '),
(4, 'Penyebarluasan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_rancangan_sampel`
--

CREATE TABLE `jenis_rancangan_sampel` (
  `id_jenis_rancangan` int(11) NOT NULL,
  `jenis_rancangan` varchar(40) NOT NULL,
  `rincian_jenis_rancangan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_rancangan_sampel`
--

INSERT INTO `jenis_rancangan_sampel` (`id_jenis_rancangan`, `jenis_rancangan`, `rincian_jenis_rancangan`) VALUES
(1, 'Single Stage/Phase ', 'Pengambilan sampel hanya satu tahap yang dilakukan langsung pada unit populasi. '),
(2, 'Multi Stage/Phase', 'Pengambilan sampel melalui dua tahap atau lebih.  Metode pemilihan sampel pada masing-masing tahap bisa sama atau berbeda.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jumlah_petugas`
--

CREATE TABLE `jumlah_petugas` (
  `id_jumlah_petugas` int(11) NOT NULL,
  `jumlah_petugas` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jumlah_petugas`
--

INSERT INTO `jumlah_petugas` (`id_jumlah_petugas`, `jumlah_petugas`) VALUES
(1, 'Spervisor/Penyelia/Pengawas'),
(2, 'Pengumpul Data/Enumerator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `kecamatan` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `kecamatan`) VALUES
(1, 'Payakumbuh'),
(2, 'Akabiluru'),
(3, 'Luak'),
(4, 'Lareh Sago Halaban'),
(5, 'Situjuah Limo Nagari'),
(6, 'Harau'),
(7, 'Guguak'),
(8, 'Mungka'),
(9, 'Suliki'),
(10, 'Bukik Barisan'),
(11, 'Gunuang Omeh'),
(12, 'Kapur IX'),
(13, 'Pangkalan Koto Baru'),
(14, 'Dalam Kota Payakumbuh');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `id_status_pelatihan` int(11) NOT NULL,
  `id_status_penyesuaian` int(11) NOT NULL,
  `id_status_uji_coba` int(11) NOT NULL,
  `id_status_rekomen` int(11) NOT NULL,
  `id_urusan` int(11) NOT NULL,
  `id_penyelenggara` int(11) NOT NULL,
  `id_cara_pengumpulan` int(11) NOT NULL,
  `id_sektor` int(11) NOT NULL,
  `id_perulangan` int(11) NOT NULL,
  `id_frekuensi` int(11) NOT NULL,
  `id_tipe_pengumpulan` int(11) NOT NULL,
  `id_cakupan_wilayah` int(11) NOT NULL,
  `id_sarana_pengumpulan` int(11) NOT NULL,
  `id_unit_pengumpulan` int(11) NOT NULL,
  `id_jenis_rancangan` int(11) NOT NULL,
  `id_kerangka_sampel` int(11) NOT NULL,
  `id_unit_sampel` int(11) NOT NULL,
  `id_unit_observasi` int(11) NOT NULL,
  `id_metode_pemeriksaan` int(11) NOT NULL,
  `id_petugas_pengumpulan` int(11) NOT NULL,
  `id_pendidikan` int(11) NOT NULL,
  `id_metode_analisis` int(11) NOT NULL,
  `id_unit_analisis` int(11) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `judul_kegiatan` varchar(100) NOT NULL,
  `kode_kegiatan` varchar(30) DEFAULT NULL,
  `latar_belakang` varchar(1000) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `provinsi` varchar(40) DEFAULT NULL,
  `kabkot` varchar(40) DEFAULT NULL,
  `fraksi_sampel` int(11) NOT NULL,
  `perkiraan_sampling` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `id_status_pelatihan`, `id_status_penyesuaian`, `id_status_uji_coba`, `id_status_rekomen`, `id_urusan`, `id_penyelenggara`, `id_cara_pengumpulan`, `id_sektor`, `id_perulangan`, `id_frekuensi`, `id_tipe_pengumpulan`, `id_cakupan_wilayah`, `id_sarana_pengumpulan`, `id_unit_pengumpulan`, `id_jenis_rancangan`, `id_kerangka_sampel`, `id_unit_sampel`, `id_unit_observasi`, `id_metode_pemeriksaan`, `id_petugas_pengumpulan`, `id_pendidikan`, `id_metode_analisis`, `id_unit_analisis`, `tahun`, `judul_kegiatan`, `kode_kegiatan`, `latar_belakang`, `tujuan`, `provinsi`, `kabkot`, `fraksi_sampel`, `perkiraan_sampling`) VALUES
(1, 2, 1, 2, 2, 1, 1, 4, 9, 2, 1, 2, 1, 4, 1, 2, 1, 1, 1, 2, 1, 3, 1, 1, '2020', 'Magang', NULL, 'Demi matkul KP', 'Demi mencari pengalaman', NULL, NULL, 5, 20),
(3, 1, 1, 1, 1, 1, 1, 2, 9, 2, 9, 1, 2, 4, 4, 1, 2, 1, 1, 2, 2, 2, 1, 1, '2024', 'vggyfg', NULL, 'uhuh', 'hbjhb', NULL, NULL, 6, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kerangka_sampel`
--

CREATE TABLE `kerangka_sampel` (
  `id_kerangka_sampel` int(11) NOT NULL,
  `kerangka_sampel` varchar(40) NOT NULL,
  `rincian_sampel` varchar(260) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kerangka_sampel`
--

INSERT INTO `kerangka_sampel` (`id_kerangka_sampel`, `kerangka_sampel`, `rincian_sampel`) VALUES
(1, 'List Frame', 'Kerangka sampel yang berisi daftar unit-unit sampel Contoh: Daftar Rumah Tangga,Customer list, dll.\r\n'),
(2, 'Area Frame', 'Kerangka sampel melalui peta yang mempunyai batas yang jelas, permanen, mudah dikenali, dan tidak terlampau luas. Elemen yang terdapat dalam area sesuai dengan jenis survei, dapat dijadikan sebagai unit sampel, seperti tempat tinggal dan rumah tangga usaha.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `klasifikasi`
--

CREATE TABLE `klasifikasi` (
  `id_klasifikasi` int(11) NOT NULL,
  `klasifikasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `klasifikasi`
--

INSERT INTO `klasifikasi` (`id_klasifikasi`, `klasifikasi`) VALUES
(1, 'Jenis Penyakit'),
(2, 'K1'),
(3, 'K4'),
(4, 'Persalinan oleh Nakes'),
(5, 'KF 3'),
(6, 'Bumil dengan LILA < 23.5 cm'),
(7, 'Bumil KEK'),
(8, 'Bumil Anemia'),
(9, 'Bumil ASI Ekslusif'),
(10, 'Cakupan MP ASI'),
(11, 'Cakupan IMD');

-- --------------------------------------------------------

--
-- Struktur dari tabel `metode_analisis`
--

CREATE TABLE `metode_analisis` (
  `id_metode_analisis` int(11) NOT NULL,
  `metode_analisis` varchar(40) NOT NULL,
  `rincian_metode_analisis` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `metode_analisis`
--

INSERT INTO `metode_analisis` (`id_metode_analisis`, `metode_analisis`, `rincian_metode_analisis`) VALUES
(1, 'Analisa Deskriptif', 'Analisis yang bertujuan untuk menggambarkan karakteristik data menggunakan metode statistik sederhana.'),
(2, 'Analisis Inferensia', 'Analisis yang bertujuan untuk menarik kesimpulan pada sampel, yang digunakan untuk digeneralisir ke populasi. berdasarkan data hasil pengolahan menggunakan metode statistik yang lebih mendalam seperti anova, korelasi, regresi, chi-square, faktor, cluster, dan diskriminan.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `metode_pemeriksaan`
--

CREATE TABLE `metode_pemeriksaan` (
  `id_metode_pemeriksaan` int(11) NOT NULL,
  `metode_pemeriksaan` varchar(40) NOT NULL,
  `rincian_metode_pemeriksaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `metode_pemeriksaan`
--

INSERT INTO `metode_pemeriksaan` (`id_metode_pemeriksaan`, `metode_pemeriksaan`, `rincian_metode_pemeriksaan`) VALUES
(1, 'Kunjungan Kembali (Revisit)', 'Pengunjungan ulang guna melengkapi isian intrumen maupun jika terdapat isian yang dinilai kurang sesuai.\r\n'),
(2, 'Supervisi', 'Pengawasan terhadap pelaksana lapangan dilakukan untuk perbaikan kualitas pada saat kegiatan berlangsung.\r\n'),
(3, 'Task Force', 'Seseorang atau satuan tim khusus yang dibentuk untuk melakukan pencacahan atau pengumpulan data lapangan, umumnya bersamaan dengan pelaksanaan kegiatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `metode_pemilihan_sampel`
--

CREATE TABLE `metode_pemilihan_sampel` (
  `id_metode_pemilihan` int(11) NOT NULL,
  `metode_pemilihan` varchar(40) NOT NULL,
  `rincian_metode_pemilihan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `metode_pemilihan_sampel`
--

INSERT INTO `metode_pemilihan_sampel` (`id_metode_pemilihan`, `metode_pemilihan`, `rincian_metode_pemilihan`) VALUES
(1, 'Sampel Probabilitas', 'Metode pemilihan sampel dengan peluang yang sama bagi setiap unit populasi untuk dipilih sebagai sampel.\r\n'),
(2, 'Sampel Nonprobabilitas', 'Teknik yang tidak memberi peluang sama bagi setiap unit populasi untuk dipilih sebagai sampel.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `metode_pengolahan`
--

CREATE TABLE `metode_pengolahan` (
  `id_metode_pengolahan` int(11) NOT NULL,
  `metode_pengolahan` varchar(40) NOT NULL,
  `rincian_metode_pengolahan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `metode_pengolahan`
--

INSERT INTO `metode_pengolahan` (`id_metode_pengolahan`, `metode_pengolahan`, `rincian_metode_pengolahan`) VALUES
(1, 'Penyuntingan (Editing)', 'Editing dilakukan pada kesalahan dan ketidakkonsistenan pengisian rincian pertanyaan.\r\n'),
(2, 'Penyandian (Coding)', 'Coding adalah kegiatan pemberian kode-kode pada rincian pertanyaan. Coding ini dilakukan untuk memudahkan entry data.'),
(3, 'Input Data (Data Entry)', 'Input Data (Data Entry)\', \'Data Entry yaitu kegiatan memasukkan data ke dalam “form data entry”. Data entry bisa dilakukan dengan aplikasi excel atau aplikasi yang dibuat tersendiri.'),
(4, 'Penyahihan (Validasi)', 'Validasi adalah yaitu kegiatan pemeriksaan dan perbaikan data hasil entri data.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `metode_pengumpulan_data`
--

CREATE TABLE `metode_pengumpulan_data` (
  `id_metode_pengumpulan` int(11) NOT NULL,
  `metode_pengumpulan` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `metode_pengumpulan_data`
--

INSERT INTO `metode_pengumpulan_data` (`id_metode_pengumpulan`, `metode_pengumpulan`) VALUES
(1, 'Wawancara'),
(2, 'Mengisi Kuesioner (Swacacah)'),
(4, 'Pengamatan (Observasi)'),
(8, 'Pengumpulan Data Sekunder');

-- --------------------------------------------------------

--
-- Struktur dari tabel `metode_sampel_pilih`
--

CREATE TABLE `metode_sampel_pilih` (
  `id_metode_sampel_pilih` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `id_detail_metode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `metode_sampel_pilih`
--

INSERT INTO `metode_sampel_pilih` (`id_metode_sampel_pilih`, `id_kegiatan`, `id_detail_metode`) VALUES
(1, 1, 9),
(2, 3, 2),
(3, 3, 1),
(4, 3, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_sub`
--

CREATE TABLE `nilai_sub` (
  `id_nilai_sub` int(11) NOT NULL,
  `id_sub_indikator` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `id_sumber_data` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `penjelasan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai_sub`
--

INSERT INTO `nilai_sub` (`id_nilai_sub`, `id_sub_indikator`, `id_kecamatan`, `id_sumber_data`, `nilai`, `penjelasan`) VALUES
(1, 1, 1, 1, 200, ''),
(4, 1, 5, 4, 2, 'chdjy'),
(8, 1, 5, 1, 200, 'aaqa'),
(9, 1, 5, 1, 0, ''),
(10, 2, 1, 1, 70, ''),
(11, 2, 1, 5, 70, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyelenggara`
--

CREATE TABLE `penyelenggara` (
  `id_penyelenggara` int(11) NOT NULL,
  `unit_kerja` varchar(70) NOT NULL,
  `telepon` varchar(18) NOT NULL,
  `email` varchar(50) NOT NULL,
  `faksimile` varchar(18) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `eselon1` varchar(70) NOT NULL,
  `eselon2` varchar(70) NOT NULL,
  `eselon3` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penyelenggara`
--

INSERT INTO `penyelenggara` (`id_penyelenggara`, `unit_kerja`, `telepon`, `email`, `faksimile`, `alamat`, `eselon1`, `eselon2`, `eselon3`) VALUES
(1, 'Dinas Kesehatan Kabupaten Lima Puluh Kota', '075292418', 'dinaskesehatan50kota@gmail.cpm', '075292172', 'Jln. Jendral Sudirman No. 1 Payakumbuh', '', 'Kepala Dinas Kesehatan Kabupaten Lima Puluh Kota', 'Sekretaris, Kabid');

-- --------------------------------------------------------

--
-- Struktur dari tabel `persyaratan_pendidikan`
--

CREATE TABLE `persyaratan_pendidikan` (
  `id_pendidikan` int(11) NOT NULL,
  `pendidikan` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `persyaratan_pendidikan`
--

INSERT INTO `persyaratan_pendidikan` (`id_pendidikan`, `pendidikan`) VALUES
(1, '<= SMP'),
(2, 'SMA/SMK'),
(3, 'Diploma I/II/III'),
(4, 'Diploma IV/S1/S2/S3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perulangan`
--

CREATE TABLE `perulangan` (
  `id_perulangan` int(11) NOT NULL,
  `perulangan` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `perulangan`
--

INSERT INTO `perulangan` (`id_perulangan`, `perulangan`) VALUES
(1, 'Hanya Sekali'),
(2, 'Berulang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas_pengumpulan_data`
--

CREATE TABLE `petugas_pengumpulan_data` (
  `id_petugas_pengumpulan` int(11) NOT NULL,
  `petugas_pengumpulan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `petugas_pengumpulan_data`
--

INSERT INTO `petugas_pengumpulan_data` (`id_petugas_pengumpulan`, `petugas_pengumpulan`) VALUES
(1, 'Staf Instansi Penyelenggara'),
(2, 'Mitra/Tenaga Kontrak'),
(3, 'Staf Instansi Penyelenggara dan Mitra/Tenaga Kontr');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_hasil`
--

CREATE TABLE `produk_hasil` (
  `id_produk_hasil` int(11) NOT NULL,
  `produk_hasil` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk_hasil`
--

INSERT INTO `produk_hasil` (`id_produk_hasil`, `produk_hasil`) VALUES
(1, 'Tercetak (Hardcopy)'),
(2, 'Digital (Softcopy)'),
(3, 'Data Mikro');

-- --------------------------------------------------------

--
-- Struktur dari tabel `publikasi_ketersediaan`
--

CREATE TABLE `publikasi_ketersediaan` (
  `id_publikasi` int(11) NOT NULL,
  `nama_publikasi` varchar(40) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `publikasi_ketersediaan`
--

INSERT INTO `publikasi_ketersediaan` (`id_publikasi`, `nama_publikasi`, `url`) VALUES
(1, 'Penyakit Menular', 'aada.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sarana_pengumpulan_data`
--

CREATE TABLE `sarana_pengumpulan_data` (
  `id_sarana_pengumpulan` int(11) NOT NULL,
  `sarana_pengumpulan` varchar(40) NOT NULL,
  `rincian_sarana` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sarana_pengumpulan_data`
--

INSERT INTO `sarana_pengumpulan_data` (`id_sarana_pengumpulan`, `sarana_pengumpulan`, `rincian_sarana`) VALUES
(1, 'Paper-assisted Personal Interviewing (PA', 'Wawancara tatap muka langsung dengan media kertas.'),
(2, 'Computer-assisted Personal Interviewing ', 'Wawancara tatap muka langsung tapi pertanyaan dan daftar jawaban akan ditampilkan pada perangkat multimedia contoh (Aplikasi android).'),
(4, 'Computer-assisted Telephones Interviewin', 'Wawancara langsung tetapi via telepon.'),
(8, 'Computer Aided Web Interviewing (CAWI)', 'Menggunakan kuesioner online via komputer atau perangkat lain yang terhubung ke internet.'),
(16, 'Mail', 'Pengumpulan data melalui surat, baik dalam bentuk hardcopy maupun softcopy.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL,
  `satuan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `satuan`) VALUES
(1, 'Orang'),
(2, 'Indeks'),
(3, 'Buah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sektor_kegiatan`
--

CREATE TABLE `sektor_kegiatan` (
  `id_sektor` int(11) NOT NULL,
  `sektor` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sektor_kegiatan`
--

INSERT INTO `sektor_kegiatan` (`id_sektor`, `sektor`) VALUES
(1, 'Pertanian dan Perikanan'),
(2, 'Demografi dan Kependudukan'),
(3, 'Pembangunan'),
(4, 'Proyeksi Ekonomi'),
(5, 'Pendidikan dan Pelatihan'),
(6, 'Lingkungan'),
(7, 'Keuangan'),
(8, 'Globalisasi'),
(9, 'Kesehatan'),
(10, 'Industri dan Jasa'),
(11, 'Teknologi Informasi dan Komunikasi'),
(12, 'Perdagangan Internasional dan Neraca Perdagangan'),
(13, 'Ketenagakerjaan'),
(14, 'Neraca Nasional'),
(15, 'Indikator Ekonomi Bulanan'),
(16, 'Produktivitas'),
(17, 'Harga dan Paritas Daya Beli'),
(18, 'Sektor Publik, Perpajakan, dan Regulasi Pasar'),
(19, 'Perwilayahan dan Perkotaan'),
(20, 'Ilmu Pengetahuan dan Hak Paten'),
(21, 'Perlindungan Sosial dan Kesejahteraan '),
(22, 'Transportasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `status` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id_status`, `status`) VALUES
(1, 'Ya'),
(2, 'Tidak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_indikator`
--

CREATE TABLE `sub_indikator` (
  `id_sub_indikator` int(11) NOT NULL,
  `nama_sub` varchar(100) NOT NULL,
  `id_indikator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sub_indikator`
--

INSERT INTO `sub_indikator` (`id_sub_indikator`, `nama_sub`, `id_indikator`) VALUES
(1, 'Jumlah Penderita wabah muntaber', 1),
(2, 'Jumlah Penderita Malaria', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_jadwal`
--

CREATE TABLE `sub_jadwal` (
  `id_sub_jadwal` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `nama_sub` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sub_jadwal`
--

INSERT INTO `sub_jadwal` (`id_sub_jadwal`, `id_jadwal`, `nama_sub`) VALUES
(1, 1, 'Perencanaan Kegiatan'),
(2, 1, 'Design'),
(3, 2, 'Pengumpulan Data'),
(4, 3, 'Pengolahan Data'),
(5, 4, 'Analisis'),
(6, 4, 'Diseminasi Hasil'),
(7, 4, 'Evaluasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sumber_data`
--

CREATE TABLE `sumber_data` (
  `id_sumber_data` int(11) NOT NULL,
  `sumber_data` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sumber_data`
--

INSERT INTO `sumber_data` (`id_sumber_data`, `sumber_data`) VALUES
(1, 'Dinas Kesehatan'),
(2, 'Puskesmas dan RSUD'),
(3, 'RSUD'),
(4, 'Dinas Kesehatan dan RSUD dr. Achmad Darw'),
(5, 'Dinas Kesehatan dan RSUD ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tingkat_penyajian`
--

CREATE TABLE `tingkat_penyajian` (
  `id_tingkat_penyajian` int(11) NOT NULL,
  `tingkat_penyajian` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tingkat_penyajian`
--

INSERT INTO `tingkat_penyajian` (`id_tingkat_penyajian`, `tingkat_penyajian`) VALUES
(1, 'Nasional'),
(2, 'Provinsi'),
(4, 'Kabupaten/Kota'),
(8, 'Kecamatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_pengumpulan_data`
--

CREATE TABLE `tipe_pengumpulan_data` (
  `id_tipe_pengumpulan` int(11) NOT NULL,
  `tipe_pengumpulan` varchar(40) NOT NULL,
  `rincian_tipe_pengumpulan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tipe_pengumpulan_data`
--

INSERT INTO `tipe_pengumpulan_data` (`id_tipe_pengumpulan`, `tipe_pengumpulan`, `rincian_tipe_pengumpulan`) VALUES
(1, 'Longitudinal Panel ', 'pengumpulan data beberapa variabel pada periode waktu tertentu pada kelompok sampel yang sama untuk mengetahui perubahan kondisi atau hubungan dari populasi yang diamatinya dalam periode waktu yang berbeda.'),
(2, 'Longitudinal Cross Sectional ', 'Pengumpulan data beberapa variabel pada periode waktu tertentu untuk mengetahui hubungan satu variabel dengan variabel lain dan perubahan variabel tersebut dari populasi yang dimatinya dalam periode waktu yang berbeda.'),
(3, 'Cross Sectional ', 'Pengumpulan data beberapa variabel pada satu waktu untuk mengetahui hubungan satu variabel dengan variabel lain pada satu waktu tersebut.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ukuran`
--

CREATE TABLE `ukuran` (
  `id_ukuran` int(11) NOT NULL,
  `ukuran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ukuran`
--

INSERT INTO `ukuran` (`id_ukuran`, `ukuran`) VALUES
(1, 'Kasus'),
(2, 'Orang'),
(3, 'Indeks'),
(4, 'Unit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit_analisis`
--

CREATE TABLE `unit_analisis` (
  `id_unit_analisis` int(11) NOT NULL,
  `unit_analisis` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `unit_analisis`
--

INSERT INTO `unit_analisis` (`id_unit_analisis`, `unit_analisis`) VALUES
(1, 'Rumah Sakit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit_observasi`
--

CREATE TABLE `unit_observasi` (
  `id_unit_observasi` int(11) NOT NULL,
  `unit_observasi` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `unit_observasi`
--

INSERT INTO `unit_observasi` (`id_unit_observasi`, `unit_observasi`) VALUES
(1, 'Rumah Sakit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit_pengumpulan`
--

CREATE TABLE `unit_pengumpulan` (
  `id_unit_pengumpulan` int(11) NOT NULL,
  `unit_pengumpulan` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `unit_pengumpulan`
--

INSERT INTO `unit_pengumpulan` (`id_unit_pengumpulan`, `unit_pengumpulan`) VALUES
(1, 'Individu'),
(2, 'Rumah Tangga'),
(4, 'Usaha/Perusahaan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit_sampel`
--

CREATE TABLE `unit_sampel` (
  `id_unit_sampel` int(11) NOT NULL,
  `unit_sampel` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `unit_sampel`
--

INSERT INTO `unit_sampel` (`id_unit_sampel`, `unit_sampel`) VALUES
(1, 'Rumah Sakit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `urusan`
--

CREATE TABLE `urusan` (
  `id_urusan` int(11) NOT NULL,
  `urusan` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `urusan`
--

INSERT INTO `urusan` (`id_urusan`, `urusan`) VALUES
(1, 'Wajib');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Struktur dari tabel `variabel`
--

CREATE TABLE `variabel` (
  `id_variabel` int(11) NOT NULL,
  `id_confidentional` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `nama_variabel` varchar(100) NOT NULL,
  `alias` varchar(40) NOT NULL,
  `konsep` varchar(100) NOT NULL,
  `definisi` varchar(255) NOT NULL,
  `referensi_pemilihan` varchar(100) NOT NULL,
  `referensi_waktu` varchar(40) NOT NULL,
  `tipe_data` varchar(12) NOT NULL,
  `domain_value` varchar(40) NOT NULL,
  `aturan_validasi` varchar(100) NOT NULL,
  `kalimat_pertanyaan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `variabel`
--

INSERT INTO `variabel` (`id_variabel`, `id_confidentional`, `id_kegiatan`, `nama_variabel`, `alias`, `konsep`, `definisi`, `referensi_pemilihan`, `referensi_waktu`, `tipe_data`, `domain_value`, `aturan_validasi`, `kalimat_pertanyaan`) VALUES
(1, 2, 1, 'Kesehatan Masyarakat', 'Kesmas', 'Aku', 'Sia', 'Diam', 'Jan/Des', 'Integer', 'As', 'asd', 'asad');

-- --------------------------------------------------------

--
-- Struktur dari tabel `variabel_pembangunan`
--

CREATE TABLE `variabel_pembangunan` (
  `id_variabel_pembangunan` int(11) NOT NULL,
  `kode_kegiatan` varchar(30) DEFAULT NULL,
  `kegaiatan_penghasil` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `variabel_pembangunan`
--

INSERT INTO `variabel_pembangunan` (`id_variabel_pembangunan`, `kode_kegiatan`, `kegaiatan_penghasil`, `nama`) VALUES
(1, NULL, 'Jumlah Penderita Gizi Buruk', 'Jumlah Penderita Gizi Buruk');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cakupan_wilayah`
--
ALTER TABLE `cakupan_wilayah`
  ADD PRIMARY KEY (`id_cakupan_wilayah`);

--
-- Indeks untuk tabel `cara_pengumpulan_data`
--
ALTER TABLE `cara_pengumpulan_data`
  ADD PRIMARY KEY (`id_cara_pengumpulan`);

--
-- Indeks untuk tabel `detail_jadwal_pilih`
--
ALTER TABLE `detail_jadwal_pilih`
  ADD PRIMARY KEY (`id_detail_jadwal_pilih`),
  ADD KEY `sub_jadwal_detail_jadwal_pilih_fk` (`id_sub_jadwal`),
  ADD KEY `kegiatan_detail_jadwal_pilih_fk` (`id_kegiatan`);

--
-- Indeks untuk tabel `detail_jumlah_petugas`
--
ALTER TABLE `detail_jumlah_petugas`
  ADD PRIMARY KEY (`id_detail_jumlah`),
  ADD KEY `jumlah_petugas_detail_jumlah_petugas_fk` (`id_jumlah_petugas`),
  ADD KEY `kegiatan_detail_jumlah_petugas_fk` (`id_kegiatan`);

--
-- Indeks untuk tabel `detail_metode_pengolahan`
--
ALTER TABLE `detail_metode_pengolahan`
  ADD PRIMARY KEY (`id_detail_metode`),
  ADD KEY `metode_pengolahan_detail_metode_pengolahan_fk` (`id_metode_pengolahan`),
  ADD KEY `status_detail_metode_pengolahan_fk` (`id_status`),
  ADD KEY `kegiatan_detail_metode_pengolahan_fk` (`id_kegiatan`);

--
-- Indeks untuk tabel `detail_metode_pengumpulan`
--
ALTER TABLE `detail_metode_pengumpulan`
  ADD PRIMARY KEY (`id_detail_metode_pengumpulan`),
  ADD KEY `metode_pengumpulan_data_detail_metode_pengumpulan_fk` (`id_metode_pengumpulan`),
  ADD KEY `kegiatan_detail_metode_pengumpulan_fk` (`id_kegiatan`);

--
-- Indeks untuk tabel `detail_metode_sampel`
--
ALTER TABLE `detail_metode_sampel`
  ADD PRIMARY KEY (`id_detail_metode`),
  ADD KEY `metode_pemilihan_sampel_detail_metode_sampel_fk` (`id_metode_pemilihan`);

--
-- Indeks untuk tabel `detail_produk_hasil`
--
ALTER TABLE `detail_produk_hasil`
  ADD PRIMARY KEY (`id_detail_detail_produk_hasil`),
  ADD KEY `produk_hasil_detail_produk_hasil_fk` (`id_produk_hasil`),
  ADD KEY `status_detail_produk_hasil_fk` (`id_status`),
  ADD KEY `kegiatan_detail_produk_hasil_fk` (`id_kegiatan`);

--
-- Indeks untuk tabel `detail_tingkat_penyajian`
--
ALTER TABLE `detail_tingkat_penyajian`
  ADD PRIMARY KEY (`id_detail_tingkat_penyajian`),
  ADD KEY `tingkat_penyajian_detail_tingkat_penyajian_fk` (`id_tingkat_penyajian`),
  ADD KEY `kegiatan_detail_tingkat_penyajian_fk` (`id_kegiatan`);

--
-- Indeks untuk tabel `frekuensi`
--
ALTER TABLE `frekuensi`
  ADD PRIMARY KEY (`id_frekuensi`);

--
-- Indeks untuk tabel `indikator`
--
ALTER TABLE `indikator`
  ADD PRIMARY KEY (`id_indikator`),
  ADD KEY `variabel_pembangunan_indikator_fk` (`id_variabel_pembangunan`),
  ADD KEY `publikasi_ketersediaan_indikator_fk` (`id_publikasi`),
  ADD KEY `klasifikasi_indikator_fk` (`id_klasifikasi`),
  ADD KEY `ukuran_indikator_fk` (`id_ukuran`),
  ADD KEY `satuan_indikator_fk` (`id_satuan`),
  ADD KEY `status_indikator_fk` (`id_indikator_komposit`),
  ADD KEY `status_indikator_fk1` (`id_diakses_umum`),
  ADD KEY `variabel_indikator_fk` (`id_variabel`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `jenis_rancangan_sampel`
--
ALTER TABLE `jenis_rancangan_sampel`
  ADD PRIMARY KEY (`id_jenis_rancangan`);

--
-- Indeks untuk tabel `jumlah_petugas`
--
ALTER TABLE `jumlah_petugas`
  ADD PRIMARY KEY (`id_jumlah_petugas`);

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indeks untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `unit_analisis_kegiatan_fk` (`id_unit_analisis`),
  ADD KEY `metode_analisis_kegiatan_fk` (`id_metode_analisis`),
  ADD KEY `persyaratan_pendidikan_kegiatan_fk` (`id_pendidikan`),
  ADD KEY `petugas_pengumpulan_data_kegiatan_fk` (`id_petugas_pengumpulan`),
  ADD KEY `metode_pemeriksaan_kegiatan_fk` (`id_metode_pemeriksaan`),
  ADD KEY `unit_observasi_kegiatan_fk` (`id_unit_observasi`),
  ADD KEY `unit_sampel_kegiatan_fk` (`id_unit_sampel`),
  ADD KEY `kerangka_sampel_kegiatan_fk` (`id_kerangka_sampel`),
  ADD KEY `jenis_rancangan_sampel_kegiatan_fk` (`id_jenis_rancangan`),
  ADD KEY `unit_pengumpulan_kegiatan_fk` (`id_unit_pengumpulan`),
  ADD KEY `sarana_pengumpulan_data_kegiatan_fk` (`id_sarana_pengumpulan`),
  ADD KEY `cakupan_wilayah_kegiatan_fk` (`id_cakupan_wilayah`),
  ADD KEY `tipe_pengumpulan_data_kegiatan_fk` (`id_tipe_pengumpulan`),
  ADD KEY `frekuensi_kegiatan_fk` (`id_frekuensi`),
  ADD KEY `perulangan_kegiatan_fk` (`id_perulangan`),
  ADD KEY `urusan_kegiatan_fk` (`id_urusan`),
  ADD KEY `penyelenggara_kegiatan_fk` (`id_penyelenggara`),
  ADD KEY `status_kegiatan_fk` (`id_status_rekomen`),
  ADD KEY `status_kegiatan_fk1` (`id_status_uji_coba`),
  ADD KEY `status_kegiatan_fk2` (`id_status_penyesuaian`),
  ADD KEY `status_kegiatan_fk3` (`id_status_pelatihan`),
  ADD KEY `sektor_kegiatan_kegiatan_fk` (`id_sektor`),
  ADD KEY `cara_pengumpulan_data_kegiatan_fk` (`id_cara_pengumpulan`);

--
-- Indeks untuk tabel `kerangka_sampel`
--
ALTER TABLE `kerangka_sampel`
  ADD PRIMARY KEY (`id_kerangka_sampel`);

--
-- Indeks untuk tabel `klasifikasi`
--
ALTER TABLE `klasifikasi`
  ADD PRIMARY KEY (`id_klasifikasi`);

--
-- Indeks untuk tabel `metode_analisis`
--
ALTER TABLE `metode_analisis`
  ADD PRIMARY KEY (`id_metode_analisis`);

--
-- Indeks untuk tabel `metode_pemeriksaan`
--
ALTER TABLE `metode_pemeriksaan`
  ADD PRIMARY KEY (`id_metode_pemeriksaan`);

--
-- Indeks untuk tabel `metode_pemilihan_sampel`
--
ALTER TABLE `metode_pemilihan_sampel`
  ADD PRIMARY KEY (`id_metode_pemilihan`);

--
-- Indeks untuk tabel `metode_pengolahan`
--
ALTER TABLE `metode_pengolahan`
  ADD PRIMARY KEY (`id_metode_pengolahan`);

--
-- Indeks untuk tabel `metode_pengumpulan_data`
--
ALTER TABLE `metode_pengumpulan_data`
  ADD PRIMARY KEY (`id_metode_pengumpulan`);

--
-- Indeks untuk tabel `metode_sampel_pilih`
--
ALTER TABLE `metode_sampel_pilih`
  ADD PRIMARY KEY (`id_metode_sampel_pilih`),
  ADD KEY `detail_metode_sampel_metode_sampel_pilih_fk` (`id_detail_metode`),
  ADD KEY `kegiatan_metode_sampel_pilih_fk` (`id_kegiatan`);

--
-- Indeks untuk tabel `nilai_sub`
--
ALTER TABLE `nilai_sub`
  ADD PRIMARY KEY (`id_nilai_sub`),
  ADD KEY `sumber_data_nilai_sub_fk` (`id_sumber_data`),
  ADD KEY `kecamatan_nilai_sub_fk` (`id_kecamatan`),
  ADD KEY `sub_indikator_nilai_sub_fk` (`id_sub_indikator`);

--
-- Indeks untuk tabel `penyelenggara`
--
ALTER TABLE `penyelenggara`
  ADD PRIMARY KEY (`id_penyelenggara`);

--
-- Indeks untuk tabel `persyaratan_pendidikan`
--
ALTER TABLE `persyaratan_pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indeks untuk tabel `perulangan`
--
ALTER TABLE `perulangan`
  ADD PRIMARY KEY (`id_perulangan`);

--
-- Indeks untuk tabel `petugas_pengumpulan_data`
--
ALTER TABLE `petugas_pengumpulan_data`
  ADD PRIMARY KEY (`id_petugas_pengumpulan`);

--
-- Indeks untuk tabel `produk_hasil`
--
ALTER TABLE `produk_hasil`
  ADD PRIMARY KEY (`id_produk_hasil`);

--
-- Indeks untuk tabel `publikasi_ketersediaan`
--
ALTER TABLE `publikasi_ketersediaan`
  ADD PRIMARY KEY (`id_publikasi`);

--
-- Indeks untuk tabel `sarana_pengumpulan_data`
--
ALTER TABLE `sarana_pengumpulan_data`
  ADD PRIMARY KEY (`id_sarana_pengumpulan`);

--
-- Indeks untuk tabel `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indeks untuk tabel `sektor_kegiatan`
--
ALTER TABLE `sektor_kegiatan`
  ADD PRIMARY KEY (`id_sektor`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `sub_indikator`
--
ALTER TABLE `sub_indikator`
  ADD PRIMARY KEY (`id_sub_indikator`),
  ADD KEY `indikator_sub_indikator_fk` (`id_indikator`);

--
-- Indeks untuk tabel `sub_jadwal`
--
ALTER TABLE `sub_jadwal`
  ADD PRIMARY KEY (`id_sub_jadwal`),
  ADD KEY `jadwal_sub_jadwal_fk` (`id_jadwal`);

--
-- Indeks untuk tabel `sumber_data`
--
ALTER TABLE `sumber_data`
  ADD PRIMARY KEY (`id_sumber_data`);

--
-- Indeks untuk tabel `tingkat_penyajian`
--
ALTER TABLE `tingkat_penyajian`
  ADD PRIMARY KEY (`id_tingkat_penyajian`);

--
-- Indeks untuk tabel `tipe_pengumpulan_data`
--
ALTER TABLE `tipe_pengumpulan_data`
  ADD PRIMARY KEY (`id_tipe_pengumpulan`);

--
-- Indeks untuk tabel `ukuran`
--
ALTER TABLE `ukuran`
  ADD PRIMARY KEY (`id_ukuran`);

--
-- Indeks untuk tabel `unit_analisis`
--
ALTER TABLE `unit_analisis`
  ADD PRIMARY KEY (`id_unit_analisis`);

--
-- Indeks untuk tabel `unit_observasi`
--
ALTER TABLE `unit_observasi`
  ADD PRIMARY KEY (`id_unit_observasi`);

--
-- Indeks untuk tabel `unit_pengumpulan`
--
ALTER TABLE `unit_pengumpulan`
  ADD PRIMARY KEY (`id_unit_pengumpulan`);

--
-- Indeks untuk tabel `unit_sampel`
--
ALTER TABLE `unit_sampel`
  ADD PRIMARY KEY (`id_unit_sampel`);

--
-- Indeks untuk tabel `urusan`
--
ALTER TABLE `urusan`
  ADD PRIMARY KEY (`id_urusan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `variabel`
--
ALTER TABLE `variabel`
  ADD PRIMARY KEY (`id_variabel`),
  ADD KEY `status_variabel_fk` (`id_confidentional`),
  ADD KEY `kegiatan_variabel_fk` (`id_kegiatan`);

--
-- Indeks untuk tabel `variabel_pembangunan`
--
ALTER TABLE `variabel_pembangunan`
  ADD PRIMARY KEY (`id_variabel_pembangunan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cakupan_wilayah`
--
ALTER TABLE `cakupan_wilayah`
  MODIFY `id_cakupan_wilayah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `cara_pengumpulan_data`
--
ALTER TABLE `cara_pengumpulan_data`
  MODIFY `id_cara_pengumpulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `detail_jadwal_pilih`
--
ALTER TABLE `detail_jadwal_pilih`
  MODIFY `id_detail_jadwal_pilih` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `detail_jumlah_petugas`
--
ALTER TABLE `detail_jumlah_petugas`
  MODIFY `id_detail_jumlah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `detail_metode_pengolahan`
--
ALTER TABLE `detail_metode_pengolahan`
  MODIFY `id_detail_metode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `detail_metode_pengumpulan`
--
ALTER TABLE `detail_metode_pengumpulan`
  MODIFY `id_detail_metode_pengumpulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `detail_metode_sampel`
--
ALTER TABLE `detail_metode_sampel`
  MODIFY `id_detail_metode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `detail_produk_hasil`
--
ALTER TABLE `detail_produk_hasil`
  MODIFY `id_detail_detail_produk_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `detail_tingkat_penyajian`
--
ALTER TABLE `detail_tingkat_penyajian`
  MODIFY `id_detail_tingkat_penyajian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `frekuensi`
--
ALTER TABLE `frekuensi`
  MODIFY `id_frekuensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `indikator`
--
ALTER TABLE `indikator`
  MODIFY `id_indikator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jenis_rancangan_sampel`
--
ALTER TABLE `jenis_rancangan_sampel`
  MODIFY `id_jenis_rancangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jumlah_petugas`
--
ALTER TABLE `jumlah_petugas`
  MODIFY `id_jumlah_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kerangka_sampel`
--
ALTER TABLE `kerangka_sampel`
  MODIFY `id_kerangka_sampel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `klasifikasi`
--
ALTER TABLE `klasifikasi`
  MODIFY `id_klasifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `metode_analisis`
--
ALTER TABLE `metode_analisis`
  MODIFY `id_metode_analisis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `metode_pemeriksaan`
--
ALTER TABLE `metode_pemeriksaan`
  MODIFY `id_metode_pemeriksaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `metode_pemilihan_sampel`
--
ALTER TABLE `metode_pemilihan_sampel`
  MODIFY `id_metode_pemilihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `metode_pengolahan`
--
ALTER TABLE `metode_pengolahan`
  MODIFY `id_metode_pengolahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `metode_sampel_pilih`
--
ALTER TABLE `metode_sampel_pilih`
  MODIFY `id_metode_sampel_pilih` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `nilai_sub`
--
ALTER TABLE `nilai_sub`
  MODIFY `id_nilai_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `penyelenggara`
--
ALTER TABLE `penyelenggara`
  MODIFY `id_penyelenggara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `persyaratan_pendidikan`
--
ALTER TABLE `persyaratan_pendidikan`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `perulangan`
--
ALTER TABLE `perulangan`
  MODIFY `id_perulangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `petugas_pengumpulan_data`
--
ALTER TABLE `petugas_pengumpulan_data`
  MODIFY `id_petugas_pengumpulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `produk_hasil`
--
ALTER TABLE `produk_hasil`
  MODIFY `id_produk_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `publikasi_ketersediaan`
--
ALTER TABLE `publikasi_ketersediaan`
  MODIFY `id_publikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `sektor_kegiatan`
--
ALTER TABLE `sektor_kegiatan`
  MODIFY `id_sektor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `sub_indikator`
--
ALTER TABLE `sub_indikator`
  MODIFY `id_sub_indikator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `sumber_data`
--
ALTER TABLE `sumber_data`
  MODIFY `id_sumber_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tipe_pengumpulan_data`
--
ALTER TABLE `tipe_pengumpulan_data`
  MODIFY `id_tipe_pengumpulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `ukuran`
--
ALTER TABLE `ukuran`
  MODIFY `id_ukuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `unit_observasi`
--
ALTER TABLE `unit_observasi`
  MODIFY `id_unit_observasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `urusan`
--
ALTER TABLE `urusan`
  MODIFY `id_urusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `variabel`
--
ALTER TABLE `variabel`
  MODIFY `id_variabel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `variabel_pembangunan`
--
ALTER TABLE `variabel_pembangunan`
  MODIFY `id_variabel_pembangunan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_jadwal_pilih`
--
ALTER TABLE `detail_jadwal_pilih`
  ADD CONSTRAINT `kegiatan_detail_jadwal_pilih_fk` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id_kegiatan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sub_jadwal_detail_jadwal_pilih_fk` FOREIGN KEY (`id_sub_jadwal`) REFERENCES `sub_jadwal` (`id_sub_jadwal`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `detail_jumlah_petugas`
--
ALTER TABLE `detail_jumlah_petugas`
  ADD CONSTRAINT `jumlah_petugas_detail_jumlah_petugas_fk` FOREIGN KEY (`id_jumlah_petugas`) REFERENCES `jumlah_petugas` (`id_jumlah_petugas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `kegiatan_detail_jumlah_petugas_fk` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id_kegiatan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `detail_metode_pengolahan`
--
ALTER TABLE `detail_metode_pengolahan`
  ADD CONSTRAINT `kegiatan_detail_metode_pengolahan_fk` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id_kegiatan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `metode_pengolahan_detail_metode_pengolahan_fk` FOREIGN KEY (`id_metode_pengolahan`) REFERENCES `metode_pengolahan` (`id_metode_pengolahan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `status_detail_metode_pengolahan_fk` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `detail_metode_pengumpulan`
--
ALTER TABLE `detail_metode_pengumpulan`
  ADD CONSTRAINT `kegiatan_detail_metode_pengumpulan_fk` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id_kegiatan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `metode_pengumpulan_data_detail_metode_pengumpulan_fk` FOREIGN KEY (`id_metode_pengumpulan`) REFERENCES `metode_pengumpulan_data` (`id_metode_pengumpulan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `detail_metode_sampel`
--
ALTER TABLE `detail_metode_sampel`
  ADD CONSTRAINT `metode_pemilihan_sampel_detail_metode_sampel_fk` FOREIGN KEY (`id_metode_pemilihan`) REFERENCES `metode_pemilihan_sampel` (`id_metode_pemilihan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `detail_produk_hasil`
--
ALTER TABLE `detail_produk_hasil`
  ADD CONSTRAINT `kegiatan_detail_produk_hasil_fk` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id_kegiatan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `produk_hasil_detail_produk_hasil_fk` FOREIGN KEY (`id_produk_hasil`) REFERENCES `produk_hasil` (`id_produk_hasil`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `status_detail_produk_hasil_fk` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `detail_tingkat_penyajian`
--
ALTER TABLE `detail_tingkat_penyajian`
  ADD CONSTRAINT `kegiatan_detail_tingkat_penyajian_fk` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id_kegiatan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tingkat_penyajian_detail_tingkat_penyajian_fk` FOREIGN KEY (`id_tingkat_penyajian`) REFERENCES `tingkat_penyajian` (`id_tingkat_penyajian`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `indikator`
--
ALTER TABLE `indikator`
  ADD CONSTRAINT `klasifikasi_indikator_fk` FOREIGN KEY (`id_klasifikasi`) REFERENCES `klasifikasi` (`id_klasifikasi`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `publikasi_ketersediaan_indikator_fk` FOREIGN KEY (`id_publikasi`) REFERENCES `publikasi_ketersediaan` (`id_publikasi`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `satuan_indikator_fk` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `status_indikator_fk` FOREIGN KEY (`id_indikator_komposit`) REFERENCES `status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `status_indikator_fk1` FOREIGN KEY (`id_diakses_umum`) REFERENCES `status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ukuran_indikator_fk` FOREIGN KEY (`id_ukuran`) REFERENCES `ukuran` (`id_ukuran`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `variabel_indikator_fk` FOREIGN KEY (`id_variabel`) REFERENCES `variabel` (`id_variabel`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `variabel_pembangunan_indikator_fk` FOREIGN KEY (`id_variabel_pembangunan`) REFERENCES `variabel_pembangunan` (`id_variabel_pembangunan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `cakupan_wilayah_kegiatan_fk` FOREIGN KEY (`id_cakupan_wilayah`) REFERENCES `cakupan_wilayah` (`id_cakupan_wilayah`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cara_pengumpulan_data_kegiatan_fk` FOREIGN KEY (`id_cara_pengumpulan`) REFERENCES `cara_pengumpulan_data` (`id_cara_pengumpulan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `frekuensi_kegiatan_fk` FOREIGN KEY (`id_frekuensi`) REFERENCES `frekuensi` (`id_frekuensi`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `jenis_rancangan_sampel_kegiatan_fk` FOREIGN KEY (`id_jenis_rancangan`) REFERENCES `jenis_rancangan_sampel` (`id_jenis_rancangan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `kerangka_sampel_kegiatan_fk` FOREIGN KEY (`id_kerangka_sampel`) REFERENCES `kerangka_sampel` (`id_kerangka_sampel`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `metode_analisis_kegiatan_fk` FOREIGN KEY (`id_metode_analisis`) REFERENCES `metode_analisis` (`id_metode_analisis`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `metode_pemeriksaan_kegiatan_fk` FOREIGN KEY (`id_metode_pemeriksaan`) REFERENCES `metode_pemeriksaan` (`id_metode_pemeriksaan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `penyelenggara_kegiatan_fk` FOREIGN KEY (`id_penyelenggara`) REFERENCES `penyelenggara` (`id_penyelenggara`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `persyaratan_pendidikan_kegiatan_fk` FOREIGN KEY (`id_pendidikan`) REFERENCES `persyaratan_pendidikan` (`id_pendidikan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `perulangan_kegiatan_fk` FOREIGN KEY (`id_perulangan`) REFERENCES `perulangan` (`id_perulangan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `petugas_pengumpulan_data_kegiatan_fk` FOREIGN KEY (`id_petugas_pengumpulan`) REFERENCES `petugas_pengumpulan_data` (`id_petugas_pengumpulan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sarana_pengumpulan_data_kegiatan_fk` FOREIGN KEY (`id_sarana_pengumpulan`) REFERENCES `sarana_pengumpulan_data` (`id_sarana_pengumpulan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sektor_kegiatan_kegiatan_fk` FOREIGN KEY (`id_sektor`) REFERENCES `sektor_kegiatan` (`id_sektor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `status_kegiatan_fk` FOREIGN KEY (`id_status_rekomen`) REFERENCES `status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `status_kegiatan_fk1` FOREIGN KEY (`id_status_uji_coba`) REFERENCES `status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `status_kegiatan_fk2` FOREIGN KEY (`id_status_penyesuaian`) REFERENCES `status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `status_kegiatan_fk3` FOREIGN KEY (`id_status_pelatihan`) REFERENCES `status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tipe_pengumpulan_data_kegiatan_fk` FOREIGN KEY (`id_tipe_pengumpulan`) REFERENCES `tipe_pengumpulan_data` (`id_tipe_pengumpulan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `unit_analisis_kegiatan_fk` FOREIGN KEY (`id_unit_analisis`) REFERENCES `unit_analisis` (`id_unit_analisis`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `unit_observasi_kegiatan_fk` FOREIGN KEY (`id_unit_observasi`) REFERENCES `unit_observasi` (`id_unit_observasi`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `unit_pengumpulan_kegiatan_fk` FOREIGN KEY (`id_unit_pengumpulan`) REFERENCES `unit_pengumpulan` (`id_unit_pengumpulan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `unit_sampel_kegiatan_fk` FOREIGN KEY (`id_unit_sampel`) REFERENCES `unit_sampel` (`id_unit_sampel`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `urusan_kegiatan_fk` FOREIGN KEY (`id_urusan`) REFERENCES `urusan` (`id_urusan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `metode_sampel_pilih`
--
ALTER TABLE `metode_sampel_pilih`
  ADD CONSTRAINT `detail_metode_sampel_metode_sampel_pilih_fk` FOREIGN KEY (`id_detail_metode`) REFERENCES `detail_metode_sampel` (`id_detail_metode`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `kegiatan_metode_sampel_pilih_fk` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id_kegiatan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `nilai_sub`
--
ALTER TABLE `nilai_sub`
  ADD CONSTRAINT `kecamatan_nilai_sub_fk` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sub_indikator_nilai_sub_fk` FOREIGN KEY (`id_sub_indikator`) REFERENCES `sub_indikator` (`id_sub_indikator`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sumber_data_nilai_sub_fk` FOREIGN KEY (`id_sumber_data`) REFERENCES `sumber_data` (`id_sumber_data`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `sub_indikator`
--
ALTER TABLE `sub_indikator`
  ADD CONSTRAINT `indikator_sub_indikator_fk` FOREIGN KEY (`id_indikator`) REFERENCES `indikator` (`id_indikator`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `sub_jadwal`
--
ALTER TABLE `sub_jadwal`
  ADD CONSTRAINT `jadwal_sub_jadwal_fk` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `variabel`
--
ALTER TABLE `variabel`
  ADD CONSTRAINT `kegiatan_variabel_fk` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id_kegiatan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `status_variabel_fk` FOREIGN KEY (`id_confidentional`) REFERENCES `status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
