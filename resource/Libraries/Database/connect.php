<?php
$host = $_SERVER['HTTP_HOST'];

if (strstr($host, 'dev')) {
	define('dbname', 'dev_hurricane');
	define('User', 'devhurricane');
	define('Password', 'qwertz');
} else {
	define('dbname', 'test_hurricane');
	define('User', 'testhurricane');
	define('Password', 'qwertz');
}
$link = mysql_connect('localhost', User, Password);
if (!$link) {
	die('Verbindung schlug fehl: ' . mysql_error());
}
mysql_select_db(dbname);

