<?php
if (empty($_COOKIE['login'])) {
    $reg = "<h1>Форма регистрации</h1>
            <form action='login.php' method='post'>
            Введите имя пользователя: <input type='text' name='userName' required><br><br>
            <input type='submit' value='Вход'><br><br>
            </form>";
    $title = "Страница авторизации";
    setcookie('login', @$_POST['userName'], time() + 3600 * 24);
} else {
    $reg = "<h1>Привет, " . $_COOKIE['login'] . "</h1>
            <button><a href='settings.php'>Выбрать стиль</a></button><br><br>
            Перейдите <button><a href='a.php'>на страницу А</a></button> или
            <button><a href='b.php'>на страницу Б</a></button>";
    $title = "Страница пользователя";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?=$title ?></title>
    <link rel="stylesheet" href="<?=$_COOKIE['bgcolor']?>.css">
</head>
<body>
<?=$reg ?>
</body>
</html>
