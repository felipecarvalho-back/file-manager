<?php

$path = 'arquivos/';

if (!is_dir($path)) {
    mkdir($path, 0755, true);
}

$nomeArquivo = str_replace(' ', '-', $_POST['nome']);
$nomeArquivo .= '.txt';

file_put_contents("$path$nomeArquivo", '');

header("Location: index.php");
