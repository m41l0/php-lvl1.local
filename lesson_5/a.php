<?php
setcookie('page', 'a');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="<?=$_COOKIE['bgcolor']?>.css">
</head>
<body>
<h1>Страница А</h1>
<button><a href="../b.php">Переход на страницу Б</a></button>
<br>
<button><a href="../login.php">Вернуться на страницу пользователя</a></button>
</body>
</html>
