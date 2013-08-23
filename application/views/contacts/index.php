<?php $contacts = new Contact_Presenter($contacts); ?>
<h2>This sit the content form the index.php view file in contacts</h2>
<?php echo message($this->session->flashdata('message'), 'info'); ?>
<a href="<?php echo site_url('contacts/create'); ?>"><button>
		<h3>Create New Contact</h3>
	</button>
</a>
<?php echo $contacts->create_table
	($contacts->contact, array('id', 'first_name', 'last_name', 'owner_id'));
?>

<a href="<?php echo site_url('contacts/create'); ?>"><button>
		<h3>Create New Contact</h3>
	</button>
</a>
