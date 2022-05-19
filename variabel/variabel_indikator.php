<?php
    include "../konfigurasi/session.php";
    $id_kegiatan=$_REQUEST['id_kegiatan'];

    if(isset($_POST['delete'])){
        if(isset($_POST['aksi']) && $_POST['aksi'] == 'hapus'){
            $id_indikator = $_POST['id_indikator'];
            $id_kecamatan = $_POST['id_kecamatan'];

            $stmt99=$conn->prepare("DELETE FROM nilai_sub WHERE id_indikator= ? and id_kegiatan= ? and id_kecamatan=?");
            $stmt99->bind_param('iii', $id_indikator, $id_kegiatan, $id_kecamatan);
            $stmt99->execute();
        
            if($conn->affected_rows > 0){
                $pesan_sukses= "Data Berhasil Dihapus!";
            }
            else{
                $pesan_gagal= "Data Gagal Dihapus!";
            }
            $stmt99->close();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Metadata Variabel dan Indikator</title>
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

    <script>
        function text11(that) {
        if (that.value != "Lainnya") {
            document.getElementById("prop11").disabled = true;
            document.getElementById("prop11").style.display = "none";
        } else {
            document.getElementById("prop11").disabled = false;
            document.getElementById("prop11").style.display = "block";
        }
        return;
        }

        function text12(that) {
        if (that.value != "Lainnya") {
            document.getElementById("prop12").disabled = true;
            document.getElementById("prop12").style.display = "none";
        } else {
            document.getElementById("prop12").disabled = false;
            document.getElementById("prop12").style.display = "block";
        }
        return;
        }

        function text17(that) {
        if (that.value != "1") {
            document.getElementById("prop17").disabled = true;
            document.getElementById("prop17").style.display = "none";
        } else {
            document.getElementById("prop17").disabled = false;
            document.getElementById("prop17").style.display = "block";
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
        <h1>Metadata Kegiatan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../konfigurasi/index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="../kegiatan/kegiatan.php">Metadata Kegiatan</a></li>
                <li class="breadcrumb-item"><a href="../kegiatan/kegiatan_detail.php?id_kegiatan=<?php echo $id_kegiatan?>">Detail Metadata Kegiatan</a></li>
                <li class="breadcrumb-item active">Metadata Variabel dan Indikator</li>
            </ol>
        </nav>
        </div><!-- End Page Title -->

        <section class="section">
        <div class="row">
            <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                <br>
                <div class="row">
                    <div class="col-12">
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
                    </div>
                </div>
                <h5 class="card-title text-center">D A T A - I N D I K A T O R - D A N - V A R I A B E L</h5>

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                    <div class="row">
                    <div class="col-12">
                        <table class="table table-hover col-md-10 mx-1">
                        <thead bgcolor="#6ec4cb" style="color:black">
                        <tr>
                            <th scope="col" class="text-center" width="5%">NO.</th>
                            <th scope="col" class="text-center">URAIAN</th>
                            <th scope="col" class="text-center">SATUAN</th>
                            <th scope="col" class="text-center">NILAI</th>
                            <th scope="col" class="text-center">SUMBER DATA</th>
                            <th scope="col" class="text-center">PENJELASAN</th>
                            <th scope="col" class="text-center" width="15%">AKSI</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $no = 1;
                            $hi = $conn->query("SELECT * from variabel");
                            while($row = $hi->fetch_assoc()){
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $no++, ") ";?></td>
                            <td colspan="6" ><?php echo $row['nama_variabel']; ?></td>
                            <tr>
                                <?php 
                                $no1=1;
                                $a= $row['id_variabel']; 
                                $hi4 = $conn->query("SELECT * from indikator where id_variabel = $a order by id_variabel");
                                while($row3 = $hi4->fetch_assoc()){
                                ?>
                                <td class="text-center"><?php echo $no-1, ".", $no1++, ") ";?></td>
                                <td colspan="6"><?php echo $row3['nama_indikator']; ?></td>
                                <tr>
                                <?php 
                                    $no2=1;
                                    $z= $row3['id_indikator']; 
                                    $zonk = "Belum Diisi";
                                    $hi45 = $conn->query("SELECT * FROM kecamatan order by kecamatan.id_kecamatan");
                                    while($row34 = $hi45->fetch_assoc()){
                                        $c= $row34['id_kecamatan']; 
                                        $mi4 = $conn->query("SELECT * FROM `nilai_sub` join sumber_data on sumber_data.id_sumber_data=nilai_sub.id_sumber_data 
                                                        join indikator on indikator.id_indikator=nilai_sub.id_indikator join satuan on satuan.id_satuan=indikator.id_satuan 
                                                        where id_kecamatan=$c and nilai_sub.id_kegiatan = $id_kegiatan and nilai_sub.id_indikator = $z");
                                        if($mi4->num_rows == 1){
                                ?>
                                        <td class="text-center"><?php echo $no-1,".",$no1-1, ".",$no2++, ") ";?></td>
                                        <td><?php echo "Kecamatan ",$row34['kecamatan']; ?></td>
                                <?php
                                    }else{
                                ?> 
                                        <td class="text-center"><?php echo $no-1,".",$no1-1, ".",$no2++, ") ";?></td>
                                        <td><?php echo "Kecamatan ",$row34['kecamatan']; ?></td>
                                        <td class="text-center"><?php if($mi4->num_rows == 1){echo $row3['satuan'];}else{echo $zonk;}?></td>
                                        <td class="text-center"><?php if($mi4->num_rows == 1){echo $row3['nilai'];}else{echo $zonk;}?></td>
                                        <td class="text-center"><?php if($mi4->num_rows == 1){echo $row3['sumber_data'];}else{echo $zonk;}?></td>
                                        <td class="text-center"><?php if($mi4->num_rows == 1){echo $row3['penjelasan'];}else{echo $zonk;}?></td>  
                                        <td class="text-center" width="15%">
                                        <form method="POST" action="">
                                            <input type="hidden" name="aksi" value="hapus">
                                            <input type="hidden" name="id_indikator" value="<?php echo $z;?>">
                                            <input type="hidden" name="id_kegiatan" value="<?php echo $id_kegiatan;?>">
                                            <input type="hidden" name="id_kecamatan" value="<?php echo $row34['id_kecamatan'];?>">
                                            <a role="button" href="variabel_indikator_kelola.php?id_kegiatan=<?php echo $id_kegiatan;?>&&id_indikator=<?php echo $z?>&&id_kecamatan=<?php echo $row34['id_kecamatan'];?>" class="btn btn-outline-primary btn-sm bi bi-pen">
                                            </a> &nbsp;
                                            <button class="btn btn-outline-danger btn-sm" type="submit" name="delete" onclick="return confirm('Anda yakin akan menghapus data ini?')">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 14 15">
                                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                                </svg>
                                            </button> 
                                        </form>
                                        </td>
                                <?php
                                    }
                                    $mi = $conn->query("SELECT * FROM `nilai_sub` join sumber_data on sumber_data.id_sumber_data=nilai_sub.id_sumber_data 
                                                        join indikator on indikator.id_indikator=nilai_sub.id_indikator join satuan on satuan.id_satuan=indikator.id_satuan 
                                                        where id_kecamatan=$c and nilai_sub.id_kegiatan = $id_kegiatan and nilai_sub.id_indikator = $z");
                                    while($row3 = $mi->fetch_assoc()){
                                ?>
                                        <td class="text-center"><?php echo $row3['satuan'];?></td>
                                        <td class="text-center"><?php 
                                            if($row3['sumber_data'] == "Tidak Tersedia"){
                                                echo "N/A";
                                            }else{
                                                echo $row3['nilai'];
                                            }?>
                                        </td>
                                        <td class="text-center"><?php echo $row3['sumber_data'];?></td>
                                        <td class="text-center"><?php echo $row3['penjelasan'];?></td>  
                                        <td class="text-center">
                                        <form method="POST" action="">
                                            <input type="hidden" name="aksi" value="hapus">
                                            <input type="hidden" name="id_indikator" value="<?php echo $z;?>">
                                            <input type="hidden" name="id_kegiatan" value="<?php echo $id_kegiatan;?>">
                                            <input type="hidden" name="id_kecamatan" value="<?php echo $row34['id_kecamatan'];?>">
                                            <input type="hidden" name="nilai" value="<?php echo $row3['nilai'];?>">
                                            <a role="button" href="variabel_indikator_kelola.php?nilai=<?php echo $row3['nilai'];?>&&id_kegiatan=<?php echo $id_kegiatan;?>&&id_indikator=<?php echo $z?>&&id_kecamatan=<?php echo $row34['id_kecamatan'];?>" class="btn btn-outline-primary btn-sm bi bi-pen">
                                            </a> &nbsp;
                                            <button class="btn btn-outline-danger btn-sm bi bi-trash" type="submit" name="delete" onclick="return confirm('Anda yakin akan menghapus data ini?')">
                                            </button> 
                                        </form>
                                        </td>
                                <?php } ?>
                                </tr>                          
                            </tr>
                            <?php } ?>
                            <?php } ?>
                        </tr>
                        <?php } ?>
                        </tbody>
                        </table>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-warning w-100"><a href="../kegiatan/kegiatan_detail.php?id_kegiatan=<?php echo $id_kegiatan?>" style="color:black; text-decoration:none;">Kembali</a></button>
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