<? 
	if ($list = config('dropdown', 'extraactions'))
	{
		foreach ($list as $link => $label)
		{
			echo '<li><a href="' . site_url($link) . '"><p>' . $label . '</p></a></li>';
		}
	}
	else echo '<li><a><p><em>No Actions available</em></p></a></li>';