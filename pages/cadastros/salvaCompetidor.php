<?php
 
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "senshimatto";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  // Check connection 
  

  if(isset($_POST['cadastrar'])) {
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    } 

    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $senha = $_POST['senha']; 

    $sql = "INSERT INTO competidor (usuario, email, senha) VALUES ('$usuario', '$email', md5('$senha'))";    

  // Se os dados forem inseridos com sucesso
    if (mysqli_query($conn, $sql)) {
      header("Location: ../../index.php");  

      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    } 

      mysqli_close($conn);
      }
    
  
?>