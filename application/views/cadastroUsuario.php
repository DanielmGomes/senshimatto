<section id="fh5co-services" data-section="services">
	<div class="fh5co-services">
		<div class="container">
			<div class="row">
				<div class="col-md-12 section-heading text-center">
					<h2 class="to-animate"><span>Novo Cadastro</span></h2>
				</div>
			</div>

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
						<label for="">Academia</label>
						<br>
						<select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="academia">
							<option value="">Selecione a Academia</option>
							
							<?php foreach ($academia as $academias) : ?>
								<option value="<?= $academias['academia']; ?>"><?= $academias['academia']; ?></option>
							<?php endforeach ?>
							
						</select>
					</div>

					<div class="col-md-1"></div>

					<div class="col-md-5 col-sm-6 col-xs-12 form-group">
						<label for="">Professor</label>
						<br>
						<select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="professor">
							<option value="">Selecione o Professor</option>
							
							<?php foreach ($academia as $academias) : ?>
								<option value="<?= $academias['responsavel']; ?>"><?= $academias['responsavel']; ?></option>
							<?php endforeach ?> 
							
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

					<div class="col-md-5 col-sm-6 col-xs-12 form-group">
						<label for="">Peso</label>
						<input type="text" class="peso form-control" id="peso" name="peso">
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
	</div>
</section>
