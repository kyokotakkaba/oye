<!DOCTYPE html>
<html>

<head>
	<title>OYE</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- favicons -->
	<!-- <link rel="icon" type="image/png" sizes="57x57" href="<?=base_url("dist/images/favicons/apple-icon-57x57.png");?>">
	<link rel="icon" type="image/png" sizes="60x60" href="<?=base_url("dist/images/favicons/apple-icon-60x60.png");?>">
	<link rel="icon" type="image/png" sizes="72x72" href="<?=base_url("dist/images/favicons/apple-icon-72x72.png");?>">
	<link rel="icon" type="image/png" sizes="76x76" href="<?=base_url("dist/images/favicons/apple-icon-76x76.png");?>">
	<link rel="icon" type="image/png" sizes="114x114"
		href="<?=base_url("dist/images/favicons/apple-icon-114x114.png");?>">
	<link rel="icon" type="image/png" sizes="120x120"
		href="<?=base_url("dist/images/favicons/apple-icon-120x120.png");?>">
	<link rel="icon" type="image/png" sizes="144x144"
		href="<?=base_url("dist/images/favicons/apple-icon-144x144.png");?>">
	<link rel="icon" type="image/png" sizes="152x152"
		href="<?=base_url("dist/images/favicons/apple-icon-152x152.png");?>">
	<link rel="icon" type="image/png" sizes="180x180"
		href="<?=base_url("dist/images/favicons/apple-icon-180x180.png");?>">
	<link rel="icon" type="image/png" sizes="192x192"
		href="<?=base_url("dist/images/favicons/android-icon-192x192.png");?>">
	<link rel="icon" type="image/png" sizes="32x32" href="<?=base_url("dist/images/favicons/favicon-32x32.png");?>">
	<link rel="icon" type="image/png" sizes="96x96" href="<?=base_url("dist/images/favicons/favicon-96x96.png");?>">
	<link rel="icon" type="image/png" sizes="16x16" href="<?=base_url("dist/images/favicons/favicon-16x16.png");?>"> -->
	<link rel="manifest" href="/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<!-- favicons -->
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url("dist/css/style.css");?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url("dist/css/custom-responsive-style.css");?>">

	<link href="//fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<script src="<?=base_url("bower_components/jquery/dist/jquery.min.js");?>"></script>
	<script type="text/javascript" src="<?=base_url("dist/js/all-plugins.js");?>"></script>
	<script type="text/javascript" src="<?=base_url("dist/js/plugin-active.js");?>"></script>

</head>

