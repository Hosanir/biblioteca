<?php
require_once __DIR__ . "/../configs/conexao.php";

class Usuario
{
    private $id_usuario;
    private $nome;
    private $email;
    private $senha;
    private $foto;

    public function inserir($nome, $email, $senha, $foto)
    {
        try {
            // criar conexao
            $conexao = Conexao::conectar();
            // criar o sql
            $sql = "INSERT INTO usuario (nome, email, senha, foto) VALUES (:nome, :email, :senha, :foto);";
            // preparar o sql
            $stmt = $conexao->prepare($sql);
            // substituir os dados depois de preparado
            $stmt->bindValue(':nome', $nome);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':senha', $senha);
            $stmt->bindValue(':foto', $foto);
            // executar
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
