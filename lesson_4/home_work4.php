<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Логинов Максим</title>
    <style>
        pre {
            color: gray;
            font: 400 18px "Times New Roman", serif;
        }
        h4 {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
<h2>Задание 2</h2>
<pre>
Превратите  получившийся  сумматор  в  калькулятор  с  четырьмя  операциями:
сложение,  вычитание,  умножение,  деление.  Не  забудьте  обработать  деление  на
ноль!
Выбор операции можно осуществлять с помощью тега &lt;select&gt;
</pre>
<p>
<h4>Ответ:</h4>
<?php
if ( isset($_POST['num1']) && isset($_POST['num2']) && isset($_POST['operator']) ) {
    if ($_POST['operator'] == '+') {
        $result = $_POST['num1'] + $_POST['num2'];
    } elseif ($_POST['operator'] == '-') {
        $result = $_POST['num1'] - $_POST['num2'];
    } elseif ($_POST['operator'] == '*') {
        $result = $_POST['num1'] * $_POST['num2'];
    } elseif ($_POST['operator'] == '/' && $_POST['num2'] != 0) {
        $result = $_POST['num1'] / $_POST['num2'];
    } else $result = 'На ноль делить нельзя!';
} else $result = '';
?>
<form action="home_work4.php" method="post">
    <input type="number" name="num1" value="<?=$_POST['num1'] ?>" required>
    <select name="operator">
        <option value="+" selected>+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select>
    <input type="number" name="num2" value="<?=$_POST['num2'] ?>" required>
    <input type="submit" value="="><?=' '.$result?>
</form>
</p>
<hr><!--======================================================================================-->
<h2>Задание 3</h2>
<pre>
Создайте  калькулятор,  который  будет  определять  тип  выбранной  пользователем
операции, ориентируясь на нажатую кнопку.
Данные,  введённые  пользователем  в  поля,  должны  сохраняться  и  выводиться
вместе с результатом вычисления.
</pre>
<p>
<h4>Ответ:</h4>
<?php
if ( isset($_POST['num3']) && isset($_POST['num4']) && isset($_POST['operator']) ) {
    $result = $_POST['num3'].$_POST['operator'].$_POST['num4'];
    if ($_POST['operator'] == '/' && $_POST['num4'] == 0) {
        $result = 'На ноль делить нельзя!';
    } else {
        eval("\$result = $result;");
    }
} else {
    $result = '';
    $_POST['operator'] = '+';
}
?>
<form action="home_work4.php" method="post">
    <input type="number" name="num3" value="<?=$_POST['num3'] ?>">
    <?=$_POST['operator']?>
    <input type="number" name="num4" value="<?=$_POST['num4'] ?>">
    = <?=' '.$result?><br>
    <input type="submit" name="operator" value="+">
    <input type="submit" name="operator" value="-">
    <input type="submit" name="operator" value="*">
    <input type="submit" name="operator" value="/">
</form>
</p>
</body>
</html>