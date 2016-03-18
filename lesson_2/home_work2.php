<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Логинов Максим</title>
    <style>
        pre {
            font: 400 18px "Times New Roman", serif;
        }
        h4 {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
<h2>Задание 1</h2>
<pre>
Объявите две целочисленные переменные $a и $b и задайте им произвольные
начальные значения. Затем напишите скрипт, который работает по следующему
принципу:
a.  если $a и $b положительные,  выведите их разность;
b.  если $а и $b отрицательные, выведите их произведение;
c.  если $а и $b разных знаков,  выведите их сумму.
Ноль можно считать положительным числом..
</pre>
<p>
<h4>Ответ:</h4>
<?php
function twoVar ($a, $b) {
    if ($a >= 0 && $b >= 0) { // положительные
        return 'a и b положительные, выводим их разность: ' . ($a - $b);
    } elseif ($a < 0 && $b < 0) { // отрицательные
        return 'a и b отрицательные, выводим их произведение: ' . ($a * $b);
    } elseif ( ($a < 0 && $b >= 0) || ($a >= 0 && $b < 0) ) { // разных знаков
        return 'a и b разных знаков, выводим их сумму: ' . ($a + $b);
    }
}
$a = 14;
$b = 56;
echo 'a = ' . $a . ' и ' . 'b = ' . $b . '<br>';
echo twoVar($a, $b);
?>
</p>

<h2>Задание 2</h2>
<pre>
Присвойте переменной $а значение в промежутке [0..15]. С помощью оператора
switch организуйте вывод чисел от $a до 15;
</pre>
<p>
<h4>Ответ:</h4>
<?php
$a = 7;
switch ($a) {
    case 0:
        echo 0 . '<br>';
    case 1:
        echo 1 . '<br>';
    case 2:
        echo 2 . '<br>';
    case 3:
        echo 3 . '<br>';
    case 4:
        echo 4 . '<br>';
    case 5:
        echo 5 . '<br>';
    case 6:
        echo 6 . '<br>';
    case 7:
        echo 7 . '<br>';
    case 8:
        echo 8 . '<br>';
    case 9:
        echo 9 . '<br>';
    case 10:
        echo 10 . '<br>';
    case 11:
        echo 11 . '<br>';
    case 12:
        echo 12 . '<br>';
    case 13:
        echo 13 . '<br>';
    case 14:
        echo 14 . '<br>';
    case 15:
        echo 15 . '<br>';
        break;
    default: echo 'Число должно быть в промежутке [0..15]';
}
?>
</p>

<h2>Задание 3</h2>
<pre>
Реализуйте основные 4 арифметические операции (+, -, *, %)  в виде функций с
двумя параметрами. Обязательно используйте оператор return.
</pre>
<p>
<h4>Ответ:</h4>
<?php
function addition ($a, $b) {
    return $a + $b;
}
function subtraction ($a, $b) {
    return $a - $b;
}
function multiplication ($a, $b) {
    return $a * $b;
}
function modulus ($a, $b) {
    return $a % $b;
}
$a = 7;
$b = 3;
echo 'a + b = ' . addition($a, $b) . '<br>';
echo 'a - b = ' . subtraction($a, $b) . '<br>';
echo 'a * b = ' . multiplication($a, $b) . '<br>';
echo 'a % b = ' . modulus($a, $b) . '<br>';
?>
</p>

<h2>Задание 4</h2>
<pre>
Реализуйте функцию с тремя параметрами: function  mathOperation($arg1, $arg2,
$operation), где $arg1, $arg2 – значения аргументов, $operation – строка с названием
операции. В зависимости от переданного значения операции выполните одну из
арифметических операций (используйте функции из пункта 4) и верните
полученное значение (используйте switch).
</pre>
<p>
<h4>Ответ:</h4>
<?php
function mathOperation($arg1, $arg2, $operation) {
    switch ($operation) {
        case 'addition':
            return addition($arg1, $arg2);
        case 'subtraction':
            return subtraction($arg1, $arg2);
        case 'multiplication':
            return multiplication($arg1, $arg2);
        case 'modulus':
            return modulus($arg1, $arg2);
    }
}
$a = 9;
$b = 3;
$c = 'multiplication';

echo "$a $c $b = " . mathOperation($a, $b, $c);
?>
</p>

<h2>Задание 5</h2>
<pre>
С помощью рекурсии организуйте функцию возведения числа в степень. Формат:
function power($val, $pow), где $val – заданное число, $pow – степень.
</pre>
<p>
<h4>Ответ:</h4>
<?php
function power($val, $pow) {
  if ($pow != 1) {
    return $val * power($val, $pow - 1);
  } else {
    return $val;
  }
}
$a = 4;
$b = 7;
echo "$a в степени $b = " . power($a, $b);
?>
</p>

<h2>Задание 6</h2>
<pre>
Напишите функцию, которая вычисляет текущее время и возвращает его в формате
с правильными склонениями, например:
22 часа 15 минут
21 час 43 минуты
итд.
Подсказка: часы и минуты можно узнать с помощью встроенной функции PHP –
date.
</pre>
<p>
<h4>Ответ:</h4>
<?php
function currentTime () {
    $h = date('H');
    $m = date('i');

    if ( (01 == $h) || (21 == $h) ) {
        $hour = $h . ' час ';
    } elseif ( ('02' <= $h && '04' >= $h) || ('22' <= $h && '24' >= $h) ) {
        $hour =  $h . ' часа ';
    } else {
        $hour =  $h . ' часов ';
    }

    if ( ('01' == $m) || ('21' == $m) || ('31' == $m) || ('41' == $m) || ('51' == $m) ) {
        $min = $m . ' минута';
    } elseif ( ('02' <= $m && '04' >= $m) || ('22' <= $m && '24' >= $m) || ('32' <= $m && '34' >= $m) || ('42' <= $m && '44' >= $m) || ('52' <= $m && '54' >= $m)) {
        $min =  $m . ' минуты';
    } else {
        $min =  $m . ' минут';
    }

    return $hour . $min;
}
echo currentTime();
?>
</p>
</body>
</html>