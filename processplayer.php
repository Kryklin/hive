<?php
include_once 'core/header.php';
include_once 'core/navbar.php';



if (!in_array("PLRMAN", $access_array)) {
	header("Location: dashboard.php");
	die();
}




$steamid = $_GET["steamid"];

$sql = "SELECT * FROM players WHERE playerid = '$steamid'";
$result = $conn2->query($sql);
while($row = $result->fetch_assoc()) {
	$current_cash = $row['cash'];
	$current_bankacc = $row['bankacc'];
	$current_copLevel = $row['copLevel'];
	$current_mediclevel = $row['mediclevel'];
	$current_donatorlvl = $row['donatorlvl'];
	$current_adminlevel = $row['adminlevel'];
	
}

$cash = $_GET["cash"];
$bankacc = $_GET["bankacc"];
$copLevel = $_GET["copLevel"];
$mediclevel = $_GET["mediclevel"];
$donatorlvl = $_GET["donatorlvl"];
$adminlevel = $_GET["adminlevel"];


$timestamp = $now->format('Y-m-d H:i:s');

$sql1 = "UPDATE players SET cash = '$cash' WHERE playerid ='$steamid'";
$sql2 = "UPDATE players SET bankacc = '$bankacc' WHERE playerid ='$steamid'";
$sql3 = "UPDATE players SET copLevel = '$copLevel' WHERE playerid ='$steamid'";
$sql4 = "UPDATE players SET mediclevel = '$mediclevel' WHERE playerid ='$steamid'";
$sql5 = "UPDATE players SET donatorlvl = '$donatorlvl' WHERE playerid ='$steamid'";
$sql6 = "UPDATE players SET adminlevel = '$adminlevel' WHERE playerid ='$steamid'";
$sql7 = "INSERT INTO log(type,subject_id,owner_id,message,timestamp,req_grp) VALUES ('PLAYER EDITED','$steamid','$logged_id','Player data modified by ".$logged_id." | CASH: ".$cash." | Bank ".$bankacc." | CopLevel ".$copLevel." | MedicLevel ".$mediclevel." | DonatorLevel ".$donatorlvl." | AdminLevel ".$adminlevel." | From | CASH: ".$current_cash." | Bank ".$current_bankacc." | CopLevel ".$current_copLevel." | MedicLevel ".$current_mediclevel." | DonatorLevel ".$current_donatorlvl." | AdminLevel ".$current_adminlevel." ','$timestamp','1')";

$result = $conn2->query($sql1);
$result = $conn2->query($sql2);
$result = $conn2->query($sql3);
$result = $conn2->query($sql4);
$result = $conn2->query($sql5);
$result = $conn2->query($sql6);
$result = $conn->query($sql7);





?>
<style>

.loading {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
}

</style>
	<meta http-equiv="refresh" content="1;url= <?php echo("viewplayer.php?steamid=$steamid"); ?>" />
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
