<?php 
include_once 'core/header.php';
include_once 'core/navbar.php';


if (!in_array("PLRMAN", $access_array)) {
	header("Location: dashboard.php");
	die();
}

$steamid = $_GET['steamid'];

$sql = "SELECT * FROM players WHERE playerid = '$steamid'";
$result = $conn2->query($sql);
while($row = $result->fetch_assoc()) {
?>

    <main class="mdl-layout__content">
	
	    <div class="mdl-grid mdl-grid--no-spacing">
			<div class="mdl-grid mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-cell--top">
			</div>
            <div class="mdl-grid mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-cell--top">
				<div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--2-col-phone">
                    <div class="mdl-card mdl-shadow--2dp" style="overflow: inherit; z-index: 1;">
                        <div class="mdl-card__title mdl-card--expand">
                           <h2 class="mdl-card__title-text"><?php echo($row['name']); ?></h2>
                        </div>					
                        <div class="mdl-card__supporting-text">
							<h5>SteamID </h5><?php echo($row['playerid']); ?>
							<h5>dbID </h5><?php echo($row['uid']); ?>
							<h5>Date Joined </h5><?php echo($row['timejoined']); ?>
							<h5>Last Updated </h5><?php echo($row['timeupdated']); ?>
                        </div>
						 <div class="mdl-card__supporting-text">
							<p>Make sure <?php echo($row['name']); ?> is <u>NOT</u> in game before making any updates!!</p>
                        </div>
						<div class="mdl-card__actions mdl-card--border">
							<form action="processplayer.php" method="get">
							<input hidden type="text" name="steamid" value="<?php echo($steamid); ?>">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
									<input  maxlength="10" id="cash" name="cash" class="mdl-textfield__input" type="number" value="<?php echo($row['cash']); ?>">
									<label class="mdl-textfield__label" for="cash">Inventory Cash</label>
								</div>
								<br>
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
									<input  maxlength="10" id="bankacc" name="bankacc" class="mdl-textfield__input" type="number" value="<?php echo($row['bankacc']); ?>">
									<label class="mdl-textfield__label" for="bankacc">Bank Balance</label>
								</div> 								
								<br>
								<div id="case_type_select" class="mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label">
                                    <select id="copLevel" name="copLevel" class="mdl-selectfield__select">
                                        <option <?php if ($row['copLevel'] == '0') {echo("selected");} ?> value="0">None</option>
										<option <?php if ($row['copLevel'] == '1') {echo("selected");} ?> value="1">Rct | Cdt</option>
										<option <?php if ($row['copLevel'] == '2') {echo("selected");} ?> value="2">Ofc | Snr Ofc</option>
										<option <?php if ($row['copLevel'] == '3') {echo("selected");} ?> value="3">Cpl</option>
										<option <?php if ($row['copLevel'] == '4') {echo("selected");} ?> value="4">Sgt | CID | SWAT</option>
										<option <?php if ($row['copLevel'] == '5') {echo("selected");} ?> value="5">Lt | Cpt</option>
										<option <?php if ($row['copLevel'] == '6') {echo("selected");} ?> value="6">State Command</option>
										<option <?php if ($row['copLevel'] == '7') {echo("selected");} ?> value="7">Commissioner | SMT</option>
                                    </select>
                                    <label for="copLevel" class="mdl-selectfield__label">Police Whitelist Level</label>
                                </div>
								<div id="case_type_select" class="mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label">
                                    <select id="mediclevel" name="mediclevel" class="mdl-selectfield__select">
                                        <option <?php if ($row['mediclevel'] == '0') {echo("selected");} ?> value="0">None</option>
										<option <?php if ($row['mediclevel'] == '1') {echo("selected");} ?> value="1">Trainee | Jnr Paramedic</option>
										<option <?php if ($row['mediclevel'] == '2') {echo("selected");} ?> value="2">Paramedic | Volunteer</option>
										<option <?php if ($row['mediclevel'] == '3') {echo("selected");} ?> value="3">Snr Paramedic | Supervising Paramedic</option>
										<option <?php if ($row['mediclevel'] == '4') {echo("selected");} ?> value="4">Department Command</option>
										<option <?php if ($row['mediclevel'] == '5') {echo("selected");} ?> value="5">Medical Directors</option>
                                    </select>
                                    <label for="mediclevel" class="mdl-selectfield__label">Medic Whitelist Level</label>
                                </div>
								<div id="case_type_select" class="mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label">
                                    <select id="donatorlvl" name="donatorlvl" class="mdl-selectfield__select">
                                        <option <?php if ($row['donatorlvl'] == '0') {echo("selected");} ?> value="0">0</option>
										<option <?php if ($row['donatorlvl'] == '1') {echo("selected");} ?> value="1">1</option>
										<option <?php if ($row['donatorlvl'] == '2') {echo("selected");} ?> value="2">2</option>
										<option <?php if ($row['donatorlvl'] == '3') {echo("selected");} ?> value="3">3</option>
										<option <?php if ($row['donatorlvl'] == '4') {echo("selected");} ?> value="4">4</option>
										<option <?php if ($row['donatorlvl'] == '5') {echo("selected");} ?> value="5">5</option>
                                    </select>
                                    <label for="donatorlvl" class="mdl-selectfield__label">Donator Level</label>
                                </div>
								<div id="case_type_select" class="mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label">
                                    <select id="adminlevel" name="adminlevel" class="mdl-selectfield__select">
                                        <option <?php if ($row['adminlevel'] == '0') {echo("selected");} ?> value="0">0</option>
										<option <?php if ($row['adminlevel'] == '1') {echo("selected");} ?> value="1">1</option>
										<option <?php if ($row['adminlevel'] == '2') {echo("selected");} ?> value="2">2</option>
										<option <?php if ($row['adminlevel'] == '3') {echo("selected");} ?> value="3">3</option>
										<option <?php if ($row['adminlevel'] == '4') {echo("selected");} ?> value="4">4</option>
										<option <?php if ($row['adminlevel'] == '5') {echo("selected");} ?> value="5">5</option>
										<option <?php if ($row['adminlevel'] == '6') {echo("selected");} ?> value="6">6</option>
                                    </select>
                                    <label for="adminlevel" class="mdl-selectfield__label">Admin Level</label>
                                </div>
								<br>
								<center><button type="submit" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored-green"><i class="material-icons">done</i></button></center>
							</form>
							<center><button onclick="window.location.href='<?php echo("plrman.php");?>'" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored-red"><i class="material-icons">clear</i></button><center>
						</div>
                    </div>
                </div>		
			</div>
			<div class="mdl-grid mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-cell--top">
			</div>
        </div>

    </main>




<?php 
}
include_once 'core/footer.php';
?>