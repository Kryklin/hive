<?php 
include_once 'core/header.php';
include_once 'core/navbar.php';

if (!in_array("STAT", $access_array)) {
	header("Location: dashboard.php");
	die();
}

$sql = "SELECT * FROM memdb WHERE steamid = $logged_id";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {

?>



    <main class="mdl-layout__content">
	
	    <div class="mdl-grid mdl-grid--no-spacing">

            <div class="mdl-grid mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone mdl-cell--top">

<?php } 
$sql = "SELECT * FROM memdb WHERE steamid = $logged_id";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {

	
?>
			<div class="mdl-grid mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone mdl-cell--top">
			</div>
            <div class="mdl-grid mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone mdl-cell--top">
				<div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--2-col-phone">
                    <div class="mdl-card mdl-shadow--2dp" style="overflow: inherit; z-index: 1">
                        <div class="mdl-card__title mdl-card--expand">
							<center><h5>Case Totals</h5></center>
                        </div>
						<div class="mdl-card__supporting-text">
							<center>
								<b>Total Open Cases : </b><?php echo(case_count_open()); ?>
								<br>
								<b>Total Closed Cases : </b><?php echo(case_count_closure()); ?>
								<br>
								<b>Total Cases: </b><?php echo(case_count()); ?>
							</center>
                        </div>
                    </div>
                </div>
			</div>
				<div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--2-col-phone">
                    <div class="mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title mdl-card--expand">
							<div class="mdl-grid center-items">
								<h2 class="mdl-card__title-text">Case Creation Statistics</h2>
							</div>
                        </div>
                        <div class="mdl-card__supporting-text">
                            <div>
								<table class="mdl-data-table  mdl-data-table--selectable mdl-shadow--2dp projects-table">
									<thead>
									<tr>
										<th class="mdl-data-table__cell--non-numeric">Username</th>
										<th class="mdl-data-table__cell--non-numeric"><span class="label label--mini background-color--deep-blue">General Question Cases</span></th>
										<th class="mdl-data-table__cell--non-numeric"><span class="label label--mini background-color--deep-blue">Website Tags Cases</span></th>
										<th class="mdl-data-table__cell--non-numeric"><span class="label label--mini background-color--deep-blue">Technical Support Cases</span></th>
										<th class="mdl-data-table__cell--non-numeric"><span class="label label--mini background-color--deep-blue">Compensation Cases</span></th>
										<th class="mdl-data-table__cell--non-numeric"><span class="label label--mini background-color--deep-blue">Whitelisting Cases</span></th>
										<th class="mdl-data-table__cell--non-numeric"><span class="label label--mini background-color--deep-blue">Player Complaint Cases</span></th>
										<th class="mdl-data-table__cell--non-numeric"><span class="label label--mini background-color--deep-blue">Staff Complaint Cases</span></th>
										<th class="mdl-data-table__cell--non-numeric"><span class="label label--mini background-color--deep-blue">Teamspeak Tag Cases</span></th>
										<th class="mdl-data-table__cell--non-numeric"><span class="label label--mini background-color--deep-blue">Other Cases</span></th>
									</tr>
									</thead>
									<tbody>
									<?php

									$sql = "SELECT * FROM memdb ORDER BY CAST(grp AS unsigned)";
									$result = $conn->query($sql);

									while($row = $result->fetch_assoc()) {
										$x = $x + 1;
													
									?>
								
										<tr>
											<td class="mdl-data-table__cell--non-numeric">
												<span class="label label--mini background-color--grpid_<?php echo($row['grp']); ?>"><?php echo($row['evo_name']); ?></span>
											</td>
											<td class="mdl-data-table__cell--non-numeric"><center><?php echo(staff_case_count($row['steamid'],1)); ?></center></td>
											<td class="mdl-data-table__cell--non-numeric"><center><?php echo(staff_case_count($row['steamid'],2)); ?></center></td>
											<td class="mdl-data-table__cell--non-numeric"><center><?php echo(staff_case_count($row['steamid'],3)); ?></center></td>
											<td class="mdl-data-table__cell--non-numeric"><center><?php echo(staff_case_count($row['steamid'],4)); ?></center></td>
											<td class="mdl-data-table__cell--non-numeric"><center><?php echo(staff_case_count($row['steamid'],5)); ?></center></td>
											<td class="mdl-data-table__cell--non-numeric"><center><?php echo(staff_case_count($row['steamid'],6)); ?></center></td>
											<td class="mdl-data-table__cell--non-numeric"><center><?php echo(staff_case_count($row['steamid'],7)); ?></center></td>
											<td class="mdl-data-table__cell--non-numeric"><center><?php echo(staff_case_count($row['steamid'],8)); ?></center></td>
											<td class="mdl-data-table__cell--non-numeric"><center><?php echo(staff_case_count($row['steamid'],9)); ?></center></td>
										</tr>
									<?php } ?>
									</tbody>
								</table>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--6-col-phone">
                    <div class="mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title mdl-card--expand">
							<div class="mdl-grid center-items">
								<h2 class="mdl-card__title-text">Case Closure Statistics</h2>
							</div>
                        </div>
                        <div class="mdl-card__supporting-text">
                            <div>
								<table class="mdl-data-table  mdl-data-table--selectable mdl-shadow--2dp projects-table">
									<thead>
									<tr>
										<th class="mdl-data-table__cell--non-numeric">Username</th>
										<th class="mdl-data-table__cell--non-numeric"><span class="label label--mini background-color--deep-blue">General Question Cases</span></th>
										<th class="mdl-data-table__cell--non-numeric"><span class="label label--mini background-color--deep-blue">Website Tags Cases</span></th>
										<th class="mdl-data-table__cell--non-numeric"><span class="label label--mini background-color--deep-blue">Technical Support Cases</span></th>
										<th class="mdl-data-table__cell--non-numeric"><span class="label label--mini background-color--deep-blue">Compensation Cases</span></th>
										<th class="mdl-data-table__cell--non-numeric"><span class="label label--mini background-color--deep-blue">Whitelisting Cases</span></th>
										<th class="mdl-data-table__cell--non-numeric"><span class="label label--mini background-color--deep-blue">Player Complaint Cases</span></th>
										<th class="mdl-data-table__cell--non-numeric"><span class="label label--mini background-color--deep-blue">Staff Complaint Cases</span></th>
										<th class="mdl-data-table__cell--non-numeric"><span class="label label--mini background-color--deep-blue">Teamspeak Tag Cases</span></th>
										<th class="mdl-data-table__cell--non-numeric"><span class="label label--mini background-color--deep-blue">Other Cases</span></th>
									</tr>
									</thead>
									<tbody>
									<?php

									$sql = "SELECT * FROM memdb ORDER BY CAST(grp AS unsigned)";
									$result = $conn->query($sql);

									while($row = $result->fetch_assoc()) {
										$x = $x + 1;
													
									?>
								
										<tr>
											<td class="mdl-data-table__cell--non-numeric">
												<span class="label label--mini background-color--grpid_<?php echo($row['grp']); ?>"><?php echo($row['evo_name']); ?></span>
											</td>
											<td class="mdl-data-table__cell--non-numeric"><center><?php echo(staff_case_count_closure($row['steamid'],1)); ?></center></td>
											<td class="mdl-data-table__cell--non-numeric"><center><?php echo(staff_case_count_closure($row['steamid'],2)); ?></center></td>
											<td class="mdl-data-table__cell--non-numeric"><center><?php echo(staff_case_count_closure($row['steamid'],3)); ?></center></td>
											<td class="mdl-data-table__cell--non-numeric"><center><?php echo(staff_case_count_closure($row['steamid'],4)); ?></center></td>
											<td class="mdl-data-table__cell--non-numeric"><center><?php echo(staff_case_count_closure($row['steamid'],5)); ?></center></td>
											<td class="mdl-data-table__cell--non-numeric"><center><?php echo(staff_case_count_closure($row['steamid'],6)); ?></center></td>
											<td class="mdl-data-table__cell--non-numeric"><center><?php echo(staff_case_count_closure($row['steamid'],7)); ?></center></td>
											<td class="mdl-data-table__cell--non-numeric"><center><?php echo(staff_case_count_closure($row['steamid'],8)); ?></center></td>
											<td class="mdl-data-table__cell--non-numeric"><center><?php echo(staff_case_count_closure($row['steamid'],9)); ?></center></td>
										</tr>
									<?php } ?>
									</tbody>
								</table>
                            </div>
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

