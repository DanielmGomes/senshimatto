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
                                echo '</tr>';     
                            }
                        }
                        ?>
                      </tbody>
                    </table>
		</div>
	</div>
</section>