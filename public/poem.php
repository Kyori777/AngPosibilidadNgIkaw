<?php
require_once '../config/config.php';
$id = $_GET['id'] ?? '';
$poem = supabase_request("/rest/v1/poems?id=eq.$id")[0] ?? null;
?>
<!DOCTYPE html>
<html>
<head>
    <title><?= htmlspecialchars($poem['title'] ?? 'Poem') ?> | Ang posibilidad ng ikaw</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <h1><?= htmlspecialchars($poem['title'] ?? 'Not found') ?></h1>
        <article class="poem"><?= nl2br(htmlspecialchars($poem['content'] ?? 'No content')) ?></article>
        <p class="timestamp">Posted on <?= htmlspecialchars($poem['created_at'] ?? '') ?></p>
    </div>
</body>
</html>
