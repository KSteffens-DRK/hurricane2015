<?php
include_once 'connect.php';

$query = "select p.*, count(pr.patientID) as count
	    From patient AS p
	    LEFT JOIN protcoll AS pr ON 
	    pr.patientID = p.patientID
	    GROUP BY p.patientID";

	$sqldata = $mysqli->query($query);


$rows = array();
while($r = mysqli_fetch_assoc($sqldata)) {
  $rows[] = $r;
}
$result['success'] = true;
$result['data'] = $rows;
echo json_encode($result);