<?php

include_once 'connect.php';

error_log('POST: ' . print_r($_GET, 1));
if (!empty($_GET['patientID'])) {
	$patientID = $_GET['patientID'];
	$query = "select p.*, s.key as shooting, w.key as whereabout, d.key as dig
from protcoll p, whereabout w, shootingplace s, diagnosiskey as d 
where p.patientid = $patientID
AND p.whereaboutID = w.whereaboutID
AND p.shootingID = s.shootingID 
And p.digID = d.digID
ORDER BY `protocollID` DESC";

	$sqldata = mysql_query($query);

	$rows = array();
	while ($r = mysql_fetch_assoc($sqldata)) {
		$rows[] = $r;
	}
	$result['success'] = true;
	$result['data'] = $rows;
	echo json_encode($result);
} else {
	return true;
}