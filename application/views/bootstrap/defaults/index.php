
<div class="row"><!-- Page Row-->
  <div class="col-xs-12"><!-- Containing Column -->

    <div class="row">
      <div class="col-xs-12 hidden-lg hidden-md hidden-sm visible-xs">
        <?= partial('_button_create'); ?>
      </div>
    </div>

    <div class="row"><!-- Top line -->
      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <div class="page-header">
          <?= partial('_pageheader'); ?>
        </div>
      </div> 
      <div class="col-lg-4 col-md-4 col-sm-4 hidden-xs">
        <div class="page-header border-none">
          <div class="btn-group pull-right">
            <div class="btn-group btn-block">
              <?= partial('_button_extraactions'); ?>
              <ul class="dropdown-menu" role="menu">
                <?= partial('_button_extraactions_dropdown'); ?>
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
        <?= partial('_table_ajax', array('table_name' => controller() . '_table')); ?>
      </div>
    </div> <!-- /Main table-->

    <div class="row">
      <div>
        <?= partial('_button_create'); ?>
      </div>
    </div>

  </div><!-- /Containing column-->
</div><!-- /Page Row-->

<?= partial('_debug_footer'); ?>