<section id="fh5co-services" data-section="services">
	<div class="fh5co-services">
		<div class="container">
			<div class="row">
				<div class="col-md-12 section-heading text-center">
					<h2 class="to-animate"><span>Cadastro de Competições</span></h2>
				</div>
			</div>

			<div class="contact-grids row">
				<div class=" col-lg-6 contact-form">
					<span><img src="<?php echo base_url(); ?>public/images/destaque/cartaz01.jpeg" alt="" style="height: 500px; width: 400px;"></span>
				</div>
				<div class=" col-lg-6 map">
				<form class="form-horizontal form-label-left input_mask" action="<?php echo site_url('inscricao/save_inscricao_competicao'); ?>" method="POST">
						<div class="row">
							<div class="col-md-5 col-sm-6 col-xs-12 form-group">
								<label for="" style="color: red;">Nome Completo</label>
								<input type="text" name="nomeCompetidor" value="<?= $nome;?>" class="form-control" readonly>
							</div>		

							<div class="col-md-1"></div>

							<div class="col-md-5 col-sm-6 col-xs-12 form-group">
								<label for="" style="color: red;">Nascimento</label>
								<input type="date" class="form-control" name="nascimentoCompetidor" value="<?= $nascimento; ?>" readonly>
							</div>	
						</div>

						<div class="row">
							<div class="col-md-5 col-sm-6 col-xs-12 form-group">
								<label for="" style="color: red;">CPF</label>
								<input type="text" class="cpf form-control" name="cpfCompetidor" id="cpf" value="<?= $cpf; ?>" readonly>
							</div>	

							<div class="col-md-1"></div>

							<div class="col-md-5 col-sm-6 col-xs-12 form-group">
								<label for="" style="color: red; ">Sexo</label>
								<select name="sexoCompetidor" class="form-control" readonly>
									<option value="<?= $sexo; ?>"><?= $sexo; ?></option>
								</select>
							</div>			
						</div>

						<div class="row">
							<div class="col-md-5 col-sm-6 col-xs-12 form-group">
								<label for="" style="color: red; ">Academia</label>
								<select name="academiaCompetidor" class="form-control" readonly>
									<option value="<?= $academia; ?>"><?= $academia; ?></option>
								</select>
							</div>			

							<div class='col-md-1'></div>

							<div class="col-md-5 col-sm-6 col-xs-12 form-group">
								<label for="" style="color: red; ">Professor</label>
								<select name="professorCompetidor" class="form-control" readonly>
									<option value="<?= $professor; ?>"><?= $professor; ?></option>
								</select>
							</div>
						</div>

						<div class='row'>
							<div class="col-md-5 col-sm-6 col-xs-12 form-group">
								<label for="" style="color: red; ">Faixa</label>
								<select name="faixaCompetidor" class="form-control" readonly>
									<option value="<?= $faixa; ?>"><?= $faixa; ?></option>
								</select>
							</div>			

							<div class='col-md-1'></div>

							<div class="col-md-5 col-sm-6 col-xs-12 form-group">
								<label for="" style="color: red; ">Peso</label>
								<input type="text" class="peso form-control" name="pesoCompetidor" value="<?= $peso; ?>" readonly>
							</div>
						</div>

						<div class='row'>
							<div class="col-md-5 col-sm-6 col-xs-12 form-group">
								<label for="" style="color: red; ">Competir Absoluto</label>
								<select name="absoluto" class="form-control">
									<option value="nao">-</option>
									<option value="sim">Sim</option>
									<option value="nao">Não</option>
								</select>
							</div>			

							<div class='col-md-1'></div>

							<div class="col-md-5 col-sm-6 col-xs-12 form-group">
								<label for="" style="color: red; ">Categoria</label>
								<input type="text" class="form-control" name="categoriaCompetidor" value="<?= $categoria; ?>" readonly>
							</div>
						</div>

						<!-- sem campo -->
						<input type="text" name="idCompetidor" value="<?= $idUsuario; ?>" hidden>
						<input type="text" name="whatsappCompetidor" value="<?= $whatsapp; ?>" hidden>
						<input type="text" name="emailCompetidor" value="<?= $email; ?>" hidden>
						<input type="text" name="enderecoCompetidor" value="<?= $endereco; ?>" hidden>
						<input type="text" name="bairroCompetidor" value="<?= $bairro; ?>" hidden>
						<input type="text" name="estadoCompetidor" value="<?= $estado; ?>" hidden>
						<input type="text" name="cidadeCompetidor" value="<?= $cidade; ?>" hidden>
						<input type="text" name="idadeCompetidor" value="<?= $idade; ?>" hidden>
						<input type="text" name="idCompeticao" value="<?= $idCompeticao; ?>" hidden>
						<input type="text" name="nomeCompeticao" value="<?= $nomeCompeticao; ?>" hidden>
						<input type="text" name="enderecoCompeticao" value="<?= $enderecoCompeticao; ?>" hidden>
						<input type="text" name="estadoCompeticao" value="<?= $estadoCompeticao; ?>" hidden>
						<input type="text" name="cidadeCompeticao" value="<?= $cidadeCompeticao; ?>" hidden>
						<input type="text" name="dataCompeticao" value="<?= $dataCompeticao; ?>" hidden>
						<input type="text" name="descricaoCompeticao" value="<?= $descricaoCompeticao; ?>" hidden>
						<input type="text" name="cartazCompeticao" value="<?= $cartazCompeticao; ?>" hidden>
						<!-- //sem campo -->

						<div class="row">
							<br>
							<div class="ln_solid"></div>
							<div class="form-group">
								<div class="col-md-12 col-sm-9 col-xs-12 col-md-offset-3">
									<button type="submit" class="btn btn-success" value="enviar" class="btn btn-block">Salvar</button>
								</div>
							</div>
						</div> 
					</form>
				</div>
			</div>
		</div>
	</div>
</section>