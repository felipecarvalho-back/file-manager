<?php

$path = 'arquivos/';

if (!is_dir($path)) {
    mkdir($path, 0755, true);
}

$arquivos = array_diff(scandir($path), ['.', '..']);

?>

<h2>Lista de arquivos na pasta arquivos</h2>
<form action="create.php" method="post">
    <div>
        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome">
    </div>
    <br>
    <button type="submit">Cadastrar</button>
</form>

<?php foreach ($arquivos as $arquivo) { ?>
    <h3><?= $arquivo ?></h3>
    <a href="delete.php?arq=<?= $arquivo ?>">Deletar</a>
    <a href="update.php?arq=<?= $arquivo ?>">Escrever</a>
<?php } ?>