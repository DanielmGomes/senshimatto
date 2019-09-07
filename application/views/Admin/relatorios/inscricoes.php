<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Relatório de Inscrições</h3>
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
                      		<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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
                                		echo '<tr>';
                                			echo '<td>' . $inscricoes['nomeCompetidor'] . '</td>';
                                			echo '<td>' . $inscricoes['faixaCompetidor'] . '</td>';
                                			echo '<td>' . $inscricoes['categoriaCompetidor'] . '</td>';
                                			echo '<td>' . $inscricoes['idadeCompetidor'] . '</td>';
                                			echo '<td>' . $inscricoes['pesoCompetidor'] . '</td>';
                                			echo '<td>' . $inscricoes['nomeCompeticao'] . '</td>';
                                			echo '<td>' . $comp = $dataComp[2] .'/' . $dataComp[1] . '/'. $dataComp[0]. '</td>';
                                			echo '<td>' . $inscricoes['absoluto'] . '</td>';
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
