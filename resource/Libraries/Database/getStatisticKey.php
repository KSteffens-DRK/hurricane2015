<?php


include_once 'connect.php';

$query = 'select d.key, p.digID ,count(*) as count
from diagnosiskey d, protcoll p
where p.digID = d.digID
GROUP BY p.digID
 ORDER BY p.digID DESC';

$sqldata = mysql_query($query);

$rows = array();
while($r = mysql_fetch_assoc($sqldata)) {
	$r = array_map("utf8_encode", $r);
	$rows[] = $r;

}
$result['success'] = true;
$result['data'] = $rows;
echo json_encode($result);