<div class="row"><!-- Page Row-->
  <div class="col-xs-12"><!-- Containing Column -->

    <div class="row">
      <div class="col-xs-12 hidden-lg hidden-md hidden-sm visible-xs">
        <?= partial('_create_button'); ?>
      </div>
    </div>

    <div class="row"><!-- Top line -->
      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <div class="page-header">
          <?= partial('_page_header_index'); ?>
        </div>
      </div> 
      <div class="col-lg-4 col-md-4 col-sm-4 hidden-xs">
        <div class="page-header border-none">
          <div class="btn-group pull-right">
            <div class="btn-group btn-block">
              <?= partial('_extra_actions_button'); ?>
              <ul class="dropdown-menu" role="menu">
                <?= partial('_extra_actions_dropdown'); ?>
              </ul>
            </div>
          </div>  
        </div>
      </div>
    </div><!-- /Top line -->

    <div class="row">
      <div class="col-lg-8 col-md-10">
        <?= $this->messages->show(); ?>   
      </div>
    </div>

    <div class="row"><!-- Main table-->
      <div>
        <?= partial('_index_table'); ?>
      </div>
    </div> <!-- /Main table-->

    <div class="row">
      <div>
        <?= partial('_create_button'); ?>
      </div>
    </div>

  </div><!-- /Containing column-->
</div><!-- /Page Row-->