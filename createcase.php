<?php 
include_once 'core/header.php';
include_once 'core/navbar.php';

$sql = "SELECT * FROM memdb WHERE steamid = $logged_id";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {

?>

    <script>
		$(document).ready(function() {
			var text_max = 1500;
			$('#textarea_feedback').html(text_max + ' Characters Remaining');

			$('#comment').keyup(function() {
				var text_length = $('#comment').val().length;
				var text_remaining = text_max - text_length;

				$('#textarea_feedback').html(text_remaining + ' Characters Remaining');
			});
		});
		
		$(document).ready(function() {
			$('.js-example-basic-single').select2();
		});
    </script>

    <main class="mdl-layout__content">
	
	    <div class="mdl-grid mdl-grid--no-spacing">
		<div class="mdl-grid mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-cell--top">
		</div>

            <div class="mdl-grid mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-cell--top">

				
				<div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--2-col-phone">
                    <div class="mdl-card mdl-shadow--2dp" style="overflow: inherit; z-index: 1;">
                        <div class="mdl-card__title mdl-card--expand">
                            <h2 class="mdl-card__title-text">Support Case</h2>
                        </div>
						
                        <div class="mdl-card__supporting-text">
							<p>All support cases should be logged via this form to allow the Senior Leadership Team to monitor your work.</p>
							
							When creating a case leave the case status to <b style="color:green;">Open</b> if you do not have the permissons required to complete the case. Otherwise set the case to <b style="color:red;">Closed</b>.
							<br>
							<br>
							If the case you are raising is either compensation or whitelisitng select a player entry from the database otherwise set it to N/A.
                        </div>
						<div class="mdl-card__actions mdl-card--border">
							<form action="submitcase.php" method="get">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label extrawide">
									<input maxlength="10" id="id" name="id" class="mdl-textfield__input" type="number">
									<label class="mdl-textfield__label" for="id">Member Enjin ID</label>
								</div>
								<div>
									<center>
										<font color="white">Select Player From Database</font>
										<br>
										<br>
										<?php draw_select2_steamid () ?>
									</center>
								</div>
								<br>
								<br>
								<div id="case_type_select" class="mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label extrawide">
                                    <select id="case_status" name="case_status" class="mdl-selectfield__select">
                                        <option selected value="Open">Open</option>
										<option value="Closed">Closed</option>
                                    </select>
                                    <label for="case_status" class="mdl-selectfield__label">Case Status</label>
                                </div>
                                <div id="case_type_select" class="mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label extrawide">
                                    <select id="case_type" name="case_type" class="mdl-selectfield__select">
                                        <option selected value="1">General Question</option>
										<option value="2">Website Tags</option>
										<option value="3">Technical Support</option>
										<option value="4">Compensation</option>
										<option value="5">Whitelisting</option>
										<option value="6">Player Complaint</option>
										<option value="7">Staff Complaint</option>
										<option value="8">Teamspeak Tags</option>
										<option value="9">Other</option>
                                    </select>
                                    <label for="case_type" class="mdl-selectfield__label">Case Type</label>
                                </div>
								<br>
								<div>
									<center>
										<font color="white">Select all staff involved in the case</font>
										<br>
										<br>
										<?php draw_select2_staffid () ?>
									</center>
								</div>
								<br>
								<div class="mdl-textfield mdl-js-textfield extrawide">
									<textarea required maxlength="1500" id="comment" name="comment" class="mdl-textfield__input" type="text" rows= "2" width="200%"></textarea>
									
									<label class="mdl-textfield__label" for="comment">Case Comments *</label>
								</div>
								<br>
								
								<center><button type="submit" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored-green"><i class="material-icons">done</i></button></center>
							</form>
							<center><button onclick="window.location.href='<?php echo("supcase.php");?>'" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored-red"><i class="material-icons">clear</i></button><center>
						</div>
						<div class="mdl-card__supporting-text">
							  <b><div id="textarea_feedback"></div></b>
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