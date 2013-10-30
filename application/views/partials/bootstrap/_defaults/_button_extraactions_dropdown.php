<? if($list = config('dropdown', 'extraactions')): ?>
	<? foreach ($list as $link => $label): ?>

		<li><a href="<?= site_url($link); ?>"><p><?= $label; ?></p></a></li>
	<? endforeach; ?>

<? else: ?>
	<li><a><p><em>No Actions available</em></p></a></li>
<? endif;