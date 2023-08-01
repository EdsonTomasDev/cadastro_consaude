<?php

require_once('conexao.php');


   //Criação do Objeto da Classe conexao da página conexao.php
    $conecta = new conexao();

   //Variável que recebe a função conecta_mysql
   $link = $conecta->conecta_mysql();



//Retorna a mensagem de erro da página validar_acesso.php.
// Se existir exibe o erro se não retorna 0

$erro = isset($_GET['erro']) ? $_GET['erro'] : 0;



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/formulario.css">
    <title>CONSAÚDE-Cargos</title>
</head>
<body>
    <header>
        <div id="logotitulo">
            <a href="#">CONSAUDE</a>
            <h4>QUAL TÍTULO VAI AQUI?</h4>
        </div>
    </header>
    <section id="conteudo">
        <div class="formulario">
          
            <h2>Faça seu Login</h2>
            <form method="post" action="validar_acesso.php" >
              
             
               
                  <label for="uname"><b>CPF</b></label>
                  <input type="text" placeholder="Digite seu CPF(somente números)" name="cpf" required>
              
                  <label for="psw"><b>Senha</b></label>
                  <input type="password" placeholder="Digite sua senha" name="senha" required>
                
              
                  <button type="submit">Acessar</button>
                
                  <?php

                  if($erro == 1){
    
                    echo '<font color="#FF0000">CPF ou senha inválidos!</font>';
    
                  }
    
                ?>
              
               
              </form>

          
        </div>

    </section>

    
</body>
</html>