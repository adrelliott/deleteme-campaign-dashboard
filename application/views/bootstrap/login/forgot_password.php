<div class="row">
    <div class="well row">
        <div class="col-ld-12 col-md-12 col-sm-12 col-xs-12">

            <div class="row">
                <div class="col-lg-8 col-md-10">
                    <?= $this->messages->show(); ?>   
                </div>
            </div>
            <h1><?php echo lang('forgot_password_heading');?></h1>
            <p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>    
            
            <?= form_open('site/login/forgot_password', 'role="form"');?>

            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                <?= form_input($email); ?>
            </div>

            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <button type="submit" class="btn btn-lg btn-primary pull-right"><i class="fa fa-meh-o"></i> <?= lang('forgot_password_submit_btn');?></button>
            </div>

            <div class="form-group col-lg-12 col-md-12 col-sm-12 visible3-xs">
                <p><a class="" href="<?= site_url('site/login'); ?>">Abort! I've remembered it! Go back to login...</a></p>
            </div>

            <?= form_close(); ?>
        </div>

    </div>
</div>
<? dump($this->data);?>
<? dump($this->session->flashdata('message'));?>

