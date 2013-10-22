<div class="row"><!-- Encosing Row -->
	<div class="col-md-12"><!-- 12 columns -->

		<div class="row"><!-- Top line -->
			<div class="col-md-8 col-xs-6">
				<div class="page-header">
					<h1><i class="icon-user"></i> {Page Title}</h1>
	        		<p class="lead">Subhead subhead subhead subhead subhead subhead</p>	
				</div>
      		</div>
      		<div class="col-md-4 col-xs-6">
      			<div class="page-header border-none">
	      			<div class="btn-group">
						<button type="button" class="btn btn-lg btn-success dropdown-toggle" data-toggle="dropdown">
							So, Al. What now? <span class="caret"></span>
						</button>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#">Action</a></li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else here</a></li>
							<li class="divider"></li>
							<li><a href="#">Separated link</a></li>
						</ul>
					</div>	
      			</div>
      		</div>
		</div><!-- /Top line -->

		<div class="row"><!-- Main Content-->
			<div class="col-lg-7 col-md-7 col-sm-6"><!-- /Column 1-->
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
							<a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown"><h2>See more details... <b class="caret"></b></h2></a>
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
							<p class="lead">Read more by clicking the blue tabs!</p>
						    <h1>OVERVIEW</h1>
						    <code>Put form here</code>
						</div>

						<div class="tab-pane" id="indepth">
							<p class="lead">All about {Firstname}</p>
						    <h1>IN DEPTH</h1>
						    <code>Put form here</code>
						</div>
						
						<div class="tab-pane" id="optins">
							<p class="lead">Opt=ins for {Firstname}</p>
						    <h1>Optins</h1>
						    <code>Put Notes here</code>
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
			
			<div class="col-lg-5 col-md-5 col-sm-6"><!-- Column 2-->
				<div class="align_with_well"><!-- Align with well -->

					<!-- Pills -->
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
							        	<button type="button" class="btn btn-primary pull-right">
							        		Create New Task
							        	</button>
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
							        	<button type="button" class="btn btn-primary pull-right">
							        		Create New Order
							        	</button>
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
							        	<button type="button" class="btn btn-primary pull-right">
							        		Create New Role
							        	</button>
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
							        	<button type="button" class="btn btn-primary pull-right">
							        		Create New Lead
							        	</button>
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
							        	<button type="button" class="btn btn-primary pull-right">
							        		Create New Tag
							        	</button>
							        </a>
					      		</div>
					      	</div>
						</div>
				    
				    </div><!-- /Tab Content -->
					<!-- /Pills -->

			</div><!-- /Column 2-->


		</div>
		<!-- /Main Content-->

      	

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

	</div><!-- /12 columns -->
</div><!-- /Enclosing row -->



<? $table='<table class="table">
						        <thead>
							        <tr>
							           	<th>Id</th>
							            <th>Task Name</th>
							            <th>Date</th>
							            <th></th>
							        </tr>
						        </thead>
						        <tbody>
						        	<tr>
						        		<td>1</td>
						        		<td>xxxx</td>
						        		<td>1/12/01</td>
						        		<td>Del | Edit</td>
						        	</tr>
						        	<tr>
						        		<td>1</td>
						        		<td>xxxx</td>
						        		<td>1/12/01</td>
						        		<td>Del | Edit</td>
						        	</tr>
						        	<tr>
						        		<td>1</td>
						        		<td>xxxx</td>
						        		<td>1/12/01</td>
						        		<td>Del | Edit</td>
						        	</tr>
						        	<tr>
						        		<td>1</td>
						        		<td>xxxx</td>
						        		<td>1/12/01</td>
						        		<td>Del | Edit</td>
						        	</tr>
						        	<tr>
						        		<td>1</td>
						        		<td>xxxx</td>
						        		<td>1/12/01</td>
						        		<td>Del | Edit</td>
						        	</tr>
						        	<tr>
						        		<td>1</td>
						        		<td>xxxx</td>
						        		<td>1/12/01</td>
						        		<td>Del | Edit</td>
						        	</tr>
						        	<tr>
						        		<td>1</td>
						        		<td>xxxx</td>
						        		<td>1/12/01</td>
						        		<td>Del | Edit</td>
						        	</tr>
						        </tbody>
						    </table>	'; ?>