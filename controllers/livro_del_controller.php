<?php

// importa o arquivo que contém a classe Categoria
require_once __DIR__ . "/../models/livro.php";

// inicia a sessão para permitir o uso de variáveis de sessão
session_start();

// pega o ID da categoria enviado pela URL através do método GET
$id = $_GET['id'];

// cria um novo objeto da classe Categoria
$livro = new livro();

// chama o método deletar() da classe Categoria
// envia o ID da categoria para identificar qual registro será excluído
$livro->deletar($id);

// armazena uma mensagem de aviso na sessão
// essa mensagem pode ser exibida na próxima página
$_SESSION['aviso'] = "Livro deletado com sucesso";

// redireciona o usuário para a página de gerenciamento de livros
header('Location: /biblioteca/views/livro/gerenciar_livros.php');

// encerra a execução do código depois do redirecionamento
exit();
