<?php
    include "../konfigurasi/session.php";
    $id_kegiatan=$_REQUEST['id_kegiatan'];

    if(!$que = $conn->query("SELECT a.judul_kegiatan as judul, a.tahun as tahun, a.kode_kegiatan as kode_kegiatan, a.latar_belakang as latar_belakang, a.tujuan as tujuan, 
        cara_pengumpulan_data.cara_pengumpulan as cara_pengumpulan, sektor_kegiatan.sektor as sektor, 
        b.status as status_rekomen, penyelenggara.unit_kerja as unit_kerja, penyelenggara.alamat as alamat, 
        penyelenggara.telepon as telepon, penyelenggara.email as email, penyelenggara.faksimile as faksimile, 
        penyelenggara.eselon1 as eselon1, penyelenggara.eselon2 as eselon2, penyelenggara.eselon3 as eselon3, 
        perulangan.perulangan as perulangan, frekuensi.frekuensi as frekuensi, 
        tipe_pengumpulan_data.tipe_pengumpulan as tipe_pengumpulan, 
        cakupan_wilayah.cakupan_wilayah as cakupan_wilayah, a.provinsi as provinsi, a.kabkot as kabkot, 
        sarana_pengumpulan_data.sarana_pengumpulan as sarana_kumpul, unit_pengumpulan.unit_pengumpulan as unit_kumpul, 
        jenis_rancangan_sampel.jenis_rancangan as jenis_rancangan, metode_pemilihan_sampel.metode_pemilihan as metode_pemilihan, 
        detail_metode_sampel.metode_sampel as metode_sampel, 
        kerangka_sampel.kerangka_sampel as kerangka_sampel, a.fraksi_sampel as fraksi_sampel, 
        a.perkiraan_sampling as perkiraan_sampling, unit_sampel.unit_sampel AS unit_sampel,
        unit_observasi.unit_observasi AS unit_observasi, c.`status` AS uji_coba, metode_pemeriksaan.metode_pemeriksaan
        AS metode_pemeriksaan, d.`status` AS penyesuaian, petugas_pengumpulan_data.petugas_pengumpulan AS petugas_pengumpulan,
        persyaratan_pendidikan.pendidikan AS pendidikan, e.`status` AS pelatihan, metode_analisis.metode_analisis
        AS metode_analisis, unit_analisis.unit_analisis AS unit_analisis from kegiatan as a join cara_pengumpulan_data 
        on a.id_cara_pengumpulan=cara_pengumpulan_data.id_cara_pengumpulan join sektor_kegiatan ON 
        a.id_sektor=sektor_kegiatan.id_sektor join status as b on b.id_status=a.id_status_rekomen 
        join penyelenggara on a.id_penyelenggara=penyelenggara.id_penyelenggara join perulangan 
        on a.id_perulangan=perulangan.id_perulangan join frekuensi on a.id_frekuensi=frekuensi.id_frekuensi 
        join tipe_pengumpulan_data on a.id_tipe_pengumpulan=tipe_pengumpulan_data.id_tipe_pengumpulan 
        join cakupan_wilayah on a.id_cakupan_wilayah=cakupan_wilayah.id_cakupan_wilayah JOIN 
        sarana_pengumpulan_data on a.id_sarana_pengumpulan=sarana_pengumpulan_data.id_sarana_pengumpulan 
        join unit_pengumpulan on a.id_unit_pengumpulan=unit_pengumpulan.id_unit_pengumpulan 
        join jenis_rancangan_sampel on a.id_jenis_rancangan=jenis_rancangan_sampel.id_jenis_rancangan join metode_sampel_pilih on a.id_kegiatan=
        metode_sampel_pilih.id_kegiatan join detail_metode_sampel on detail_metode_sampel.id_detail_metode=
        metode_sampel_pilih.id_detail_metode join metode_pemilihan_sampel on metode_pemilihan_sampel.id_metode_pemilihan=detail_metode_sampel.id_metode_pemilihan
        join kerangka_sampel on kerangka_sampel.id_kerangka_sampel=
        a.id_kerangka_sampel join unit_sampel ON a.id_unit_sampel=unit_sampel.id_unit_sampel JOIN unit_observasi
        ON a.id_unit_observasi=unit_observasi.id_unit_observasi join status AS c ON a.id_status_uji_coba=
        c.id_status JOIN metode_pemeriksaan ON a.id_metode_pemeriksaan=metode_pemeriksaan.id_metode_pemeriksaan
        join status AS d ON a.id_status_penyesuaian=d.id_status JOIN petugas_pengumpulan_data ON a.id_petugas_pengumpulan
        =petugas_pengumpulan_data.id_petugas_pengumpulan JOIN persyaratan_pendidikan ON a.id_pendidikan=
        persyaratan_pendidikan.id_pendidikan JOIN status AS e ON a.id_status_pelatihan=e.id_status
        JOIN metode_analisis ON a.id_metode_analisis=metode_analisis.id_metode_analisis JOIN unit_analisis ON
        a.id_unit_analisis=unit_analisis.id_unit_analisis where a.id_kegiatan=$id_kegiatan")){
        die("gagal meminta data");
    }

    while($data = $que->fetch_assoc()){
        $judul = $data['judul'];
        $latar_belakang = $data['latar_belakang'];
        $tujuan = $data['tujuan'];
        $kode_kegiatan = $data['kode_kegiatan'];
        $cara_pengumpulan = $data['cara_pengumpulan'];
        $rekomendasi = $data['status_rekomen'];
        $tahun = $data['tahun'];
        $sektor = $data['sektor'];
        $status_rekomen = $data['status_rekomen'];
        $unit_kerja = $data['unit_kerja'];
        $alamat = $data['alamat'];
        $telepon = $data['telepon'];
        $email = $data['email'];
        $faksimile = $data['faksimile'];
        $eselon1 = $data['eselon1'];
        $eselon2 = $data['eselon2'];
        $eselon3 = $data['eselon3'];
        $perulangan = $data['perulangan'];
        $frekuensi = $data['frekuensi'];
        $tipe_pengumpulan = $data['tipe_pengumpulan'];
        $cakupan_wilayah = $data['cakupan_wilayah'];
        $provinsi = $data['provinsi'];
        $kabkot = $data['kabkot'];
        $sarana_kumpul = $data['sarana_kumpul'];
        $unit_kumpul = $data['unit_kumpul'];
        $jenis_rancangan = $data['jenis_rancangan']; 
        $fraksi_sampel =$data['fraksi_sampel'];
        $kerangka_sampel = $data['kerangka_sampel'];
        $perkiraan_sampling =$data['perkiraan_sampling'];
        $unit_sampel = $data['unit_sampel'];
        $unit_observasi= $data['unit_observasi'];
        $uji_coba = $data['uji_coba'];
        $metode_pemeriksaan = $data['metode_pemeriksaan'];
        $penyesuaian = $data['penyesuaian'];
        $petugas_pengumpulan = $data['petugas_pengumpulan'];
        $pendidikan = $data['pendidikan'];
        $pelatihan = $data['pelatihan'];
        $unit_analisis = $data['unit_analisis'];
        $metode_analisis = $data['metode_analisis'];
        $metode_pemilihan = $data['metode_pemilihan'];
        $metode_sampel = $data['metode_sampel'];
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Detail Metadata Kegiatan</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link rel="shortcut icon" type="image/png" href="../dark/logo/logo.png">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">

    <script>
        function text11(that) {
        if (that.value != "Lainnya") {
            document.getElementById("prop11").disabled = true;
            document.getElementById("prop11").style.display = "none";
        } else {
            document.getElementById("prop11").disabled = false;
            document.getElementById("prop11").style.display = "block";
        }
        return;
        }

        function text12(that) {
        if (that.value != "Lainnya") {
            document.getElementById("prop12").disabled = true;
            document.getElementById("prop12").style.display = "none";
        } else {
            document.getElementById("prop12").disabled = false;
            document.getElementById("prop12").style.display = "block";
        }
        return;
        }

        function text17(that) {
        if (that.value != "1") {
            document.getElementById("prop17").disabled = true;
            document.getElementById("prop17").style.display = "none";
        } else {
            document.getElementById("prop17").disabled = false;
            document.getElementById("prop17").style.display = "block";
        }
        return;
        }
    </script>

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <?php include("../konfigurasi/header.php");?>

    <main id="main" class="main">

        <div class="pagetitle">
        <h1>Detail Metadata Kegiatan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../konfigurasi/index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="kegiatan.php">Metadata Kegiatan</a></li>
                <li class="breadcrumb-item active">Detail Metadata Kegiatan</li>
            </ol>
        </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                <div class="card"><br>
                    <div class="col-md-12" style="margin-left:15px">
                    <a href="../variabel/variabel_indikator.php?id_kegiatan=<?php echo $id_kegiatan?>" class="btn btn-outline-success btn-mt col-md-2"><i class="bi bi-card-list"></i> Metadata Variabel dan Indikator </a>
                    &nbsp; &nbsp;
                    <a href="../cetak/cetak_kegiatan.php?id_kegiatan=<?php echo $id_kegiatan?>" target="_BLANK" class="btn btn-outline-primary btn-mt col-md-2"><i class="bi bi-cloud-download-fill"></i> Cetak Metadata Kegiatan </a>
                    &nbsp; &nbsp;
                    <a href="../cetak/cetak_variabel.php?id_kegiatan=<?php echo $id_kegiatan?>" target="_BLANK" class="btn btn-outline-primary btn-mt col-md-2"><i class="bi bi-cloud-download-fill"></i> Cetak Metadata Variabel </a>
                    &nbsp; &nbsp;
                    <a href="../cetak/cetak_indikator.php?id_kegiatan=<?php echo $id_kegiatan?>" target="_BLANK" class="btn btn-outline-primary btn-mt col-md-2"><i class="bi bi-cloud-download-fill"></i> Cetak Metadata Indikator </a>
                    &nbsp; &nbsp;
                    <a href="../cetak/cetak_database.php?id_kegiatan=<?php echo $id_kegiatan?>" class="btn btn-outline-primary btn-mt col-md-2"><i class="bi bi-cloud-download-fill"></i> Cetak Data Statistik Sektoral </a>               
                    </div>
                    <div class="card-body">
                    <h5 class="card-title text-center">M E T A D A T A - S T A T I S T I K - K E G I A T A N</h5>

                    <div class="tab-pane fade show active profile-overview" id="profile-overview">
                        <div class="row">
                            <div class="col-lg-6 col-md-3 label">Judul Kegiatan</div>
                            <div class="col-lg-6 col-md-9"><?php echo $judul?></div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-3 label">Tahun Kegiatan</div>
                            <div class="col-lg-6 col-md-9"><?php echo $tahun?></div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-3 label">Kode Kegitan Kegiatan</div>
                            <div class="col-lg-6 col-md-9"><?php echo $kode_kegiatan?></div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-3 label">Latar Belakang Kegiatan</div>
                            <div class="col-lg-6 col-md-9"><?php echo $latar_belakang?></div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-3 label">Tujuan Kegiatan</div>
                            <div class="col-lg-6 col-md-9"><?php echo $tujuan?></div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-3 label">Cara Pengumpulan Metadata</div>
                            <div class="col-lg-6 col-md-9"><?php echo $cara_pengumpulan?></div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-3 label">Sektor Kegiatan</div>
                            <div class="col-lg-6 col-md-9"><?php echo $sektor?></div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-3 label">Status Rekomendasi BPS</div>
                            <div class="col-lg-6 col-md-9"><?php echo $rekomendasi?></div>
                        </div>
                </div>
                </div>
            </div>
        </div>
        </section>
        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title text-center">P E N Y E L E N G G A R A</h5>

                    <div class="tab-pane fade show active profile-overview" id="profile-overview">
                        <div class="row">
                            <div class="col-lg-6 col-md-3 label">Instansi Penyelenggara</div>
                            <div class="col-lg-6 col-md-9"><?php echo $unit_kerja?></div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-3 label">Alamat Instansi Penyelenggara</div>
                            <div class="col-lg-6 col-md-9"><?php echo $alamat?></div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-3 label">Telepon</div>
                            <div class="col-lg-6 col-md-9"><?php echo $telepon?></div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-3 label">Email</div>
                            <div class="col-lg-6 col-md-9"><?php echo $email?></div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-3 label">Faksimile</div>
                            <div class="col-lg-6 col-md-9"><?php echo $faksimile?></div>
                        </div>
                </div>
                </div>
            </div>
        </div>
        </div>
        </section>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title text-center">P E N A N G G U N G J A W A B</h5>

                    <div class="tab-pane fade show active profile-overview" id="profile-overview">
                        <div class="row">
                            <div class="col-lg-6 col-md-3 label">Unit Eselon Penanggung Jawab</div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-3 label">Eselon 1</div>
                            <div class="col-lg-6 col-md-9"><?php echo $eselon1?></div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-3 label">Eselon 2</div>
                            <div class="col-lg-6 col-md-9"><?php echo $eselon2?></div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-3 label">Penanggung Jawab Teknis (Setingkat Eselon 3)</div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-3 label">Eselon 3</div>
                            <div class="col-lg-6 col-md-9"><?php echo $eselon3?></div>
                        </div>
                </div>
                </div>
            </div>
        </div>
        </section>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title text-center">P E R E N C A N A A N - D A N - P E R S I A P A N</h5>

                    <div class="tab-pane fade show active profile-overview" id="profile-overview">
                        <div class="row">
                            <div class="col-lg-6 col-md-3 label">Latar Belakang Kegiatan</div>
                            <div class="col-lg-6 col-md-9"><?php echo $latar_belakang?></div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-3 label">Tujuan Kegiatan</div>
                            <div class="col-lg-6 col-md-9"><?php echo $tujuan?></div>
                        </div>
                        <br>
                        <div class="row">
                        <h6 class="text-center">J A D W A L - K E G I A T A N</h5>
                        </div><br>

                        <br>
                        <div class="row">
                        <div class="col-12">
                        <table class="table table-hover col-md-10 mx-1">
                            <thead bgcolor="#6ec4cb" style="color:black">
                            <tr>
                                <th scope="col" class="text-center" width="5%">No.</th>
                                <th scope="col" class="text-center">Uraian</th>
                                <th scope="col" class="text-center" colspan="3">Waktu Mulai</th>
                                <th scope="col" class="text-center" colspan="3">Waktu Selesai</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $no=1;
                                $hi = $conn->query("SELECT * from jadwal");
                                while($row = $hi->fetch_assoc()){
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $no++; ?></td>
                                <td colspan="7"><?php echo $row['jadwal']; ?></td>
                                <tr>
                                <?php 
                                    $noo = 1;
                                    $a= $row['id_jadwal']; 
                                    $hi4 = $conn->query("SELECT nama_sub, day(tanggal_mulai) as tanggal1, day(tanggal_selesai)
                                                    as tanggal2, monthname(tanggal_mulai) as bulan1, monthname(tanggal_selesai) as 
                                                    bulan2, year(tanggal_mulai) as tahun1, year(tanggal_selesai) as tahun2, sub_jadwal.id_sub_jadwal as id_sub_jadwal
                                                    FROM detail_jadwal_pilih join sub_jadwal 
                                                    on sub_jadwal.id_sub_jadwal=detail_jadwal_pilih.id_sub_jadwal where 
                                                    sub_jadwal.id_jadwal= $a and id_kegiatan= $id_kegiatan order by sub_jadwal.id_sub_jadwal");
                                    while($row3 = $hi4->fetch_assoc()){
                                ?>
                                <td class="text-center"><?php echo $no-1, ".", $noo++; ?></td>
                                <td><?php echo $row3['nama_sub']; ?></td>
                                <td><?php echo $row3['tanggal1']; ?></td>
                                <td><?php echo $row3['bulan1']; ?></td>
                                <td><?php echo $row3['tahun1']; ?></td>
                                <td><?php echo $row3['tanggal2']; ?></td>
                                <td><?php echo $row3['bulan2']; ?></td>
                                <td><?php echo $row3['tahun2']; ?></td>                              
                                </tr>
                                <?php } ?>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        <br>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        </section>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title text-center">D E S A I N - K E G I A T A N</h5>

                    <div class="tab-pane fade show active profile-overview" id="profile-overview">
                    <div class="row">
                        <div class="col-lg-6 col-md-3 label">Kegiatan Dilakukan</div>
                        <div class="col-lg-6 col-md-9"><?php echo $perulangan?></div>
                    </div>
                    <?php if($perulangan == "Berulang"){ ?>
                    <div class="row">
                        <div class="col-lg-6 col-md-3 label">Frekuensi Perulangan</div>
                        <div class="col-lg-6 col-md-9"><?php echo $frekuensi?></div>
                    </div>
                    <?php } ?>
                    <div class="row">
                        <div class="col-lg-6 col-md-3 label">Tipe Pengumpulan Data</div>
                        <div class="col-lg-6 col-md-9"><?php echo $tipe_pengumpulan?></div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-3 label">Cakupan Wilayah Pengumpulan Data</div>
                        <div class="col-lg-6 col-md-9"><?php echo $cakupan_wilayah?></div>
                    </div>

                    <?php if($cakupan_wilayah == "Sebagian Wilayah Indonesia"){ ?>
                    <div class="row">
                        <div class="col-lg-6 col-md-3 label">Provinsi</div>
                        <div class="col-lg-6 col-md-9"><?php echo $provinsi?></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-3 label">Kabupaten / Kota</div>
                        <div class="col-lg-6 col-md-9"><?php echo $kabkot?></div>
                    </div>
                    <?php } ?>

                    <div class="row">
                        <div class="col-lg-6 col-md-3 label">Sarana Pengumpulan Data</div>
                        <div class="col-lg-6 col-md-9"><?php echo $sarana_kumpul?></div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-3 label">Unit Pengumpulan Data</div>
                        <div class="col-lg-6 col-md-9"><?php echo $unit_kumpul?></div>
                    </div>
                </div><br>

                <div class="row">
                    <br>
                    <div class="col-12">
                    <table class="table table-hover col-md-10 mx-1">
                        <thead bgcolor="#6ec4cb" style="color:black">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col" class="text-center">Metode Pengumpulan Data</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $no = 1;
                            $hi = $conn->query("SELECT * from metode_pengumpulan_data join detail_metode_pengumpulan on metode_pengumpulan_data.id_metode_pengumpulan=
                                                detail_metode_pengumpulan.id_metode_pengumpulan where id_kegiatan=$id_kegiatan");
                            while($row = $hi->fetch_assoc()){
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td class="text-center"><?php echo $row['metode_pengumpulan']; ?></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <br>
                </div>
                </div>
                </div>
                </div>
            </div>
        </div>
        </section>

        <section class="section">
        <div class="row">
            <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                <h5 class="card-title text-center">D E S A I N - S A M P E L</h5>

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <div class="row">
                    <div class="col-lg-6 col-md-3 label">Jenis Rancangan Sampel</div>
                    <div class="col-lg-6 col-md-9"><?php echo $jenis_rancangan?></div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-3 label">Metode Pemilihan Sampel</div>
                    <div class="col-lg-6 col-md-9"><?php echo $metode_pemilihan?></div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-3 label">Nama Metode </div>
                    <div class="col-lg-6 col-md-9"><?php echo $metode_sampel?></div>
                </div>
                
                <div class="row">
                    <div class="col-lg-6 col-md-3 label">Kerangka Sampel</div>
                    <div class="col-lg-6 col-md-9"><?php echo $kerangka_sampel?></div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-3 label">Fraksi Sampel</div>
                    <div class="col-lg-6 col-md-9"><?php echo $fraksi_sampel?></div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-3 label">Nilai Perkiraan Sampel</div>
                    <div class="col-lg-6 col-md-9"><?php echo $perkiraan_sampling?></div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-3 label">Unit Sampel</div>
                    <div class="col-lg-6 col-md-9"><?php echo $unit_sampel?></div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-3 label">Unit Observasi</div>
                    <div class="col-lg-6 col-md-9"><?php echo $unit_observasi?></div>
                </div>
                </div>
                </div>
            </div>
        </div>
        </section>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title text-center">P E N J A M I N A N - K U A L I T A S</h5>

                    <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <div class="row">
                    <div class="col-lg-6 col-md-3 label">Uji Coba</div>
                    <div class="col-lg-6 col-md-9"><?php echo $uji_coba?></div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-3 label">Metode Pemeriksaan</div>
                    <div class="col-lg-6 col-md-9"><?php echo $metode_pemeriksaan?></div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-3 label">Penyesuaian Nonresponden</div>
                    <div class="col-lg-6 col-md-9"><?php echo $penyesuaian?></div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-3 label">Petugas Pengumpulan Data</div>
                    <div class="col-lg-6 col-md-9"><?php echo $petugas_pengumpulan?></div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-3 label">Persyaratan Pendidikan Petugas</div>
                    <div class="col-lg-6 col-md-9"><?php echo $pendidikan?></div>
                </div>
                
                <div class="row">
                    <div class="col-lg-6 col-md-3 label">Pelatihan Petugas</div>
                    <div class="col-lg-6 col-md-9"><?php echo $pelatihan?></div>
                </div><br>

                <div class="row">
                <div class="col-12">
                    
                    <table class="table table-hover col-md-10 mx-1">
                    <thead bgcolor="#6ec4cb" style="color:black">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col" class="text-center">Tipe Petugas</th>
                        <th scope="col" class="text-center" width="20%">Jumlah</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $no = 1;
                        $hi = $conn->query("SELECT * from jumlah_petugas join detail_jumlah_petugas on jumlah_petugas.id_jumlah_petugas=
                                            detail_jumlah_petugas.id_jumlah_petugas where id_kegiatan=$id_kegiatan");
                        while($row = $hi->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td class="text-center"><?php echo $row['jumlah_petugas']; ?></td>
                        <td class="text-center"><?php echo $row['jumlah']; ?></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                    </table>
                    <br>
                </div>
                </div>
                </div>
            </div>
        </div>
        </section>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title text-center">P E N G O L A H A N - D A N - A N A L I S I S</h5>

                    <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <div class="row">
                <div class="col-12">
                    <br>
                    <table class="table table-hover col-md-10 mx-1">
                    <thead bgcolor="#6ec4cb" style="color:black">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col" class="text-center">Metode Pengolahan</th>
                        <th scope="col" class="text-center" width="20%">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $no = 1;
                        $hi = $conn->query("SELECT * from metode_pengolahan join detail_metode_pengolahan on metode_pengolahan.id_metode_pengolahan=
                                            detail_metode_pengolahan.id_metode_pengolahan join status on status.id_status=detail_metode_pengolahan.id_status where id_kegiatan=$id_kegiatan");
                        while($row = $hi->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td class="text-center"><?php echo $row['metode_pengolahan']; ?></td>
                        <td class="text-center"><?php echo $row['status']; ?></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                    </table>
                    <br>
                </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-3 label">Metode Analisis</div>
                    <div class="col-lg-6 col-md-9"><?php echo $metode_analisis?></div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-3 label">Unit Analisis</div>
                    <div class="col-lg-6 col-md-9"><?php echo $unit_analisis?></div>
                </div>

                <div class="row">
                <div class="col-12">
                    <br>
                    <table class="table table-hover col-md-10 mx-1">
                    <thead bgcolor="#6ec4cb" style="color:black">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col" class="text-center">Tingkat Penyajian Data</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $no = 1;
                        $hi = $conn->query("SELECT * from tingkat_penyajian join detail_tingkat_penyajian on tingkat_penyajian.id_tingkat_penyajian=
                                            detail_tingkat_penyajian.id_tingkat_penyajian where id_kegiatan=$id_kegiatan");
                        while($row = $hi->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td class="text-center"><?php echo $row['tingkat_penyajian']; ?></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                    </table>
                    <br>
                </div>
                </div>
                </div>
                </div>
            </div>
        </div>
        </section>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title text-center">D I S E M I N A S I - H A S I L</h5>

                    <div class="tab-pane fade show active profile-overview" id="profile-overview">

                <div class="row">
                    <div class="col-12">
                    <br>
                    <table class="table table-hover col-md-10 mx-1">
                        <thead bgcolor="#6ec4cb" style="color:black">
                        <tr>
                            <th rowspan="2" scope="col"><br>No.<br><br></th>
                            <th rowspan="2" scope="col" class="text-center"><br>Hasil Produk Kegiatan<br><br></th>
                            <th rowspan="2" scope="col" class="text-center"><br>Status<br><br></th>
                            <th scope="col" colspan="3" class="text-center">Waktu Rilis</th>
                        </tr>
                        <tr>
                            <th scope="col" class="text-center">Tanggal</th>
                            <th scope="col" class="text-center">Bulan</th>
                            <th scope="col" class="text-center">Tahun</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $no = 1;
                            $hii = $conn->query("SELECT status, produk_hasil, day(waktu_rilis) as tanggal, monthname(waktu_rilis) as bulan,
                                                year(waktu_rilis) as tahun, produk_hasil.id_produk_hasil as id_produk_hasil from produk_hasil 
                                                join detail_produk_hasil on produk_hasil.id_produk_hasil=
                                                detail_produk_hasil.id_produk_hasil join status on status.id_status=detail_produk_hasil.id_status
                                                where id_kegiatan=$id_kegiatan");
                            while($rowt = $hii->fetch_assoc()){
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td class="text-center"><?php echo $rowt['produk_hasil']; ?></td>
                            <td class="text-center"><?php echo $rowt['status']; ?></td>
                            <td class="text-center"><?php echo $rowt['tanggal']; ?></td>
                            <td class="text-center"><?php echo $rowt['bulan']; ?></td>
                            <td class="text-center"><?php echo $rowt['tahun']; ?></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-warning w-100"><a href="kegiatan.php" style="color:black; text-decoration:none;">Kembali</a></button>
                    </div>
                </div>
                </div>
                </div>
            </div>
        </div>
        </section>

    </main><!-- End #main -->

    <?php include "../konfigurasi/footer.php"?>

</body>

</html>