this si contact/show.php

<?php var_dump($contact); ?>

<br/>
<br/>
<br/>
<br/>
<br/>OK. here's the test: This si the first name: <?php echo $contact->first_name; ?>
<br/>next test:last name <?php echo $contact->last_name; ?>
<br/>next test: full_name() (from presenter) <?php echo $contact->full_name(); ?>
<br/>this si company name: <?php echo $contact->name_company(); ?>
