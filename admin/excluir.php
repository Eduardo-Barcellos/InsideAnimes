<?php


    require("../mysqli.php"); // pagina só vai funcionar se conectar com o arquivo "mysqli.php"
    require("../informacoes.php"); // pagina só vai funcionar se conectar com o arquivo "informacoes.php"

    $animes = new Animes($mysql); // Pegando a classe Animes

    $animes->excluir($_GET['id']); // Usando a função excluir com o id enviado
    header("location: index.php"); // Redirecionando para o index

?>
