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
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Arquivo - <?= htmlspecialchars($arquivo) ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header class="app-header">
            <h1 class="app-title">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                </svg>
                Editor de Arquivo
            </h1>
            <p class="app-subtitle">Edite o conteúdo do arquivo de texto selecionado</p>
        </header>

        <section class="card">
            <div class="editor-header">
                <div>
                    <h2 class="editor-title">Editando:</h2>
                    <span class="editor-filename"><?= htmlspecialchars($arquivo) ?></span>
                </div>
                <a href="index.php" class="btn btn-outline btn-sm">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="19" y1="12" x2="5" y2="12"></line>
                        <polyline points="12 19 5 12 12 5"></polyline>
                    </svg>
                    Voltar para lista
                </a>
            </div>

            <?php if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') { ?>
                <div class="alert alert-success">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                    </svg>
                    Alterações salvas com sucesso!
                </div>
            <?php } ?>

            <form action="update.php?arq=<?= urlencode($arquivo) ?>" method="post">
                <div class="form-group">
                    <label for="conteudo" class="form-label">Conteúdo do arquivo:</label>
                    <textarea name="conteudo" id="conteudo" class="form-textarea" placeholder="Digite o conteúdo do arquivo aqui..."><?= htmlspecialchars($conteudo) ?></textarea>
                </div>
                <div class="editor-actions">
                    <a href="index.php" class="btn btn-outline">Cancelar</a>
                    <button type="submit" class="btn btn-primary">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                            <polyline points="17 21 17 13 7 13 7 21"></polyline>
                            <polyline points="7 3 7 8 15 8"></polyline>
                        </svg>
                        Salvar
                    </button>
                </div>
            </form>
        </section>
    </div>
</body>
</html>