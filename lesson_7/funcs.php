<?php

function upload_file($file, $src, $thmb, $thmb_pref)
{
    global $link;
    $tmp_name = $file['tmp_name'];
    $src_name = './' . $src . '/' . $file['name'];
    $thmb_name = './' . $thmb . '/' . $thmb_pref . $file['name'];

    // Создание директорий для хранения файлов
    createDir($src, $thmb);

    if ($file['name'] == '') {
        return 'Файл не выбран!';
    }

    if (($file['size'] < (512 * 1024))) { // Проверка на размер файла
        if ((stristr($file['type'], '/', true) == 'image')) { // Провеяет является ли файл изображением
            if (copy($tmp_name, $src_name) and img_resize($src_name, $thmb_name, 300, 300, 0xffffff)) {
                if (0 == mysqli_num_rows(mysqli_query($link, "SELECT `img_src` FROM `gallery` WHERE `img_src` = '$src_name'"))) { // Проверка существования записи в таблице
                    $sql = "INSERT INTO `gallery` (`id`, `img_src`, `thumb_src`, `file_name`)
                            VALUES ('', '$src_name', '$thmb_name', '{$file['name']}')";
                    $sqlresult = mysqli_query($link, $sql);

                    if (!$sqlresult) {
                        die(mysqli_error($link));
                    }
                } else return 'Файл с таким именем уже существует!';
                return 'Файл успешно загружен!';
            } else return 'Ошибка загрузки файла!';
        } else return 'Недопустимый тип файла!';
    } else return 'Недопустимый размер файла!';
}

function createDir($dir, $thmb_dir)
{
    if (!(file_exists($dir) and file_exists($thmb_dir))) {
        mkdir($dir);
        mkdir($thmb_dir);
    }
    return;
}

function pathFromDB()
{
    global $link;

    $result = mysqli_query($link, "SELECT `id`, `thumb_src`, `file_name`, `views` FROM `gallery` ORDER BY `views` DESC");
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<figure>
              <a href=\"./photo.php?id={$row['id']}\" target=\"_self\">
              <img src=\"{$row['thumb_src']}\" alt=\"{$row['file_name']}\" width=\"300\">
              </a>
              <figcaption>Просмотров: {$row['views']}</figcaption>
              </figure>";
    }
}

/***********************************************************************************
 * Функция img_resize(): генерация thumbnails
 * Параметры:
 * $src             - имя исходного файла
 * $dest            - имя генерируемого файла
 * $width, $height  - ширина и высота генерируемого изображения, в пикселях
 * Необязательные параметры:
 * $rgb             - цвет фона, по умолчанию - белый
 * $quality         - качество генерируемого JPEG, по умолчанию - максимальное (100)
 ***********************************************************************************/
function img_resize($src, $dest, $width, $height, $rgb = 0xd7fad7, $quality = 100)
{
    if (!file_exists($src)) return false;

    $size = getimagesize($src);

    if ($size === false) return false;

    // Определяем исходный формат по MIME-информации, предоставленной
    // функцией getimagesize, и выбираем соответствующую формату
    // imagecreatefrom-функцию.
    $format = strtolower(substr($size['mime'], strpos($size['mime'], '/') + 1));
    $icfunc = "imagecreatefrom" . $format;
    if (!function_exists($icfunc)) return false;

    $x_ratio = $width / $size[0];
    $y_ratio = $height / $size[1];

    $ratio = min($x_ratio, $y_ratio);
    $use_x_ratio = ($x_ratio == $ratio);

    $new_width = $use_x_ratio ? $width : floor($size[0] * $ratio);
    $new_height = !$use_x_ratio ? $height : floor($size[1] * $ratio);
    $new_left = $use_x_ratio ? 0 : floor(($width - $new_width) / 2);
    $new_top = !$use_x_ratio ? 0 : floor(($height - $new_height) / 2);

    $isrc = $icfunc($src);
    $idest = imagecreatetruecolor($width, $height);

    imagefill($idest, 0, 0, $rgb);
    imagecopyresampled($idest, $isrc, $new_left, $new_top, 0, 0,
        $new_width, $new_height, $size[0], $size[1]);

    imagejpeg($idest, $dest, $quality);

    imagedestroy($isrc);
    imagedestroy($idest);

    return true;
}