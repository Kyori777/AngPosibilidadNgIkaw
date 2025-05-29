<?php
require_once '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'title' => $_POST['title'],
        'content' => $_POST['content'],
        'created_at' => date('c')
    ];
    supabase_request('/rest/v1/poems', 'POST', $data);
    header('Location: ../public/index.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Poem | Admin</title>
</head>
<body>
    <h1>Add New Poem</h1>
    <form method="post">
        <input name="title" placeholder="Title" required><br><br>
        <textarea name="content" placeholder="Your poem here..." rows="10" required></textarea><br><br>
        <button type="submit">Save</button>
    </form>
</body>
</html>
