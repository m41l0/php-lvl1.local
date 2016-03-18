<?php
// Подключение библиотек.
include_once('model/gallery.php');

// Загружаем фотографию, если пользователь отправил файл.
if (isset($_FILES['photo']))
{
	gallery_add($_FILES['photo']);
	header('Location: index.php');
	exit();
}

// Подготовка данных.
$photos = gallery_list();

// Заголовок страницы.
$title = 'Галерея фотографий';

// Выбор шаблона содержимого.
$content = ($_GET['view'] == 'list') 
	? 'views/content_index_list.php'
	: 'views/content_index_table.php';

// Вывод HTML.
include 'views/main.php';
?>
