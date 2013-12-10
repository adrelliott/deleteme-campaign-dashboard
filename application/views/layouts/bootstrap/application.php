<?php 
	//Load the right header
	include (APPPATH . 'views/partials/bootstrap/_common/_header.php');

	//Load the navbar 
	include (APPPATH . 'views/partials/bootstrap/_common/_navbar_app.php');

	//Load the body
    ?>
    <!-- Begin page content -->
    <div class="container">
        <?= $yield; ?>
    <!-- End page content -->
    </div>
    <?
    
    //finally include the footer
	include (APPPATH . 'views/partials/bootstrap/_common/_footer.php');