<?php
$posts = require __DIR__ . '/data/posts.php';
$slug = filter_input(INPUT_GET, 'slug', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? '';

$selectedPost = null;

foreach ($posts as $post) {
    if ($post['slug'] === $slug) {
        $selectedPost = $post;
        break;
    }
}

if ($selectedPost === null) {
    http_response_code(404);
}
?>
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $selectedPost ? htmlspecialchars($selectedPost['title'], ENT_QUOTES, 'UTF-8') . ' | Blog Parca Corp' : 'Post nao encontrado | Blog Parca Corp' ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <header class="header">
        <a class="back-link" href="index.php">Voltar para o blog</a>
    </header>

    <main>
        <?php if ($selectedPost): ?>
            <article class="post-full">
                <h1><?= htmlspecialchars($selectedPost['title'], ENT_QUOTES, 'UTF-8') ?></h1>
                <p><?= nl2br(htmlspecialchars($selectedPost['content'], ENT_QUOTES, 'UTF-8')) ?></p>
            </article>
        <?php else: ?>
            <article class="post-full">
                <h1>Post nao encontrado</h1>
                <p>O conteudo que voce tentou acessar nao existe ou foi removido.</p>
            </article>
        <?php endif; ?>
    </main>
</div>
</body>
</html>
