<?php

$path = 'arquivos/';

if (!is_dir($path)) {
    mkdir($path, 0755, true);
}

$arquivos = array_diff(scandir($path), ['.', '..']);

?>

<h2>Lista de arquivos na pasta arquivos</h2>

<?php foreach ($arquivos as $arquivo) { ?>
    <h3><?= $arquivo ?></h3>
<?php } ?>