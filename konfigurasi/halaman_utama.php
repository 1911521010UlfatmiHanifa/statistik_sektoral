<?php 
	include "koneksi.php";
	$stmt09 = $conn->query("SELECT max(tahun) as tahun from kegiatan");

	while($row = $stmt09->fetch_assoc()){
		$tahun = $row['tahun'];
	}
?>
<!doctype html>
<html class="no-js" lang="">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Dinas Kesehatan Kabupaten Lima Puluh Kota</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicons -->
	<link rel="shortcut icon" type="image/png" href="../dark/logo/logo.png">

	<!-- Place favicon.ico in the root directory -->

	<!-- ========================= CSS here ========================= -->
	<link rel="stylesheet" href="../assets2/css/bootstrap-5.0.5-alpha.min.css">
	<link rel="stylesheet" href="../assets2/css/LineIcons.2.0.css">
	<link rel="stylesheet" href="../assets2/css/animate.css">
	<link rel="stylesheet" href="../assets2/css/tiny-slider.css">
	<link rel="stylesheet" href="../assets2/css/main.css">
	<!-- <link rel="stylesheet" href="../assets/css/style.css"> -->
	
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

	<script>
		var bi = 1;
		var a = 1; 
	</script>

	<style>
		.card {
			margin-bottom: 30px;
			border: none;
			border-radius: 5px;
			box-shadow: 0px 0 30px rgba(1, 41, 112, 0.1);
			overflow: hidden;
		}

		.card-header, .card-footer {
			border-color: #ebeef4;
			background-color: #fff;
			color: #798eb3;
			padding: 15px;
		}

		.card-title {
			padding: 20px 0 15px 0;
			font-size: 18px;
			font-weight: 500;
			color: #012970;
			font-family: "Poppins", sans-serif;
		}
		.card-title span {
			color: #899bbd;
			font-size: 14px;
			font-weight: 400;
		}

		.card-body {
			padding: 0 20px 20px 20px;
		}

		.card-img-overlay {
			background-color: rgba(255, 255, 255, 0.6);
		}
	</style>
</head>

