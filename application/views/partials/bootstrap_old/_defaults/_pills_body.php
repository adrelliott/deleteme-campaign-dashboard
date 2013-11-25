<?
	if ($pills = config($position, 'pills'))
	{
		foreach ($pills as $id => $label)
		{
			echo '<div class="tab-pane" id="' . $id . '">';
			echo partial('_row_' . $id);
			echo '</div>';
		}	
	}