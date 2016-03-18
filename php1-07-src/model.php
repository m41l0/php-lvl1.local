<?php

function get_messages()
{
	$sql = "SELECT * FROM messages ORDER BY dt DESC";
	$result = mysql_query($sql);
	
	if (!$result)
		die(mysql_error());
	
	$arr = array();

	while($row = mysql_fetch_assoc($result))
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
		   
	$result = mysql_query($sql);
									
	if (!$result)
		die(mysql_error());
}