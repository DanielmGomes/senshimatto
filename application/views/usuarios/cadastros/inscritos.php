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
                         					<span class="round-tabs five">
                              					<i class="fa fa-check"></i>
                         					</span>
										</a>
									</li>
									<li>
										<a>
                         					<span class="round-tabs one">
                              					<i class="fa fa-list"></i>
                         					</span>
										</a>
									</li>
								</ul>
							</div>
							<form action="<?= site_url('inscricao/consulta_inscritos'); ?>" method="POST">
								<div class="tab-content">
									<form class="tab-pane fade in active">
										<h3 class="head text-center">Inscritos</h3>
										<div class="row">
											<div class="col-md-1 col-sm-6 col-xs-12 form-group"></div>
											<div class="col-md-4 col-sm-6 col-xs-12 form-group">
													<span class="round-tabs one" style="margin-top: 20px;">
														<i class="fas fa-user"></i>
													</span>
												<h3 class="head" style="margin-left: 80px; color: green;">Competição</h3>
												<p style="margin-left: 80px;">
													<select class="selectpicker" data-show-subtext="true" data-live-search="true" name="competicao">
														<option> --- </option>
														<option value="II Desafio Arena Jiu-Jitsu">II Desafio Arena Jiu-Jitsu</option>
													</select>
												</p>
											</div>
											<div class="col-md-3 col-sm-6 col-xs-12 form-group"></div>
											<div class="col-md-4 col-sm-6 col-xs-12 form-group">
													<span class="round-tabs one" style="margin-top: 20px;">
														<i class="fas fa-calendar-check"></i>
													</span>
												<h3 class="head" style="margin-left: 80px; color: green;">Sexo</h3>
												<p style="margin-left: 80px;">
													<select class="selectpicker" data-show-subtext="true" data-live-search="true" name="sexo">
														<option value=""> --- </option>
														<option value="masculino">Masculino</option>
														<option value="feminino">Feminino</option>
													</select>
												</p>
											</div>
										</div>

										<div class="row">
											<div class="col-md-1 col-sm-6 col-xs-12 form-group"></div>
											<div class="col-md-4 col-sm-6 col-xs-12 form-group">
													<span class="round-tabs one" style="margin-top: 20px;">
														<i class="fas fa-user"></i>
													</span>
												<h3 class="head" style="margin-left: 80px; color: green;">Graduação</h3>
												<p style="margin-left: 80px;">
													<select class="selectpicker" data-show-subtext="true" data-live-search="true" name="graduacao">
														<option value=""> --- </option>
														<option value="branca">Branca</option>
														<option value="azul">Azul</option>
														<option value="roxa">Roxa</option>
														<option value="marrom">Marrom</option>
														<option value="preta">Preta</option>
													</select>
												</p>
											</div>
											<div class="col-md-3 col-sm-6 col-xs-12 form-group"></div>
											<div class="col-md-4 col-sm-6 col-xs-12 form-group">
													<span class="round-tabs one" style="margin-top: 20px;">
														<i class="fas fa-calendar-check"></i>
													</span>
												<h3 class="head" style="margin-left: 80px; color: green;">Categoria</h3>
												<p style="margin-left: 80px;">
													<select class="selectpicker" data-show-subtext="true" data-live-search="true" name="categoria">
														<option value=""> --- </option>
														<option value="galo">Galo</option>
														<option value="pluma">Pluma</option>
														<option value="pena">Pena</option>
														<option value="leve">Leve</option>
														<option value="medio">Medio</option>
														<option value="meio-pesado">Meio-Pesado</option>
														<option value="pesado">Pesado</option>
														<option value="super-pesado">Super-Pesado</option>
														<option value="pesadissimo">Pesadissimo</option>
														<option value="extra-pesadissimo">Extra-Pesadissimo</option>
													</select>
												</p>
											</div>
										</div>

										<div class="row">
											<p class="text-center">
												<button type="submit" class="btn btn-danger btn-outline-rounded red">Pesquisar</button>
											</p>
										</div>
									</form>

									<div class="row">
										<div class="col-md-12 col-sm-12 col-xs-12"></div>

										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="x_panel">
												<div class="x_title">

													<div class="clearfix"></div>
												</div>
												<div class="x_content">
													<table id="datatable-buttons" class="table table-striped table-bordered">
														<thead>
														<tr>
															<th>Competidor</th>
															<th>Faixa</th>
															<th>Categoria</th>
															<th>Idade</th>
															<th>Peso</th>
															<th>Competição</th>
															<th>Data</th>
															<th>Absoluto</th>
														</tr>
														</thead>
														<tbody>
														<?php
														foreach ($inscricao as $inscricoes) {
															$dataComp = explode('-', $inscricoes['dataCompeticao']);
															$ano = $dataComp[0];
															$mes = $dataComp[1];
															$dia = $dataComp[2];
															if ($inscricoes['nomeCompeticao'] == $competicao){
																if ($inscricoes['sexoCompetidor'] == $sexo) {
																	if ($inscricoes['faixaCompetidor'] == $graduacao) {
																		if ($inscricoes['categoriaCompetidor'] == $categoria) {
																			echo '<tr>';
																			echo '<td>' . $inscricoes['nomeCompetidor'] . '</td>';
																			echo '<td>' . $inscricoes['faixaCompetidor'] . '</td>';
																			echo '<td>' . $inscricoes['categoriaCompetidor'] . '</td>';
																			echo '<td>' . $inscricoes['idadeCompetidor'] . '</td>';
																			echo '<td>' . $inscricoes['pesoCompetidor'] . '</td>';
																			echo '<td>' . $inscricoes['nomeCompeticao'] . '</td>';
																			echo '<td>' . $comp = $dataComp[2] . '/' . $dataComp[1] . '/' . $dataComp[0] . '</td>';
																			echo '<td>' . $inscricoes['absoluto'] . '</td>';
																			echo '</tr>';
																		}
																	}
																}
															}
														}
														?>
														</tbody>
													</table id="datatable-buttons">
												</div>

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
														<a href="<?= site_url('home'); ?>">
															<h2 class="head">
																<span style="margin-right: 10px; color: red;">Home</span><i class="fas fa-arrow-circle-right" style="color: red;"></i>
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
