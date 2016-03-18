<a href="index.php">Таблица</a> | <b>Список</b>

<br/><br/>

<? foreach ($photos as $photo): ?>

	<a href="photo.php?id=<?=$photo['id']?>">
		<img src="<?=$photo['id'] . '.' . $photo['type']?>" />
	</a>
	<br/>

<? endforeach ?>

<br/><br/>

<form method="post" enctype="multipart/form-data">
	<input type="file" name="photo" />
	<br/>
	<input type="submit" value="Загрузить файл!" />
</form>
