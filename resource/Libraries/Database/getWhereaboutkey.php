<?php
include_once 'connect.php';

$query = 'SELECT * FROM `whereabout`';

$sqldata = $mysqli->query($query);

$rows = array();
while($r = mysqli_fetch_assoc($sqldata)) {
	$r = array_map("utf8_encode", $r);
	$rows[] = $r;

}
mysqli_close($mysqli);
$result['success'] = true;
$result['data'] = $rows;
echo json_encode($result);
