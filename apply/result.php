<?php
require_once 'dbconnect.php';
require 'steamauth/steamauth.php';
include ('steamauth/userInfo.php');

if(!isset($_SESSION['steamid'])) {
  header("Location: index.php");
}

$sql = "SELECT steamid,status FROM apps WHERE steamid = '".$steamprofile['steamid']."'";
$result = $conn->query($sql);

$num_rows = mysqli_num_rows($result);
if ($num_rows != 1) {
  header("Location: app.php");
}
while($row = $result->fetch_assoc()) {
  $status = $row['status'];
}

if ($status == "Pending") {
  $badgestatus = "warning";
} elseif ($status == "Approved") {
  header("Location: http://www.evo-network.net/evostaff/");
} elseif ($status == "Declined") {
  $badgestatus = "danger";
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

			<iframe width="560" height="500"></iframe>

			<div class="contact100-more flex-col-c-m" style="background-image: url('images/bg-01.jpg');">
			<img src="<?php echo($steamprofile['avatarfull']); ?>"></img>
			<hr>
				<div class="flex-w size1 p-b-47">
					
					<div class="flex-col size2">
						<span class="txt1 p-b-20">
						</span>
						<span class="txt1 p-b-20">
							Staff Enrolment Complete
						</span>
						<span class="txt1 p-b-20">
							Enrolment Status : <span class="badge badge-<?php echo($badgestatus); ?>"><?php echo($status); ?></span></a>
						</span>
						<a href="logout.php" class="btn btn-danger btn-lg" role="button" aria-pressed="true">Logout</a>
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