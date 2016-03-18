<?php

require __DIR__ . '/models/photo.php';
require __DIR__ . '/functions/file.php';

if (!empty($_POST)) {

    $data = [];

    if (!empty($_POST['title'])) {
        $data['title'] = $_POST['title'];
    }

    if (!empty($_FILES)) {
        $res = File_upload('image');
        if (false !== $res) {
            $data['image'] = $res;
        }
    }

    if (isset($data['title']) && isset($data['image'])){
        Photo_insert($data);
        header('Location: ./index.php');
    }
}

include __DIR__ . '/views/add.php';