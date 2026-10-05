<?php

$path = 'arquivos/';

if (!is_dir($path)) {
    mkdir($path, 0755, true);
}

$arquivos = array_diff(scandir($path), ['.', '..']);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Arquivos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header class="app-header">
            <h1 class="app-title">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path>
                </svg>
                Gerenciador de Arquivos
            </h1>
            <p class="app-subtitle">Crie, edite e gerencie arquivos de texto de forma simples</p>
        </header>

        <section class="card">
            <h2 class="card-title">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Novo Arquivo
            </h2>
            <form action="create.php" method="post">
                <div class="form-group">
                    <label for="nome" class="form-label">Nome do arquivo:</label>
                    <div class="input-row">
                        <input type="text" name="nome" id="nome" class="form-input" placeholder="Ex: meu-arquivo" required autocomplete="off">
                        <button type="submit" class="btn btn-primary">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                            Cadastrar
                        </button>
                    </div>
                </div>
            </form>
        </section>

        <section class="card">
            <h2 class="card-title">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                    <polyline points="14 2 14 8 20 8"></polyline>
                    <line x1="16" y1="13" x2="8" y2="13"></line>
                    <line x1="16" y1="17" x2="8" y2="17"></line>
                    <polyline points="10 9 9 9 8 9"></polyline>
                </svg>
                Lista de arquivos na pasta arquivos
            </h2>

            <?php if (empty($arquivos)) { ?>
                <div class="empty-state">
                    <div class="empty-state-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                            <polyline points="13 2 13 9 20 9"></polyline>
                        </svg>
                    </div>
                    <p class="empty-state-text">Nenhum arquivo encontrado na pasta.</p>
                </div>
            <?php } else { ?>
                <div class="file-list">
                    <?php foreach ($arquivos as $arquivo) { ?>
                        <div class="file-item">
                            <div class="file-info">
                                <span class="file-icon">
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                        <polyline points="14 2 14 8 20 8"></polyline>
                                    </svg>
                                </span>
                                <span class="file-name"><?= htmlspecialchars($arquivo) ?></span>
                            </div>
                            <div class="btn-group">
                                <a href="update.php?arq=<?= urlencode($arquivo) ?>" class="btn btn-outline btn-sm">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                    </svg>
                                    Escrever
                                </a>
                                <a href="delete.php?arq=<?= urlencode($arquivo) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este arquivo?');">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                    </svg>
                                    Deletar
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </section>
    </div>
</body>
</html>