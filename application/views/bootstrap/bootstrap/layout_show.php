<div class="row">
	<div class="col-md-12">
		<div class="page-header">
        	<h1 id="tables"><i class="icon-user"></i> Page Header</h1>
        	<p class="lead">Subhead subhead subhead subhead subhead subhead subhead subhead subhead</p>
      	</div>

      	<div class="alert alert-dismissable alert-danger">
      		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      		<h4>Oh Bum.</h4>
      		I've looked everywhere and just can't find what you're looking for. I'm really sorry.
      	</div>

		<div class="row clearfix">
			<table class="table DataTable" table-id="contact-table" id="contact-table" data-source="<?php echo site_url('ajax/contacts/get_table/id/first_name/last_name/owner_id'); ?>" data-link="<?php echo site_url() . 'contacts/show/'; ?>" link-class="test test2" sScrollY="400">
		        <thead>
			        <tr>
			           	<th>Id</th>
			            <th>First Name</th>
			            <th>Last Name</th>
			            <th>Owner Id</th>
			        </tr>
		        </thead>
		    </table>	
		</div>
      	<div class="row ">
      		<div class="col-md-3 col-md-offset-9">
		        <a href="<?= site_url('contacts/create'); ?>">
		        	<button type="button" class="btn btn-primary pull-right">
		        		Create New Contact
		        	</button>
		        </a>
      		</div>
      	</div>

	</div>
</div>