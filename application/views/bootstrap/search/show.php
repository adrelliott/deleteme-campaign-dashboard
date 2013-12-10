<div class="row"><!-- Encosing Row -->
  <div class="col-xs-12"><!-- 12 columns -->

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

      <div class="form-fail alert alert-danger hide">
        Uh oh. Something went wrong. Please try again.
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><!-- Column 1-->
        <div class="well"><!-- Well -->

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

          </div><!-- /Tab Content -->
          <!-- /Pills -->
          
      </div><!-- /Well -->   
    </div><!-- /Column 1-->
    
  </div><!-- /Main Content-->

</div><!-- /12 columns -->
</div><!-- /Enclosing row -->
<?= partial('_debug_footer'); ?>