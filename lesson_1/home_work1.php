<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Логинов Максим</title>
    <style>
        .underline {
            text-decoration: underline;
        }
        table {
            text-align: center;
            border: 2px solid darkgray;
            border-collapse: collapse;
        }
        th {
            width: 80px;
            background: lightgray;
            border: 2px solid gray;
        }
        td {
            color: #fff;
            border: 2px solid darkgray;
        }
        .false {
            background: firebrick;
        }
        .true {
            background: darkgreen;
        }
    </style>
</head>
<body>
<?php
echo '<h3>1, 2, 3 задания</h3>';
$a = 4;
$b = 4.4;
$c = true;
$d = 'Hello!';
define('VL', 'Vladivostok');

echo 'Целочисленая переменная <b>$a</b> = ' . $a . '<br>';
echo 'Переменная дробного типа <b>$b</b> = ' . "А я $b в двойных кавычках" . '<br>';
echo 'Переменная булевского типа <b>$c</b> = ' . $c . '<br>';
echo 'Строковая переменная <b>$d</b> =  ' . $d . '<br>';
echo 'Константа <b>VL</b> = ' . VL . '<br>';

echo '<br><br>';

echo '<h3>4 задание</h3>';
echo '«Славная осень! Здоровый, ядреный<br>';
echo 'Воздух усталые силы бодрит;<br>';
echo 'Лед неокрепший на речке студеной<br>';
echo 'Словно как тающий сахар лежит.»<br>';
echo '<span class="underline">Н. А. Некрасов</span>';

echo '<br><br>';

echo '<h3>5 задание</h3>';
echo
'<pre>
«Славная осень! Здоровый, ядреный
Воздух усталые силы бодрит
Лед неокрепший на речке студеной
Словно как тающий сахар лежит.»
<span class="underline">Н. А. Некрасов</span>
</pre>';

echo '<br>';

echo '<h3>6 задание</h3>';
$e = 10;
$f = '20 приветов';
$g = $e + $f;
echo 'e + f = ' . $g . '<br>';
echo 'PHP меняет типы данных переменных, исходя из контекста операции.';

echo '<br><br>';

echo '<h3>7 задание</h3>';
//Дайте ответ на вопрос, как работает оператор xor? В каких случаях он возвращает
//значение true, в каких – false? Для этого напишите скрипт, который выводит значения
//операций со всеми возможными вариантами операндов (4 варианта). Чему равно $a xor
//$a для любых значений $a?

$a = ( ($a = false) xor ($a = false) );
echo 'false xor false = ' . (int) $a . '<br>';
$a = ( ($a = true) xor ($a = false) );
echo 'false xor false = ' . (int) $a . '<br>';
$a = ( ($a = false) xor ($a = true) );
echo 'false xor false = ' . (int) $a . '<br>';
$a = ( ($a = true) xor ($a = true) );
echo 'false xor false = ' . (int) $a . '<br><br>';

echo '<table class="table">
        <tr>
            <th>$a</th>
            <th>$b</th>
            <th>$a xor $b</th>
        </tr>
        <tr>
            <td class="false">false</td>
            <td class="false">false</td>
            <td class="false">false</td>
        </tr>
        <tr>
            <td class="true">true</td>
            <td class="false">false</td>
            <td class="true">true</td>
        </tr>
            <td class="false">false</td>
            <td class="true">true</td>
            <td class="true">true</td>
        </tr>
            <td class="true">true</td>
            <td class="true">true</td>
            <td class="false">false</td>
        </tr>
      </table>';

echo '<br>';

echo '<h3>8 задание</h3>';
//Дан фрагмент кода:
//<?php
//$x = 10;
//$y = 15;
//
//Необходимо дописать несколько операций так, чтобы в итоге значения переменных
//поменялись местами. При этом, использовать другие переменные запрещается.

$x = 10;
$y = 15;

$x = $x + $y;
$y = $x - $y;
$x = $x - $y;

echo "x = $x<br>";
echo "y = $y<br>";

?>
</body>
</html>
