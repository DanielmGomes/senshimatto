<!-- page content -->
<div class="right_col" role="main">
	<!-- top tiles -->
	<div class="row tile_count">
		<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
			<span class="count_top"><i class="fa fa-user"></i> Total de Inscrições</span>
			<div class="count"><?= $total; ?></div>
			<span class="count_bottom"><i class="green"></i></span>
		</div>
		<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
			<span class="count_top"><i class="fa fa-clock-o"></i> Valor Total Evento</span>
			<div class="count">R$ <?= $total*70; ?></div>
			<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i></span>
		</div>
		<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
			<span class="count_top"><i class="fa fa-user"></i>Inscrições pagas</span>
			<div class="count green"><?= $inscricoes_pagas; ?></div>
			<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3</i></span>
		</div>
		<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
			<span class="count_top"><i class="fa fa-user"></i>Inscrições em Aberto</span>
			<div class="count"><?= $total - $inscricoes_pagas; ?></div>
			<span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i></i></span>
		</div>
		<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
			<span class="count_top"><i class="fa fa-user"></i> Total Pago</span>
			<div class="count">R$ <?= $inscricoes_pagas*70; ?></div>
			<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i></span>
		</div>
		<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
			<span class="count_top"><i class="fa fa-user"></i> Valor a Receber</span>
			<div class="count">R$ <?= ($total*70) - ($inscricoes_pagas*70); ?></div>
			<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i></span>
		</div>
	</div>
	<!-- /top tiles -->
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Caixa da Competicção</h3>
			</div>
			<div class="title_right">
				<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search"></div>
			</div>
		</div>

		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12"></div>

			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<ul class="nav navbar-right panel_toolbox">
							<li><button type="button" class="btn btn-primary"  class="btn btn-block" data-toggle="modal" data-target="#modalExemplo">Editar</button>
								</i></a>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#">Settings 1</a></li>
									<li><a href="#">Settings 2</a></li>
								</ul>
							</li>
							<li><a class="close-link"><i class="fa fa-close"></i></a></li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<table id="datatable-buttons" class="table table-striped table-bordered">
							<thead>
							<tr>
								<th>Competidor</th>
								<th>Faixa</th>
								<th>Evento</th>
								<th>Ações</th>
								<th>Situação</th>
							</tr>
							</thead>
							<tbody>
							<?php
							foreach ($inscricao as $inscricoes) {
								$dataComp = explode('-', $inscricoes['dataCompeticao']);
								$ano = $dataComp[0];
								$mes = $dataComp[1];
								$dia = $dataComp[2];
								echo '<tr>';
								echo '<td>' . $inscricoes['nomeCompetidor'] . '</td>';
								echo '<td>' . $inscricoes['faixaCompetidor'] . '</td>';
								echo '<td>' . $inscricoes['categoriaCompetidor'] . '</td>';
								echo '<td>' .
										'<form action="'. site_url('admin/edita_caixa') .'" method="post">' .
											'<input type="text" name="idInscricao" value="'. $inscricoes['idInscricao'] . '" hidden>'.
											'<input type="text" value="pago" name="situacaoPagamento" hidden>'.
											'<button type="submit" class="btn btn-primary"  class="btn btn-block" >Efetuar Pagamento' .
										'</form>'
									. '</td>';

								echo '<td>' . $inscricoes['situacaoPagamento'] . '</td>';
								echo '</tr>';
							}
							?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /page content -->

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
				<form class="form-horizontal form-label-left input_mask" action="<?= site_url('admin/cadastro_caixa'); ?>" method="POST">
					<div class="row">
						<div class="col-md-6">
							<input type="text" value="nao pago" name="situacaoPagamento" hidden>
							<label for="">Competidor</label>
							<input type="text" class="form-control" name="nomeCompetidor" value="" >

						</div>
						<div class="col-md-6">
							<label for="">Nascimento</label>
							<input type="date" class="form-control" name="nascimentoCompetidor" value="" >
						</div>
					</div>
					<br>

					<div class="row">
						<div class="col-md-6">
							<label for="">CPF</label>
							<input type="text" name="cpfCompetidor" value="" class="cpf form-control" id="cpf">
						</div>
						<div class="col-md-6">
							<label for="">Sexo</label>
							<select name="sexoCompetidor" id="" class="form-control">
								<option value=""></option>
								<option value="masculino">Masculino</option>
								<option value="feminino">Feminino</option>
							</select>
						</div>
					</div>
					<br>

					<div class="row">
						<div class="col-md-6">
							<label for="">Academia</label>
							<select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="academiaCompetidor">
								<option value=""></option>

							</select>
						</div>
						<div class="col-md-6">
							<label for="">Professor</label>
							<select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="professorCompetidor">

							</select>
						</div>
					</div>
					<br>

					<div class="row">
						<div class="col-md-6">
							<label for="">Faixa</label>
							<select class="selectpiker form-control" data-show-subtext="trye" data-live-search="true" name="faixaCompetidor">
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
							<input type="text" class="peso form-control" id="peso" name="pesoCompetidor" value="">
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
