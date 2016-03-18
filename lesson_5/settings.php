<?php
setcookie('bgcolor', @$_POST['bgcolor'], time() + 3600 * 24 * 7);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Выбор стиля</title>
    <link rel="stylesheet" href="<?php (!empty($_POST['bgcolor'])) ? print $_POST['bgcolor'] : print $_COOKIE['bgcolor']?>.css">
</head>
<body>
<form action="settings.php" method="post">
    <input type="radio" name="bgcolor" value="green" id="g" checked><label for="g">Зеленый</label><br>
    <input type="radio" name="bgcolor" value="red" id="r"><label for="r">Красный</label><br>
    <input type="radio" name="bgcolor" value="blue" id="b"><label for="b">Синий</label><br>
    <input type="submit" value="Сохранить">
    <br>
    <br>
    <button><a href="login.php">Вернуться на страницу пользователя</a></button>
</form>
</body>
</html>
