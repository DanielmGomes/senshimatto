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
											<span class="round-tabs four">
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

							<!--
							/*
							* conteudo navs
							*/
							-->
							<form action="<?php echo site_url('inscricao/save_inscricao_competicao'); ?>" method="POST">
								<div class="tab-content">
									<div class="tab-pane fade in active">
										<h3 class="head text-center">Confirmar Inscrição</h3>

										<div class="row">
											<div class="col-md-1 col-sm-6 col-xs-12 form-group"></div>
											<div class="col-md-4 col-sm-6 col-xs-12 form-group">
											<span class="round-tabs one" style="margin-top: 20px;">
												<i class="fa fa-user"></i>
											</span>
												<h3 class="head" style="margin-left: 80px; color: green;">Competição</h3>
												<p style="margin-left: 80px;"><b><?= $nomeCompeticao; ?></b></p>
											</div>
											<div class="col-md-3 col-sm-6 col-xs-12 form-group"></div>
											<div class="col-md-4 col-sm-6 col-xs-12 form-group">
											<span class="round-tabs one" style="margin-top: 20px;">
												<i class="fa fa-calendar"></i>
											</span>
												<h3 class="head" style="margin-left: 80px; color: green;">Competidor</h3>
												<p style="margin-left: 80px;"><b><?= $nome; ?> Anos</b></p>
											</div>
										</div>

										<div class="row">
											<div class="col-md-1 col-sm-6 col-xs-12 form-group"></div>
											<div class="col-md-4 col-sm-6 col-xs-12 form-group">
											<span class="round-tabs one" style="margin-top: 20px;">
												<i class="fa fa-level-up"></i>
											</span>
												<h3 class="head" style="margin-left: 80px; color: green;">Graduação</h3>
												<p style="margin-left: 80px;"><b><?= $faixa; ?></b></p>
											</div>
											<div class="col-md-3 col-sm-6 col-xs-12 form-group"></div>
											<div class="col-md-4 col-sm-6 col-xs-12 form-group">
											<span class="round-tabs one" style="margin-top: 20px;">
												<i class="fa fa-tachometer"></i>
											</span>
												<h3 class="head" style="margin-left: 80px; color: green;">Categoria / Peso</h3>
												<p style="margin-left: 80px;"><b>Categoria: <?= $categoria_peso;; ?> |  Kg <?= $peso; ?></b></p>
											</div>
										</div>

										<div class="row">
											<div class="col-md-1 col-sm-6 col-xs-12 form-group"></div>
											<div class="col-md-4 col-sm-6 col-xs-12 form-group">
											<span class="round-tabs one" style="margin-top: 20px;">
												<i class="fa fa-home"></i>
											</span>
												<h3 class="head" style="margin-left: 80px; color: green;">Academia</h3>
												<p style="margin-left: 80px;"><b><?= $academia; ?></b></p>
											</div>
											<div class="col-md-3 col-sm-6 col-xs-12 form-group"></div>
											<div class="col-md-4 col-sm-6 col-xs-12 form-group">
											<span class="round-tabs one" style="margin-top: 20px;">
												<i class="fa fa-user"></i>
											</span>
												<h3 class="head" style="margin-left: 80px; color: green;">Professor</h3>
												<p style="margin-left: 80px;"><b><?= $professor; ?></b></p>
											</div>
										</div>

										<div class="row">
											<div class="col-md-1 col-sm-6 col-xs-12 form-group"></div>
											<div class="col-md-4 col-sm-6 col-xs-12 form-group">
											<span class="round-tabs one" style="margin-top: 20px;">
												<i class="fas fa-money-bill-alt"></i>
											</span>
												<h3 class="head" style="margin-left: 80px; color: green;">Inscrição</h3>
												<?php
													if ($idade < 18){
														echo '<p style="margin-left: 80px; color: red;"><b>R$ 50,00</b></p>';
													}else{
														echo '<p style="margin-left: 80px; color: red;"><b>R$ 70,00</b></p>';
													}
												?>
											</div>
											<div class="col-md-3 col-sm-6 col-xs-12 form-group"></div>
											<div class="col-md-4 col-sm-6 col-xs-12 form-group">
											<span class="round-tabs one" style="margin-top: 20px;">
												<i class="fa fa-user"></i>
											</span>
												<h3 class="head" style="margin-left: 80px; color: green;">Comp. Absoluto</h3>
												<p>
													<input type="radio" name="absoluto" value="sim" style="margin-left: 80px;"> Sim
													<input type="radio" name="absoluto" value="nao" style="margin-left: 30px;"> Não
												</p>

											</div>
										</div>

										<div class="row">
											<br>
											<div class="ln_solid"></div>
											<div class="form-group">
												<div class="col-md-12 col-sm-6 col-xs-12 form-group">
													<?php
													if(isset($_SESSION['duplicado'])):
														?>
														<div class="notification is-danger">
															<span class="help-block" style="color: red;">ERRO: Usuário já cadastrado.</span>
														</div>
													<?php
													endif;
													unset($_SESSION['duplicado']);
													?>

													<div class="row">
														<div class="col-md-2 col-sm-6 col-xs-12 form-group"></div>
														<div class="col-md-3 col-sm-6 col-xs-12 form-group">
															<a href="<?= site_url('competicao/edital'); ?>">
																<h2 class="head">
																	<i class="fas fa-arrow-circle-left" style="color: red;"></i><span style="margin-left: 10px; color: red;">Anterior</span>
																</h2>
															</a>
														</div>
														<div class="col-md-3 col-sm-6 col-xs-12 form-group"></div>
														<div class="col-md-3 col-sm-6 col-xs-12 form-group">
															<a data-toggle="modal" data-target="#confirmar">
																<h2 class="head">
																	<span style="margin-right: 10px; color: red;">Proximo</span><i class="fas fa-arrow-circle-right" style="color: red;"></i>
																</h2>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

									</div>
									<div class="clearfix"></div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Modal -->
<div class="modal fade" id="confirmar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<label for="" style="color: grey; ">Editar</label>
				<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal form-label-left input_mask" action="<?php echo site_url('inscricao/teste'); ?>" method="POST">

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
						<button type="submit=" class="btn btn-primary">Salvar mudanças</button>
					</div>
				</form>
			</div>

		</div>
	</div>
</div>



