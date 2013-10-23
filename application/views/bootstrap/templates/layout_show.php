<div class="row"><!-- Encosing Row -->
	<div class="col-md-12"><!-- 12 columns -->

		<? 	//Set up the create view here....
			if(strtolower($this->uri->segment(2) == 'create')): ?>
			<div class="row">
				<div class="col-lg-8 col-md-10 col-sm-10 col-xs-12">
				<div class="page-header">
					<h1><i class="icon-user"></i> {Page Title}</h1>
	        		<p class="lead">Subhead subhead subhead subhead subheadsubhe adsubhea dsubhead subhead</p>	
				</div>
      		</div>	
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"><!-- Column 1-->
					<div class="well">
						<h3>Add your newest friend here...</h3>
						<form class="form" role="form">
							<? $template->load_partial('_form_create'); ?>
							<div class="form-group col-lg-12 col-md-12 col-sm-12">
								<button type="submit" class="btn btn-success pull-right"><i class="icon-ok"></i> Save & Add More Detail</button>
							</div>
						</form>
						<div class="row"></div>
					</div>
				</div><!-- /Column 1-->
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"><!-- Column 2-->
					
				</div><!-- /Column 2-->
			</div>
		<? else : 
			//...else show this view here (the 'show' view)	
		?>

		<div class="row">
			<div class="col-xs-12 hidden-lg hidden-md hidden-sm visible-xs">
      			<div class="btn-group btn-block">
					<button type="button" class="btn btn-lg btn-success btn-block2 btn-justified dropdown-toggle " data-toggle="dropdown">
						So, Al. What now? <span class="caret"></span>
					</button>
					<ul class="dropdown-menu" role="menu">
						<li><a href="#"><h3>Action</h3></a></li>
						<li><a href="#"><h3>Another action</h3></a></li>
						<li><a href="#"><h3>Something else here</h3></a></li>
						<li class="divider"></li>
						<li><a href="#"><h3>Separated link</h3></a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row"><!-- Top line -->
			<div class="col-lg-8 col-md-10 col-sm-10 col-xs-12">
				<div class="page-header">
					<h1><i class="icon-user"></i> {Page Title}</h1>
	        		<p class="lead">Subhead subhead subhead subhead subheadsubhe adsubhea dsubhead subhead</p>	
				</div>
      		</div>
      		<div class="col-lg-4 col-md-2 col-sm-2 visible-lg visible-md visible-sm hidden-xs">
      			<div class="page-header border-none">
	      			<div class="btn-group pull-right">
						<button type="button" class="btn btn-lg btn-success dropdown-toggle" data-toggle="dropdown">
							So, Al. What now? <span class="caret"></span>
						</button>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><h3>Action</h3></a></li>
							<li><a href="#"><h3>Another action</h3></a></li>
							<li><a href="#"><h3>Something else here</h3></a></li>
							<li class="divider"></li>
							<li><a href="#"><h3>Separated link</h3></a></li>
						</ul>
					</div>	
      			</div>
      		</div>
		</div><!-- /Top line -->

		<div class="row"><!-- Main Content-->
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><!-- Column 1-->
				<div class="well"><!-- Well -->

				<!-- Pills -->
					<ul class="nav nav-pills"><!-- Pill Navigation -->
  						<li class="active hidden-sm hidden-xs"><a href="#overview" data-toggle="tab">Overview</a></li>
  						<li class=" hidden-sm hidden-xs"><a href="#indepth" data-toggle="tab">In-Depth</a></li>
  						<li class=" hidden-sm hidden-xs"><a href="#optins" data-toggle="tab">Opt-ins</a></li>
   						<li class=" hidden-sm hidden-xs"><a href="#notes" data-toggle="tab">Notes</a></li>
   						<li class=" hidden-sm hidden-xs"><a href="#links" data-toggle="tab">Links</a></li>
					</ul><!-- /Pill Navigation -->

					<ul class="nav nav-pills nav-stacked hidden-lg hidden-md visible-sm visible-xs"><!-- nav for Phones and small tablets -->
						<li class="dropdown active hidden-lg hidden-md visible-sm visible-xs">
							<a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown"><h3>See more details... <b class="caret"></b></h3></a>
					        <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">
					            <li class=" hidden-lg hidden-md"><a href="#overview" data-toggle="tab"><h3>Overview</h3></a></li>
					            <li class=" hidden-lg hidden-md"><a href="#indepth" data-toggle="tab"><h3>In-Depth</h3></a></li>
					            <li class=" hidden-lg hidden-md"><a href="#optins" data-toggle="tab"><h3>Opt-Ins</h3></a></li>
					            <li class=" hidden-lg hidden-md"><a href="#notes" data-toggle="tab"><h3>Notes</h3></a></li>
					            <li class=" hidden-lg hidden-md"><a href="#links" data-toggle="tab"><h3>Links</h3></a></li>
					        </ul>
					    </li>
					</ul><!-- /nav for Phones and small tablets -->

				    <div class="tab-content"><!-- Tab Content -->   
				      
						<div class="tab-pane active" id="overview">
							<p class="lead hidden-sm hidden-xs">Read more by clicking the blue tabs!</p>
						   	<div class="row">
						   		<form class="form" role="form">
							   		<? $template->load_partial('_form_create');?>
							   		<div class="form-group col-lg-12 col-md-12 col-sm-12">
							   			<button type="submit" class="btn btn-success btn-lg pull-right"><i class="icon-ok"></i> Save</button>
							   		</div>
							   	<!-- form tag ended further on down the page-->	
						   	</div>
						   	<div class="row">
						   		<a class="text-danger" href="#" >Delete {Firstname}...</a>
						   	</div>

						</div>

						<div class="tab-pane" id="indepth">
							<p class="lead">All about {Firstname}</p>
							<? $template->load_partial('_form_in_depth');?>
							<div class="row">
								<div class="form-group col-lg-12 col-md-12 col-sm-12">
									<button type="submit" class="btn btn-success btn-lg pull-right"><i class="icon-ok"></i> Save</button>
								</div>	
							</div>
						</div>
						
						<div class="tab-pane" id="optins">
							<p class="lead">Opt=ins for {Firstname}</p>
						    <? $template->load_partial('_form_opt_in');?>
						    <div class="row">
						    	<div class="form-group col-lg-12 col-md-12 col-sm-12">
						    		<button type="submit" class="btn btn-success btn-lg pull-right"><i class="icon-ok"></i> Save</button>
						    	</div>	
						    </div>
							</form><!-- Ending form tag opened in tab-pane 1-->
						</div>

						<div class="tab-pane" id="notes">
							<p class="lead">Notes on {Firstname}</p>
						    <h1>Notes</h1>
						    <code>Put Notes here</code>
						</div>

						<div class="tab-pane" id="links">
							<p class="lead">Who else knows {Firstname}?</p>
						    <h1>`realtionships</h1>
						    <code>Put Notes here</code>
						</div>
				    
				    </div><!-- /Tab Content -->
				<!-- /Pills -->

				
				
				</div><!-- /Well -->   
			</div><!-- /Column 1-->
			
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><!-- Column 2-->

			<!-- Pills -->
				<div class="align_with_well"><!-- Align with well -->

					<ul class="nav nav-pills"><!-- Pill Navigation -->
							<li class="active hidden-sm hidden-xs"><a href="#tasks" data-toggle="tab">tasks</a></li>
							<li class=" hidden-sm hidden-xs"><a href="#orders" data-toggle="tab">Orders</a></li>
							<li class=" hidden-sm hidden-xs"><a href="#roles" data-toggle="tab">Roles</a></li>
							<li class=" hidden-sm hidden-xs"><a href="#tags" data-toggle="tab">Tags</a></li>
							<li class=" hidden-sm hidden-xs"><a href="#leads" data-toggle="tab">Leads</a></li>
					</ul><!-- /Pill Navigation -->

					<ul class="nav nav-pills nav-stacked hidden-lg hidden-md visible-sm visible-xs"><!-- nav for Phones and small tablets -->
						<li class="dropdown active hidden-lg hidden-md visible-sm visible-xs">
							<a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown"><h3>See more actions... <b class="caret"></b></h3></a>
					        <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">
					            <li class=" hidden-lg hidden-md"><a href="#tasks" data-toggle="tab"><h3>Tasks</h3></a></li>
					            <li class=" hidden-lg hidden-md"><a href="#orders" data-toggle="tab"><h3>Orders</h3></a></li>
					            <li class=" hidden-lg hidden-md"><a href="#leads" data-toggle="tab"><h3>Leads</h3></a></li>
					            <li class=" hidden-lg hidden-md"><a href="#roles" data-toggle="tab"><h3>Roles</h3></a></li>
					            <li class=" hidden-lg hidden-md"><a href="#tags" data-toggle="tab"><h3>Tags</h3></a></li>
					        </ul>
					    </li>
					</ul><!-- /nav for Phones and small tablets -->

				</div><!-- /Align with well -->

			    <div class="tab-content"><!-- Tab Content -->   
			      
					<div class="tab-pane active" id="tasks">
						<div class="row clearfix">
							<? $this->load->view('partials/' . $this->config->item('layout_folder')  . '/_' . $this->router->class . '/_sample_table');?>
						</div>
				      	<div class="row ">
				      		<div class="col-md-3 col-md-offset-9">
						        <a href="<?= site_url('contacts/create'); ?>">
						        	<button type="button" class="btn btn-primary pull-right">Create New Task</button>
						        </a>
				      		</div>
				      	</div>
					</div>

					<div class="tab-pane" id="orders">
						<div class="row clearfix">
							<? $this->load->view('partials/' . $this->config->item('layout_folder')  . '/_' . $this->router->class . '/_sample_table');?>
						</div>
				      	<div class="row ">
				      		<div class="col-md-3 col-md-offset-9">
						        <a href="<?= site_url('contacts/create'); ?>">
						        	<button type="button" class="btn btn-primary pull-right">Create New Order</button>
						        </a>
				      		</div>
				      	</div>
					</div>
					
					<div class="tab-pane" id="roles">
					   	<div class="row clearfix">
							<? $this->load->view('partials/' . $this->config->item('layout_folder')  . '/_' . $this->router->class . '/_sample_table');?>
						</div>
				      	<div class="row ">
				      		<div class="col-md-3 col-md-offset-9">
						        <a href="<?= site_url('contacts/create'); ?>">
						        	<button type="button" class="btn btn-primary pull-right">Create New Role</button>
						        </a>
				      		</div>
				      	</div>
					</div>

					<div class="tab-pane" id="leads">
					    <div class="row clearfix">
							<? $this->load->view('partials/' . $this->config->item('layout_folder')  . '/_' . $this->router->class . '/_sample_table');?>
						</div>
				      	<div class="row ">
				      		<div class="col-md-3 col-md-offset-9">
						        <a href="<?= site_url('contacts/create'); ?>">
						        	<button type="button" class="btn btn-primary pull-right">Create New Lead</button>
						        </a>
				      		</div>
				      	</div>
					</div>

					<div class="tab-pane" id="tags">
					    <div class="row clearfix">
							<? $this->load->view('partials/' . $this->config->item('layout_folder')  . '/_' . $this->router->class . '/_sample_table');?>
						</div>
				      	<div class="row ">
				      		<div class="col-md-3 col-md-offset-9">
						        <a href="<?= site_url('contacts/create'); ?>">
						        	<button type="button" class="btn btn-primary pull-right">Create New Tag</button>
						        </a>
				      		</div>
				      	</div>
					</div>
				    
				</div><!-- /Tab Content -->
			<!-- /Pills -->

			</div><!-- /Column 2-->
		<? endif; ?>
		</div><!-- /Main Content-->

	</div><!-- /12 columns -->
</div><!-- /Enclosing row -->

<? dump($template); ?>