<?php 
// importa o arquivo que contém a classe Categoria 
require_once __DIR__ . "/../models/livro.php"; 


session_start(); 

$nome = $_POST['nome']; 


$id = $_POST['id']; 
$titulo = $_POST['titulo']; 
$ano = $_POST['ano']; 
$autor = $_POST['autor']; 
$resumo = $_POST['resumo']; 
$capa = $_POST['capa']; 
$categoria = $_POST['categoria']; 






$livro = new livro(); 

if(!empty($_FILES['capa']['name'])) {
    $capa = $_FILES['capa'];
    $extensao = strtolower(pathinfo($capa  ['name'], PATHINFO_EXTENSION));
    $nomedafoto = uniqid() . '.' . $extensao;
    $caminho = __DIR__ . "/../imgs/capas/uploads/" . $nomedafoto;
    move_uploaded_file($capa['tmp_name'], $caminho);
} else {
    $nomedafoto  = null;
}

$livro->atualizar($titulo, $ano, $autor, $resumo, $nomedafoto, $cat, $id);
$livro ->atualizar_sem_capa($titulo, $ano, $autor, $resumo, $cat, $id);


$_SESSION['aviso'] = "Livro atualizado com sucesso"; 


header('Location: /biblioteca/views/livro/gerenciar_livros.php'); 

exit(); 
