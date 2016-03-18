<?php

include_once __DIR__ . '/img_resize.php';

function fileUpload($field)
{
    if (empty($_FILES)) // Если массив пустой
        return false;
    if (0 != $_FILES[$field]['error']) // Если возникла ошибка
        return false;
    if (!(file_exists(__DIR__ . '/../img/') and file_exists(__DIR__ . '/../img/thumb/'))) // Проверка существования каталогов
        if (!mkdir(__DIR__ . '/../img/thumb/', 0777, true)) // Создание каталогов
            die('Failed to create folders...');
    if (file_exists(__DIR__ . '/../img/' . $_FILES[$field]['name'])) // Проверяет существует ли файл
        return false;
    if (($_FILES[$field]['size'] > (512 * 1024))) // Проверка на размер файла
        return false;
    if ((stristr($_FILES[$field]['type'], '/', true) != 'image')) // Изображение ли
        return false;
    if (is_uploaded_file($_FILES[$field]['tmp_name'])) { // Если файл загружен, то перемещаем
        $result = move_uploaded_file( // return bool
            $_FILES[$field]['tmp_name'],
            __DIR__ . '/../img/' . $_FILES[$field]['name']
        );
        if (!$result) { // Если при перемещении файла возникла ошибка
            return false;
        }
        else {
            return $_FILES[$field]['name']; // Возвращает имя файла
        }
    }
    return false;
}