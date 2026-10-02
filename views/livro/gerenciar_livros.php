<?php
require_once __DIR__ . "/../../templates/_cabecalho.php";
require_once __DIR__ ."/../../models/livro.php";

if (!Autenticacao::)

$livros = Livro::listar();
?>


<main class="container-centraliza">
    <a href="/biblioteca/views/livro/cadastro_livro.php" class="link-btn">Adicionar Livro</a>
    <table>
        <tr>
            <th>Titulo</th>
            <th>Ano</th>
            <th>Categoria</th>
            <th colspan="2">Opções</th>
        </tr>
// criar estrutura de repetição para listar os livros cadastrados na linha 2
    <?php foreach($livros as $l): ?>
        <tr>
            <td><?= $l['titulo']; ?></td>
            <td><?= $l['ano_pub']; ?></td>
            <td><?= $l['nome']; ?></td>
            <td><a href="/biblioteca/views/livro/editar_livros.php?id=<?= $l['id_livro'] ?>">Editar</a></td>
            <td><a href="/biblioteca/controllers/livro_del_controller.php?id=<?= $l['id_livro'] ?>" onclick="return confirm('Tem certeza que deseja deletar este livro?')">Deletar</a></td>
        </tr>
    <?php endforeach; ?>
 // fechar estrutura de repetição       
    </table>
</main>

<?php
require_once __DIR__ . "/../../templates/_rodape.php";
?>

// listar livros e gauarda numa variavel
//