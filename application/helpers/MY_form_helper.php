<?	/*
'extends' the form_helper
*/

	function to_dropdown($data = array(), $label = FALSE,  $first_option = 'Choose one', $value = 'id' )
	{
		if (count($data) && $label)
		{
			$retval[''] = $first_option;
			//Loop through the array and create a new array of $value => $label
			foreach ($data as $row => $array)
			{
				$retval[$array[$value]] = $array[$label];
			}	
			return $retval;
		}
	}