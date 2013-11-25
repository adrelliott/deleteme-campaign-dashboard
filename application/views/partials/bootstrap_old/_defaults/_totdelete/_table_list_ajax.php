
<table class="table DataTable" table-id="<?= config('table_id', 'tables'); ?>-table" id="<?= config('table_id', 'tables'); ?>-table" data-source="<?= site_url(config('data_source', 'tables')); ?>" data-link="<?= site_url() . config('data_link', 'tables'); ?>" link-class="<?= config('link_class', 'tables')?>" sScrollY="<?= config('scrolly', 'tables')?>">
  <thead>
    <tr>
    	<? foreach (config('columns', 'tables') as $col => $label): ?>
    		<th><?= $label; ?></th>
    	<? endforeach; ?>
    </tr>
  </thead>
</table>    