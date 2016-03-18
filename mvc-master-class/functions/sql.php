<?php

function Sql_connect()
{
    $link = mysqli_connect('localhost', 'root', '');
    mysqli_query($link, 'SET NAMES utf8');
    mysqli_select_db($link, 'test');
    return $link;
}

function Sql_exec($sql)
{
    $link = Sql_connect();
    mysqli_query($link, $sql);
}

function Sql_query($sql)
{
    $link = Sql_connect();
    $res = mysqli_query($link, $sql);
    $ret = [];
    while (false != $row = mysqli_fetch_assoc($res)) {
        $ret[] = $row;
    }
    return $ret;
}