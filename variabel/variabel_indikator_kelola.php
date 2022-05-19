<?php
    include "../konfigurasi/session.php";
    error_reporting(0);
    $id_kegiatan = $_REQUEST['id_kegiatan'];
    $id_indikator = $_REQUEST['id_indikator'];
    $id_kecamatan = $_REQUEST['id_kecamatan'];
    if($_REQUEST['nilai'] != null){
        $nilai = $_REQUEST['nilai'];
    }

    $stmt01 = $conn->prepare("SELECT * from kecamatan where id_kecamatan=?");
    $stmt01->bind_param("i", $id_kecamatan);
    $stmt01->execute();
    $result01 = $stmt01->get_result();

    while($data01 = $result01->fetch_assoc()){
        $kecamatan = $data01['kecamatan'];
    }

    $stmt0 = $conn->prepare("SELECT * from indikator join nilai_sub on nilai_sub.id_indikator=indikator.id_indikator join kecamatan on 
                                kecamatan.id_kecamatan=nilai_sub.id_kecamatan join kegiatan on kegiatan.id_kegiatan=nilai_sub.id_kegiatan join 
                                sumber_data on nilai_sub.id_sumber_data=sumber_data.id_sumber_data join satuan on satuan.id_satuan=
                                indikator.id_satuan where nilai_sub.id_kegiatan=? and nilai_sub.id_indikator=? and nilai_sub.id_kecamatan=?");
    $stmt0->bind_param("iii", $id_kegiatan, $id_indikator, $id_kecamatan);
    $stmt0->execute();
    $result0 = $stmt0->get_result();

    while($data0 = $result0->fetch_assoc()){
        $id_sumber_data = $data0['id_sumber_data'];
        $penjelasan = $data0['penjelasan'];
        $kecamatan = $data0['kecamatan'];
    }
    
    if(isset($_POST['simpanUU'])){
        $nilai = $_POST['nilai'];
		$id_sumber_data = $_POST['id_sumber_data'];
        $penjelasan = ucwords($_POST['penjelasan']);
        if($id_sumber_data == "Lainnya"){
            $sumber_data = ucwords($_POST['sumber_data']);
            if(!empty($sumber_data)){
                $stmt3=$conn->prepare('INSERT INTO sumber_data(sumber_data)
                                        VALUES (?)');
                $stmt3->bind_param("s", $sumber_data);
                $stmt3->execute();
                $stmt3->close();
        
                $hasil3 = $conn->query("SELECT max(id_sumber_data) as id_sumber_data FROM sumber_data");
                $row3 = $hasil3->fetch_assoc();
                $id_sumber_data = $row3['id_sumber_data'];
            }
        }

        if($id_sumber_data == "Lainnya"){
            $pesan_gagal2= "Data Sumber Data Belum Ditambahkan!";
        }else{
            if($nilai == null){
                $nilai = 0;
            }
            $stmt8=$conn->prepare('INSERT INTO `nilai_sub`(`id_indikator`, `id_kegiatan`, `id_kecamatan`, `id_sumber_data`, `nilai`, `penjelasan`)
                                VALUES (?,?,?,?,?,?)');
            $stmt8->bind_param("iiiiis", $id_indikator, $id_kegiatan, $id_kecamatan, $id_sumber_data, $nilai, $penjelasan);
            $stmt8->execute();
    
            if($conn->affected_rows > 0){
                header("Location: variabel_indikator.php?id_kegiatan=$id_kegiatan");
                $pesan_sukses2= "Data Database Statistik Sektoral Berhasil Disimpan!";
            }
            else{
                $pesan_gagal2= "Data Database Statistik Sektoral Gagal Disimpan!";
                $pesan_gagal2= mysqli_error($conn);
            }
            $stmt8->close();
        }
    }else if(isset($_POST['simpan'])){
        $nilai = $_POST['nilai'];
        $id_sumber_data = $_POST['id_sumber_data'];
        $penjelasan = ucwords($_POST['penjelasan']);
        if($id_sumber_data == "Lainnya"){
            $sumber_data = ucwords($_POST['sumber_data']);
            if(!empty($sumber_data)){
                $stmt3=$conn->prepare('INSERT INTO sumber_data(sumber_data)
                                        VALUES (?)');
                $stmt3->bind_param("s", $sumber_data);
                $stmt3->execute();
                $stmt3->close();

                $hasil3 = $conn->query("SELECT max(id_sumber_data) as id_sumber_data FROM sumber_data");
                $row3 = $hasil3->fetch_assoc();
                $id_sumber_data = $row3['id_sumber_data'];
            }
        }

        if($id_sumber_data == "Lainnya"){
            $pesan_gagal2= "Data Sumber Data Belum Ditambahkan!";
        }else{
            if($nilai == null){
                $nilai = 0;
            }
            $stmt8=$conn->prepare('UPDATE `nilai_sub` SET `nilai`=?,`id_sumber_data`=?,`penjelasan`=? WHERE id_indikator=? and id_kegiatan=? and id_kecamatan=?');
            $stmt8->bind_param("iisiii", $nilai, $id_sumber_data, $penjelasan, $id_indikator, $id_kegiatan, $id_kecamatan);
            $stmt8->execute();

            if($conn->affected_rows > 0){
                header("Location: variabel_indikator.php?id_kegiatan=$id_kegiatan");
                $pesan_sukses2= "Data Database Statistik Sektoral Berhasil Disimpan!";          
            }
            else{
                $pesan_gagal2= "Data Database Statistik Sektoral Gagal Disimpan!";
                $pesan_gagal2= mysqli_error($conn);
            }
            $stmt8->close();
        }
    }

    $stmt00 = $conn->prepare("SELECT * from indikator join satuan on satuan.id_satuan=
                              indikator.id_satuan where id_indikator=?");
    $stmt00->bind_param("i", $id_indikator);
    $stmt00->execute();
    $result00 = $stmt00->get_result();

    while($data00 = $result00->fetch_assoc()){
        $nama_indikator1 = $data00['nama_indikator'];
        $konsep1 = $data00['konsep'];
        $definisi1 = $data00['definisi'];
        $interpretasi1 = $data00['interpretasi'];
        $satuan1 = $data00['satuan'];
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Kelola Metadata Variabel dan Indikator Kegiatan</title>
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
        if(that.value == '0'){
            document.getElementById("nilai").value = 0;
            document.getElementById("nilai").disabled = true;
        }else if (that.value != "Lainnya") {
            document.getElementById("prop").disabled = true;
            document.getElementById("prop").style.display = "none";
            document.getElementById("nilai").disabled = false;
            document.getElementById("nilai").value = null;
        }else{
            document.getElementById("prop").disabled = false;
            document.getElementById("prop").style.display = "block";
            document.getElementById("nilai").disabled = false;
            document.getElementById("nilai").value = null;
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
        <h1>Metadata variabel</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../konfigurasi/index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="../kegiatan/kegiatan.php">Metadata Kegiatan</a></li>
                <li class="breadcrumb-item"><a href="../kegiatan/kegiatan_detail.php?id_kegiatan=<?php echo $id_kegiatan?>">Detail Metadata Kegiatan</a></li>
                <li class="breadcrumb-item"><a href="variabel_indikator.php?id_kegiatan=<?php echo $id_kegiatan?>">Metadata Variabel Indikator</a></li>
                <li class="breadcrumb-item active">Kelola Metadata Variabel Indikator Kegiatan</li>
            </ol>
        </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Metadata Indikator</h5>

                    <div class="tab-pane fade show active profile-overview" id="profile-overview">
                        <div class="row">
                            <div class="col-lg-6 col-md-3 label">Nama Indikator</div>
                            <div class="col-lg-6 col-md-9"><?php echo $nama_indikator1?></div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-3 label">Konsep</div>
                            <div class="col-lg-6 col-md-9"><?php echo $konsep1?></div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-3 label">Definisi</div>
                            <div class="col-lg-6 col-md-9"><?php echo $definisi1?></div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-3 label">Interpretasi</div>
                            <div class="col-lg-6 col-md-9"><?php echo $interpretasi1?></div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-6 col-md-3 label">Satuan</div>
                            <div class="col-lg-6 col-md-9"><?php echo $satuan1?></div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-3 label">Kecamatan</div>
                            <div class="col-lg-6 col-md-9"><?php echo $kecamatan?></div>
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
                    <h5 class="card-title">Kelola Metadata Variabel Indikator Kegiatan</h5>

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

                        <?php if($nilai  == null){ ?>
                            <!-- General Form Elements -->
                            <form class="row g-3 needs-validation" method="post" novalidate>
                            <div class="col-6">
                                <label for="id_sumber_data" class="form-label">Sumber Data</label>
                                <select class="form-select" onchange="text(this)" id="id_sumber_data" name="id_sumber_data" required>
                                    <option selected disabled value="">Pilih Sumber Data</option>
                                    <?php 
                                        $stmt25 = $conn->query("SELECT * FROM sumber_data");
                                        while($row = $stmt25->fetch_assoc()){
                                    ?>
                                    <option value="<?php echo $row['id_sumber_data']; ?>">
                                        <?php echo $row['sumber_data']; ?>
                                    </option>
                                    <?php } ?>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                                <div class="invalid-feedback">
                                    Masukkan Pilihan Sumber Data!
                                </div>
                            </div>

                            <div class="col-6">
                                <label for="yourName" class="form-label">Nilai</label>
                                <input type="number" min="0" name="nilai" class="form-control" id="nilai" pattern="^[A-Za-z]+([\A-Za-z]+)*" autofocus required>
                                <div class="invalid-feedback">Masukkan Nilai!</div>
                            </div>

                            <div class="col-12" style="display:none;" id="prop">
                                <label for="yourketerangan" class="form-label">Sumber Metadata</label>
                                <input type="text" name="sumber_data" class="form-control" id="sumber_data">
                            </div>

                            <div class="col-12">
                                <label for="yourketerangan" class="form-label">Penjelasan</label>
                                <textarea type="text" name="penjelasan" class="form-control" id="penjelasan"></textarea>
                            </div>

                            <div class="col-6">
                                <a class="btn btn-warning w-100" href="variabel_indikator.php?id_kegiatan=<?php echo $id_kegiatan?>">Kembali</a>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-primary w-100" type="submit" name="simpanUU">Simpan</button>
                            </div>
                        </form><!-- End General Form Elements -->
                        <?php }else { ?>
                            <!-- General Form Elements -->
                            <form class="row g-3 needs-validation" method="post" novalidate>
                            <div class="col-6">
                                <label for="id_ukuran" class="form-label">Sumber Metadata</label>
                                <select class="form-select" onchange="text(this)" id="id_sumber_data" name="id_sumber_data" required>
                                    <option selected disabled value="">Pilih Sumber Metadata</option>
                                    <?php 
                                        $stmt25 = $conn->query("SELECT * FROM sumber_data");
                                        while($row = $stmt25->fetch_assoc()){
                                    ?>
                                    <option value="<?php echo $row['id_sumber_data']; ?>"
                                        <?php if($id_sumber_data == $row['id_sumber_data']) {
                                            echo 'selected';
                                        }?>>
                                        <?php echo $row['sumber_data']; ?>
                                    </option>
                                    <?php } ?>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                                <div class="invalid-feedback">
                                    Masukkan Pilihan Sumber Metadata!
                                </div>
                            </div>

                            <div class="col-6">
                                <label for="yourName" class="form-label">Nilai</label>
                                <input type="number" min="0" value="<?php echo $nilai?>" name="nilai" id="nilai" class="form-control" id="nilai" pattern="^[A-Za-z]+([\A-Za-z]+)*" autofocus required>
                                <div class="invalid-feedback">Masukkan Nilai!</div>
                            </div>

                            <div class="col-12" style="display:none;" id="prop">
                                <label for="yourketerangan" class="form-label">Sumber Metadata</label>
                                <input type="text" name="sumber_data" class="form-control" id="sumber_data">
                            </div>

                            <div class="col-12">
                                <label for="yourketerangan" class="form-label">Penjelasan</label>
                                <textarea type="text" name="penjelasan" class="form-control" id="penjelasan"><?php echo $penjelasan?></textarea>
                            </div>

                            <div class="col-6">
                                <a class="btn btn-warning w-100" href="variabel_indikator.php?id_kegiatan=<?php echo $id_kegiatan?>&&id_indikator=<?php echo $id_indikator?>">Back</a>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-primary w-100" type="submit" name="simpan">Simpan</button>
                            </div>
                        </form><!-- End General Form Elements -->
                        <?php } ?>
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