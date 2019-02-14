<?php 
include_once 'core/header.php';
include_once 'core/navbar.php';

if (!in_array("SUPMAN", $access_array)) {
	header("Location: dashboard.php");
	die();
}

$sql = "SELECT * FROM memdb WHERE steamid = $logged_id";
$result = $conn->query($sql);

$steamid = $_GET['steamid'];

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
				<div class="mdl-cell mdl-cell--3-col-desktop mdl-cell--3-col-tablet mdl-cell--2-col-phone">
				</div>
				<div class="mdl-cell mdl-cell--6-col-desktop mdl-cell--6-col-tablet mdl-cell--2-col-phone">
                    <div class="mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title mdl-card--expand">
                            <h2 class="mdl-card__title-text"><?php echo(app_steamid_convert($steamid)); ?> Support Cases</h2>
                        </div>
                        <div class="mdl-card__supporting-text">
							<center>Total Cases Complete <?php echo(staff_case_count_total($steamid));?></center>
							<br>
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

								$sql = "SELECT * FROM cases WHERE owner_id = $steamid ORDER BY id DESC;";
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
							<br>
							<center><button onclick="window.location.href='<?php echo("supmancase.php");?>'" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored-red"><i class="material-icons">clear</i></button><center>
                        </div>
                    </div>
				</div>
				<div class="mdl-cell mdl-cell--3-col-desktop mdl-cell--3-col-tablet mdl-cell--2-col-phone">
				</div>
			</div>			
		</div>


    </main>


<?php 
}
include_once 'core/footer.php';
?>