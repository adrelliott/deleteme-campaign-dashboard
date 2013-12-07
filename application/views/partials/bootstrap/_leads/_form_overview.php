
<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <label for="">Contact</label>
    <input type="text" class="form-control input-lg" id="" placeholder="Start typing the surname..." value="<?= $p->first_name(); ?>">
</div>
<?= form_input('contact_id', $p->contact_id()); ?>

<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <label for="lead_title">Lead Title</label>
    <input type="text" class="form-control input-lg" id="lead_title" name="lead_title" placeholder="E.g. Training Opportunity in June" value="<?= $p->lead_title(); ?>">
</div>

<div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <label for="lead_stage">Stage</label>
    <?= form_dropdown('lead_stage', config('lead_stages', 'dropdowns'), $p->lead_stage(), 'class="form-control input-lg" id="lead_stage"'); ?>
</div>

<div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <label for="user_id">Lead owner</label>
    <?= form_dropdown('user_id', to_dropdown($p->users(), 'first_name', 'Choose a user'), $p->user_id(), 'class="form-control input-lg" id="user_id"'); ?>
</div>

<div class="form-group col-lg-4 col-md-8 offset-md-4  col-sm-12 col-xs-12">
    <label class="target_completion_date" for="">Completion date</label>
    <input type="date" class="form-control input-lg " name="target_completion_date" id="target_completion_date" value="<?= $p->target_completion_date(); ?>">
</div>

<div class="form-group col-lg-8 offset-lg-4 col-md-10 offset-md-2 col-sm-12 col-xs-12">
    <label for="product_id">Main Product</label>
    <?= form_dropdown('product_id', to_dropdown($p->products(), 'product_name', 'Choose a Main Product'), $p->product_id(), 'class="form-control input-lg" id="product_id"'); ?>
</div>



