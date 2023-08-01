<?php
	
	//INICIAR UMA SESSION
	session_start();

	//INCLUI A PÁGINA CONEXAO.PHP

	require_once('conexao.php');

 $cpf_oculto = $_GET['id'];
 $senha_1 = $_POST['senha_1'];
 $senha_2 = $_POST['senha_2'];
 //DECODIFICA O CPF
$cpf = base64_decode($cpf_oculto);

$senha_oculta = md5($senha_1);

//echo $senha_oculta;
//exit;

// $senha = md5($_POST['senha']);

	//Criação do Objeto da Classe conexao da página conexao.php
	$conecta = new conexao();

	//Variável que recebe a função conecta_mysql
	 $link = $conecta->conecta_mysql();



//VERIFICA SE AS SENHAS SÃO IGUAIS A SENHA PADRÃO saude
if($senha_1 <> 'saude' and $senha_2 <> 'saude'){

            //VERIFICA SE AS SENHA SÃO IGUAIS
            if($senha_1 == $senha_2){

                            $sql = "UPDATE tb_chefia_rest set senha_chefia = '$senha_oculta' WHERE cpf_chefia = $cpf";
                        //VERIFICA SE A SENHA FOI ALTERADA COM SUCESSO
                            if(mysqli_query($link,$sql)){

                                //CONSULTA PARA VALIDAR LOGIN DO USUÁRIO
                                $sql = " Select * from tb_chefia_rest Where cpf_chefia = '$cpf' and senha_chefia = '$senha_oculta' ";
                                $resultado_id = mysqli_query($link,$sql);
                                $consulta = mysqli_fetch_array($resultado_id);

                                    if(isset($consulta['cpf_chefia'])){

                                        //Nível de acesso
                                        $nivel = $consulta['nivel_acesso_chefia'];

                                        //Atribuir usuario a session
                                        $_SESSION['chefia'] = $consulta['nome_chefia'];
                                        $_SESSION['nivel_acesso_chefia'] = $consulta['nivel_acesso_chefia'];
                                        $_SESSION['id_chefia'] = $consulta['id_chefia'];
                                        $_SESSION['cpf_chefia'] = $consulta['cpf_chefia'];


                                        //Direciona para a página home.php

                                        header('Location: verifica_acesso.php?id_chefia='.$cpf_oculto);



                                    }else{

                                        echo 'Usuário não existe, contate o administrador do sistema!';
                                    }


                            }else{

                                echo 'Erro ao alterar senha, contate o administrador do sistema!';
                                //echo '<br/>';
                                //echo $sql;

                            }

            }else{

                header('Location: alterar_senha.php?erro_senha_igual=1&erro='.$cpf_oculto.'&');
            }




//SE A SENHA FOR IGUAL A PADRÃO É RETORNADO PARA A PÁGINA DE ALTERAÇÃO DE SENHA COM UMA MENSAGEM	
}else{

	echo 'A senha não pode ser igual a saude!';

	header('Location: alterar_senha.php?erro_senha=1&erro='.$cpf_oculto.'&');

}



?>