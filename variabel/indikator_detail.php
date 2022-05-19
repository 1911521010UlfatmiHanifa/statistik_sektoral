<?php
    include "../konfigurasi/session.php";
    error_reporting(0);
    $id_variabel = $_REQUEST['id_variabel'];
    $id_indikator = $_REQUEST['id_indikator'];

    $stmt00 = $conn->prepare("SELECT id_indikator, nama_indikator, konsep, definisi, interpretasi, metode_perhitungan, level_estimasi, a.status as 
                                diakses_umum, b.id_status as id_indikator_komposit, b.status as indi, satuan, ukuran, nama_publikasi, url, kode_kegiatan, 
                                kegiatan_penghasil, nama, klasifikasi FROM `indikator` join status as a on a.id_status=
                                indikator.id_diakses_umum join status as b on b.id_status=indikator.id_indikator_komposit join satuan on
                                satuan.id_satuan=indikator.id_satuan join ukuran on ukuran.id_ukuran=indikator.id_ukuran join 
                                klasifikasi on klasifikasi.id_klasifikasi=indikator.id_klasifikasi left join publikasi_ketersediaan on 
                                publikasi_ketersediaan.id_publikasi=indikator.id_publikasi left join variabel_pembangunan on 
                                variabel_pembangunan.id_variabel_pembangunan=indikator.id_variabel_pembangunan
                                WHERE id_variabel = ? and id_indikator = ?");
    $stmt00->bind_param("ii", $id_variabel, $id_indikator);
    $stmt00->execute();
    $result00 = $stmt00->get_result();

    while($row = $result00->fetch_assoc()){
        $nama_indikator = $row['nama_indikator'];
        $konsep = $row['konsep'];
        $definisi = $row['definisi']; 
        $interpretasi = $row['interpretasi']; 
        $metode_perhitungan = $row['metode_perhitungan']; 
        $satuan = $row['satuan']; 
        $ukuran = $row['ukuran'];
        $klasifikasi = $row['klasifikasi'];
        $indikator = $row['indi'];
        $id_indikator_komposit = $row['id_indikator_komposit'];
        $nama_publikasi = $row['nama_publikasi'];
        $url = $row['url'];
        $kegiatan_penghasil = $row['kegiatan_penghasil']; 
        $kode_kegiatan = $row['kode_kegiatan'];
        $nama = $row['nama'];
        $level_estimasi =  $row['level_estimasi']; 
        $diakses_umum =  $row['diakses_umum']; 
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
      <h1>Metadata variabel</h1>
      <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../konfigurasi/index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="variabel.php">Metadata Variabel</a></li>
            <li class="breadcrumb-item"><a href="variabel_detail.php?id_variabel=<?php echo $id_variabel?>">Detail Metadata Variabel</a></li>
            <li class="breadcrumb-item active">Detail Metadata Indikator</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Detail Metadata Indikator</h5>

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <div class="row">
                    <div class="col-lg-6 col-md-3 label">Nama Indikator</div>
                    <div class="col-lg-6 col-md-9"><?php echo $nama_indikator?></div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-3 label">Konsep</div>
                    <div class="col-lg-6 col-md-9"><?php echo $konsep?></div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-3 label">Definisi</div>
                    <div class="col-lg-6 col-md-9"><?php echo $definisi?></div>
                </div>
                
                <div class="row">
                    <div class="col-lg-6 col-md-3 label">Interpretasi</div>
                    <div class="col-lg-6 col-md-9"><?php echo $interpretasi?></div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-3 label">Satuan</div>
                    <div class="col-lg-6 col-md-9"><?php echo $satuan?></div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-3 label">Ukuran</div>
                    <div class="col-lg-6 col-md-9"><?php echo $ukuran?></div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-3 label">Klasifikasi</div>
                    <div class="col-lg-6 col-md-9"><?php echo $klasifikasi?></div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-3 label">Indikator Komposit</div>
                    <div class="col-lg-6 col-md-9"><?php echo $indikator?></div>
                </div>

                <?php if($id_indikator_komposit == 1){?>

                    <div class="row">
                        <div class="col-lg-6 col-md-3 label">Nama Publikasi</div>
                        <div class="col-lg-6 col-md-9"><?php echo $nama_publikasi?></div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-3 label">URL</div>
                        <div class="col-lg-6 col-md-9"><?php echo $url?></div>
                    </div>

                <?php } else { ?>

                    <div class="row">
                        <div class="col-lg-6 col-md-3 label">Kode Kegiatan</div>
                        <div class="col-lg-6 col-md-9"><?php echo $kode?></div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-3 label">Kegiatan Penghasil</div>
                        <div class="col-lg-6 col-md-9"><?php echo $kegiatan_penghasil?></div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-3 label">Nama</div>
                        <div class="col-lg-6 col-md-9"><?php echo $nama?></div>
                    </div>

                <?php } ?>

                <div class="row">
                    <div class="col-lg-6 col-md-3 label">Level Estimasi</div>
                    <div class="col-lg-6 col-md-9"><?php echo $level_estimasi?></div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-3 label">Dapat Diakses Umum</div>
                    <div class="col-lg-6 col-md-9"><?php echo $diakses_umum?></div>
                </div><br>

                <div class="col-12">
                    <a class="btn btn-warning w-100" href="variabel_detail.php?id_variabel=<?php echo $id_variabel?>">Kembali</a>
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