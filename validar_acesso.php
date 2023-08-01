<?php
	//INICIAR UMA SESSION
	session_start();


	//INCLUI A PÁGINA CONEXAO.PHP

	require_once('conexao.php');

 $cpf = $_POST['cpf'];
 //Verifica senha padrão saude
 $senha_padrao = $_POST['senha'];

 $senha = md5($_POST['senha']);


	//Criação do Objeto da Classe conexao da página conexao.php
	$conecta = new conexao();

	//Variável que recebe a função conecta_mysql
	 $link = $conecta->conecta_mysql();


if(is_numeric($cpf)){
	//Se $linkfor seguirá para a autenticação

	$sql = " Select * from tb_chefia_rest Where cpf_chefia = '$cpf' and senha_chefia = '$senha' ";

	//echo $sql;
	//exit;

	$resultado_id = mysqli_query($link,$sql);

	$consulta = mysqli_fetch_array($resultado_id);



	if(isset($consulta['cpf_chefia'])){

		//VARIÁVEL DE SERÁ UTILIZADA PARA CHAMAR OS FUNCIONÁRIOS DE CADA CHEFIA
             $codigo_cpf_chefia = base64_encode($consulta['cpf_chefia']);

		//VERIFICA SE O ACESSO FOI FEITO COM A SENHA PADRÃO saude
		//CASO POSITIVO SERÁ REDIRECIONADO PARA A PÁGINA DE ALTERAÇÃO DE SENHA
		if($senha_padrao == 'saude'){

			$cpf_oculto = base64_encode($cpf);

		//	echo 'Você esta usando a senha padrão do sistema, favor efetuar a alteração!';
			header('Location: alterar_senha.php?erro='.$cpf_oculto);

		}else{

		//Nível de acesso
		$nivel = $consulta['nivel_acesso_chefia'];

			//Atribuir usuario a session
		$_SESSION['chefia'] = $consulta['nome_chefia'];
		$_SESSION['nivel_acesso_chefia'] = $consulta['nivel_acesso_chefia'];
		$_SESSION['id_chefia'] = $consulta['id_chefia'];
		$_SESSION['cpf_chefia'] = $consulta['cpf_chefia'];


		//Direciona para a página home.php

		header('Location: verifica_acesso.php?id_chefia='.$codigo_cpf_chefia);
	}


	}else{

		//Retorna mensagem de erro para a página index.php 
		//passando parâmentro erro=1 
		header('Location: index.php?erro=1');
	}






}else{

	// Se não for somente números no cpf irá retornar a index.html
	echo'<script>alert("Digite somente números para o CPF!")
		location.href="index.php"</script>';

	//echo'<script>alert("Por favor, digite somente números para o CPF!")
		//location.href="cadastrar_avaliador.html"</script>';


}



?>