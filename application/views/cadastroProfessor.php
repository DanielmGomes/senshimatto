	<section id="fh5co-services" data-section="services">
	<div class="fh5co-services">
		<div class="container">
			<div class="row">
				<div class="col-md-12 section-heading text-center">
					<h2 class="to-animate"><span>Novo Cadastro</span></h2>
				</div>
			</div>
		
			<form class="form-horizontal form-label-left input_mask" action="<?php echo site_url('home/addAcademia'); ?>" method="POST">
				<div class="row">
					<div class="col-md-5 col-sm-6 col-xs-12 form-group">
						<label for="">Nome Completo</label>
						<input type="text" class="form-control" name="responsavel" maxlength="60" >
					</div>	

					<div class="col-md-1"></div>

					<div class="col-md-5 col-sm-6 col-xs-12 form-group">
						<label for="">CPF</label>
						<input type="text" class="cpf form-control" id="cpf" name="cpf">
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

				<div class="row">
					<div class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback">
						<label>Estado</label> 
						<select id="uf" name="estado" onchange="carregaConteudo(this);" class="form-control">
							<option>-</option>
							<option value="AC">Acre</option>
							<option value="AL">Alagoas</option>
							<option value="AP">Amapá</option>
							<option value="AM">Amazonas</option>
							<option value="BA">Bahia</option>
							<option value="CE">Ceará</option>
							<option value="DF">Distrito Federal</option>
							<option value="ES">Espirito Santo</option>
							<option value="GO">Goías</option>
							<option value="MA">Maranhão</option>
							<option value="MT">Mato Grosso</option>
							<option value="MS">Mato Grosso do Sul</option>
							<option value="MG">Minas Gerais</option>
							<option value="PA">Pará</option>
							<option value="PB">Paraiba</option>
							<option value="PR">Paraná</option>
							<option value="PE">Pernambuco</option>
							<option value="PI">Piauí</option>
							<option value="RJ">Rio de Janeiro</option>
							<option value="RR">Rio Grande do Norte</option>
							<option value="RS">Rio Grande do Sul</option>
							<option value="RO">Rondônia</option>
							<option value="RR">Roraima</option>
							<option value="SC">Santa Catarina</option>
							<option value="SP">São Paulo</option>
							<option value="SE">Sergipe</option>
							<option value="TO">Tocantins</option>
						</select>
					</div>

					<div class="col-md-1"></div>

					<div class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback">
						<label>Cidade</label>
						<select id="cidade" name="cidade" class="form-control">
							<option>-</option>
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
	</div>
</section>
<!--
	
	<div class="modal fade" id="addAcademia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<label for="" style="color: grey; ">Adicionar Academia</label>
					<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form class="form-horizontal form-label-left input_mask" action="<?php echo site_url('home/addAcademia'); ?>" method="POST">
						<div class="row">
							<div class="col-md-6">
								<label for="">Academia</label>
								<input type="text" name="academia" class="form-control">
							</div>
							<div class="col-md-6">
								<label for="">Professor</label>
								<input type="text" class="form-control" name="responsavel">
							</div>
						</div>
						<br>

						<div class="row">
							<div class="col-md-6">
								<label for="">Federação</label>
								<input type="text" name="federacao" class="form-control">
							</div>
							<div class="col-md-6">
								<label for="">Pais</label>
								<input type="text" name="pais" class="form-control">
							</div>
						</div>
						<br>

						<div class="row">
							<div class="col-md-6">
								<label for="">Endereço</label>
								<input type="text" name="endereco" class="form-control">
							</div>
							<div class="col-md-6">
								<label for="">E-mail</label>
								<input type="email" name="email" class="form-control">
							</div>
						</div>

						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
							<button type="submit=" class="btn btn-primary">Salvar</button>
						</div>
					</form>
				</div>

			</div>
		</div>
	</div>
-->

