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
                      						<span class="round-tabs five">
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
                         					<span class="round-tabs four">
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

							<!--
							/*
							* conteudo navs
							*/
							-->
							<form action="<?php echo site_url('inscricao/save_inscricao_competicao'); ?>" method="POST">
								<div class="tab-content">
									<div class="tab-pane fade in active">
										<h3 class="head text-center">formas de Pagamento</h3>
									</div>
									<br>
									<!--
									<p class="text-center">
										clique abaixo para imprimir seu boleto.
									</p>
									<p class="text-center">
										<a href="<?= site_url('inscricao/boleto'); ?>" target="_blank" class="btn btn-danger btn-outline-rounded red">Imprimir Boleto</a>
									</p>
									<div class="clearfix"></div>
									<br>
									<h3 class="head text-center">Ou</h3>
									-->
									<p class="text-center">
										<b>
											deposite o valor de sua inscrição na conta abaixo.
										</b>
									</p>
									<p class="text-center">
										<br>
										Banco: Bradesco Poupança
										<br>
										Ag: 0120
										<br>
										CC: 1010879-9
										<br>
										Titular: Danilo Gomes Medeiros
										<br>
										<br>
										OBS: Inscrições somente serão efetuadas mediante de apresentação do comprovante de deposito.
									</p>
									<div class="row">
										<div class="col-md-2 col-sm-6 col-xs-12 form-group"></div>
										<div class="col-md-3 col-sm-6 col-xs-12 form-group">
											<a href="<?= site_url('competicao/edital'); ?>">
												<h2 class="head">
													<i class="fas fa-arrow-circle-left" style="color: red;"></i><span style="margin-left: 10px; color: red;">Edital</span>
												</h2>
											</a>
										</div>
										<div class="col-md-3 col-sm-6 col-xs-12 form-group"></div>
										<div class="col-md-3 col-sm-6 col-xs-12 form-group">
											<a href="<?= site_url('competicao/inscritos'); ?>">
												<h2 class="head">
													<span style="margin-right: 10px; color: red;">Inscritos</span><i class="fas fa-arrow-circle-right" style="color: red;"></i>
												</h2>
											</a>
										</div>
									</div>

								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>



