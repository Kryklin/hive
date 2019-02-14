<?php 
include_once 'core/header.php';
include_once 'core/navbar.php';


if (!in_array("RPA", $access_array)) {
	header("Location: dashboard.php");
	die();
}
?>



    <main class="mdl-layout__content">
	
	    <div class="mdl-grid mdl-grid--no-spacing">

            <div class="mdl-grid mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone mdl-cell--top">
				<div class="mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-tablet mdl-cell--2-col-phone">
				</div>
			    <div class="mdl-cell mdl-cell--8-col-desktop mdl-cell--8-col-tablet mdl-cell--2-col-phone">
                    <div class="mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title mdl-card--expand">
                            <h2 class="mdl-card__title-text">Staff Enrolement Control Panel</h2>
                        </div>
                        <div class="mdl-card__supporting-text">
						<h3>Pending Enrolments</h3>
							<table class="mdl-data-table  mdl-data-table--selectable mdl-shadow--2dp projects-table">
								<thead>
								<tr>
									<th class="mdl-data-table__cell--non-numeric">SteamID64</th>
									<th class="mdl-data-table__cell--non-numeric">Username</th>
									<th class="mdl-data-table__cell--non-numeric">Avatar</th>
									<th class="mdl-data-table__cell--non-numeric">IP</th>
									<th class="mdl-data-table__cell--non-numeric">Status</th>
									<th class="mdl-data-table__cell--non-numeric">Options</th>
								</tr>
								</thead>
								<tbody>
								<?php

								$sql = "SELECT * FROM apps WHERE status = 'Pending'";
								$result = $conn->query($sql);

								while($row = $result->fetch_assoc()) {
									
									$steamid = $row['steamid'];
								
								?>
							
									<tr>
										<td class="mdl-data-table__cell--non-numeric"><?php echo($row['steamid']); ?></td>
										<td class="mdl-data-table__cell--non-numeric">
											<span class="label label--mini background-color--deep-blue"><?php echo($row['personaname']); ?></span>
										</td>
										<td class="mdl-data-table__cell--non-numeric"><img src="<?php echo($row['avatar']); ?>"?</td>
										<td class="mdl-data-table__cell--non-numeric"><?php echo($row['ip']); ?></td>
										<td class="mdl-data-table__cell--non-numeric"><?php echo($row['status']); ?></td>
										<td class="mdl-data-table__cell--non-numeric"><button  onclick="window.location.href='<?php echo("viewrecord.php?steamid=$steamid");?>'" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored-white"><i class="material-icons">folder-open</i></button> <button  onclick="window.location.href='<?php echo("approverecord.php?steamid=$steamid&pathname=$pathname");?>'" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored-green"><i class="material-icons">done</i></button> <button  onclick="window.location.href='<?php echo("declinerecord.php?steamid=$steamid&pathname=$pathname");?>'" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored-red"><i class="material-icons">clear</i></button></td>
									</tr>
								<?php } ?>
								</tbody>
							</table>
                        </div>
                    </div>
                </div>
				<div class="mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-tablet mdl-cell--2-col-phone">
				</div>
			</div>
        </div>

    </main>


<?php 
include_once 'core/footer.php';
?>