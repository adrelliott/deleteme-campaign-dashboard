<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="row">
			<div id="alert-order" class=" hide">
				<div class="alert alert-success">Woo hoo! Changes Saved!</div>
			</div>
		</div>
		<div id="container-order-table">
			<?= $this->table->gen_table('contact_order_table', $p->get_contacts_records('orders')); ?>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<a class="btn btn-primary pull-right open-modal" href="#" modal-source="<?= site_url('orders/create'); ?>" data-alert_class="order" data-contact_id="<?= $p->id();?>" data-view="show_modal"  >
			<i class="fa fa-plus"></i> Create New order6</a>
	</div>
</div>
<? dump($p->get_contacts_records('orders'));?>