<body data-spy="scroll" data-target=".main-navigation" data-offset="150">
	<section id="MainContainer">
		<!-- Header starts here -->
		<header id="Header">
			<nav class="main-navigation">
				<div class="container treclearfix">
					<div class="site-logo-wrap">
						<a class="logo" href="#"><img src="<?=base_url("dist/images/logo.png");?>"
								alt="Design Studio"></a>
					</div>
					<a href="javascript:void(0)" class="menu-trigger hidden-lg-up"><span>&nbsp;</span></a>
					<div class="main-menu hidden-md-down">
						<ul class="menu-list">
							<li><a class="nav-link" href="javascript:void(0)" data-target="#HeroBanner">Home</a></li>
							<li><a class="nav-link" href="javascript:void(0)" data-target="#About">About Us</a></li>
							<li><a class="nav-link" href="javascript:void(0)" data-target="#Services">Benefit</a></li>
							<li><a class="nav-link" href="javascript:void(0)" data-target="#Portfolio">Portfolio</a>
							</li>
							<li><a class="nav-link" href="javascript:void(0)" data-target="#ContactUs">Contact</a></li>
							<li style="background-color:#D52426;"><a class="nav-link" href="<?php echo base_url(); ?>index.php/login" style="color:white">LOG IN</a></li>

						</ul>
					</div>
				</div>
				<div class="mobile-menu hidden-lg-up">
					<ul class="mobile-menu-list">
						<li><a class="nav-link" href="javascript:void(0)" data-target="#HeroBanner">Home</a></li>
						<li><a class="nav-link" href="javascript:void(0)" data-target="#Services">Services</a></li>
						<li><a class="nav-link" href="javascript:void(0)" data-target="#About">Benefit</a></li>
						<li><a class="nav-link" href="javascript:void(0)" data-target="#Portfolio">Portfolio</a></li>
						<li><a class="nav-link" href="javascript:void(0)" data-target="#ContactUs">Contact</a></li>
					</ul>
				</div>
			</nav>
		</header>
		<!-- Header ends here -->
		<!-- Banner starts here -->
		<section id="HeroBanner">
			<div class="hero-content">
				<div>
					<img style="width:40%; margin-top:10%; float:right;"
						src="<?=base_url("dist/images/home-header.png");?>" alt="">
					<img style="width:100%; margin-top:2%;" src="<?=base_url("dist/images/home-content.png");?>" alt="">
				</div>
			</div>
		</section>
		<!-- Banner ends here -->
		<!-- About Us section starts here -->
		<section id="About">
			<div class="container">
				<div class="block-heading">
					<h2>About Us</h2>
					<p>All about our company</p>
					<div>
						<img class="margin-center" src="<?=base_url("dist/images/aboutus.png");?>" alt="">
						<h3 style="margin-top:4%;">VISI</h3>
						<p>Mewujudkan peluang usaha secara gotong royong yang mensejahterahkan masyarakat Indonesia
							melalui startup.</p>
						<h3 style="margin-top:4%;">MISI</h3>
						<p>Menjadikan OYE sebagai aplikasi pembayaran yang mampu membuka peluang usaha bagi masyarakat
							luas.</p>
						<p>Bekerja dengan hati dan integritas</p>
						<p>Membantu memberdayakan ekonomi di masyarakat
							dengan menjalin kerjasama dengan merchant’s.</p>
						<p>Menyediakan lapangan kerja dengan sistem berbasis
							jaringan untuk membantu meningkatkan kesejahteraan masyarakat lewat pengguna OYE.</p>

					</div>
				</div>
			</div>
		</section>
		<!-- About Us section ends here -->
		<!-- Services section starts here -->
		<section id="Services">
			<div class="container">
				<div class="block-heading">
					<h2>Benefit</h2>
                    <h5>KEUNTUNGAN MENJADI AGEN OYE</h5>
                    <p>Berbagai keuntungan yang bisa Anda nikmati dengan jadi agen PPOB OYE</p>
				</div>
				<div class="services-wrapper">
					<div class="each-service">
						<div class="service-icon" style="background-color: #2b6bff;"><i class="fa fa-desktop" aria-hidden="true"></i></div>
						<h5 class="service-title">PPOB Terlengkap</h5>
						<p class="service-description">Tersedia berbagai pilihan pembayaran, mulai dari listrik, air, hingga BPJS dan cicilan.</p>
					</div>
					<div class="each-service">
						<div class="service-icon" style="background-color: #2cdb38;"><i class="fa fa-money" aria-hidden="true"></i></div>
						<h5 class="service-title">MODAL Minimal</h5>
						<p class="service-description">Dengan modal Rp 100.000, Anda bisa langsung berbisnis & raih keuntungan maksimal.</p>
					</div>
					<div class="each-service">
						<div class="service-icon" style="background-color: #ffb217;"><i class="fa fa-area-chart" aria-hidden="true"></i></div>
						<h5 class="service-title">UNTUNG Maksimal</h5>
						<p class="service-description">Passive income hingga ratusan juta rupiah dan raih kesempatan untuk memperluas jaringan bisnis Anda.</p>
					</div>
					<div class="each-service">
						<div class="service-icon" style="background-color: #0fd7ff;"><i class="fa fa-check" aria-hidden="true"></i></div>
						<h5 class="service-title">APLIKASI MUDAH DIJALANKAN</h5>
						<p class="service-description">Aplikasi yang mudah di operasikan, mulai dari pelajar hingga Ibu Rumah tangga. Tersedia versi Mobile & Desktop</p>
					</div>
					<div class="each-service">
						<div class="service-icon" style="background-color: #c26eff;"><i class="fa fa-calendar" aria-hidden="true"></i></div>
						<h5 class="service-title">Dimanapun dan Kapanpun</h5>
						<p class="service-description">Peoses transaksi lebih mudan & cepat via online, dimanapun dan kapanpun. Di rumah, cafe, kampus, dimana saja.</p>
					</div>
					<div class="each-service">
						<div class="service-icon" style="background-color: #ff5757;"><i class="fa fa-credit-card" aria-hidden="true"></i></div>
						<h5 class="service-title">CASHLESS</h5>
						<p class="service-description">Kemudahan & Keamanan transaksi online dengan pembayaran tanpa uang tunai.</p>
					</div>
				</div>
			</div>
		</section>
		<!-- Services section ends here -->
		<!-- Portfolio section starts here -->
		<section id="Portfolio">
			<div class="container">
				<div class="block-heading">
                    <h2>Portfolio</h2>
                    <h5>KEUNTUNGAN MENJADI AGEN OYE</h5>
                    <p style="margin-top:2%;">Manfaatkan layanan aplikasi keuangan digital OYE untuk mengakses produk – produk keuangan kebutuhan sehari – hari Anda.</p>
                    <p style="margin-top:-10px;">Klik gambar di bawah ini untuk informasi lebih lanjut mengenai produk dan layanan.</p>
				</div>
				<div class="portfolio-wrapper clearfix">
					<a class="each-portfolio" data-fancybox="gallery" href="images/p-one.jpg">
						<img src="<?=base_url("dist/images/p-one.jpg");?>" alt="p-one">
						<div class="hover-cont-wrap">
							<div class="hover-cont-block">
								<h5 class="p-title">Online</h5>
								<!-- <div class="p-desc">
									<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</div>
									<div class="icon-div"><i class="fa fa-search-plus" aria-hidden="true"></i></div>
								</div> -->
							</div>
						</div>
					</a>
					<a class="each-portfolio" data-fancybox="gallery" href="images/p-two.jpg">
						<img src="<?=base_url("dist/images/p-two.jpg");?>" alt="p-one">
						<div class="hover-cont-wrap">
							<div class="hover-cont-block">
								<h5 class="p-title">Social Media</h5>
								<!-- <div class="p-desc">
									<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</div>
									<div class="icon-div"><i class="fa fa-search-plus" aria-hidden="true"></i></div>
								</div> -->
							</div>
						</div>
					</a>
					<a class="each-portfolio" data-fancybox="gallery" href="images/p-three.jpg">
						<img src="<?=base_url("dist/images/p-three.jpg");?>" alt="p-one">
						<div class="hover-cont-wrap">
							<div class="hover-cont-block">
								<h5 class="p-title">Internet</h5>
								<!-- <div class="p-desc">
									<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</div>
									<div class="icon-div"><i class="fa fa-search-plus" aria-hidden="true"></i></div>
								</div> -->
							</div>
						</div>
					</a>
					<a class="each-portfolio" data-fancybox="gallery" href="images/p-four.jpg">
						<img src="<?=base_url("dist/images/p-four.jpg");?>" alt="p-one">
						<div class="hover-cont-wrap">
							<div class="hover-cont-block">
								<h5 class="p-title">PLN</h5>
								<!-- <div class="p-desc">
									<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</div>
									<div class="icon-div"><i class="fa fa-search-plus" aria-hidden="true"></i></div>
								</div> -->
							</div>
						</div>
					</a>
					<a class="each-portfolio" data-fancybox="gallery" href="images/p-five.jpg">
						<img src="<?=base_url("dist/images/p-five.jpg");?>" alt="p-one">
						<div class="hover-cont-wrap">
							<div class="hover-cont-block">
								<h5 class="p-title">PDAM</h5>
								<!-- <div class="p-desc">
									<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</div>
									<div class="icon-div"><i class="fa fa-search-plus" aria-hidden="true"></i></div>
								</div> -->
							</div>
						</div>
					</a>
					<a class="each-portfolio" data-fancybox="gallery" href="images/p-six.jpg">
						<img src="<?=base_url("dist/images/p-six.jpg");?>" alt="p-one">
						<div class="hover-cont-wrap">
							<div class="hover-cont-block">
								<h5 class="p-title">BPJS</h5>
								<!-- <div class="p-desc">
									<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</div>
									<div class="icon-div"><i class="fa fa-search-plus" aria-hidden="true"></i></div>
								</div> -->
							</div>
						</div>
					</a>
					<a class="each-portfolio" data-fancybox="gallery" href="images/p-one.jpg">
						<img src="<?=base_url("dist/images/p-seven.jpg");?>" alt="p-one">
						<div class="hover-cont-wrap">
							<div class="hover-cont-block">
								<h5 class="p-title">CICILAN</h5>
								<!-- <div class="p-desc">
									<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</div>
									<div class="icon-div"><i class="fa fa-search-plus" aria-hidden="true"></i></div>
								</div> -->
							</div>
						</div>
					</a>
					<a class="each-portfolio" data-fancybox="gallery" href="images/p-two.jpg">
						<img src="<?=base_url("dist/images/p-eight.jpg");?>" alt="p-one">
						<div class="hover-cont-wrap">
							<div class="hover-cont-block">
								<h5 class="p-title">VOUCHER GAME</h5>
								<!-- <div class="p-desc">
									<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</div>
									<div class="icon-div"><i class="fa fa-search-plus" aria-hidden="true"></i></div>
								</div> -->
							</div>
						</div>
					</a>
					<a class="each-portfolio" data-fancybox="gallery" href="images/p-three.jpg">
						<img src="<?=base_url("dist/images/p-nine.jpg");?>" alt="p-one">
						<div class="hover-cont-wrap">
							<div class="hover-cont-block">
								<h5 class="p-title">PASCA BAYAR</h5>
								<!-- <div class="p-desc">
									<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</div>
									<div class="icon-div"><i class="fa fa-search-plus" aria-hidden="true"></i></div>
								</div> -->
							</div>
						</div>
					</a>
				</div>
			</div>
		</section>
		<!-- Portfolio section ends here -->
		<!-- <section id="Testimonial">
			<div class="testimonial-wrap">
				<div class="container">
					<div class="block-heading">
						<h2>What Clients Say About Us</h2>
					</div>
					<ul class="testimonial-slider">
						<li>" I would like to thank Click and the team for the fantastic work<br> on content writing for
							my site. "</li>
						<li>" I'd say that the team is excellent and it is some of the best service<br> I have received
							both online and offline in a long time. "</li>
						<li>" It's been great working with you. The content is also great. I can certainly recommend
							your<br> services to others as cost effective services. "</li>
					</ul>
				</div>
			</div>
		</section> -->
		<!-- Contact us section starts here -->
		<section id="ContactUs">
			<div class="container contact-container">
				<h3 class="contact-title">Get In Touch</h3>
				<div class="contact-outer-wrapper">
					<div class="address-block " style="margin:auto;">
						<p class="add-title">Contact Details</p>
						<div class="c-detail" >
							<span class="c-icon"><i class="fa fa-map-marker" aria-hidden="true"></i></span> <span
								class="c-info">Keputih Tegal Timur B 17 – Surabaya, Jawa Timur.</span>
						</div>
						<!-- <div class="c-detail">
							<span class="c-icon"><i class="fa fa-phone" aria-hidden="true"></i></span> <span
								class="c-info">+41982399090000</span>
						</div> -->
						<div class="c-detail">
							<span class="c-icon"><i class="fa fa-envelope" aria-hidden="true"></i></span> <span
								class="c-info">cs@oye.co.id</span>
						</div>
					</div>
					
				</div>
			</div>
		</section>
		<!-- Contact us section ends here -->
		<!-- Footer section starts here -->
		<footer id="Footer">
			<div class="container">
				
			</div>
		</footer>
		<!-- Footer section ends here -->
	</section>
</body>

</html>
