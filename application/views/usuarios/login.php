<section id="fh5co-services" data-section="services">
	<div class="fh5co-services">
		<div class="container">
			<div class="row">
				<div class="col-md-12 section-heading text-center">
					<h2 class="to-animate"><span>Acessar Minha Conta</span></h2>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<?php
					if(isset($_SESSION['nao_autenticado'])):
						?>
						<div class="notification is-danger">
							<span class="help-block" style="color: red;">ERRO: Usuário ou senha inválidos.</span>
						</div>
					<?php
					endif;
					unset($_SESSION['nao_autenticado']);
					?>
				</div>
				<div class="col-md-4"></div>
			</div>

            <form id="login_form" action="<?php echo site_url('usuarios/login'); ?>" method="post">

                <div class="row">
                    <div class="col-md-4"></div>

                    <div class="col-md-4">
                        <input type="text" placeholder="usuario" id="username" name="username" class="form-control">
                        <span class="help-block"></span>
                    </div>
                    
                    <div class="col-md-4"></div>
                </div>

                <div class="row">
                    <div class="col-md-4"></div>

                    <div class="col-md-4">
                      <input type="password" placeholder="senha" name="password" class="form-control">
                    </div>

                    <div class="col-md-4"></div>
                </div>

				<!--
				<div class="row">
					<div class="col-md-4"></div>
					<div class="col-md-4">
						<a  data-toggle="modal" data-target="#recuperarSenha">
							<p>
								esqueci minha senha
							</p>
						</a>
					</div>
					<div class="col-md-4"></div>
				</div>
				-->

					<br>
              <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12 form-group"></div>

                <div class="col-md-4 col-sm-6 col-xs-12 form-group">
                    <button type="submit" class="btn btn-block" id="btn-login">Login</button>
                    <span class="help-block"></span>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12 form-group"></div>
              </div>
            </form>

		</div>
	</div>
</section>

<!-- Modal -->
<div class="modal fade" id="recuperarSenha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<label for="" style="color: grey; ">Recuperar Senha</label>
				<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal form-label-left input_mask" action="<?php echo site_url('usuarios/recuperar_senha'); ?>" method="POST">
					<div class="row">
						<div class="col-md-12">
							<label for="">Informe E-mail Cadastrado</label>
							<input type="email" name="email" class="form-control">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label for="">Informe Nova Senha</label>
							<input type="password" name="senha" class="form-control">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
						<button type="submit=" class="btn btn-primary">Enviar</button>
					</div>
				</form>
			</div>

		</div>
	</div>
</div>
