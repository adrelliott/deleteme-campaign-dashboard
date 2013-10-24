<div class="row"><!-- Encosing Row -->
  <div class="col-xs-12"><!-- 12 columns -->
    
  <?  if(strtolower($this->uri->segment(2) == 'create')): ?>
    <div class="row">
      <div class="col-lg-8 col-md-10 col-sm-10 col-xs-12">
        <div class="page-header">
          <h1><i class="fa fa-briefcase"></i> Create a Lead</h1>
          <p class="lead">Add a sales opportunity here.</p>  
        </div>
      </div>  
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"><!-- Column 1-->
      <div class="well">
        <h3>Give me the basic details...</h3>
        <form class="form" role="form">
          <?= partial('_form_create'); ?>
          <div class="form-group">
            <? //Need to turn this button into a submit!! ?>
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

    <div class="row"><!-- Top line -->
      <div class="col-lg-8 col-md-10 col-sm-10 col-xs-12">
        <div class="page-header">
          <?= partial('_page_header'); ?>
        </div>
      </div>
      <div class="col-lg-4 col-md-2 col-sm-2 visible-lg visible-md visible-sm hidden-xs">
        <div class="page-header border-none">
          <div class="btn-group pull-right">
            <button type="button" class="btn btn-lg btn-success dropdown-toggle" data-toggle="dropdown">
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
    </div><!-- /Top line -->

    <div class="row"><!-- Main Content-->
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><!-- Column 1-->
        <div class="well"><!-- Well -->
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><!-- /col-->
            
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
                <a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown"><h4>See more details... <b class="caret"></b></h4></a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">
                  <li class=" hidden-lg hidden-md"><a href="#overview" data-toggle="tab"><p>Overview</p></a></li>
                  <li class="divider"></li>
                  <li class=" hidden-lg hidden-md"><a href="#indepth" data-toggle="tab"><p>In-Depth</p></a></li>
                  <li class="divider"></li>
                  <li class=" hidden-lg hidden-md"><a href="#optins" data-toggle="tab"><p>Opt-Ins</p></a></li>
                  <li class="divider"></li>
                  <li class=" hidden-lg hidden-md"><a href="#notes" data-toggle="tab"><p>Notes</p></a></li>
                  <li class="divider"></li>
                  <li class=" hidden-lg hidden-md"><a href="#links" data-toggle="tab"><p>Links</p></a></li>
                </ul>
              </li>
            </ul><!-- /nav for Phones and small tablets -->

            <div class="tab-content"><!-- Tab Content -->   

              <div class="tab-pane active" id="overview">
                <div class="row">
                  <form class="form" role="form">
                    <legend>Brief Overview</legend>
                    <?= partial('_form_overview');?>
                    <div class="form-group">
                      <button type="submit" class="btn btn-success btn-lg pull-right"><i class="icon-ok"></i> Save</button>
                    </div>
                  <!-- form tag ended further on down the page--> 
                </div>
                <div class="row margin_top_30">
                    <div class="panel panel-default">
                    <div class="panel-body">
                      <p><b>Company Name Ltd</b>, Addres 1, Address 2, City, Postcode</p>
                      <h5>M: <a href="tel:07703333333">07703 333 333</a>, T: <a href="tel:0161 335 4545">01613354545</a>, W: <a href="tel:01904564534">01904 564 534</a>, </h5>
                    </div>
                  </div>
                  
                </div>
                <div class="row">
                  <a class="text-danger" href="#" >Delete this lead...</a>
                </div>
              </div>

              <div class="tab-pane" id="indepth">
                <div class="row">
                  <legend>Other Details</legend>
                  <?= partial('_form_in_depth');?>
                </div>
                <div class="row">
                  <div class="form-group">
                    <button type="submit" class="btn btn-success btn-lg pull-right"><i class="icon-ok"></i> Save</button>
                  </div>  
                </div>
              </div>
                
              <div class="tab-pane" id="optins">
                <div class="row">
                  <legend>Subscriptions</legend>
                  <?= partial('_form_opt_in');?> 
                </div>
                <div class="row">
                  <div class="form-group">
                    <button type="submit" class="btn btn-success btn-lg pull-right"><i class="icon-ok"></i> Save</button>
                  </div>  
                </div>
              </form><!-- Ending form tag opened in tab-pane 1-->
              </div>

              <div class="tab-pane" id="notes">
                <div class="row">
                  <legend>Notes on {firstname}</legend>
                  <?= partial('_sample_note_table'); ?>
                </div>
                <div class="row">
                  <div>
                    <a href="<?= site_url('contacts/create'); ?>" class="btn btn-success btn-lg pull-right">Create New Note</a>
                  </div>
                </div>
              </div>

              <div class="tab-pane" id="links">
                <div class="row">
                  <legend>Relationships</legend>
                  <?= partial('_sample_table'); ?>
                </div>
                <div class="row">
                  <div>
                    <a href="<?= site_url('contacts/create'); ?>" class="btn btn-success btn-lg pull-right">Create New Relationship</a>
                  </div>
                </div>
              </div>

            </div><!-- /Tab Content -->
            <!-- /Pills -->

          </div><!-- /col-->
        </div><!-- /Well -->   
      </div><!-- /Column 1-->

      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><!-- Column 2-->

        <!-- Pills -->
        <div class="align_with_well"><!-- Align with well -->

          <ul class="nav nav-pills"><!-- Pill Navigation -->
            <li class="active hidden-sm hidden-xs"><a href="#tasks" data-toggle="tab">Tasks</a></li>
            <li class=" hidden-sm hidden-xs"><a href="#orders" data-toggle="tab">Orders</a></li>
            <li class=" hidden-sm hidden-xs"><a href="#roles" data-toggle="tab">Roles</a></li>
            <li class=" hidden-sm hidden-xs"><a href="#tags" data-toggle="tab">Tags</a></li>
            <li class=" hidden-sm hidden-xs"><a href="#leads" data-toggle="tab">Leads</a></li>
          </ul><!-- /Pill Navigation -->

          <ul class="nav nav-pills nav-stacked hidden-lg hidden-md visible-sm visible-xs"><!-- nav for Phones and small tablets -->
            <li class="dropdown active hidden-lg hidden-md visible-sm visible-xs">
              <a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown"><h4>See more actions... <b class="caret"></b></h4></a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">
                <li class=" hidden-lg hidden-md"><a href="#tasks" data-toggle="tab"><p>Tasks</p></a></li>
                <li class="divider"></li>
                <li class=" hidden-lg hidden-md"><a href="#orders" data-toggle="tab"><p>Orders</p></a></li>
                <li class="divider"></li>
                <li class=" hidden-lg hidden-md"><a href="#leads" data-toggle="tab"><p>Leads</p></a></li>
                <li class="divider"></li>
                <li class=" hidden-lg hidden-md"><a href="#roles" data-toggle="tab"><p>Roles</p></a></li>
                <li class="divider"></li>
                <li class=" hidden-lg hidden-md"><a href="#tags" data-toggle="tab"><p>Tags</p></a></li>
              </ul>
            </li>
          </ul><!-- /nav for Phones and small tablets -->

        </div><!-- /Align with well -->

        <div class="tab-content"><!-- Tab Content -->   

          <div class="tab-pane active" id="tasks">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?= partial('_sample_table'); ?>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <a href="<?= site_url('contacts/create'); ?>" class="btn btn-primary pull-right">Create New Task</a>
              </div>
            </div>
          </div>

          <div class="tab-pane" id="orders">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?= partial('_sample_table'); ?>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <a href="<?= site_url('contacts/create'); ?>" class="btn btn-primary pull-right">Create New Task</a>
              </div>
            </div>
          </div>
          
          <div class="tab-pane" id="roles">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?= partial('_sample_table'); ?>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <a href="<?= site_url('contacts/create'); ?>" class="btn btn-primary pull-right">Create New Task</a>
              </div>
            </div>
          </div>

          <div class="tab-pane" id="leads">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?= partial('_sample_table'); ?>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <a href="<?= site_url('contacts/create'); ?>" class="btn btn-primary pull-right">Create New Task</a>
              </div>
            </div>
          </div>

          <div class="tab-pane" id="tags">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?= partial('_sample_table'); ?>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <a href="<?= site_url('contacts/create'); ?>" class="btn btn-primary pull-right">Create New Task</a>
              </div>
            </div>
          </div>

        </div><!-- /Tab Content -->
        <!-- /Pills -->

      </div><!-- /Column 2-->

      <div class="row clearfix">
        <div class="col-xs-12 hidden-lg hidden-md hidden-sm visible-xs">
          <div class="btn-group pull-right margin_top_30">
            <button type="button" class="btn btn-lg btn-success dropdown-toggle " data-toggle="dropdown">
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

      <? endif; ?>
    </div><!-- /Main Content-->

  </div><!-- /12 columns -->
</div><!-- /Enclosing row -->

<? dump($lead); ?>