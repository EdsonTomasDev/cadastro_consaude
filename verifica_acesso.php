<?php
session_start();

if(!isset($_SESSION['chefia'])){

  header('Location: index.php');
}

 

    //VARIÁVEL DE SERÁ UTILIZADA PARA CHAMAR OS FUNCIONÁRIOS DE CADA CHEFIA
    $id_cod_cpf_chefia = $_GET['id_chefia'];

   // echo $id_cod_cpf_chefia;

   // die();

  //Verifica se o usuário possui nível de administrador
            if($_SESSION['nivel_acesso_chefia'] == 1){

             //VARÍAVEL QUE DEFINE SE IRÁ EXIBIR TABELA DE FUNCIONÁRIOS DE AVALIADOR OU ADMINISTRADOR NA PAGINA HOME
            //SE 1 ADMINISTRADOR, SE 0 AVALIADOR
              $escolhe_acesso = 1;
                header('Location: adm/descricao_adm.php?id_chefia='.$id_cod_cpf_chefia);
             
            }else{
            //VARÍAVEL QUE DEFINE SE IRÁ EXIBIR TABELA DE FUNCIONÁRIOS DE AVALIADOR OU ADMINISTRADOR NA PAGINA HOME
            //SE 1 ADMINISTRADOR, SE 0 AVALIADOR
                 $escolhe_acesso = 0;
                  header('Location: chefias/descricao.php?id_chefia='.$id_cod_cpf_chefia);

            }



?>