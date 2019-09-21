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
												<p style="margin-left: 80px;"><b><?= $nome; ?></b></p>
											</div>
										</div>

										<div class="row">
											<div class="col-md-1 col-sm-6 col-xs-12 form-group"></div>
											<div class="col-md-4 col-sm-6 col-xs-12 form-group">
											<span class="round-tabs one" style="margin-top: 20px;">
												<i class="fas fa-level-up-alt"></i>
											</span>
												<h3 class="head" style="margin-left: 80px; color: green;">Graduação</h3>
												<p style="margin-left: 80px;"><b><?= $faixa; ?></b></p>
											</div>
											<div class="col-md-3 col-sm-6 col-xs-12 form-group"></div>
											<div class="col-md-4 col-sm-6 col-xs-12 form-group">
											<span class="round-tabs one" style="margin-top: 20px;">
												<i class="fas fa-weight-hanging"></i>
											</span>
												<h3 class="head" style="margin-left: 80px; color: green;">Categoria</h3>
												<p style="margin-left: 80px;">
													<b>Categoria: <?= $categoria_peso;; ?>,</b>
													<b><?= $peso; ?> kg</b></p>
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
														$valor = 50.00;
													}else{
														echo '<p style="margin-left: 80px; color: red;"><b>R$ 70,00</b></p>';
														$valor = 70.00;
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
													<script>
                                                        function check(absoluto) {
                                                            document.getElementById("competir_absoluto").value=absoluto;
                                                        }
													</script>

													<input type="radio" name="absoluto" style="margin-left: 80px;" onclick="check(this.value)" value="sim"> Sim
													<input type="radio" name="absoluto" style="margin-left: 30px;" onclick="check(this.value)" value="nao"> Não

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
															<a href="<?= site_url('competicao/dados_atleta'); ?>">
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
				<label for="" style="color: grey; ">Confirmar Inscrição</label>
				<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal form-label-left input_mask" action="<?php echo site_url('inscricao/save_inscricao_competicao'); ?>" method="POST">
					<p>
						confirmar inscrição na competicão <?= $nomeCompeticao; ?>, valor de R$ <?= $valor; ?> ?
					</p>
					<div class="modal-footer">

						<input type="text" name="idCompetidor" hidden value="<?= $idUsuario; ?>">
						<input type="text" name="nomeCompetidor" hidden value="<?= $nome; ?>">
						<input type="text" name="nascimentoCompetidor" hidden value="<?= $nascimento; ?>">
						<input type="text" name="cpfCompetidor" hidden value="<?= $cpf; ?>">
						<input type="text" name="sexoCompetidor" hidden value="<?= $sexo; ?>">
						<input type="text" name="whatsappCompetidor" hidden value="<?= $whatsapp; ?>">
						<input type="text" name="emailCompetidor" hidden value="<?= $email; ?>">
						<input type="text" name="enderecoCompetidor" hidden value="<?= $endereco; ?>">
						<input type="text" name="bairroCompetidor" hidden value="<?= $bairro; ?>">
						<input type="text" name="estadoCompetidor" hidden value="<?= $estado; ?>">
						<input type="text" name="cidadeCompetidor" hidden value="<?= $cidade; ?>">
						<input type="text" name="academiaCompetidor" hidden value="<?= $academia; ?>">
						<input type="text" name="professorCompetidor" hidden value="<?= $professor; ?>">
						<input type="text" name="faixaCompetidor" hidden value="<?= $faixa; ?>">
						<input type="text" name="pesoCompetidor" hidden <?= $peso; ?>>
						<input type="text" name="idCompeticao" hidden value="<?= $idCompeticao; ?>">
						<input type="text" name="nomeCompeticao" hidden value="<?= $nomeCompeticao; ?>">
						<input type="text" name="enderecoCompeticao" hidden value="<?= $enderecoCompeticao; ?>">
						<input type="text" name="estadoCompeticao" hidden value="<?= $estadoCompeticao; ?>">
						<input type="text" name="cidadeCompeticao" hidden value="<?= $cidadeCompeticao; ?>">
						<input type="text" name="dataCompeticao" hidden value="<?= $dataCompeticao; ?>">
						<input type="text" name="descricaoCompeticao" hidden value="<?= $descricaoCompeticao; ?>">
						<input type="text" name="cartazCompeticao" hidden value="<?= $cartazCompeticao; ?>">
						<input type="text" id="competir_absoluto" hidden name="absoluto">
						<input type="text" name="categoriaCompetidor" hidden value="<?= $categoria_peso; ?>">
						<input type="text" name="pesoCompetidor" hidden value="<?= $peso; ?>">
						<input type="text" name="idadeCompetidor" hidden value="<?= $idade; ?>">
						<input type="text" name="valorInscricao" hidden value="<?= $valor; ?>">
						<input type="text" name="situacaoPagamento" hidden value="em aberto">

						<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
						<button type="submit=" class="btn btn-primary">Confirmar</button>
					</div>
				</form>
			</div>

		</div>
	</div>
</div>



