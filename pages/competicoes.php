<?php
	include '../include/header.php';
?>

<br>
<div class="container">
  <div class="row">
    <div class="col-md-3">
      <p>Refine sua busca</p>
      <form action="">
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12 has-feedback">
              <p>Período do evento</p>
              <input type="date" class="form-control has-feedback" name="periodo">
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12 has-feedback">
              <br>
              <p>Nome do evento</p>
              <input type="text" class="form-control has-feedback" name="evento">
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12 has-feedback">
              <br>
              <p>Estado</p>
              <input type="text" class="form-control has-feedback" name="evento">
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12 has-feedback">
              <br>
              <p>Cidade</p>
              <input type="text" class="form-control has-feedback" name="evento">
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12 has-feedback">
              <br>
                <button type="button" href="cadastrarCompeticao.php" class="btn btn-success">Filtrar</button>
            </div>
          </div>
        </div>
      </form>
    </div>

    <div class="col-md-9">
      <h1>Lista de competidores</h1>
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
              <th>Inscrever</th>
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
             $sql = "SELECT * FROM competicao";
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
<br>
<?php
	include '../include/footer.php';
?>