<?php

function get_messages()
{
	$sql = "SELECT * FROM messages ORDER BY dt DESC";
	$result = mysqli_query($GLOBALS['link'], $sql);
	
	if (!$result)
		die(mysqli_error($GLOBALS['link']));
	
	$arr = array();

	while($row = mysqli_fetch_assoc($result))
		$arr[] = $row;

	return $arr;		
}

function send_message($name, $text)
{
	$name = trim($name);
	$text = trim($text);

	if ($name == "" || $text == "")
		return;

	$dt = date('Y-m-d H:i:s');
	
	$sql = "INSERT INTO messages (dt, name, text) 
			VALUES ('$dt', '$name', '$text')";
		   
	$result = mysqli_query($GLOBALS['link'], $sql);
									
	if (!$result)
		die(mysqli_error($GLOBALS['link']));
}