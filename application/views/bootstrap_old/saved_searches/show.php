  <div class="page-header">
    <h1 id="navbar">Your Search Results:</h1>
  </div>

  <div class="row">
    <small><a href="<?= site_url('saved_searches') ?>"><i class="icon-long-arrow-left"></i> Back to the saved searches list...</a></small>
    <div class="col-lg-12">

      <div class="well">
        <?= $saved_search->get_results('description'); ?>
        <table class="table">
          <thead>
            <? foreach ($saved_search->get_results('headers') as $header): ?>
              <th><?= humanize($header); ?></th>
            <? endforeach; ?>
          </thead>
          <tbody>
            <?= $saved_search->table_body($saved_search->get_results('data'), $saved_search->get_results('headers')); ?>
          </tbody>
        </table>      
        <div class="pull-right"><?= $saved_search->get_results('links'); ?></div>
        <div class="clearfix"></div>        
      </div>
      
          <!-- Single button -->
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

<!-- Modal -->
<div class="modal fade" id="contactaction-modal" tabindex="-1" role="dialog" aria-labelledby="contactaction-modal-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Action for ->get_first_name(); ?></h4>
      </div>

      <div class="modal-body">
        <!-- The rest fo the form is added in modal window -->
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal --> 


<? //echo "<div class="clearfix"></div>";dump($saved_search); ?>