<?php

$path = 'arquivos/';
$arquivo = $_GET['arq'];
if (!is_dir($path)) {
    mkdir($path, 0755, true);
}

$conteudo = file_get_contents($path . $arquivo);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conteudo = $_POST['conteudo'];
    file_put_contents("$path$arquivo", $conteudo);
}
?>
<form action="update.php?arq=<?= urlencode($arquivo) ?>" method="post">
    <div>
        <label for="conteudo">Conteudo: </label>
        <textarea name="conteudo" id="conteudo" style="width: 40%; height: 200px; resize: none;"><?= htmlspecialchars($conteudo) ?></textarea>
    </div>
    <button type="submit">Enviar</button>
</form>