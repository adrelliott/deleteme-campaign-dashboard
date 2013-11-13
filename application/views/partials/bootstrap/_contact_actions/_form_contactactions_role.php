<code>Drop downof roles 9from config</code>
<code>notes as text area</code>
<code>season (as dropdown from config)</code>
<code>start date</code>
<code>end date</code>
<code>submit</code>





<div class="form-group">
	<code>role type as dropdown</code><input type="text" class="form-control" id="action_title" name="action_title" placeholder="E.g. Call and follow up on order" value="<?= $contact_action->action_title(); ?>">
</div>


<div class="form-group">
	<code>notes</code><textarea class="form-control" id="action_description" name="action_description" placeholder="Enter a description (optional)" rows="3"><?= $contact_action->action_description(); ?></textarea>
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
