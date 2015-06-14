<?php
include_once 'connect.php';

$query = 'SELECT * FROM `diagnosiskey`';

$sqldata = mysql_query($query);

$rows = array();
while($r = mysql_fetch_assoc($sqldata)) {
	$r = array_map("utf8_encode", $r);
	$rows[] = $r;

}
$result['success'] = true;
$result['data'] = $rows;
echo json_encode($result);
