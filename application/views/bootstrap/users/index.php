<h1><?php echo lang('index_heading');?></h1>
<p><?php echo lang('index_subheading');?></p>
<div class="row">
            <div class="col-lg-8 col-md-10">
                <?= $this->messages->show(); ?>   
            </div>
        </div>

<h1>Manage users</h1>
<table class="table" cellpadding=0 cellspacing=10>
	<tr>
		<th><?php echo lang('index_fname_th');?></th>
		<th><?php echo lang('index_lname_th');?></th>
		<th><?php echo lang('index_email_th');?></th>
		<th><?php echo lang('index_groups_th');?></th>
		<th><?php echo lang('index_status_th');?></th>
		<th><?php echo lang('index_action_th');?></th>
	</tr>
	<?php foreach ($p->user->users as $u):?>
		<tr>
			<td><?php echo $u->first_name;?></td>
			<td><?php echo $u->last_name;?></td>
			<td><?php echo $u->email;?></td>
			<td>
				<?php foreach ($u->groups as $group):?>
					<?php echo anchor("users/edit_group/".$group->id, $group->name) ;?><br />
                <?php endforeach?>
			</td>
			<td><?php echo ($u->active) ? anchor("users/deactivate/".$u->id, lang('index_active_link')) : anchor("users/activate/". $u->id, lang('index_inactive_link'));?></td>
			<td><?php echo anchor("users/edit_user/".$u->id, 'Edit') ;?></td>
		</tr>
	<?php endforeach;?>
</table>

<p><?php echo anchor('users/create_user', lang('index_create_user_link'))?> | <?php echo anchor('users/create_group', lang('index_create_group_link'))?></p>
<? dump($p)?>