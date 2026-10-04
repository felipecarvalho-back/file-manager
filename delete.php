<?php


$path = 'arquivos/';

if (!is_dir($path)) {
    mkdir($path, 0755, true);
}

$arquivo = array_filter(array_diff(scandir($path), ['.', '..']), fn($n) => $n == $_GET['arq']);
$arquivo = current($arquivo);

unlink("$path/$arquivo");

header("Location: index.php");