<body>

	<!-- ========================= preloader start ========================= -->
	<div class="preloader">
		<div class="loader">
			<div class="ytp-spinner">
				<div class="ytp-spinner-container">
					<div class="ytp-spinner-rotator">
						<div class="ytp-spinner-left">
							<div class="ytp-spinner-circle"></div>
						</div>
						<div class="ytp-spinner-right">
							<div class="ytp-spinner-circle"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- preloader end -->

	<!-- ========================= header start ========================= -->
	<header id="home" class="header">

		<div class="header-wrapper">
				<div class="navbar-area theme-bg">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<nav class="navbar navbar-expand-lg">
									<a class="navbar-brand">
										<img src="../dark/logo/logo.png" width="35spx" height="35spx" alt="Logo">
									</a>
									<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
										aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
										<span class="toggler-icon"></span>
										<span class="toggler-icon"></span>
										<span class="toggler-icon"></span>
									</button>
				
									<div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
										<ul id="nav" class="navbar-nav ml-auto">
											<li class="nav-item active">
												<a class="page-scroll active" href="#home">Home</a>
											</li>
											<li class="nav-item">
												<a class="page-scroll" href="#about">Tentang Kami</a>
											</li>
											<li class="nav-item">
												<a class="page-scroll" href="#services">Bidang</a>
											</li>
											<li class="nav-item">
												<a class="page-scroll" href="#blog">Dokumentasi Kegiatan</a>
											</li>
											<li class="nav-item">
												<a class="page-scroll" href="#datasektoral">Data Sektoral</a>
											</li>
											<li class="nav-item">
												<a class="page-scroll" href="#team">Kontak</a>
											</li>
											<li class="nav-item">
												<a href="login.php"><span>Login</span></a>
											</li>
										</ul>
									</div> <!-- navbar collapse -->
								</nav> <!-- navbar -->
							</div>
						</div> <!-- row -->
					</div> <!-- container -->
				</div> <!-- navbar area -->
		</div>

		<div class="slider-wrapper">
			<!-- ========================= slider-section start ========================= -->
			<section class="slider-section">
				<div class="slider-active slick-style">
					<div class="single-slider img-bg" style="background-image:url('../assets2/img/slider/slider1.png');">
						<div class="container">
							<div class="row">
								<div class="col-md-6">
									<div class="slider-content">
										<h1 data-animation="fadeInDown" data-duration="1.5s" data-delay=".5s">Dinas Kesehatan Kabupaten Lima Puluh Kota
										</h1>
										<a href="#about" class="btn theme-btn page-scroll" data-animation="fadeInUp" data-duration="1.5s"
											data-delay=".9s">Lihat Selengkapnya</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="single-slider img-bg" style="background-image:url('../assets2/img/slider/slider-2.png');">
						<div class="container">
							<div class="row">
								<div class="col-md-6">
									<div class="slider-content">
										<h1 data-animation="fadeInDown" data-duration="1.5s" data-delay=".5s">Bidang Pekerjaan Dinas Kesehatan Kabupaten Lima Puluh Kota
										</h1>
										<a href="#services" class="btn theme-btn page-scroll" data-animation="fadeInUp" data-duration="1.5s"
											data-delay=".9s">Lihat Selengkapnya</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="single-slider img-bg" style="background-image:url('../assets2/img/slider/slider-3.jpg');">
						<div class="container">
							<div class="row">
								<div class="col-md-6">
									<div class="slider-content">
										<h1 data-animation="fadeInDown" data-duration="1.5s" data-delay=".5s">Kontak Dihubungi
										</h1>
										<a href="#team" class="btn theme-btn page-scroll" data-animation="fadeInUp" data-duration="1.5s"
											data-delay=".9s">Lihat Selengkapnya</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- ========================= slider-section end ========================= -->
		</div>
	</header>
	<!-- ========================= header end ========================= -->

	<!-- ========================= about-section start ========================= -->
	<section id="about" class="about-section pt-120">
		<div class="shape shape-2">
			<img src="../assets2/img/shapes/shape-2.svg" alt="">
		</div>
		<div class="container">
			<div class="row">
				<div class="col-xl-10 col-lg-11 mx-auto">
					<div class="about-content text-center mb-55">
						<div class="section-title mb-30">
							<span class="wow fadeInDown" data-wow-delay=".2s">Tentang Kami</span>
							<h2 class="mb-15 wow fadeInUp" data-wow-delay=".4s">Selamat Datang di Website Dinas Kesehatan Kabupaten Lima Puluh Kota</h2>
						</div>
						<p class="mb-35 wow fadeInUp" data-wow-delay=".6s">Dinas Kesehatan Kabupaten Lima Puluh Kota merupakan salah satu OPD yang
							bergerak di bidang Kesehatan. Dinas ini mengurusi segala hal terkait dengan kesehatan dengan cakupan wilayah Kabupaten
							Lima Puluh Kota. Berikut merupakan struktur organisasi Dinas Kesehatan Kabupaten Lima Puluh Kota :
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="about-img text-center">
			<img src="../assets2/img/slider/Struktur_Organisasi.jpg" alt="">
		</div>
	</section>
	<!-- ========================= about-section end ========================= -->

	<!--========================= service-section start ========================= -->
	<section id="services" class="service-section pt-150">
		<div class="shape shape-3">
			<img src="../assets2/img/shapes/shape-3.svg" alt="">
		</div>
		<div class="container justify-content-center">
			<div class="row">
				<div class="col-xl-8 mx-auto">
					<div class="section-title text-center mb-55">
						<span class="wow fadeInDown" data-wow-delay=".2s">Bidang</span>
						<h2 class="mb-15 wow fadeInUp" data-wow-delay=".4s">Bidang Pekerjaan Dinas Kesehatan Kabupaten Lima Puluh Kota</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-6">
					<div class="service-item mb-30">
						<div class="service-icon mb-25 text-center">
							<img src="../assets2/img/slider/a.png" width="50px">
						</div>
						<div class="service-content">
							<h4>Sekretariat</h4>
							Bidang Sekretariat terbagi menjadi tiga sub, yaitu:
								<ul style="padding: 15px;">
									<li type="1">Sub Bagian Umum dan Kepegawaian</li>
									<li type="1">Sub Bagian Keuangan dan Pengelolaan Aset</li>
									<li type="1">Sub Bagian Perencanaan, Evaluasi Program, dan Pelaporan</li>
								</ul>
						</div>
						<div class="service-overlay img-bg"></div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="service-item mb-30">
						<div class="service-icon mb-25 text-center">
							<img src="../assets2/img/slider/b.png" width="50px">
						</div>
						<div class="service-content">
							<h4>Bidang Pencegahan dan Pengendalian Penyakit</h4>
							Bidang Pencegahan dan Pengendalian Penyakit terbagi menjadi tiga seksi, yaitu:
								<ul style="padding: 15px;">
									<li type="1">Seksi Pencegahan dan Pengendalian Penyakit Manula</li>
									<li type="1">Seksi Surveilans, Imunisasi, dan Penganggulangan KRI</li>
									<li type="1">Seksi Pencegahan dan Pengendalian Penyakit Tidak Menular, Kesehatan Jiwa dan Napza</li>
								</ul>
						</div>
						<div class="service-overlay img-bg"></div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="service-item mb-30">
						<div class="service-icon mb-25 text-center">
							<img src="../assets2/img/slider/c.png" width="50px">
						</div>
						<div class="service-content">
							<h4>Bidang Pelayanan Kesehatan</h4>
							Bidang Pelayanan Kesehatan terbagi menjadi tiga seksi, yaitu:
								<ul style="padding: 15px;">
									<li type="1">Seksi Pelayanan Kesehatan Primer</li>
									<li type="1">Seksi Peningkatan Mutu, Akreditasi dan Pelayanan Kesehatan Tradisional</li>
									<li type="1">Seksi Pelayanan Kesehatan Rujukan, Pelayanan Kesehatan Haji dan Jaminan Kesehatan</li>
								</ul>
						</div>
						<div class="service-overlay img-bg"></div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="service-item mb-30">
						<div class="service-icon mb-25 text-center">
							<img src="../assets2/img/slider/d.png" width="50px">
						</div>
						<div class="service-content">
							<h4>Bidang Kesehatan Masyarakat</h4>
							Bidang Kesehatan Masyarakat terbagi menjadi tiga seksi, yaitu:
								<ul style="padding: 15px;">
									<li type="1">Seksi Promosi Kesehatan dan Pemberdayaan Masyarakat</li>
									<li type="1">Seksi Kesehatan Keluarga dan Gizi Masyarakat</li>
									<li type="1">Seksi Kesehatan Lingkungan, Kesehatan Kerja dan Olah Raga</li>
								</ul>
						</div>
						<div class="service-overlay img-bg"></div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="service-item mb-30">
						<div class="service-icon mb-25 text-center">
							<img src="../assets2/img/slider/e.png" width="50px">
						</div>
						<div class="service-content">
							<h4>Bidang Sumber Daya Kesehatan</h4>
							Bidang Sumber Daya Kesehatan terbagi menjadi tiga seksi, yaitu:
								<ul style="padding: 15px;">
									<li type="1">Seksi Alat Kesehatan dan Fasyankes</li>
									<li type="1">Seksi Sumber Daya Manusia Kesehatan</li>
									<li type="1">Seksi Pelayanan Kefarmasian dan Perizinan</li>
								</ul>
						</div>
						<div class="service-overlay img-bg"></div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--========================= service-section end ========================= -->

	<!-- ========================= blog-section start ========================= -->
	<section id="blog" class="blog-section pt-150">
		<div class="shape shape-7">
			<img src="../assets2/img/shapes/shape-6.svg" alt="">
		</div>
		<div class="container">
			<div class="row">
				<div class="col-xl-8 mx-auto">
					<div class="section-title text-center mb-55">
						<span class="wow fadeInDown" data-wow-delay=".2s">Dokumentasi Kegiatan</span>
						<h2 class="mb-15 wow fadeInUp" data-wow-delay=".4s">Kegiatan Terakhir</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-4 col-lg-4 col-md-6">
					<div class="single-blog mb-30 wow fadeInUp" data-wow-delay=".2s">
						<div class="blog-img">
							<a href="#"><img src="../assets2/img/slider/f.jpg" alt=""></a>
						</div>
						<div class="blog-content">
							<h4><a href="#">Kunjungan Tim Komisi III DPRD Kabupaten 50 Kota ke Lokasi Pembangunan Puskesmas Koto Tinggi dan Baruah Gunuang</a></h4>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-6">
					<div class="single-blog mb-30 wow fadeInUp" data-wow-delay=".4s">
						<div class="blog-img">
							<a href="#"><img src="../assets2/img/slider/g.jpg" alt=""></a>
						</div>
						<div class="blog-content">
							<h4><a href="#">Relokasi Puskesmas Baruah Gunuang</a></h4>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-6">
					<div class="single-blog mb-30 wow fadeInUp" data-wow-delay=".6s">
						<div class="blog-img">
							<a href="#"><img src="../assets2/img/slider/h.jpg" alt=""></a>
						</div>
						<div class="blog-content">
							<h4><a href="#">Relokasi Puskesmas Koto Tinggi</a></h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- ========================= blog-section end ========================= -->

	<!-- ========================= blog-section start ========================= -->
	<section id="datasektoral" class="blog-section pt-150">
		<div class="shape shape-7">
			<img src="../assets2/img/shapes/shape-6.svg" alt="">
		</div>
		<div class="container">
			<div class="row">
				<div class="col-xl-8 mx-auto">
					<div class="section-title text-center mb-55">
						<h2 class="mb-15 wow fadeInUp" data-wow-delay=".4s">Data Statistik Sektoral Tahun <?php echo $tahun?></h2>
					</div>
				</div>
			</div>
			<div class="row">
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

					<div id="trafficChart<?php echo $id_indikator?>" style="min-height: 550px;"></div>

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
						fontSize: '18',
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
			<div class="card">
            <div class="card-body"><br>
              <!-- Table with stripped rows -->
              <table class="table datatable table-hover">
                <thead border="1" bgcolor="#6ec4cb" style="color:black">
                  <tr>
                    <th scope="col" style="text-align:center"><No.</th>
                    <th scope="col" style="text-align:center">Judul Kegiatan</th>
                    <th scope="col" style="text-align:center">Tahun</th>
                    <th scope="col" style="text-align:center">Metadata Kegiatan</th>
                    <th scope="col" style="text-align:center">Metadata Indikator</th>
                    <th scope="col" style="text-align:center">Metadata Variabel</th>
                    <th scope="col" style="text-align:center">Data Statiktik Sektoral</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
				  	  if(!$hasil = $conn->query("SELECT * FROM kegiatan")){
							die("gagal meminta data");
						}
						$no = 1;
                      while($row = $hasil->fetch_assoc()){
                  ?>
                  <tr>
                    <th scope="row"><?php echo $no++;?></th>
                    <td><?php echo $row['judul_kegiatan']; ?></td>
                    <td><?php echo $row['tahun']; ?></td>
                    <td><a href="../cetak2/cetak_kegiatan.php?id_kegiatan=<?php echo $row['id_kegiatan'];?>" target="_BLANK" class="btn btn-outline-primary btn-mt"><i class="bi bi-cloud-download-fill"></i> Cetak Metadata Kegiatan </a></td>
                    <td><a href="../cetak2/cetak_variabel.php?id_kegiatan=<?php echo $row['id_kegiatan'];?>" target="_BLANK" class="btn btn-outline-primary btn-mt"><i class="bi bi-cloud-download-fill"></i> Cetak Metadata Variabel </a></td>
                    <td><a href="../cetak2/cetak_indikator.php?id_kegiatan=<?php echo $row['id_kegiatan'];?>" target="_BLANK" class="btn btn-outline-primary btn-mt"><i class="bi bi-cloud-download-fill"></i> Cetak Metadata Indikator </a></td>
                    <td><a href="../cetak2/cetak_database.php?id_kegiatan=<?php echo $row['id_kegiatan'];?>" class="btn btn-outline-primary btn-mt"><i class="bi bi-cloud-download-fill"></i> Cetak Data Statistik Sektoral </a></td>
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
	<!-- ========================= blog-section end ========================= -->
	<br>
	<!-- ========================= contact-section start ========================= -->
	<section id="team" class="subscribe-section pt-100 pb-100 img-bg" style="background-image: url(../assets2/img/bg/a.jpg)">
		<div class="container">
			<div class="row">
				<div class="col-xl-7">
					<div class="section-title">
						<h2 class="mb-15">Kontak</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-8">
					<div class="subscribe-wrapper">
						<div class="support d-flex">
							<div class="support-icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="57.473" height="56.533" viewBox="0 0 57.473 56.533">
									<g id="noun_customer_service_2786300" data-name="noun_customer service_2786300"
										transform="translate(-11.49 -12.11)">
										<path id="Path_94" data-name="Path 94"
											d="M65.1,36.746a3.769,3.769,0,0,0-.485.052v-.209a3.858,3.858,0,0,0-2.746-3.664,21.6,21.6,0,0,0-43.166-.037,3.858,3.858,0,0,0-2.873,3.732v.209a3.769,3.769,0,0,0-.485-.052,3.866,3.866,0,0,0-3.858,3.858v7.515a3.866,3.866,0,0,0,3.858,3.858,3.732,3.732,0,0,0,.485-.052v.209a3.858,3.858,0,1,0,7.709,0V36.589a3.732,3.732,0,0,0-.037-.4V33.671a16.792,16.792,0,0,1,33.584,0v1.851a3.784,3.784,0,0,0-.164,1.037V52.172a3.829,3.829,0,0,0,.082.784c-1.1,2.463-4.254,8.426-9.56,10.075a4.023,4.023,0,1,0,.246,2.4c5.15-1.4,8.821-6.1,10.836-10.127a3.821,3.821,0,0,0,2.239.746,3.866,3.866,0,0,0,3.858-3.858v-.231a3.73,3.73,0,0,0,.485.052,3.866,3.866,0,0,0,3.851-3.858V40.6A3.866,3.866,0,0,0,65.1,36.746Z"
											fill="#00adb5" />
										<path id="Path_95" data-name="Path 95"
											d="M35.595,41.324a5.97,5.97,0,0,1,1.59-4.478,4.858,4.858,0,0,1,3.6-1.358,4.627,4.627,0,0,1,3.485,1.53A5.052,5.052,0,0,1,45.715,40.6a9.866,9.866,0,0,1-.94,4.321,29.853,29.853,0,0,1-2.4,3.732q-.507.746-1.493,2.239l-.6.873q-.545.828-.813,1.306a1.1,1.1,0,0,0-.134.284h6.127v3.06H35.55V53.564a6.716,6.716,0,0,1,.694-1.134q.306-.485.7-1.067l.806-1.179q.746-.978,2.239-3.12a20.9,20.9,0,0,0,2.142-3.642,6.859,6.859,0,0,0,.582-2.746,2.463,2.463,0,0,0-.53-1.6,1.843,1.843,0,0,0-1.493-.694,1.918,1.918,0,0,0-1.843,1.493,3.4,3.4,0,0,0-.179,1.216v.746H35.595Z"
											transform="translate(-6.104 -5.93)" fill="#00adb5" />
										<path id="Path_96" data-name="Path 96"
											d="M49.37,48.893l5.5-13.083h3.12V48.893h2v3.142h-2v4.478H54.87V52.035h-5.5Zm5.5,0V42.46L52.3,48.893Z"
											transform="translate(-9.61 -6.012)" fill="#00adb5" />
									</g>
								</svg>
							</div>
							<h2> <span>Kontak Darurat</span> Service 24/7</h2>
						</div>
						<div class="subscribe-links">
							<ul>
								<li><a href="#"><i class="lni lni-phone-set"></i> <span>(0752) 92418</span> </a> </li>
							</ul>
							<br>
							<ul>
								<li><a href="#"><i class="lni lni-envelope"></i> <span>dinaskesehatan@gmail.com</span> </a></li>
							</ul>
							<br>
							<ul>
								<li><a href="#"><i class="lni lni-home"></i> <span>Jln. Jendral Sudirman No. 1 Kota Payakumbuh</span> </a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- ========================= contact-section end ========================= -->

	<!-- ========================= footer start ========================= -->
	<footer class="footer pt-100 img-bg" style="background-image:url('../assets2/img/bg/footer-bg.jpg');">
		<div class="container">
			<div class="footer-widget-wrapper">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12">
						<div class="footer-widget mb-30">
							<h4>Lokasi Dinas Kesehatan Kabupaten Lima Puluh Kota</h4>
							<div class="map-canvas">
								<iframe class="col-xl-12 col-lg-12 col-md-12"
								src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.7877901094266!2d100.62944521395325!3d-0.22414363545091456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2ab4a6178b1ad5%3A0x6d2a6ee1f0acea65!2sDinas%20Kesehatan%20Kab.%20Lima%20Puluh%20Kota!5e0!3m2!1sid!2sid!4v1642962118666!5m2!1sid!2sid" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="copyright-area">
				<p class="text-center">&copy; Copyright <strong><span>KOMINFO <?php echo date('Y')?>, All Rights Reserved.</span></strong>. All Rights Reserved</p>
			</div>
		</div>
	</footer>
	<!-- ========================= footer end ========================= -->


	<!-- ========================= scroll-top ========================= -->
	<a href="#" class="scroll-top">
		<i class="lni lni-arrow-up"></i>
	</a>

	<!-- ========================= JS here ========================= -->
	<script src="../assets2/js/bootstrap.bundle-5.0.0.alpha-min.js"></script>
	<script src="../assets2/js/wow.min.js"></script>
	<script src="../assets2/js/tiny-slider.js"></script>
	<script src="../assets2/js/main.js"></script>
	<script src="../assets/vendor/chart.js/chart.min.js"></script>
	<script src="../assets/vendor/echarts/echarts.min.js"></script>

	<!-- Template Main JS File -->
	<script src="../assets/js/main.js"></script>
</body>

</html>