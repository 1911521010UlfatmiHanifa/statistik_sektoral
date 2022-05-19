<?php
    include "../konfigurasi/session.php";

    if(!$hasil = $conn->query("SELECT * FROM kegiatan join penyelenggara on kegiatan.id_penyelenggara=penyelenggara.id_penyelenggara")){
        die("gagal meminta data");
    }
    $no = 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Metadata Kegiatan</title>
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
      <h1>Metadata Kegiatan</h1>
      <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../konfigurasi/index.php">Home</a></li>
            <li class="breadcrumb-item active">Metadata Kegiatan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
        <?php if(isset($pesan_sukses)){?>
              <div class="alert alert-success" role="alert">
                  <?php echo '<img src="../logo/check.png" width="27" class="me-2">  '.$pesan_sukses; ?>
              </div>
          <?php } else if(isset($pesan_gagal)){ ?>
              <div class="alert alert-danger" role="alert">
                  <?php echo '<img src="../logo/cross.png" width="20" class="me-2">  '.$pesan_gagal; ?>
              </div>
          <?php } ?>

          <div class="card">
            <div class="card-body"><br>
              <a href="kegiatan_tambah.php" class="btn btn-outline-info btn-mt">
                <i class="bi bi-plus-circle"></i> Tambah Metadata Kegiatan
              </a><br><br>
              <!-- Table with stripped rows -->
              <table class="table datatable table-hover">
                <thead border="1" bgcolor="#6ec4cb" style="color:black">
                  <tr>
                    <th scope="col" rowspan="2" style="text-align:center"><br>N<br>O<br><br></th>
                    <th scope="col" rowspan="2" style="text-align:center"><br>Judul<br>Kegiatan<br><br></th>
                    <th scope="col" rowspan="2" style="text-align:center"><br>Latar<br>Belakang<br><br></th>
                    <th scope="col" rowspan="2" style="text-align:center"><br>Instansi<br>Penyelenggara<br><br></th>
                    <th scope="col" colspan="2" style="text-align:center"><br>Unit Eselon PJ</th>
                    <th scope="col" style="text-align:center"><br>PJ Teknis</th>
                    <th scope="col" rowspan="2" style="text-align:center" width="20%"><br>Aksi<br><br><br></th>
                  </tr>
                  <tr>
                    <th scope="col" style="text-align:center">Eselon1</th>
                    <th scope="col" style="text-align:center">Eselon2</th>
                    <th scope="col" style="text-align:center">Eselon3</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                      while($row = $hasil->fetch_assoc()){
                  ?>
                  <tr>
                    <th scope="row"><?php echo $no++;?></th>
                    <td><?php echo $row['judul_kegiatan']; ?></td>
                    <td><?php echo $row['latar_belakang']; ?></td>
                    <td><?php echo $row['unit_kerja']; ?></td>
                    <td><?php echo $row['eselon1']; ?></td>
                    <td><?php echo $row['eselon2']; ?></td>
                    <td><?php echo $row['eselon3']; ?></td>
                    <td width="20%" class="text-center">
                      <a role="button" href="kegiatan_detail.php?id_kegiatan=<?php echo $row['id_kegiatan'];?>" class="btn btn-outline-primary btn-sm bi bi-eye">
                      </a> &nbsp;   
                      <a role="button" href="kegiatan_edit.php?id_kegiatan=<?php echo $row['id_kegiatan'];?>" class="btn btn-outline-warning btn-sm bi bi-pen">
                      </a> &nbsp;
                    </td>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <?php include "../konfigurasi/footer.php"?>

</body>

</html>