<?php
include_once 'core/header.php';
include_once 'core/navbar.php';

if (!in_array("SUP", $access_array)) {
	header("Location: dashboard.php");
	die();
}

$timestamp = $now->format('Y-m-d H:i:s');
$ownerid = $logged_id;
$memberid = $_GET["id"];
$casetype = $_GET["case_type"];
$staffid = $_GET["staffid"];
$comment = $_GET["comment"];
$status = $_GET["case_status"];
$case_steamid = $_GET["steamid"];
$closuretimestamp = "nill";

$staff_array = serialize($staffid);

$sql1 = "INSERT INTO cases(type,staff_id,comment,timestamp,owner_id,case_subject,status,closure_timestamp,steamid) VALUES ('$casetype','$staff_array','$comment','$timestamp','$ownerid','$memberid','$status','$closuretimestamp','$case_steamid')";
$result = $conn->query($sql1);
		
?>
<style>

.loading {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
}

</style>
	<meta http-equiv="refresh" content="1;url=createcase.php" />
    <main class="mdl-layout__content">
	
	    <div class="mdl-grid mdl-grid--no-spacing">
            <div class="mdl-grid mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-cell--top">	
				<center>
					<div class="ld ld-hourglass ld-spin-fast loading" style="font-size:64px;color:#FFF"></div>
				</center>
			</div>
        </div>
    </main>


<?php 
include_once 'core/footer.php';
?>

