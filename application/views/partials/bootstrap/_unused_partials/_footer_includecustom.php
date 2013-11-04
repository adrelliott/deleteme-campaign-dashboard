<? if ($element = config('include_in_footer', 'extras')) : ?>
	<? foreach ($element as $type => $path) : ?>
		<? if($type == 'script') : ?>
			<script><?= site_url($path); ?></script>
		<? elseif($type == 'stylesheet') : ?>
			<link href="<?= site_url($path); ?>1" rel="stylesheet">
		<? endif; ?>
	<? endforeach; ?>
<? endif;