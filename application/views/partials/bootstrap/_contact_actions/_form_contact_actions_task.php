<? 
/* The partial to create/edit a task */
?>
<?= form_hidden('action_type', 'task'); ?>

<div class="form-group">
	<label for="action_title">Task Title</label>
	<input type="text" class="form-control" id="action_title" name="action_title" placeholder="Enter Task Title">
</div>

<div class="form-group">
	<label for="action_description">Task Description</label>
	<textarea class="form-control" id="action_description" name="action_description" placeholder="Enter a description (optional)" rows="3"></textarea>
</div>

<div class="form-group">
	<label for="exampleInputEmail1">Who is this task assigned to?</label>
	<select class="form-control" id="exampleInputEmail1">
	  <option>Al</option>
	  <option>Sam</option>
	  <option>Nicole</option>
	  <option>Leanne</option>
	  <option>Chris</option>
	</select>
</div>
