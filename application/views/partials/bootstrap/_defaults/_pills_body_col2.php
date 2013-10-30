
<? if ($pills = config('pills', 'column2')) : ?>
	<? foreach ($pills as $id => $l) : ?>
		<div class="tab-pane" id="<?= $id; ?>">
			<?= partial('_row_' . $id); ?>
		</div>
	<? endforeach; ?>
<? endif;
