<?php
	include '../include/header.php';
?>

<br>
<div class="container">
  <div class="row">
  	<div class="col-md-4"></div>
    <div class="col-md-4">
			<h1>Cadastro de competidores</h1>
			<form action="">	
				<div class="form-group">
					<div class="form-row">
						<div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
		          <input type="text" class="form-control has-feedback-left" placeholder="Nome do Competidor" name="nome" maxlength="60" required="">
		        </div>
					</div>
				</div>

				<div class="form-group">
					<div class="form-row">
						<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
							<input type="text" class="form-control has-feedback-left" placeholder="CPF" name="cpf" maxlength="60" required="">
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
							<input type="text" class="form-control has-feedback-left" placeholder="CPF" name="cpf" maxlength="60" required="">
						</div>
					</div>
				</div>
			</form>
    </div>
    <div class="col-md-4"></div>
  </div>
</div>

<?php
	include '../include/footer.php';
?>