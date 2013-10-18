
  <div class="row">

      <div class="page-header">
        <h1 id="tables"><i class="icon-user"></i> All Your Saved Searches</h1>
        <p class="lead">Just <em>look</em> at them - sitting there all shiny and proud... (And the best bit? They're all yours!)</p>
      </div>
            <div class="clearfix">
        <a href="<?= site_url('contacts/create'); ?>"><button type="button" class="btn btn-primary pull-right">Create New Search</button></a>
      </div>
      
      <?= $this->messages->show(); ?>

      <table class="table DataTable" table-id="saved_search-table" id="saved_search-table" data-source="<?php echo site_url('ajax/saved_searches/get_table/id/search_name/search_description?search_type=search'); ?>" data-link="<?php echo site_url() . 'saved_search/show/'; ?>" link-class="test test2" sScrollY="500">
        <thead>
          <tr>
            <th>Id</th>
            <th>Search name</th>
            <th>Search Description</th>
          </tr>
        </thead>
      </table>


      <div class="clearfix">
        <a href="<?= site_url('contacts/create'); ?>"><button type="button" class="btn btn-primary pull-right">Create New Search</button></a>
      </div>

  </div>
