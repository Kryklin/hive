<?php
$now = new DateTime();
require_once 'dbconnect.php';
require 'steamauth/steamauth.php';
include ('steamauth/userInfo.php');

if(!isset($_SESSION['steamid'])) {
  header("Location: index.php");
}

$sql = "SELECT steamid FROM apps WHERE steamid = '".$steamprofile['steamid']."'";
$result = $conn->query($sql);

$num_rows = mysqli_num_rows($result);
if ($num_rows == 1) {
  header("Location: result.php");
}

if ($steamprofile['personastate'] == 1) {
	$user_status = "Online";
} elseif ($steamprofile['personastate'] == 2) {
	$user_status = "Busy";
} elseif ($steamprofile['personastate'] == 3) {
	$user_status = "Away";
} elseif ($steamprofile['personastate'] == 4) {
	$user_status = "Snooze";
} elseif ($steamprofile['personastate'] == 5) {
    $user_status = "Looking to Trade";
} elseif ($steamprofile['personastate'] == 6) {
	$user_status = "Looking to Play";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Evolution Network | Staff Enrolment</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>


	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form" method="get" action="process.php">
				<span class="contact100-form-title">
					Evolution Network | Staff Enrolment
				</span>

				<label class="label-input100" for="email">Enter your email *</label>
				<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<input id="email" class="input100" type="email" name="email" placeholder="Eg. example@email.com" required>
					<span class="focus-input100"></span>
				</div>
				<label class="label-input100" for="dob">Enter your date of birth *</label>
				<div class="wrap-input100 validate-input">
					<input id="dob" class="input100" type="date" name="dob" required>
					<span class="focus-input100"></span>
				</div>
				<label class="label-input100" for="evoname">Enter your EVO-RP Name *</label>
				<div class="wrap-input100 validate-input">
					<input id="evoname" class="input100" type="text" name="evoname" required>
					<span class="focus-input100"></span>
				</div>
				<label class="label-input100" for="dob">Enter your Enjin ID *</label>
				<div class="wrap-input100 validate-input">
					<input id="enjinid" class="input100" type="number" name="enjinid" required>
					<span class="focus-input100"></span>
				</div>
				<label class="label-input100" for="staffcode">Enter your Staff Code *</label>
				<div class="wrap-input100 validate-input">
					<input id="staffcode" class="input100" type="number" name="staffcode" required>
					<span class="focus-input100"></span>
				</div>
				<div class="container-contact100-form-btn">
					<button type="submit" class="btn btn-success btn-lg">Submit</button>
				</div>
				<div class="container-contact100-form-btn">
					<a href="logout.php" class="btn btn-danger btn-lg" role="button" aria-pressed="true">Cancel</a>
				</div>
			</form>

			<div class="contact100-more flex-col-c-m" style="background-image: url('images/bg-01.jpg');">
			<img src="<?php echo($steamprofile['avatarfull']); ?>"></img>
			<hr>
				<div class="flex-w size1 p-b-47">
					
					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							Steam Name : <?php echo($steamprofile['personaname']); ?>
						</span>

						<span class="txt2">
							SteamID64 : <?php echo($steamprofile['steamid']); ?>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>



	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>
</body>
</html>
