<?php $contacts = new Contact_Presenter($contacts); //dump($contacts);?>
<?php echo message($this->session->flashdata('message'), 'info'); ?>
<br />
<a href="<?php echo site_url('contacts/create'); ?>">
	<button>
		<h3>Create New Contact</h3>
	</button>
</a>
<?php echo '<h4>' . $pagination['pagination_text'] . '</h4>';?>

<?php //dump($contacts->contact); die();
//$this->load->library('table');
$this->table->set_heading('Id', 'first_name', 'last name', 'email', 'owner id');

foreach ($contacts->contact as $row)
{
	//echo $row->id, '<br/>';
	$this->table->add_row($row->id, $row->first_name, $row->last_name, $row->email, $row->owner_id);
}


echo $this->table->generate(); ?>


<?php //echo $contacts->create_table
	//($contacts->contact, array('id', 'first_name', 'last_name', 'owner_id'));
?>
<?php echo $pagination['pagination_links']; ?>

<a href="<?php echo site_url('contacts/create'); ?>"><button>
		<h3>Create New Contact</h3>
	</button>
</a>
