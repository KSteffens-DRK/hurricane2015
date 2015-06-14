<?php
include_once 'connect.php';

$query = "SELECT p.*, pa.* FROM protcoll p, patient pa WHERE p.patientID = pa.patientID
ORDER BY `p`.`patientID` ASC";

$sqldata = mysql_query($query);

$rows = array();
while($r = mysql_fetch_assoc($sqldata)) {
  $rows[] = $r;
}
$result['success'] = true;
$result['data'] = $rows;
echo json_encode($result);