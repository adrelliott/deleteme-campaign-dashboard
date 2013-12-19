<div class="row">
	<div class=" form-inline">
		<?= form_open('contact_actions/edit/' . $p->id(), 'class="form-horizontal ajax_form modal_form" role="form" alert-class="' . $p->alert_class() . '" table-id="' . $p->tableId() . '"'); ?>
			<?= form_hidden('contact_id', $p->contact_id()); ?>
			<?= form_hidden('action_type', $p->action_type()); ?>

            <div id="rowIndex"></div><!--Added by Tellenis-->
            <!--Note: The table id attribute (table-id="' . $p->tableId() . '"') in the form tag is not setting correctly while edit modal, please check it, we have hardcoded the table id in form.js line no: 64-->

			<?= partial('_form_contactactions_' . $p->action_type()); ?>

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<button type="submit" class="btn btn-success pull-right" class="modal-submit"><i class="fa fa-check"></i> Update this...</button> 
			</div>
		<?= form_close(); ?>
	</div>
</div>
<? dump($p); ?>
