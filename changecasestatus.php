<?php
include_once 'core/header.php';
include_once 'core/navbar.php';

if (!in_array("SUPMAN", $access_array)) {
	header("Location: dashboard.php");
	die();
	
}

$caseid = $_GET["caseid"];
$comment = $_GET["comment"];
$status = $_GET["selection"];


$timestamp = $now->format('Y-m-d H:i:s');

$sql1 = "UPDATE cases SET status = '$status' WHERE id=$caseid";
$sql2 = "UPDATE cases SET status_comment = '$comment' WHERE id=$caseid";
$sql3 = "UPDATE cases SET status_auth = '$logged_id' WHERE id=$caseid";
$sql4 = "UPDATE cases SET closure_timestamp = '$timestamp' WHERE id=$caseid";
$result = $conn->query($sql1);
$result = $conn->query($sql2);
$result = $conn->query($sql3);
$result = $conn->query($sql4);


?>
<style>

.loading {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
}

</style>
	<meta http-equiv="refresh" content="2;url= <?php echo("viewcase.php?caseid=$caseid"); ?>" />
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
