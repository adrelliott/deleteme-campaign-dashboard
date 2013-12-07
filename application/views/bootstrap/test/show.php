This is show ad also create

<row class="margin_top_30">

<?= form_open($p->form_url(), 'class="ajax_form"'); ?>
	<?= form_input('type', $p->type()); ?>
	<?= form_input('notes', $p->notes()); ?>
	<?= form_submit('', 'submit me'); ?>
<?= form_close();?>


<a href="<?= $p->delete_url(); ?>" class="btn btn-lg">Delete</a>
</row>
<? //dump($p); ?>
<?= $this->messages->show(); ?>   
<? dump($p); ?>

