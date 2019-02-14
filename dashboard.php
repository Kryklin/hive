<?php 
include_once 'core/header.php';
include_once 'core/navbar.php';

$sql = "SELECT * FROM memdb WHERE steamid = $logged_id";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {

?>



    <main class="mdl-layout__content">
	
	    <div class="mdl-grid mdl-grid--no-spacing">

            <div class="mdl-grid mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone mdl-cell--top">

				<div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
				</div>
			    <div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
                    <div class="mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title mdl-card--expand">
							<div class="mdl-grid center-items">
								<h2 class="mdl-card__title-text">Staff Profile</h2>
							</div>
                        </div>
                        <div class="mdl-card__supporting-text">
                            <div>
								<center>
									<img src="<?php echo($user_avatar_full); ?>" >
									<hr>
								</center>
								Username : <span class="label label--mini background-color--warning"><?php echo($evo_name_active); ?></span>
								<br>
								<br>
								Rank : <span class="label label--mini background-color--grpid_<?php echo($row['grp']); ?>"><?php echo(grp_name_conv($row['grp'])); ?></span>
								<br>
								<br>
								Rank Description : <span class="label label--mini background-color--deep-blue"><?php echo(grp_desc_conv($row['grp'])); ?></span>
								<br>
								<br>
								Staff Code : <span class="label label--mini background-color--success"><?php echo($row['staff_code']); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
				</div>
<?php } 
$sql = "SELECT * FROM memdb WHERE steamid = $logged_id";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {


?>
				<div class="mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-tablet mdl-cell--2-col-phone">
				</div>
				<div class="mdl-cell mdl-cell--8-col-desktop mdl-cell--8-col-tablet mdl-cell--2-col-phone">
                    <div class="mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title mdl-card--expand">
							<div class="mdl-grid center-items">
								<h2 class="mdl-card__title-text">Staff Roster</h2>
							</div>
                        </div>
                        <div class="mdl-card__supporting-text">
                            <div>
								<table class="mdl-data-table  mdl-data-table--selectable mdl-shadow--2dp projects-table">
									<thead>
									<tr>
										<th class="mdl-data-table__cell--non-numeric">Avatar</th>
										<th class="mdl-data-table__cell--non-numeric">Username</th>
										<th class="mdl-data-table__cell--non-numeric">Group</th>
										<th class="mdl-data-table__cell--non-numeric">Staff Code</th>
									</tr>
									</thead>
									<tbody>
									<?php

									$sql = "SELECT * FROM memdb ORDER BY CAST(grp AS unsigned)";
									$result = $conn->query($sql);

									while($row = $result->fetch_assoc()) {
													
									?>
								
										<tr>
											<td class="mdl-data-table__cell--non-numeric">
												<img width="12%" src="<?php echo($row['avatar']); ?>" >
											</td>
											<td class="mdl-data-table__cell--non-numeric">
												<span class="label label--mini background-color--deep-blue"><?php echo($row['evo_name']); ?></span>
											</td>
											<td class="mdl-data-table__cell--non-numeric">
												<span class="label label--mini background-color--grpid_<?php echo($row['grp']); ?>"><?php echo(grp_name_conv($row['grp'])); ?></span>
											</td>
											<td class="mdl-data-table__cell--non-numeric">
												<span class="label label--mini background-color--success"><?php echo($row['staff_code']); ?></span>
											</td>
										</tr>
									<?php } ?>
									</tbody>
								</table>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-tablet mdl-cell--2-col-phone">
				</div>
			</div>
        </div>

    </main>


<?php 
}
include_once 'core/footer.php';
?>

