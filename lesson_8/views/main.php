<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Photo Gallery</title>
    <link rel="stylesheet" href="/lesson_8/css/style.css">
</head>
<body>
<div class="inner">
    <h1>ГАЛЕРЕЯ</h1>
    <p>
    </p>
    <div class="hovergallery">
        <?php foreach ($items as $item): ?>
        <figure>
            <a href="/lesson_8/add.php?id=<?= $item['id']; ?>" target="_self">
                <img src="<?= $item['thumb_path']; ?>" title="<?= $item['title']; ?>" alt="<?= $item['alt']; ?>" width="300">
            </a>
            <figcaption>
                Просмотров: <?= $item['views']; ?><br>
                Тег 'title': <?= $item['title']; ?><br>
                Тег 'alt': <?= $item['alt']; ?><br>
                Дата: <?= $item['date']; ?><br>
                <a href="/lesson_8/edit.php?id=<?= $item['id']; ?>">Редактировать теги</a>
            </figcaption>
        </figure>
        <?php endforeach; ?>
    </div>

    <?php include __DIR__ . '/form.php'; ?>
</div>
</body>
</html>