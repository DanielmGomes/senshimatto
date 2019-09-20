<section id="fh5co-services" data-section="services">
	<div class="fh5co-services">
		<div class="container">
			<div class="row">
				<div class="col-md-12 section-heading text-center">
					<h2 class="to-animate"><span>Cadastro de Competições</span></h2>
				</div>

				<div class="container">
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
                     						<span class="round-tabs four">
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

							<!--
							/*
							* conteudo navs
							*/
							-->
							<form action="<?php echo site_url('inscricao/save_inscricao_competicao'); ?>" method="POST">
							<div class="tab-content">
								<div class="tab-pane fade in active" id="edital">
									<h3 class="head text-center">Dados do Atleta</h3>

									<div class="row">
										<div class="col-md-1 col-sm-6 col-xs-12 form-group"></div>
										<div class="col-md-4 col-sm-6 col-xs-12 form-group">
											<span class="round-tabs one" style="margin-top: 20px;">
												<i class="fa fa-user"></i>
											</span>
											<h3 class="head" style="margin-left: 80px; color: green;">Nome Completo</h3>
											<p style="margin-left: 80px;"><b><?= $nome; ?></b></p>
										</div>
										<div class="col-md-3 col-sm-6 col-xs-12 form-group"></div>
										<div class="col-md-4 col-sm-6 col-xs-12 form-group">
											<span class="round-tabs one" style="margin-top: 20px;">
												<i class="fa fa-calendar"></i>
											</span>
											<h3 class="head" style="margin-left: 80px; color: green;">Idade</h3>
											<p style="margin-left: 80px;"><b><?= $idade; ?> Anos</b></p>
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
											<h3 class="head" style="margin-left: 80px; color: green;">Peso</h3>
											<p style="margin-left: 80px;"><b>Kg <?= $peso; ?></b></p>
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
										<br>
										<div class="ln_solid"></div>
										<div class="form-group">
											<div class="col-md-3 col-sm-6 col-xs-12 form-group"></div>
											<div class="col-md-8 col-sm-6 col-xs-12 form-group">
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
												<a href="#edital" data-toggle="tab">
													<button type="button" class="btn btn-success btn-circle btn-xl"><i class="fa fa-arrow-circle-left"></i> Voltar</button>
												</a>

												<button type="button" class="btn btn-primary"  class="btn btn-block" data-toggle="modal" data-target="#modalExemplo">Editar</button>


												<a href="#confirmar_inscricao" data-toggle="tab">
													<button type="button" class="btn btn-success btn-circle btn-xl" >Continuar <i class="fa fa-arrow-circle-right"></i></button>
												</a>

											</div>
											<div class="col-md-2 col-sm-9 col-xs-12 col-md-offset-3"></div>

										</div>
									</div>

									<div class="row">
										<div class="col-md-1 col-sm-6 col-xs-12 form-group"></div>
										<div class="col-md-10 col-sm-6 col-xs-12 form-group">

										</div>
										<div class="col-md-1 col-sm-6 col-xs-12 form-group"></div>
									</div>
								</div>
								<div class="tab-pane fade" id="confirmar_inscricao">
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
										<div class="col-md-2"></div>
										<div class="col-md-6 col-sm-6 col-xs-12 form-group">
											<?php
												if ($idade <= 18){
													echo '<h3 class="head" style="margin-left: 80px; color: green;">Valor da Inscrição R$ 50,00</h3>';
												}else{
													#maior de 18 anos
													echo '<h3 class="head" style="margin-left: 80px; color: red;">Valor da Inscrição R$ 70,00</h3>';

												}
											?>
										</div>
										<div class="col-md-3"></div>
									</div>
									<div class="row">
										<br>
										<div class="ln_solid"></div>
										<div class="form-group">
											<div class="col-md-3 col-sm-6 col-xs-12 form-group"></div>
											<div class="col-md-8 col-sm-6 col-xs-12 form-group">
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
												<a href="#edital" data-toggle="tab">
													<button type="button" class="btn btn-success btn-circle btn-xl"><i class="fa fa-arrow-circle-left"></i> Voltar</button>
												</a>

												<a href="#confirmar_inscricao" data-toggle="tab">
													<button type="button" class="btn btn-success btn-circle btn-xl" data-toggle="modal" data-target="#confirmar">Continuar <i class="fa fa-arrow-circle-right"></i></button>
												</a>

											</div>
											<div class="col-md-2 col-sm-9 col-xs-12 col-md-offset-3"></div>

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

<script>
    $(function(){
        $('a[title]').tooltip();
    });

</script>


<!-- Modal -->
<div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<label for="" style="color: grey; ">Editar</label>
				<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal form-label-left input_mask" action="<?php echo site_url('competicao/edita_inscricao'); ?>" method="POST">
					<div class="row">
						<div class="col-md-6">
							<label for="">Nome Completo</label>
							<input type="text" name="nome" value="<?= $nome; ?>" class="form-control">
						</div>
						<div class="col-md-6">
							<label for="">Nascimento</label>
							<input type="date" class="form-control" name="nascimento" value="<?= $nascimento; ?>" >
						</div>
					</div>
					<br>

					<div class="row">
						<div class="col-md-6">
							<label for="">CPF</label>
							<input type="text" name="cpf" value="<?= $cpf; ?>" class="cpf form-control" id="cpf">
						</div>
						<div class="col-md-6">
							<label for="">Sexo</label>
							<select name="sexo" id="" class="form-control">
								<option value="<?= $sexo; ?>"><?= $sexo; ?></option>
								<option value="masculino">Masculino</option>
								<option value="feminino">Feminino</option>
							</select>
						</div>
					</div>
					<br>

					<div class="row">
						<div class="col-md-6">
							<label for="">Academia</label>
							<select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="academia">
								<option value="<?= $academia; ?>"><?= $academia; ?></option>
								<?php foreach ($lista_academia as $lista_academias) : ?>
									<option value="<?= $lista_academias['academia']; ?>"><?= $lista_academias['academia']; ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="col-md-6">
							<label for="">Professor</label>
							<select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="professor">
								<option value="<?= $professor; ?>"><?= $professor; ?></option>
								<?php foreach ($lista_academia as $lista_academias) : ?>
									<option value="<?= $lista_academias['responsavel']; ?>"><?= $lista_academias['responsavel']; ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					<br>

					<div class="row">
						<div class="col-md-6">
							<label for="">Faixa</label>
							<select class="selectpiker form-control" data-show-subtext="trye" data-live-search="true" name="faixa">
								<option value="<?= $faixa; ?>"><?= $faixa; ?></option>
								<option value="branca">Branca</option>
								<option value="cinza">Cinza</option>
								<option value="amarela">Amarela</option>
								<option value="laranja">Laranja</option>
								<option value="verde">Verde</option>
								<option value="azul">Azul</option>
								<option value="roxa">Roxa</option>
								<option value="marrom">Marrom</option>
								<option value="preta">Preta</option>
								<option value="coral">Coral</option>
							</select>
						</div>
						<div class="col-md-6">
							<label for="">Peso</label>
							<input type="text" class="peso form-control" id="peso" name="peso" value="<?= $peso; ?>">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
						<button type="submit=" class="btn btn-primary">Salvar mudanças</button>
					</div>
				</form>
			</div>

		</div>
	</div>
</div>

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



