<!DOCTYPE html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Senshi Matto &mdash; Competições de Jiu-Jitsu</title>

	<!-- imagem aba d pagina -->
	<link rel="shortcut icon" href="">
	<!-- css -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/icomoon.css">
	<!-- Simple Line Icons -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/simple-line-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap.css">
	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/owl.theme.default.min.css">
	<!-- Style -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/style.css">
	<!-- select com pesquisa -->
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
	<!-- navs cadastro competição -->
	<link rel="stylesheet" href="<?= base_url(); ?>public/css/navs.css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	</head>
	<body>
	<!-- menu -->
	<header role="banner" id="fh5co-header">
		<div class="fluid-container">
			<nav class="navbar navbar-default">
				<div class="navbar-header">
 					<a class="navbar-brand" href="index.php">Senshi Matto</a> 
				</div>
				<div>
					<ul id="menu" class="nav navbar-nav navbar-right">
						<li class="active"><a href="<?php echo site_url('home'); ?>"><span>Home</span></a></li>
						<li><a  href="#"><span>Quem Somos</span></a></li>
						<li><a href="#"><span>Competições</span></a></li>
						<li><a href="#" data-nav-section="testimony"><span>Filiações</span></a></li>
						<li><a href="#" data-nav-section="pricing"><span>Ranking</span></a></li>
						<li><a href="#" data-nav-section="#"><span>Perguntas</span></a></li>
						<li>
							<a class="dropdown-toggle" data-toggle="dropdown">
								<span>bem-vindo, <?php echo $this->session->userdata('usuario'); ?></span>
							</a>
    						<ul class="dropdown-menu">
      							<li><a href="<?php echo site_url('usuarios/minhaConta'); ?>">Minha Conta</a></li>
								<li><a href="<?= site_url('home/lista_inscricao'); ?>">Minhas Inscrições</a></li>
      							<li><a href="<?php echo site_url('usuarios/logoff'); ?>">Logoff</a></li>
    						</ul>
						</li>

					</ul>
				</div>
			</nav>
	  </div>
	</header>
	<!-- // menu -->
