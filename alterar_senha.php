<?php

  //Retorna a mensagem de erro da página validar_acesso.php.
  // Se existir exibe o erro se não retorna 0

  

  if(isset($_GET['erro'])){

    $erro = $_GET['erro'];

  //  echo 'Variável $erro existe: '.$erro;
  //  echo '<br/>';

  }else{

     $erro = 0;
   //  echo 'Variável $erro não existe: '.$erro;
    //  echo '<br/>';
  }



  if(isset($_GET['erro_senha'])){

    $erro_senha = $_GET['erro_senha'];
   // echo 'Variável $erro_senha existe: '.$erro_senha;
    // echo '<br/>';

  }else{

    $erro_senha = 0;
     // echo 'Variável $erro_senha não existe: '.$erro_senha;
      // echo '<br/>';
  }

 if(isset($_GET['erro_senha_igual'])){

    $erro_senha_igual = $_GET['erro_senha_igual'];
    // echo 'Variável $erro_senha_igual existe: '.$erro_senha_igual;
    //  echo '<br/>';

  }else{

    $erro_senha_igual = 0;
    // echo 'Variável $erro_senha_igual não existe: '.$erro_senha_igual;
     // echo '<br/>';

  }


  ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/formulario_nova_senha.css">
    <title>CONSAÚDE-Cadastro</title>
</head>
<body>
    <header>
        <div id="logotitulo">
            <a href="#">CONSAUDE</a>
            <h4>Atualização de Cadastro</h4>
        </div>
    </header>
    <section id="conteudo">
        <div class="formulario">
          
           <h4 class="titulo-form">Você esta usando a senha padrão do sistema.<br/>
            Por favor, altere sua senha!</h4><br/>
            <form method="post" action="validar_alteracao_senha.php?id=<?php echo $erro; ?>" >
              
             
               
                            
                  <label for="psw"><b>Senha</b></label>
                  <input type="password" placeholder="Digite sua senha" name="senha_1" required>

                  <label for="psw"><b>Senha</b></label>
                  <input type="password" placeholder="Repita a nova Senha" name="senha_2" required>
                     <?php

                            if($erro_senha == 1){

                            echo '<font color="#FF0000">A nova senha não pode ser saude!</font>';

                            }


                            if($erro_senha_igual == 1){

                            echo '<font color="#FF0000">As duas senhas devem ser iguais!</font>';

                            }

                     ?>
                                        
                  <button type="submit">Acessar</button>
                                   
              </form>

          
        </div>

    </section>

    
</body>
</html>