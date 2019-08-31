<?php if (isset($scripts)) {
      foreach ($scripts as $script_name){
        $src = base_url() . 'restrict/js/' . $script_name; ?>
        <script src="<?=$src?>"></script>
      <?php }
    } ?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Cadastro de Competições</h2>       
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Cartaz</th>
                          <th>Evento</th>
                          <th>Endereço</th>
                          <th>Cidade</th>

                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($competicao as $competicoes) : ?>
                            <tr>
                                <td><img src='<?php echo base_url($competicoes['cartaz']); ?>' style='height: 45px; width: 45px;'/></td>
                                <td><?= $competicoes['nomeEvento']; ?></td>
                                <td><?= $competicoes['endereco']; ?></td>
                                <td><?= $competicoes['cidade']; ?></td>
                            </tr>
                        <?php endforeach ?> 
                      </tbody>
                    </table>
                </div>
            </div>
            <button type="button" href="#" id="btn_add_competicao" class="btn btn-success" data-toggle="modal" data-target="#modal_competicao">Cadastrar</button>
        </div>
    </div>
</div>
<!-- //page content -->

<!-- modal -->
<div id="modal_competicao" class="modal fade">
    <div class="modal-dialog modal-x1">
        <div class="modal-content">
            
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">x</button>
                <h4 class="modal-title">Cadastro de Competições</h4>
            </div>

            <div class="modal-body">
                <form id="form_competicao"  action="<?php echo site_url('admin/ajax_save_competicao'); ?>" method="POST">
                    <input name="idCompeticao" hidden>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
                                <label for="">Evento</label>
                                <input type="text" class="form-control has-feedback-left" placeholder="Nome do Evento" name="nomeEvento">
                                <span class="fa fa-credit-card form-control-feedback left"></span>
                            </div>               
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
                                <label for="">Endereço</label>
                                <input type="text" class="form-control has-feedback-left" placeholder="Nome do Evento" name="endereco">
                                <span class="fa fa-credit-card form-control-feedback left"></span>
                            </div>               
                        </div>

                        <div class="form-row">
					        <div class="col-md-6 col-sm-6 col-xs-12 form-group">
						        <label for="">Estado</label>
						        <br>
                                <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="estado">
                                    <option data-subtext="Rep California">Tom Foolery</option>
                                    <option data-subtext="Sen California">Bill Gordon</option>
                                    <option data-subtext="Sen Massacusetts">Elizabeth Warren</option>
                                    <option data-subtext="Rep Alabama">Mario Flores</option>
                                    <option data-subtext="Rep Alaska">Don Young</option>
                                    <option data-subtext="Rep California" disabled="disabled">Marvin Martinez</option>
                                </select>
					        </div>

					        <div class="col-md-6 col-sm-6 col-xs-12 form-group">
						        <label for="">Cidade</label>
						        <br>
						        <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="cidade">
                                    <option data-subtext="Rep California">Tom Foolery</option>
                                    <option data-subtext="Sen California">Bill Gordon</option>
                                    <option data-subtext="Sen Massacusetts">Elizabeth Warren</option>
                                    <option data-subtext="Rep Alabama">Mario Flores</option>
                                    <option data-subtext="Rep Alaska">Don Young</option>
                                    <option data-subtext="Rep California" disabled="disabled">Marvin Martinez</option>
						        </select>
					        </div>

                            <div class="form-row">
                            <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
                                <label for="">Data do Evento</label>
                                <input type="date" class="form-control has-feedback-left" placeholder="Nome do Evento" name="data">
                                <span class="fa fa-credit-card form-control-feedback left"></span>
                            </div>               
                        </div>

                        <!--
                        <div class="form-row">
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
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
                        </div>
                        -->

                        <div class="form-row">
                            <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
                                <label for="">Descrição do Evento</label>
                                <textarea class="form-control" name="descricao" placeholder="Descrição do Evento" id="" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                            <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
                                <label for="">Cartaz do Evento</label>
                                
                                <img id="competicao_img_path" src="" style="max-height: 400px; max-height: 308px">
                                
                                <label class="btn btn-block btn-info">
                                    <i class="fa fa-upload"></i>&nbsp;&nbsp;Importar Imagem
                                    <input type="file" id="btn_upload_competicao_img" acept="image/*" style="display: none; ">
                                    <span class="help-block"></span>
                                </label>
                                <input id="competicao_img" name="cartaz">
                                <span class="help-block"></span>
                            </div>               
                        </div>			
				        </div>

                    <div class="form-row">
                    <div class="form-group text-center">
                        <button type="submit" id="btn_save_competicao" value="enviar" class="btn btn-primary">Salvar</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- // modal -->