<?php 
    require("mysqli.php"); // só vai funcionar se tiver o mysqli.php
    require("informacoes.php"); // só vai funcionar se tiver o informacoes.php
    
    $obj = new Animes($mysql); // puxando a classe Animes e enviando a conexão do banco de dados no $mysql
    
    $pagina = $obj->encontrarID($_GET['id']); // enviando o ID do anime para a função encontrarID para a mesma trazer as informações do anime e armazenando o resultado na variavel $pagina
    ?> 


<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?php foreach($pagina as $informacoes): echo $informacoes['titulo'];
                    $data = str_replace("-","/",$informacoes['lancamento']); // Trocando o - por / na data do anime
            ?> - InsideAnimes</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/cores.css">
    <link rel="stylesheet" href="css/anime.css">
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

    <main class="container">
        <div class="conteudo">
            <section class="infos">


                <!-- Colocando as informações do anime -->

                <img src="img/<?php echo $informacoes['foto'] //inserindo a variavel $foto no html?>.jpg" alt="Logo " class="capaanime">

                <p>Lançamento: <?php echo $data; // inserindo o conteudo da coluna lancamento do banco de dados?> </p>

                <p>Episodios: <?php echo $informacoes["episodios"]; // inserindo o conteudo da coluna episodios do banco de dados?></p>

                <p>Tipo: <?php echo $informacoes["tipo"]; // inserindo o conteudo da coluna tipo do banco de dados?></p>

                <p>Genero: <?php echo $informacoes["genero"]; // inserindo o conteudo da coluna genero do banco de dados?></p>

                <p>Studio: <?php echo $informacoes["studio"]; // inserindo o conteudo da coluna studio do banco de dados?></p>

                <p>Criador: <?php echo $informacoes["criador"]; // inserindo o conteudo da coluna criador do banco de dados?></p>

            </section>

            <section class="infos2">

                <h1 class="nomeanime"><?php echo $informacoes["titulo"]; // inserindo o conteudo da coluna titulo do banco de dados sem as limpezas que fiz na variavel $foto?></h1>
                <div>
                    <?php 

                        $contador = 1; // criando um contador

                        while( $contador <= $informacoes["estrelas"]): // vai repetir o codigo adicionando uma estrela enquanto o $contador for menor ou igual a quantidade de estrelas informada no banco de dados ?>
                            <img src="img/star.png" alt="" class="estrela">

                            <?php $contador++; //aumentando em +1 o contador
                        endwhile;
                            ?>
                </div>
                <p class="sinopse">

                    <?php echo nl2br($informacoes["sinopse1"]); // inserindo o conteudo da coluna sinopse1 do banco de dados?>

                </p>

                    <?php endforeach; ?>

                <h2 class="textoassistir">Onde assistir</h2>
                <div class="assistir">
                    <a href="https://www.crunchyroll.com"><img src="img/crunchyroll.png" alt="" class="ondeassistir"></a>
                    <a href="https://betteranime.net"><img src="img/betteranimes.png" alt="" class="ondeassistir"></a>
                    <a href="https://animesup.biz"><img src="img/animesbr.webp" alt="" class="ondeassistir"></a>
                </div>
            </section>
        </div>
    </main>

    <div class="final">
        <footer class="rodape">
            <p class="textologo footertexto"><a href="index.php">InsideAnimes</a></p>
            <p class="copyright">&#169;Todos direitos reservados InsideAnimes 2022-2022</p>
            <div class="divflex">
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