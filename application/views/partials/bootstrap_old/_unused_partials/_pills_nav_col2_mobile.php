
<? if ($pills = config('pills', 'column2')) : ?>
	<? foreach ($pills as $id => $label) : ?>
		<li class="  hidden-lg hidden-md">
			<a href="#<?= $id; ?>" data-toggle="tab"><?= $label; ?></a>
		</li>
	<? endforeach; ?>
<? endif;