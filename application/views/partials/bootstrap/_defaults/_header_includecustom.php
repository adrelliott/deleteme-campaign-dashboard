<? if ($element = config('include_in_header', 'extras')) : ?>
	<? foreach ($element as $type => $path) : ?>
		<? if($type == 'script') : ?>
			<script><?= site_url($path); ?></script>
		<? elseif($type == 'stylesheet') : ?>
			<link href="<?= site_url($path); ?>" rel="stylesheet">
		<? endif; ?>
	<? endforeach; ?>
<? endif;