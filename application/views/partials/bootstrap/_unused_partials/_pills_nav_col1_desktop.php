
<? if ($pills = config('pills', 'column1')) : ?>
	<? foreach ($pills as $id => $label) : ?>
		<li class=" hidden-sm hidden-xs">
			<a href="#<?= $id; ?>" data-toggle="tab"><?= $label; ?></a>
		</li>
	<? endforeach; ?>
<? endif;