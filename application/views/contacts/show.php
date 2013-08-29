<?php $contact = new Contact_Presenter($contact);?>

<div class="container">

<h2>Example of creating Modals with Twitter Bootstrap</h2>

<p><a data-toggle="modal" href="#example" class="btn btn-primary btn-large">Launch demo modal</a></p>


    <p class="lead">Go on. Change anything you like. This is your moment. (You can do it - we believe in you).</p>
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="panel-title">Contact Details <a href="<?php echo site_url('contacts/delete/' . $contact->id()); ?>"><button class="btn btn-danger btn-xs pull-right">Delete Contact</button></a></h2>

				</div>
				<div class="panel-body">
					<div class="tabbable">
						<ul class="nav nav-tabs">
						  <li class="active">
						    <a href="#overview" data-toggle="tab">Overview</a>
						  </li>
						  <li><a href="#optins" data-toggle="tab">Opt-ins</a></li>
						  <li><a href="#notes" data-toggle="tab">Notes</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="overview">
								<br/>
								<form role="form">
									<?php 
										//Start contact form
										echo $this->messages->show();
										echo form_open('contacts/edit/' . $contact->id(), 'role="form"');
										include (APPPATH. 'views/partials/' . $this->config->item('layout_folder') . '/_contact_form.php');
										echo form_submit('', 'submit', 'class="btn btn-default pull-right"');
										echo form_close();
										//End Contact form
									?>
									//
										<div style="margin: 50px 50px">
										    <label for="search">Search: </label>
										    <input id="contact_list" type="text" data-provide="typeahead" data-source="http://data.com">
										    <input type="text" id="contact_id" >
										</div>

										//
								</form>
							</div>
							<div class="tab-pane" id="optins">
								optin
							</div>
							<div class="tab-pane" id="notes">
								<?php //dump($this->contact->users_dropdown('first_name', 'id')); ?>
							</div>
						</div>
					</div>
					<?php echo record_stat($contact); ?>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Contact Details</h3>
				</div>
				<div class="panel-body">
					<ul class="nav nav-tabs">
						<li><a href="#task" data-toggle="tab">Tasks</a></li>
						<li><a href="#email" data-toggle="tab">Emails</a></li>
						<li><a href="#note" data-toggle="tab">Note</a></li>
						<li><a href="#tweet" data-toggle="tab">Tweets</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="task">

							<div class="table-responsive">
								<table class="table DataTable" table-id="task-table" id="task-table" data-source="<?php echo site_url('ajax/contact_actions/get/id/action_type/action_subtype/owner_id?action_type=task&contact_id=' . $contact->id()); ?>" link="contacts/show/" style="width:100%">
									<thead>
										<tr>
											<th>Id</th>
											<th>Action Type</th>
											<th>Subtype</th>
											<th>Title</th>
										</tr>
									</thead>
								</table>
							</div>
							<!-- Button trigger modal -->
  							<a data-toggle="" data-target="#-task" href="contact_actions/" class="btn btn-primary btn-lg">Add a Task</a>

						</div>
						<div class="tab-pane" id="email">

							<div class="table-responsive">
								<table class="table DataTable" table-id="email-table" id="email-table" data-source="<?php echo site_url('ajax/contact_actions/get/id/action_type/action_subtype/owner_id?action_type=email&contact_id=' . $contact->id()); ?>" link="contacts/show/"  style="width:100%">
									<thead>
										<tr>
											<th>Id</th>
											<th>Action Type</th>
											<th>Subtype</th>
											<th>Title</th>
										</tr>
									</thead>
								</table>
							</div>
						</div>
						<div class="tab-pane" id="note">
							<div class="table-responsive">
								<table class="table DataTable clearfix:before" table-id="note-table" id="note-table" data-source="<?php echo site_url('ajax/contact_actions/get/id/action_type/action_subtype/owner_id?action_type=note&contact_id=' . $contact->id()); ?>" link="contacts/show/"  style="width:100%">
									<thead>
										<tr>
											<th>Id</th>
											<th>Action Type</th>
											<th>Subtype</th>
											<th>Title</th>
										</tr>
									</thead>
								</table>
							</div>
						</div>
						<div class="tab-pane" id="tweet">
							<div class="table-responsive">
								<table class="table DataTable" table-id="tweet-table" id="tweet-table" data-source="<?php echo site_url('ajax/contact_actions/get/id/action_type/action_subtype/owner_id?action_type=tweet&contact_id=' . $contact->id()); ?>" link="contacts/show/">
									<thead>
										<tr>
											<th>Id</th>
											<th>Action Type</th>
											<th>Subtype</th>
											<th>Title</th>
										</tr>
									</thead>
								</table>
							</div>
							 <a id="file_attach" data-toggle="modal" href="/contact_actions/create" data-target="#utility" class="btn">Modal 1</a><br />
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>  <!-- /row -->
</div> <!-- /container -->



<div id="utility" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h1 id="myModalLabel">Click outside modal to close it</h1>
  </div>
  <div class="modal-body" id="utility_body">
    <p>One fine body…this is getting replaced with content that comes from passed-in href</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal">Close</button>
    <button class="btn btn-primary">Save changes</button>
  </div>
</div>




<?php /*

<a data-target="#task" role="button" class="btn" data-toggle="modal">Create new task</a>

<a data-target="#note" role="button" class="btn" data-toggle="modal">Create new note</a>

<div class="modal fade " id="task" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-remote="/contact_actions/create">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Create a New Task</h3>
  </div>
  <div class="modal-body">
    <p>Hidden filed with contact id = <?php echo $contact->id(); ?></p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary">Save changes</button>
  </div>
</div>

<div class="modal fade " id="note" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-remote="/contact_actions/create">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Create note</h3>
  </div>
  div class="modal-body">
    <p>Hidden filed with contact id = <?php echo $contact->id(); ?></p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary">Save changes</button>
  </div>
</div>
*/ ?>
<div id="example" class="modal hide fade" style="display: none; ">
            <div class="modal-header">
              <a class="close" data-dismiss="modal">×</a>
              <h3>This is a Modal Heading</h3>
            </div>
            <div class="modal-body">
              <h4>Text in a modal</h4>
              <p>You can add some text here.</p>		        
            </div>
            <div class="modal-footer">
              <a href="#" class="btn btn-success">Call to action</a>
              <a href="#" class="btn" data-dismiss="modal">Close</a>
            </div>
          </div>