<section id="fh5co-services" data-section="services">
	<div class="fh5co-services">
		<div class="container">
			<div class="row">
				<div class="col-md-12 section-heading text-center">
					<h2 class="to-animate"><span>Acessar Minha Conta</span></h2>
				</div>
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

                <br>
              <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12 form-group"></div>

                <div class="col-md-4 col-sm-6 col-xs-12 form-group">
                    <button type="submit" class="btn btn-block" id="btn-login" value="enviar">Login</button>
                    <span class="help-block"></span>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12 form-group"></div>
              </div>
            </form>

		</div>
	</div>
</section>