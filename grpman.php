<?php 
include_once 'core/header.php';
include_once 'core/navbar.php';


if (!in_array("GRPMAN", $access_array)) {
	header("Location: dashboard.php");
	die();
}
?>



    <main class="mdl-layout__content">
	
	    <div class="mdl-grid mdl-grid--no-spacing">

            <div class="mdl-grid mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone mdl-cell--top">
				<div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
				</div>
			    <div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
                    <div class="mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title mdl-card--expand">
                            <h2 class="mdl-card__title-text">Groups</h2>
                        </div>
                        <div class="mdl-card__supporting-text">
							<table class="mdl-data-table  mdl-data-table--selectable mdl-shadow--2dp projects-table">
								<thead>
								<tr>
									<th class="mdl-data-table__cell--non-numeric">Username</th>
									<th class="mdl-data-table__cell--non-numeric">Icon</th>
									<th class="mdl-data-table__cell--non-numeric">Description</th>
								</tr>
								</thead>
								<tbody>
								<?php

								$sql = "SELECT * FROM grp ORDER BY CAST(id AS unsigned)";
								$result = $conn->query($sql);

								while($row = $result->fetch_assoc()) {
									
									$grpid = $row['id'];
								
								?>
							
									<tr>
										<td class="mdl-data-table__cell--non-numeric">
											<span class="label label--mini background-color--grpid_<?php echo($row['id']); ?>"><?php echo($row['name']); ?></span>
										</td>
										<td class="mdl-data-table__cell--non-numeric"><img width="40%" src="<?php echo($row['image']); ?>"></td>
										<td class="mdl-data-table__cell--non-numeric"><?php echo($row['desc']); ?></td>
									</tr>
								<?php } ?>
								</tbody>
							</table>
                        </div>
                    </div>
                </div>
				<div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
				</div>
			</div>
        </div>

    </main>


<?php 
include_once 'core/footer.php';
?>