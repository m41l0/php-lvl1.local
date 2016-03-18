<?php

// Объявление глобальной переменной
global $link;

// Настройка подключения к БД
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbName = 'lmi_db';

// Подключение к серверу
$link = mysqli_connect($hostname, $username, $password) or die(mysqli_error($link));
