<?php 
include_once 'core/header.php';
include_once 'core/navbar.php';


if (!in_array("RPA", $access_array)) {
	header("Location: dashboard.php");
	die();
}

$steamid = $_GET['steamid'];



$sql = "SELECT * FROM memdb WHERE steamid = '$steamid'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	$current_grpid = $row['grp'];
	
	if ($row['grp'] == "9999") {
		header("Location: memdb.php");
		die();
	}
?>



    <main class="mdl-layout__content">
	
	    <div class="mdl-grid mdl-grid--no-spacing">
			<div class="mdl-grid mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone mdl-cell--top">
			</div>
            <div class="mdl-grid mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone mdl-cell--top">
				<div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--2-col-phone">
                    <div class="mdl-card mdl-shadow--2dp" style="overflow: inherit; z-index: 1">
                        <div class="mdl-card__title mdl-card--expand">
							<h5>Change Group</h5>
                        </div>
						<div class="mdl-card__supporting-text">
							<center>
								<img src="<?php echo($row['avatarfull']); ?>">
								<hr>
								<h5><?php echo($row['personaname']); ?></h5>
								<hr>
								<h5><?php echo (grp_name_conv($row['grp'])); ?></h5>
								<hr>
								<span class="label label--mini background-color--deep-blue"><?php echo (grp_desc_conv($row['grp'])); ?></span>
							</center>
                        </div>
                        <div class="mdl-card__actions mdl-card--border">
						<center>
							<form method="get" action="changegroupprocess.php">
								<input hidden type="text" name="steamid" value="<?php echo($steamid); ?>">
								<input hidden type="text" name="pathname" value="<?php echo($pathname); ?>">
								<input hidden type="text" name="current_grpid" value="<?php echo($current_grpid); ?>">
								<div id="rank_select" class="mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label">
									<select id="selection" name="selection" class="mdl-selectfield__select">
										<?php 
										}
										
										$sql = "SELECT * FROM grp";
										$result = $conn->query($sql);
										while($row = $result->fetch_assoc()) {
											if ($current_grpid == $row['id']) {
												echo("<option selected value='".$row['id']."'>".$row['name']."</option>");
												$btn_lock = "";
											} elseif ($row['id'] == "9999") {
												echo("<option disabled value='".$row['id']."'>".$row['name']."</option>");
											} else {
												echo("<option value='".$row['id']."'>".$row['name']."</option>");
											}
										}
										?>
									</select>
									<label for="selection" class="mdl-selectfield__label">Group</label>
								</div>
								<br>
								<button <?php echo($btn_lock); ?> type="submit" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored-green"><i class="material-icons">done</i></button>						
							</form>
						</center>
                        </div>
                    </div>
                </div>
			</div>
        </div>
    </main>



<?php 
include_once 'core/footer.php';
?>