<?php
require_once '../config/config.php';
$poems = supabase_request('/rest/v1/poems?order=created_at.desc');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ang posibilidad ng ikaw</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <h1>Ang posibilidad ng ikaw</h1>
        <?php foreach ($poems as $poem): ?>
            <div class="poem-preview">
                <h2><a href="poem.php?id=<?= $poem['id'] ?>"><?= htmlspecialchars($poem['title']) ?></a></h2>
                <p><?= nl2br(htmlspecialchars(substr($poem['content'], 0, 200))) ?>...</p>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
