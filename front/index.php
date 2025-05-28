<?php
require_once '../back/db_connect.php';

$sql = "SELECT * FROM posts ORDER BY created_at DESC";
$stmt = $pdo->query($sql);
$posts = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Tabipost - 投稿一覧</title>
</head>
<body>
    <h1>旅の思い出シェアボード</h1>

    <p><a href="post.php">＋ 新しく投稿する</a></p>

    <hr>

    <?php if (count($posts) === 0): ?>
        <p>まだ投稿はありません。</p>
    <?php else: ?>
        <?php foreach ($posts as $post): ?>
            <div style="margin-bottom: 20px;">
                <strong><?= htmlspecialchars($post['username']) ?></strong> さんの投稿<br>
                <em><?= htmlspecialchars($post['title']) ?></em><br>
                行き先：<?= htmlspecialchars($post['location_type'] === 'domestic' ? $post['location'] : $post['location_overseas']) ?><br>
                投稿日時：<?= htmlspecialchars($post['created_at']) ?><br>
                <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
            </div>
            <hr>
        <?php endforeach; ?>
    <?php endif; ?>

</body>
</html>
