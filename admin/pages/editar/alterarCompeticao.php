<?php
	session_start();

	//Recebe os dados a serem alterados
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
/*

  //Estabelece a conexão com o mysql
  $conexao = mysqli_connect("localhost","root","","senshimatto");
  if( !$conexao ){
      header("Location:exibe.php?alteracao=false");
      exit;
  }
  //Executa a atualização no banco de dados
  $sql = "UPDATE competicao SET nomeEvento=' $nomeEvento', endereco='$endereco', cidade='$cidade', cep='$cep', 
  estado='$estado', email='$email', whatsapp='$whatsapp', responsavel='$responsavel', cpfResponsavel='$cpfResponsavel', horarioEvento='$horarioEvento', cartaz='$foto', dataEvento='$dataEvento', bairro='$bairro', telefone='$telefone' WHERE idCompeticao=".$idCompeticao;
  $update = mysqli_query($conexao, $sql);

  echo $sql;
/*
//Se não deu certo, redireciona pra exibe.php com alteracao igual a false
  if( !$update ){
      header("Location:../editar/editarCompeticao.php?alteracao=false");
      exit;
  }

//se tudo deu certo, redireciona pra exibe.php com alteracao igual a true
  header("Location:../cadastros/competicoes.php?alteracao=true");*/

    // Se a foto estiver sido selecionada
    if (!empty($foto["name"])) {
      
      // Largura máxima em pixels
      $largura = 15000;
      // Altura máxima em pixels
      $altura = 18000;
      // Tamanho máximo do arquivo em bytes
      $tamanho = 1000000; 

      $error = array(); 

      // Verifica se o arquivo é uma imagem
      if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
         $error[1] = "Isso não é uma imagem.";
      } 
    
      // Pega as dimensões da imagem
      $dimensoes = getimagesize($foto["tmp_name"]);
    
      // Verifica se a largura da imagem é maior que a largura permitida
      if($dimensoes[0] > $largura) {
        $error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
      } 

      // Verifica se a altura da imagem é maior que a altura permitida
      if($dimensoes[1] > $altura) {
        $error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
      }
      
      // Verifica se o tamanho da imagem é maior que o tamanho permitido
      if($foto["size"] > $tamanho) {
        $error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
      } 

      // Se não houver nenhum erro
      if (count($error) == 0) {
      
        // Pega extensão da imagem
        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext); 

          // Gera um nome único para a imagem
          $nome_imagem = md5(uniqid(time())) . "." . $ext[1]; 

          // Caminho de onde ficará a imagem
          $caminho_imagem = "../../images/usuario/" . $nome_imagem; 

        // Faz o upload da imagem para seu respectivo caminho
        move_uploaded_file($foto["tmp_name"], $caminho_imagem);
      
        // Insere os dados no banco
        
    //Executa a atualização no banco de dados
  	$sql = "UPDATE competicao SET nomeEvento=' $nomeEvento', endereco='$endereco', cidade='$cidade', cep='$cep', 
  	estado='$estado', email='$email', whatsapp='$whatsapp', responsavel='$responsavel', cpfResponsavel='$cpfResponsavel', horarioEvento='$horarioEvento', cartaz='$foto', dataEvento='$dataEvento', bairro='$bairro', telefone='$telefone' WHERE idCompeticao=".$idCompeticao;

echo $sql;

        $update = mysqli_query($conexao, $sql);

    //Se não deu certo, redireciona pra exibe.php com alteracao igual a false
    if( !$update ){
        header("Location:../index.php?alteracao=false");
        exit;
    }

    //se tudo deu certo, redireciona pra exibe.php com alteracao igual a true
    header("Location:../relatorios/listaFornecedor.php?alteracao=true");
    }
  }

?>