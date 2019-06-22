<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Administrativo | TARI Metais</title>

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
              <a href="../index.php" class="site_title"><span>Senshi Matto Admin</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="../images/usuario/user01.png" alt="..." class="img-circle profile_img">
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
                      <li><a href="competicoes.php">Competições</a></li>
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
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="../../login/logout.php">
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
    		            <li><a href="../../login/logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
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


              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>
                    	Lista de Competições
                    	<small>
                    		<a href="cadastrarCompeticao.php">
                    			<button type="button" href="cadastrarCompeticao.php" class="btn btn-success">Cadastrar</button>
                    		</a>
                    	</small>
                    </h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Código</th>
                          <th>Banner</th>
                          <th>Evento</th>
                          <th>Endereço</th>
                          <th>Bairro</th>
                          <th>Cidade</th>
                          <th>CEP</th>
                          <th>Estado</th>
                          <th>Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                       //Estabelece a conexao com o mysql
                       $conexao = mysqli_connect("localhost","root","","senshimatto");
                       if( !$conexao ){
                           echo "Ops.. Erro na conexão.";
                           exit;
                       }
                       //Carrega os dados
                       $sql = "SELECT * FROM competicao WHERE equipe = '{$_SESSION['equipe']}'";
                       $consulta = mysqli_query($conexao, $sql);
                       if( !$consulta ){
                           echo "Erro ao realizar consulta. Tente outra vez.";
                           exit;
                       }
                        //se tudo deu certo, exibe os dados
                        while( $dados = mysqli_fetch_assoc($consulta) ){
                          echo "<tr>";
                          echo "<td>" .$dados['idCompeticao']. "</td>";
                          echo "<td>" ."<img src='".$dados['cartaz']."' style='height: 45px; width: 45px;'/>". "</td>";
                          echo "<td>" .$dados['nomeEvento']. "</td>";
                          echo "<td>" .$dados['endereco']. "</td>";
                          echo "<td>" .$dados['bairro']. "</td>";
                          echo "<td>" .$dados['cidade']. "</td>";
                          echo "<td>" .$dados['cep']. "</td>";
                          echo "<td>" .$dados['estado']. "</td>";
                          // Cria um formulário para enviar os dados para a página de edição 
                          // Colocamos os dados dentro input hidden
                          echo "<td>";
                            echo "<div class='form-group'>";
                              echo "<div class='form-row'>";
                                echo "<div class='col-md-4'>";
                                  echo "<form action='../editar/editarCompeticao.php' method='post'>";
                                    echo "<input name='idCompeticao' type='hidden' value='" .$dados['idCompeticao']. "'>";
                                    echo "<input name='nomeEvento' type='hidden' value='" .$dados['nomeEvento']. "'>";
                                    echo "<input name='endereco' type='hidden' value='" .$dados['endereco']. "'>";
                                    echo "<input name='cidade' type='hidden' value='" .$dados['cidade']. "'>";
                                    echo "<input name='cep' type='hidden' value='" .$dados['cep']. "'>";
                                    echo "<input name='estado' type='hidden' value='" .$dados['estado']. "'>";
                                    echo "<input name='email' type='hidden' value='" .$dados['email']. "'>";
                                    echo "<input name='whatsapp' type='hidden' value='" .$dados['whatsapp']. "'>";
                                    echo "<input name='responsavel' type='hidden' value='" .$dados['responsavel']. "'>";
                                    echo "<input name='cpfResponsavel' type='hidden' value='" .$dados['cpfResponsavel']. "'>";
                                    echo "<input name='horarioEvento' type='hidden' value='" .$dados['horarioEvento']. "'>";
                                    echo "<input name='foto' type='hidden' value='" .$dados['cartaz']. "'>";
                                    echo "<input name='dataEvento' type='hidden' value='" .$dados['dataEvento']. "'>";
                                    echo "<input name='bairro' type='hidden' value='" .$dados['bairro']. "'>";
                                    echo "<input name='telefone' type='hidden' value='" .$dados['telefone']. "'>";
                                    echo "<button class='btn btn-primary glyphicon glyphicon-pencil' data-toggle='tooltip' data-placement='top' title='Editar'></button>";
                                  echo "</form>";
                                echo "</div>";
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


        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Administrativo Senshi Matto | desenvolvido por: Daniel Gomes</a>
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

  
  </body>
</html>
