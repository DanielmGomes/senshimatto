<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Boleto</title>

	<link rel="shortcut icon" href="">
	<!-- css -->
	<link rel="stylesheet" href="<?= base_url(); ?>public/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="<?= base_url(); ?>public/css/icomoon.css">
	<!-- Simple Line Icons -->
	<link rel="stylesheet" href="<?= base_url(); ?>public/css/simple-line-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="<?= base_url(); ?>public/css/bootstrap.css">
	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="<?= base_url(); ?>public/css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>public/css/owl.theme.default.min.css">
	<!-- Style -->
	<link rel="stylesheet" href="<?= base_url(); ?>public/css/style.css">
	<!-- select com pesquisa -->
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />

</head>
<body>
	<?= $boleto; ?>
	<br>
	<div class="form-group">
		<button type="submit" class="btn btn-success"  value="print" onclick="window.print()">Imprimir</button>
		<a href="<?= site_url('home/lista_inscricao'); ?>">
			<button type="button" class="btn btn-primary"  >Voltar</button>
		</a>
	</div>
</body>
</html>





