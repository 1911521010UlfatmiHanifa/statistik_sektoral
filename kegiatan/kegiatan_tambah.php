<?php
    include "../konfigurasi/session.php";

    if(isset($_POST['simpan'])){
        $id_urusan = $_POST['id_urusan'];
        if($id_urusan == "Lainnya"){
            $urusan = ucwords($_POST['urusan']);
            if(!empty($urusan)){
                $stmt=$conn->prepare('INSERT INTO urusan(urusan) VALUES (?)');
                $stmt->bind_param("s", $urusan);
                $stmt->execute();
                $stmt->close();

                $hasil = $conn->query("SELECT max(id_urusan) as id_urusan FROM urusan");
                $row = $hasil->fetch_assoc();
                $id_urusan = $row['id_urusan'];
            }
        }
        $judul_kegiatan = $_POST['judul_kegiatan'];
        $id_cara_pengumpulan = $_POST['id_cara_pengumpulan'];
        $id_sektor = $_POST['id_sektor'];
        $id_rekomendasi = $_POST['id_status1'];
        $id_penyelenggara = $_POST['id_penyelenggara'];
        $latar_belakang = ucwords($_POST['latar_belakang']);
        $tujuan = ucwords($_POST['tujuan']);
        $id_perulangan = $_POST['id_perulangan'];
        if($id_perulangan == 1){
            $id_frekuensi = 9;
        }else{
            $id_frekuensi = $_POST['id_frekuensi'];
        }
        $id_tipe_pengumpulan = $_POST['id_tipe_pengumpulan'];
        $id_cakupan_wilayah = $_POST['id_cakupan_wilayah'];
        if($id_cakupan_wilayah == 2){
            $provinsi = ucwords($_POST['provinsi']);
            $kabkot = ucwords($_POST['kabkot']);
        }else{
            $provinsi = "";
            $kabkot = "";
        }
        $id_sarana_pengumpulan = $_POST['id_sarana_pengumpulan'];
        if($id_sarana_pengumpulan == "Lainnya"){
            $sarana_pengumpulan = ucwords($_POST['sarana_pengumpulan']);
            $b = "";
            if(!empty($sarana_pengumpulan)){
                $stmt2=$conn->prepare('INSERT INTO sarana_pengumpulan_data (sarana_pengumpulan, rincian_sarana) VALUES (?,?)');
                $stmt2->bind_param("ss", $sarana_pengumpulan, $b);
                $stmt2->execute();
                $stmt2->close();

                $hasil2 = $conn->query("SELECT max(id_sarana_pengumpulan) as id_sarana_pengumpulan FROM sarana_pengumpulan_data");
                $row2 = $hasil2->fetch_assoc();
                $id_sarana_pengumpulan = $row2['id_sarana_pengumpulan'];
            }
        }
        $id_unit_pengumpulan = $_POST['id_unit_pengumpulan'];
        if($id_unit_pengumpulan == "Lainnya"){
            $unit_pengumpulan = ucwords($_POST['unit_pengumpulan']);
            if(!empty($unit_pengumpulan)){
                $stmt3=$conn->prepare('INSERT INTO unit_pengumpulan(unit_pengumpulan)
                                        VALUES (?)');
                $stmt3->bind_param("s", $unit_pengumpulan);
                $stmt3->execute();
                $stmt3->close();

                $hasil3 = $conn->query("SELECT max(id_unit_pengumpulan) as id_unit_pengumpulan FROM unit_pengumpulan");
                $row3 = $hasil3->fetch_assoc();
                $id_unit_pengumpulan = $row3['id_unit_pengumpulan'];
            }
        }
        $id_jenis_rancangan = $_POST['id_jenis_rancangan'];
        $id_kerangka_sampel = $_POST['id_kerangka_sampel'];
        $fraksi_sampel = $_POST['fraksi_sampel'];
        $perkiraan_sampling = $_POST['perkiraan_sampling'];
        $id_unit_sampel = $_POST['id_unit_sampel'];
        if($id_unit_sampel == "Lainnya"){
            $unit_sampel = ucwords($_POST['unit_sampel']);
            if(!empty($unit_sampel)){
                $hasil21 = $conn->query("SELECT max(id_unit_sampel) as id_unit_sampel FROM unit_sampel");
                $row21 = $hasil2->fetch_assoc();
                $id_unit_sampel = $row21['id_unit_sampel'] + 1;
                $stmt4=$conn->prepare('INSERT INTO unit_sampel (id_unit_sampel, unit_sampel) VALUES (?,?)');
                $stmt4->bind_param("is", $id_unit_sampel, $unit_sampel);
                $stmt4->execute();
                $stmt4->close();
            }
        }
        $id_unit_observasi = $_POST['id_unit_observasi'];
        if($id_unit_observasi == "Lainnya"){
            $unit_observasi = ucwords($_POST['unit_observasi']);
            if(!empty($unit_observasi)){
                $stmt5=$conn->prepare('INSERT INTO unit_observasi(unit_observasi)
                                        VALUES (?)');
                $stmt5->bind_param("s", $unit_observasi);
                $stmt5->execute();
                $stmt5->close();

                $hasil5 = $conn->query("SELECT max(id_unit_observasi) as id_unit_observasi FROM unit_observasi");
                $row5 = $hasil5->fetch_assoc();
                $id_unit_observasi = $row5['id_unit_observasi'];
            }
        }
        $uji_coba = $_POST['id_status2'];
        $id_metode_pemeriksaan = $_POST['id_metode_pemeriksaan'];   
        if($id_metode_pemeriksaan == "Lainnya"){
            $metode_pemeriksaan = ucwords($_POST['metode_pemeriksaan']);
            $a = "";
            if(!empty($metode_pemeriksaan)){
                $stmt6=$conn->prepare("INSERT INTO metode_pemeriksaan(metode_pemeriksaan, rincian_metode_pemeriksaan) VALUES (?, ?)");
                $stmt6->bind_param("ss", $metode_pemeriksaan, $a);
                $stmt6->execute();
                $stmt6->close();

                $hasil6 = $conn->query("SELECT max(id_metode_pemeriksaan) as id_metode_pemeriksaan FROM metode_pemeriksaan");
                $row6 = $hasil6->fetch_assoc();
                $id_metode_pemeriksaan = $row6['id_metode_pemeriksaan'];
            }
        }
        $penyesuaian = $_POST['id_status3'];
        $pelatihan = $_POST['id_status4'];
        $id_metode_analisis = $_POST['id_metode_analisis'];
        $id_unit_analisis = $_POST['id_unit_analisis'];
        if($id_unit_analisis == "Lainnya"){
            $unit_analisis = ucwords($_POST['unit_analisis']);
            if(!empty($unit_analisis)){
                $hasil2 = $conn->query("SELECT max(id_unit_analisis) as id_unit_analisis FROM unit_analisis");
                $row2 = $hasil2->fetch_assoc();
                $id_unit_analisis = $row2['id_unit_analisis'] + 1;
                $stmt7=$conn->prepare('INSERT INTO unit_analisis(id_unit_analisis, unit_analisis)
                                        VALUES (?,?)');
                $stmt7->bind_param("is", $id_unit_analisis, $unit_analisis);
                $stmt7->execute();
                $stmt7->close();
            }
        } 
        $id_pendidikan = $_POST['id_pendidikan'];
        $tahun = $_POST['tahun'];
        $kode_kegiatan = "";
        $petugas_pengumpulan_data = $_POST['id_petugas_pengumpulan'];

        if($id_unit_analisis == "Lainnya" || $id_metode_pemeriksaan == "Lainnya" || ($id_cakupan_wilayah == 2 && $provinsi == null && $kabkot == null) || $id_unit_observasi == "Lainnya" || $id_unit_sampel == "Lainnya" ||
        $id_unit_pengumpulan == "Lainnya" || $id_sarana_pengumpulan == "Lainnya" || $id_urusan == "Lainnya"){
            if($id_unit_analisis == "Lainnya"){
                $pesan_gagal= "Data Unit Analisis Belum Ditambahkan!";
            }else if($id_metode_pemeriksaan == "Lainnya"){
                $pesan_gagal= "Data Metode Pemeriksaan Belum Ditambahkan!";
            }else if($id_cakupan_wilayah == 2){
                if($provinsi == null && $kabkot == null){
                    $pesan_gagal= "Data Provinsi dan Kabupaten / Kota Belum Ditambahkan!";
                }else if($provinsi == null){
                    $pesan_gagal= "Data Provinsi Belum Ditambahkan!";
                }else if($kabkot == null){
                    $pesan_gagal= "Data Kabupaten / Kota Belum Ditambahkan!";
                }
            }else if($id_unit_observasi == "Lainnya"){
                $pesan_gagal= "Data Unit Observasi Belum Ditambahkan!";
            }else if($id_unit_sampel == "Lainnya"){
                $pesan_gagal= "Data Unit Sampel Belum Ditambahkan!";
            }else if($id_unit_pengumpulan == "Lainnya"){
                $pesan_gagal= "Data Unit Pengumpulan Data Belum Ditambahkan!";
            }else if($id_sarana_pengumpulan == "Lainnya"){
                $pesan_gagal= "Data Sarana Pengumpulan Data Belum Ditambahkan!";
            }else if($id_urusan == "Lainnya"){
                $pesan_gagal= "Data Urusan Belum Ditambahkan!";
            }
        }else{
            $stmt8=$conn->prepare('INSERT INTO `kegiatan`(`id_status_pelatihan`, `id_status_penyesuaian`, `id_status_uji_coba`, `id_status_rekomen`, 
                                    `id_urusan`, `id_penyelenggara`, `id_cara_pengumpulan`, `id_sektor`, `id_perulangan`, `id_frekuensi`, 
                                    `id_tipe_pengumpulan`, `id_cakupan_wilayah`, `id_sarana_pengumpulan`, `id_unit_pengumpulan`, `id_jenis_rancangan`, 
                                    `id_kerangka_sampel`, `id_unit_sampel`, `id_unit_observasi`, `id_metode_pemeriksaan`, `id_petugas_pengumpulan`, 
                                    `id_pendidikan`, `id_metode_analisis`, `id_unit_analisis`, `tahun`, `judul_kegiatan`, `kode_kegiatan`, 
                                    `latar_belakang`, `tujuan`, `provinsi`, `kabkot`, `fraksi_sampel`, `perkiraan_sampling`) 
                                    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
            $stmt8->bind_param("iiiiiiiiiiiiiiiiiiiiiiisssssssii", $pelatihan, $penyesuaian, $uji_coba, $id_rekomendasi, $id_urusan, $id_penyelenggara,
                                $id_cara_pengumpulan, $id_sektor, $id_perulangan, $id_frekuensi, $id_tipe_pengumpulan, $id_cakupan_wilayah,
                                $id_sarana_pengumpulan, $id_unit_pengumpulan, $id_jenis_rancangan, $id_kerangka_sampel, $id_unit_sampel, $id_unit_observasi,
                                $id_metode_pemeriksaan, $petugas_pengumpulan_data, $id_pendidikan, $id_metode_analisis, $id_unit_analisis, $tahun, $judul_kegiatan,
                                $kode_kegiatan, $latar_belakang, $tujuan, $provinsi, $kabkot, $fraksi_sampel, $perkiraan_sampling);
            $stmt8->execute();

            if($conn->affected_rows > 0){
                $pesan_sukses= "Metadata Kegiatan Berhasil Disimpan!";
                $hasil8 = $conn->query("SELECT max(id_kegiatan) as id_kegiatan from kegiatan");
                $row8 = $hasil8->fetch_assoc();
                $id = $row8['id_kegiatan'];

                $id_detail_metode = $_POST['id_detail_metode'];
                $stmt9=$conn->prepare('INSERT INTO `metode_sampel_pilih`(`id_kegiatan`, `id_detail_metode`) 
                                VALUES (?,?)');
                $stmt9->bind_param("ii", $id, $id_detail_metode);
                $stmt9->execute();
                header("Location:kegiatan_tambah2.php?id_kegiatan=$id");
            }
            else{
                $pesan_gagal= "Metadata Kegiatan Gagal Disimpan!";
                echo mysqli_error($conn);
            }
            $stmt8->close();
        }
	} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Tambah Metadata Kegiatan</title>
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

    <script type="text/javascript">
        function text(that) {
            if (that.value == "1") {
                document.getElementById("frekuensii").disabled = true;
                document.getElementById("frekuensii").style.display = "none";
            } else {
                document.getElementById("frekuensii").disabled = false;
                document.getElementById("frekuensii").style.display = "block";
            }
            return;
        }

        function text2(that) {
            if (that.value == "1") {
                document.getElementById("prop").disabled = true;
                document.getElementById("prop").style.display = "none";
                document.getElementById("prop2").disabled = true;
                document.getElementById("prop2").style.display = "none";
            } else {
                document.getElementById("prop").disabled = false;
                document.getElementById("prop").style.display = "block";
                document.getElementById("prop2").disabled = false;
                document.getElementById("prop2").style.display = "block";
            }
            return;
        }

        function text3(that) {
            if (that.value != "Lainnya") {
                document.getElementById("prop3").disabled = true;
                document.getElementById("prop3").style.display = "none";
            } else {
                document.getElementById("prop3").disabled = false;
                document.getElementById("prop3").style.display = "block";
            }
            return;
        }

        function text4(that) {
            if (that.value != "Lainnya") {
                document.getElementById("prop4").disabled = true;
                document.getElementById("prop4").style.display = "none";
            } else {
                document.getElementById("prop4").disabled = false;
                document.getElementById("prop4").style.display = "block";
            }
            return;
        }

        function text5(that) {
            if (that.value != "Lainnya") {
                document.getElementById("prop5").disabled = true;
                document.getElementById("prop5").style.display = "none";
            } else {
                document.getElementById("prop5").disabled = false;
                document.getElementById("prop5").style.display = "block";
            }
            return;
        }

        function text6(that) {
            if (that.value != "Lainnya") {
                document.getElementById("prop6").disabled = true;
                document.getElementById("prop6").style.display = "none";
            } else {
                document.getElementById("prop6").disabled = false;
                document.getElementById("prop6").style.display = "block";
            }
            return;
        }

        function text7(that) {
            if (that.value != "Lainnya") {
                document.getElementById("prop7").disabled = true;
                document.getElementById("prop7").style.display = "none";
            } else {
                document.getElementById("prop7").disabled = false;
                document.getElementById("prop7").style.display = "block";
            }
            return;
        }

        function text8(that) {
            if (that.value != "Lainnya") {
                document.getElementById("prop8").disabled = true;
                document.getElementById("prop8").style.display = "none";
            } else {
                document.getElementById("prop8").disabled = false;
                document.getElementById("prop8").style.display = "block";
            }
            return;
        }

        function text9(that) {
            if (that.value != "Lainnya") {
                document.getElementById("prop9").disabled = true;
                document.getElementById("prop9").style.display = "none";
            } else {
                document.getElementById("prop9").disabled = false;
                document.getElementById("prop9").style.display = "block";
            }
            return;
        }

        function text10(that) {
            if (that.value != "Lainnya") {
                document.getElementById("prop10").disabled = true;
                document.getElementById("prop10").style.display = "none";
            } else {
                document.getElementById("prop10").disabled = false;
                document.getElementById("prop10").style.display = "block";
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
        <h1>Tambah Metadata Kegiatan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../konfigurasi/index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="kegiatan.php">Metadata Kegiatan</a></li>
                <li class="breadcrumb-item active">Tambah Metadata Kegiatan</li>
            </ol>
        </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                <?php
                    if(isset($pesan_sukses)){
                ?>
                    <div class="alert alert-success" role="alert">
                    <?php echo '<img src="../logo/check.png" width="27" class="me-2">'.$pesan_sukses; ?>
                    </div>
                <?php
                }
                else if(isset($pesan_gagal)){
                ?>
                    <div class="alert alert-danger" role="alert">
                    <?php echo '<img src="../logo/cross.png" width="18" class="me-2">'.$pesan_gagal; ?>
                    </div>
                <?php
                }
                ?>

                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Form Tambah Metadata Kegiatan</h5>

                    <!-- General Form Elements -->
                    <form class="row g-3 needs-validation" method="post" novalidate>
                        <div class="col-12">
                            <label for="yourName" class="form-label">Judul Kegiatan</label>
                            <input type="text" name="judul_kegiatan" class="form-control" id="judul_kegiatan" pattern="^[A-Za-z]+([\A-Za-z]+)*" autofocus required>
                            <div class="invalid-feedback">Masukkan Judul Kegiatan!</div>
                        </div>

                        <div class="col-12">
                            <label for="id_urusan" class="form-label">Urusan</label>
                            <select class="form-select" onchange="text10(this)" id="id_urusan" name="id_urusan" required>
                                <option selected disabled value="">Pilih Urusan</option>
                                <?php 
                                    $stmt25 = $conn->query("SELECT * FROM urusan");
                                    while($row = $stmt25->fetch_assoc()){
                                ?>
                                <option value="<?php echo $row['id_urusan']; ?>"><?php echo $row['urusan']; ?></option>
                                <?php } ?>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                            <div class="invalid-feedback">
                                Masukkan Urusan!
                            </div>
                        </div>

                        <div class="col-12" style="display:none;" id="prop10">
                            <label for="yourketerangan" class="form-label">Urusan</label>
                            <input type="text" name="urusan" class="form-control" id="urusan">
                        </div>

                        <div class="col-6">
                            <label for="yourketerangan" class="form-label">Kode Kegiatan</label>
                            <input type="text" name="kode_kegiatan" class="form-control" id="kode_kegiatan" disabled>
                        </div>

                        <div class="col-6">
                            <label for="yourketerangan" class="form-label">Tahun Kegiatan</label>
                            <input type="number" min="2000" name="tahun" class="form-control" id="tahun" required>
                            <div class="invalid-feedback">Masukkan Tahun Kegiatan!</div>
                        </div>

                        <div class="col-6">
                            <label for="id_cara_pengumpulan" class="form-label">Cara Pengumpulan Data</label>
                            <select class="form-select" id="id_cara_pengumpulan" name="id_cara_pengumpulan" required>
                                <option selected disabled value="">Pilih Cara Pengumpulan</option>
                                <?php 
                                    $stmt25 = $conn->query("SELECT * FROM cara_pengumpulan_data");
                                    while($row = $stmt25->fetch_assoc()){
                                ?>
                                <option value="<?php echo $row['id_cara_pengumpulan']; ?>"><?php echo $row['cara_pengumpulan']; ?></option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                                Masukkan Cara Pengumpulan!
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="id_sektor" class="form-label">Sektor Kegiatan</label>
                            <select class="form-select" id="id_sektor" name="id_sektor" required>
                                <option selected disabled value="">Pilih Sektor Kegiatan</option>
                                <?php 
                                    $stmt25 = $conn->query("SELECT * FROM sektor_kegiatan");
                                    while($row = $stmt25->fetch_assoc()){
                                ?>
                                <option value="<?php echo $row['id_sektor']; ?>"><?php echo $row['sektor']; ?></option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                                Masukkan Sektor Kegiatan!
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="id_status1" class="form-label">Rekomendasi BPS</label>
                            <select class="form-select" id="id_status1" name="id_status1" required>
                                <option selected disabled value="">Pilih Rekomendasi BPS</option>
                                <?php 
                                    $stmt25 = $conn->query("SELECT * FROM status");
                                    while($row = $stmt25->fetch_assoc()){
                                ?>
                                <option value="<?php echo $row['id_status']; ?>"><?php echo $row['status']; ?></option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                                Masukkan Rekomendasi BPS!
                            </div>
                        </div>
                        
                        <div class="col-6">
                            <label for="id_penyelenggara" class="form-label">Penyelenggaraan</label>
                            <select class="form-select" id="id_penyelenggara" name="id_penyelenggara" required>
                                <option selected disabled value="">Pilih Penyelenggara</option>
                                <?php 
                                    $stmt25 = $conn->query("SELECT * FROM penyelenggara");
                                    while($row = $stmt25->fetch_assoc()){
                                ?>
                                <option value="<?php echo $row['id_penyelenggara']; ?>"><?php echo $row['unit_kerja']; ?></option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                                Masukkan Penyelenggara!
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="yourName" class="form-label">Latar Belakang Kegiatan</label>
                            <textarea name="latar_belakang" class="form-control" id="latar_belakang" pattern="^[A-Za-z]+([\A-Za-z]+)*"required></textarea>
                            <div class="invalid-feedback">Masukkan Latar Belakang Kegiatan!</div>
                        </div>

                        <div class="col-12">
                            <label for="yourName" class="form-label">Tujuan Kegiatan</label>
                            <textarea name="tujuan" class="form-control" id="tujuan" pattern="^[A-Za-z]+([\A-Za-z]+)*"required></textarea>
                            <div class="invalid-feedback">Masukkan Tujuan Kegiatan!</div>
                        </div>

                        <div class="col-12">
                            <label for="id_perulangan" class="form-label">Perulangan</label>
                            <select class="form-select" onchange="text(this)" id="nilai" name="id_perulangan" required>
                                <option selected disabled value="">Pilih Perulangan</option>
                                <?php 
                                    $stmt25 = $conn->query("SELECT * FROM perulangan");
                                    while($row = $stmt25->fetch_assoc()){
                                ?>
                                <option value="<?php echo $row['id_perulangan']; ?>"><?php echo $row['perulangan']; ?></option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                                Masukkan Perulangan!
                            </div>
                        </div>

                        <div class="col-12" style="display:none;" id="frekuensii">
                            <label for="id_frekuensi" class="form-label">Frekuensi</label>
                            <select class="form-select" id="id_frekuensi" name="id_frekuensi">
                                <option selected disabled value="">Pilih Frekuensi</option>
                                <?php 
                                    $stmt25 = $conn->query("SELECT * FROM frekuensi order by id_frekuensi desc limit 8");
                                    while($row = $stmt25->fetch_assoc()){
                                ?>
                                <option value="<?php echo $row['id_frekuensi']; ?>"><?php echo $row['frekuensi']; ?></option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                                Masukkan Frekuensi!
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="id_tipe_pengumpulan" class="form-label">Tipe Pengumpulan Data</label>
                            <select class="form-select" id="id_tipe_pengumpulan" name="id_tipe_pengumpulan" required>
                                <option selected disabled value="">Pilih Tipe Pengumpulan Data</option>
                                <?php 
                                    $stmt25 = $conn->query("SELECT * FROM tipe_pengumpulan_data");
                                    while($row = $stmt25->fetch_assoc()){
                                ?>
                                <option value="<?php echo $row['id_tipe_pengumpulan']; ?>"><?php echo $row['tipe_pengumpulan']; ?></option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                                Masukkan Tipe Pengumpulan Data!
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="id_cakupan_wilayah" class="form-label">Cakupan Wilayah Pengumpulan Data</label>
                            <select class="form-select" onchange="text2(this)" id="id_cakupan_wilayah" name="id_cakupan_wilayah" required>
                                <option selected disabled value="">Pilih Cakupan Wilayah Pengumpulan Data</option>
                                <?php 
                                    $stmt25 = $conn->query("SELECT * FROM cakupan_wilayah");
                                    while($row = $stmt25->fetch_assoc()){
                                ?>
                                <option value="<?php echo $row['id_cakupan_wilayah']; ?>"><?php echo $row['cakupan_wilayah']; ?></option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                                Masukkan Cakupan Wilayah Pengumpulan Data!
                            </div>
                        </div>

                        <div class="col-6" style="display:none;" id="prop">
                            <label for="yourketerangan" class="form-label">Provinsi</label>
                            <input type="text" name="provinsi" class="form-control" id="provinsi">
                        </div>

                        <div class="col-6" style="display:none;" id="prop2">
                            <label for="yourketerangan" class="form-label">Kabupaten / Kota</label>
                            <input type="text" name="kabkot" class="form-control" id="kabkot">
                        </div>

                        <div class="col-12">
                            <label for="id_sarana_pengumpulan" class="form-label">Sarana Pengumpulan Data</label>
                            <select class="form-select" onchange="text4(this)" id="id_sarana_pengumpulan" name="id_sarana_pengumpulan" required>
                                <option selected disabled value="">Pilih Sarana Pengumpulan Data</option>
                                <?php 
                                    $stmt25 = $conn->query("SELECT * FROM sarana_pengumpulan_data");
                                    while($row = $stmt25->fetch_assoc()){
                                ?>
                                <option value="<?php echo $row['id_sarana_pengumpulan']; ?>"><?php echo $row['sarana_pengumpulan']; ?></option>
                                <?php } ?>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                            <div class="invalid-feedback">
                                Masukkan Sarana Pengumpulan Data!
                            </div>
                        </div>

                        <div class="col-12" style="display:none;" id="prop4">
                            <label for="yourketerangan" class="form-label">Sarana Pengumpulan Data</label>
                            <input type="text" name="sarana_pengumpulan" class="form-control" id="sarana_pengumpulan">
                        </div>

                        <div class="col-12">
                            <label for="id_unit_pengumpulan" class="form-label">Unit Pengumpulan Data</label>
                            <select class="form-select" onchange="text5(this)" id="id_unit_pengumpulan" name="id_unit_pengumpulan" required>
                                <option selected disabled value="">Pilih Unit Pengumpulan Data</option>
                                <?php 
                                    $stmt25 = $conn->query("SELECT * FROM unit_pengumpulan");
                                    while($row = $stmt25->fetch_assoc()){
                                ?>
                                <option value="<?php echo $row['id_unit_pengumpulan']; ?>"><?php echo $row['unit_pengumpulan']; ?></option>
                                <?php } ?>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                            <div class="invalid-feedback">
                                Masukkan Unit Pengumpulan Data!
                            </div>
                        </div>

                        <div class="col-12" style="display:none;" id="prop5">
                            <label for="yourketerangan" class="form-label">Unit Pengumpulan Data</label>
                            <input type="text" name="unit_pengumpulan" class="form-control" id="unit_pengumpulan">
                        </div>

                        <div class="col-12">
                            <label for="id_jenis_rancangan" class="form-label">Jenis Rancangan Sampel</label>
                            <select class="form-select" id="id_jenis_rancangan" name="id_jenis_rancangan" required>
                                <option selected disabled value="">Pilih Jenis Rancangan Sampel</option>
                                <?php 
                                    $stmt25 = $conn->query("SELECT * FROM jenis_rancangan_sampel");
                                    while($row = $stmt25->fetch_assoc()){
                                ?>
                                <option value="<?php echo $row['id_jenis_rancangan']; ?>"><?php echo $row['jenis_rancangan']; ?></option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                                Masukkan Jenis Rancangan Sampel!
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="id_detail_metode" class="form-label">Metode Pemilihan Sampel</label>
                            <select class="form-select" id="id_detail_metode" name="id_detail_metode" required>
                                <option selected disabled value="">Pilih Metode Pemilihan Sampel</option>
                                <?php 
                                    $stmt25 = $conn->query("SELECT * FROM detail_metode_sampel");
                                    while($row = $stmt25->fetch_assoc()){
                                ?>
                                <option value="<?php echo $row['id_detail_metode']; ?>"><?php echo $row['metode_sampel']; ?></option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                                Masukkan Metode Pemilihan Sampel!
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="id_kerangka_sampel" class="form-label">Jenis Kerangka Sampel</label>
                            <select class="form-select" id="id_kerangka_sampel" name="id_kerangka_sampel" required>
                                <option selected disabled value="">Pilih Jenis Kerangka Sampel</option>
                                <?php 
                                    $stmt25 = $conn->query("SELECT * FROM kerangka_sampel");
                                    while($row = $stmt25->fetch_assoc()){
                                ?>
                                <option value="<?php echo $row['id_kerangka_sampel']; ?>"><?php echo $row['kerangka_sampel']; ?></option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                                Masukkan Jenis Kerangka Sampel!
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="yourketerangan" class="form-label">Fraksi Sampel</label>
                            <input type="number" min="1" name="fraksi_sampel" class="form-control" id="fraksi_sampel" required>
                            <div class="invalid-feedback">Masukkan Fraksi Sampel!</div>
                        </div>

                        <div class="col-6">
                            <label for="yourketerangan" class="form-label">Perkiraan Sampling</label>
                            <input type="number" min="1" name="perkiraan_sampling" class="form-control" id="perkiraan_sampling">
                        </div>

                        <div class="col-12">
                            <label for="id_unit_sampel" class="form-label">Unit Sampel</label>
                            <select class="form-select" onchange="text6(this)" id="id_unit_sampel" name="id_unit_sampel" required>
                                <option selected disabled value="">Pilih Unit Sampel</option>
                                <?php 
                                    $stmt25 = $conn->query("SELECT * FROM unit_sampel");
                                    while($row = $stmt25->fetch_assoc()){
                                ?>
                                <option value="<?php echo $row['id_unit_sampel']; ?>"><?php echo $row['unit_sampel']; ?></option>
                                <?php } ?>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                            <div class="invalid-feedback">
                                Masukkan Unit Sampel!
                            </div>
                        </div>

                        <div class="col-12" style="display:none;" id="prop6">
                            <label for="yourketerangan" class="form-label">Unit Sampel</label>
                            <input type="text" name="unit_sampel" class="form-control" id="unit_sampel">
                        </div>

                        <div class="col-12">
                            <label for="id_unit_observasi" class="form-label">Unit Observasi</label>
                            <select class="form-select" onchange="text7(this)" id="id_unit_observasi" name="id_unit_observasi" required>
                                <option selected disabled value="">Pilih Unit Observasi</option>
                                <?php 
                                    $stmt25 = $conn->query("SELECT * FROM unit_observasi");
                                    while($row = $stmt25->fetch_assoc()){
                                ?>
                                <option value="<?php echo $row['id_unit_observasi']; ?>"><?php echo $row['unit_observasi']; ?></option>
                                <?php } ?>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                            <div class="invalid-feedback">
                                Masukkan Unit Observasi!
                            </div>
                        </div>

                        <div class="col-12" style="display:none;" id="prop7">
                            <label for="yourketerangan" class="form-label">Unit Observasi</label>
                            <input type="text" name="unit_observasi" class="form-control" id="unit_observasi">
                        </div>

                        <div class="col-6">
                            <label for="id_status2" class="form-label">Melakukan Uji Coba</label>
                            <select class="form-select" id="id_status2" name="id_status2" required>
                                <option selected disabled value="">Pilih Uji Coba</option>
                                <?php 
                                    $stmt25 = $conn->query("SELECT * FROM status");
                                    while($row = $stmt25->fetch_assoc()){
                                ?>
                                <option value="<?php echo $row['id_status']; ?>"><?php echo $row['status']; ?></option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                                Masukkan Pilihan Uji Coba!
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="id_metode_pemeriksaan" class="form-label">Metode Pemeriksaan</label>
                            <select class="form-select" id="id_metode_pemeriksaan" name="id_metode_pemeriksaan" required>
                                <option selected disabled value="">Pilih Metode Pemeriksaan</option>
                                <?php 
                                    $stmt25 = $conn->query("SELECT * FROM metode_pemeriksaan");
                                    while($row = $stmt25->fetch_assoc()){
                                ?>
                                <option value="<?php echo $row['id_metode_pemeriksaan']; ?>"><?php echo $row['metode_pemeriksaan']; ?></option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                                Masukkan Pilihan Metode Pemeriksaan!
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="id_status3" class="form-label">Melakukan Penyesuaian Non Responden</label>
                            <select class="form-select" id="id_status3" name="id_status3" required>
                                <option selected disabled value="">Pilih Penyesuaian Non Responden</option>
                                <?php 
                                    $stmt25 = $conn->query("SELECT * FROM status");
                                    while($row = $stmt25->fetch_assoc()){
                                ?>
                                <option value="<?php echo $row['id_status']; ?>"><?php echo $row['status']; ?></option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                                Masukkan Pilihan Penyesuaian Non Responden!
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="id_petugas_pengumpulan" class="form-label">Petugas Pengumpulan Data</label>
                            <select class="form-select" id="id_petugas_pengumpuan" name="id_petugas_pengumpulan" required>
                                <option selected disabled value="">Pilih Petugas Pengumpulan</option>
                                <?php 
                                    $stmt25 = $conn->query("SELECT * FROM petugas_pengumpulan_data");
                                    while($row = $stmt25->fetch_assoc()){
                                ?>
                                <option value="<?php echo $row['id_petugas_pengumpulan']; ?>"><?php echo $row['petugas_pengumpulan']; ?></option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                                Masukkan Petugas Pengumpulan Data!
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="id_pendidikan" class="form-label">Persyaratan Pendidikan</label>
                            <select class="form-select" id="id_pendidikan" name="id_pendidikan" required>
                                <option selected disabled value="">Pilih Persyaratan Pendidikan</option>
                                <?php 
                                    $stmt25 = $conn->query("SELECT * FROM persyaratan_pendidikan");
                                    while($row = $stmt25->fetch_assoc()){
                                ?>
                                <option value="<?php echo $row['id_pendidikan']; ?>"><?php echo $row['pendidikan']; ?></option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                                Masukkan Persyaratan Pendidikan!
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="id_status4" class="form-label">Melakukan Pelatihan Petugas</label>
                            <select class="form-select" id="id_status4" name="id_status4" required>
                                <option selected disabled value="">Pilih Pelatihan Petugas</option>
                                <?php 
                                    $stmt25 = $conn->query("SELECT * FROM status");
                                    while($row = $stmt25->fetch_assoc()){
                                ?>
                                <option value="<?php echo $row['id_status']; ?>"><?php echo $row['status']; ?></option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                                Masukkan Pilihan Pelatihan Petugas!
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="id_metode_analisisr" class="form-label">Metode Analisis</label>
                            <select class="form-select" id="id_metode_analisis" name="id_metode_analisis" required>
                                <option selected disabled value="">Pilih Metode Analisis</option>
                                <?php 
                                    $stmt25 = $conn->query("SELECT * FROM metode_analisis");
                                    while($row = $stmt25->fetch_assoc()){
                                ?>
                                <option value="<?php echo $row['id_metode_analisis']; ?>"><?php echo $row['metode_analisis']; ?></option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                                Masukkan Pilihan Metode Analisis!
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="id_unit_analisis" class="form-label">Unit Analisis</label>
                            <select class="form-select" onchange="text8(this)" id="id_unit_analisis" name="id_unit_analisis" required>
                                <option selected disabled value="">Pilih Unit Analisis</option>
                                <?php 
                                    $stmt25 = $conn->query("SELECT * FROM unit_analisis");
                                    while($row = $stmt25->fetch_assoc()){
                                ?>
                                <option value="<?php echo $row['id_unit_analisis']; ?>"><?php echo $row['unit_analisis']; ?></option>
                                <?php } ?>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                            <div class="invalid-feedback">
                                Masukkan Pilihan Unit Analisis!
                            </div>
                        </div>

                        <div class="col-12" style="display:none;" id="prop8">
                            <label for="yourketerangan" class="form-label">Unit Analisis</label>
                            <input type="text" name="unit_analisis" class="form-control" id="unit_analisis">
                        </div>

                        <div class="col-6">
                            <a class="btn btn-warning w-100" href="Kegiatan.php">Kembali</a>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-primary w-100" type="submit" name="simpan">Berikutnya</button>
                        </div>
                    </form><!-- End General Form Elements -->

                    </div>
                </div>

                </div>
            </div>
            </section>

    </main><!-- End #main -->

    <?php include "../konfigurasi/footer.php"?>

</body>

</html>