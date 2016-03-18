<?php
$img_dir = 'img';
$thmb_dir = 'thumbnails';
$thmb_pref = 'thmb_';
require_once 'functions.php';
if (isset($_FILES['file'])) {
    echo upload_file($_FILES['file'], $img_dir, $thmb_dir, $thmb_pref);
}
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Photo Gallery</title>
    <link rel="stylesheet" href="style.css">
</head>
<body bgcolor="">
<h2>Форма загрузки файла на сервер</h2>
<form action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
    <input type="file" name="file" required>
    <input type="submit" value="Загрузить файл">
</form>
<br>
<br>
<div class="hovergallery">
<?php fileNameToImg($img_dir, $thmb_dir, $thmb_pref); ?>
</div>
</body>
</html>
