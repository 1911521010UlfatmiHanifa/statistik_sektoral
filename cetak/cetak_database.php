<?php
    include "../konfigurasi/session.php";
    $id_kegiatan=$_REQUEST['id_kegiatan'];
    if(!$hasils = $conn->query("SELECT tahun FROM kegiatan where kegiatan.id_kegiatan=$id_kegiatan")){
        die("gagal meminta data");
    }

    while($data = $hasils->fetch_assoc()){
        $tahun = $data['tahun'];
    }

    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Database Sektoral Dinkes Tahun ".$tahun.".xls");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Cetak Database Sektoral</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <style>
      tr{
          border: 1px solid black;
          padding: 4px;
      }
  </style>
</head>

<body>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                <br>
                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                    <div class="row">
                    <div class="col-12">
                    <table class="table table-hover col-md-10 mx-1">
                        <caption>D A T A - I N D I K A T O R - D A N - V A R I A B E L - T A H U N - <?php echo $tahun?></caption>
                        <thead>
                        <tr>
                            <th scope="col" class="text-center" width="5%">NO.</th>
                            <th scope="col" class="text-center">URAIAN</th>
                            <th scope="col" class="text-center">SATUAN</th>
                            <th scope="col" class="text-center">NILAI</th>
                            <th scope="col" class="text-center">SUMBER DATA</th>
                            <th scope="col" class="text-center">PENJELASAN</th>
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
                            <td colspan="5" ><?php echo $row['nama_variabel']; ?></td>
                            <tr>
                              <?php 
                                $no1=1;
                                $a= $row['id_variabel']; 
                                $hi4 = $conn->query("SELECT * from indikator where id_variabel = $a order by id_variabel");
                                while($row3 = $hi4->fetch_assoc()){
                              ?>
                              <td class="text-center"><?php echo $no-1, ".", $no1++, ") ";?></td>
                              <td colspan="5"><?php echo $row3['nama_indikator']; ?></td>
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
                                                                    }
                                                                ?>
                                        </td>
                                        <td class="text-center"><?php echo $row3['sumber_data'];?></td>
                                        <td class="text-center"><?php echo $row3['penjelasan'];?></td> 
                                <?php } ?>
                                </tr>                          
                            </tr>
                            <?php } ?>
                            <?php } ?>
                        </tr>
                        <?php } ?>
                        </tbody>
                      </table>
                    </div>
              </div>
            </div>
          </div>
      </div>
    </section>

  </main><!-- End #main -->

</body>

</html>