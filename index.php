<?php

  require("mysqli.php"); // pagina só vai funcionar se conectar com o arquivo "mysqli.php"
  require("informacoes.php"); // pagina só vai funcionar se conectar com o arquivo "informacoes.php"

  $info = new Animes($mysql); // Pegando a classe Animes


  // Animes principais 
  $anime1 = $info->encontrarNome("Attack on titan");
  $anime2 = $info->encontrarNome("Naruto Shippuden");
  $anime3 = $info->encontrarNome("Bloom into you");
  $anime4 = $info->encontrarNome("lycoris recoil");


  // Animes lado 1
  $categoria1 = "Melhores Harém";
  $anime5 = $info->encontrarNome("School Days");
  $anime6 = $info->encontrarNome("Toubun no Hanayome");
  
  // Animes lado 2
  $categoria2 = "Melhores Yuri";
  $anime7 = $info->encontrarNome("Yuru Yuri");
  $anime8 = $info->encontrarNome("Asagao to Kase-san");

  ?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/cores.css">
    <link rel="stylesheet" href="css/home.css">
    <title>Home - InsideAnimes</title>
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
                <li class="item ativo"><a href="index.php">Home</a></li>
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
                    <li class="item"><a href="index.php" class="ativo">Home</a></li>
                    <li class="item"><a href="catalogo.php">Animes</a></li>
                    <li class="item"><a href="login.php">Login</a></li>
                </ul>
            </nav>
        </div>
    </section>

    <h1 class="titulo-principal">Animes da temporada</h1>
    <div class="slider">
      <div class="slides">
        <input type="radio" name="radio-btn" id="radio1">
        <input type="radio" name="radio-btn" id="radio2">
        <input type="radio" name="radio-btn" id="radio3">
        <input type="radio" name="radio-btn" id="radio4">
  
        <div class="slide first">
          <div class="bg-1">
            <a href="anime.php?id=12"><img class="a" src="img/spyxfamilly.jpg" alt="Spy family"></a>
          </div>
        </div>
        <div class="slide">
          <div class="bg-2">
            <a href="anime.php?id=1"><img class="a" src="img/adachitoshimamura.jpg" alt="adachito shimamura"></a>
          </div>
        </div>
        <div class="slide">
          <div class="bg-3">
            <a href="anime.php?id=3"><img class="a" src="img/attackontitan.jpg" alt="attackontitan"></a>
          </div>
        </div>
        <div class="slide">
          <div class="bg-4">
            <a href="anime.php?id=13"><img class="a" src="img/tenkinoko.jpg" alt="tenki no ko"></a>
          </div>
        </div>
  
        <div class="navegacao-auto">
          <div class="auto-btn1"></div>
          <div class="auto-btn2"></div>
          <div class="auto-btn3"></div>
          <div class="auto-btn4"></div>
        </div>
  
      </div>
  
  
      <div class="navegacao-manual">
        <label for="radio1" class="manual-btn"></label>
        <label for="radio2" class="manual-btn"></label>
        <label for="radio3" class="manual-btn"></label>
        <label for="radio4" class="manual-btn"></label>
      </div>
    </div>
  
    
    
    <h2 class="destaques">Destaques</h2>

    <main class="principal">
      <div class="animes-principal">
      <?php foreach($anime1 as $anime1): ?>
        <div class="grid">
        <h2 class="titulo"><?php echo $anime1['titulo'] ?></h2>
        <a href="anime.php?id=<?php echo $anime1['id'];?>"><img class="foto" src="img/<?php echo $anime1['foto'] ?>.jpg" alt=""></a>
          <div class="info">
            <div class="estrelas">
                <?php  for($i = 1; $i <= $anime1['estrelas']; $i++): ?>

                  <img class="estrela" src="img/star.png" alt="">

                <?php endfor; ?>
          </div>
          <p class="descricao">
            <?php
                $sinopse = substr($anime1['sinopse1'], 0, 250);
                echo $sinopse;
            ?><a href="anime.php?id=<?php echo $anime1['id'];?>">...</a>
        <?php endforeach; ?>
          </p>
        </div>
      </div>
      <div class="grid">
      
      <?php  foreach($anime2 as $anime2): ?>

        <h2 class="titulo"><?php echo $anime2['titulo'];?></h2>

          <a href="anime.php?id=<?php echo $anime2['id'];?>"><img class="foto" src="img/<?php echo $anime2['foto']; ?>.jpg" alt=""></a>
          <div class="info">
            <div class="estrelas">
              <?php for($i = 1; $i <= $anime2["estrelas"]; $i++): ?>

                <img class="estrela"src="img/star.png" alt="">

                <?php endfor; ?>
            </div>
            <p class="descricao">
                <?php
                    $sinopse = substr($anime2['sinopse1'], 0, 250);
                    echo $sinopse;
                ?><a href="anime.php?id=<?php echo $anime2['id'];?>">...</a>
            </p>
          </div>
          <?php endforeach; ?>





      </div>
        <div class="grid">
          <?php foreach($anime3 as $anime3): ?>

              <h2 class="titulo"><?php echo $anime3['titulo']; ?></h2>
              <a href="anime.php?id=<?php echo $anime3['id'];?>"><img class="foto" src="img/<?php echo $anime3['foto']; ?>.jpg" alt=""></a>
              <div class="info">
                <div class="estrelas">
                    <?php for($i = 1; $i <= $anime3['estrelas']; $i++): ?>

                      <img class="estrela" src="img/star.png" alt="">

                    <?php endfor; ?>
                </div>
            <?php endforeach; ?>
              <p class="descricao">
                  <?php
                    $sinopse = substr($anime3["sinopse1"], 0, 250);
                    echo $sinopse;
                  ?><a href="anime.php?id=<?php echo $anime3['id'];?>">...</a>
              </p>
            </div>




      </div>
      <div class="grid">
        <?php foreach($anime4 as $anime4): ?>

            <h2 class="titulo"><?php echo $anime4['titulo']; ?></h2>

            <a href="anime.php?id=<?php echo $anime4['id'];?>"><img class="foto" src="img/<?php echo $anime4['foto']; ?>.jpg" alt=""></a>
            <div class="info">
              <div class="estrelas">
                    <?php for($i = 1; $i <= $anime4['estrelas']; $i++): ?>

                      <img class="estrela" src="img/star.png" alt="">

                    <?php endfor; ?>

              </div>
              <p class="descricao">
                <?php
                  $sinopse = substr($anime4['sinopse1'], 0, 250);
                  echo $sinopse;
                ?><a href="anime.php?id=<?php echo $anime4['id'];?>">...</a>
              </p>
            </div>
          </div>
        <?php endforeach; ?>  
    </div>
    



    <article class="animes-container">
    <div class="animes-lado">
      <h2 class="categoria"><?php echo $categoria1 ?></h2>
      <div class="grid2">
        
        <?php foreach($anime5 as $anime5): ?>
        
        <a href="anime.php?id=<?php echo $anime5['id']?>">
          <h2 class="titulo"><?php echo $anime5['titulo'] ?></h2>
        </a>

        <a href="anime.php?id=<?php echo $anime5['id'];?>">
          <img class="foto" src="img/<?php echo $anime5['foto']?>.jpg" alt="">
        </a>

          <?php endforeach; ?>
      </div>
      
      <div class="grid2">

          <?php foreach($anime6 as $anime6): ?>
            <a href="anime.php?id=<?php echo $anime6['id'];?>">
              <h2 class="titulo"><?php echo $anime6['titulo']; ?></h2>
            </a>
            
            <a href="anime.php?id=<?php echo $anime6['id'];?>">
              <img class="foto" src="img/<?php echo $anime6['foto'];?>.jpg" alt="">
            </a>
            </div>

        <?php endforeach; ?>

      </div>
    </div>

  <div class="animes-lado2">
    <h2 class="categoria"><?php echo $categoria2; ?></h2>
    <div class="grid2">

      <?php foreach($anime7 as $anime7): ?>
      
      <a href="anime.php?id=<?php echo $anime7['id']?>">
        <h2 class="titulo"><?php echo $anime7['titulo'] ?></h2>
      </a>

      <a href="anime.php?id=<?php echo $anime7['id'];?>">
        <img class="foto" src="img/<?php echo $anime7['foto']?>.jpg" alt="">
      </a>

        <?php endforeach; ?>

    </div>
    
    <div class="grid2">
      <?php foreach($anime8 as $anime8): ?>
        <a href="anime.php?id=<?php echo $anime8['id'];?>">
          <h2 class="titulo"><?php echo $anime8['titulo']; ?></h2>
        </a>
        
        <a href="anime.php?id=<?php echo $anime8['id'];?>">
          <img class="foto" src="img/<?php echo $anime8['foto'];?>.jpg" alt="">
        </a>
        </div>

    <?php endforeach; ?>
  </article>

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

    <script src="js/script.js"></script>
    <script src="js/mudarcor.js"></script>
    <script src="js/menu.js"></script>
</body>
</html>