<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
<?php
	if(isset($_SESSION['cadastro_academia'])):
?>
								<div class="row">
									<div class="col-md-5 col-sm-6 col-xs-12 form-group">
										<label for="">Nome Completo</label>
										<input type="text" class="form-control" name="nome" maxlength="60" >
									</div>
									<div class="col-md-1"></div>
									<div class="col-md-5 col-sm-6 col-xs-12 form-group">
										<label for="">Nascimento</label>
										<input type="date" class="form-control" name="nascimento">
									</div>
								</div><?php
    endif;
    unset($_SESSION['cadastro_academia']);
?>

<?php
	if(isset($_SESSION['academia'])):
?>
									<div class="col-md-5 col-sm-6 col-xs-12 form-group">
										<label for="">CPF</label>
										<input type="text" class="cpf form-control" id="cpf" name="cpf">
									</div>
									<div class="col-md-1"></div>
									<div class="col-md-5 col-sm-6 col-xs-12 form-group">
										<label for="">Sexo</label>
										<br>
										<select name="sexo" class="form-control">
											<option value="">-</option>
											<option value="masculino">Masculino</option>
											<option value="feminino">Feminino</option>
										</select>
									</div><?php
    endif;
    unset($_SESSION['academia']);
?>
</body>
</html>