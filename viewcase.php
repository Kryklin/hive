<?php 
include_once 'core/header.php';
include_once 'core/navbar.php';


if (!in_array("SUP", $access_array)) {
	header("Location: dashboard.php");
	die();
}

$caseid = $_GET['caseid'];

$sql = "SELECT * FROM cases WHERE id = '$caseid'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	
	$active_caseid = $row['id'];
	
	$rowstatus = $row['status']; 
	$rowstatus_comment = $row['status_comment']; 
	
	if ($rowstatus == "Closed") {
		$btn_lock = "hidden";
		$closure_lock = "";
	} elseif ($rowstatus == "Open") {
		$btn_lock = "";
		$closure_lock = "hidden";
	} 
	
	if ($rowstatus == "Closed" & $rowstatus_comment == "Case closed on entry") {
		$null_lock = "hidden";
		$btn_lock = "hidden";
		$closure_lock = "";
	}
	
	$staffid_array = unserialize($row['staff_id']);
?>



    <main class="mdl-layout__content">
	
	    <div class="mdl-grid mdl-grid--no-spacing">
		<div class="mdl-grid mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--12-col-phone mdl-cell--top">
		</div>
        <div class="mdl-grid mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--12-col-phone mdl-cell--top">

			    <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--2-col-phone">
                    <div class="mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title mdl-card--expand">
                            <h2 class="mdl-card__title-text">CASE #<?php echo($row['id']); ?></h2>
                        </div>
                        <div class="mdl-card__supporting-text">
							<b>Member Requesting Support</b> : <a href="<?php echo("https://www.evo-network.co.uk/profile/".$row['case_subject']); ?>" target="_blank"><span class="label label--mini background-color--deep-blue"><?php echo("https://www.evo-network.co.uk/profile/".$row['case_subject']); ?></span></a>
							<hr>
							<center>
							Case Owner <br><br><span class="label label--mini background-color--deep-blue"><?php echo(app_steamid_convert($row['owner_id'])); ?></span><br><br><img width="6%" src="<?php echo(get_avatar($row['owner_id'])); ?>" >
							</center>
							<hr>
							<b>Case Type</b> : <span class="label label--mini background-color--deep-blue"><?php echo(case_type_conv($row['type'])); ?></span>
							<br>
							<br>
							<b>Timestamp</b> : <?php echo($row['timestamp']); ?>
							<br>
							<br>
							<b>Comment</b> : <?php echo($row['comment']); ?>
							<br>
							<br>
							<b>Staff Involved</b> : <?php foreach($staffid_array as $value){echo $value . ",";}?>
                        </div>
						<div <?php echo($btn_lock); ?>  class="mdl-card__actions">
							<button onclick="window.location.href='<?php echo("closecase.php?caseid=$caseid");?>'" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored-red"><i class="material-icons">lock</i></button>
                        </div>
						<div <?php echo($closure_lock); ?> class="mdl-card__title mdl-card--expand">
                            <h2 class="mdl-card__title-text">Case Status</h2>
                        </div>
						<div <?php echo($closure_lock); ?> <?php echo($null_lock); ?> class="mdl-card__supporting-text">
							<hr>
							<center>
							<?php echo($null_lock); ?>Case Closure Authorization  <br><br><span <?php echo($closure_lock); ?> class="label label--mini background-color--deep-blue"><?php echo(app_steamid_convert($row['status_auth'])); ?></span><br><br><img <?php echo($closure_lock); ?> width="6%" src="<?php echo(get_avatar($row['status_auth'])); ?>" >
							<hr>
							</center>
                        </div>
						<div <?php echo($closure_lock); ?> class="mdl-card__supporting-text">
							<b>Case Status :</b> <span class="label label--mini background-color--deep-blue"><?php echo($row['status']); ?></span>
							<br>
							<b>Case Closure Comment</b> : <?php echo($row['status_comment']); ?>
							<br>
							<b>Case  Duration</b> : <?php echo(case_duration($row['timestamp'],$row['closure_timestamp'])); ?>
                        </div>
                    </div>
                </div>
        </div>

    </main>



<?php 
}
include_once 'core/footer.php';
?>