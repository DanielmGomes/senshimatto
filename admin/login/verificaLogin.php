<?php
	//session_start();
	if(!$_SESSION['equipe']) {
		header('Location: ../../admin.php');
		exit();
	}
?>