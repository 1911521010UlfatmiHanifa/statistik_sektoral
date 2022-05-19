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
    $no = 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Cetak Metadata Indikaotr</title>
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
              <p class="text-center">METADATA STATISTIK INDIKATOR</p>
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
                    <th class="a" class="a" scope="col" rowspan="2" width="100px"><br>Nama Indikator<br><br><br></th>
                    <th class="a" scope="col" rowspan="2" width="100px"><br><br>Konsep<br><br><br></th>
                    <th class="a" scope="col" rowspan="2"><br><br>Definisi<br><br><br></th>
                    <th class="a" scope="col" rowspan="2"><br><br>Interpretasi<br><br><br></th>
                    <th class="a" scope="col" rowspan="2"><br>Metode Pehitungan<br><br><br></th>
                    <th class="a" scope="col" rowspan="2"><br><br>Ukuran<br><br><br></th>
                    <th class="a" scope="col" rowspan="2"><br><br>Satuan<br><br><br></th>
                    <th class="a" scope="col" rowspan="2"><br><br>Klasifikasi<br><br><br></th>
                    <th class="a" scope="col" rowspan="2"><br>Indikator Komposit<br><br><br></th>
                    <th class="a" scope="col" colspan="2">Indikator Pembangunan</th>
                    <th class="a" scope="col" colspan="3">Variabel Pembangunan</th>
                    <th class="a" scope="col" rowspan="2"><br>Level Estimasi<br><br><br></th>
                    <th class="a" scope="col" rowspan="2"><br>Diakses Umum<br><br><br></th>
                </tr>
                <tr class="judul">
                    <th class="a" scope="col">Publikasi Ketersediaan</th>
                    <th class="a" scope="col">Nama</th>
                    <th class="a" scope="col">Kegiatan Penghasil</th>
                    <th class="a" scope="col">Kode</th>
                    <th class="a" scope="col">Nama</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    $hi = $conn->query("SELECT indikator.id_indikator as id_indikator, nama_indikator, konsep, definisi, interpretasi, metode_perhitungan, level_estimasi, a.status as 
                                        diakses_umum, b.id_status as id_indikator_komposit, b.status as indi, satuan, ukuran, nama_publikasi, url, kode_kegiatan, 
                                        kegiatan_penghasil, nama, klasifikasi FROM `indikator` join status as a on a.id_status=
                                        indikator.id_diakses_umum join status as b on b.id_status=indikator.id_indikator_komposit join satuan on
                                        satuan.id_satuan=indikator.id_satuan join ukuran on ukuran.id_ukuran=indikator.id_ukuran join 
                                        klasifikasi on klasifikasi.id_klasifikasi=indikator.id_klasifikasi left join publikasi_ketersediaan on 
                                        publikasi_ketersediaan.id_publikasi=indikator.id_publikasi left join variabel_pembangunan on 
                                        variabel_pembangunan.id_variabel_pembangunan=indikator.id_variabel_pembangunan join nilai_sub on 
                                        nilai_sub.id_indikator=indikator.id_indikator where nilai_sub.id_kegiatan=$id_kegiatan GROUP by indikator.id_indikator");
                    while($row = $hi->fetch_assoc()){
                ?>
                <tr>
                    <td class="a" width="100px"><?php echo $row['nama_indikator']; ?></td>
                    <td class="a" width="100px"><?php echo $row['konsep']; ?></td>
                    <td class="a"><?php echo $row['definisi']; ?></td>
                    <td class="a"><?php echo $row['interpretasi']; ?></td>
                    <td class="a"><?php echo $row['metode_perhitungan']; ?></td>
                    <td class="a"><?php echo $row['satuan']; ?></td>
                    <td class="a"><?php echo $row['ukuran']; ?></td>
                    <td class="a"><?php echo $row['klasifikasi']; ?></td>
                    <td class="a"><?php echo $row['indi']; ?></td>
                    <?php if ($row['id_indikator_komposit'] == 1){ ?>
                        <td class="a"><?php echo $row['nama_publikasi']; ?></td>
                        <td class="a"><?php echo $row['url']; ?></td>
                        <td class="a">-</td>
                        <td class="a">-</td>
                        <td class="a">-</td>
                    <?php } else if ($row['id_indikator_komposit'] == 2) {?>
                        <td class="a">-</td>
                        <td class="a">-</td>
                        <td class="a"><?php echo $row['kegiatan_penghasil']; ?></td>
                        <td class="a"><?php echo $row['kode_kegiatan']; ?></td>
                        <td class="a"><?php echo $row['nama']; ?></td>
                    <?php } ?>
                    
                    <td class="a"><?php echo $row['level_estimasi']; ?></td>
                    <td class="a"><?php echo $row['diakses_umum']; ?></td>
                    </tr>
                    <?php } ?>
                </tr>
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