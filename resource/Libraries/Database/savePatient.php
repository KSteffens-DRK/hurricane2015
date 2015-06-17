<?php

include 'connect.php';

$post = $_POST;

error_log(print_r($post, 1)); 


$now = date(time());

error_log('ID: '.print_r($post, 1));

if (empty($post['patientID'])){
	error_log('INSERT Patient');
	$query  = "INSERT INTO patient (firstname, lastname, gebDat, street, plz, town, create_dat, change_dat, genderID) VALUES ('$post[firstname]', '$post[lastname]', '$post[gebDat]', '$post[street]', '$post[plz]', '$post[town]', '$now', '$now', '$post[gender]')";
	$result = $mysqli->query($query);//mysql_query($query);
	
	//echo '<pre>'.print_r($result, 1);
	//exit;

	if ($result !== true){
		error_log(mysqli_error($mysqli));
		//error_log(print_r(var_dump($id)));
	}

	$id = mysqli_insert_id($mysqli);
	error_log('ID: '.$id);
} else {
	$id = $post['patientID'];
	error_log('ELSE');
}


$query = "INSERT INTO protcoll (patientID, date, patientNr, digID, helpernr, intime, outtime, outdate, remark, shootingID, whereaboutID) VALUES ('$id', '$post[Date]', '$post[PatNr]', '$post[digkey]', '$post[helpernr1]', '$post[intime]', '$post[outtime]', '$post[outdate]', '$post[remark]', '$post[shooting]', '$post[whereabout]')";
$result = $mysqli->query($query);

if ($result !== true){
	echo json_encode(mysqli_error($mysqli));
	if (!isset($post['patientID'])){
		$query = "DELETE FROM patient WHERE patientID = '$id'";
		$result = $mysqli->query($query);
	}
	//error_log(print_r(mysql_error()));
	//error_log(print_r(var_dump($id)));
}

mysqli_close($mysqli);

return true;