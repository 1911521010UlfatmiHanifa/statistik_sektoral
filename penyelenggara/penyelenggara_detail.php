<?php
    include "../konfigurasi/session.php";
    $id_penyelenggara = $_GET['id_penyelenggara'];
    if(!$hasil = $conn->query("SELECT * FROM penyelenggara where id_penyelenggara = $id_penyelenggara")){
        die("gagal meminta data");
    }
    $no = 1;

    while($row = $hasil->fetch_assoc()){
        $unit_kerja = $row['unit_kerja'];
        $alamat = $row['alamat'];
        $telepon = $row['telepon']; 
        $email = $row['email']; 
        $faksimile = $row['faksimile']; 
        $eselon1 = $row['eselon1']; 
        $eselon2 = $row['eselon2'];
        $eselon3 = $row['eselon3'];
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Detail Data Penyelenggara</title>
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
      <h1>Data Penyelenggara</h1>
      <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../konfigurasi/index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="penyelenggara.php">Penyelenggara</a></li>
            <li class="breadcrumb-item active">Detail Data Penyelenggara</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Detail Data Penyelenggara</h5>

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <div class="row">
                    <div class="col-lg-6 col-md-3 label">Unit Kerja</div>
                    <div class="col-lg-6 col-md-9"><?php echo $unit_kerja?></div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-3 label">Alamat</div>
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

                <div class="row">
                    <div class="col-lg-6 col-md-3 label">Eselon 1</div>
                    <div class="col-lg-6 col-md-9"><?php echo $eselon1?></div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-3 label">Eselon 2</div>
                    <div class="col-lg-6 col-md-9"><?php echo $eselon2?></div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-3 label">Eselon 3</div>
                    <div class="col-lg-6 col-md-9"><?php echo $eselon3?></div>
                </div><br>

                <div class="col-12">
                    <a class="btn btn-warning w-100" href="penyelenggara.php">Kembali</a>
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