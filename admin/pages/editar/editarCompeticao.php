<?php
	session_start();

	//Recebe os dados a serem editados
  $idCompeticao = filter_input(INPUT_POST, 'idCompeticao');
  $nomeEvento = filter_input(INPUT_POST, 'nomeEvento');
  $endereco = filter_input(INPUT_POST, 'endereco');
  $cidade = filter_input(INPUT_POST, 'cidade');
  $cep = filter_input(INPUT_POST, 'cep');
  $estado = filter_input(INPUT_POST, 'estado');
  $email = filter_input(INPUT_POST, 'email');
  $whatsapp = filter_input(INPUT_POST, 'whatsapp');
  $responsavel = filter_input(INPUT_POST, 'responsavel');
  $cpfResponsavel = filter_input(INPUT_POST, 'cpfResponsavel');
  $horarioEvento = filter_input(INPUT_POST, 'horarioEvento');
  $foto = filter_input(INPUT_POST, 'foto');
  $dataEvento = filter_input(INPUT_POST, 'dataEvento');
  $bairro = filter_input(INPUT_POST, 'bairro');
  $telefone = filter_input(INPUT_POST, 'telefone');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Administrativo | Senshi Matto</title>

    <!-- Bootstrap -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../../font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../css/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../../css/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../../css/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../../css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../../css/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../../css/starrr.css" rel="stylesheet"> 
    <!-- bootstrap-progressbar -->
    <link href="../../css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../../css/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../../css/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../../css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="../../index.php" class="site_title"><span>Senshi Matto Admin</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="../../images/usuario/user01.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bem-Vindo,</span>
                <h2><?php echo $_SESSION['equipe'];?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-file-text"></i> Cadastros <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../cadastros/competicoes.php">Competições</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Relátorios <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">Competições</a></li>
                      <li><a href="#">Medalistas</a></li>
                      <li><a href="#">Chaves de Luta</a></li>
                      <li><a href="#">Ranking dos Alunos</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="fa fa-gear" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="fa fa-arrows" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="fa fa-eye" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login/logout.php">
                <span class="fa fa-power-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons <-->           
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/user.svg" alt=""><?php echo $_SESSION['equipe'];?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="login/logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/user.svg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/user.svg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/user.svg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
         
            <div class="clearfix"></div>        

            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Editar Competição <small></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left input_mask" action="alterarCompeticao.php" method="POST" enctype="multipart/form-data">  
                      <input type="hidden" name="idCompeticao" value="<?php echo $idCompeticao; ?>">      
                      <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" placeholder="Nome do Evento" name="nomeEvento" maxlength="60" required="" value="<?php echo $nomeEvento; ?>">
                        <span class="fa fa-user form-control-feedback left"></span>
                      </div>        

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" placeholder="Endereço" name="endereco" maxlength="60" required="" 
                        value="<?php echo $endereco; ?>">
                        <span class="fa fa-envelope form-control-feedback left"></span>
                      </div>           

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" placeholder="Bairro" name="bairro" maxlength="60" required=""
                        value="<?php echo $bairro; ?>">
                          <span class="fa fa-envelope form-control-feedback left"></span>
                      </div>        

                      <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">       

                        <label>Estado</label> 
                        <select id="uf" name="estado" onchange="carregaConteudo(this);" class="form-control has-feedback-left" required="">
                          <option><?php echo $estado; ?></option>
                          <option value="acre">Acre</option>
                          <option value="alagoas">Alagoas</option>
                          <option value="amapa">Amapá</option>
                          <option value="amazonas">Amazonas</option>
                          <option value="bahia">Bahia</option>
                          <option value="ceara">Ceará</option>
                          <option value="distrito federal">Distrito Federal</option>
                          <option value="espirito santo">Espirito Santo</option>
                          <option value="goias">Goías</option>
                          <option value="maranhao">Maranhão</option>
                          <option value="mato grosso">Mato Grosso</option>
                          <option value="mato grosso do sul">Mato Grosso do Sul</option>
                          <option value="minas gerais">Minas Gerais</option>
                          <option value="para">Pará</option>
                          <option value="paraiba">Paraiba</option>
                          <option value="parana">Paraná</option>
                          <option value="pernambuco">Pernambuco</option>
                          <option value="piaui">Piauí</option>
                          <option value="rio de janeiro">Rio de Janeiro</option>
                          <option value="rio grane do norte">Rio Grande do Norte</option>
                          <option value="rio grande do sul">Rio Grande do Sul</option>
                          <option value="rondonia">Rondônia</option>
                          <option value="roraima">Roraima</option>
                          <option value="santa catarina">Santa Catarina</option>
                          <option value="sao paulo">São Paulo</option>
                          <option value="sergipe">Sergipe</option>
                          <option value="tocantins">Tocantins</option>
                        </select>
                        <span class="fa fa-envelope form-control-feedback left"></span>
                      </div>        

                      <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Cidade</label>
                        <select id="cidade" name="cidade" class="form-control has-feedback-left" required="">
                          <option><?php echo $cidade; ?></option>
                        </select>           
                        <span class="fa fa-envelope form-control-feedback left"></span>
                        <div id="conteudo">
                                          

                        </div>    
                      </div>        

                      <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>CEP</label>
                        <input type="text" class="cep form-control has-feedback-left" id="cep" name="cep" maxlength="9" value="<?php echo $cep; ?>">
                        <span class="fa fa-envelope form-control-feedback left"></span>
                      </div>
                                    
                      <div class="col-md-3 col-sm-6 col-xs-12 form-group has-feedback">
                            <input type="text" class="telefone form-control has-feedback-left" id="telefone" placeholder="Telefone" name="telefone" required="" value="<?php echo $telefone; ?>">
                            <span class="fa fa-phone form-control-feedback left"></span>
                      </div>        

                      <div class="col-md-3 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="celular form-control has-feedback-left" id="celular" placeholder="Whatsapp" name="whatsapp" value="<?php echo $whatsapp; ?>">
                        <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                      </div>        

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="email" class="form-control has-feedback-left" placeholder="E-mail" name="email" maxlength="60" value="<?php echo $email; ?>">
                        <span class="fa fa-envelope form-control-feedback left"></span>
                      </div>        

                      <div class="form-group">
                        <div class="form-row">
                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input type="text" name="responsavel" class="form-control has-feedback-left" placeholder="Responsável Pelo Evento" 
                            value="<?php echo $responsavel; ?>">
                            <span class="fa fa-credit-card form-control-feedback left" aria-hidden="true"></span>
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input type="text" class="cpf form-control has-feedback-left" id="cpf" placeholder="CPF do Responsável" name="cpfResponsavel" value="<?php echo $cpfResponsavel; ?>">
                            <span class="fa fa-credit-card form-control-feedback left" aria-hidden="true"></span>
                          </div>
                        </div>
                      </div>        

                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                          <label>Data do Evento</label>
                          <input type="date" class="form-control has-feedback-left" name="dataEvento" maxlength="30" required="" value="<?php echo $dataEvento; ?>">
                          <span class="fa fa-cubes form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                          <label>Horario do Evento</label>
                          <input type="time" class="form-control has-feedback-left" name="horarioEvento" maxlength="30" required="" 
                          value="<?php echo $horarioEvento; ?>">
                          <span class="fa fa-cubes form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>   

                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <!-- <input type="file" name="foto"> -->
                          <label> Cartaz da Competição</label>
                            <input type="file" name="foto" id="imagem" value="<?php echo $foto; ?>" onchange="previewImagem()"><br><br>
                            <img name="preview" src="<?php echo $foto; ?>" style="width: 150px; height: 150px;"><br><br>
                          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                          <script>
                            function previewImagem(){
                              var imagem = document.querySelector('input[name=foto]').files[0];
                              var preview = document.querySelector('img[name=preview]');
                              
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

                      <div class="ln_solid"></div>
                        <div class="form-group">
                          <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                            <button type="submit" class="btn btn-success" value="enviar" name="enviar">Enviar</button>
                            <button type="reset" class="btn btn-danger">Cancelar</button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Administrativo TARI Metais | desenvolvido por: Daniel Gomes</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../../js/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../js/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../../js/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../../js/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../../js/jquery.dataTables.min.js"></script>
    <script src="../../js/dataTables.bootstrap.min.js"></script>
    <script src="../../js/dataTables.buttons.min.js"></script>
    <script src="../../js/buttons.bootstrap.min.js"></script>
    <script src="../../js/buttons.flash.min.js"></script>
    <script src="../../js/buttons.html5.min.js"></script>
    <script src="../../js/buttons.print.min.js"></script>
    <script src="../../js/dataTables.fixedHeader.min.js"></script>
    <script src="../../js/dataTables.keyTable.min.js"></script>
    <script src="../../js/dataTables.responsive.min.js"></script>
    <script src="../../js/responsive.bootstrap.js"></script>
    <script src="../../js/dataTables.scroller.min.js"></script>
    <script src="../../js/jszip.min.js"></script>
    <script src="../../js/pdfmake.min.js"></script>
    <script src="../../js/vfs_fonts.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../../js/custom.min.js"></script>
    <!-- cidades -->
    <script src="../../js/ajax.js"></script>  
    <!-- mascara -->
    <script src="../../js/mascara.js"></script>  
  </body>
</html>