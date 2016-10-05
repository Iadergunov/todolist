<?php
	$host = 'localhost';
	$dbuser = 'dergunov_todo';
	$password = 'WROhKQpf';
	$dbname = 'dergunov_todo';

	$mysqli = new mysqli($host, $dbuser, $password, $dbname);
	    if ($mysqli->connect_errno) {
	    echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	    } 
?>


