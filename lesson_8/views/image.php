<!doctype html>
<html lang="ru"">
<head>
    <meta charset="UTF-8">
    <title>Image</title>
    <link rel="stylesheet" href="/lesson_8/css/style.css">
</head>
<body>
<div class="inner">
    <img src="<?= $pic['img_path']; ?>" title="<?= $pic['title']; ?>" alt="<?= $pic['alt']; ?>"><br>
    <p><b>Количество просмотров: </b><?= $pic['views'] ?> |
    <b>Тег 'title': </b><?= $pic['title'] ?> |
    <b>Тег 'alt': </b><?= $pic['alt'] ?> |
    <b>Дата: </b><?= $pic['date'] ?></p>

    <a href="/lesson_8">Вернуться в галерею</a><br>
</div>
</body>
</html>