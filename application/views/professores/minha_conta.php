<section id="fh5co-services" data-section="services">
	<div class="fh5co-services">
        <div class="container">
            <div class="row">
                <div class="board">
            		<!-- 
						* tabs de escolha de cadastro competidor / professor 
					-->
                    <div>
                    	<ul class="nav nav-tabs" id="myTab">
                    		<div class="linha"></div>
                     		<li>
                    			<p></p>
                  			</li>
                 			<li>
                 			 	<a href="#academia" data-toggle="tab" title="Sua Academia">
                     				<span class="round-tabs two">
                         				<i class="glyphicon glyphicon-user"></i>
										<p>Academia</p>
                     				</span> 
           						</a>
                 			</li>
                 			<li>
                 				<p></p>
                 			</li>
                     		<li>
								<a href="#alunos" data-toggle="tab" title="Seus Alunos">
									<span class="round-tabs four">
										<i class="glyphicon glyphicon-comment"></i>
										<p>Alunos</p>
									</span>
                     			</a>
							</li>
							 <li>
								<p></p>
							 </li>
						</ul>
					</div>

					<!--
						* corpo tab competidor	
					-->
					<div class="tab-content">
						<div class="tab-pane fade in active" id="academia">
							<?php
								/*
								* caso o professor ainda não cadastrou a academia, session referente a pagina de cadastro de academia
								* (aparece somente uma vez para realizar cadastro, posteriormente só aparece editar) 
								*/
								if (isset($_SESSION["cadastro_academia"])):
							?>

                          	<h3 class="head text-center">Cadastro de Academia</h3>
							<form class="form-horizontal form-label-left input_mask" action="<?php echo site_url("usuarios/save_usuario"); ?>" method="POST">
								<div class="row">
									<div class="col-md-5 col-sm-6 col-xs-12 form-group">
										<label for="">Academia</label>
										<input type="text" class="form-control" name="academia" maxlength="60" >
									</div>
									<div class="col-md-1"></div>
									<div class="col-md-5 col-sm-6 col-xs-12 form-group">
										<label for="">Federação</label>
										<input type="text" class="form-control" name="federacao">
									</div>
								</div>
								<script src="<?base_url(); ?>public/js/teste.js"></script>
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

								<div class="row">
									<div class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback">
										<label>Estado</label>
										<select class="form-control" id="estados" name="estado" onchange="buscaCidade()">
											<?php echo $options_estados; ?>
										</select>
									</div>
									<div class="col-md-1"></div>
									<div class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback">
										<label>Cidade</label>
										<select class="form-control" id="municipios" name="cidade" disabled></select>
									</div>
								</div>

								<div class="row">
									<div class="col-md-5 col-sm-6 col-xs-12 form-group">
										<label for="">Telefone</label>
										<input type="text" class="telefone form-control" id="telefone" name="telefone">
									</div>
									<div class="col-md-1"></div>
									<div class="col-md-5 col-sm-6 col-xs-12 form-group">
										<label for="">E-mail</label>
										<input type="email" class="form-control" name="email">
									</div>
								</div>

								<div class="row">
									<div class="col-md-5 col-sm-6 col-xs-12 form-group">
										<label for="">Site</label>
										<input type="text" class="form-control">
									</div>
									<div class="col-md-1"></div>
									<div class="col-md-5 col-sm-6 col-xs-12 form-group">
									<label> Cartaz do Evento</label>
                                <input type="file" name="cartaz" id="imagem" onchange="previewImagem()"><br><br>
                                    <img name="visualizar" style="width: 200px; height: 200px;"><br><br>
                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                                <script>
                                    function previewImagem(){
                                    var imagem = document.querySelector('input[name=cartaz]').files[0];
                                    var preview = document.querySelector('img[name=visualizar]');

                                    var reader = new FileReader();
                              
                                    reader.onloadend = function () {
                                        preview.src = reader.result;
                                    }
                              
                                    if(imagem){
                                        reader.readAsDataURL(imagem);
                                    }else{
                                        preview.src = "";
                                    }
                                }
                                </script>
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
							<?php
								endif;
								unset($_SESSION["cadastro_academia"]);
							?>
							<?php if (isset($_SESSION["academia"])):
							?>
							<h1>teste</h1>
							<?php
								endif;
								unset($_SESSION["academia"]);
							?>
                      </div>

					  <!--
						  * corpo tab professor
                      -->

					  <div class="tab-pane fade" id="professor">
  						<div class="text-center">
    						<i class="img-intro icon-checkmark-circle"></i>
						</div>
						<h3 class="head text-center">Cadastro de Professor</h3>
						  <form class="form-horizontal form-label-left input_mask" action="<?php echo site_url("home/addAcademia"); ?>" method="POST">
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
									$("#estadosProfessor").change(function(){
										
										$("#municipiosProfessor").attr("disabled", "disabled");
										$("#municipiosProfessor").html("<option>Carregando...</option>");
										var uf_estado = $("#estadosProfessor").val();
										/*
										* exibe alert do valor da variavel
										*/
										//alert(uf_estado);
										$.post(base_url+"index.php/home/getMunicipios", {
											uf_estado : uf_estado	
										}, function(data){
											/*
											* exibe teste no console
											*/
											console.log(data);
											$("#municipiosProfessor").html(data);
											$("#municipiosProfessor").removeAttr("disabled");
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
									  if(isset($_SESSION["duplicado"])):
										  ?>
										  <div class="notification is-danger">
											  <span class="help-block" style="color: red;">ERRO: Usuário já cadastrado.</span>
										  </div>
									  <?php
									  endif;
									  unset($_SESSION["duplicado"]);
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



