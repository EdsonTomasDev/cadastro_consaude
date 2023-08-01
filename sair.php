<?php
	session_start();

	unset($_SESSION['chefia']);
	unset($_SESSION['nivel_acesso_chefia']);
	unset($_SESSION['id_chefia']);

	header('Location: ./index.php');


?>