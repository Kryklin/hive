<?php
require_once 'dbconnect.php';

function grp_name_conv($grpid) {
	
	global $conn;
	$sql = "SELECT * FROM grp WHERE id = '$grpid'";
	$result = $conn->query($sql);
								
	while($row = $result->fetch_assoc()) {
		$groupname = $row['name'];
	}
	
	return $groupname;
}

function get_avatar($steamid) {
	
	global $conn;
	$sql = "SELECT * FROM memdb WHERE steamid = '$steamid'";
	$result = $conn->query($sql);
								
	while($row = $result->fetch_assoc()) {
		$avatar = $row['avatarfull'];
	}
	
	return $avatar;
}




function staff_case_count($steamid,$type) {
	
	global $conn;
	$sql = "SELECT * FROM cases WHERE owner_id = '$steamid' AND type LIKE '$type'";
	$result = $conn->query($sql);
	$numb_rows = mysqli_num_rows($result);
	
	return $numb_rows;
}

function staff_case_count_closure($steamid,$type) {
	
	global $conn;
	$sql = "SELECT * FROM cases WHERE owner_id = '$steamid' AND status_auth LIKE '$steamid' AND type LIKE '$type'";
	$result = $conn->query($sql);
	$numb_rows = mysqli_num_rows($result);
	
	return $numb_rows;
}

function case_count_closure() {
	
	global $conn;
	$sql = "SELECT * FROM cases WHERE status = 'Closed'";
	$result = $conn->query($sql);
	$numb_rows = mysqli_num_rows($result);
	
	return $numb_rows;
}

function case_count() {
	
	global $conn;
	$sql = "SELECT * FROM cases";
	$result = $conn->query($sql);
	$numb_rows = mysqli_num_rows($result);
	
	return $numb_rows;
}

function case_duration($date1,$date2) {
	$datetime1 = new DateTime($date1);
	$datetime2 = new DateTime($date2);
	
	if ($datetime2 == "") {
		$case_statement = "Case Closed on Entry";
		return $case_statement;
		die();
	} else {
		$interval = $datetime1->diff($datetime2);
		return $interval->format('%a days, %h hours, %i minutes and %s seconds');
	}
	
	
	
}

function case_count_open() {
	
	global $conn;
	$sql = "SELECT * FROM cases WHERE status = 'Open'";
	$result = $conn->query($sql);
	$numb_rows = mysqli_num_rows($result);
	
	return $numb_rows;
}

function staff_case_count_total($steamid) {
	
	global $conn;
	$sql = "SELECT * FROM cases WHERE owner_id = '$steamid'";
	$result = $conn->query($sql);
	$numb_rows = mysqli_num_rows($result);
	
	return $numb_rows;
}


function grp_img_conv($grpid) {
	
	global $conn;
	$sql = "SELECT * FROM grp WHERE id = '$grpid'";
	$result = $conn->query($sql);
								
	while($row = $result->fetch_assoc()) {
		$img = $row['image'];
	}
	
	return $img;
}

function grp_desc_conv($grpid) {
	
	global $conn;
	$sql = "SELECT * FROM grp WHERE id = '$grpid'";
	$result = $conn->query($sql);
								
	while($row = $result->fetch_assoc()) {
		$desc = $row['desc'];
	}
	
	return $desc;
}

function grp_user_list($access) {
	
	global $conn;
	$sql = "SELECT * FROM memdb WHERE grp = '$access'";
	$result = $conn->query($sql);
					
	while($row = $result->fetch_assoc()) {

		echo ("<hr><center><img src='" . $row['avatar'] ."'><br>");
		echo ($row['personaname']."</li></center><hr>");
	}

	
}

function grp_access_array($grpid) {
	
	global $conn;
	$sql = "SELECT * FROM grp WHERE id = '$grpid'";
	$result = $conn->query($sql);
								
	while($row = $result->fetch_assoc()) {
		$groupaccess = $row['access_array'];
	}
	
	return $groupaccess;
}

function app_steamid_convert($steamid) {
	
	global $conn;
	$sql = "SELECT * FROM memdb WHERE steamid = '$steamid'";
	$result = $conn->query($sql);
								
	while($row = $result->fetch_assoc()) {
		$steamname = $row['evo_name'];
	}
	
	return $steamname;
}

function user_log() {
	
	global $conn;
	$sql = "SELECT * FROM log ORDER BY id DESC";
	$result = $conn->query($sql);
					
	while($row = $result->fetch_assoc()) {
		echo ("ID: ".$row['id']." | SUBJECT: <b>".$row['subject_id']." | TYPE: <b>".$row['type']." </b> | MESSAGE: <u>". $row['message'] ."</u> | AUTH: ".app_steamid_convert($row['owner_id']))." | TIME: ".$row['timestamp'];
		echo ("<hr>");
	}
}

function case_type_conv($casetypeid) {
	if ($casetypeid == "1") {
		$casetypeid = "General Question";
	} elseif ($casetypeid == "2") {
		$casetypeid = "Website Tags";
	} elseif ($casetypeid == "3") {
		$casetypeid = "Technical Support";
	} elseif ($casetypeid == "4") {
		$casetypeid = "Compensation";
	} elseif ($casetypeid == "5") {
		$casetypeid = "Whitelisting";
	} elseif ($casetypeid == "6") {
		$casetypeid = "Player Complaint";
	} elseif ($casetypeid == "7") {
		$casetypeid = "Staff Complaint";
	} elseif ($casetypeid == "8") {
		$casetypeid = "Teamspeak Tags";
	} elseif ($casetypeid == "9") {
		$casetypeid = "Other";
	}
	
	return $casetypeid;
}

function draw_select2_steamid () {
	
	global $conn2;
	$sql = "SELECT * FROM players";
	$result = $conn2->query($sql);
	
	echo("<select class='js-example-basic-single' name='steamid'>");
	while($row = $result->fetch_assoc()) {
		echo("<option value=".$row['playerid'].">".$row['name']."</option>");
	} 
	echo("<option selected value='n/a'>N/A</option>");
	echo("</select>");

}

function draw_select2_staffid () {
	
	global $conn;
	$sql = "SELECT * FROM memdb";
	$result = $conn->query($sql);
	
	echo("<select class='js-example-basic-single' name='staffid[]' multiple='multiple'>");
	while($row = $result->fetch_assoc()) {
		echo("<option value=".$row['staff_code'].">".$row['evo_name']."</option>");
	} 
	echo("</select>");

}

function draw_select2_steamid_staff () {
	
	global $conn;
	$sql = "SELECT * FROM memdb";
	$result = $conn->query($sql);
	
	echo("<select class='js-example-basic-single' name='steamid'>");
	while($row = $result->fetch_assoc()) {
		echo("<option value=".$row['steamid'].">".$row['evo_name']."</option>");
	} 
	echo("</select>");

}


?>