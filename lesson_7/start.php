<?php

function start()
{
    // Языкова настройка
    setlocale(LC_ALL, 'ru_RU.UTF-8');

    // Подключение к серверу
    require_once './connect.php';

    // Создание БД
    if (!($result = mysqli_select_db($link, $dbName))) { // Проверка на существование БД
        if (!($result = mysqli_query($link, "CREATE DATABASE $dbName CHARACTER SET utf8 COLLATE utf8_general_ci"))) {
            $error = mysqli_error($link);
            echo $error;
        }
    };

    // Подключение к БД
    mysqli_select_db($link, $dbName) or die(mysqli_error($link));

    // Создание таблицы
    if (!($result = mysqli_query($link, "SELECT id FROM gallery LIMIT 1"))) { // Проверка на существование таблицы
        if (!($result = mysqli_query($link,
            "CREATE TABLE gallery
                        (
                          id INT(9) NOT NULL AUTO_INCREMENT,
                          img_src VARCHAR(255) NOT NULL,
                          thumb_src VARCHAR(255) NOT NULL,
                          file_name VARCHAR(255) NOT NULL,
                          views INT(5) NOT NULL,
                          PRIMARY KEY (id)
                        )"))
        ) {
            $error = mysqli_error($link);
            return $error;
        }
    };
}