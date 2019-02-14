<?php 
include_once 'core/header.php';
include_once 'core/navbar.php';

if (!in_array("LOG", $access_array)) {
	header("Location: dashboard.php");
	die();
	
}
?>


    <main class="mdl-layout__content">
	
	    <div class="mdl-grid mdl-grid--no-spacing">

            <div class="mdl-grid mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone mdl-cell--top">

				<div class="mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-tablet mdl-cell--2-col-phone">
				</div>
				<div class="mdl-cell mdl-cell--8-col-desktop mdl-cell--8-col-tablet mdl-cell--2-col-phone">
                    <div class="mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title mdl-card--expand">
							<div class="mdl-grid center-items">
								<h2 class="mdl-card__title-text">System Log</h2>
							</div>
                        </div>
                        <div class="mdl-card__supporting-text">
							<div style="overflow-y: scroll; height:800px;">
								<?php echo (user_log()); ?>
							</div>
                        </div>
                    </div>
                </div>
				<div class="mdl-cell mdl-cell--2-col-desktop mdl-cell--2-col-tablet mdl-cell--2-col-phone">
				</div>
			</div>
        </div>

    </main>


<?php 
include_once 'core/footer.php';
?>
