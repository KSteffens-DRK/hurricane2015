<?php


include_once 'connect.php';

$query = 'select s.key, p.shootingID ,count(*) as count 
from shootingplace s, protcoll p 
where p.shootingID = s.shootingID 
GROUP BY p.shootingID 
ORDER BY p.shootingID DESC';

$sqldata = mysql_query($query);

$rows = array();
while($r = mysql_fetch_assoc($sqldata)) {
	$r = array_map("utf8_encode", $r);
	$rows[] = $r;

}
$result['success'] = true;
$result['data'] = $rows;
echo json_encode($result);