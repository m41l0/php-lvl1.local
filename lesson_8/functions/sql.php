<?php

// Подключение к БД
function sqlConnect()
{
    include (__DIR__ . '/connect.php');

    $link = mysqli_connect($hostname, $username, $password) or die(mysqli_error($link));
    mysqli_query($link, 'SET NAMES utf8');
    mysqli_select_db($link, $dbName) or die(mysqli_error($link));
    return $link;
}

// Просто выполнение запроса без возврата
function sqlExec($sql)
{
    $link = sqlConnect();
    mysqli_query($link, $sql);
}

// Выполнение запросов к БД
function sqlQuery($sql)
{
    $link = sqlConnect();
    $result = mysqli_query($link, $sql);

    $ret = [];
    while (false != $row = mysqli_fetch_assoc($result)) {
        $ret[] = $row;
    }

    return $ret; // на выходе массив записей из БД
}

function sqlQueryOneArray($sql)
{
    $link = sqlConnect();
    $result = mysqli_query($link, $sql);

    while (false != $row = mysqli_fetch_assoc($result)) {
        $ret = $row;
    }

    return $ret; // на выходе массив записей из БД
}