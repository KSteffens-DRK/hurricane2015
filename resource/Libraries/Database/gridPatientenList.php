<?php
include_once 'connect.php';

$query = "select p.*, count(pr.patientID) as count
	    From patient AS p
	    LEFT JOIN protcoll AS pr ON 
	    pr.patientID = p.patientID
	    GROUP BY p.patientID";

$sqldata = mysql_query($query);

$rows = array();
while($r = mysql_fetch_assoc($sqldata)) {
  $rows[] = $r;
}
$result['success'] = true;
$result['data'] = $rows;
echo json_encode($result);