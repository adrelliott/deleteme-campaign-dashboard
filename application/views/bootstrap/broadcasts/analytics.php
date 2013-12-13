<div class="row"><!-- Encosing Row -->
    <div class="col-xs-12"><!-- 12 columns -->
        
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
                        
                       //analytcis go here

                    </div>
                </div><!-- /Well -->   
            </div><!-- /Column 1-->

            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"><!-- Column 2-->

                <!-- Panel 1 -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Analytics Settings</h3>
                    </div>
                    <div class="panel-body">
                        //analytics settings
                    </div>
                </div>
                <!-- /Panel 1 -->

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

        </div><!-- /Main Content-->

    </div><!-- /12 columns -->
</div><!-- /Enclosing row -->
<?= partial('_modal_small'); ?>
<?= partial('_debug_footer'); ?>
