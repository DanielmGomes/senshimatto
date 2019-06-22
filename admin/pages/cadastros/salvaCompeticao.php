<?php
  
  session_start();

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "senshimatto";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  // Check connection 
  

  if(isset($_POST['enviar'])) {
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    } 

    $nomeEvento = $_POST['nomeEvento'];
    $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];
    $estado = $_POST['estado'];
    $cidade = $_POST['cidade'];
    $cep = $_POST['cep']; 
    $telefone = $_POST['telefone']; 
    $whatsapp = $_POST['whatsapp'];
    $email = $_POST['email'];
    $foto = $_FILES['foto'];
    $responsavel = $_SESSION['equipe'];
    $cpfResponsavel = $_POST['cpfResponsavel'];
    $dataEvento = $_POST['dataEvento'];
    $horarioEvento = $_POST['horarioEvento'];
    $dataCadastro = date("y/m/d");  

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
        
        $sql = "INSERT INTO competicao (nomeEvento, endereco, bairro, estado, cidade, cep, telefone, whatsapp, email, equipe, cpfResponsavel, dataEvento, horarioEvento, cartaz, dataCadastro)
              VALUES ('$nomeEvento', '$endereco', '$bairro', '$estado', '$cidade', '$cep', '$telefone', '$whatsapp', '$email', '$responsavel', '$cpfResponsavel', 
              '$dataEvento', '$horarioEvento', '$caminho_imagem', '$dataCadastro')";    

        // Se os dados forem inseridos com sucesso
        if (mysqli_query($conn, $sql)) {
          header("Location: competicoes.php");  

      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    } 

      mysqli_close($conn);
      }
    }
  } 
?>