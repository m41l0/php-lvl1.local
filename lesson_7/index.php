<?php
$img_dir = 'img';
$thmb_dir = 'thumbnails';
$thmb_pref = 'thmb_';

require_once './start.php';
start();
require_once './funcs.php';
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Photo Gallery</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<div class="inner">
    <h1>ГАЛЕРЕЯ</h1>
    <h2>Форма загрузки файла на сервер</h2>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="file" required>
        <input type="submit" value="Загрузить файл">
    </form>
    <p>
        <?php
        if (isset($_FILES['file'])) {
            echo upload_file($_FILES['file'], $img_dir, $thmb_dir, $thmb_pref);
        }
        ?>
    </p>
    <div class="hovergallery">
        <?php pathFromDB(); ?>
    </div>
</div>
</body>
</html>
