<form class="form-horizontal form-label-left input_mask" action="pages/cadastros/salvaCompetidor.php" method="POST" enctype="multipart/form-data">
	<div id="addRegistro" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addUsuarioModalLabel">Registro de Competidor</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" id="insert_form">	

						<div class="form-group">
							<div class="form-row">
								<div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
									<input type="text" class="form-control has-feedback-left" placeholder="Usuario" name="usuario">
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="form-row">
								<div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
									<input type="email" class="form-control has-feedback-left" placeholder="E-mail" name="email">
								</div>
							</div>
						</div>	

						<div class="form-group">
							<div class="form-row">
								<div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
									<input type="password" class="form-control has-feedback-left" placeholder="Senha" name="senha">
								</div>						
							</div>
						</div>
						
						<div class="form-group row">
							<div class="col-sm-10">
								<button type="submit" class="btn btn-success" value="cadastrar" name="cadastrar">Cadastrar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</form>

<form class="form-horizontal form-label-left input_mask" action="pages/login/login.php" method="POST" enctype="multipart/form-data">
<div id="addEntrar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addUsuarioModalLabel">Login Competidor</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" id="insert_form">
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
								<input type="text" class="form-control has-feedback-left" placeholder="Usuario" name="usuario">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
								<input type="password" class="form-control has-feedback-left" placeholder="Senha" name="senha">
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-10">
							<button type="submit" class="btn btn-success" value="entrar" name="entrar">Entrar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</form>
