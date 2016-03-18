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
Изучите понятие «рекурсия», составьте рекурсивную
функцию вычисления чисел Фибоначчи, проверьте ее
работу.
</pre>
<p>
    <h4>Ответ:</h4>
    <?php
    // Fn = F(n - 1) + F(n - 2)

    function fibonacci ($n) {
        if ($n <= 1) {
            return $n;
        } else {
            return fibonacci($n - 1) + fibonacci($n - 2);
        }
    }
    $n = 4;
    echo $n . '-oe число Фибоначчи = ' . fibonacci($n);
    ?>
</p>

<h2>Задание 2</h2>
<pre>Напишите функцию, которая вычисляет доход по
вкладу. В качестве аргумента принимается сумма
вклада, срок в месяцах, годовой процент.
Возвращается сумма вклада по окончанию срока.
</pre>
<p>
    <h4>Ответ:</h4>
    <?php
    // S = P + (P*I*t) / K * 100
    // Значение символов:
    // S — сумма денежных средств, причитающихся к возврату вкладчику
    // по окончании срока депозита. Она состоит из первоначальной суммы
    // размещенных денежных средств, плюс начисленные проценты.
    // I – годовая процентная ставка
    // t – количество дней начисления процентов по привлеченному вкладу
    // K – количество дней в календарном году (365 или 366)
    // P – первоначальная сумма привлеченных в депозит денежных средств

    function deposit ($sum, $period, $percent) {
        $days_in_month = 30;
        $days_in_year = 365;
        return $sum + ( $sum * $percent * $period * $days_in_month ) / ( $days_in_year * 100 );
    }
    $sum = 5000;
    $period = 5;
    $percent = 9;
    echo 'Сумма вклада: ' . $sum . ' руб' . '<br>';
    echo 'Срок вклада: ' . $period . ' мес' . '<br>';
    echo 'Годовой процент: ' . $percent . ' %' . '<br>';
    echo 'Сумма вклада по окончанию срока: ' . (int)deposit($sum, $period, $percent) . ' руб';
    ?>
</p>

<h2>Задание 3</h2>
<pre>Напишите функцию, которая принимает на вход два
аргумента – число (1..31) и номер месяца (1..12).
Возвращает правильно сформированную дату на
русском языке. Например: «1 января» или «9 мая».</pre>
<p>
    <h4>Ответ:</h4>
    <?php

    function dayMonth($d, $m)
    {
        if (($d > 0 && $d <= 31) && ($m > 0 && $m <= 12)) {
            if (($d <= 29) && ($m == 2)) {
                return $d . ' февраля';
            } elseif ($d <= 30) {
                if ($m == 4 || $m == 6 || $m == 9 || $m == 11) {
                    switch ($m) {
                        case 4:
                            return $d . ' апреля';
                            break;
                        case 6:
                            return $d . ' июня';
                            break;
                        case 9:
                            return $d . ' сентября';
                            break;
                        case 11:
                            return $d . ' ноября';
                            break;
                    }
                }
            }
            switch ($m) {
                case 1:
                    return $d . ' января';
                    break;
                case 3:
                    return $d . ' марта';
                    break;
                case 5:
                    return $d . ' мая';
                    break;
                case 7:
                    return $d . ' июля';
                    break;
                case 8:
                    return $d . ' августа';
                    break;
                case 10:
                    return $d . ' октября';
                    break;
                case 12:
                    return $d . ' декабря';
                    break;
                default:
                    return OUTOFDATE;
            }
        } else return OUTOFDATE;
    }
    $d = 14;
    $m = 12;
    define('OUTOFDATE', 'Такой даты не существует');
    echo dayMonth($d, $m);

    //  Проверка
    //  for ($i = 1; $i <= 12; $i++) {
    //    for ($j = 1; $j <= 31; $j++) {
    //          echo $j . '/' . $i . ' - ' . dayMonth($j, $i) . '<br>';
    //    }
    //  }
    ?>
</p>
</body>
</html>