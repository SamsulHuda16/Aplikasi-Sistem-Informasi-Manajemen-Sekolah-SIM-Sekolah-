<!doctype html>
<html class="no-js" lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<title><?= $atas ?></title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/png" href="<?= base_url('assets/') ?>/images/icon/Logo-UNUJA.png">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>/css/themify-icons.css">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>/css/metisMenu.css">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>/css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>/css/slicknav.min.css">

	<link rel="stylesheet" href="<?= base_url('assets/') ?>/css/datatables.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>/css/datatables.css">


	<!-- amchart css -->
	<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
	<!-- others css -->
	<link rel="stylesheet" href="<?= base_url('assets/') ?>/css/typography.css">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>/css/default-css.css">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>/css/styles.css">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>/css/responsive.css">
	<!-- modernizr css -->
	<script src="<?= base_url('assets/') ?>/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
	<!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
	<!-- preloader area start -->
	<div id="preloader">
		<div class="loader"></div>
	</div>
	<!-- preloader area end -->
	<!-- page container area start -->
	<div class="page-container">
		<!-- sidebar menu area start -->
		<div class="sidebar-menu">
			<div class="sidebar-header">
				<div class="logo">
					<a><img src="<?= base_url('assets/') ?>/images/icon/header.png" alt="logo"></a>
				</div>
			</div>
			<div class="main-menu">
				<div class="menu-inner">
					<nav>
						<ul class="metismenu" id="menu">
							<li class="active">
								<a href="<?= base_url('/') ?>" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>

							</li>
							<li>
								<a href="<?= base_url('siswa') ?>" aria-expanded="true"><i class="fa fa-child"></i><span>Siswa</span></a>
							</li>
							<li>
								<a href="<?= base_url('guru') ?>" aria-expanded="true"><i class="fa fa-black-tie"></i><span>Guru</span></a>
							</li>
							<li>
								<a href="<?= base_url('kelas') ?>" aria-expanded="true"><i class="fa fa-building"></i><span>Kelas</span></a>
							</li>
							<li>
								<a href="<?= base_url('tahunajaran') ?>" aria-expanded="true"><i class="ti-slice"></i><span>Tahun Ajaran</span></a>
							</li>

						</ul>
					</nav>
				</div>
			</div>
		</div>
		<!-- sidebar menu area end -->
		<!-- main content area start -->
		<div class="main-content">
			<!-- header area start -->
			<div class="header-area">
				<div class="row align-items-center">
					<!-- nav and search button -->
					<div class="col-md-6 col-sm-8 clearfix">
						<div class="nav-btn pull-left">
							<span></span>
							<span></span>
							<span></span>
						</div>
						<div class="search-box pull-left">
							<form action="#">
								<input type="text" name="search" placeholder="Search..." required>
								<i class="ti-search"></i>
							</form>
						</div>
					</div>
					<!-- profile info & task notification -->
					<div class="col-md-6 col-sm-4 clearfix">
						<ul class="notification-area pull-right">
							<li id="full-view"><i class="ti-fullscreen"></i></li>
							<li id="full-view-exit"><i class="ti-zoom-out"></i></li>
							<li class="dropdown">
								<i class="ti-bell dropdown-toggle" data-toggle="dropdown">
									<span>2</span>
								</i>
								<div class="dropdown-menu bell-notify-box notify-box">
									<span class="notify-title">Notifikasi Sistem</span>
									<div class="nofity-list">
										<a href="<?= base_url('pengaturan') ?>" class="notify-item">
											<div class="notify-thumb"><i class="ti-check btn-success"></i></div>
											<div class="notify-text">
												<p>Database SIM Sekolah Aktif</p>
												<span>Terhubung (db_sekolah)</span>
											</div>
										</a>
										<a href="<?= base_url('pengaturan') ?>" class="notify-item">
											<div class="notify-thumb"><i class="ti-user btn-info"></i></div>
											<div class="notify-text">
												<p>Sesi Login Aktif</p>
												<span>Level: <?= strtoupper($this->session->userdata('level')) ?></span>
											</div>
										</a>
									</div>
								</div>
							</li>
							<li class="dropdown">
								<i class="fa fa-envelope-o dropdown-toggle" data-toggle="dropdown"><span>2</span></i>
								<div class="dropdown-menu notify-box nt-enveloper-box">
									<span class="notify-title">Pesan Sistem</span>
									<div class="nofity-list">
										<a href="<?= base_url('pengaturan') ?>" class="notify-item">
											<div class="notify-thumb">
												<img src="<?= base_url('assets/images/author/avatar.png') ?>" alt="avatar">
											</div>
											<div class="notify-text">
												<p>Sistem Administrator</p>
												<span class="msg">Selamat datang di SIM Sekolah!</span>
												<span>Hari ini</span>
											</div>
										</a>
										<a href="<?= base_url('pengaturan') ?>" class="notify-item">
											<div class="notify-thumb">
												<i class="ti-key btn-warning"></i>
											</div>
											<div class="notify-text">
												<p>Pengamanan Akun</p>
												<span class="msg">Perbarui kata sandi berkala di menu Pengaturan.</span>
												<span>Info</span>
											</div>
										</a>
									</div>
								</div>
							</li>
							<li>
								<a href="<?= base_url('pengaturan') ?>" title="Pengaturan Akun" class="text-white">
									<i class="ti-settings"></i>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- header area end -->
			<!-- page title area start -->
			<div class="page-title-area">
				<div class="row align-items-center">
					<div class="col-sm-6">
						<div class="breadcrumbs-area clearfix">
							<h4 class="page-title pull-left"><?= $menuatas ?></h4>
							<ul class="breadcrumbs pull-left">
								<li><a href="<?= base_url('') ?>">Beranda</a></li>
								<li><span><?= $menuatas ?></span></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6 clearfix">
						<div class="user-profile pull-right">
							<?php if ($this->session->userdata('foto') && file_exists('./assets/users/' . $this->session->userdata('foto'))): ?>
								<img class="avatar user-thumb rounded-circle" src="<?= base_url('assets/users/' . $this->session->userdata('foto')) ?>" alt="avatar" style="object-fit: cover; width: 35px; height: 35px;">
							<?php else: ?>
								<img class="avatar user-thumb rounded-circle" src="<?= base_url('assets/images/author/avatar.png') ?>" alt="avatar" style="object-fit: cover; width: 35px; height: 35px;">
							<?php endif; ?>
							<h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $this->session->userdata('nama_lengkap') ? $this->session->userdata('nama_lengkap') : 'User' ?><i class="fa fa-angle-down"></i></h4>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="<?= base_url('pengaturan') ?>"><i class="fa fa-cog mr-2"></i>Edit Pengaturan</a>
								<?php if ($this->session->userdata('level') == 'admin'): ?>
									<a class="dropdown-item" href="<?= base_url('users') ?>"><i class="fa fa-users mr-2"></i>Kelola User</a>
								<?php endif; ?>
								<a class="dropdown-item" href="<?= base_url('logout') ?>"><i class="fa fa-sign-out-alt mr-2"></i>Log Out</a>
							</div>
						</div>
					</div>
				</div>
			</div>
