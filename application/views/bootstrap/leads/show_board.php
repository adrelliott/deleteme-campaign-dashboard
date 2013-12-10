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
      
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"><!-- Column 1-->
        <div class="well list"><!-- Well -->
          <legend>Potential</legend>
          <div class="row margin_top_30 pre-scrollable">

            <? foreach ($p->get_leads_by_type('Potential') as $lead => $array): ?>
                <?= partial('_card_lead', array('card' => $array)); ?>
            <? endforeach; ?>

          </div>
        </div>
      </div><!-- / Column 1-->
      
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"><!-- Column 2-->
        <div class="well list"><!-- Well -->
          <legend>Lead</legend>
          <div class="row margin_top_30 pre-scrollable">
            
            <? foreach ($p->get_leads_by_type('Lead') as $lead => $array): ?>
                <?= partial('_card_lead', array('card' => $array)); ?>
            <? endforeach; ?>

          </div>
        </div>
      </div><!-- / Column 2-->
      
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"><!-- Column 3-->
        <div class="well list"><!-- Well -->
          <legend>Prospect</legend>
          <div class="row margin_top_30 pre-scrollable">
            
            <? foreach ($p->get_leads_by_type('Prospect') as $lead => $array): ?>
                <?= partial('_card_lead', array('card' => $array)); ?>
            <? endforeach; ?>

          </div>
        </div>
      </div><!-- / Column 3-->
      
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"><!-- Column 4-->
        <div class="well list"><!-- Well -->
          <legend>Won</legend>
          <div class="row margin_top_30 pre-scrollable">
            
            <? foreach ($p->get_leads_by_type('Won') as $lead => $array): ?>
                <?= partial('_card_lead', array('card' => $array)); ?>
            <? endforeach; ?>

          </div>
        </div>
      </div><!-- / Column 4-->
      
      
      <div class="row margin_top_30">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h2>All leads</h2>
          
            <!-- Order table-->
            <?= partial('_table_index'); ?>
            <!-- /Order table-->

        </div>
      </div>

    </div><!-- /Main Content-->

  </div><!-- /12 columns -->
</div><!-- /Enclosing row -->
<?= partial('_debug_footer'); ?>