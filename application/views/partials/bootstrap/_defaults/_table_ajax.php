<table class="table data-table server-side" table-id="<?= $table_name; ?>-table" id="<?= $table_name; ?>-table" data-source="<?= site_url(config('data_source', 'tables', $table_name)); ?>" data-target="<?= config('data_target', 'tables', $table_name)?>"  html-source="<?= site_url(config('html_source', 'tables', $table_name)); ?>" data-link="<?= config('data_link', 'tables', $table_name)?>" table-dropdown="<?= config('dropdown', 'tables', $table_name)?>">
  <thead>
    <tr>
    	<? foreach (config('columns', 'tables', $table_name) as $col => $label): ?>
    		<th><?= $label; ?></th>
    	<? endforeach; ?>
    </tr>
  </thead>
</table>    