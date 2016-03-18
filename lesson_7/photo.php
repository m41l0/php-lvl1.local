<?php

// Подключение к БД
require_once './connect.php';
mysqli_select_db($link, $dbName) or die(mysqli_error($link));

// Счетчик просмотров
mysqli_query($link, "UPDATE `gallery` SET `views`=`views`+1 WHERE `id`='{$_GET['id']}'");

$result = mysqli_query($link, "SELECT `img_src`, `views` FROM `gallery` WHERE `id` = '{$_GET['id']}'");
$row = mysqli_fetch_assoc($result);
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Картинка</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<div class="inner">
    <img src="<?= $row['img_src'] ?>" alt=""><br>
    <p><b>Количество просмотров: </b><?= $row['views']; ?></p>
    <a href="./index.php">Вернуться в галерею</a>
</div>
</body>
</html>





