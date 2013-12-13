<div class="row"><!-- Encosing Row -->
    <div class="col-xs-12"><!-- 12 columns -->
        <div class="row"><!-- Top row-->
            <div class="col-lg-8 col-md-6 col-sm-7 col-xs-12"><!-- Column 1, top row-->
                <div class="jumbotron dashboard_panel">
                    <div class="container">
                        <div class="row">
                            <?= $this->messages->show(); ?> 
                        </div>
                        <h1 class="hidden-sm">Hi <?= $p->user_info('first_name'); ?>!</h1>
                        <h2 class="visible-sm">Hi <?= $p->user_info('first_name'); ?>!</h2>
                        <p class="hidden-xs">Good to see you again. (I <i>like</i> your hair. Have you changed conditioners recently?)</p>
                        <span class="visible-xs ">
                            <h3>Good to see you again.</h3>
                            <p>I <i>like</i> your hair.</p>
                            <p>Have you changed conditioners recently? You're looking fabulous these days!</p>
                        </span>
                        <div class="row">
                            <div class="btn-group">
                                <button type="button" class="btn btn-lg btn-default dropdown-toggle" data-toggle="dropdown">
                                    What now...?
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <?= partial('_button_extraactions_dropdown'); ?>
                                </ul>
                            </div>
                        </div>
                    </div>  
                </div>
            </div><!-- /Column 1, toP Row-->

            <div class="col-lg-4 col-md-6 col-sm-5 col-xs-12"><!-- Column 2, top row-->
                <div class="well dashboard_panel"><!-- Well -->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><!-- /col-->
                    <!-- Pills -->

                        <!-- Pill Navigation -->
                        <ul class="nav nav-pills">
                            <?= partial('_pills_nav', array('position'=>'column_2', 'mobile' => 0)); ?>
                        </ul>
                        <!-- /Pill Navigation -->

                        <ul class="nav nav-pills nav-stacked hidden-lg hidden-md visible-sm visible-xs"><!-- nav for Phones and small tablets -->
                            <li class="dropdown active hidden-lg hidden-md visible-sm visible-xs">
                                <a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown"><h4><i class="fa fa-toggle-down"></i> See other tables... <b class="caret"></b></h4></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">
                                    <?= partial('_pills_nav', array('position'=>'column_2', 'mobile' => 1)); ?>
                                </ul>
                            </li>
                        </ul><!-- /nav for Phones and small tablets -->

                        <div class="tab-content"><!-- Tab Content -->
                            <?= partial('_pills_body', array('position'=>'column_2')); ?>
                        </div><!-- /Tab Content -->

                    <!-- /Pills -->
                    </div><!-- /col-->
                </div><!-- /Well -->   
            </div><!-- /Column 2, top row-->
        </div><!-- Top row-->

        <div class="row"><!-- Row 2-->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><!-- Column 1, row 2-->
            <!-- Pills -->

                <!-- Pill Navigation -->
                <ul class="nav nav-pills">
                    <?= partial('_pills_nav', array('position'=>'column_1', 'mobile' => 0)); ?>
                </ul>
                <!-- /Pill Navigation -->

                <ul class="nav nav-pills nav-stacked hidden-lg hidden-md visible-sm visible-xs"><!-- nav for Phones and small tablets -->
                    <li class="dropdown active hidden-lg hidden-md visible-sm visible-xs">
                        <a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown"><h4><i class="fa fa-toggle-down"></i> See other tables... <b class="caret"></b></h4></a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">
                            <?= partial('_pills_nav', array('position'=>'column_1', 'mobile' => 1)); ?>
                        </ul>
                    </li>
                </ul><!-- /nav for Phones and small tablets -->


                <div class="tab-content"><!-- Tab Content -->
                    <?= partial('_pills_body', array('position'=>'column_1')); ?>
                </div><!-- /Tab Content -->

            <!-- /Pills -->
            </div><!-- /Column 1, row 2-->  
        </div><!-- Row 2-->

    </div><!-- /12 columns -->
</div><!-- /Enclosing row -->
<?= partial('_debug_footer'); ?>