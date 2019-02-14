<?php
include_once 'core/header.php';
include_once 'core/navbar.php';

if (!in_array("RPA", $access_array)) {
	header("Location: dashboard.php");
	die();
}

$appid = $_GET["steamid"];
$redirect = $_GET["pathname"];

$timestamp = $now->format('Y-m-d H:i:s');


$sql = "SELECT * FROM apps WHERE steamid = '$appid'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	$steamid = $row['steamid'];
	$personaname = $row['personaname'];
	$profileurl = $row['profileurl'];
	$avatar = $row['avatar'];
	$avatarmedium = $row['avatarmedium'];
	$avatarfull = $row['avatarfull'];
	$ip = $row['ip'];
	$ip_flag = $row['ip_flag'];
	$ip_cont = $row['ip_cont'];
	$ip_count = $row['ip_count'];
	$ip_reg = $row['ip_reg'];
	$ip_lang = $row['ip_lang'];
	$ip_gdpr = $row['ip_gdpr'];
	$enjinid = $row['enjinid'];
	$staffcode = $row['staff_code'];
	$evoname = $row['evo_name'];
}
	
$sql1 = "INSERT INTO memdb(steamid,personaname,profileurl,avatar,avatarmedium,avatarfull,ip,ip_flag,ip_cont,ip_count,ip_reg,ip_lang,ip_gdpr,enjin_id,staff_code,evo_name) VALUES ('$steamid','$personaname','$profileurl','$avatar','$avatarmedium','$avatarfull','$ip','$ip_flag','$ip_cont','$ip_count','$ip_reg','$ip_lang','$ip_gdpr','$enjinid','$staffcode','$evoname')";
$result = $conn->query($sql1);
	
$sql2 = "UPDATE apps SET auth_id = '$logged_id' WHERE steamid=$appid";
$result = $conn->query($sql2);
	
$sql3 = "UPDATE apps SET status = 'Approved' WHERE steamid=$appid";
$result = $conn->query($sql3);
	
$sql4 = "UPDATE apps SET auth_timestamp = '$timestamp' WHERE steamid=$appid";
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
	<meta http-equiv="refresh" content="2;url= <?php echo($_GET["pathname"]); ?>" />
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

