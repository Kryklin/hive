<?php 
include_once 'core/header.php';
include_once 'core/navbar.php';


if (!in_array("RPA", $access_array)) {
	header("Location: dashboard.php");
	die();
}

$steamid = $_GET['steamid'];

$sql = "SELECT * FROM memdb WHERE steamid = '$steamid'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	$enjin_id = $row['enjin_id'];
?>




    <main class="mdl-layout__content">
	
	    <div class="mdl-grid mdl-grid--no-spacing">

            <div class="mdl-grid mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone mdl-cell--top">
				<div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
				</div>
			    <div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
                    <div class="mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title mdl-card--expand">
							<h5>User Profile</h5>
                        </div>
                        <div class="mdl-card__supporting-text">
							<center>
								<img src="<?php echo($row['avatarfull']); ?>">
								<hr>
								<h5><?php echo($row['personaname']); ?></h5>
								<hr>
								<span class="label label--mini background-color--deep-blue"><?php echo($row['ip_count']); ?></span>
								<br>
								<br>
								<span class="label label--mini background-color--grpid_<?php echo($row['grp']); ?>"><?php echo(grp_name_conv($row['grp'])); ?></span>
								<br>
								<br>
								<span class="label label--mini background-color--success"><?php echo($row['staff_code']); ?></span>
							</center>
                        </div>
                    </div>
                </div>
				<div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
				</div>
				<div class="mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-tablet mdl-cell--2-col-phone">
				</div>				
				<div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
                    <div class="mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title mdl-card--expand">
							<h5>Administrative Actions</h5>
                        </div>
                        <div class="mdl-card__supporting-text">
							<label for="suspend_btn">Suspend User :</label><button  onclick="window.location.href='<?php echo("suspendmember.php?steamid=$steamid&pathname=$pathname?steamid=$steamid");?>'" name="suspend_btn" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored-red"><i class="material-icons">person_add_disabled</i></button>
							<br>
							<label for="suspend_btn">Change User Group :</label><button  onclick="window.location.href='<?php echo("changegroup.php?steamid=$steamid&pathname=$pathname?steamid=$steamid");?>'" name="suspend_btn" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored-blue"><i class="material-icons">account_box</i></button>
							<br>
							<label for="suspend_btn">Assign Staff Code :</label><button  onclick="window.location.href='<?php echo("changestaffcode.php?steamid=$steamid&pathname=$pathname?steamid=$steamid");?>'" name="suspend_btn" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored-white"><i class="material-icons">swap_horiz</i></button>
                        </div>
                    </div>
                </div>
				<div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
                    <div class="mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title mdl-card--expand">
							<h5>Profile Information</h5>
                        </div>
                        <div class="mdl-card__supporting-text">
							<label for="suspend_btn">Open Enjin Profile :</label><button  onclick="window.location.href='<?php echo("https://www.evo-network.co.uk/profile/$enjin_id");?>'" name="suspend_btn" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored-green"><i class="material-icons">gamepad</i></button>
							<br>
							<label for="suspend_btn">Open Steam Profile :</label><button  onclick="window.location.href='<?php echo("https://steamcommunity.com/profiles/$steamid");?>'" name="suspend_btn" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored-blue"><i class="material-icons">gamepad</i></button>
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