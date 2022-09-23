<?php

    $erroLogin = ""; // Definindo variavel
    $erroSenha = ""; // Definindo variavel
    $verificacaologin = false; // Definindo variavel
    $verificacaosenha = false; // Definindo variavel

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {  // Se o request method do server for igual a "post" execute isso
        if (empty($_POST['login'])) {  // Se estiver vazio o campo mostre essa falha
            $erroLogin = "Preencha seu login";
        } else {
                $login = $_POST['login'];  // Definindo variavel
                if (!preg_match("/^[a-zA-Z0-9 -' ]*$/", $login)) { // Vendo se o login tem apenas os caracteres permitidos
                    $erroLogin = "Caracters invalido";
                } else {$verificacaologin = true; }
            }
        }


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {  // Se o request method do server for igual a "post" execute isso
            if (empty($_POST['senha'])) {   // Se estiver vazio o campo mostre essa falha
                $erroSenha = "Preencha sua senha";
            } else {
                        $senha = $_POST['senha']; // Definindo variavel
                        if (strlen($senha) < 5){  // Se a senha tiver menos que 5 caracteres mostre esse erro
                            $erroSenha = "Senha muito curta";
                        } else {$verificacaosenha = true; }
                    }
                }

        if ($verificacaologin == true && $verificacaosenha == true) {
            header("Location: index.php");
        }

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - InsideAnimes</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/cores.css">
    <link rel="stylesheet" href="css/login.css">
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
                <li class="item ativo"><a href="login.php">Login</a></li>
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
                    <li class="item"><a href="login.php" class="ativo">Login</a></li>
                </ul>
            </nav>
        </div>
    </section>

    <main>
        <section class="cadastrar  esquerda">
            <h2 class="titulocadastrese">Não possui uma conta?</h2>
            <p class="textocadastrese">Cadastre-se agora!</p>
            <a href="cadastro.php" class="botaocadastrar">Cadastrar</a>
        </section>
        <section class="registrar  direita">
                <h2 class="titulologin">Fazer Login</h2>
                <form action="" class="login" method="post">
                    
                    <label for="login" class="labelinput <?php if (!empty($erroLogin)) { echo "erro";}; ?>">Login:  <input type="text" placeholder="Login" name="login" class="input"></label>
                    <br><span class="erro"><?php echo $erroLogin ?></span>
                     
                    <br><br>
                    <label for="senha" class="labelinput <?php if (!empty($erroSenha)) { echo "erro";}; ?>">Senha:  <input type="password" placeholder="Senha" name="senha" class="input "></label>
                    <br><span class="erro"><?php echo $erroSenha ?></span>
                    <br>
                    
                    <label for="" class="checkboxlabel"><input type="checkbox" class="checkboxinput">Salvar</label>
                    <br>
                    <div class="centralizar">
                        <input type="submit" class="botaologin" value="Login">
                    </div>
                    <div class="divcadastrese">
                        <div class="centralizar off">
                            <p>Ou</p>
                        </div>
                        <div class="centralizar off cadastrese">
                            <a href="cadastro.php">Cadastre-se</a>
                        </div>
                    </div>
                </form>
        </section>
    </main>

    <div class="final">
        <footer class="rodape">
            <p class="textologo footertexto"><a href="index.php">InsideAnimes</a></p>
            <p class="copyright">&#169;Todos direitos reservados InsideAnimes 2022-2022</p>
            <div>
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