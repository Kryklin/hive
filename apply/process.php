<?php
require_once 'dbconnect.php';
require 'steamauth/steamauth.php';
include ('steamauth/userInfo.php');

# IPv4 API CALL

function IP_CHECK_FLAG($ip) {
	$IP_LOOPKUP = "http://api.ipstack.com/$ip?access_key=$key&output=xml";
	$xml = simplexml_load_file($IP_LOOPKUP);
	$result = $xml->location->country_flag;
	
	return $result;
}

function IP_CHECK_CONT($ip) {
	$IP_LOOPKUP = "https://ipapi.co/$ip/xml";
	$xml = simplexml_load_file($IP_LOOPKUP);
	$result = $xml->continent_code;
	
	return $result;
}

function IP_CHECK_COUNT($ip) {
	$IP_LOOPKUP = "https://ipapi.co/$ip/xml";
	$xml = simplexml_load_file($IP_LOOPKUP);
	$result = $xml->country_name;
	
	return $result;
}

function IP_CHECK_REG($ip) {
	$IP_LOOPKUP = "https://ipapi.co/$ip/xml";
	$xml = simplexml_load_file($IP_LOOPKUP);
	$result = $xml->region;
	
	return $result;
}

function IP_CHECK_LANG($ip) {
	$IP_LOOPKUP = "https://ipapi.co/$ip/xml";
	$xml = simplexml_load_file($IP_LOOPKUP);
	$result = $xml->languages;
	return $result;
}

function IP_CHECK_GDPR($ip) {
	$IP_LOOPKUP = "https://ipapi.co/$ip/xml";
	$xml = simplexml_load_file($IP_LOOPKUP);
	$result = $xml->is_eu;
	
	if ($result == "True") {
		$result = "EU Country [GDPR - Required]";
	} else {
		$result = "Non EU Country [Check Local Data Laws]";
	}		
	
	return $result;
}

function IP_CHECK_ISP($ip) {
	$IP_LOOPKUP = "https://ipapi.co/$ip/xml";
	$xml = simplexml_load_file($IP_LOOPKUP);
	$result = $xml->org;
	return $result;
}

function IP_CHECK_CITY($ip) {
	$IP_LOOPKUP = "https://ipapi.co/$ip/xml";
	$xml = simplexml_load_file($IP_LOOPKUP);
	$result = $xml->city;
	return $result;
}

# Steam Variables
$steamid = $steamprofile['steamid'];
$personaname = $steamprofile['personaname'];
$profileurl = $steamprofile['profileurl'];
$avatar = $steamprofile['avatar'];
$avatarmedium = $steamprofile['avatarmedium'];
$avatarfull = $steamprofile['avatarfull'];
$communityvisibilitystate = $steamprofile['communityvisibilitystate'];
$profilestate = $steamprofile['profilestate'];
$lastlogoff = $steamprofile['lastlogoff'];
$realname = $steamprofile['realname'];
$primaryclanid = $steamprofile['primaryclanid'];
$timecreated = $steamprofile['timecreated'];
# User Variables
$timestamp = time();
$ip = $_SERVER['REMOTE_ADDR'];
$email = $_GET['email'];
$dob = $_GET['dob'];
$enjinid = $_GET['enjinid'];
$status = "Pending";
$staffcode = $_GET['staffcode'];
$evoname = $_GET['evoname'];
# IP Variables
$ip_flag = IP_CHECK_FLAG($ip);
$ip_cont = IP_CHECK_CONT($ip);
$ip_count = IP_CHECK_COUNT($ip);
$ip_reg = IP_CHECK_REG($ip);
$ip_lang = IP_CHECK_LANG($ip);
$ip_gdpr = IP_CHECK_GDPR($ip);
$ip_isp = IP_CHECK_ISP($ip);
$ip_city = IP_CHECK_CITY($ip);

$sql = "INSERT INTO apps(steamid,personaname,profileurl,avatar,avatarmedium,avatarfull,communityvisibilitystate,profilestate,lastlogoff,realname,primaryclanid,timecreated,timestamp,ip,email,dob,enjinid,status,ip_flag,ip_cont,ip_count,ip_reg,ip_lang,ip_gdpr,ip_isp,ip_city,staff_code,evo_name) VALUES ('$steamid','$personaname','$profileurl','$avatar','$avatarmedium','$avatarfull','$communityvisibilitystate','$profilestate','$lastlogoff','$realname','$primaryclanid','$timecreated','$timestamp','$ip','$email','$dob','$enjinid','$status','$ip_flag','$ip_cont','$ip_count','$ip_reg','$ip_lang','$ip_gdpr','$ip_isp','$ip_city','$staffcode','$evoname')";
$result = $conn->query($sql);

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<title>2ATF Application</title>
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
	<meta http-equiv="refresh" content="2;url=result.php" />
</head>
<body>


	<div class="container-contact100">
		<div class="wrap-contact100">

			<img src="https://media.giphy.com/media/IiQSdjgt0OKRy/giphy.gif"></img>

			<div class="contact100-more flex-col-c-m" style="background-image: url('images/bg-01.jpg');">
			<img src="<?php echo($steamprofile['avatarfull']); ?>"></img>
			<hr>
				<div class="flex-w size1 p-b-47">
					
					<div class="flex-col size2">
						<span class="txt1 p-b-20">
						<?php echo($steamprofile['personaname']); ?>
						</span>
						<span class="txt1 p-b-20">
							Processing Application
						</span>
						<span class="txt1 p-b-20">
							Please Wait
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