<?php
    include "../konfigurasi/session.php";
    $id_kegiatan=$_REQUEST['id_kegiatan'];

    if(!$que = $conn->query("SELECT a.judul_kegiatan as judul, a.tahun as tahun, a.kode_kegiatan as kode_kegiatan, a.latar_belakang as latar_belakang, a.tujuan as tujuan, 
    cara_pengumpulan_data.cara_pengumpulan as cara_pengumpulan, sektor_kegiatan.sektor as sektor, 
    b.status as status_rekomen, penyelenggara.unit_kerja as unit_kerja, penyelenggara.alamat as alamat, 
    penyelenggara.telepon as telepon, penyelenggara.email as email, penyelenggara.faksimile as faksimile, 
    penyelenggara.eselon1 as eselon1, penyelenggara.eselon2 as eselon2, penyelenggara.eselon3 as eselon3, 
    perulangan.perulangan as perulangan, frekuensi.frekuensi as frekuensi, 
    tipe_pengumpulan_data.tipe_pengumpulan as tipe_pengumpulan, 
    cakupan_wilayah.cakupan_wilayah as cakupan_wilayah, a.provinsi as provinsi, a.kabkot as kabkot, 
    sarana_pengumpulan_data.sarana_pengumpulan as sarana_kumpul, unit_pengumpulan.unit_pengumpulan as unit_kumpul, 
    jenis_rancangan_sampel.jenis_rancangan as jenis_rancangan, metode_pemilihan_sampel.metode_pemilihan as metode_pemilihan, 
    detail_metode_sampel.metode_sampel as metode_sampel, 
    kerangka_sampel.kerangka_sampel as kerangka_sampel, a.fraksi_sampel as fraksi_sampel, 
    a.perkiraan_sampling as perkiraan_sampling, unit_sampel.unit_sampel AS unit_sampel,
    unit_observasi.unit_observasi AS unit_observasi, c.`status` AS uji_coba, metode_pemeriksaan.metode_pemeriksaan
    AS metode_pemeriksaan, d.`status` AS penyesuaian, petugas_pengumpulan_data.petugas_pengumpulan AS petugas_pengumpulan,
    persyaratan_pendidikan.pendidikan AS pendidikan, e.`status` AS pelatihan, metode_analisis.metode_analisis
    AS metode_analisis, unit_analisis.unit_analisis AS unit_analisis from kegiatan as a join cara_pengumpulan_data 
    on a.id_cara_pengumpulan=cara_pengumpulan_data.id_cara_pengumpulan join sektor_kegiatan ON 
    a.id_sektor=sektor_kegiatan.id_sektor join status as b on b.id_status=a.id_status_rekomen 
    join penyelenggara on a.id_penyelenggara=penyelenggara.id_penyelenggara join perulangan 
    on a.id_perulangan=perulangan.id_perulangan join frekuensi on a.id_frekuensi=frekuensi.id_frekuensi 
    join tipe_pengumpulan_data on a.id_tipe_pengumpulan=tipe_pengumpulan_data.id_tipe_pengumpulan 
    join cakupan_wilayah on a.id_cakupan_wilayah=cakupan_wilayah.id_cakupan_wilayah JOIN 
    sarana_pengumpulan_data on a.id_sarana_pengumpulan=sarana_pengumpulan_data.id_sarana_pengumpulan 
    join unit_pengumpulan on a.id_unit_pengumpulan=unit_pengumpulan.id_unit_pengumpulan 
    join jenis_rancangan_sampel on a.id_jenis_rancangan=jenis_rancangan_sampel.id_jenis_rancangan join metode_sampel_pilih on a.id_kegiatan=
    metode_sampel_pilih.id_kegiatan join detail_metode_sampel on detail_metode_sampel.id_detail_metode=
    metode_sampel_pilih.id_detail_metode join metode_pemilihan_sampel on metode_pemilihan_sampel.id_metode_pemilihan=detail_metode_sampel.id_metode_pemilihan
    join kerangka_sampel on kerangka_sampel.id_kerangka_sampel=
    a.id_kerangka_sampel join unit_sampel ON a.id_unit_sampel=unit_sampel.id_unit_sampel JOIN unit_observasi
    ON a.id_unit_observasi=unit_observasi.id_unit_observasi join status AS c ON a.id_status_uji_coba=
    c.id_status JOIN metode_pemeriksaan ON a.id_metode_pemeriksaan=metode_pemeriksaan.id_metode_pemeriksaan
    join status AS d ON a.id_status_penyesuaian=d.id_status JOIN petugas_pengumpulan_data ON a.id_petugas_pengumpulan
    =petugas_pengumpulan_data.id_petugas_pengumpulan JOIN persyaratan_pendidikan ON a.id_pendidikan=
    persyaratan_pendidikan.id_pendidikan JOIN status AS e ON a.id_status_pelatihan=e.id_status
    JOIN metode_analisis ON a.id_metode_analisis=metode_analisis.id_metode_analisis JOIN unit_analisis ON
    a.id_unit_analisis=unit_analisis.id_unit_analisis where a.id_kegiatan=$id_kegiatan")){
        die("gagal meminta data");
    }

    while($data = $que->fetch_assoc()){
      $judul = $data['judul'];
      $latar_belakang = $data['latar_belakang'];
      $tujuan = $data['tujuan'];
      $kode_kegiatan = $data['kode_kegiatan'];
      $cara_pengumpulan = $data['cara_pengumpulan'];
      $rekomendasi = $data['status_rekomen'];
      $tahun = $data['tahun'];
      $sektor = $data['sektor'];
      $status_rekomen = $data['status_rekomen'];
      $unit_kerja = $data['unit_kerja'];
      $alamat = $data['alamat'];
      $telepon = $data['telepon'];
      $email = $data['email'];
      $faksimile = $data['faksimile'];
      $eselon1 = $data['eselon1'];
      $eselon2 = $data['eselon2'];
      $eselon3 = $data['eselon3'];
      $perulangan = $data['perulangan'];
      $frekuensi = $data['frekuensi'];
      $tipe_pengumpulan = $data['tipe_pengumpulan'];
      $cakupan_wilayah = $data['cakupan_wilayah'];
      $provinsi = $data['provinsi'];
      $kabkot = $data['kabkot'];
      $sarana_kumpul = $data['sarana_kumpul'];
      $unit_kumpul = $data['unit_kumpul'];
      $jenis_rancangan = $data['jenis_rancangan']; 
      $fraksi_sampel =$data['fraksi_sampel'];
      $kerangka_sampel = $data['kerangka_sampel'];
      $perkiraan_sampling =$data['perkiraan_sampling'];
      $unit_sampel = $data['unit_sampel'];
      $unit_observasi= $data['unit_observasi'];
      $uji_coba = $data['uji_coba'];
      $metode_pemeriksaan = $data['metode_pemeriksaan'];
      $penyesuaian = $data['penyesuaian'];
      $petugas_pengumpulan = $data['petugas_pengumpulan'];
      $pendidikan = $data['pendidikan'];
      $pelatihan = $data['pelatihan'];
      $unit_analisis = $data['unit_analisis'];
      $metode_analisis = $data['metode_analisis'];
      $metode_pemilihan = $data['metode_pemilihan'];
      $metode_sampel = $data['metode_sampel'];
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="widtd=device-widtd, initial-scale=1.0" name="viewport">

  <title>Cetak Metadata Kegiatan</title>
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
    .c{
        border-top : 2px solid black;
        border-bottom: 0px;  
    }
    tr{
      border: 2px solid black;
      padding: 4px;
    }
    th,td{
        padding: 5px;
    }
    .n{
        border: 0px;  
    }
  </style>

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Autdor: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body"><br>
              <!-- Table witd stripped rows -->
              <table border="2" class="col-lg-12" style="border: 2px solid black; padding: 5px;">
                <thead>
                  <tr>
                      <th colspan="3" class="text-center">METADATA STATISTIK KEGIATAN</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                        <td width="50%">Tahun Kegiatan</td>
                        <td>:</td>
                        <td><?php echo $tahun?></td>
                    </tr>
                    <tr>
                        <td>Judul Kegiatan</td>
                        <td>:</td>
                        <td><?php echo $judul?></td>
                    </tr>
                    <tr>
                        <td>Cara Pengumpulan Data</td>
                        <td>:</td>
                        <td><?php echo $cara_pengumpulan?></td>
                    </tr>
                    <tr>
                        <td>Sektor Kegiatan</td>
                        <td>:</td>
                        <td><?php echo $sektor?></td>
                    </tr>
                    <tr>
                        <td>Jika Survey Statistik Sektoral, Apakah Mendapat Rekomendasi Kegiatan Statistik dari BPS?</td>
                        <td>:</td>
                        <td><?php echo $status_rekomen?></td>
                    </tr>
                </tbody>
              </table> <br>
              <!-- End Table witd stripped rows -->

              <!-- Table witd stripped rows -->
              <table border="2" class="col-lg-12" style="border: 2px solid black; padding: 5px;">
                <thead>
                  <tr>
                      <th colspan="4" class="text-center">I. PENYELENGGARA</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                        <td width="5%">1.1</td>
                        <td width="50%">Instansi Penyelenggara</td>
                        <td>:</td>
                        <td><?php echo $unit_kerja?></td>
                    </tr>
                    <tr class="n">
                        <td width="5%">1.2</td>
                        <td width="50%">Alamat Instansi Penyelenggara</td>
                        <td>:</td>
                        <td><?php echo $alamat?></td>
                    </tr>
                    <tr class="n">
                        <td width="5%"></td>
                        <td width="50%">Telepon</td>
                        <td>:</td>
                        <td><?php echo $telepon?></td>
                    </tr>
                    <tr class="n">
                        <td width="5%"></td>
                        <td width="50%">Email</td>
                        <td>:</td>
                        <td><?php echo $email?></td>
                    </tr>
                    <tr class="n">
                        <td width="5%"></td>
                        <td width="50%">Faksimile</td>
                        <td>:</td>
                        <td><?php echo $faksimile?></td>
                    </tr>
                    <tr>
                      <th colspan="4" class="text-center">II. PENANGGUNG JAWAB</th>
                    </tr>
                    <tr class="n">
                        <td width="5%">2.1</td>
                        <td colspan="3">Unit Eselon Penanggung Jawab</td>
                    </tr>
                    <tr class="n">
                        <td width="5%"></td>
                        <td width="50%">Eselon 1</td>
                        <td>:</td>
                        <td><?php echo $eselon1?></td>
                    </tr>
                    <tr class="n">
                        <td width="5%"></td>
                        <td width="50%">Eselon 2</td>
                        <td>:</td>
                        <td><?php echo $eselon2?></td>
                    </tr>
                    <tr class="c">
                        <td width="5%">2.2</td>
                        <td colspan="3">Penanggung Jawab Teknis (Setingkat Eselon 3)</td>
                    </tr>
                    <tr class="n">
                        <td width="5%"></td>
                        <td width="50%">Jabatan</td>
                        <td>:</td>
                        <td><?php echo $eselon3?></td>
                    </tr>
                    <tr>
                      <th colspan="4" class="text-center">III. PERENCANAAN DAN PERSIAPAN</th>
                    </tr>
                    <tr class="n">
                        <td width="5%">3.1</td>
                        <td width="50%">Latar Belakang Kegiatan</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <tr class="n">
                        <td width="5%"></td>
                        <td colspan="3"><?php echo $latar_belakang?></td>
                    </tr>
                    <tr>
                        <td width="5%">3.2</td>
                        <td>Tujuan Kegiatan</td>
                        <td>:</td>
                        <td><?php echo $tujuan?></td>
                    </tr>
                    <tr>
                        <td width="5%">3.3</td>
                        <td>Rencana Jadwal Kegiatan</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                </tbody>
              </table>
              <table border="2" class="col-lg-12" style="border: 2px solid black; padding: 5px;">
                <thead>
                <tr>
                    <th scope="col" class="text-center" width="5%">No.</th>
                    <th scope="col" class="text-center">Uraian</th>
                    <th scope="col" class="text-center">Waktu Mulai</th>
                    <th scope="col" class="text-center" style="border-right: 2px solid black">Waktu Selesai</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    $no=1;
                    $hi = $conn->query("SELECT * from jadwal");
                    while($row = $hi->fetch_assoc()){
                ?>
                <tr>
                    <th class="text-center"><?php echo $no++, "."; ?></th>
                    <td colspan="4"><?php echo $row['jadwal']; ?></td>
                    <tr>
                      <?php 
                        $noo = 1;
                        $a= $row['id_jadwal']; 
                        $hi4 = $conn->query("SELECT nama_sub, day(tanggal_mulai) as tanggal1, day(tanggal_selesai)
                                          as tanggal2, monthname(tanggal_mulai) as bulan1, monthname(tanggal_selesai) as 
                                          bulan2, year(tanggal_mulai) as tahun1, year(tanggal_selesai) as tahun2, sub_jadwal.id_sub_jadwal as id_sub_jadwal
                                          FROM detail_jadwal_pilih join sub_jadwal 
                                          on sub_jadwal.id_sub_jadwal=detail_jadwal_pilih.id_sub_jadwal where 
                                          sub_jadwal.id_jadwal= $a and id_kegiatan= $id_kegiatan order by sub_jadwal.id_sub_jadwal");
                        while($row3 = $hi4->fetch_assoc()){
                      ?>
                      <th class="text-center"><?php echo $no-1, ".", $noo++, "."; ?></th>
                      <td><?php echo $row3['nama_sub']; ?></td>
                      <td class="text-center"><?php echo $row3['tanggal1'], "-", $row3['bulan1'], "-", $row3['tahun1']; ?></td>                  
                      <td class="text-center" style="border-right: 2px solid black"><?php echo $row3['tanggal2'], "-", $row3['bulan2'], "-", $row3['tahun2']; ?></td>                  
                    </tr>
                    <?php } ?>
                </tr>
                <?php } ?>
                </tbody>
              </table>
              <table border="2" class="col-lg-12" style="border: 2px solid black; padding: 5px;">
                <tbody>
                    <tr>
                        <td width="5%">3.4</td>
                        <td colspan="4">Variabel (Karakteristik) yang Dikumpulkan :</td>
                    </tr>
                      <tr>
                          <th scope="col" class="text-center" width="5%">NO.</th>
                          <th scope="col" class="text-center">NAMA VARIABEL</th>
                          <th scope="col" class="text-center">KONSEP</th>
                          <th scope="col" class="text-center">DEFINISI</th>
                          <th scope="col" class="text-center" width="10%">REFERENSI WAKTU</th>
                      </tr>
                      <?php 
                            $no = 1;
                            $hi = $conn->query("SELECT * from variabel");
                            while($row = $hi->fetch_assoc()){
                        ?>
                        <tr>
                            <th class="text-center"><?php echo $no++, ") ";?></th>
                            <td><?php echo $row['nama_variabel']; ?></td>
                            <td><?php echo $row['konsep']; ?></td>
                            <td></td>
                            <td></td>
                            <tr>
                              <?php 
                                $no1=1;
                                $a= $row['id_variabel']; 
                                $hi4 = $conn->query("SELECT * from indikator where id_variabel = $a order by id_variabel");
                                while($row3 = $hi4->fetch_assoc()){
                              ?>
                                <th class="text-center"><?php echo $no-1,".",$no1++, ") ";?></th>
                                <td><?php echo $row3['nama_indikator']; ?></td>
                                <td><?php echo $row3['konsep'];?></td>
                                <td><?php echo $row3['definisi'];?></td>
                                <td><?php echo $row['referensi_waktu'];?></td>                  
                            </tr>
                            <?php } ?>
                            <?php } ?>
                        </tr>
                </tbody>
              </table>
              <table border="2" class="col-lg-12" style="border: 2px solid black; padding: 5px;">
                <thead>
                  <tr>
                      <th colspan="4" class="text-center">IV. DESAIN KEGIATAN</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                        <td width="5%">4.1</td>
                        <td width="50%">Kegiatan Dilakukan</td>
                        <td>:</td>
                        <td><?php echo $perulangan?></td>
                    </tr>
                    <tr>
                        <td width="5%">4.2</td>
                        <td width="50%">Frekuensi Perulangan</td>
                        <td>:</td>
                        <td>
                          <?php if($perulangan == "Berulang"){
                                    echo $frekuensi;
                                }else{
                                    echo "-"; 
                                }?>
                        </td>
                    </tr>
                    <tr>
                        <td width="5%">4.3</td>
                        <td width="50%">Tipe Pengumpulan Data</td>
                        <td>:</td>
                        <td><?php echo $tipe_pengumpulan?></td>
                    </tr>
                    <tr>
                        <td width="5%">4.4</td>
                        <td width="50%">Cakupan Wilayah Pengumpulan Data</td>
                        <td>:</td>
                        <td><?php echo $cakupan_wilayah?></td>
                    </tr>
                    <tr class="n">
                        <td width="5%">4.5</td>
                        <td width="50%" colspan="3">Jika di Sebagian Wilayah Indonesia</td>
                    </tr>
                    <tr class="n">
                        <td width="5%"></td>
                        <td width="50%">Provinsi</td>
                        <td>:</td>
                        <td>
                          <?php if($cakupan_wilayah == "Seluruh Wilayah Indonesia"){
                                    echo $provinsi;
                                }else{
                                    echo "-"; 
                                }?>
                        </td>
                    </tr>
                    <tr class="n">
                        <td width="5%"></td>
                        <td width="50%">Kabupaten / Kota</td>
                        <td>:</td>
                        <td>
                          <?php if($cakupan_wilayah == "Seluruh Wilayah Indonesia"){
                                    echo $kabkot;
                                }else{
                                    echo "-"; 
                                }?>
                        </td>
                    </tr>
                    <tr>
                        <td width="5%">4.6</td>
                        <td width="50%" colspan="3">Metode Pengumpulan Data</td>
                    </tr>
                    <tr>
                        <th class="text-center" width="5%">NO.</th>
                        <th width="50%" colspan="3" class="text-center" >Metode Pengumpulan Data</th>
                    </tr>
                    <?php 
                        $no = 1;
                        $hi = $conn->query("SELECT * from metode_pengumpulan_data join detail_metode_pengumpulan on metode_pengumpulan_data.id_metode_pengumpulan=
                                            detail_metode_pengumpulan.id_metode_pengumpulan where id_kegiatan=$id_kegiatan");
                        while($row = $hi->fetch_assoc()){
                    ?>
                    <tr>
                        <th class="text-center"><?php echo $no++, "."; ?></th>
                        <td class="text-center" colspan="3"><?php echo $row['metode_pengumpulan']; ?></td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <td width="5%">4.7</td>
                        <td width="50%">Sarana Pengumpulan Data</td>
                        <td>:</td>
                        <td><?php echo $sarana_kumpul?></td>
                    </tr>
                    <tr>
                        <td width="5%">4.8</td>
                        <td width="50%">Unit Pengumpulan Data</td>
                        <td>:</td>
                        <td><?php echo $unit_kumpul?></td>
                    </tr>
                    <tr>
                      <th colspan="4" class="text-center">V. DESAIN SAMPEL</th>
                    </tr>
                    <tr>
                        <td width="5%">5.1</td>
                        <td width="50%">Jenis Rancangan Sampel</td>
                        <td>:</td>
                        <td><?php echo $jenis_rancangan?></td>
                    </tr>
                    <tr>
                        <td width="5%">5.2</td>
                        <td width="50%">Metode Pemilihan Sampel</td>
                        <td>:</td>
                        <td><?php echo $metode_pemilihan?></td>
                    </tr>
                    <tr>
                        <td width="5%">5.3</td>
                        <td width="50%">Nama Metode Pemilihan Sampel</td>
                        <td>:</td>
                        <td><?php echo $metode_sampel?></td>
                    </tr>
                    <tr>
                        <td width="5%">5.4</td>
                        <td width="50%">Kerangka Sampel Sampai Tahap Akhir</td>
                        <td>:</td>
                        <td><?php echo $kerangka_sampel?></td>
                    </tr>
                    <tr>
                        <td width="5%">5.5</td>
                        <td width="50%">Fraksi Sampel Keseluruhan</td>
                        <td>:</td>
                        <td><?php echo $fraksi_sampel?></td>
                    </tr>
                    <tr>
                        <td width="5%">5.6</td>
                        <td width="50%">Nilai Perkiraan Sampling Error Variabel Utama</td>
                        <td>:</td>
                        <td><?php echo $perkiraan_sampling?></td>
                    </tr>
                    <tr>
                        <td width="5%">5.7</td>
                        <td width="50%">Unit Sampel</td>
                        <td>:</td>
                        <td><?php echo $unit_sampel?></td>
                    </tr>
                    <tr>
                        <td width="5%">5.8</td>
                        <td width="50%">Unit Observasi</td>
                        <td>:</td>
                        <td><?php echo $unit_observasi?></td>
                    </tr>
                    <tr>
                      <th colspan="4" class="text-center">VI. PENJAMINAN KUALITAS</th>
                    </tr>
                    <tr>
                        <td width="5%">6.1</td>
                        <td width="50%">Apakah Melakukan Uji Coba (Pilot Survey)?</td>
                        <td>:</td>
                        <td><?php echo $uji_coba?></td>
                    </tr>
                    <tr>
                        <td width="5%">6.2</td>
                        <td width="50%">Metode Pemeriksaan Kualitas Pengumpulan Data?</td>
                        <td>:</td>
                        <td><?php echo $metode_pemeriksaan?></td>
                    </tr>
                    <tr>
                        <td width="5%">6.3</td>
                        <td width="50%">Apakah Melakukan Penyesuaian Nonresponden?</td>
                        <td>:</td>
                        <td><?php echo $penyesuaian?></td>
                    </tr>
                    <tr>
                        <td width="5%">6.4</td>
                        <td width="50%">Petugas Pengumpulan Data?</td>
                        <td>:</td>
                        <td><?php echo $petugas_pengumpulan?></td>
                    </tr>
                    <tr>
                        <td width="5%">6.5</td>
                        <td width="50%">Persyaratan Pendidikan Petugas Pengumpulan Data?</td>
                        <td>:</td>
                        <td><?php echo $pendidikan?></td>
                    </tr>
                    <tr>
                        <td width="5%">6.6</td>
                        <td width="50%" colspan="3">Jumlah Petugas</td>
                    </tr>
                    <tr>
                        <th class="text-center" width="5%">NO.</th>
                        <th width="50%" colspan="2" class="text-center">Tipe Petugas</th>
                        <th class="text-center">Jumlah</th>
                    </tr>
                    <?php 
                      $no = 1;
                      $hi = $conn->query("SELECT * from jumlah_petugas join detail_jumlah_petugas on jumlah_petugas.id_jumlah_petugas=
                                          detail_jumlah_petugas.id_jumlah_petugas where id_kegiatan=$id_kegiatan");
                      while($row = $hi->fetch_assoc()){
                    ?>
                    <tr class="text-center">
                        <th><?php echo $no++; ?></th>
                        <td colspan="2"><?php echo $row['jumlah_petugas']; ?></td>
                        <td><?php echo $row['jumlah']; ?></td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <td width="5%">6.7</td>
                        <td width="50%">Apakah Melakukan Pelatihan Petugas</td>
                        <td>:</td>
                        <td><?php echo $pelatihan?></td>
                    </tr>
                    <tr>
                      <th colspan="4" class="text-center">VII. PENGOLAHAN DAN ANALISIS</th>
                    </tr>
                    <tr>
                        <td width="5%">7.1</td>
                        <td width="50%" colspan="3">Tahapan Pengolahan Data</td>
                    </tr>
                    <tr>
                        <th class="text-center" width="5%">NO.</th>
                        <th width="50%" colspan="2" class="text-center">Tahapan Pengolahan</th>
                        <th class="text-center">Status</th>
                    </tr>
                    <?php 
                      $no = 1;
                      $hi = $conn->query("SELECT * from metode_pengolahan join detail_metode_pengolahan on metode_pengolahan.id_metode_pengolahan=
                                          detail_metode_pengolahan.id_metode_pengolahan join status on status.id_status=detail_metode_pengolahan.id_status where id_kegiatan=$id_kegiatan");
                      while($row = $hi->fetch_assoc()){
                    ?>
                    <tr class="text-center">
                        <th><?php echo $no++; ?></th>
                        <td colspan="2"><?php echo $row['metode_pengolahan']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <td width="5%">7.2</td>
                        <td width="50%">Metode Analisis</td>
                        <td>:</td>
                        <td><?php echo $metode_analisis?></td>
                    </tr>
                    <tr>
                        <td width="5%">7.3</td>
                        <td width="50%">Unit Analisis</td>
                        <td>:</td>
                        <td><?php echo $unit_analisis?></td>
                    </tr>
                    <tr>
                        <td width="5%">7.4</td>
                        <td width="50%" colspan="3">Tingkat Penyajian Hasil Analsis</td>
                    </tr>
                    <tr class="text-center" >
                        <th width="5%">NO.</th>
                        <th width="50%" colspan="3">Tingkat Penyajian Data</th>
                    </tr>
                    <?php 
                      $no = 1;
                      $hi = $conn->query("SELECT * from tingkat_penyajian join detail_tingkat_penyajian on tingkat_penyajian.id_tingkat_penyajian=
                                          detail_tingkat_penyajian.id_tingkat_penyajian where id_kegiatan=$id_kegiatan");
                      while($row = $hi->fetch_assoc()){
                    ?>
                    <tr class="text-center">
                        <th><?php echo $no++; ?></th>
                        <td colspan="3"><?php echo $row['tingkat_penyajian']; ?></td>
                    </tr>
                    <?php } ?>
                    <tr class="text-center judul">
                        <th colspan="4" scope="col">VIII. DISEMINASI HASIL</th>
                    </tr>
                    <tr class="text-center">
                      <th scope="col">No.</th>
                      <th scope="col">Hasil Produk Kegiatan</th>
                      <th scope="col">Status</th>
                      <th scope="col">Waktu Rilis</th>
                  </tr>
                  <?php 
                    $no = 1;
                    $hii = $conn->query("SELECT status, produk_hasil, day(waktu_rilis) as tanggal, monthname(waktu_rilis) as bulan,
                                        year(waktu_rilis) as tahun, produk_hasil.id_produk_hasil as id_produk_hasil from produk_hasil 
                                        join detail_produk_hasil on produk_hasil.id_produk_hasil=
                                        detail_produk_hasil.id_produk_hasil join status on status.id_status=detail_produk_hasil.id_status
                                        where id_kegiatan=$id_kegiatan");
                    while($rowt = $hii->fetch_assoc()){
                  ?>
                  <tr class="text-center">
                      <th><?php echo $no++; ?></th>
                      <td><?php echo $rowt['produk_hasil']; ?></td>
                      <td><?php echo $rowt['status']; ?></td>
                      <td><?php echo $rowt['tanggal'], "-" ,$rowt['bulan'], "-", $rowt['tahun']; ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              <!-- End Table witd stripped rows -->
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