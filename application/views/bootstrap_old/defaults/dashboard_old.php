<div class="row"><!-- Encosing Row -->
    <div class="col-xs-12"><!-- 12 columns -->

        <div class="row"><!-- Top row-->
            <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12"><!-- Column 1, top row-->
                <div class="jumbotron">
                    <div class="container">
                        <div class="row">
                            <?= $this->messages->show(); ?> 
                        </div>
                        <h1>Hi Al!</h1>
                        <p>What do you fancy doing today?</p>
                        <div class="btn-group pull-right">
                            <button type="button" class="btn btn-lg btn-default dropdown-toggle" data-toggle="dropdown">
                                We could... <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <?= partial('_button_extraactions_dropdown'); ?>
                            </ul>
                        </div>
                    </div>  
                </div>
            </div><!-- /Column 1, toP Row-->

            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12"><!-- Column 2, top row-->
                <div class="well"><!-- Well -->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><!-- /col-->
                    <!-- Pills -->

                        <!-- Pill Navigation -->
                        <ul class="nav nav-pills">
                            <?= partial('_pills_nav_col2_desktop'); ?>
                        </ul>
                        <!-- /Pill Navigation -->

                        <ul class="nav nav-pills nav-stacked hidden-lg hidden-md visible-sm visible-xs"><!-- nav for Phones and small tablets -->
                            <li class="dropdown active hidden-lg hidden-md visible-sm visible-xs">
                                <a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown"><h4><i class="fa fa-toggle-down"></i> See other tables... <b class="caret"></b></h4></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">
                                    <?= partial('_pills_nav_col2_mobile'); ?>
                                </ul>
                            </li>
                        </ul><!-- /nav for Phones and small tablets -->

                        <div class="tab-content"><!-- Tab Content -->  
                            <?= partial('_pills_body_col2'); ?>
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
                    <?= partial('_pills_nav_col1_desktop'); ?>
                </ul>
                <!-- /Pill Navigation -->

                <ul class="nav nav-pills nav-stacked hidden-lg hidden-md visible-sm visible-xs"><!-- nav for Phones and small tablets -->
                    <li class="dropdown active hidden-lg hidden-md visible-sm visible-xs">
                        <a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown"><h4><i class="fa fa-toggle-down"></i> See other tables... <b class="caret"></b></h4></a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">
                            <?= partial('_pills_nav_col1_mobile'); ?>
                        </ul>
                    </li>
                </ul><!-- /nav for Phones and small tablets -->

                <div class="tab-content"><!-- Tab Content -->
                    <?= partial('_pills_body_col1'); ?>
                </div><!-- /Tab Content -->

            <!-- /Pills -->
            </div><!-- /Column 1, row 2-->  
        </div><!-- Row 2-->

    </div><!-- /12 columns -->
</div><!-- /Enclosing row -->
<?= partial('_debug_footer'); ?>