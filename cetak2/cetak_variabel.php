<?php
    include "../konfigurasi/koneksi.php";
    $id_kegiatan = $_REQUEST['id_kegiatan'];

    if(!$hasils = $conn->query("SELECT * FROM kegiatan join penyelenggara on kegiatan.id_penyelenggara=penyelenggara.id_penyelenggara where kegiatan.id_kegiatan=$id_kegiatan")){
        die("gagal meminta data");
    }

    while($data = $hasils->fetch_assoc()){
      $judul = $data['judul_kegiatan'];
      $kode_kegiatan = $data['kode_kegiatan'];
      $unit_kerja = $data['unit_kerja'];
      $eselon1 = $data['eselon1'];
      $eselon2 = $data['eselon2'];
      $eselon3 = $data['eselon3'];
    }

    if(!$hasil = $conn->query("SELECT * FROM `variabel` join indikator on variabel.id_variabel=indikator.id_variabel join nilai_sub on 
                              nilai_sub.id_indikator=indikator.id_indikator where nilai_sub.id_kegiatan=$id_kegiatan GROUP by variabel.id_variabel")){
        die("gagal meminta data");
    }
    $no = 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Cetak Metadata Variabel</title>
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
  <style>
    .a{
      border: 2px solid black;
      padding: 10px;
    }
    .judul{
      text-align : center;
    }
  </style>

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body"><br>
              <p class="text-center">METADATA STATISTIK VARIABEL</p>
              <p class="text-center" style="border: 2px solid black; padding: 5px;">Keterangan Kegiatan Statistik</p>
              <table class="col-lg-12" style="border: 2px solid black; padding: 5px;">
                <tr>
                  <td class="text-center" style="border: 2px solid black; padding: 5px;" rowspan="2"> Nama Kegiatan</td>
                  <td style="border: 2px solid black; padding: 5px;" rowspan="2"><?php echo $judul?></td>
                  <td class="text-center" style="border: 2px solid black; padding: 5px;" rowspan="4">Penyelenggara</td>
                  <td>Unit Kerja</td> <td>:</td> <td><?php echo $unit_kerja?></td>
                </tr>
                <tr>
                  <td>Eselon 1</td> <td>:</td> <td><?php echo $eselon1?></td>
                </tr>
                <tr>
                  <td class="text-center" style="border: 2px solid black; padding: 5px;" rowspan="2"> Kode Kegiatan</td>
                  <td style="border: 2px solid black; padding: 5px;" rowspan="2"><?php echo $kode_kegiatan?></td>
                  <td>Eselon 2</td> <td>:</td> <td><?php echo $eselon2?></td>
                </tr>
                <tr>
                  <td>Eselon 3</td> <td>:</td> <td><?php echo $eselon3?></td>
                </tr>
              </table><br>
              <!-- Table with stripped rows -->
              <table border="2" class="col-lg-12">
                <thead style="border: 2px solid black; padding: 5px;">
                  <tr class="judul">
                    <th class="a">No.</th>
                    <th class="a">Nama Variabel</th>
                    <th class="a">Alias</th>
                    <th class="a">Konsep</th>
                    <th class="a">Definisi</th>
                    <th class="a">Referensi Pemilihan</th>
                    <th class="a">Referensi Waktu</th>
                    <th class="a">Tipe Data</th>
                    <th class="a">Domain Value</th>
                    <th class="a">Aturan Validasi</th>
                    <th class="a">Kelimat Pertanyaan</th>
                    <th class="a">Confidentional Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                      while($row = $hasil->fetch_assoc()){
                        if($row['id_diakses_umum'] == 1){
                          $status = "Public";
                        }else{
                          $status = "Private";
                        }
                  ?>
                  <tr>
                    <th class="a"><?php echo $no++;?></th>
                    <td class="a"><?php echo $row['nama_variabel']; ?></td>
                    <td class="a"><?php echo $row['alias']; ?></td>
                    <td class="a"><?php echo $row['konsep']; ?></td>
                    <td class="a"><?php echo $row['definisi']; ?></td>
                    <td class="a"><?php echo $row['referensi_pemilihan']; ?></td>
                    <td class="a"><?php echo $row['referensi_waktu']; ?></td>
                    <td class="a"><?php echo $row['tipe_data']; ?></td>
                    <td class="a"><?php echo $row['domain_value']; ?></td>
                    <td class="a"><?php echo $row['aturan_validasi']; ?></td>
                    <td class="a"><?php echo $row['kalimat_pertanyaan']; ?></td>
                    <td class="a"><?php echo $status ?></td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
            </div>
          </div>

          </div>
            <script>
                window.print();
            </script>
          </div>

        </div>
      </div>
    </section>

</body>

</html>