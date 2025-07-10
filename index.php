<?php include 'db.php'; ?>
<h1>Мой блог</h1>
<a href="create.php">Добавить пост</a>
<hr>

<?php
$posts = $pdo->query("SELECT * FROM posts ORDER BY created_at DESC")->fetchAll();

foreach ($posts as $post) {
    echo "<h2><a href='post.php?id={$post['id']}'>" . htmlspecialchars($post['title']) . "</a></h2>";
    echo "<p>" . nl2br(htmlspecialchars(substr($post['content'], 0, 100))) . "...</p><hr>";
}
?>