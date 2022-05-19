<?php
    include "../konfigurasi/session.php";

    if(isset($_POST['simpan'])){
        $nama_variabel = strtoupper($_POST['nama_variabel']);
        $alias = ucwords($_POST['alias']);
        $konsep = ucwords($_POST['konsep']);
        $definisi = ucwords($_POST['definisi']);
        $referensi_pemilihan = ucwords($_POST['referensi_pemilihan']);
        $referensi_waktu = $_POST['referensi_waktu'];
        $tipe_data = $_POST['tipe_data'];
        $domain_value = $_POST['domain_value'];
        $aturan_validasi = ucwords($_POST['aturan_validasi']);
        $kalimat_pertanyaan = $_POST['kalimat_pertanyaan'];
        $id_confidentional = $_POST['id_confidentional'];

        $stmt=$conn->prepare('INSERT INTO `variabel`(`id_confidentional`, `nama_variabel`, `alias`, `konsep`, `definisi`, `referensi_pemilihan`, 
                                `referensi_waktu`, `tipe_data`, `domain_value`, `aturan_validasi`, `kalimat_pertanyaan`)
                                VALUES (?,?,?,?,?,?,?,?,?,?,?)');
        $stmt->bind_param("issssssssss", $id_confidentional, $nama_variabel, $alias, $konsep, $definisi, $referensi_pemilihan, $referensi_waktu, $tipe_data,
                            $domain_value, $aturan_validasi, $kalimat_pertanyaan);
        $stmt->execute();

        if($conn->affected_rows > 0){
            $pesan_sukses= "Metadata Variabel Berhasil Disimpan!";
        }
        else{
            $pesan_gagal= "Metadata Variabel Gagal Disimpan!";
        }
        $stmt->close();
	} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tambah Metadata Variabel</title>
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
      <h1>Tambah Metadata Variabel</h1>
      <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../konfigurasi/index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="variabel.php">Metadata Variabel</a></li>
            <li class="breadcrumb-item active">Tambah Metadata Variabel</li>
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
            <h5 class="card-title">Form Tambah Metadata Variabel</h5>

            <!-- General Form Elements -->
            <form class="row g-3 needs-validation" method="post" novalidate enctype="multipart/form-data">
            <div class="col-6">
                    <label for="yourName" class="form-label">Nama Variabel</label>
                    <input type="text" name="nama_variabel" class="form-control" id="nama_variabel" pattern="^[A-Za-z]+([\A-Za-z]+)*" autofocus required>
                    <div class="invalid-feedback">Masukkan Nama Variabel!</div>
                </div>

                <div class="col-6">
                    <label for="yourketerangan" class="form-label">Alias</label>
                    <input type="text" name="alias" class="form-control" id="alias">
                    <div class="invalid-feedback">Masukkan Alias!</div>
                </div>

                <div class="col-12">
                    <label for="yourketerangan" class="form-label">Konsep</label>
                    <textarea type="konsep" name="konsep" class="form-control" id="konsep" required></textarea>
                    <div class="invalid-feedback">Masukkan Konsep!</div>
                </div>

                <div class="col-12">
                    <label for="yourketerangan" class="form-label">Definisi</label>
                    <textarea type="text" name="definisi" class="form-control" id="definisi"></textarea>
                    <div class="invalid-feedback">Masukkan Definisi!</div>
                </div>

                <div class="col-12">
                    <label for="yourketerangan" class="form-label">Referensi Pemilihan</label>
                    <textarea type="text" name="referensi_pemilihan" class="form-control" id="referensi_pemilihan" pattern="^[A-Za-z]+([\A-Za-z]+)*"required></textarea>
                    <div class="invalid-feedback">Masukkan Referensi Pemilihan!</div>
                </div>

                <div class="col-6">
                    <label for="yourketerangan" class="form-label">Referensi Waktu</label>
                    <input type="text" name="referensi_waktu" class="form-control" id="referensi_waktu" required>
                    <div class="invalid-feedback">Masukkan Referensi Waktu!</div>
                </div>

                <div class="col-6">
                    <label for="yourketerangan" class="form-label">Tipe Data</label>
                    <input type="text" name="tipe_data" class="form-control" id="tipe_data" pattern="^[A-Za-z]+([\A-Za-z]+)*" required>
                    <div class="invalid-feedback">Masukkan Tipe Data!</div>
                </div>

                <div class="col-6">
                    <label for="yourketerangan" class="form-label">Domain Value</label>
                    <input type="text" name="domain_value" class="form-control" id="domain_value" pattern="^[A-Za-z]+([\A-Za-z]+)*">
                    <div class="invalid-feedback">Masukkan Domain Value!</div>
                </div>

                <div class="col-6">
                    <label for="yourketerangan" class="form-label">Kalimat Pertanyaan</label>
                    <input type="text" name="kalimat_pertanyaan" class="form-control" id="kalimat_pertanyaan" pattern="^[A-Za-z]+([\A-Za-z]+)*">
                    <div class="invalid-feedback">Masukkan Kalimat Pertanyaan!</div>
                </div>

                <div class="col-12">
                    <label for="yourketerangan" class="form-label">Aturan Validasi</label>
                    <textarea type="text" name="aturan_validasi" class="form-control" id="aturan_validasi" pattern="^[A-Za-z]+([\A-Za-z]+)*"required></textarea>
                    <div class="invalid-feedback">Masukkan Aturan Validasi!</div>
                </div>

                <div class="col-12">
                    <label for="id_confidentional" class="form-label">Confidentional Status</label>
                    <select class="form-select" id="id_confidentional" name="id_confidentional" required>
                        <option selected disabled value="">Pilih Confidentional Status</option>
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
                        Masukkan Pilihan Confidentional Status!
                    </div>
                </div>

                <div class="col-6">
                    <a class="btn btn-warning w-100" href="variabel.php">Kembali</a>
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