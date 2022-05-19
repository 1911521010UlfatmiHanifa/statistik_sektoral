<?php 
  include "session.php";

  $stmt00 = $conn->query("SELECT COUNT(penyelenggara.id_penyelenggara) as jumlah_penyelenggara from penyelenggara");

  while($row = $stmt00->fetch_assoc()){
      $jumlah_penyelenggara = $row['jumlah_penyelenggara'];
  }

  $stmt0 = $conn->query("SELECT COUNT(DISTINCT(variabel.id_variabel)) as jumlah_variabel, COUNT(DISTINCT(indikator.id_indikator)) as jumlah_indikator
                       from variabel join indikator on variabel.id_variabel=indikator.id_variabel;");

  while($row = $stmt0->fetch_assoc()){
      $jumlah_variabel = $row['jumlah_variabel'];
      $jumlah_indikator = $row['jumlah_indikator'];
  }

  $stmt09 = $conn->query("SELECT max(tahun) as tahun from kegiatan");

  while($row = $stmt09->fetch_assoc()){
    $tahun = $row['tahun'];
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard</title>
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
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    var bi = 1;
    var a = 1; 
  </script>

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

<script>
	window.setTimeout("waktu()", 1000);
 
	function waktu() {
		var waktu = new Date();
		setTimeout("waktu()", 1000);
		document.getElementById("jamServer").innerHTML = waktu.getHours()+ ": "+ waktu.getMinutes()+ ":"+ waktu.getSeconds();
	}
</script>

<?php include 'session.php';?>
<!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a class="logo d-flex align-items-center">
      <img src="../dark/logo/logo.png" width="25spx" height="25spx">

      <span class="d-none d-lg-block">Dinkes 50 Kota</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div><!-- End Logo -->

  <div style="margin:0 auto">
    <span class="fw-bold"><?php echo date('l, d F Y');?></span>
    <span class="fw-bold" id="jamServer"></span>
  </div>

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

      <li class="nav-item dropdown pe-3">

        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION["username"]?></span>
        </a><!-- End Profile Iamge Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6><?php echo $_SESSION["username"]?></h6>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="../logout.php">
              <i class="bi bi-box-arrow-right"></i>
              <span>Keluar</span>
            </a>
          </li>

        </ul><!-- End Profile Dropdown Items -->
      </li><!-- End Profile Nav -->

    </ul>
  </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
        <a class="nav-link collapsed" href="index.php">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
        </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
        <a class="nav-link collapsed" href="../penyelenggara/penyelenggara.php">
            <i class="bi bi-people-fill"></i>
            <span>Penyelenggara</span>
        </a>
        </li><!-- End Penyelenggara Nav -->

        <li class="nav-item">
        <a class="nav-link collapsed" href="../kegiatan/kegiatan.php">
            <i class="bi bi-card-list"></i>
            <span>Metadata Kegiatan</span>
        </a>
        </li><!-- End Kegiatan Nav -->

        <li class="nav-item">
        <a class="nav-link  collapsed" href="../variabel/variabel.php">
            <i class="bi bi-layout-text-window-reverse"></i>
            <span>Metadata Variabel</span>
        </a>
        </li><!-- End Variabel Nav -->

    </ul>

    </aside>
    <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            
            <!-- Customers Card -->
            <div class="col-xxl-4 col-md-4">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Jumlah Data <span>| Penyelenggara</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $jumlah_penyelenggara?> Penyelenggara</h6>
                    </div>
                  </div>

                </div>
              </div>

            </div>
            <!-- End Customers Card -->

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Jumlah Data <span>| Variabel</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-layout-text-window-reverse"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $jumlah_variabel?> Variabel</h6>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Jumlah Data <span>| Indikator</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-card-list"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $jumlah_indikator?> Indikator</h6>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <!-- End Revenue Card -->

            <!-- Website Traffic -->
            <?php 
              $hasil = $conn->query("SELECT * from indikator");
              while($data = $hasil->fetch_assoc()){
                $id_indikator = $data['id_indikator'];
            ?>
            <div class="col-xxl-6 col-md-6">
            <div class="card">
              <div class="card-body pb-0">
                <h5 class="card-title">Indikator <span>| <?php echo $data['nama_indikator']?></span></h5>

                <div align="center" id="trafficChart<?php echo $id_indikator?>" style="min-height: 550px;"></div>

                <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#trafficChart<?php echo $id_indikator?>")).setOption({
                  tooltip: {
                    trigger: 'item'
                  },
                  legend: {
                    left: 'center'
                  },
                  series: [{
                    name: 'Kecamatan',
                    type: 'pie',
                    radius: ['0%', '70%'],
                    avoidLabelOverlap: false,
                    label: {
                    show: false,
                    position: 'center'
                    },
                    emphasis: {
                    label: {
                      show: true,
                      fontSize: '14',
                      fontWeight: 'bold'
                    }
                    },
                    labelLine: {
                    show: false
                    },
                    data: [
                    <?php 
                      $id_indikator = $data['id_indikator'];
                      $hi45 = $conn->query("SELECT * FROM kecamatan order by kecamatan.id_kecamatan");
                      while($row34 = $hi45->fetch_assoc()){
                        $c= $row34['id_kecamatan']; 
                        $mi4 = $conn->query("SELECT * FROM `nilai_sub` join kegiatan on kegiatan.id_kegiatan=nilai_sub.id_kegiatan join sumber_data on sumber_data.id_sumber_data=nilai_sub.id_sumber_data 
                                join indikator on indikator.id_indikator=nilai_sub.id_indikator join satuan on satuan.id_satuan=indikator.id_satuan 
                                where id_kecamatan=$c and tahun = $tahun and nilai_sub.id_indikator = $id_indikator");
                        
                        if($mi4->num_rows != 1){
                    ?>
                    {
                      name: '<?php echo $row34['kecamatan'];?>',
                      value: 0
                    },
                    <?php } 
                      while($row39 = $mi4->fetch_assoc()){
                    ?>
                    {
                      name: '<?php echo $row34['kecamatan'];?>',
                      value: <?php if($row39['nilai']== null){
                        echo 0;
                      }else{
                        echo $row39['nilai'];
                      }?>
                    },
                    <?php }} ?>
                    ]
                  }]
                  });
                });
                </script>
              </div>
            </div>
            </div>          
            <?php } ?>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include 'footer.php'?>
  <!-- End Footer -->

</body>

</html>