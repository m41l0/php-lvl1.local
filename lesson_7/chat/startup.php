<?php

function startup()
{
	// Настройки подключения к БД.
	$hostname = 'localhost';
	$username = 'root';
	$password = '';
	$dbName   = 'test';
	
	// Языковая настройка.
	setlocale(LC_ALL, 'ru_RU.UTF-8');
	
	// Подключение к БД.
	$GLOBALS['link'] = mysqli_connect($hostname, $username, $password) or die('No connect with data base');
	mysqli_query($GLOBALS['link'], 'SET NAMES utf8');
	mysqli_select_db($GLOBALS['link'], $dbName) or die('No data base');

	// Открытие сессии.
	session_start();
}