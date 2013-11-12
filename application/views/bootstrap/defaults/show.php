<div class="row"><!-- Encosing Row -->
  <div class="col-xs-12"><!-- 12 columns -->
    
  <?  if(strtolower($this->uri->segment(2) == 'create')): ?>
    <div class="row">
      <div class="col-lg-8 col-md-10 col-sm-10 col-xs-12">
        <div class="page-header">
          <?= partial('_pageheader'); ?>
        </div>
      </div>  
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"><!-- Column 1-->
      <div class="well">
        <div class="row">
          <?= partial('_form_create'); ?>
        </div>
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
          <?= partial('_pageheader'); ?>
        </div>
      </div>
      <div class="col-lg-4 col-md-2 col-sm-2 visible-lg visible-md visible-sm hidden-xs">
        <div class="page-header border-none">
          <div class="btn-group pull-right">
            <button type="button" class="btn btn-lg btn-default dropdown-toggle" data-toggle="dropdown">
              Extra Actions... <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
              <?= partial('_button_extraactions_dropdown'); ?>
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

            <!-- Pill Navigation -->
            <ul class="nav nav-pills">
               <?= partial('_pills_nav', array('position'=>'column_1', 'mobile' => 0)); ?>
            </ul>
            <!-- /Pill Navigation -->

            <ul class="nav nav-pills nav-stacked hidden-lg hidden-md visible-sm visible-xs"><!-- nav for Phones and small tablets -->
              <li class="dropdown active hidden-lg hidden-md visible-sm visible-xs">
                <a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown"><h4><i class="fa fa-toggle-down"></i> See more details... <b class="caret"></b></h4></a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">
                  <?= partial('_pills_nav', array('position'=>'column_1', 'mobile' => 1)); ?>
                </ul>
              </li>
            </ul><!-- /nav for Phones and small tablets -->

            <div class="tab-content"><!-- Tab Content -->   

              <?= partial('_pills_body', array('position'=>'column_1')); ?>

              <div class="row">
                <a class="text-danger" href="#" ><i class="fa fa-trash-o"></i> Delete this record...</a>
              </div>

            </div><!-- /Tab Content -->

          <!-- /Pills -->
          </div><!-- /col-->
        </div><!-- /Well -->   
      </div><!-- /Column 1-->

      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><!-- Column 2-->

        <!-- Pills -->
        <div class="align_with_well"><!-- Align with well -->

          <!-- Pill Navigation -->
            <ul class="nav nav-pills">
              <?= partial('_pills_nav', array('position'=>'column_2', 'mobile' => 0)); ?>
            </ul>
            <!-- /Pill Navigation -->

          <ul class="nav nav-pills nav-stacked hidden-lg hidden-md visible-sm visible-xs"><!-- nav for Phones and small tablets -->
            <li class="dropdown  hidden-lg hidden-md visible-sm visible-xs">
              <a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown"><h4><i class="fa fa-toggle-down"></i> See more actions... <b class="caret"></b></h4></a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">
                <?= partial('_pills_nav', array('position'=>'column_2', 'mobile' => 1)); ?>
              </ul>
            </li>
          </ul><!-- /nav for Phones and small tablets -->

        </div><!-- /Align with well -->

        <div class="tab-content"><!-- Tab Content -->   

          <?= partial('_pills_body', array('position'=>'column_2')); ?>
          
        </div><!-- /Tab Content -->
        <!-- /Pills -->

      </div><!-- /Column 2-->

      <div class="row clearfix">
        <div class="col-xs-12 hidden-lg hidden-md hidden-sm visible-xs">
          <div class="btn-group pull-right margin_top_30">
            <button type="button" class="btn btn-lg btn-default dropdown-toggle " data-toggle="dropdown">
              Extra Actions<span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
              <?= partial('_button_extraactions_dropdown'); ?>
            </ul>
          </div>
        </div>
      </div>

      <? endif; ?>
    </div><!-- /Main Content-->

  </div><!-- /12 columns -->
</div><!-- /Enclosing row -->

<?= partial('_modal_contactaction'); ?>
<?= partial('_debug_footer'); ?>