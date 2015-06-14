<?php


include_once 'connect.php';

$query = 'select g.key, p.genderID ,count(*) as count
from gender g, patient p
where p.genderID = g.genderID
GROUP BY p.genderID
 ORDER BY p.genderID DESC';

$sqldata = mysql_query($query);

$rows = array();
while($r = mysql_fetch_assoc($sqldata)) {
	$r = array_map("utf8_encode", $r);
//	error_log(print_r($r, 1));
	$rows[] = $r;

}
$result['success'] = true;
$result['data'] = $rows;
echo json_encode($result);