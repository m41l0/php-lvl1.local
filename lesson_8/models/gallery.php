<?php

require_once __DIR__ . '/../functions/sql.php';

function imagesGetAll()
{
    $sql = "SELECT * FROM `gallery` ORDER BY `views` DESC";
    return sqlQuery($sql);
}

function imagesInsert($data)
{
//    var_dump($data);die;
    $sql = "
        INSERT INTO `gallery`
        (`id`, `img_path`, `thumb_path`, `file_name`, `title`, `alt`)
        VALUES
        ('', '" . $data['img_path'] . "', '" . $data['thumb_path'] . "', '" . $data['file_name'] . "',
         '" . $data['title'] . "', '" . $data['alt'] . "')
        ";
    sqlExec($sql);
}

function rowCount($item)
{
    $link = sqlConnect();
    $sql = "SELECT `id` FROM `gallery` WHERE `file_name` = '$item'";
    return mysqli_num_rows(mysqli_query($link, $sql));
}

// Счетчик просмотров
function updateCounter($id)
{
    $sql = "UPDATE `gallery` SET `views`=`views`+1 WHERE `id`='$id'";
    sqlExec($sql);
}

// Выбор картинки по id
function viewPic($id)
{
    $sql = "SELECT * FROM `gallery` WHERE `id` = '$id'";
    return sqlQueryOneArray($sql);
}

// Редактирование тегов
function tagEdit($title, $alt, $id)
{
    $sql = "UPDATE `gallery` SET `title`='$title', `alt`='$alt' WHERE `id`='$id'";
    sqlExec($sql);
}