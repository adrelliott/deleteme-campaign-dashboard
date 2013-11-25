
  <div class="row">

      <div class="page-header">
        <h1 id="tables"><i class="icon-search"></i> All Your Saved Searches</h1>
        <p class="lead">Use these to find groups of people, saved_searches who've got tags or just for fun.</p>
      </div>
      
      <div class="clearfix">
        <a href="<?= site_url('saved_searches/create'); ?>"><button type="button" class="btn btn-primary pull-right">Create New Saved Search</button></a>
      </div>
      
      <?= $this->messages->show(); ?>
      
      <? include (APPPATH. 'views/partials/' . $this->config->item('layout_folder') . '/_saved_searches/_saved_search_table.php'); ?>

  </div>
