
<div class="row"><!-- Page Row-->
  <div class="col-xs-12"><!-- Containing Column -->

    <div class="row">
      <div class="col-xs-12 hidden-lg hidden-md hidden-sm visible-xs">
        <a href="<?= site_url(controller() . '/create'); ?>" class="btn btn-primary btn-lg pull-right">Create New Contact</a>
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
              <button type="button" class="btn btn-lg btn-default btn-block2 btn-justified dropdown-toggle " data-toggle="dropdown">
                Extra Actions... <span class="caret"></span>
              </button>
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

    <!-- Main table-->
    <?= partial('_indextable'); ?>
    <!-- /Main table-->


  </div><!-- /Containing column-->
</div><!-- /Page Row-->

<?= partial('_debug_footer'); ?>