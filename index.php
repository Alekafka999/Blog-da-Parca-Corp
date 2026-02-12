<?php
$posts = require __DIR__ . '/data/posts.php';

$excerptLength = 160;

function createExcerpt(string $text, int $length): string
{
    if (mb_strlen($text) <= $length) {
        return $text;
    }

    return rtrim(mb_substr($text, 0, $length)) . '...';
}
?>
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog | Parca Corp</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <header class="header">
        <h1>Blog da Parca Corp</h1>
        <p>Noticias, ideias e aprendizados do nosso time.</p>
    </header>

    <main>
        <?php foreach ($posts as $post): ?>
            <article class="post-card">
                <h2>
                    <a href="post.php?slug=<?= urlencode($post['slug']) ?>">
                        <?= htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8') ?>
                    </a>
                </h2>
                <p><?= htmlspecialchars(createExcerpt($post['content'], $excerptLength), ENT_QUOTES, 'UTF-8') ?></p>
            </article>
        <?php endforeach; ?>
    </main>
</div>
</body>
</html>
