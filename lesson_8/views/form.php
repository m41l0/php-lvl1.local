<h2>Форма загрузки файла на сервер</h2>
<form action="/lesson_8/add.php" method="post" enctype="multipart/form-data">
    <label for="image">Файл</label>
    <input type="file" id="image" name="image" required>
    <input type="submit" value="Загрузить файл">
</form>