<?php
include_once 'core/header.php';
include_once 'core/navbar.php';

if (!in_array("RPA", $access_array)) {
	header("Location: dashboard.php");
	die();
	
}

$steamid = $_GET["steamid"];
$redirect = $_GET["pathname"];
$staffid = $_GET["staffid"];



$timestamp = $now->format('Y-m-d H:i:s');

$sql1 = "UPDATE memdb SET staff_code =$staffid WHERE steamid=$steamid";
$result = $conn->query($sql1);

$sql2 = "INSERT INTO log(type,subject_id,owner_id,message,timestamp,req_grp) VALUES ('STAFF CODE CHANGE','$steamid','$logged_id','User Staff Code was changed to STAFF_CODE:".$staffid." by STEAMID:".$logged_id."','$timestamp','1')";
$result = $conn->query($sql2);


?>
<style>

.loading {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
}

</style>
	<meta http-equiv="refresh" content="1;url= <?php echo("memdb.php"); ?>" />
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