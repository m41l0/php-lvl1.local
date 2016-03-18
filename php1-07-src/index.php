<?php
// Подключение модулей.
include_once('startup.php');
include_once('model.php');

// Подготовка.
startup();

// Была отправка формы?
if (!empty($_POST))
{
	send_message($_POST['name'], $_POST['text']);
	header("Location: index.php");
	exit();
}

// Получаем список сообщений.
$messages = get_messages();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Чат</title>
</head>

<body>
	<form method="post">
		Имя:<br/>
		<input type="text" name="name" /><br/>
		Сообщение:<br/> 
		<input type="text" name="text" /><br/>
		<input type="submit" value="Отправить" /><br/>		
	</form>

	<hr/>
	
	<?php
	foreach($messages as $m)
	{
		echo '<p>';
		echo '<i>' . $m['dt'] . ' - ' . $m['name'] . '</i><br/>';
		echo $m['text'];
		echo '</p>';
	}
	?>	
</body>
</html>	
