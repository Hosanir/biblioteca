<?php
require_once __DIR__ . "/../../templates/_cabecalho.php";
?>

<main class="main-detalhe">
    <form action="/biblioteca/controllers/categoria_add_controller.php" method="post" enctype="multipart/form-data">

        <div class="form-item">
            <label for="nome">Nome Da Categoria</label>
            <input type="text" name="nome" id="nome">
        </div>

        <button type="submit">Cadastrar</button>
    </form>
</main>

<?php
require_once __DIR__ . "/../../templates/_rodape.php";
?>

// fazer verificacao de campo.. 
// se o campo for "vazio" entao emitir mensagem pedindo para o usuario digitar a categoria..
// se o usuario quiser cadastrar uma categoria ja existente entao deve-se avisa-lo que a categoria já existe..