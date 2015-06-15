<?php
$host = $_SERVER['HTTP_HOST'];


	define('dbname', 'hurricane');
	define('User', 'root');
	define('Password', '');

	
$mysqli = new mysqli('localhost', User, Password, dbname);

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

