<?php

require __DIR__ . '/models/gallery.php';
include __DIR__ . '/views/form_edit_tag.php';

if (isset($_GET['id'])) {
        $id = $_GET['id'];

    if (isset($_POST['title']) and isset($_POST['alt'])){
        $title = $_POST['title'];
        $alt = $_POST['alt'];
        $result = tagEdit($title, $alt, $id);
        if (!$result) {
            header('Location: /lesson_8');
        }
    }
}