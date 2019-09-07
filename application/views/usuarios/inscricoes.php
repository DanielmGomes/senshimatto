<section id="fh5co-services" data-section="services">
	<div class="fh5co-services">
		<div class="container">
			<div class="row">
				<div class="col-md-12 section-heading text-center">
					<h2 class="to-animate"><span>Minhas Inscrições</span></h2>
				</div>
			</div>

      		<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
		  		<thead>
					<tr>
						<th>Competidor</th>
						<th>Faixa</th>
						<th>Categoria</th>
						<th>Competição</th>
						<th>Data</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($inscricao as $inscricoes) {
							if ($inscricoes['idCompetidor'] == $idUsuario) {
                                $dataComp = explode('-', $inscricoes['dataCompeticao']);
                                $ano = $dataComp[0];
                                $mes = $dataComp[1];
                                $dia = $dataComp[2];
                                echo '<tr>';
                            	    echo '<td>' . $inscricoes['nomeCompetidor'] . '</td>';
                                	echo '<td>' . $inscricoes['faixaCompetidor'] . '</td>';
                                	echo '<td>' . $inscricoes['categoriaCompetidor'] . '</td>';
                                	echo '<td>' . $inscricoes['nomeCompeticao'] . '</td>';
                                	echo '<td>' . $comp = $dataComp[2] .'/' . $dataComp[1] . '/'. $dataComp[0]. '</td>';
                                	echo '<td>' .
											'<button type="button" class="btn btn-primary"  class="btn btn-block" data-toggle="modal" data-target="#modalExemplo">Editar</button>'
                                		. '</td>';
								echo '</tr>';
                            }
                        }
                    ?>
                </tbody>
            </table>
		</div>
	</div>
</section>

<!-- Modal -->
<div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<label for="" style="color: grey; ">Inscrição</label>
				<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
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
			</div>

		</div>
	</div>
</div>
