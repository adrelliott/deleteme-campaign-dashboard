<? if (isset($_GET['debug']))
{
	//print object
	$obj_name = singular($this->uri->segment(1));
	
	dump(${$obj_name});


}