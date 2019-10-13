<section id="fh5co-services" data-section="services">
	<div class="fh5co-services">
		<div class="container">
			<div class="row">
				<div class="col-md-12 section-heading text-center">
					<h2 class="to-animate"><span>Acessar Minha Conta Professores</span></h2>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
                    
                    <?php
                        /**
                            * função que exibe alerta em caso de erro de não preenchimento do campo usuario
                        */
					    if(isset($_SESSION['erro_usuario'])):
					?>
                    <div class="alert alert-danger" role="alert">
                        <p>Preencha o Campo de Usuario.</p>
					</div>
                    <?php
					    endif;
					    unset($_SESSION['erro_usuario']);
					?>

                    <?php
                        /**
                            * função que exibe alerta em caso de erro de usuario ou senha
                        */
					    if(isset($_SESSION['erro_login'])):
					?>
                    <div class="alert alert-danger" role="alert">
                        <p>Usuario ou Senha Invalidos</p>
					</div>
                    <?php
					    endif;
					    unset($_SESSION['erro_login']);
					?>
				</div>
				<div class="col-md-4"></div>
			</div>

            <form id="login_form" action="<?php echo site_url('professores/login'); ?>" method="post">
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