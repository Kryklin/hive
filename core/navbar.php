 <?php 
 
require_once 'dbconnect.php'; 
 
$logged_id = $steamprofile['steamid'];

$sql = "SELECT * FROM memdb WHERE steamid = $logged_id";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
		
	$db_access_array = grp_access_array($row['grp']);
	$access_array = unserialize($db_access_array);
}

 $pathname = basename($_SERVER['PHP_SELF']);
 
 if ($pathname == "dashboard.php") {
	$dashboard_status = "--current";
	$aps_status = "";
	$uam_status = "";
	$grpman_status = "";
	$supcase_status = "";
	$stats_status = "";
	$supman_status = "";
	$playerman_status = "";
	$log_status = "";
 } elseif ($pathname == "aps.php" || $pathname == "viewrecord.php" || $pathname == "approverecord.php" || $pathname == "declinerecord.php") {
	$dashboard_status = "";
	$aps_status = "--current";
	$uam_status = "";
	$grpman_status = "";
	$supcase_status = "";
	$stats_status = "";
	$supman_status = "";
	$playerman_status = "";
	$log_status = "";
 } elseif ($pathname == "memdb.php" || $pathname == "viewmember.php" || $pathname == "changegroup.php") {
	$dashboard_status = "";
	$aps_status = "";
	$uam_status = "--current";
	$grpman_status = "";
	$stats_status = "";
	$supman_status = "";
	$playerman_status = "";
	$log_status = "";
 } elseif ($pathname == "grpman.php") {
	$dashboard_status = "";
	$aps_status = "";
	$uam_status = "";
	$grpman_status = "--current";
	$supcase_status = "";
	$stats_status = "";
	$supman_status = "";
	$playerman_status = "";
	$log_status = "";
 } elseif ($pathname == "suspendmember.php" || $pathname == "approverecord.php" || $pathname == "declinerecord.php" || $pathname == "changegroupprocess.php") {
	 $nav_hide = "hidden";
 } elseif ($pathname == "supcase.php" || $pathname == "createcase.php" || $pathname == "submitcase.php") {
	$dashboard_status = "";
	$aps_status = "";
	$uam_status = "";
	$grpman_status = "";
	$supcase_status = "--current";
	$stats_status = "";
	$supman_status = "";
	$playerman_status = "";
	$log_status = "";
 } elseif ($pathname == "stats.php") {
	$dashboard_status = "";
	$aps_status = "";
	$uam_status = "";
	$grpman_status = "";
	$supcase_status = "";
	$stats_status = "--current";
	$supman_status = "";
	$playerman_status = "";
	$log_status = "";
 } elseif ($pathname == "supmancase.php" || $pathname == "viewcase.php" || $pathname == "closecase.php" || $pathname == "casequery.php") {
	$dashboard_status = "";
	$aps_status = "";
	$uam_status = "";
	$grpman_status = "";
	$supcase_status = "";
	$stats_status = "";
	$supman_status = "--current";
	$playerman_status = "";
	$log_status = "";
 } elseif ($pathname == "plrman.php" || $pathname == "viewplayer.php") {
	$dashboard_status = "";
	$aps_status = "";
	$uam_status = "";
	$grpman_status = "";
	$supcase_status = "";
	$stats_status = "";
	$supman_status = "";
	$playerman_status = "--current";
	$log_status = "";
 } elseif ($pathname == "log.php") {
	$dashboard_status = "";
	$aps_status = "";
	$uam_status = "";
	$grpman_status = "";
	$supcase_status = "";
	$stats_status = "";
	$supman_status = "";
	$playerman_status = "";
	$log_status = "--current";
 }

 
 
 ?>

 <div class="mdl-layout__drawer">
        <header>Evo-Network</header>
		<br>
		<center>
			<img width="40%" src="https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/7a/7a846fbc212d948e5b7a95b89567a99d646f2f33_full.jpg">
		</center>
        <nav <?php echo($nav_hide); ?> class="mdl-navigation">
			<a class='mdl-navigation__link mdl-navigation__link<?php echo($dashboard_status); ?>' href='dashboard.php'>
                <i class='material-icons' role='presentation'>dashboard</i>
                Dashboard
            </a>
			<a <?php if (!in_array("RPA",$access_array) || !in_array("RPB",$access_array)) {echo("hidden");} ?> class='mdl-navigation__link mdl-navigation__link<?php echo($aps_status); ?>' href='aps.php'>
                <i class='material-icons' role='presentation'>account_box</i>
                Staff Enrolement Control
            </a>
			<a <?php if (!in_array("UAM",$access_array)) {echo("hidden");} ?> class='mdl-navigation__link mdl-navigation__link<?php echo($uam_status); ?>' href='memdb.php'>
                <i class='material-icons' role='presentation'>fingerprint</i>
                Staff Database
            </a>
			<a <?php if (!in_array("GRPMAN",$access_array)) {echo("hidden");} ?> class='mdl-navigation__link mdl-navigation__link<?php echo($grpman_status); ?>' href='grpman.php'>
                <i class='material-icons' role='presentation'>verified_user</i>
                Group Management
            </a>
			<a <?php if (!in_array("SUP",$access_array)) {echo("hidden");} ?> class='mdl-navigation__link mdl-navigation__link<?php echo($supcase_status); ?>' href='supcase.php'>
                <i class='material-icons' role='presentation'>contact_support</i>
                Create Case
            </a>
			<a <?php if (!in_array("SUPMAN",$access_array)) {echo("hidden");} ?> class='mdl-navigation__link mdl-navigation__link<?php echo($supman_status); ?>' href='supmancase.php'>
                <i class='material-icons' role='presentation'>work</i>
                Case Management
            </a>
			<a <?php if (!in_array("PLRMAN",$access_array)) {echo("hidden");} ?> class='mdl-navigation__link mdl-navigation__link<?php echo($playerman_status); ?>' href='plrman.php'>
                <i class='material-icons' role='presentation'>recent_actors</i>
                Player Management
            </a>
			<a <?php if (!in_array("STAT",$access_array)) {echo("hidden");} ?> class='mdl-navigation__link mdl-navigation__link<?php echo($stats_status); ?>' href='stats.php'>
                <i class='material-icons' role='presentation'>perm_data_setting</i>
                Staff Statistics 
            </a>
			<a <?php if (!in_array("LOG",$access_array)) {echo("hidden");} ?> class='mdl-navigation__link mdl-navigation__link<?php echo($log_status); ?>' href='log.php'>
                <i class='material-icons' role='presentation'>gavel</i>
                System Logs 
            </a>
        </nav>
    </div>