<table 
class="table data-table <?= config('class', 'index_tables', $table_name); ?>" 
table-id="<?= $table_name; ?>-table" 
id="<?= $table_name; ?>-table" 
data-source="<?= config('data_source', 'index_tables', $table_name); ?>" 
data-source1="<?= site_url(config('data_source', 'index_tables', $table_name)); ?>" 
data-target="<?= config('data_target', 'index_tables', $table_name)?>" 
html-source="<?= site_url(config('html_source', 'index_tables', $table_name)); ?>"
data-link="<?= config('data_link', 'index_tables', $table_name)?>" 
table-dropdown="<?= config('dropdown', 'index_tables', $table_name)?>">
  <thead>
    <tr>
    	<? foreach (config('columns', 'index_tables', $table_name) as $col => $label): ?>
    		<th><?= $label; ?></th>
    	<? endforeach; ?>
    </tr>
  </thead>
</table>    