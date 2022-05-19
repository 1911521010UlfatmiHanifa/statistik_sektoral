<?php
  include "../konfigurasi/session.php";

  if(isset($_POST['delete'])){
    if(isset($_POST['aksi']) && $_POST['aksi'] == 'hapus'){
        $id_variabel = $_POST['id_variabel'];

        $stmt=$conn->prepare("DELETE FROM variabel WHERE id_variabel= ?");
        $stmt->bind_param('i', $id_variabel);
        $stmt->execute();
    
        if($conn->affected_rows > 0){
            $pesan_sukses= "Metadata Variabel Berhasil Dihapus!";
        }
        else{
            $string = mysqli_error($conn);
            if (str_contains($string, 'Cannot delete or update a parent row')) {
              $pesan_gagal= "Metadata Variabel Telah Digunakan Pada Tabel Lainnya";
            } else {
              $pesan_gagal= "Metadata Variabel Gagal Dihapus";
            }
        }
        $stmt->close();
    }
  }

  if(!$hasil = $conn->query("SELECT * FROM variabel join status on status.id_status=variabel.id_confidentional")){
      die("gagal meminta data");
  }
  $no = 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Metadata Variabel</title>
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
      <h1>Metadata Variabel</h1>
      <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../konfigurasi/index.php">Home</a></li>
            <li class="breadcrumb-item active">Metadata Variabel</li>
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
              <a href="variabel_tambah.php" class="btn btn-outline-info btn-mt">
                <i class="bi bi-plus-circle"></i> Tambah Metadata Variabel
              </a><br><br>
              <!-- Table with stripped rows -->
              <table class="table datatable table-hover">
                <thead border="1" bgcolor="#6ec4cb" style="color:black">
                  <tr class="text-center">
                    <th scope="col" class="text-center">N<br>O</th>
                    <th scope="col" class="text-center">Nama <br> Variabel</th>
                    <th scope="col" class="text-center">Konsep<br><br></th>
                    <th scope="col" class="text-center">Referensi<br>Pemilihan</th>
                    <th scope="col" class="text-center">Referensi Waktu</th>
                    <th scope="col" class="text-center">Confidentional Status</th>
                    <th scope="col" class="text-center">Aksi<br><br></th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                      while($row = $hasil->fetch_assoc()){
                  ?>
                  <tr>
                    <th scope="row"><?php echo $no++;?></th>
                    <td><?php echo $row['nama_variabel']; ?></td>
                    <td><?php echo $row['konsep']; ?></td>
                    <td><?php echo $row['referensi_pemilihan']; ?></td>
                    <td><?php echo $row['referensi_waktu']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td width="18%" class="text-center">
                      <form method="POST" action="">
                          <a role="button" href="variabel_detail.php?id_variabel=<?php echo $row['id_variabel'];?>" class="btn btn-outline-primary btn-sm bi bi-eye">
                          </a> &nbsp;   
                          <a role="button" href="variabel_edit.php?id_variabel=<?php echo $row['id_variabel'];?>" class="btn btn-outline-warning btn-sm bi bi-pen">
                          </a> &nbsp;
                          <input type="hidden" name="aksi" value="hapus">
                          <input type="hidden" name="id_variabel" value="<?php echo $row['id_variabel'];?>">
                          <button class="btn btn-outline-danger btn-sm bi bi-trash" type="submit" name="delete" onclick="return confirm('Anda yakin akan menghapus data variabel ini?')">
                          </button> 
                      </form>
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