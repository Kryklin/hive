<?php 
include_once 'core/header.php';
include_once 'core/navbar.php';

if (!in_array("SUPMAN", $access_array)) {
	header("Location: dashboard.php");
	die();
}

$sql = "SELECT * FROM memdb WHERE steamid = $logged_id";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {

?>

<script>
	$(document).ready(function() {
		$('.js-example-basic-single').select2();
	});
</script>



    <main class="mdl-layout__content">
	
	    <div class="mdl-grid mdl-grid--no-spacing">

            <div class="mdl-grid mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone mdl-cell--top">
				
				<div class="mdl-cell mdl-cell--6-col-desktop mdl-cell--6-col-tablet mdl-cell--2-col-phone">
                    <div class="mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title mdl-card--expand">
                            <h2 class="mdl-card__title-text">Open Support Cases</h2>
                        </div>
                        <div class="mdl-card__supporting-text">
							<table class="mdl-data-table  mdl-data-table--selectable mdl-shadow--2dp projects-table">
								<thead>
								<tr>
									<th class="mdl-data-table__cell--non-numeric">Case ID</th>
									<th class="mdl-data-table__cell--non-numeric">Case Status</th>
									<th class="mdl-data-table__cell--non-numeric">Type</th>
									<th class="mdl-data-table__cell--non-numeric">Timestamp</th>
									<th class="mdl-data-table__cell--non-numeric">Created By</th>
									<th class="mdl-data-table__cell--non-numeric">Options</th>
								</tr>
								</thead>
								<tbody>
								<?php

								$sql = "SELECT * FROM cases WHERE status = 'Open' ORDER BY id DESC;";
								$result = $conn->query($sql);

								while($row = $result->fetch_assoc()) {
									$caseid = $row['id'];					
								?>
							
									<tr>
										<td class="mdl-data-table__cell--non-numeric"><?php echo($row['id']); ?></td>
										<td class="mdl-data-table__cell--non-numeric"><?php echo($row['status']); ?></td>
										<td class="mdl-data-table__cell--non-numeric">
											<span class="label label--mini background-color--deep-blue"><?php echo(case_type_conv($row['type'])); ?></span>
										</td>
										<td class="mdl-data-table__cell--non-numeric"><?php echo($row['timestamp']); ?></td>
										<td class="mdl-data-table__cell--non-numeric"><?php echo(app_steamid_convert($row['owner_id'])); ?></td>
										<td class="mdl-data-table__cell--non-numeric"><button  onclick="window.location.href='<?php echo("viewcase.php?caseid=$caseid");?>'" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored-white"><i class="material-icons">folder-open</i></button> </td>
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
                            <h2 class="mdl-card__title-text">Last 10 Closed Support Cases</h2>
                        </div>
						<div class="mdl-card__actions mdl-card--border">
							<form action="casequery.php" method="get">
								<font color="white">Staff case query</font> <?php draw_select2_steamid_staff () ?>
								<button  type="submit" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored-green"><i class="material-icons">done</i></button>
							</form>
						</div>
                        <div class="mdl-card__supporting-text">
							<table class="mdl-data-table  mdl-data-table--selectable mdl-shadow--2dp projects-table" style="overflow-x: auto;">
								<thead>
								<tr>
									<th class="mdl-data-table__cell--non-numeric">Case ID</th>
									<th class="mdl-data-table__cell--non-numeric">Case Status</th>
									<th class="mdl-data-table__cell--non-numeric">Type</th>
									<th class="mdl-data-table__cell--non-numeric">Timestamp</th>
									<th class="mdl-data-table__cell--non-numeric">Created By</th>
									<th class="mdl-data-table__cell--non-numeric">Options</th>
								</tr>
								</thead>
								<tbody>
								<?php

								$sql = "SELECT * FROM cases WHERE status = 'Closed' ORDER BY id DESC LIMIT 10;";
								$result = $conn->query($sql);

								while($row = $result->fetch_assoc()) {
									$caseid = $row['id'];					
								?>
							
									<tr>
										<td class="mdl-data-table__cell--non-numeric"><?php echo($row['id']); ?></td>
										<td class="mdl-data-table__cell--non-numeric"><?php echo($row['status']); ?></td>
										<td class="mdl-data-table__cell--non-numeric">
											<span class="label label--mini background-color--deep-blue"><?php echo(case_type_conv($row['type'])); ?></span>
										</td>
										<td class="mdl-data-table__cell--non-numeric"><?php echo($row['timestamp']); ?></td>
										<td class="mdl-data-table__cell--non-numeric"><?php echo(app_steamid_convert($row['owner_id'])); ?></td>
										<td class="mdl-data-table__cell--non-numeric"><button  onclick="window.location.href='<?php echo("viewcase.php?caseid=$caseid");?>'" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored-white"><i class="material-icons">folder-open</i></button> </td>
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
}
include_once 'core/footer.php';
?>
