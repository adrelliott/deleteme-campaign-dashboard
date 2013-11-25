
<table class="table DataTable" table-id="<?= config('table_id', 'tables', $table_name); ?>-table" id="<?= config('table_id', 'tables', $table_name); ?>-table" data-source="<?= site_url(config('data_source', 'tables', $table_name)); ?>" data-link="<?= site_url() . config('data_link', 'tables', $table_name); ?>" link-class="config('link_class', 'tables', $table_name)" sScrollY="config('scrolly', 'tables', $table_name)">
  <thead>
    <tr>
    	<? foreach (config('columns', 'tables', $table_name) as $col => $label): ?>
    		<th><?= $label; ?></th>
    	<? endforeach; ?>
    </tr>
  </thead>
</table>    