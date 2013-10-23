<div class="row"><!-- Page Row-->
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><!-- Cotaining Column -->

		<div class="row">
			<div class="col-xs-12 hidden-lg hidden-md hidden-sm visible-xs">
				<a href="<?= site_url('contacts/create'); ?>" class="btn btn-primary btn-lg pull-right">Create New Contact</a>
			</div>
		</div>

		<div class="row"><!-- Top line -->
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
				<div class="page-header">
					<h1><i class="icon-user"></i> {Page Title}</h1>
					<p class="lead">Subhead subhead subhead subhead subheadsubhe adsubhea dsubhead subhead</p>	
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 hidden-xs">
				<div class="page-header border-none">
					<div class="btn-group pull-right">
						<div class="btn-group btn-block">
							<button type="button" class="btn btn-lg btn-success btn-block2 btn-justified dropdown-toggle " data-toggle="dropdown">
								So, Al. What now? <span class="caret"></span>
							</button>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#"><p>Add a New Contact</p></a></li>
								<li class="divider"></li>
								<li><a href="#"><p>Another action</p></a></li>
								<li class="divider"></li>
								<li><a href="#"><p>Something else here</p></a></li>
								<li class="divider"></li>
								<li><a href="#"><p>Separated link</p></a></li>
							</ul>
						</div>
					</div>	
				</div>
			</div>
		</div><!-- /Top line -->

		<div class="row">
			<div class="alert alert-dismissable alert-danger col-lg-8 col-md-10 col-sm-12 col-xs-12">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4>Oh Bum.</h4>
				I've looked everywhere and just can't find what you're looking for. I'm really sorry.
			</div>	
		</div>

		<div class="row"><!-- Main table-->
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
		</div> <!-- /Main table-->

		<div class="row">
			<div class="col-md-3 col-md-offset-9 col-sm-12 col-xs-12">
				<a href="<?= site_url('contacts/create'); ?>" class="btn btn-success btn-lg pull-right">Create New Contact</a>
			</div>
		</div>

	</div><!-- /Containing column-->
</div><!-- /Page Row-->