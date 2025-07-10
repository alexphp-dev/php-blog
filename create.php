<?php include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'] ?? '';
    $content = $_POST['content'] ?? '';

    if ($title && $content) {
        $stmt = $pdo->prepare("INSERT INTO posts (title, content, created_at) VALUES (?, ?, NOW())");
        $stmt->execute([$title, $content]);
        header("Location: index.php");
        exit;
    } else {
        echo "Заполните все поля!";
    }
}
?>

<h1>Добавить пост</h1>
<form method="post">
    <input type="text" name="title" placeholder="Заголовок"><br><br>
    <textarea name="content" rows="8" cols="50" placeholder="Текст поста"></textarea><br><br>
    <button type="submit">Опубликовать</button>
</form>
<a href="index.php">Назад</a>