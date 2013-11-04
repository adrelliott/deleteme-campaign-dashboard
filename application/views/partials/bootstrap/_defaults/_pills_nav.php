<? 
	// Are we generating nav or body?
	if ($pills = config($position, 'pills'))
	{
		foreach ($pills as $id => $label)
		{
			if ($mobile) 
			{	
				echo '<li class="hidden-lg hidden-md">';
			}
			else echo '<li class="hidden-sm hidden-xs">';

			echo '<a href="#' . $id . '" data-toggle="tab">' . $label . '</a>';
		}
	}
	
	


	/*if ($pills = config($position, 'pills'))
	{
		foreach ($pills as $id => $label)
		{
			if (isset($nav_type) && strtolower($nav_type) == 'mobile') 
			{	
				echo '<li class="hidden-lg hidden-md">';
			}
			else echo '<li class="hidden-sm hidden-xs">';

			echo '<a href="#' . $id . '" data-toggle="tab">' . $label . '</a>';
		}
	}
	*/