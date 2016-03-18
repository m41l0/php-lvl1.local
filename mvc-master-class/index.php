<?php

require __DIR__ . '/models/photo.php';

$items = Photo_getAll();

include __DIR__ . '/views/index.php';