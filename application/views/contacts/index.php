<h2>This sit the content form the index.php view file in contacts</h2>
<?php //die(dump($result)); ?>
<?php echo $result->create_table
	($result->contact, array('id', 'first_name', 'last_name', 'owner_id'));
?>
