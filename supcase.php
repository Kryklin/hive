<?php 
include_once 'core/header.php';
include_once 'core/navbar.php';

$sql = "SELECT * FROM memdb WHERE steamid = $logged_id";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {

?>



    <main class="mdl-layout__content">
	
	    <div class="mdl-grid mdl-grid--no-spacing">

            <div class="mdl-grid mdl-cell mdl-cell--9-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone mdl-cell--top">

				<div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
				</div>
			    <div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
                    <div class="mdl-card mdl-shadow--2dp">
					<center>
                        <div class="mdl-card__title mdl-card--expand">
                            <h2 class="mdl-card__title-text">Support Case</h2>
                        </div>
                        <div class="mdl-card__supporting-text">
							<label for="suspend_btn">Create Support Case</label><br><button  onclick="window.location.href='<?php echo("createcase.php");?>'" name="suspend_btn" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored-green"><i class="material-icons">library_add</i></button>
                        </div>
					</center>
                    </div>
                </div>
							
			</div>
        </div>

    </main>


<?php 
}
include_once 'core/footer.php';
?>

