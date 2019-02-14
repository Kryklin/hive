<?php 
include_once 'core/header.php';
include_once 'core/navbar.php';


if (!in_array("PLRMAN", $access_array)) {
	header("Location: dashboard.php");
	die();
}
?>

<script>
	$(document).ready(function() {
		$('.js-example-basic-single').select2();
	});
</script>



    <main class="mdl-layout__content">
	
	    <div class="mdl-grid mdl-grid--no-spacing">

            <div class="mdl-grid mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone mdl-cell--top">
				<div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
				</div>
				<div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
                    <div class="mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title mdl-card--expand">
                            <h2 class="mdl-card__title-text">Manual Player Search</h2>
                        </div>
                        <div class="mdl-card__supporting-text">
							<center>
								<form action="viewplayer.php" method="get">
									<select class="js-example-basic-single" name="steamid">
										<?php

										$sql = "SELECT * FROM players";
										$result = $conn2->query($sql);

										while($row = $result->fetch_assoc()) {
											
											
										
										?>
									  <option value="<?php echo($row['playerid']); ?>"><?php echo($row['name']); ?></option>
									  <?php } ?>
									</select>
									<button type="submit" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored-green"><i class="material-icons">done</i></button>
								</form>
							</center>
                        </div>
                    </div>
                </div>
				<div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
				</div>
			    <div class="mdl-cell mdl-cell--6-col-desktop mdl-cell--6-col-tablet mdl-cell--2-col-phone">
                    <div class="mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title mdl-card--expand">
                            <h2 class="mdl-card__title-text">Active Compensation Cases</h2>
                        </div>
                        <div class="mdl-card__supporting-text">
							<table class="mdl-data-table  mdl-data-table--selectable mdl-shadow--2dp projects-table">
								<thead>
								<tr>
									<th class="mdl-data-table__cell--non-numeric">Case ID</th>
									<th class="mdl-data-table__cell--non-numeric">Case Owner</th>
									<th class="mdl-data-table__cell--non-numeric">Case Subject</th>
									<th class="mdl-data-table__cell--non-numeric">Options</th>
								</tr>
								</thead>
								<tbody>
								<?php

								$sql = "SELECT * FROM cases WHERE type = '4' AND status = 'Open'";
								$result = $conn->query($sql);

								while($row = $result->fetch_assoc()) {
									
									$steamid = $row['steamid'];
								
								?>
							
									<tr>
										<td class="mdl-data-table__cell--non-numeric"><?php echo($row['id']); ?></td>
										<td class="mdl-data-table__cell--non-numeric"><?php echo(app_steamid_convert($row['owner_id'])); ?></td>
										<td class="mdl-data-table__cell--non-numeric"><?php echo($row['steamid']); ?></td>
										<td class="mdl-data-table__cell--non-numeric"><button  onclick="window.location.href='<?php echo("viewplayer.php?steamid=$steamid");?>'" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored-white"><i class="material-icons">folder-open</i></button></td>
									</tr>
								<?php } ?>
								</tbody>
							</table>
                        </div>
                    </div>
                </div>
				<div class="mdl-cell mdl-cell--6-col-desktop mdl-cell--6-col-tablet mdl-cell--2-col-phone">
                    <div class="mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title mdl-card--expand">
                            <h2 class="mdl-card__title-text">Active Whitelisting Cases</h2>
                        </div>
                        <div class="mdl-card__supporting-text">
							<table class="mdl-data-table  mdl-data-table--selectable mdl-shadow--2dp projects-table">
								<thead>
								<tr>
									<th class="mdl-data-table__cell--non-numeric">Case ID</th>
									<th class="mdl-data-table__cell--non-numeric">Case Owner</th>
									<th class="mdl-data-table__cell--non-numeric">Case Subject</th>
									<th class="mdl-data-table__cell--non-numeric">Options</th>
								</tr>
								</thead>
								<tbody>
								<?php

								$sql = "SELECT * FROM cases WHERE type = '5' AND status = 'Open'";
								$result = $conn->query($sql);

								while($row = $result->fetch_assoc()) {
									
									$steamid = $row['steamid'];
								
								?>
							
									<tr>
										<td class="mdl-data-table__cell--non-numeric"><?php echo($row['id']); ?></td>
										<td class="mdl-data-table__cell--non-numeric"><?php echo(app_steamid_convert($row['owner_id'])); ?></td>
										<td class="mdl-data-table__cell--non-numeric"><?php echo($row['steamid']); ?></td>
										<td class="mdl-data-table__cell--non-numeric"><button  onclick="window.location.href='<?php echo("viewplayer.php?steamid=$steamid");?>'" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored-white"><i class="material-icons">folder-open</i></button></td>
									</tr>
								<?php } ?>
								</tbody>
							</table>
                        </div>
                    </div>
                </div>
			</div>
        </div>

    </main>


<?php 
include_once 'core/footer.php';
?>