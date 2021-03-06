<section id="fh5co-services" data-section="services">
	<div class="fh5co-services">
        <div class="container">
            <div class="row">
                <div class="board">
            		<!-- tabs de escolha de cadastro competidor / professor -->
                    <div>
                    	<ul class="nav nav-tabs" id="myTab">
                    		<div class="linha"></div>
                     		<li>
                    			<p></p>
                  			</li>
                 			<li>
                 			 	<a href="#competidor" data-toggle="tab" title="Sou Competidor">
                     				<span class="round-tabs two">
                         				<i class="glyphicon glyphicon-user"></i>
										<p>Competidor</p>
                     				</span> 
           						</a>
                 			</li>
                 			<li>
                 				<p></p>
                 			</li>
                     		<li>
								<a href="#professor" data-toggle="tab" title="Sou Professor">
									<span class="round-tabs four">
										<i class="glyphicon glyphicon-comment"></i>
										<p>Professor</p>
									</span>
                     			</a>
							</li>
							 <li>
								<p></p>
							 </li>
						</ul>
					</div>
					<!-- //tabs de escolha de cadastro competidor / professor -->

					<!--
						* corpo tab competidor	
					-->
					<div class="tab-content">
						<div class="tab-pane fade in active" id="competidor">
                          	<h3 class="head text-center">Cadastro de Competidor</h3>
							<form class="form-horizontal form-label-left input_mask" action="<?php echo site_url('usuarios/save_usuario'); ?>" method="POST">
								<div class="row">
									<div class="col-md-5 col-sm-6 col-xs-12 form-group">
										<label for="">Nome Completo</label>
										<input type="text" class="form-control" name="nome" maxlength="60" >
									</div>
									<div class="col-md-1"></div>
									<div class="col-md-5 col-sm-6 col-xs-12 form-group">
										<label for="">Nascimento</label>
										<input type="date" class="form-control" name="nascimento">
									</div>
								</div>

								<div class="row">
									<div class="col-md-5 col-sm-6 col-xs-12 form-group">
										<label for="">CPF</label>
										<input type="text" class="cpf form-control" id="cpf" name="cpf">
									</div>
									<div class="col-md-1"></div>
									<div class="col-md-5 col-sm-6 col-xs-12 form-group">
										<label for="">Sexo</label>
										<br>
										<select name="sexo" class="form-control">
											<option value="">-</option>
											<option value="masculino">Masculino</option>
											<option value="feminino">Feminino</option>
										</select>
									</div>
								</div>

								<div class="row">
									<div class="col-md-5 col-sm-6 col-xs-12 form-group">
										<label for="">Whatsapp</label>
										<input type="text" class="celular form-control" id="celular" name="whatsapp" >
									</div>
									<div class="col-md-1"></div>
									<div class="col-md-5 col-sm-6 col-xs-12 form-group">
										<label for="">E-mail</label>
										<input type="email" class="form-control" name="email" maxlength="60" >
									</div>
								</div>

								<div class="row">
									<div class="col-md-5 col-sm-6 col-xs-12 form-group">
										<label for="">Endereço</label>
										<input type="text" class="form-control" name="endereco">
									</div>
									<div class="col-md-1"></div>
									<div class="col-md-5 col-sm-6 col-xs-12 form-group">
										<label for="">Bairro</label>
										<input type="text" class="form-control" name="bairro">
									</div>
								</div>

								<script>
									var base_url = "<?php echo base_url() ?>";

									$(function(){
									$('#estados').change(function(){
										
										$('#municipios').attr('disabled', 'disabled');
										$('#municipios').html("<option>Carregando...</option>");
										var uf_estado = $('#estados').val();
										/*
										* exibe alert do valor da variavel
										*/
										//alert(uf_estado);
										$.post(base_url+'index.php/home/getMunicipios', {
											uf_estado : uf_estado	
										}, function(data){
											/*
											* exibe teste no console
											*/
											console.log(data);
											$('#municipios').html(data);
											$('#municipios').removeAttr('disabled');
										});
									});
									});
								</script>

								<div class="row">
									<div class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback">
										<label>Estado</label>
										<select class="form-control" id="estados" name="estado">
											<?php echo $options_estados; ?>
										</select>
									</div>
									<div class="col-md-1"></div>
									<div class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback">
										<label>Cidade</label>
										<select class="form-control" id="municipios" name="cidade" disabled>
										
										</select>
										<div id="conteudo"></div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-5 col-sm-6 col-xs-12 form-group">
										<label for="">Academia</label>
										<br>
										<select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="academia">
											<option value="">Selecione a Academia</option>
											<!--
											<?php foreach ($academia as $academias) : ?>
												<option value="<?= $academias['academia']; ?>"><?= $academias['academia']; ?></option>
											<?php endforeach ?>

											<form action="" method="post">
												<option value=""></option>
											</form>
											-->
										</select>
									</div>
									<!--
									<div class="col-md-1">
										<h2 class="head">
											<a  data-toggle="modal" data-target="#addAcademia">
												<i class="fas fa-plus-circle" style="color: red;" title="adicionar academia"></i><span style="margin-left: 10px; color: red;"></span>
											</a>
										</h2>
									</div>
									-->
									<div class="col-md-1"></div>
									<div class="col-md-5 col-sm-6 col-xs-12 form-group">
										<label for="">Professor</label>
										<br>
										<select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="professor">
											<option value="">Selecione o Professor</option>
											<!--
											<?php foreach ($academia as $academias) : ?>
												<option value="<?= $academias['responsavel']; ?>"><?= $academias['responsavel']; ?></option>
											<?php endforeach ?>
											-->
										</select>
									</div>
								</div>

								<div class="row">
									<div class="col-md-5 col-sm-6 col-xs-12 form-group">
										<label for="">Faixa</label>
										<select class="selectpiker form-control" data-show-subtext="trye" data-live-search="true" name="faixa">
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

									<div class="col-md-1"></div>
									<script>
										var base_url = "<?php echo base_url() ?>";

										$(function(){
											$('#teste').change(function(){
												/*
												$('#municipios').attr('disabled', 'disabled');
												$('#municipios').html("<option>Carregando...</option>");
												*/
												var testePeso = $('#teste').val();
												/*
												* exibe alert do valor da variavel
												*/
												alert(testePeso);
												/*
												$.post(base_url+'index.php/home/getMunicipios', {
													uf_estado : uf_estado	
												}, function(data){
													/*
													* exibe teste no console
													
													console.log(data);
													$('#municipios').html(data);
													$('#municipios').removeAttr('disabled');
												});
												*/
											});
										});
									</script>
									<div class="col-md-5 col-sm-6 col-xs-12 form-group">
										<label for="">Peso</label>
										<input type="text" class="peso form-control" id="teste" name="peso">
									</div>
								</div>

								<div class="row">
									<div class="col-md-5 col-sm-6 col-xs-12 form-group">
										<label for="">Usuario</label>
										<input type="text" class="form-control" name="usuario" maxlength="60" >
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
									</div>

									<div class="col-md-1"></div>

									<div class="col-md-5 col-sm-6 col-xs-12 form-group">
										<label for="">Senha</label>
										<input type="password" class="form-control" name="senha" required="">
									</div>
								</div>

								<div class="row">
									<br>
									<div class="ln_solid"></div>
									<div class="form-group">
										<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
											<button type="submit" class="btn btn-success" value="enviar" class="btn btn-block">Salvar</button>
											<button type="reset" class="btn btn-danger">Cancelar</button>
										</div>
									</div>
								</div>
							</form>
                      </div>

					  <!--
						  * corpo tab professor
                      -->

					  <div class="tab-pane fade" id="professor">
  						<div class="text-center">
    						<i class="img-intro icon-checkmark-circle"></i>
						</div>
						<h3 class="head text-center">Cadastro de Professor</h3>
						  <form class="form-horizontal form-label-left input_mask" action="<?php echo site_url('home/addAcademia'); ?>" method="POST">
							  <div class="row">
								  <div class="col-md-5 col-sm-6 col-xs-12 form-group">
									  <label for="">Nome Completo</label>
									  <input type="text" class="form-control" name="responsavel" maxlength="60" >
								  </div>

								  <div class="col-md-1"></div>

								  <div class="col-md-5 col-sm-6 col-xs-12 form-group">
									  <label for="">CPF</label>
									  <input type="text" class="form-control" name="cpf">
								  </div>
							  </div>

							  <div class="row">
								  <div class="col-md-5 col-sm-6 col-xs-12 form-group">
									  <label for="">Whatsapp</label>
									  <input type="text" class="celular form-control" id="celular" name="whatsapp" >
								  </div>

								  <div class="col-md-1"></div>

								  <div class="col-md-5 col-sm-6 col-xs-12 form-group">
									  <label for="">E-mail</label>
									  <input type="email" class="form-control" name="email" maxlength="60" >
								  </div>
							  </div>

							  <div class="row">
								  <div class="col-md-5 col-sm-6 col-xs-12 form-group">
									  <label for="">Endereço</label>
									  <input type="text" class="form-control" name="endereco">
								  </div>

								  <div class="col-md-1"></div>

								  <div class="col-md-5 col-sm-6 col-xs-12 form-group">
									  <label for="">Bairro</label>
									  <input type="text" class="form-control" name="bairro">
								  </div>
							  </div>

							  <script>
									var base_url = "<?php echo base_url() ?>";

									$(function(){
									$('#estadosProfessor').change(function(){
										
										$('#municipiosProfessor').attr('disabled', 'disabled');
										$('#municipiosProfessor').html("<option>Carregando...</option>");
										var uf_estado = $('#estadosProfessor').val();
										/*
										* exibe alert do valor da variavel
										*/
										//alert(uf_estado);
										$.post(base_url+'index.php/home/getMunicipios', {
											uf_estado : uf_estado	
										}, function(data){
											/*
											* exibe teste no console
											*/
											console.log(data);
											$('#municipiosProfessor').html(data);
											$('#municipiosProfessor').removeAttr('disabled');
										});
									});
									});
								</script>

							  <div class="row">
									<div class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback">
										<label>Estado</label>
										<select class="form-control" id="estadosProfessor" name="estado">
											<?php echo $options_estados; ?>
										</select>
									</div>
									<div class="col-md-1"></div>
									<div class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback">
										<label>Cidade</label>
										<select class="form-control" id="municipiosProfessor" name="cidade" disabled>
										
										</select>
										<div id="conteudo"></div>
									</div>
								</div>

							  <div class="row">
								  <div class="col-md-5 col-sm-6 col-xs-12 form-group">
									  <label for="">Informe o Nome de Sua Academia</label>
									  <input type="text" name="academia" class="form-control">
								  </div>

								  <div class="col-md-1"></div>

								  <div class="col-md-5 col-sm-6 col-xs-12 form-group">
									  <label for="">Informe a Federação Filiado</label>
									  <input type="text" name="federacao" class="form-control">
								  </div>
								  <!--
								  <div class="col-md-1">
									  <h2 class="head">
										  <a  data-toggle="modal" data-target="#addAcademia">
											  <i class="fas fa-plus-circle" style="color: red;" title="adicionar academia"></i><span style="margin-left: 10px; color: red;"></span>
										  </a>
									  </h2>
								  </div>
								  -->

								  <div class="col-md-1"></div>


							  </div>

							  <div class="row">
								  <div class="col-md-5 col-sm-6 col-xs-12 form-group">
									  <label for="">Usuario</label>
									  <input type="text" class="form-control" name="usuario" maxlength="60" >
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
								  </div>

								  <div class="col-md-1"></div>

								  <div class="col-md-5 col-sm-6 col-xs-12 form-group">
									  <label for="">Senha</label>
									  <input type="password" class="form-control" name="senha" required="">
								  </div>
							  </div>

							  <div class="row">
								  <br>
								  <div class="ln_solid"></div>
								  <div class="form-group">
									  <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
										  <button type="submit" class="btn btn-success" value="enviar" class="btn btn-block">Salvar</button>
										  <button type="reset" class="btn btn-danger">Cancelar</button>
									  </div>
								  </div>
							  </div>
						  </form>
</div>
<div class="clearfix"></div>
</div>

</div>
</div>
</div>
</section>



