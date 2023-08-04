

function colocaConteudo( el ){
    
       
        if ((el.value === 'tecnico') || (el.value === 'superiorincompleto') || (el.value === 'superiorcompleto') || (el.value === 'posgraduado') || (el.value === 'especializacao') || (el.value === 'mestrado') || (el.value === 'doutourado') || (el.value === 'posdoutourado') ){ 
            document.getElementById("dados7_descrinstrucao").innerHTML = "<label for='descrinstrucao' id='cor_grau'><b>Informe a(s) Especialidade(s):</b></label><textarea name='descrinstrucao' id='descrinstrucao'  rows='2' required maxlength='100' oninput='countText()'></textarea><label for='characters' id='caracteres'>Caracteres máx: <span id='characters'></span></label>";
            document.getElementById("dados7_descrinstrucao").focus();
        }

        else {
            document.getElementById("dados7_descrinstrucao").innerHTML = "";
        }

      }

function coloca_Conteudo() {
        document.getElementById("vinculo_oculto").innerHTML = "<div class='dados8_vinculo-empresa'><label for='empresa'><b>Informe o nome da empresa/Prefeitura:</b></label><input id='empresa' type='text' name='empresa' required></div><div class='dados8_vinculo-funcao'><label for='empresa_funcao'><b>Informe o nome do cargo/função:</b></label><input id='empresa_funcao' type='text' name='empresa_funcao' required></div>";
    }
    
    function retira_Conteudo() {
        document.getElementById("vinculo_oculto").innerHTML = "";
    }

    
    function colocaConteudo_idioma(){

        let el = document.querySelector('#incluir_excluir');
      
        el.classList.add("dados9_idioma-idiomas");
    }
    
    
    function retiraConteudo_idioma(){

        let el = document.querySelector('#incluir_excluir');
      
        el.classList.remove("dados9_idioma-idiomas");
           
    }

    
    
    