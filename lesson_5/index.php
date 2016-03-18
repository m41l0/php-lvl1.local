<?php
if (isset($_COOKIE['login'])) {
    if (isset($_COOKIE['page'])) {
        $page = $_COOKIE['page'];
        header("location:$page.php");
    } else {
        header('location:a.php');
    }
} else {
    header('location:login.php');
}