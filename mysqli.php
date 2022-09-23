<?php

    $mysql = new mysqli("localhost", "root", "", "conteudo"); // conectando o banco de dados na variavel $mysql
    $mysql->set_charset("utf8"); // setando o charset no banco de dados


    if ($mysql == false){ // caso a conexão com o banco de dados falhe vai exibir uma mensagem
        echo "banco não conectou";
    }

?>