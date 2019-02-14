<?php 
include_once 'core/header.php';
include_once 'core/navbar.php';


if (!in_array("SUPMAN", $access_array)) {
	header("Location: dashboard.php");
	die();
}

$caseid = $_GET['caseid'];

$sql = "SELECT * FROM cases WHERE id = '$caseid'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	
	$staffid_array = unserialize($row['staff_id']);

?>

    <script>
		$(document).ready(function() {
			var text_max = 150;
			$('#textarea_feedback').html(text_max + ' Characters Remaining');

			$('#comment').keyup(function() {
				var text_length = $('#comment').val().length;
				var text_remaining = text_max - text_length;

				$('#textarea_feedback').html(text_remaining + ' Characters Remaining');
			});
		});
    </script>


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
							Member Requesting Support : <a href="<?php echo("https://www.evo-network.co.uk/profile/".$row['case_subject']); ?>" target="_blank"><span class="label label--mini background-color--deep-blue"><?php echo("https://www.evo-network.co.uk/profile/".$row['case_subject']); ?></span></a>
							<hr>
							<center>
							Case Owner <br><br><span class="label label--mini background-color--deep-blue"><?php echo(app_steamid_convert($row['owner_id'])); ?></span><br><br><img width="6%" src="<?php echo(get_avatar($row['owner_id'])); ?>" >
							</center>
							<hr>
							Case Type : <span class="label label--mini background-color--deep-blue"><?php echo(case_type_conv($row['type'])); ?></span>
							<br>
							<br>
							Timestamp : <?php echo($row['timestamp']); ?>
							<br>
							<br>
							Comment : <?php echo($row['comment']); ?>
							<br>
							<br>
							Staff Involved :	<?php foreach($staffid_array as $value){echo $value . ",";}?>
                        </div>
						<div class="mdl-card__actions">
							<center>
								<form method="get" action="changecasestatus.php">
									<input hidden type="text" name="caseid" value="<?php echo($caseid); ?>">
									<div id="rank_select" class="mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label">
										<select id="selection" name="selection" class="mdl-selectfield__select">
											<option selected value='Closed'>Closed</option>
										</select>
										<label for="selection" class="mdl-selectfield__label">Case Status</label>
									</div>
									<div class="mdl-textfield mdl-js-textfield extrawide">
										<textarea required maxlength="150" id="comment" name="comment" class="mdl-textfield__input" type="text" rows= "2" width="200%"></textarea>
										
										<label class="mdl-textfield__label" for="comment">Case Closure Comment *</label>
									</div>
									<br>
									<button <?php echo($btn_lock); ?> type="submit" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored-green"><i class="material-icons">done</i>						
								</form>
								</button><button onclick="window.location.href='<?php echo("viewcase.php?caseid=$caseid");?>'" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored-red"><i class="material-icons">clear</i></button>
							</center>
                        </div>
					<div class="mdl-card__supporting-text">
						<b><div id="textarea_feedback"></div></b>
                    </div>
                    </div>
                </div>
        </div>

    </main>				

<?php 
}
include_once 'core/footer.php';
?>