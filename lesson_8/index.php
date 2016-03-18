<?php
require_once __DIR__ . '/functions/start.php';
require __DIR__ . '/models/gallery.php';

start();
$items = imagesGetAll();

include __DIR__ . '/views/main.php';