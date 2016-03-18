<?php

function upload_file($file, $src, $thmb, $thmb_pref)
{
    $tmp_name = $file['tmp_name'];
    $src_name = './' . $src . '/' . $file['name'];
    $thmb_name = './' . $thmb . '/' . $thmb_pref . $file['name'];

    if (!(file_exists($src) and file_exists($thmb))) {
        mkdir($src);
        mkdir($thmb);
    }

    if ($file['name'] == '') {
        return 'Файл не выбран!';
    }

    if (($file['size'] < (512 * 1024))) { // Проверка на размер файла
        if ((stristr($file['type'], '/', true) == 'image')) { // Провеяет является ли файл изображением
            if (copy($tmp_name, $src_name) and img_resize($src_name, $thmb_name, 300, 300, 0xffffff)) {
                return 'Файл успешно загружен!';
            } else return 'Ошибка загрузки файла!';
        } else return 'Недопустимый тип файла!';
    } else return 'Недопустимый размер файла!';
}


function fileNameToImg($dir, $thmb_dir, $thmb_pref)
{
    if (!(file_exists($dir) and file_exists($thmb_dir))) {
        mkdir($dir);
        mkdir($thmb_dir);
    }

    $handle = opendir($dir);
    if ($handle != false) {
        while (false !== ($file = readdir($handle))) {
            if ($file != '.' && $file != '..') {
                echo "<a href='./$dir/$file' target='_blank'><img src='./$thmb_dir/$thmb_pref$file' alt='$file' width='300'></a>";
            }
        }
        closedir($handle);
    }
}


/***********************************************************************************
Функция img_resize(): генерация thumbnails
Параметры:
$src             - имя исходного файла
$dest            - имя генерируемого файла
$width, $height  - ширина и высота генерируемого изображения, в пикселях
Необязательные параметры:
$rgb             - цвет фона, по умолчанию - белый
$quality         - качество генерируемого JPEG, по умолчанию - максимальное (100)
 ***********************************************************************************/
function img_resize($src, $dest, $width, $height, $rgb = 0xd7fad7, $quality = 100) {
    if (!file_exists($src)) return false;

    $size = getimagesize($src);

    if ($size === false) return false;

    // Определяем исходный формат по MIME-информации, предоставленной
    // функцией getimagesize, и выбираем соответствующую формату
    // imagecreatefrom-функцию.
    $format = strtolower(substr($size['mime'], strpos($size['mime'], '/')+1));
    $icfunc = "imagecreatefrom" . $format;
    if (!function_exists($icfunc)) return false;

    $x_ratio = $width / $size[0];
    $y_ratio = $height / $size[1];

    $ratio       = min($x_ratio, $y_ratio);
    $use_x_ratio = ($x_ratio == $ratio);

    $new_width   = $use_x_ratio  ? $width  : floor($size[0] * $ratio);
    $new_height  = !$use_x_ratio ? $height : floor($size[1] * $ratio);
    $new_left    = $use_x_ratio  ? 0 : floor(($width - $new_width) / 2);
    $new_top     = !$use_x_ratio ? 0 : floor(($height - $new_height) / 2);

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
