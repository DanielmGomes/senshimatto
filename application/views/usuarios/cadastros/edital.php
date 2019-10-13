<section id="fh5co-services" data-section="services">
	<div class="fh5co-services">
		<div class="container">
			<div class="row">
				<div class="col-md-12 section-heading text-center">
					<h2 class="to-animate"><span>Cadastro de Competições</span></h2>
				</div>

				<div class="container">
					<br>
					<br>
					<div class="row">
						<div class="board">
							<div class="board-inner">

								<ul class="nav nav-tabs" id="myTab">
									<div class="liner"></div>
									<li>
										<a>
                      						<span class="round-tabs one">
                      	        				<i class="fas fa-home"></i>
                      						</span>
										</a>
									</li>
									<li>
										<a>
                     						<span class="round-tabs five">
                         						<i class="fas fa-user"></i>
                     						</span>
										</a>
									</li>
									<li>
										<a>
											<span class="round-tabs five">
												<i class="fas fa-id-card"></i>
											</span>
										</a>
									</li>
									<li>
										<a>
                         					<span class="round-tabs five">
                              					<i class="fa fa-check"></i>
                         					</span>
										</a>
									</li>
									<li>
										<a>
                         					<span class="round-tabs five">
                              					<i class="fa fa-list"></i>
                         					</span>
										</a>
									</li>
								</ul>
							</div>

							<div class="tab-content">
								<div class="tab-pane fade in active">
									<h3 class="head text-center">Edital da Competição</h3>
									<p class="narrow text-center">
										Faça abaixo sua inscrição na competição ou verifique o edital.
									</p>
									<?php
									if(isset($_SESSION['duplicado'])):
										?>
										<div class="notification is-danger">
											<p class="text-center">
											<div class="alert alert-danger" role="alert">
												<p class="text-center">
													ERRO: usuario já está cadastrado na competição !
												</p>
											</div>
											</p>
										</div>
									<?php
									endif;
									unset($_SESSION['duplicado']);
									?>
									<p class="text-center">
										<a href="<?= site_url('competicao/dados_atleta'); ?>" class="btn btn-success btn-outline-rounded green"> Inscrever-se</a>
										<a href="<?= base_url(); ?>public/edital/edital.pdf" target="_blank" class="btn btn-danger btn-outline-rounded red"> Download Edital</a>
										<a href="<?= site_url('competicao/inscritos'); ?>" class="btn btn-danger btn-outline-rounded green"> Inscritos</a>
									</p>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
