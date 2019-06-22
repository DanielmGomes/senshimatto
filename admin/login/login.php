<?php
session_start();

include '../../config/config.php';

if(empty($_POST['usuario']) || empty($_POST['senha'])) {
	header('Location: ../../admin.php');
	exit();
}

$usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
$senha = mysqli_real_escape_string($conn, $_POST['senha']);

$query = "select equipe from equipe where equipe = '{$usuario}' and senha = md5('{$senha}')";

$result = mysqli_query($conn, $query);


$row = mysqli_num_rows($result);
/*
echo $row;

exit;
*/
$row = mysqli_num_rows($result);

if($row == 1) {
	$_SESSION['equipe'] = $usuario;
	header('Location: ../index.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: ../../admin.php');
	exit();
}