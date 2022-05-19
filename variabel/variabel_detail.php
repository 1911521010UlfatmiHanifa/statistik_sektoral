<?php
    include "../konfigurasi/session.php";
    error_reporting(0);
    $id_variabel = $_REQUEST['id_variabel'];
    if($_REQUEST['id_indikator'] != null){
      $id_indikator = $_REQUEST['id_indikator'];
    }
    
    if(isset($_POST['simpanUU']) && $_REQUEST['id_indikator'] == null){
        $nama_indikator = ucwords($_POST['nama_indikator']);
        $konsep = ucwords($_POST['konsep']);
		$definisi = ucwords($_POST['definisi']);
        $interpretasi = ucwords($_POST['interpretasi']);
        $metode_perhitungan =ucwords( $_POST['metode_perhitungan']);
        $level_estimasi = $_POST['level_estimasi'];
        $id_diakses_umum = $_POST['id_diakses_umum'];
        $id_indikator_komposit = $_POST['id_indikator_komposit'];
        $id_satuan = $_POST['id_satuan'];
        if($id_satuan == "Lainnya"){
            $satuan = ucwords($_POST['satuan']);
            if(!empty($satuan)){
                $stmt3=$conn->prepare('INSERT INTO satuan(satuan)
                                        VALUES (?)');
                $stmt3->bind_param("s", $satuan);
                $stmt3->execute();
                $stmt3->close();
        
                $hasil3 = $conn->query("SELECT max(id_satuan) as id_satuan FROM satuan");
                $row3 = $hasil3->fetch_assoc();
                $id_satuan = $row3['id_satuan'];
            }
        }
        $id_ukuran = $_POST['id_ukuran'];
        if($id_ukuran == "Lainnya"){
            $ukuran = ucwords($_POST['ukuran']);
            if(!empty($ukuran)){
                $stmt4=$conn->prepare('INSERT INTO ukuran(ukuran)
                                        VALUES (?)');
                $stmt4->bind_param("s", $ukuran);
                $stmt4->execute();
                $stmt4->close();
        
                $hasil4 = $conn->query("SELECT max(id_ukuran) as id_ukuran FROM ukuran");
                $row4 = $hasil4->fetch_assoc();
                $id_ukuran = $row4['id_ukuran'];
            }
        }
        $id_klasifikasi = $_POST['id_klasifikasi'];
        if($id_klasifikasi == "Lainnya"){
            $klasifikasi = ucwords($_POST['klasifikasi']);
            if(!empty($klasifikasi)){
                $stmt5=$conn->prepare('INSERT INTO klasifikasi(klasifikasi)
                                        VALUES (?)');
                $stmt5->bind_param("s", $klasifikasi);
                $stmt5->execute();
                $stmt5->close();
        
                $hasil5 = $conn->query("SELECT max(id_klasifikasi) as id_klasifikasi FROM klasifikasi");
                $row5 = $hasil5->fetch_assoc();
                $id_klasifikasi = $row5['id_klasifikasi'];
            }
        }
        $id_variabel_pembangunan = $_POST['id_variabel_pembangunan'];
        if($id_variabel_pembangunan == "Lainnya"){
            $kode_kegiatan = "";
            $kegiatan_penghasil = ucwords($_POST['kegiatan_penghasil']);
            $nama = ucwords($_POST['nama']);
            if(!empty($kegiatan_penghasil) || !empty($nama)){
                $stmt34=$conn->prepare('INSERT INTO variabel_pembangunan(kode_kegiatan, kegiatan_penghasil, nama)
                                        VALUES (?,?,?)');
                $stmt34->bind_param("sss", $kode_kegiatan, $kegiatan_penghasil, $nama);
                $stmt34->execute();
                $stmt34->close();
        
                $hasil34 = $conn->query("SELECT max(id_variabel_pembangunan) as id_variabel_pembangunan FROM variabel_pembangunan");
                $row34 = $hasil34->fetch_assoc();
                $id_variabel_pembangunan = $row34['id_variabel_pembangunan'];
            }
        }
        $id_publikasi = $_POST['id_publikasi'];
        if($id_publikasi == "Lainnya"){
            $nama_publikasi = ucwords($_POST['nama_publikasi']);
            $url = $_POST['url'];
            if(!empty($nama_publikasi) && !empty($url)){
                $stmt2=$conn->prepare('INSERT INTO publikasi_ketersediaan (nama_publikasi, url) VALUES (?,?)');
                $stmt2->bind_param("ss", $nama_publikasi, $url);
                $stmt2->execute();
                $stmt2->close();
        
                $hasil2 = $conn->query("SELECT max(id_publikasi) as id_publikasi FROM publikasi_ketersediaan");
                $row2 = $hasil2->fetch_assoc();
                $id_publikasi = $row2['id_publikasi'];
            }
        }

        if($id_indikator_komposit == "1"){
          $id_variabel_pembangunan = null;
        }else{
          $id_publikasi = null;
        }
  
        if($id_satuan == "Lainnya"){
            $pesan_gagal2 = "Metadata Satuan Belum Ditambahkan!";
        }else if($id_ukuran == "Lainnya"){
            $pesan_gagal2 = "Metadata Ukuran Belum Ditambahkan!";
        }else if($id_klasifikasi == "Lainnya"){
            $pesan_gagal2 = "Metadata Klasifikasi Belum Ditambahkan!";
        }else if($id_indikator_komposit == "1"){
            if($id_publikasi == "Lainnya" || $id_publikasi == null){
                $pesan_gagal2 = "Metadata Publikasi Ketersediaan dan URL Indikator Pembangunan Belum Ditambahkan!";
            }else{
                $stmt8=$conn->prepare('INSERT INTO `indikator`(`id_diakses_umum`, `id_indikator_komposit`, `id_variabel`, `id_satuan`, `id_ukuran`, `id_klasifikasi`, `id_publikasi`, 
                            `id_variabel_pembangunan`, `nama_indikator`, `konsep`, `definisi`, `interpretasi`, `metode_perhitungan`, `level_estimasi`) 
                            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
                $stmt8->bind_param("iiiiiiiissssss", $id_diakses_umum, $id_indikator_komposit, $id_variabel, $id_satuan, $id_ukuran, $id_klasifikasi, $id_publikasi, $id_variabel_pembangunan,
                                    $nama_indikator, $konsep, $definisi, $interpretasi, $metode_perhitungan, $level_estimasi);
                $stmt8->execute();
        
                if($conn->affected_rows > 0){
                    // header("Location: variabel_detail.php?id_variabel=$id_variabel");
                    $pesan_sukses2= "Metadata Indikator Berhasil Disimpan!";
                }
                else{
                    $pesan_gagal2= "Metadata Indikator Gagal Disimpan!";
                    $pesan_gagal2= mysqli_error($conn);
                }
                $stmt8->close();
            }
        }else if($id_indikator_komposit == "2"){
            if($id_variabel_pembangunan == "Lainnya" || $id_variabel_pembangunan == null){
                $pesan_gagal2 = "Metadata Kegiatan Penghasil dan Nama Kegiatan Variabel Pembangunan Belum Ditambahkan!";
            }else{
                $stmt8=$conn->prepare('INSERT INTO `indikator`(`id_diakses_umum`, `id_indikator_komposit`, `id_variabel`, `id_satuan`, `id_ukuran`, `id_klasifikasi`, `id_publikasi`, 
                            `id_variabel_pembangunan`, `nama_indikator`, `konsep`, `definisi`, `interpretasi`, `metode_perhitungan`, `level_estimasi`) 
                            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
                $stmt8->bind_param("iiiiiiiissssss", $id_diakses_umum, $id_indikator_komposit, $id_variabel, $id_satuan, $id_ukuran, $id_klasifikasi, $id_publikasi, $id_variabel_pembangunan,
                                    $nama_indikator, $konsep, $definisi, $interpretasi, $metode_perhitungan, $level_estimasi);
                $stmt8->execute();
        
                if($conn->affected_rows > 0){
                    // header("Location: variabel_detail.php?id_variabel=$id_variabel");
                    $pesan_sukses2= "Metadata Indikator Berhasil Disimpan!";
                }
                else{
                    $pesan_gagal2= "Metadata Indikator Gagal Disimpan!";
                    $pesan_gagal2= mysqli_error($conn);
                }
                $stmt8->close();
            }
        }else{
            $stmt8=$conn->prepare('INSERT INTO `indikator`(`id_diakses_umum`, `id_indikator_komposit`, `id_variabel`, `id_satuan`, `id_ukuran`, `id_klasifikasi`, `id_publikasi`, 
                                `id_variabel_pembangunan`, `nama_indikator`, `konsep`, `definisi`, `interpretasi`, `metode_perhitungan`, `level_estimasi`) 
                                VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
            $stmt8->bind_param("iiiiiiiissssss", $id_diakses_umum, $id_indikator_komposit, $id_variabel, $id_satuan, $id_ukuran, $id_klasifikasi, $id_publikasi, $id_variabel_pembangunan,
                                $nama_indikator, $konsep, $definisi, $interpretasi, $metode_perhitungan, $level_estimasi);
            $stmt8->execute();
    
            if($conn->affected_rows > 0){
                // header("Location: variabel_detail.php?id_variabel=$id_variabel");
                $pesan_sukses2= "Metadata Indikator Berhasil Disimpan!";
            }
            else{
                $pesan_gagal2= "Metadata Indikator Gagal Disimpan!";
                $pesan_gagal2= mysqli_error($conn);
            }
            $stmt8->close();
        }
    }else if(isset($_POST['simpan']) && $_REQUEST['id_indikator'] != null){
        $nama_indikator = ucwords($_POST['nama_indikator']);
        $konsep = ucwords($_POST['konsep']);
		$definisi = ucwords($_POST['definisi']);
        $interpretasi = ucwords($_POST['interpretasi']);
        $metode_perhitungan =ucwords( $_POST['metode_perhitungan']);
        $level_estimasi = $_POST['level_estimasi'];
        $id_diakses_umum = $_POST['id_diakses_umum'];
        $id_indikator_komposit = $_POST['id_indikator_komposit'];
        $id_satuan = $_POST['id_satuan'];
        if($id_satuan == "Lainnya"){
            $satuan = ucwords($_POST['satuan']);
            if(!empty($satuan)){
                $stmt3=$conn->prepare('INSERT INTO satuan(satuan)
                                        VALUES (?)');
                $stmt3->bind_param("s", $satuan);
                $stmt3->execute();
                $stmt3->close();
        
                $hasil3 = $conn->query("SELECT max(id_satuan) as id_satuan FROM satuan");
                $row3 = $hasil3->fetch_assoc();
                $id_satuan = $row3['id_satuan'];
            }
        }
        $id_ukuran = $_POST['id_ukuran'];
        if($id_ukuran == "Lainnya"){
            $ukuran = ucwords($_POST['ukuran']);
            if(!empty($ukuran)){
                $stmt4=$conn->prepare('INSERT INTO ukuran(ukuran)
                                        VALUES (?)');
                $stmt4->bind_param("s", $ukuran);
                $stmt4->execute();
                $stmt4->close();
        
                $hasil4 = $conn->query("SELECT max(id_ukuran) as id_ukuran FROM ukuran");
                $row4 = $hasil4->fetch_assoc();
                $id_ukuran = $row4['id_ukuran'];
            }
        }
        $id_klasifikasi = $_POST['id_klasifikasi'];
        if($id_klasifikasi == "Lainnya"){
            $klasifikasi = ucwords($_POST['klasifikasi']);
            if(!empty($klasifikasi)){
                $stmt5=$conn->prepare('INSERT INTO klasifikasi(klasifikasi)
                                        VALUES (?)');
                $stmt5->bind_param("s", $klasifikasi);
                $stmt5->execute();
                $stmt5->close();
        
                $hasil5 = $conn->query("SELECT max(id_klasifikasi) as id_klasifikasi FROM klasifikasi");
                $row5 = $hasil5->fetch_assoc();
                $id_klasifikasi = $row5['id_klasifikasi'];
            }
        }
        $id_variabel_pembangunan = $_POST['id_variabel_pembangunan'];
        if($id_variabel_pembangunan == "Lainnya"){
            $kode_kegiatan = "";
            $kegiatan_penghasil = ucwords($_POST['kegiatan_penghasil']);
            $nama = ucwords($_POST['nama']);
            if(!empty($kegiatan_penghasil) || !empty($nama)){
                $stmt34=$conn->prepare('INSERT INTO variabel_pembangunan(kode_kegiatan, kegiatan_penghasil, nama)
                                        VALUES (?,?,?)');
                $stmt34->bind_param("sss", $kode_kegiatan, $kegiatan_penghasil, $nama);
                $stmt34->execute();
                $stmt34->close();
        
                $hasil34 = $conn->query("SELECT max(id_variabel_pembangunan) as id_variabel_pembangunan FROM variabel_pembangunan");
                $row34 = $hasil34->fetch_assoc();
                $id_variabel_pembangunan = $row34['id_variabel_pembangunan'];
            }
        }
        $id_publikasi = $_POST['id_publikasi'];
        if($id_publikasi == "Lainnya"){
            $nama_publikasi = ucwords($_POST['nama_publikasi']);
            $url = $_POST['url'];
            if(!empty($nama_publikasi) && !empty($url)){
                $stmt2=$conn->prepare('INSERT INTO publikasi_ketersediaan (nama_publikasi, url) VALUES (?,?)');
                $stmt2->bind_param("ss", $nama_publikasi, $url);
                $stmt2->execute();
                $stmt2->close();
        
                $hasil2 = $conn->query("SELECT max(id_publikasi) as id_publikasi FROM publikasi_ketersediaan");
                $row2 = $hasil2->fetch_assoc();
                $id_publikasi = $row2['id_publikasi'];
            }
        }

        if($id_indikator_komposit == "1"){
          $id_variabel_pembangunan = null;
        }else{
          $id_publikasi = null;
        }
  
        if($id_satuan == "Lainnya"){
            $pesan_gagal2 = "Metadata Satuan Belum Ditambahkan!";
        }else if($id_ukuran == "Lainnya"){
            $pesan_gagal2 = "Metadata Ukuran Belum Ditambahkan!";
        }else if($id_klasifikasi == "Lainnya"){
            $pesan_gagal2 = "Metadata Klasifikasi Belum Ditambahkan!";
        }else if($id_indikator_komposit == "1"){
            if($id_publikasi == "Lainnya" || $id_publikasi == null){
                $pesan_gagal2 = "Metadata Publikasi Ketersediaan dan URL Indikator Pembangunan Belum Ditambahkan!";
            }else{
                $stmt8=$conn->prepare('UPDATE `indikator` SET `id_diakses_umum`=?,`id_indikator_komposit`=?,`id_variabel`=?,`id_satuan`=?,`id_ukuran`=?,
                                    `id_klasifikasi`=?,`id_publikasi`=?,`id_variabel_pembangunan`=?,`nama_indikator`=?,`konsep`=?,`definisi`=?,`interpretasi`=?,
                                    `metode_perhitungan`=?,`level_estimasi`=? WHERE id_indikator=?');
                $stmt8->bind_param("iiiiiiiissssssi", $id_diakses_umum, $id_indikator_komposit, $id_variabel, $id_satuan, $id_ukuran, $id_klasifikasi, $id_publikasi, $id_variabel_pembangunan,
                                    $nama_indikator, $konsep, $definisi, $interpretasi, $metode_perhitungan, $level_estimasi, $id_indikator);
                $stmt8->execute();

                if($conn->affected_rows > 0){
                    header("Location: variabel_detail.php?id_variabel=$id_variabel");
                    $pesan_sukses2= "Metadata Indikator Berhasil Disimpan!";          
                }
                else{
                    $pesan_gagal2= "Metadata Indikator Gagal Disimpan!";
                    $pesan_gagal2= mysqli_error($conn);
                }
                $stmt8->close();
            }
        }else if($id_indikator_komposit == "2"){
            if($id_variabel_pembangunan == "Lainnya" || $id_variabel_pembangunan == null){
                $pesan_gagal2 = "Metadata Kegiatan Penghasil dan Nama Kegiatan Variabel Pembangunan Belum Ditambahkan!";
            }else{
                $stmt8=$conn->prepare('UPDATE `indikator` SET `id_diakses_umum`=?,`id_indikator_komposit`=?,`id_variabel`=?,`id_satuan`=?,`id_ukuran`=?,
                                    `id_klasifikasi`=?,`id_publikasi`=?,`id_variabel_pembangunan`=?,`nama_indikator`=?,`konsep`=?,`definisi`=?,`interpretasi`=?,
                                    `metode_perhitungan`=?,`level_estimasi`=? WHERE id_indikator=?');
                $stmt8->bind_param("iiiiiiiissssssi", $id_diakses_umum, $id_indikator_komposit, $id_variabel, $id_satuan, $id_ukuran, $id_klasifikasi, $id_publikasi, $id_variabel_pembangunan,
                                    $nama_indikator, $konsep, $definisi, $interpretasi, $metode_perhitungan, $level_estimasi, $id_indikator);
                $stmt8->execute();

                if($conn->affected_rows > 0){
                    header("Location: variabel_detail.php?id_variabel=$id_variabel");
                    $pesan_sukses2= "Metadata Indikator Berhasil Disimpan!";          
                }
                else{
                    $pesan_gagal2= "Metadata Indikator Gagal Disimpan!";
                    $pesan_gagal2= mysqli_error($conn);
                }
                $stmt8->close();
            }
        }else{
            $stmt8=$conn->prepare('UPDATE `indikator` SET `id_diakses_umum`=?,`id_indikator_komposit`=?,`id_variabel`=?,`id_satuan`=?,`id_ukuran`=?,
                                    `id_klasifikasi`=?,`id_publikasi`=?,`id_variabel_pembangunan`=?,`nama_indikator`=?,`konsep`=?,`definisi`=?,`interpretasi`=?,
                                    `metode_perhitungan`=?,`level_estimasi`=? WHERE id_indikator=?');
            $stmt8->bind_param("iiiiiiiissssssi", $id_diakses_umum, $id_indikator_komposit, $id_variabel, $id_satuan, $id_ukuran, $id_klasifikasi, $id_publikasi, $id_variabel_pembangunan,
                                $nama_indikator, $konsep, $definisi, $interpretasi, $metode_perhitungan, $level_estimasi, $id_indikator);
            $stmt8->execute();

            if($conn->affected_rows > 0){
                header("Location: variabel_detail.php?id_variabel=$id_variabel");
                $pesan_sukses2= "Metadata Indikator Berhasil Disimpan!";          
            }
            else{
                $pesan_gagal2= "Metadata Indikator Gagal Disimpan!";
                $pesan_gagal2= mysqli_error($conn);
            }
            $stmt8->close();
        }
    }

    if(isset($_POST['delete'])){
      if(isset($_POST['aksi']) && $_POST['aksi'] == 'hapus'){
          $id_indikator = $_POST['id_indikator'];

          $stmt99=$conn->prepare("DELETE FROM indikator WHERE id_indikator= ?");
          $stmt99->bind_param('i', $id_indikator);
          $stmt99->execute();
      
          if($conn->affected_rows > 0){
              $pesan_sukses7= "Metadata Indikator Berhasil Dihapus!";
          }
          else{
                $string = mysqli_error($conn);
                if (str_contains($string, 'Cannot delete or update a parent row')) {
                    $pesan_gagal7= "Metadata Indikator Telah Digunakan Pada Tabel Lainnya";
                } else {
                    $pesan_gagal7= "Metadata Indikator Gagal Dihapus";
                }
    }
          $stmt99->close();
      }
    }

      $stmt00 = $conn->prepare("SELECT nama_indikator, indikator.konsep as konsep, indikator.definisi as definisi, interpretasi, metode_perhitungan, level_estimasi, a.id_status as 
                              id_diakses_umum, b.id_status as id_indikator_komposit, satuan.id_satuan as id_satuan, ukuran.id_ukuran as id_ukuran, 
                              publikasi_ketersediaan.id_publikasi as id_publikasi, klasifikasi.id_klasifikasi as id_klasifikasi, 
                              variabel_pembangunan.id_variabel_pembangunan as id_variabel_pembangunan,
                              variabel.id_variabel as id_variabel FROM `indikator` join status as a on a.id_status=
                              indikator.id_diakses_umum join status as b on b.id_status=indikator.id_indikator_komposit join satuan on
                              satuan.id_satuan=indikator.id_satuan join ukuran on ukuran.id_ukuran=indikator.id_ukuran join 
                              klasifikasi on klasifikasi.id_klasifikasi=indikator.id_klasifikasi left join publikasi_ketersediaan on 
                              publikasi_ketersediaan.id_publikasi=indikator.id_publikasi left join variabel_pembangunan on 
                              variabel_pembangunan.id_variabel_pembangunan=indikator.id_variabel_pembangunan join variabel on variabel.id_variabel=indikator.id_variabel
                              WHERE id_indikator = ?");
      $stmt00->bind_param("i", $id_indikator);
      $stmt00->execute();
      $result00 = $stmt00->get_result();

      while($data00 = $result00->fetch_assoc()){
        $nama_indikator1 = $data00['nama_indikator'];
        $konsep1 = $data00['konsep'];
        $definisi1 = $data00['definisi'];
        $interpretasi1 = $data00['interpretasi'];
        $metode_perhitungan1 = $data00['metode_perhitungan'];
        $level_estimasi1 = $data00['level_estimasi'];
        $id_diakses_umum1 = $data00['id_diakses_umum'];
        $id_indikator_komposit1 = $data00['id_indikator_komposit'];
        $id_satuan1 = $data00['id_satuan'];
        $id_ukuran1 = $data00['id_ukuran'];
        $id_klasifikasi1 = $data00['id_klasifikasi'];
        $id_publikasi1 = $data00['id_publikasi'];
        $id_variabel_pembangunan1 = $data00['id_variabel_pembangunan'];
      }

    $stmt = $conn->prepare("SELECT * FROM variabel join status on status.id_status=variabel.id_confidentional WHERE id_variabel = ?");
    $stmt->bind_param("i", $id_variabel);
    $stmt->execute();
    $result = $stmt->get_result();

    while($data = $result->fetch_assoc()){
        $nama_variabel = $data['nama_variabel'];
        $alias = $data['alias'];
        $konsep = $data['konsep'];
        $definisi = $data['definisi'];
        $referensi_pemilihan = $data['referensi_pemilihan'];
        $referensi_waktu = $data['referensi_waktu'];
        $tipe_data = $data['tipe_data'];
        $domain_value = $data['domain_value'];
        $aturan_validasi = $data['aturan_validasi'];
        $kalimat_pertanyaan = $data['kalimat_pertanyaan'];
        $confidentional = $data['status'];
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Detail Metadata Variabel</title>
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
        if (that.value != "Lainnya") {
            document.getElementById("prop").disabled = true;
            document.getElementById("prop").style.display = "none";
        } else {
            document.getElementById("prop").disabled = false;
            document.getElementById("prop").style.display = "block";
        }
        return;
        }

        function text2(that) {
        if (that.value != "Lainnya") {
            document.getElementById("prop2").disabled = true;
            document.getElementById("prop2").style.display = "none";
        } else {
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
        if (that.value == "1") {
            document.getElementById("prop5").disabled = true;
            document.getElementById("prop5").style.display = "none";
            document.getElementById("prop4").disabled = false;
            document.getElementById("prop4").style.display = "block";
            document.getElementById("prop8").disabled = true;
            document.getElementById("prop8").style.display = "none";
            document.getElementById("prop9").disabled = true;
            document.getElementById("prop9").style.display = "none";
        } else {
            document.getElementById("prop4").disabled = true;
            document.getElementById("prop4").style.display = "none";
            document.getElementById("prop5").disabled = false;
            document.getElementById("prop5").style.display = "block";
            document.getElementById("prop6").disabled = true;
            document.getElementById("prop6").style.display = "none";
            document.getElementById("prop7").disabled = true;
            document.getElementById("prop7").style.display = "none";
        }
        return;
        }

        function text5(that) {
        if (that.value == "Lainnya") {
            document.getElementById("prop6").disabled = false;
            document.getElementById("prop6").style.display = "block";
            document.getElementById("prop7").disabled = false;
            document.getElementById("prop7").style.display = "block";
            
        } else {
            document.getElementById("prop6").disabled = true;
            document.getElementById("prop6").style.display = "none";
            document.getElementById("prop7").disabled = true;
            document.getElementById("prop7").style.display = "none";
        }
        return;
        }

        function text6(that) {
        if (that.value != "Lainnya") {
            document.getElementById("prop8").disabled = true;
            document.getElementById("prop8").style.display = "none";
            document.getElementById("prop9").disabled = true;
            document.getElementById("prop9").style.display = "none";
        } else {
            document.getElementById("prop8").disabled = false;
            document.getElementById("prop8").style.display = "block";
            document.getElementById("prop9").disabled = false;
            document.getElementById("prop9").style.display = "block";
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
        <h1>Detail Metadata variabel</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../konfigurasi/index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="variabel.php">Metadata Variabel</a></li>
                <li class="breadcrumb-item active">Detail Metadata Variabel</li>
            </ol>
        </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Detail Metadata Variabel</h5>

                    <div class="tab-pane fade show active profile-overview" id="profile-overview">
                        <div class="row">
                            <div class="col-lg-6 col-md-3 label">Nama Variabel</div>
                            <div class="col-lg-6 col-md-9"><?php echo $nama_variabel?></div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-3 label">Konsep</div>
                            <div class="col-lg-6 col-md-9"><?php echo $konsep?></div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-3 label">Alias</div>
                            <div class="col-lg-6 col-md-9"><?php echo $alias?></div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-3 label">Definisi</div>
                            <div class="col-lg-6 col-md-9"><?php echo $definisi?></div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-6 col-md-3 label">Referensi Pemilihan</div>
                            <div class="col-lg-6 col-md-9"><?php echo $referensi_pemilihan?></div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-3 label">Referensi Waktu</div>
                            <div class="col-lg-6 col-md-9"><?php echo $referensi_waktu?></div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-3 label">Tipe Metadata</div>
                            <div class="col-lg-6 col-md-9"><?php echo $tipe_data?></div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-3 label">Domain Value</div>
                            <div class="col-lg-6 col-md-9"><?php echo $domain_value?></div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-3 label">Aturan Validasi</div>
                            <div class="col-lg-6 col-md-9"><?php echo $aturan_validasi?></div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-3 label">Kalimat Pertanyaan</div>
                            <div class="col-lg-6 col-md-9"><?php echo $kalimat_pertanyaan?></div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-3 label">Confidentional Status</div>
                            <div class="col-lg-6 col-md-9"><?php echo $confidentional?></div>
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
                    <h5 class="card-title">Kelola Metadata Indikator</h5>

                    <div class="tab-pane fade show active profile-overview" id="profile-overview">
                        <div class="row">
                            <div class="col-12">
                                <?php
                                    if(isset($pesan_sukses2)){
                                ?>
                                    <div class="alert alert-success" role="alert">
                                    <?php echo '<img src="../logo/check.png" width="27" class="me-2">'.$pesan_sukses2; ?>
                                    </div>
                                <?php
                                }
                                else if(isset($pesan_gagal2)){
                                ?>
                                    <div class="alert alert-danger" role="alert">
                                    <?php echo '<img src="../logo/cross.png" width="18" class="me-2">'.$pesan_gagal2; ?>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>

                            <div class="col-12">

                            <?php if($id_indikator  == null){ ?>
                                <!-- General Form Elements -->
                                <form class="row g-3 needs-validation" method="post" novalidate>
                                <div class="col-6">
                                    <label for="yourName" class="form-label">Nama Indikator</label>
                                    <input type="text" name="nama_indikator" class="form-control" id="nama_indikator" pattern="^[A-Za-z]+([\A-Za-z]+)*" autofocus required>
                                    <div class="invalid-feedback">Masukkan Nama Indikator!</div>
                                </div>

                                <div class="col-6">
                                    <label for="yourketerangan" class="form-label">Konsep</label>
                                    <input type="text" name="konsep" class="form-control" id="konsep" required>
                                    <div class="invalid-feedback">Masukkan Konsep!</div>
                                </div>

                                <div class="col-12">
                                    <label for="yourketerangan" class="form-label">Definisi</label>
                                    <textarea type="text" name="definisi" class="form-control" id="definisi" required></textarea>
                                    <div class="invalid-feedback">Masukkan Definisi!</div>
                                </div>

                                <div class="col-12">
                                    <label for="yourketerangan" class="form-label">Interpretasi</label>
                                    <textarea type="text" name="interpretasi" class="form-control" id="interpretasi" pattern="^[A-Za-z]+([\A-Za-z]+)*"required></textarea>
                                    <div class="invalid-feedback">Masukkan Interpretasi!</div>
                                </div>

                                <div class="col-6">
                                    <label for="yourketerangan" class="form-label">Metode Perhitungan</label>
                                    <input type="text" name="metode_perhitungan" class="form-control" id="metode_perhitungan" required>
                                    <div class="invalid-feedback">Masukkan Metode Perhitungan!</div>
                                </div>

                                <div class="col-6">
                                    <label for="id_ukuran" class="form-label">Ukuran</label>
                                    <select class="form-select" onchange="text(this)" id="id_ukuran" name="id_ukuran" required>
                                        <option selected disabled value="">Pilih Ukuran</option>
                                        <?php 
                                            $stmt25 = $conn->query("SELECT * FROM ukuran");
                                            while($row = $stmt25->fetch_assoc()){
                                        ?>
                                        <option value="<?php echo $row['id_ukuran']; ?>">
                                            <?php echo $row['ukuran']; ?>
                                        </option>
                                        <?php } ?>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Masukkan Pilihan Ukuran!
                                    </div>
                                </div>

                                <div class="col-12" style="display:none;" id="prop">
                                    <label for="yourketerangan" class="form-label">Ukuran</label>
                                    <input type="text" name="ukuran" class="form-control" id="ukuran">
                                </div>

                                <div class="col-6">
                                    <label for="lavel_estimasi" class="form-label">Level Estimasi</label>
                                    <input type="text" name="level_estimasi" class="form-control" id="level_estimasi" required>
                                    <div class="invalid-feedback">
                                        Masukkan Pilihan Level Estimas!
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label for="id_satuan" class="form-label">Satuan</label>
                                    <select class="form-select" onchange="text2(this)" id="id_satuan" name="id_satuan" required>
                                        <option selected disabled value="">Pilih Satuan</option>
                                        <?php 
                                            $stmt25 = $conn->query("SELECT * FROM satuan");
                                            while($row = $stmt25->fetch_assoc()){
                                        ?>
                                        <option value="<?php echo $row['id_satuan']; ?>">
                                            <?php echo $row['satuan']; ?>
                                        </option>
                                        <?php } ?>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Masukkan Pilihan Satuan!
                                    </div>
                                </div>

                                <div class="col-12" style="display:none;" id="prop2">
                                    <label for="yourketerangan" class="form-label">Satuan</label>
                                    <input type="text" name="satuan" class="form-control" id="satuan">
                                </div>

                                <div class="col-12">
                                    <label for="id_klasifikasi" class="form-label">Klasifikasi</label>
                                    <select class="form-select" onchange="text3(this)" id="id_klasifikasi" name="id_klasifikasi" required>
                                        <option selected disabled value="">Pilih Klasifikasi</option>
                                        <?php 
                                            $stmt25 = $conn->query("SELECT * FROM klasifikasi");
                                            while($row = $stmt25->fetch_assoc()){
                                        ?>
                                        <option value="<?php echo $row['id_klasifikasi']; ?>">
                                            <?php echo $row['klasifikasi']; ?>
                                        </option>
                                        <?php } ?>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Masukkan Pilihan Klasifikasi!
                                    </div>
                                </div>

                                <div class="col-12" style="display:none;" id="prop3">
                                    <label for="yourketerangan" class="form-label">Klasifikasi</label>
                                    <input type="text" name="klasifikasi" class="form-control" id="klasifikasi">
                                </div>

                                <div class="col-12">
                                    <label for="id_indikator_komposit" class="form-label">Indikator Komposit</label>
                                    <select class="form-select" onchange="text4(this)" id="id_indikator_komposit" name="id_indikator_komposit" required>
                                        <option selected disabled value="">Pilih Indikator Komposit</option>
                                        <?php 
                                            $stmt25 = $conn->query("SELECT * FROM status");
                                            while($row = $stmt25->fetch_assoc()){
                                        ?>
                                        <option value="<?php echo $row['id_status']; ?>">
                                            <?php echo $row['status']; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Masukkan Pilihan Indikator Komposit!
                                    </div>
                                </div>

                                <div class="col-12" style="display:none;" id="prop4">
                                    <label for="id_publikasi" class="form-label">Indikator Pembangunan</label>
                                    <select class="form-select" onchange="text5(this)" id="id_publikasi" name="id_publikasi">
                                        <option selected disabled value="">Pilih Indikator Pembangunan</option>
                                        <?php 
                                            $stmt25 = $conn->query("SELECT * FROM publikasi_ketersediaan");
                                            while($row = $stmt25->fetch_assoc()){
                                        ?>
                                        <option value="<?php echo $row['id_publikasi']; ?>">
                                            <?php echo $row['nama_publikasi']; ?>
                                        </option>
                                        <?php } ?>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Masukkan Pilihan Indikator Pembangunan!
                                    </div>
                                </div>

                                <div class="col-12" style="display:none;" id="prop6">
                                    <label for="yourketerangan" class="form-label">Publikasi Ketersediaan (URL)</label>
                                    <input type="text" name="url" class="form-control" id="url">
                                </div>
                                
                                <div class="col-12" style="display:none;" id="prop7">
                                    <label for="yourketerangan" class="form-label">Nama Publikasi Ketersediaan</label>
                                    <input type="text" name="nama_publikasi" class="form-control" id="nama_publikasi">
                                </div>

                                <div class="col-12" style="display:none;" id="prop5">
                                    <label for="id_variabel_pembangunan" class="form-label">Variabel Pembangunan</label>
                                    <select class="form-select" onchange="text6(this)" id="id_variabel_pembangunan" name="id_variabel_pembangunan">
                                        <option selected disabled value="">Pilih Variabel  Pembangunan</option>
                                        <?php 
                                            $stmt25 = $conn->query("SELECT * FROM variabel_pembangunan");
                                            while($row = $stmt25->fetch_assoc()){
                                        ?>
                                        <option value="<?php echo $row['id_variabel_pembangunan']; ?>">
                                            <?php echo $row['kegiatan_penghasil'] ?> | <?php echo $row['nama'] ?>
                                        </option>
                                        <?php } ?>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Masukkan Pilihan Variabel  Pembangunan!
                                    </div>
                                </div>

                                <div class="col-12" style="display:none;" id="prop8">
                                    <label for="yourketerangan" class="form-label">Kegiatan Penghasil</label>
                                    <input type="text" name="kegiatan_penghasil" class="form-control" id="kegiatan_penghasil">
                                </div>
                                
                                <div class="col-12" style="display:none;" id="prop9">
                                    <label for="yourketerangan" class="form-label">Nama Variabel Pembangunan</label>
                                    <input type="text" name="nama" class="form-control" id="nama">
                                </div>

                                <div class="col-12">
                                    <label for="id_diakses_umum" class="form-label">Akses Umum</label>
                                    <select class="form-select" id="id_diakses_umum" name="id_diakses_umum" required>
                                        <option selected disabled value="">Pilih Level Akses Umum</option>
                                        <?php 
                                            $stmt25 = $conn->query("SELECT * FROM status");
                                            while($row = $stmt25->fetch_assoc()){
                                        ?>
                                        <option value="<?php echo $row['id_status']; ?>">
                                            <?php echo $row['status']; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Masukkan Pilihan Level Akses Umum!
                                    </div>
                                </div>

                                <div class="col-6">
                                    <a class="btn btn-warning w-100" href="variabel.php">Kembali</a>
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-primary w-100" type="submit" name="simpanUU">Simpan</button>
                                </div>
                            </form><!-- End General Form Elements -->
                            <?php }else { ?>
                                <!-- General Form Elements -->
                                <form class="row g-3 needs-validation" method="post" novalidate>
                                <div class="col-6">
                                    <label for="yourName" class="form-label">Nama Indikator</label>
                                    <input type="text" value="<?php echo $nama_indikator1?>" name="nama_indikator" class="form-control" id="nama_indikator" pattern="^[A-Za-z]+([\A-Za-z]+)*" autofocus required>
                                    <div class="invalid-feedback">Masukkan Nama Indikator!</div>
                                </div>

                                <div class="col-6">
                                    <label for="yourketerangan" class="form-label">Konsep</label>
                                    <input type="text" name="konsep" value="<?php echo $konsep1?>" class="form-control" id="konsep" required>
                                    <div class="invalid-feedback">Masukkan Konsep!</div>
                                </div>

                                <div class="col-12">
                                    <label for="yourketerangan" class="form-label">Definisi</label>
                                    <textarea type="text" name="definisi" class="form-control" id="definisi"><?php echo $definisi1?></textarea>
                                    <div class="invalid-feedback">Masukkan Definisi!</div>
                                </div>

                                <div class="col-12">
                                    <label for="yourketerangan" class="form-label">Interpretasi</label>
                                    <textarea type="text" name="interpretasi" class="form-control" id="interpretasi" pattern="^[A-Za-z]+([\A-Za-z]+)*"required><?php echo $interpretasi1?></textarea>
                                    <div class="invalid-feedback">Masukkan Interpretasi!</div>
                                </div>

                                <div class="col-6">
                                    <label for="yourketerangan" class="form-label">Metode Perhitungan</label>
                                    <input type="text" name="metode_perhitungan" value="<?php echo $metode_perhitungan1?>" class="form-control" id="metode_perhitungan" required>
                                    <div class="invalid-feedback">Masukkan Metode Perhitungan!</div>
                                </div>

                                <div class="col-6">
                                    <label for="id_ukuran" class="form-label">Ukuran</label>
                                    <select class="form-select" onchange="text(this)" id="id_ukuran" name="id_ukuran" required>
                                        <option selected disabled value="">Pilih Ukuran</option>
                                        <?php 
                                            $stmt25 = $conn->query("SELECT * FROM ukuran");
                                            while($row = $stmt25->fetch_assoc()){
                                        ?>
                                        <option value="<?php echo $row['id_ukuran']; ?>"
                                            <?php if($id_ukuran1 == $row['id_ukuran']) {
                                                echo 'selected';
                                            }?>>
                                            <?php echo $row['ukuran']; ?>
                                        </option>
                                        <?php } ?>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Masukkan Pilihan Ukuran!
                                    </div>
                                </div>

                                <div class="col-12" style="display:none;" id="prop">
                                    <label for="yourketerangan" class="form-label">Ukuran</label>
                                    <input type="text" name="ukuran" class="form-control" id="ukuran">
                                </div>

                                <div class="col-6">
                                    <label for="lavel_estimasi" class="form-label">Level Estimasi</label>
                                    <input type="text" value="<?php echo $level_estimasi1?>" name="level_estimasi" class="form-control" id="level_estimasi" required>
                                    <div class="invalid-feedback">
                                        Masukkan Pilihan Level Estimasi!
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label for="id_satuan" class="form-label">Satuan</label>
                                    <select class="form-select" onchange="text2(this)" id="id_satuan" name="id_satuan" required>
                                        <option selected disabled value="">Pilih Satuan</option>
                                        <?php 
                                            $stmt25 = $conn->query("SELECT * FROM satuan");
                                            while($row = $stmt25->fetch_assoc()){
                                        ?>
                                        <option value="<?php echo $row['id_satuan']; ?>"
                                            <?php if($id_satuan1 == $row['id_satuan']) {
                                                    echo 'selected';
                                                }?>>
                                            <?php echo $row['satuan']; ?>
                                        </option>
                                        <?php } ?>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Masukkan Pilihan Satuan!
                                    </div>
                                </div>

                                <div class="col-12" style="display:none;" id="prop2">
                                    <label for="yourketerangan" class="form-label">Satuan</label>
                                    <input type="text" name="satuan" class="form-control" id="satuan">
                                </div>

                                <div class="col-12">
                                    <label for="id_klasifikasi" class="form-label">Klasifikasi</label>
                                    <select class="form-select" onchange="text3(this)" id="id_klasifikasi" name="id_klasifikasi" required>
                                        <option selected disabled value="">Pilih Klasifikasi</option>
                                        <?php 
                                            $stmt25 = $conn->query("SELECT * FROM klasifikasi");
                                            while($row = $stmt25->fetch_assoc()){
                                        ?>
                                        <option value="<?php echo $row['id_klasifikasi']; ?>"
                                            <?php if($id_klasifikasi1 == $row['id_klasifikasi']) {
                                                    echo 'selected';
                                                }?>>
                                            <?php echo $row['klasifikasi']; ?>
                                        </option>
                                        <?php } ?>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Masukkan Pilihan Klasifikasi!
                                    </div>
                                </div>

                                <div class="col-12" style="display:none;" id="prop3">
                                    <label for="yourketerangan" class="form-label">Klasifikasi</label>
                                    <input type="text" name="klasifikasi" class="form-control" id="klasifikasi">
                                </div>

                                <div class="col-12">
                                    <label for="id_indikator_komposit" class="form-label">Indikator Komposit</label>
                                    <select class="form-select" onchange="text4(this)" id="id_indikator_komposit" name="id_indikator_komposit" required>
                                        <option selected disabled value="">Pilih Indikator Komposit</option>
                                        <?php 
                                            $stmt25 = $conn->query("SELECT * FROM status");
                                            while($row = $stmt25->fetch_assoc()){
                                        ?>
                                        <option value="<?php echo $row['id_status']; ?>"
                                            <?php if($id_indikator_komposit1 == $row['id_status']) {
                                                    echo 'selected';
                                                }?>>
                                            <?php echo $row['status']; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Masukkan Pilihan Indikator Komposit!
                                    </div>
                                </div>

                                <div class="col-12" style="display:none;" id="prop4">
                                    <label for="id_publikasi" class="form-label">Indikator Pembangunan</label>
                                    <select class="form-select" onchange="text5(this)" id="id_publikasi" name="id_publikasi">
                                        <option selected disabled value="">Pilih Indikator Pembangunan</option>
                                        <?php 
                                            $stmt25 = $conn->query("SELECT * FROM publikasi_ketersediaan");
                                            while($row = $stmt25->fetch_assoc()){
                                        ?>
                                        <option value="<?php echo $row['id_publikasi']; ?>"
                                            <?php if($id_publikasi1 == $row['id_publikasi']) {
                                                    echo 'selected';
                                                }?>>
                                            <?php echo $row['nama_publikasi']; ?>
                                        </option>
                                        <?php } ?>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Masukkan Pilihan Indikator Pembangunan!
                                    </div>
                                </div>

                                <div class="col-12" style="display:none;" id="prop6">
                                    <label for="yourketerangan" class="form-label">Publikasi Ketersediaan (URL)</label>
                                    <input type="text" name="url" class="form-control" id="url">
                                </div>
                                
                                <div class="col-12" style="display:none;" id="prop7">
                                    <label for="yourketerangan" class="form-label">Nama Publikasi Ketersediaan</label>
                                    <input type="text" name="nama_publikasi" class="form-control" id="nama_publikasi">
                                </div>

                                <div class="col-12" style="display:none;" id="prop5">
                                    <label for="id_variabel_pembangunan" class="form-label">Variabel Pembangunan</label>
                                    <select class="form-select" onchange="text6(this)" id="id_variabel_pembangunan" name="id_variabel_pembangunan">
                                        <option selected disabled value="">Pilih Variabel  Pembangunan</option>
                                        <?php 
                                            $stmt25 = $conn->query("SELECT * FROM variabel_pembangunan");
                                            while($row = $stmt25->fetch_assoc()){
                                        ?>
                                        <option value="<?php echo $row['id_variabel_pembangunan']; ?>"
                                            <?php if($id_variabel_pembangunan1 == $row['id_variabel_pembangunan']) {
                                                    echo 'selected';
                                                }?>>
                                            <?php echo $row['kegiatan_penghasil'] ?> | <?php echo $row['nama'] ?>
                                        </option>
                                        <?php } ?>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Masukkan Pilihan Variabel  Pembangunan!
                                    </div>
                                </div>

                                <div class="col-12" style="display:none;" id="prop8">
                                    <label for="yourketerangan" class="form-label">Kegiatan Penghasil</label>
                                    <input type="text" name="kegiatan_penghasil" class="form-control" id="kegiatan_penghasil">
                                </div>
                                
                                <div class="col-12" style="display:none;" id="prop9">
                                    <label for="yourketerangan" class="form-label">Nama Variabel Pembangunan</label>
                                    <input type="text" name="nama" class="form-control" id="nama">
                                </div>

                                <div class="col-12">
                                    <label for="id_diakses_umum" class="form-label">Akses Umum</label>
                                    <select class="form-select" id="id_diakses_umum" name="id_diakses_umum" required>
                                        <option selected disabled value="">Pilih Level Akses Umum</option>
                                        <?php 
                                            $stmt25 = $conn->query("SELECT * FROM status");
                                            while($row = $stmt25->fetch_assoc()){
                                        ?>
                                        <option value="<?php echo $row['id_status']; ?>"
                                            <?php if($id_diakses_umum1 == $row['id_status']) {
                                                    echo 'selected';
                                                }?>>
                                            <?php echo $row['status']; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Masukkan Pilihan Level Akses Umum!
                                    </div>
                                </div>

                                <div class="col-6">
                                    <a class="btn btn-warning w-100" href="variabel.php">Back</a>
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-primary w-100" type="submit" name="simpan">Simpan</button>
                                </div>
                            </form><!-- End General Form Elements -->
                            <?php } ?>
                            </div>
                        </div><br>

                        <div class="row">
                        <div class="col-12">
                            <br>
                            <?php
                                if(isset($pesan_sukses7)){
                            ?>
                                <div class="alert alert-success" role="alert">
                                <?php echo '<img src="../logo/check.png" width="27" class="me-2">'.$pesan_sukses7; ?>
                                </div>
                            <?php
                            }
                            else if(isset($pesan_gagal7)){
                            ?>
                                <div class="alert alert-danger" role="alert">
                                <?php echo '<img src="../logo/cross.png" width="18" class="me-2">'.$pesan_gagal7; ?>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-12">
                        <table class="table datatable table-hover col-md-12 mx-1">
                            <thead bgcolor="#6ec4cb" style="color:black">
                            <tr>
                                <th scope="col">Nama Indikator</th>
                                <th scope="col">Konsep</th>
                                <th scope="col">Definisi</th>
                                <th scope="col">Interpretasi</th>
                                <th scope="col">Metode Pehitungan</th>
                                <th scope="col" class="text-center"width="18%">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $hi = $conn->query("SELECT id_indikator, nama_indikator, konsep, definisi, interpretasi, metode_perhitungan FROM `indikator` WHERE id_variabel = $id_variabel");
                                while($row = $hi->fetch_assoc()){
                            ?>
                            <tr>
                                <td><?php echo $row['nama_indikator']; ?></td>
                                <td><?php echo $row['konsep']; ?></td>
                                <td><?php echo $row['definisi']; ?></td>
                                <td><?php echo $row['interpretasi']; ?></td>
                                <td><?php echo $row['metode_perhitungan']; ?></td>
                                <td>
                                <form method="POST" action="">
                                    <input type="hidden" name="aksi" value="hapus">
                                    <input type="hidden" name="id_indikator" value="<?php echo $row['id_indikator'];?>">
                                    <a role="button" href="indikator_detail.php?id_variabel=<?php echo $id_variabel;?>&&id_indikator=<?php echo $row['id_indikator'];?>" class="btn btn-outline-primary btn-sm bi bi-eye">
                                    </a> &nbsp;
                                    <a role="button" href="variabel_detail.php?id_variabel=<?php echo $id_variabel;?>&&id_indikator=<?php echo $row['id_indikator'];?>" class="btn btn-outline-warning btn-sm bi bi-pen">
                                    </a> &nbsp; 
                                    <button class="btn btn-outline-danger btn-sm bi bi-trash" type="submit" name="delete" onclick="return confirm('Anda yakin akan menghapus data indikator ini?')">
                                    </button> 
                                </form>
                                </td>
                                </tr>
                                <?php } ?>
                            </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
            </section>

    </main><!-- End #main -->

    <?php include "../konfigurasi/footer.php"?>

</body>

</html>