<?php
    include "../konfigurasi/session.php";
    $id_penyelenggara = $_REQUEST['id_penyelenggara'];

    if(isset($_POST['simpan'])){
		$unit_kerja = $_POST['unit_kerja'];
		$telepon = $_POST['telepon'];
		$email = $_POST['email'];
		$faksimile = $_POST['faksimile'];
        $alamat = $_POST['alamat'];
        $eselon1 = $_POST['eselon1'];
        $eselon2 = $_POST['eselon2'];
        $eselon3 = $_POST['eselon3'];

        $stmt=$conn->prepare('UPDATE penyelenggara SET unit_kerja=?, telepon=? , email=?, faksimile=?, alamat=?, eselon1=?, eselon2=?, eselon3=? where id_penyelenggara=?');
        $stmt->bind_param("ssssssssi", $unit_kerja, $telepon , $email, $faksimile, $alamat, $eselon1, $eselon2, $eselon3, $id_penyelenggara);
        $stmt->execute();

        if($conn->affected_rows > 0){
            $pesan_sukses= "Data Penyelenggara Berhasil Disimpan!";
        }
        else{
            $pesan_gagal= "Data Penyelenggara Gagal Disimpan!";
        }
        $stmt->close();
	} 

    $stmt = $conn->prepare("SELECT * FROM penyelenggara WHERE id_penyelenggara = ?");
    $stmt->bind_param("s", $id_penyelenggara);
    $stmt->execute();
    $result = $stmt->get_result();

    while($data = $result->fetch_assoc()){
        $unit_kerja = $data['unit_kerja'];
        $telepon = $data['telepon'];
        $email = $data['email'];
        $faksimile = $data['faksimile'];
        $alamat = $data['alamat'];
        $eselon1 = $data['eselon1'];
        $eselon2 = $data['eselon2'];
        $eselon3 = $data['eselon3'];
    }
    $conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Edit Data Penyelenggara</title>
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
      <h1>Edit Data Penyelenggara</h1>
      <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../konfigurasi/index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="penyelenggara.php">Penyelenggara</a></li>
            <li class="breadcrumb-item active">Edit Data Penyelenggara</li>
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
              <h5 class="card-title">Form Edit Data Penyelenggara</h5>

              <!-- General Form Elements -->
              <form class="row g-3 needs-validation" method="post" novalidate enctype="multipart/form-data">
                  <div class="col-6">
                      <label for="yourName" class="form-label">Unit Kerja</label>
                      <input value="<?php echo $unit_kerja?>" type="text" name="unit_kerja" class="form-control" id="unit_kerja" pattern="^[A-Za-z]+([\A-Za-z]+)*" autofocus required>
                      <div class="invalid-feedback">Masukkan Unit Kerja!</div>
                  </div>

                  <div class="col-6">
                      <label for="yourketerangan" class="form-label">Telepon</label>
                      <input value="<?php echo $telepon?>" type="text" name="telepon" class="form-control" id="telepon" required>
                      <div class="invalid-feedback">Masukkan Telepon!</div>
                  </div>

                  <div class="col-6">
                      <label for="yourketerangan" class="form-label">Email</label>
                      <input value="<?php echo $email?>" type="email" name="email" class="form-control" id="email" required>
                      <div class="invalid-feedback">Masukkan Email!</div>
                  </div>

                  <div class="col-6">
                      <label for="yourketerangan" class="form-label">Faksimile</label>
                      <input value="<?php echo $faksimile?>" type="text" name="faksimile" class="form-control" id="faksimile" required>
                      <div class="invalid-feedback">Masukkan Faksimile!</div>
                  </div>

                  <div class="col-6">
                      <label for="yourketerangan" class="form-label">Eselon 1</label>
                      <input value="<?php echo $eselon1?>" type="text" name="eselon1" class="form-control" id="eselon1" pattern="^[A-Za-z]+([\A-Za-z]+)*">
                  </div>

                  <div class="col-6">
                      <label for="yourketerangan" class="form-label">Eselon 2</label>
                      <input value="<?php echo $eselon2?>" type="text" name="eselon2" class="form-control" id="eselon2" pattern="^[A-Za-z]+([\A-Za-z]+)*" required>
                      <div class="invalid-feedback">Masukkan Eselon 2!</div>
                  </div>

                  <div class="col-6">
                      <label for="yourketerangan" class="form-label">Eselon 3</label>
                      <input value="<?php echo $eselon3?>" type="text" name="eselon3" class="form-control" id="eselon3" pattern="^[A-Za-z]+([\A-Za-z]+)*" required>
                      <div class="invalid-feedback">Masukkan Eselon 3!</div>
                  </div>

                  <div class="col-6">
                      <label for="yourketerangan" class="form-label">Alamat</label>
                      <input value="<?php echo $alamat?>" type="text" name="alamat" class="form-control" id="alamat" required>
                      <div class="invalid-feedback">Masukkan Alamat!</div>
                  </div>

                  <div class="col-6">
                      <a class="btn btn-warning w-100" href="penyelenggara.php">Kembali</a>
                  </div>
                  <div class="col-6">
                      <button class="btn btn-primary w-100" type="submit" name="simpan">Simpan</button>
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