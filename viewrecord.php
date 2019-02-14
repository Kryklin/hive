<?php 
include_once 'core/header.php';
include_once 'core/navbar.php';


if (!in_array("RPA", $access_array)) {
	header("Location: dashboard.php");
	die();
}

$steamid = $_GET['steamid'];

$sql = "SELECT * FROM apps WHERE steamid = '$steamid'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	
	if ($row['status'] == "Approved") {
		
		$app_lock = "disabled";
		$status_color = "success";
		$auth_hide = "";
		$auth_timestamp = $row['auth_timestamp'];
		
	} else {
		$app_lock = "";
		$auth_hide = "hidden";
		$status_color = "warning";
	}
?>



    <main class="mdl-layout__content">
	
	    <div class="mdl-grid mdl-grid--no-spacing">

            <div class="mdl-grid mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone mdl-cell--top">
				<div class="mdl-cell mdl-cell--3-col-desktop mdl-cell--3-col-tablet mdl-cell--2-col-phone">
				</div>
			    <div class="mdl-cell mdl-cell--6-col-desktop mdl-cell--6-col-tablet mdl-cell--2-col-phone">
                    <div class="mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title mdl-card--expand">
                            <h2 class="mdl-card__title-text">Staff Enrolment - <?php echo($row['evo_name']); ?></h2>
                        </div>
                        <div class="mdl-card__supporting-text">
							<center>
								<img src="<?php echo($row['avatarfull']); ?>">
								<hr>
								<h5><?php echo($row['email']); ?></h5>
								<h5><?php echo($row['dob']); ?></h5>
								<h5>Staff code : <?php echo($row['staff_code']); ?></h5>
								<h5><span class="label label--mini background-color--<?php echo($status_color); ?>"><?php echo($row['status']); ?>  <?php echo($row['auth_timestamp']); ?></span></h5>
								<div <?php echo($auth_hide); ?>>
									<h5>Authorization : <?php echo(app_steamid_convert($row['auth_id'])); ?></h5>
								</div>
								<hr>
								<button <?php echo($app_lock); ?>  onclick="window.location.href='<?php echo("approverecord.php?steamid=$steamid&pathname=$pathname?steamid=$steamid");?>'" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored-green"><i class="material-icons">done</i></button> <button <?php echo($app_lock); ?>  onclick="window.location.href='<?php echo("declinerecord.php?steamid=$steamid&pathname=$pathname?steamid=$steamid");?>'" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored-red"><i class="material-icons">clear</i></button>
							</center>
                        </div>
                    </div>
                </div>
				<div class="mdl-cell mdl-cell--3-col-desktop mdl-cell--3-col-tablet mdl-cell--2-col-phone">
				</div>
				<div class="mdl-cell mdl-cell--3-col-desktop mdl-cell--3-col-tablet mdl-cell--2-col-phone">
				</div>
				<div class="mdl-cell mdl-cell--3-col-desktop mdl-cell--3-col-tablet mdl-cell--6-col-phone">
                    <div class="mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title mdl-card--expand">
                            <h2 class="mdl-card__title-text">Authentication Checks</h2>
                        </div>
                        <div class="mdl-card__supporting-text">
								<span class="label label--mini background-color--deep-blue"><?php echo("Steam64ID : ". $row['steamid']); ?></span>
								<br>
								<br>
								<span class="label label--mini background-color--deep-blue"><?php echo($row['profileurl']); ?></span>
								<br>
								<br>
								<span class="label label--mini background-color--deep-blue"><?php echo("https://www.evo-network.co.uk/profile/". $row['enjinid']); ?></span>
								<br>
								<br>
								<span class="label label--mini background-color--deep-blue">Steam Last Log Off : <?php echo(date("F j, Y, g:i a", $row['lastlogoff'])); ?></span>
								<br>
								<br>
								<span class="label label--mini background-color--deep-blue"><?php echo("Steam Real Name : ". $row['realname']); ?></span>
								<br>
								<br>
								<span class="label label--mini background-color--deep-blue"><?php echo("Primary Clan ID : ". $row['primaryclanid']); ?></span>
								<br>
								<br>
								<span class="label label--mini background-color--deep-blue">Steam Creation Date : <?php echo(date("F j, Y, g:i a", $row['timecreated'])); ?></span>
                        </div>
                    </div>
                </div>
				<div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--3-col-tablet mdl-cell--6-col-phone">
                    <div class="mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title mdl-card--expand">
                            <h2 class="mdl-card__title-text">IP Resolver - <?php echo($row['ip']); ?></h2>
                        </div>
                        <div class="mdl-card__supporting-text">
								<span class="label label--mini background-color--danger"><?php echo("Continent : ". $row['ip_cont']); ?></span>
								<br>
								<br>
								<span class="label label--mini background-color--danger"><?php echo("Country : ". $row['ip_count']); ?></span>
								<br>
								<br>
								<span class="label label--mini background-color--danger"><?php echo("Region : ". $row['ip_reg']); ?></span>
								<br>
								<br>
								<span class="label label--mini background-color--danger"><?php echo("City : ". $row['ip_city']); ?></span>
								<br>
								<br>
								<span class="label label--mini background-color--danger"><?php echo("Data Regulation : ". $row['ip_gdpr']); ?></span>
								<br>
								<br>
								<span class="label label--mini background-color--danger"><?php echo("ISP : ". $row['ip_isp']); ?></span>
								<br>
								<br>
								<span class="label label--mini background-color--danger"><?php echo("Language : ". $row['ip_lang']); ?></span>
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