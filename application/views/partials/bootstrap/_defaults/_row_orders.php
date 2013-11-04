<div class="row">
  <?= partial('_table_ajax', array('table_name' => 'orders_table')); ?>
</div>
<div class="row">
  <div>
    <a href="<?= site_url('contacts/create'); ?>" class="btn btn-primary btn-lg pull-right"><i class="fa fa-plus"></i> Create New Order</a>
  </div>
</div>
