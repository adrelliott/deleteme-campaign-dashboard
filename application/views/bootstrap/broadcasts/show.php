<div class="row"><!-- Encosing Row -->
    <div class="col-xs-12"><!-- 12 columns -->
        <?  if(strtolower(get_segment(2) == 'create')): ?>
        <div class="row">
            <div class="col-lg-8 col-md-10 col-sm-10 col-xs-12">
                <div class="page-header">
                    <?= partial('_pageheader'); ?>
                </div>
            </div>  
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12"><!-- Column 1-->
            <div class="well">
                <div class="row">
                    <?= partial('_form_create'); ?>    
                </div>
            </div>
        </div><!-- /Column 1-->
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12"><!-- Column 2-->
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>Whats all this about?</h3>
                    <p>After a while, you'll have done so many mailouts (we hope) that you'll forget what they are all about.</p>
                    <p>Add a name and description here so that you'll be able to find this in the future.</p>
                    <i>Pssst. Your recipients <strong>won't</strong> be able to see what you write here.</i>
                </div>
            </div>
        </div><!-- /Column 2-->

    <? else : 
//...else show this view here (the 'show' view) 
    ?>

    <div class="row"><!-- Top line -->
        <div class="col-lg-8 col-md-10 col-sm-10 col-xs-12">
            <div class="page-header">
                <?= partial('_pageheader'); ?>
            </div>
        </div>
        <div class="col-lg-4 col-md-2 col-sm-2 visible-lg visible-md visible-sm hidden-xs">
            <div class="page-header border-none">
                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-lg btn-default dropdown-toggle" data-toggle="dropdown">
                        Extra Actions... <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <?= partial('_button_extraactions_dropdown'); ?>
                    </ul>
                </div>  
            </div>
        </div>
    </div><!-- /Top line -->

    <div class="row"><!-- Main Content-->
        <div class="form-fail alert alert-danger hide">
            Uh oh. Something went wrong. Please try again.
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12"><!-- Column 1-->
            <div class="well"><!-- Well -->
                <div class="row">
                    <?= form_open(site_url('broadcasts/edit/' . $p->id(), ' role="form" class=""')); ?>
                    <div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
                        <label class="" for="saved_search_id">Who's this email to:</label>
                        <?= form_dropdown('saved_search_id', to_dropdown($p->saved_searches(), 'search_name', 'Choose a saved search'),$p->saved_search_id(), 'class="form-control input-lg"'); ?>
                    </div>

                    <div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
                        <label class="" for="subject_line">Subject line</label>
                        <input type="text" class="form-control input-lg" name="subject_line" id="subject_line" placeholder="E.g. Have you seen how cheap apples are at the moment? <?= date('d/m/y'); ?>"  value="<?= $p->subject_line(); ?>">
                    </div>

                    <div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
                        <label class="" for="body">Your email</label>
                        <textarea class="form-control input-lg wysihtml5" rows="40" placeholder="Hi. Get to Asda as soon as you can. No time to explain." name="body" id="body"><?= $p->body(); ?></textarea>
                    </div>

                     <div class="form-group col-lg-12 col-md-12 col-sm-12">
                        <button type="submit" class="btn btn-lg btn-success pull-right"><i class="fa fa-check"></i> Save Changes</button>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div><!-- /Well -->   
        </div><!-- /Column 1-->

        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"><!-- Column 2-->

            <!-- Panel 1 -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">About this Broadcast</h3>
                </div>
                <div class="panel-body">
                    <?= form_open(site_url('broadcasts/edit/' . $p->id(), ' role="form" class=""')); ?>
                    <div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
                        <label class="" for="broadcast_name">Broadcast Name</label>
                        <input type="text" class="form-control input-sm" name="broadcast_name" id="broadcast_name" placeholder="E.g. Newsletter <?= date('d/m/y'); ?>"  value="<?= $p->broadcast_name(); ?>">
                    </div>

                    <div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
                        <label class="" for="broadcast_description">Description</label>
                        <textarea class="form-control input-sm" rows="3" placeholder="This broadcast is tell everyone I know that I have change my name to 'Odin the Great, Leader of the Badger Revolution', and they should update their Christmas card list accordingly." name="broadcast_description" id="broadcast_description"><?= $p->broadcast_description(); ?></textarea>
                    </div>

                    <div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
                        <label class="" for="broadcast_from">The email is from:</label>
                        <?= form_dropdown('broadcast_from', config('broadcast_from', 'dropdowns'), $p->broadcast_from(), 'class="form-control" input-sm'); ?>
                    </div>

                    <div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
                        <label class="" for="broadcast_from">Email format</label>
                        <?= form_dropdown('email_template', config('email_template', 'dropdowns'), $p->email_template(), 'class="form-control" input-sm'); ?>
                    </div>

                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                        <button type="submit" class="btn btn-sm btn-success pull-right"><i class="fa fa-check"></i> Save Changes</button>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
            <!-- /Panel 1 -->

            <!-- Panel 2 -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Testing</h3>
                </div>
                <div class="panel-body">

                    <div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
                        <label class="" for="test_to">Send a test email to:</label>
                        <?= form_dropdown('test_to', to_dropdown($p->users(), 'email', 'Choose a recipient'), '', 'class="form-control"'); ?>
                    </div>
                    <div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
                        <small><a href="#" class="unhide_div" div-class="test_other">Want to send to someone not on this list</a>?</small>
                    </div>

                    <div class="test_other hide">
                        <div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
                            <label class="" for="test_first_name">First Name</label>
                            <input type="text" class="form-control input-sm" name="test_first_name" id="test_first_name" placeholder="E.g. Martha " >
                        </div>

                        <div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
                            <label class="" for="test_email">Email</label>
                            <input type="text" class="form-control input-sm" name="test_email" id="test_email" placeholder="E.g. Martha@TheFoundry.com " >
                        </div>
                    </div>

                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                        <button type="submit" class="btn btn-sm btn-success pull-right"><i class="fa fa-thumbs-o-up"></i> Send Test Email</button>
                    </div>

                </div>
            </div>
            <!-- /Panel 2 -->

            <!-- Panel 3 -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Sending</h3>
                </div>
                <div class="panel-body">

                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <label for="optin_email">Ready to send?</label>
                        <div>
                            <label class="radio-inline">
                                <input type="radio" name="ready_to_send" id="ready_to_send_yes" value="1"  <?= set_radio('ready_to_send', 1, $p->ready_to_send() == 1); ?> > <i class="fa fa-thumbs-o-up "></i> Yes<br>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="ready_to_send" id="ready_to_send_no" value="0"  <?= set_radio('ready_to_send', 0, $p->ready_to_send() == 0); ?> > <i class="fa fa-thumbs-o-down "></i> No<br>
                            </label>  
                        </div>
                    </div>

                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                        <button type="submit" value="send_now" class="btn btn-primary pull-right"><i class="fa fa-thumbs-o-up"></i> Send Email Now</button>
                    </div>

                </div>
            </div>
            <!-- /Panel 3 -->

            <!-- Panel 4 -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Analytics</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                        <button type="submit" class="btn btn-default pull-right"><i class="fa fa--o-up"></i> Get Analytics</button>
                    </div>

                </div>
            </div>
            <!-- /Panel 4 -->

        </div><!-- /Column 2-->

        <div class="row clearfix">
            <div class="col-xs-12 hidden-lg hidden-md hidden-sm visible-xs">
                <div class="btn-group pull-right margin_top_30">
                    <button type="button" class="btn btn-lg btn-default dropdown-toggle " data-toggle="dropdown">
                        Extra Actions<span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <?= partial('_button_extraactions_dropdown'); ?>
                    </ul>
                </div>
            </div>
        </div>

    <? endif; ?>
</div><!-- /Main Content-->

</div><!-- /12 columns -->
</div><!-- /Enclosing row -->
<?= partial('_modal_small'); ?>
<?= partial('_debug_footer'); ?>
