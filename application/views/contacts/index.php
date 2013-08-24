<?php $contacts = new Contact_Presenter($contacts); //dump($contacts);?>
<?php echo '<br/>the uri segments are these:'; //dump($this->uri->segment_array());?>
<h2>This sit the content form the index.php view file in contacts</h2>
<?php echo message($this->session->flashdata('message'), 'info'); ?>
<?php foreach ($contacts->contact as $row => $object)
{
	//echo '<h1>' . $object->last_name . '</h1>';
	//echo '<p>' . $object->email . '</p>';
}
?>

<?php //echo $pagination_links; ?>

<a href="<?php echo site_url('contacts/create'); ?>"><button>
		<h3>Create New Contact</h3>
	</button>
</a>
<?php echo '<h4>' . $pagination['pagination_text'] . '</h4>';?>
<?php echo $contacts->create_table
	($contacts->contact, array('id', 'first_name', 'last_name', 'owner_id'));
?>
<?php echo $pagination['pagination_links']; ?>

<a href="<?php echo site_url('contacts/create'); ?>"><button>
		<h3>Create New Contact</h3>
	</button>
</a>
