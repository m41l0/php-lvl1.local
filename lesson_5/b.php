<?php
setcookie('page', 'b');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="<?=$_COOKIE['bgcolor']?>.css">
</head>
<body>
<h1>Страница Б</h1>
<button><a href="lesson_5/a.php">Переход на страницу А</a></button>
<br>
<button><a href="login.php">Вернуться на страницу пользователя</a></button>
</body>
</html>
