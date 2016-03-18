<?php

function File_upload($field)
{
    if (empty($_FILES))
        return false;
    if (0 != $_FILES[$field]['error'])
        return false;
    if (is_uploaded_file($_FILES[$field]['tmp_name'])) {
        $res = move_uploaded_file(
            $_FILES[$field]['tmp_name'],
            __DIR__ . '/../img/' . $_FILES[$field]['name']
        );
        if (!$res) {
            return false;
        } else {
            return './img/' . $_FILES[$field]['name'];
        }
    }
    return false;
}