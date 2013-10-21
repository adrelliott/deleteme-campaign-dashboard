
      <table class="table DataTable" table-id="saved_search-table" id="saved_search-table" data-source="<?php echo site_url('ajax/saved_searches/get_table/id/search_name/search_description?search_type=search'); ?>" data-link="<?php echo site_url() . 'saved_searches/show/'; ?>" link-class="test test2" sScrollY="500">
        <thead>
          <tr>
            <th>Id</th>
            <th>Search name</th>
            <th>Search Description</th>
          </tr>
        </thead>
      </table>

      <div class="clearfix">
        <a href="<?= site_url('saved_searches/create'); ?>"><button type="button" class="btn btn-primary btn-lg pull-right">Create New Saved Search</button></a>
      </div>