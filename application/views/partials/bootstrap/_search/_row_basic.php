<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <legend>Perform a Basic Search</legend>

        <?= form_open('search/perform_search', 'class="form-inline" role="form"'); ?>

        <ul class="list-group " id="basic_search">
            <p>"Im looking for contacts who have bought..."</p>
            <li class="list-group-item">
                <div class="row">
                    <?= form_hidden('operator[]');?>
                    <div class="form-group col-lg-3 col-md-3  col-sm-6 col-xs-12">
                        <label class="sr-only" for="product_id[]">Choose a product</label>
                        <?= form_dropdown('product_id[]', to_dropdown($p->products(), 'product_name', 'Choose a Product'), '', 'class="form-control input-sm"'); ?>
                    </div>

                    <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <label class="sr-only" for="season[]">Choose a Season</label>
                        <?= form_dropdown('season[]', config('seasons', 'dropdowns'), '', 'class="form-control input-sm"'); ?>
                    </div>

                    <div class="form-group col-lg-3 col-md-3  col-sm-6 col-xs-12">
                        <label class="sr-only" for="date_type[]">Choose a date search type</label>
                        <?= form_dropdown('date_type[]', array('' => 'I don\'t care when they ordered', 'before' => 'Ordered before', 'on' => 'Ordered on', 'after' => 'Ordered After'), '', 'class="form-control input-sm"'); ?>
                    </div>

                    <div class="form-group col-lg-3 col-md-3  col-sm-6 col-xs-12">
                        <label class="sr-only" for="date[]">Choose the date</label>
                        <input type="date" class="form-control  input-sm" name="date[]" id="" value="">
                    </div>

                    
                </div>
            </li>
            <li class="list-group-item hide">
                <div class="row">
                    <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-12">
                        <label class="sr-only" for="operator[]">Search type...</label>
                        <?= form_dropdown('operator[]', array('or' => 'Can have...', 'and' => 'Must have...', 'not' => 'Cannot have...'), 'or', 'class="form-control input-sm"'); ?>
                    </div>

                    <div class="form-group col-lg-3 col-md-3 col-sm-5 col-xs-12">
                        <label class="sr-only" for="product_id[]">First name</label>
                        <?= form_dropdown('product_id[]', to_dropdown($p->products(), 'product_name', 'Choose a Product'), '', 'class="form-control input-sm"'); ?>
                    </div>

                    <div class="form-group col-lg-3 col-md-3 col-sm-5 col-xs-12">
                        <label class="sr-only" for="season[]"></label>
                        <?= form_dropdown('season[]', config('seasons', 'dropdowns'), '', 'class="form-control input-sm"'); ?>
                    </div>

                    <div class="form-group col-lg-2 col-md-2 offset-md-3 col-sm-6 col-xs-12">
                        <label class="sr-only" for="date_type[]"></label>
                        <?= form_dropdown('date_type[]', array('' => 'Ordered anytime', 'before' => 'Ordered before', 'on' => 'Ordered on', 'after' => 'Ordered After'), '', 'class="form-control input-sm"'); ?>
                    </div>

                    <div class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-12">
                        <label class="sr-only" for="date[]">date</label>
                        <input type="date" class="form-control input-sm " name="date[]" id="" value="">
                    </div>

                    <div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
                        <a href="#" class="remove_li_item pull-right text-danger">Remove this Row</a>
                    </div>
                </div>
            </li>

        </ul>
        <div class="row">
            <button href="#" class="btn btn-sm btn-default pull-left add_li_item" ul-id="basic_search">Add New row</button>
            <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check"></i> Do this search!</button>
        </div>
        <?= form_close(); ?>
    </div>
</div>
