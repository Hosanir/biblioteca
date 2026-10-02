<?php

require_once __DIR__ . "/../models/livro.php";
session_start();    

$titulo = $_POST['titulo'];
$ano = $_POST['ano'];
$autor = $_POST['autor'];
$resumo = $_POST['resumo'];
$cat = $_POST['categoria'];





if(!empty($_FILES['capa']['name'])) {
    $capa = $_FILES['capa'];
    $extensao = strtolower(pathinfo($capa  ['name'], PATHINFO_EXTENSION));
    $nomedafoto = uniqid() . '.' . $extensao;
    $caminho = __DIR__ . "/../imgs/capas/uploads/" . $nomedafoto;
    move_uploaded_file($capa['tmp_name'], $caminho);
} else {
    $nomedafoto  = null;
}

$livro = New Livro();
$livro->inserir($titulo, $ano, $autor, $resumo, $nomedafoto, $cat);

$_SESSION['aviso'] = "Livro cadastrado com sucesso!";
header("Location: /biblioteca/views/livro/gerenciar_livros.php");
exit();
