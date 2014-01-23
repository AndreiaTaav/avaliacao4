<?php

function validaPessoa($nome, $cpf, $nascimento, $sexo, $estado, $telefone, $observacoes){

    $formValido = true;
        
        $nome  =trim($nome);
        if(empty ($nome)){
            echo "Preencha o nome no campo. <br/>";
            $formValido = false;
           
        }
        
        else if(!preg_match("/^[a-zA-ZãÃáÀêÊéÉèÈíÍìÌôÔõÕóÓòÒúÚùÙûÛçÇ\s]+$/", $nome)) {
            echo "O formato do campo nome está inválido . Por favor digite novamente! <br/>";
            $formValido = false;
        }
        
        $cpf = trim($cpf);
        if(empty ($cpf)) {
            echo "Preencha o cpf no campo. <br/>";
            $formValido = false;
        }
        
        else if(!preg_match("/^\d{3}\\.\d{3}\\.\d{3}\\-\d{2}$/", $cpf)) {
            echo "O formato do campo cpf está inválido. Por favor digite novamente! <br/>";
            $formValido = false;
        }
        
        $nascimento = trim($nascimento);
        if(empty ($nascimento)){
            echo "Preencha o nascimento no campo. <br/>";
            $formValido = false;
        }
        
        else if(!preg_match("/^\d{2}\\/\d{2}\\/\d{4}$/", $nascimento)) {
            echo "O formato do campo nascimento está inválido. Por favor digite novamente! <br/>";
            $formValido = false;
        }
        
        else{
            $pedacos = explode('/', $nascimento);
            $dia = $pedacos[0];
            $mes = $pedacos[1];
            $ano = $pedacos[2];
            
            if(!checkdate ($mes,$dia,$ano)) {
                echo "Data inválida.<br/>";
                $formValido = false;
            }
            
            else {
                $dataYmd = $ano.$mes.$dia;
                $dataAtual = date ('Ymd');
                
                if($dataAtual < $dataYmd) {
                    echo "Data futura .Impossível prever o futuro! <br/>";
                    $formValido = false;
                }
            
            }
        }
        
        if ($sexo == null){
            echo "Selecione uma opcao para o campo sexo. <br/>";
            $formValido = false;
        }
        
        if ($estado == -1){
            echo "Selecione uma opcao para o campo estado. <br/>";
            $formValido = false;
        }
        
        $telefone = trim($telefone);
        if(empty($telefone)) {
            echo "Preencha o telefone no campo.<br/>";
            $formValido = false;
        }
        
        else if(!preg_match("/^(\d{3}\s)?\d{4}-\d{4}$/", $telefone)) {
            echo "O formato do campo telefone está inválido. Por favor digite novamente! <br/>";
            $formValido = false;
        }
        
        $observacoes = trim($observacoes);
        if(empty($telefone)){
            echo "Preencha as observaçoes no campo. <br/>";
            $formValido = false;
        }
        
        else if(!preg_match("/^[a-zA-ZãÃáÁàÀêÊéÉèÈíÍìÌôÔõÕóÓòÒúÚùÙûÛçÇ\s\\.\\,]+$/",$observacoes)) {
            echo "O formato do campo observaçoes está inválido. Por favor digite novamente! <br/>";
            $formValido = false;
        }
        
        
        
        
    return $formValido;
}

?>
