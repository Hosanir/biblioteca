<?php
require_once __DIR__ . "/../../templates/_cabecalho.php";
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

        <tr>
            <td>Livro 1</td>
            <td>2026</td>
            <td>Categoria 1</td>
            <td>Editar</td>
            <td>Deletar</td>
        </tr>
    </table>
</main>

<?php
require_once __DIR__ . "/../../templates/_rodape.php";
?>