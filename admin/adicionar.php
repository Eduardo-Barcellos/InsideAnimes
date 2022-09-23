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
    $estrelas = ""; // Definindo variavel
    $tipo = ""; // Definindo variavel


    $verificacaosinopse = false; // Definindo variavel
    $verificacaotitulo = false; // Definindo variavel
    $verificacaodata = false; // Definindo variavel
    $verificacaogenero = false; // Definindo variavel
    $verificacaostudio = false; // Definindo variavel
    $verificacaoepisodios = false; // Definindo variavel
    $verificacaocriador = false; // Definindo variavel
    $verificacaofoto = false; // Definindo variavel



    // TITULO

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {  // Se o request method do server for igual a "post" execute isso
        if (empty($_POST['titulo'])) {  // Se estiver vazio o campo mostre essa falha
            $erroTitulo = "Coloque um Titulo";
        } else {
                $titulo = $_POST['titulo'];  // Definindo variavel
                if (!preg_match("/^[a-zA-Z0-9 -'. ]*$/", $titulo)) { // Vendo se o titulo tem apenas os caracteres permitidos
                    $erroTitulo = "Caracters invalido";
                } else {
                    $verificacaotitulo = true;
                }
            }
        }



        // LANÇAMENTO

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {  // Se o request method do server for igual a "post" execute isso
            if (empty($_POST['data'])) {  // Se estiver vazio o campo mostre essa falha
                $erroData = "Coloque uma data";
            } else {
                $data = $_POST['data']; // Definindo variavel
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
                $erroEpisodios = "Coloque os episodios";
            } else {
                    $episodios = $_POST['episodios']; // Definindo variavel
                    if (!preg_match("/^[0-9]*$/", $episodios)) {
                        $erroEpisodios = "Apenas números";
                    } else { 
                        $verificacaoepisodios = true;
                    }
                }
        }



        // GENERO


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {  // Se o request method do server for igual a "post" execute isso
            if (empty($_POST['genero'])) {   // Se estiver vazio o campo mostre essa falha
                $erroGenero = "Coloque o genero";
            } else {
                    $genero = $_POST['genero']; // Definindo variavel
                    if (!preg_match("/^[a-zA-Zá-àÁ-À, ]*$/", $genero)) {
                        $erroGenero = "Apenas letras, espaços e virgula";
                    } else { 
                        $verificacaogenero = true;
                    }
                }
        }



        // STUDIO


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {  // Se o request method do server for igual a "post" execute isso
            if (empty($_POST['studio'])) {   // Se estiver vazio o campo mostre essa falha
                $erroStudio = "Coloque o studio";
            } else {
                    $studio = $_POST['studio']; // Definindo variavel
                    if (!preg_match("/^[a-zA-Z0-9'-,. ]*$/", $studio)) {
                        $erroStudio = "Caracteres inválidos";
                    } else { 
                        $verificacaostudio = true;
                    }
                }
        }



        // Genero


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {  // Se o request method do server for igual a "post" execute isso
            if (empty($_POST['criador'])) {   // Se estiver vazio o campo mostre essa falha
                $erroCriador = "Coloque o criador";
            } else {
                    $criador = $_POST['criador']; // Definindo variavel
                    if (!preg_match("/^[a-zA-Z0-9'-, ]*$/", $criador)) {
                        $erroeCriador = "Caracteres inválidos";
                    } else { 
                        $verificacaocriador = true;
                    }
                }
        }
        

        // SINOPSE

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            if (empty($_POST['sinopse1'])) {
                $erroSinopse = "Coloque uma sinopse";
            } else {
                $sinopse1 = $_POST['sinopse1'];
                if (strlen($sinopse1) < 100) {
                    $erroSinopse = "min: 100, max: 1300 caracteresa";
                } else {
                    if (strlen($sinopse1) > 1300) {
                        $erroSinopse = "min: 100, max: 1300 caracteres";
                    } else {
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




        // FOTO



        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            if (empty($_FILES['foto']['name'])) {
                $erroFoto = "Envie uma foto";
            } else {
                $verificacaofoto = true;
            }
        }


        if ($verificacaoepisodios == true && $verificacaogenero == true && $verificacaofoto == true && $verificacaodata == true && $verificacaotitulo == true && $verificacaocriador == true && $verificacaostudio == true && $verificacaosinopse == true) {

                // ADICIONANDO ANIME NO BANCO DE DADOS 
        
                $anime = new Animes($mysql); // chamando a classe Animes e mandando a conexão com o bano de dados para ela
                
                $data = intval($_POST['data']); // transformando a data em um valor int
        
                $foto = str_replace(" ","",$_POST['titulo']);
                $foto = strtolower($foto);
                $foto = str_replace('-',"",$foto);
        

                // puxando a função "adicionar" e enviando as informações do formulario para ele executar o código para adicionar no banco de dados
                $anime->adicionar($_POST['titulo'], $_POST['sinopse1'], $_POST['estrelas'], $data, $_POST['episodios'], $_POST['tipo'], $_POST['genero'], $_POST['studio'], $_POST['criador'], $foto); 
        

                
                // ENVIANDO A FOTO PARA A PASTA
        
                $foto = $_FILES['foto']; // colocando a foto em uma variavel
                $pasta = "../img/"; // pasta onde vai ficar o arquivo
                $nomedoanime = $_POST['titulo']; // colocando o titulo em uma variavel
                $nomeprafoto = str_replace(" ","",$nomedoanime); // tirando os espaços
                $nomeprafoto = str_replace("-","",$nomeprafoto); // tirando os "-"
                $nomefoto = strtolower($nomeprafoto); // colocando em letra minuscula e colocando o resultado na variavel $nomefoto
                $enviarfoto = move_uploaded_file($foto["tmp_name"], $pasta.$nomefoto."."."jpg"); // enviando a foto para a pasta com nome igual o valor da variavel $nomefoto e convertendo o arquivo para .jpg
        
                header("Location: index.php");
            }



    



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Anime - InsideAnimes</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/cores.css">
    <link rel="stylesheet" href="../css/adicionar.css">
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

    <form action="adicionar.php" enctype="multipart/form-data" method="POST" class="divgrid center">
        <input type="hidden" name="id" value="">
        <h1 class="titulo">Adicionar Anime</h1>
        <div class="background">
            <div class="divgrid main">
                <div class="divgrid div1">
                    <div>

                        <label for="" class="<?php if ($erroTitulo != "") { echo "erro"; } ?>">Titulo</label>
                        <input type="text" name="titulo" id="titulo" value="<?php if (isset($titulo)) { echo $titulo;} ?>" ><span class="erro"><?php echo $erroTitulo; ?></span>
                        <br><br>

                        <label for="">Estrelas</label>
                        <div class="select">
                        <select name="estrelas" id="estrelas" >
                            <option value="1" <?php if ($estrelas == 1) { echo "selected";} ?>>1</option>
                            <option value="2" <?php if ($estrelas == 2) { echo "selected";} ?>>2</option>
                            <option value="3" <?php if ($estrelas == 3) { echo "selected";} ?>>3</option>
                            <option value="4" <?php if ($estrelas == 4) { echo "selected";} ?>>4</option>
                            <option value="5" <?php if ($estrelas == 5) { echo "selected";} ?>>5</option>
                        </select>
                        </div>
                        <br><br>

                        <label for="data" class="<?php if ($erroData != "") { echo "erro"; } ?>">Lançamento</label>
                        <input type="text" name="data" id="data" placeholder="aaaammdd" value="<?php if (isset($data)) { echo $data;} ?>" > <span class="erro"><?php echo $erroData; ?></span>
                        <br><br>

                        <label for="episodios" class="<?php if ($erroEpisodios != "") { echo "erro"; } ?>">Episodios</label>
                        <input type="number" name="episodios" id="episodios" value="<?php if (isset($episodios)) { echo $episodios;} ?>" ><span class="erro"><?php echo $erroEpisodios; ?></span>
                        <br><br>


                        <br>

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
                        <input type="text" name="genero" id="genero" value="<?php if (isset($genero)) { echo $genero;} ?>"  ><span class="erro"> <?php echo $erroGenero; ?></span>
                        <br> <br>

                        <label for="studio" class="<?php if ($erroStudio != "") { echo "erro"; } ?>">Studio</label>
                        <input type="text" name="studio" id="studio" value="<?php if (isset($studio)) { echo $studio;} ?>"  ><span class="erro"> <?php echo $erroStudio; ?></span>
                        <br> <br>

                        <label for="criador"  class="<?php if ($erroCriador != "") { echo "erro"; } ?>">Criador</label>
                        <input type="text" name="criador" id="criador" value="<?php if (isset($criador)) { echo $criador;} ?>"><span class="erro"> <?php echo $erroCriador; ?></span>
                        <br> <br>

                        <label for="foto" class="<?php if ($erroFoto != "") { echo "erro"; } ?>">Foto do anime</label>
                        <input type="file" name="foto" id="foto" > <span class="erro"><?php echo $erroFoto ?></span>
                        <br><br>
                    </div>
                </div>
                <br>
                <div class="divgrid div2">

                        <label for=""class=" <?php if ($erroSinopse != "") { echo "erro"; } ?>">Sinopse</label>
                        <textarea name="sinopse1" id="sinopse1" cols="15" rows="6" ><?php if (isset($sinopse1)) { echo $sinopse1;} ?></textarea> <span class="erro"><?php echo $erroSinopse; ?></span>

                </div>   
                
                    <br>
                    <input type="submit" name="enviar" class="submit2" value="Adicionar">

                </div>
                </form>

                <div class="voltarr">
                    <a href="index.php" class="buttonvoltar">Voltar</a>
                </div>
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