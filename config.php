<?php
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbNome = 'agendamentos';

    $conexao=new mysqli($dbHost,$dbUsername,$dbPassword,$dbNome);
    /* 

    if($conexao->connect_errno){
        echo "Erro";
    }
    else{
        echo "Conexão efetuada com sucesso";
    }
    */
?>