<?php

    require("../mysqli.php"); // pagina só vai funcionar se conectar com o arquivo "mysqli.php"
    require("../informacoes.php"); // pagina só vai funcionar se conectar com o arquivo "informacoes.php"

    $erroTitulo = ""; // Definindo variavel
    $erroData = ""; // Definindo variavel
    $erroGenero = ""; // Definindo variavel
    $erroStudio = ""; // Definindo variavel
    $erroCriador = ""; // Definindo variavel
    $erroEpisodios = ""; // Definindo variavel
    $erroSinopse = ""; // Definindo variavel
    $erroFoto = ""; // Definindo variavel


    $verificacaosinopse = false; // Definindo variavel
    $verificacaotitulo = false; // Definindo variavel
    $verificacaodata = false; // Definindo variavel
    $verificacaogenero = false; // Definindo variavel
    $verificacaostudio = false; // Definindo variavel
    $verificacaoepisodios = false; // Definindo variavel
    $verificacaocriador = false; // Definindo variavel
    $verificacaofoto = false; // Definindo variavel


    $anime = new Animes($mysql); // Pegando a classe Animes

    $infos = $anime->encontrarID($_GET['id']); // Buscando o anime pelo ID

    foreach($infos as $info): 

    $titulo = $info['titulo'];  // Definindo variavel
    $data = $info['lancamento'];  // Definindo variavel
    $sinopse = $info['sinopse1'];  // Definindo variavel
    $episodios = $info['episodios'];  // Definindo variavel
    $genero = $info['genero'];  // Definindo variavel
    $studio = $info['studio'];  // Definindo variavel
    $criador = $info['criador'];  // Definindo variavel
    $tipo = $info['tipo']; // Definindo variavel
    $estrelas = $info['estrelas']; // Definindo variavel

    // TITULO

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {  // Se o request method do server for igual a "post" execute isso
        if (empty($_POST['titulo'])) {  // Se estiver vazio o campo mostre essa falha
            $titulo = $_POST['titulo']; 
            $erroTitulo = "Coloque um Titulo";
        } else {
                if (!preg_match("/^[a-zA-Z0-9 -'. ]*$/", $titulo)) { // Vendo se o titulo tem apenas os caracteres permitidos
                    $titulo = $_POST['titulo']; 
                    $erroTitulo = "Caracters invalido";
                } else {
                    $titulo = $_POST['titulo']; 
                    $verificacaotitulo = true;
                }
            }
        }



        // LANÇAMENTO

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {  // Se o request method do server for igual a "post" execute isso
            if (empty($_POST['data'])) {  // Se estiver vazio o campo mostre essa falha
                $data = $_POST['data'];
                $erroData = "Coloque uma data";
            } else {
                $data = $_POST['data'];
                if (!preg_match("/^[0-9]*$/", $data)) {
                    $erroData = "Apenas números";
                } else { 
                    if (strlen($data) != 8) {
                        $data = $_POST['data'];
                        $erroData = "Insira uma data";
                    } else {
                        $data = $_POST['data'];
                        $verificacaodata = true;
                    }
                }
            }
        }



        // EPISODIOS


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {  // Se o request method do server for igual a "post" execute isso
            if (empty($_POST['episodios'])) {   // Se estiver vazio o campo mostre essa falha
                $episodios = $_POST['episodios'];
                $erroEpisodios = "Coloque os episodios";
            } else {
                $episodios = $_POST['episodios'];
                    if (!preg_match("/^[0-9]*$/", $episodios)) {
                        $erroEpisodios = "Apenas números";
                    } else { 
                        $episodios = $_POST['episodios'];
                        $verificacaoepisodios = true;
                    }
                }
        }



        // GENERO


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {  // Se o request method do server for igual a "post" execute isso
            if (empty($_POST['genero'])) {   // Se estiver vazio o campo mostre essa falha
                $genero = $_POST['genero'];
                $erroGenero = "Coloque o genero";
            } else {
                    $genero = $_POST['genero'];
                    if (!preg_match("/^[a-zA-Zá-àÁ-À, ]*$/", $genero)) {
                        $erroGenero = "Apenas letras, espaços e virgula";
                    } else { 
                        $genero = $_POST['genero'];
                        $verificacaogenero = true;
                    }
                }
        }



        // STUDIO


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {  // Se o request method do server for igual a "post" execute isso
            if (empty($_POST['studio'])) {   // Se estiver vazio o campo mostre essa falha
                $studio = $_POST['studio'];
                $erroStudio = "Coloque o studio";
            } else {
                    $studio = $_POST['studio'];
                    if (!preg_match("/^[a-zA-Z0-9'-,. ]*$/", $studio)) {
                        $erroStudio = "Caracteres inválidos";
                    } else { 
                        $studio = $_POST['studio'];
                        $verificacaostudio = true;
                    }
                }
        }



        // Genero


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {  // Se o request method do server for igual a "post" execute isso
            if (empty($_POST['criador'])) {   // Se estiver vazio o campo mostre essa falha
                $criador = $_POST['criador'];
                $erroCriador = "Coloque o criador";
            } else {
                    $criador = $_POST['criador'];
                    if (!preg_match("/^[a-zA-Z0-9'-, ]*$/", $criador)) {
                        $erroeCriador = "Caracteres inválidos";
                    } else {
                        $criador = $_POST['criador'];
                        $verificacaocriador = true;
                    }
                }
        }
        

        // SINOPSE

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            if (empty($_POST['sinopse1'])) {
                $sinopse = $_POST['sinopse1'];
                $erroSinopse = "Coloque uma sinopse";
            } else {
                $sinopse = $_POST['sinopse1'];
                if (strlen($sinopse) < 100) {
                    $erroSinopse = "min: 100, max: 1300 caracteres";
                } else {
                    if (strlen($sinopse) > 1300) {
                        $erroSinopse = "min: 100, max: 1300 caracteres";
                    } else {
                        $sinopse = $_POST['sinopse1'];
                        $verificacaosinopse = true;
                    }
                }
            }
        }


        // SELECT

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            if (!empty($_POST['tipo'])) {
                $tipo = $_POST['tipo'];
            }
        }

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            if (!empty($_POST['estrelas'])) {
                $estrelas = $_POST['estrelas'];
            }
        }


        
    if ($verificacaoepisodios == true && $verificacaogenero == true && $verificacaodata == true && $verificacaotitulo == true && $verificacaocriador == true && $verificacaostudio == true && $verificacaosinopse == true) {
        


        $anime->editar($_POST['titulo'],$_POST['sinopse1'],$_POST['estrelas'],$_POST['data'],$_POST['episodios'],$_POST['tipo'],$_POST['genero'],$_POST['studio'],$_POST['criador'],$_POST['id']); // enviando informações para function editar

            if (!empty($_FILES['foto']['name'])) {
                $foto = $_FILES['foto']; // colocando a foto em uma variavel
                $pasta = "../img/"; // pasta onde vai ficar o arquivo
                $nomedoanime = $_POST['titulo']; // colocando o titulo em uma variavel
                $nomeprafoto = str_replace(" ","",$nomedoanime); // tirando os espaços
                $nomeprafoto = str_replace("-","",$nomeprafoto); // tirando os "-"
                $nomefoto = strtolower($nomeprafoto); // colocando em letra minuscula e colocando o resultado na variavel $nomefoto
                $enviarfoto = move_uploaded_file($foto["tmp_name"], $pasta.$nomefoto."."."jpg"); // enviando a foto para a pasta com nome igual o valor da variavel $nomefoto e convertendo o arquivo para .jpg
                $anime->editarFoto($nomeprafoto, $_POST['id']);
            }

        header("Location: index.php");

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Anime - InsideAnimes</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/cores.css">
    <link rel="stylesheet" href="../css/editar.css">
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
    <?php
        $data = str_replace("-","",$data)
        ?>
    <form action="" enctype="multipart/form-data" method="POST" class="divgrid center">
        <input type="hidden" name="id" value="<?php echo $info['id'] ?>">
        <h1 class="titulo">Editando: <?php echo $info['titulo'];?></h1>
        <div class="background">
            <div class="divgrid main">
                <div class="divgrid div1">
                    <div>

                        <label for="" class="<?php if ($erroTitulo != "") { echo "erro"; } ?>">Titulo</label>
                        <input type="text" name="titulo" id="titulo" value="<?php echo $titulo;?>"><span class="erro"><?php echo $erroTitulo; ?></span>
                        <br><br>

                        <label for="">Estrelas</label>
                        <div class="select">
                        <select name="estrelas" id="estrelas" required>
                        
                            <option value="1" <?php if ($estrelas  == 1) { echo "selected";}; ?>>1</option>
                            <option value="2" <?php if ($estrelas == 2) { echo "selected";}; ?>>2</option>
                            <option value="3" <?php if ($estrelas == 3) { echo "selected";}; ?>>3</option>
                            <option value="4" <?php if ($estrelas == 4) { echo "selected";}; ?>>4</option>
                            <option value="5" <?php if ($estrelas == 5) { echo "selected";}; ?>>5</option>
                        </select>
                        </div>
                        <br><br>

                        <label for="data" class="<?php if ($erroData != "") { echo "erro"; } ?>">Lançamento</label>
                        <input type="text" name="data" id="data" placeholder="aaaammdd" value="<?php echo $data;?>"><span class="erro"><?php echo $erroData; ?></span>
                        <br><br>

                        <label for="episodios" class="<?php if ($erroEpisodios != "") { echo "erro"; } ?>">Episodios</label>
                        <input type="number" name="episodios" id="episodios" value="<?php echo $episodios;?>" ><span class="erro"><?php echo $erroEpisodios; ?></span>
                        <br><br>

                        <label for="tipo">Tipo</label>
                        <div class="select">
                            <select name="tipo" id="tipo" required>
                                <option value="TV" <?php if ($tipo == "TV") { echo "selected";} ?>>TV</option>
                                <option value="Filme" <?php if ($tipo == "Filme") { echo "selected";} ?>>Filme</option>
                            </select>
                            <br>
                        </div>
                    </div>
                    <div>
                        <label for="genero" class="<?php if ($erroGenero != "") { echo "erro"; } ?>">Genero</label>
                        <input type="text" name="genero" id="genero" value="<?php echo $genero;?>" ><span class="erro"> <?php echo $erroGenero; ?></span>
                        <br> <br>

                        <label for="studio" class="<?php if ($erroStudio != "") { echo "erro"; } ?>">Studio</label>
                        <input type="text" name="studio" id="studio" value="<?php echo $studio;?>" ><span class="erro"> <?php echo $erroStudio; ?></span>
                        <br> <br>

                        <label for="criador"  class="<?php if ($erroCriador != "") { echo "erro"; } ?>">Criador</label>
                        <input type="text" name="criador" id="criador" value="<?php echo $criador;?>" ><span class="erro"> <?php echo $erroCriador; ?></span>
                        <br> <br>

                        <label for="foto" class="<?php if ($erroFoto != "") { echo "erro"; } ?>">Foto do anime</label>
                        <input type="file" name="foto" id="foto"><span class="erro"><?php echo $erroFoto ?></span>
                        <br>
                    </div>
                </div>
                <div class="divgrid div2">

                    <label for=""class="<?php if ($erroSinopse != "") { echo "erro"; } ?>">Sinopse</label>
                    <textarea name="sinopse1" id="sinopse1" cols="15" rows="6" ><?php echo $sinopse;?></textarea><br><span class="erro"><?php echo $erroSinopse; ?></span>
                    
                </div>   
                <br>
                <input type="submit" name="enviar" class="submit2" value="Editar">
            </div>
            </form>
            <div class="voltarexcluir">
                <form action="excluir.php" class="excluir">                  
                    <input type="hidden" name="id" value="<?php echo $info['id'];?>">
                    <button href="excluir.php?id=<?php echo $info['id'];?>" class="excluirb" onclick="return confirm('Tem certeza?')" >Excluir</button>
                    <br>
                </form>
                <div class="voltarr">
                    <a href="index.php" class="buttonvoltar">Voltar</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
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