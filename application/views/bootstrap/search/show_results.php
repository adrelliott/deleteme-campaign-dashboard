
<div class="row"><!-- Page Row-->
  <div class="col-xs-12"><!-- Containing Column -->

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
    <div class="row">
      <div class="col">
        <div class="row">
          <small class="pull-left"><a href="<?= site_url('saved_searches') ?>"><i class="fa fa-long-arrow-left"></i> Back to the saved searches list...</a></small>
        </div>
        <div class="well">
          <p class="lead"><?= ucwords($p->search_name()); ?></p>
          <div class="row">
            <table class="table">
            <thead>
              <? foreach (explode(',',$p->select()) as $header): ?>
                <th><?= humanize($header); ?></th>
              <? endforeach; ?>
            </thead>
            <tbody>
              <? foreach ($p->get_results() as $row => $array) : ?>
                <tr>
                  <? foreach ($array as $col => $val): ?>
                    <td><?= $val; ?></td>
                  <? endforeach; ?>
                </tr>
              <? endforeach; ?>
            </tbody>
          </table>  
          </div>
          <div class="row">
            <div class="pull-right"><?= $p->pag_links(); ?></div>
          </div>
          <div class="row">
            <small class="pull-right">Showing records <?= $p->offset() . ' to ' . ($p->offset() + $p->limit()) . ' of ' . $p->total_rows(); ?></small>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
       <div class="btn-group pull-right">
        <button type="button" class="btn btn-primary btn-lg dropdown-toggle" data-toggle="dropdown">
          So... What's next, Al? <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" role="menu">
          <li><a href="<?= site_url('saved_searches/export/' . $this->uri->slash_segment(3) . $this->uri->segment(4)); ?>">Export these as CSV</a></li>
          <li class="divider"></li>
          <li><a href="#">Send them all an Email</a></li>
          <li class="divider"></li>
          <li><a href="#">Tag them all</a></li>
          <li class="divider"></li>
          <li><a href="#">Save this Search (if the search has not been saved)</a></li>
        </ul>
      </div>   
    </div>
   
    
    <!-- /Main table-->


  </div><!-- /Containing column-->
</div><!-- /Page Row-->

<?= partial('_debug_footer'); ?>