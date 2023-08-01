<?php
session_start();

if(!isset($_SESSION['chefia'])){

  header('Location: ../index.php');
}


require_once('../conexao.php');


 //Criação do Objeto da Classe conexao da página conexao.php
              $conecta = new conexao();

             //Variável que recebe a função conecta_mysql
             $link = $conecta->conecta_mysql();

    ///VARIÁVEL DE SERÁ UTILIZADA PARA CHAMAR OS FUNCIONÁRIOS DE CADA CHEFIA
    $id_cod_cpf_chefia = $_GET['id_chefia'];

   // echo base64_decode($id_cod_cpf_chefia);

   // die();

?>

<!DOCTYPE html>
<html lang="pt-b">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/index.css">
    <link rel="stylesheet" type="text/css" href="../css/formulario.css">
    <link rel="stylesheet" type="text/css" href="../css/descricao_adm.css">
    <title>CONSAÚDE-Cargos</title>
</head>
<body>
        <header>
            <div id="logotitulo">
                <a href="#">CONSAUDE</a>
                <h4>QUAL TÍTULO VAI AQUI?</h4>
            </div>
         </header>
         <section id="conteudo_adm">
            
                <!-- EXIBE O NOME DA PESSOA LOGADA -->
                <div class="nome_chefia">
                    <h4>Olá, 
                    <?php 
                    //EXIBE APENAS 20 CARACTERES NO NOME DO LOGADO
                    if(strlen($_SESSION['chefia']) > 20){
                        echo substr($_SESSION['chefia'], 0, 20);
                    }
                    // senão exibi o texto completo
                    else{
                        echo $_SESSION['chefia'];
                    }
                    
                    
                    //Verifica se o usuário possui nível de administrador

                    if($_SESSION['nivel_acesso_chefia'] == 1){

                        $acesso = '(Adm)';
                        $link_ativo = 1;

                        echo $acesso;
                    }
                        //VARIÁVEL DE SERÁ UTILIZADA PARA CHAMAR OS FUNCIONÁRIOS DE CADA CHEFIA
                    //  $codigo_cpf_chefia = $_SESSION['cpf_chefia']; 

                    ?>
                    </h4>
                    <a href="../sair.php">Sair</a>
                </div>

            </section>
    <h1>TELA DESCRIÇÃO DE CARGOS ADMINISTRATIVO</h1>
    <br/>
    
    
</body>
</html>