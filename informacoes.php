<?php

    class Animes {

        private $mysql; // criando uma variavel

        public function __construct(mysqli $mysql) { // puxando o banco de dados

            $this->mysql = $mysql;  // conectando o banco de dados
        }
    
        public function encontrarID(string $id): array // função para pegar as infomações do anime conforme o id
        {

            $resultadopesquisa = $this->mysql->query("SELECT * FROM pagina WHERE id = $id"); // pesquisando no banco de dados tudo do anime onde o id é igual o $id

            $resultadopesquisa = $resultadopesquisa->fetch_all(MYSQLI_ASSOC); // trarnsformando o resultado em uma forma onde o php consiga ler como uma array

            return $resultadopesquisa; // retornando para a função tudo do $resultadopesquisa
        }

        public function encontrarNome(string $nome) {

            $buscarnome = $this->mysql->query("SELECT * FROM pagina WHERE titulo LIKE '%$nome%'");

            $resultadosbusca = $buscarnome->fetch_all(MYSQLI_ASSOC);

            return $resultadosbusca;
        }

        public function todosAnimes(): array {

            $pesquisa = $this->mysql->query("SELECT * FROM pagina");

            $resultados = $pesquisa->fetch_all(MYSQLI_ASSOC);
            
            return $resultados;

        }

        public function adicionar(string $titulo, string $sinopse1, int $estrelas, int $data, int $episodios, string $tipo, string $genero, string $studio, string $criador, string $foto): void {

            $adicionar = $this->mysql->prepare("INSERT INTO pagina (titulo, sinopse1, estrelas, lancamento, episodios, tipo, genero, studio, criador, foto) VALUES(?,?,?,?,?,?,?,?,?,?)");

            $adicionar->bind_param('ssiiisssss', $titulo, $sinopse1, $estrelas, $data, $episodios, $tipo, $genero, $studio, $criador, $foto);
            $adicionar->execute();
        }

        public function editar(string $titulo, string $sinopse1, int $estrelas, int $data, int $episodios, string $tipo, string $genero, string $studio, string $criador, string $id): void {


            $editar = $this->mysql->prepare("UPDATE pagina SET titulo = ?, sinopse1 = ?, estrelas = ?, lancamento = ?, episodios = ?, tipo = ?, genero = ?, studio = ?, criador = ? WHERE id = ?");
            $editar->bind_param("ssiiisssss", $titulo, $sinopse1,$estrelas,$data,$episodios,$tipo,$genero,$studio,$criador,$id);
            $editar->execute();

        }

        public function editarFoto(string $foto, string $id) {

            $editarFoto = $this->mysql->prepare("UPDATE pagina SET foto = ? WHERE id = ?");
            $editarFoto->bind_param("ss", $foto, $id);
            $editarFoto->execute();
        }

        public function excluir(string $id):void {

            $excluir = $this->mysql->prepare("DELETE FROM pagina WHERE id = ?");
            $excluir->bind_param("s", $id);
            $excluir->execute();


        }

    }

    

?>