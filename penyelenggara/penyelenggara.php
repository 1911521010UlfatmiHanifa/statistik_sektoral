<?php
    include "../konfigurasi/session.php";

    if(isset($_POST['delete'])){
        if(isset($_POST['aksi']) && $_POST['aksi'] == 'hapus'){
            $id_penyelenggara = $_POST['id_penyelenggara'];
 
            $stmt=$conn->prepare("DELETE FROM penyelenggara WHERE id_penyelenggara= ?");
            $stmt->bind_param('i', $id_penyelenggara);
            $stmt->execute();
        
            if($conn->affected_rows > 0){
                $pesan_sukses= "Data Penyelenggara Berhasil Dihapus!";
            }
            else{
                $string = mysqli_error($conn);
                if (str_contains($string, 'Cannot delete or update a parent row')) {
                  $pesan_gagal= "Data Penyelenggara Telah Digunakan Pada Tabel Lainnya";
                } else {
                  $pesan_gagal= "Data Penyelenggara Gagal Dihapus";
                }
            }
            $stmt->close();
        }
    }

    if(!$hasil = $conn->query("SELECT * FROM penyelenggara order by id_penyelenggara")){
        die("gagal meminta data");
    }
    $no = 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Data Penyelenggara</title>
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
            <li class="breadcrumb-item active">Penyelenggara</li>
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
              <a href="penyelenggara_tambah.php" class="btn btn-outline-info btn-mt">
                <i class="bi bi-plus-circle"></i> Tambah Data Penyelenggara
              </a><br><br>
              <!-- Table with stripped rows -->
              <table class="table datatable table-hover">
                <thead bgcolor="#6ec4cb" style="color:black">
                  <tr>
                    <th scope="col" class="text-center">No.</th>
                    <th scope="col" class="text-center">Unit Kerja</th>
                    <th scope="col" class="text-center">Telepon</th>
                    <th scope="col" class="text-center">Email</th>
                    <th scope="col" class="text-center">Faksimile</th>
                    <th scope="col" width="18%" class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                      while($row = $hasil->fetch_assoc()){
                  ?>
                  <tr>
                    <th scope="row"><?php echo $no++;?></th>
                    <td><?php echo $row['unit_kerja']; ?></td>
                    <td><?php echo $row['telepon']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['faksimile']; ?></td>
                    <td width="18%" class="text-center">
                      <form method="POST" action="">
                          <a role="button" href="penyelenggara_detail.php?id_penyelenggara=<?php echo $row['id_penyelenggara'];?>" class="btn btn-outline-primary btn-sm bi bi-eye">
                          </a> &nbsp;    
                          <a role="button" href="penyelenggara_edit.php?id_penyelenggara=<?php echo $row['id_penyelenggara'];?>" class="btn btn-outline-warning btn-sm bi bi-pen">
                          </a> &nbsp; 
                          <input type="hidden" name="aksi" value="hapus">
                          <input type="hidden" name="id_penyelenggara" value="<?php echo $row['id_penyelenggara'];?>">
                          <button class="btn btn-outline-danger btn-sm bi bi-trash" type="submit" name="delete" onclick="return confirm('Anda yakin akan menghapus data penyelenggara ini?')">
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