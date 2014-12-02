<?php
    include_once 'classes/escola.php';
    include_once 'configuracao.php';
    
    $escola = new Escola();
        
        $ligacao = $escola->ligaBD();
        
        if ($ligacao){
            echo "Sucesso";
            $ligacao->close();        
        }
        else {
            echo "Erro na ligacao!!";
        }

    