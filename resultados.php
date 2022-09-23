<?php

    require("mysqli.php"); // só vai funcionar se tiver o mysqli.php
    require("informacoes.php"); // só vai funcionar se tiver o informacoes.php

    $obj = new Animes($mysql); // puxando a classe Informacoes e enviando o banco de dados conectado no $mysql
    
    $pesquisa = $_GET['pesquisar']; // armazenando o que foi digitado no input "pesquisar"

    $sql_code = "SELECT * FROM pagina WHERE titulo LIKE '%$pesquisa%'"; // código a ser executado no banco de dados

    $sql_query = $mysql->query($sql_code) or die("ERRO ao consultar" . $mysqli->error); // executando o código e armazendo o resultado e mostrar um erro caso falhe o código

    $resultados = $sql_query->fetch_all(MYSQLI_ASSOC); // transformando o resultado da minha pesquisa em um array para que o php possa ler
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resutados da pesquisa "<?php echo $pesquisa; ?>" - InsideAnimes</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/cores.css">
    <link rel="stylesheet" href="css/resultados.css">
</head>
<body>

<header class="cabecario">
        <img src="img/menu.png" alt="" class="menu" id="menulado">
        <img src="img/sol.png" class="mudartema cabecaoff" name="cor" id="cor" alt="">
        <p class="textologo cabecaoff"><a href="index.php">InsideAnimes</a></p>
        <form action="resultados.php" method="get" class="cabecaoff">
            <div>
            <input type="text" placeholder="Search" name="pesquisar" class="pesquisar">
            <input type="submit" value="Pesquisar" class="submit">
            </div>
        </form>
        <nav class="navegacao cabecaoff">
            <ul class="lista">
                <li class="item"><a href="index.php">Home</a></li>
                <li class="item"><a href="catalogo.php">Animes</a></li>
                <li class="item"><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>

    <section class="menu2" id="#menu2">
        <div class="menu1">
            <img src="img/sol.png" class="mudartema " name="cor" id="cor2" alt="">

            <form action="resultados.php" class="form">
                <input type="text" name="pesquisar" class="pesquisar" placeholder="Search">
                <input type="submit" class="submit">
            </form>

            <nav class="navegacao2">
                <ul class="lista">
                    <li class="item"><a href="index.php">Home</a></li>
                    <li class="item"><a href="catalogo.php">Animes</a></li>
                    <li class="item"><a href="login.php">Login</a></li>
                </ul>
            </nav>
        </div>
    </section>

    <section class="conteudo">
        <h1 class="conteudotitulo">Resultados da sua pesquisa</h1>
        <div class="divflex">
            <?php

                if ($sql_query->num_rows == 0) { // mostrar o texto caso não tenha resultado a busca
                    echo 'Nenhum resultado';
                } else {
                    foreach($resultados as $dados): // repetindo a busca conforme a quantidade de resultado teve, mudando o array a cada final de repetição?> 

                        <a href="anime.php?id=<?php echo $dados['id'] //inserindo o id do anime no link?>"><img  src="img/<?php echo $dados['foto']?>.jpg" alt="" class="imagempesquisa"></a> 
                        
                    <?php
                        endforeach;
                }
            ?>
        </div>
    </section>
    
    <div class="final">
        <footer class="rodape">
            <p class="textologo footertexto"><a href="index.php">InsideAnimes</a></p>
            <p class="copyright">&#169;Todos direitos reservados InsideAnimes 2022-2022</p>
            <div class="divflexfooter">
                <a href="https://www.instagram.com/fuuzer_/"><img src="img/logoinsta.png" alt="" class="logoredes"></a>
                <a href="https://twitter.com/eduziinn_"><img src="img/logotwitter.png" alt="" class="logoredes"></a>
                <a href="https://www.facebook.com"><img src="img/logofacebook.png" alt="" class="logoredes"></a>
            </div>
        </footer>
    </div>

    <script src="js/mudarcor.js"></script>
    <script src="js/menu.js"></script>

</body>
</html>