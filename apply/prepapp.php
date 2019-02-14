<?php
include_once 'core/header.php';


$steam_id = $steamprofile['steamid'];
$steam_name = $steamprofile['personaname'];
$steam_url = $steamprofile['profileurl'];
$steam_avatar = $steamprofile['avatarfull'];
$steam_real = $steamprofile['realname'];
$steam_clan = $steamprofile['primaryclanid'];
$steam_create = $steamprofile['timecreated'];
$ip = $_SERVER['REMOTE_ADDR'];
$firstname = mysqli_real_escape_string($conn,$_GET['firstname']);
$lastname = mysqli_real_escape_string($conn,$_GET['lastname']);
$name = $firstname.".".$lastname;
$email = mysqli_real_escape_string($conn,$_GET['email']);
$dob = mysqli_real_escape_string($conn,$_GET['dob']);
$armaxp = mysqli_real_escape_string($conn,$_GET['armaxp']);
$prevxp = mysqli_real_escape_string($conn,$_GET['prevxp']);
$prefrole = mysqli_real_escape_string($conn,$_GET['prefrole']);
$fullrole = mysqli_real_escape_string($conn,$_GET['fullrole']);
$rule = mysqli_real_escape_string($conn,$_GET['rule']);
$timestamp = time();
$status = "/";



$sql = "INSERT INTO applications(steam_id,steam_name,steam_url,steam_avatar,steam_real,steam_clan,steam_create,ip,name,email,dob,attend,role,exp,skill,how,timestamp,status) VALUES ('$steam_id','$steam_name','$steam_url','$steam_avatar','$steam_real','$steam_clan','$steam_create','$ip','$name','$email','$dob','$armaxp','$prevxp','$prefrole','$fullrole','$rule','$timestamp','$status')";
$result = $conn->query($sql);

?>
	<meta http-equiv="refresh" content="1;url= <?php echo("result.php"); ?>" />
    <div class="container-fluid"> 
      <!-- Title -->
      <div class="row heading-bg">
        <div class="col-lg-12">
          <center><h5 class="txt-dark">Processing Record - <?php echo($steamid); ?></h5></center>
        </div>
      </div>
	  <div class="loading-Bar"> <span class="line line-1"></span> <span class="line line-2"></span> <span class="line line-3"></span> <span class="line line-4"></span> <span class="line line-5"></span> <span class="line line-6"></span> <span class="line line-7"></span> <span class="line line-8"></span> <span class="line line-9"></span> <span class="line line-5"></span> <span class="line line-6"></span> <span class="line line-7"></span> <span class="line line-8"></span> <span class="line line-9"></span> <span class="line line-4"></span> <span class="line line-5"></span> <span class="line line-6"></span> <span class="line line-7"></span> </div>
      <!-- /Title --> 

    </div>
	
<?php
include_once 'core/footer.php';
?>