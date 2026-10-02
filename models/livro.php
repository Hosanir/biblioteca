<?php
require_once __DIR__ . "/../configs/conexao.php";

class Livro {
    private $id_livro;
    private $titulo;
    private $ano_pub;
    private $autor;
    private $resumo;
    private $capa;
    private $categoria;


    public static function listar() {
        try {
            $conexao = Conexao::conectar();
            $sql = "SELECT livro.*, categoria.nome FROM livro JOIN categoria ON livro.id_categoria = categoria.id_categoria";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'Erro ao listar livros: ' . $e->getMessage();
        }
    }

    public static function buscarPorId($id){
        try {
            $conexao = Conexao::conectar();
            $sql = "SELECT livro.*, categoria.nome FROM livro JOIN categoria ON livro.id_categoria = categoria.id_categoria WHERE id_livro = :id";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo 'Erro ao buscar o livro: ' . $e->getMessage();
        }
    }

    public function inserir($titulo, $ano_pub, $autor, $resumo, $capa, $categoria)
    {
        try {
            $conexao = Conexao::conectar();
            $sql = "INSERT INTO livro (titulo, ano_pub, autor, resumo, capa, id_categoria) VALUES (:titulo, :ano_pub, :autor, :resumo, :capa, :id_categoria)";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':titulo', $titulo);
            $stmt->bindValue(':ano_pub', $ano_pub);
            $stmt->bindValue(':autor', $autor);
            $stmt->bindValue(':resumo', $resumo);
            $stmt->bindValue(':capa', $capa);
            $stmt->bindValue(':id_categoria', $categoria);
            $stmt->execute();
        } catch (PDOException $e) { // executa caso aconteça um erro
            // mostra o erro encontrado
            echo $e->getMessage();
        }
    }

   
    public function deletar($id)
    {

        try {

            $conexao = Conexao::conectar();

            $sql = "DELETE FROM livro WHERE id_livro = :id";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
        } catch (PDOException $e) { // executa caso aconteça um erro
           echo $e->getMessage();
        }
    }

    public function carregar($id)
    {
        try {
            $conexao = Conexao::conectar();
            $sql = "SELECT * FROM livro WHERE id_livro = :id";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $resultado = $stmt->fetch();

            if ($resultado) {
                $this->id_livro = $resultado['id_livro'];
                $this->titulo = $resultado['titulo'];
                $this->ano_pub = $resultado['ano_pub'];
                $this->autor = $resultado['autor'];
                $this->resumo = $resultado['resumo'];
                $this->capa = $resultado['capa'];
                $this->categoria = $resultado['id_categoria'];
            }
        } catch (PDOException $e) { // executa caso aconteça um erro
               echo $e->getMessage();
        }



    }

    
    public function atualizar($titulo, $ano_pub, $autor, $resumo, $capa, $id_categoria, $id)
    {
        // usamos try/catch quando existe possibilidade de erro, principalmente ao usar banco de dados
        // o try é onde tentamos executar o código
        try {
            // chama o método conectar() da classe Conexao
            // cria uma conexão configurada e guarda na variável $conexao
            $conexao = Conexao::conectar();
            $sql = "UPDATE livro SET titulo = :titulo, ano_pub = :ano_pub, autor = :autor, resumo = :resumo, capa = :capa, id_categoria = :id_categoria WHERE id_livro= :id";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':titulo', $titulo);
            $stmt->bindValue(':ano_pub', $ano_pub);
            $stmt->bindValue(':autor', $autor);
            $stmt->bindValue(':resumo', $resumo);
            $stmt->bindValue(':capa', $capa);
            $stmt->bindValue(':id_categoria', $id_categoria);
            $stmt->bindValue(':id', $id);
            
            $stmt->execute();
        } catch (PDOException $e) { 

            echo $e->getMessage();
        }
    }

        public function atualizar_sem_capa($nome, $id)
    {
        
        try {
         
            $conexao = Conexao::conectar();

            $sql = "UPDATE livro SET nome = :nome WHERE id_livro= :id";


            $stmt = $conexao->prepare($sql);

            // coloca o valor de $nome no espaço reservado :nome
            $stmt->bindValue(':nome', $nome);

            // coloca o valor de $id no espaço reservado :id
            $stmt->bindValue(':id', $id);

            // executa o comando no banco
            $stmt->execute();
        } catch (PDOException $e) { // executa caso aconteça um erro
            // mostra o erro encontrado
            echo $e->getMessage();
        }
    }


    public function getId_livro() {
        return $this->id_livro;
    }
    public function getTitulo() {
        return $this->titulo;
    }
    public function getAutor() {
        return $this->autor;
    }
    public function getAno_pub() {
        return $this->ano_pub; 
    }
    public function getResumo() {
        return $this->resumo;
    }
    public function getCapa() {
        return $this->capa;
    }
    public function getCategoria() {
        return $this->categoria;
    }

}