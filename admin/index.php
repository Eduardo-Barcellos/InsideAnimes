<?php

    require("../mysqli.php"); // pagina só vai funcionar se conectar com o arquivo "mysqli.php"
    require("../informacoes.php"); // pagina só vai funcionar se conectar com o arquivo "informacoes.php"

    $animes = new Animes($mysql); // Pegando a classe Animes

    $todosanimes = $animes->todosAnimes(); // Pegando todos animes do banco de dados

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - InsideAnimes</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/cores.css">
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    
    <header class="cabecario">
        <img src="../img/menu.png" alt="" class="menu" id="menulado">
        <img src="../img/sol.png" class="mudartema cabecaoff" name="cor" id="cor" alt="">
        <p class="textologo cabecaoff"><a href="../index.php">InsideAnimes</a></p>
        <form action="../resultados.php" method="get" class="cabecaoff">
            <div>
            <input type="text" placeholder="Search" name="pesquisar" class="pesquisar">
            <input type="submit" value="Pesquisar" class="submit">
            </div>
        </form>
        <nav class="navegacao cabecaoff">
            <ul class="lista">
                <li class="item"><a href="../index.php">Home</a></li>
                <li class="item"><a href="../catalogo.php">Animes</a></li>
                <li class="item"><a href="../login.php">Login</a></li>
            </ul>
        </nav>
    </header>

    <section class="menu2" id="#menu2">

    <div class="menu1">
        
        <img src="../img/sol.png" class="mudartema " name="cor" id="cor2" alt="">

        <form action="../resultados.php" class="form">
            <input type="text" name="pesquisar" class="pesquisar" placeholder="Search">
            <input type="submit" class="submit">
        </form>

        <nav class="navegacao2">
            <ul class="lista">
                <li class="item"><a href="../index.php">Home</a></li>
                <li class="item"><a href="../catalogo.php">Animes</a></li>
                <li class="item"><a href="../login.php">Login</a></li>
            </ul>
        </nav>
    </div>
    </section>

    <main> 
        <div class="divadm">
            <?php  foreach($todosanimes as $admin): ?>
                    
        
                    <div class="divflexanime">
                        <div>
                        <img src="../img/<?php echo $admin['foto'];?>.jpg" alt="" class="fotoanime">
                        </div>
                        <div>
                        <a class="nome" href="../anime.php?id=<?php echo $admin['id']; ?>"> 
                            <?php echo $admin['titulo']; ?>
                        </a>
                        </div>
                        <div>
                        <nav>
                            <a href="alterar.php?id=<?php echo $admin['id'];?>" class="link borda">Alterar</a>
                        </nav>
                        </div>
                    </div>

                
        
            <?php endforeach; ?>
        </div>
            <div class="center">
                <a href="adicionar.php" class="linkadd">Adicionar</a>
            </div>
    </main>




    <div class="final">
        <footer class="rodape">
            <p class="textologo footertexto"><a href="../index.php">InsideAnimes</a></p>
            <p class="copyright">&#169;Todos direitos reservados InsideAnimes 2022-2022</p>
            <div class="divflex">
                <a href="https://www.instagram.com/fuuzer_/"><img src="../img/logoinsta.png" alt="" class="logoredes"></a>
                <a href="https://twitter.com/eduziinn_"><img src="../img/logotwitter.png" alt="" class="logoredes"></a>
                <a href="https://www.facebook.com"><img src="../img/logofacebook.png" alt="" class="logoredes"></a>
            </div>
        </footer>
    </div>

    <script src="../js/mudarcor.js"></script>
    <script src="../js/menu.js"></script>
</body>
</html>