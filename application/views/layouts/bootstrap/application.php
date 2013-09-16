<?php 
	//Load the right header
	include (APPPATH . 'views/partials/bootstrap/_header.php');

	//Load the navbar 
	include (APPPATH . 'views/partials/bootstrap/_navbar.php');

	//Load the body
	include (APPPATH . 'views/partials/bootstrap/_body.php');
?>	

<h2>Example of creating Modals with Twitter Bootstrap</h2>  

<!-- Button trigger modal -->
  <a data-toggle="modal" href="#myModal" class="btn btn-primary btn-large">Launch demo modal</a>

  <!-- Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Modal title</h4>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <a href="#" class="btn">Close</a>
          <a href="#" class="btn btn-primary">Save changes</a>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

<?
	//finally include the footer
	include (APPPATH . 'views/partials/bootstrap/_footer.php');