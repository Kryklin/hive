<?php
$now = new DateTime();
require_once 'dbconnect.php';
require 'steamauth/steamauth.php';
include ('steamauth/userInfo.php');
include ('functions.php');



if(!isset($_SESSION['steamid'])) {
  header("Location: index.php");
  die();
}

$logged_id = $steamprofile['steamid'];

$sql = "SELECT * FROM memdb WHERE steamid = $logged_id";
$result = $conn->query($sql);
$num_rows = mysqli_num_rows($result);
if ($num_rows == 0) {
  header("Location: logout.php");
}

while($row = $result->fetch_assoc()) {
	
	$user_id = $row['steamid'];
	$user_name = $row['personaname'];
	$evo_name_active = $row['evo_name'];
	$user_avatar = $row['avatar'];
	$user_state = $row['state'];
	$user_group = $row['grp'];
	$user_avatar_full = $row['avatarfull'];
	
	$db_access_array = grp_access_array($row['grp']);
	$access_array = unserialize($db_access_array);
	
	if ($user_group == "9999") {
		header("Location: logout.php");
	die();
}
}
?>

<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <link rel="icon" href="favicon.ico">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Evolution Network | Staff Control Panel</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">


    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">


    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">


    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,300,100,700,900' rel='stylesheet'
          type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- inject:css -->
    <link rel="stylesheet" href="css/lib/getmdl-select.min.css">
	<link rel="stylesheet" href="css/lib/mdl-selectfield.min.css">
    <link rel="stylesheet" href="css/lib/nv.d3.css">
    <link rel="stylesheet" href="css/application.css">
	<link rel="stylesheet" href="css/custom.css">
	<link rel="stylesheet" type="text/css" href="css/loading.css"/>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="js/jquery.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:700" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css'>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

	

	
    <!-- endinject -->


</head>

<body style="font-family: 'Roboto Condensed', sans-serif;">
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header is-small-screen">
    <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
            <div class="mdl-layout-spacer"></div>

            <div class="avatar-dropdown" id="icon">
                <span><?php echo($user_name); ?></span>
                <img src="<?php echo($user_avatar); ?>">
            </div>
   

            <button id="more"
                    class="mdl-button mdl-js-button mdl-button--icon">
                <i class="material-icons">more_vert</i>
            </button>

            <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect mdl-shadow--2dp settings-dropdown"
                for="more">
                <a class="mdl-menu__item" href="logout.php">
                    Logout
                </a>
            </ul>
        </div>
    </header>