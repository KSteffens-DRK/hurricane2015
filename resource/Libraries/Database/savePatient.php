<?php

include 'connect.php';

$post = $_POST;

//$post = array_map("utf8_en	code", $post);
error_log(print_r($post, 1)); 


$now = date(time());

error_log('ID: '.print_r($post, 1));

if (empty($post['patientID'])){
	error_log('INSERT Patient');
	$query  = "INSERT INTO patient (firstname, lastname, gebDat, street, plz, town, create_dat, change_dat, genderID) VALUES ('$post[firstname]', '$post[lastname]', '$post[gebDat]', '$post[street]', '$post[plz]', '$post[town]', '$now', '$now', $post[gender])";
	$result = mysql_query($query);

	if ($result !== true){
		error_log(mysql_error());
		error_log(print_r(var_dump($id)));
	}

	$id = mysql_insert_id();
	error_log('ID: '.$id);
} else {
	$id = $post['patientID'];
	error_log('ELSE');
}


$query = "INSERT INTO protcoll (patientID, date, patientNr, digID, helpernr, intime, outtime, outdate, remark, shootingID, whereaboutID) VALUES ('$id', '$post[Date]', '$post[PatNr]', '$post[digkey]', '$post[helpernr]', '$post[intime]', '$post[outtime]', '$post[outdate]', '$post[remark]', '$post[shooting]', '$post[whereabout]')";
$result = mysql_query($query);

if ($result !== true){
	if (!isset($post['patientID'])){
		$query = "DELETE FROM patient WHERE patientID = '$id'";
		$result = mysql_query($query);
	}
	error_log(print_r(mysql_error()));
	error_log(print_r(var_dump($id)));
}

return true;