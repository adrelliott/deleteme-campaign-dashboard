<div class="row">
    <div class="jumbotron ">
        <div class="row">
            <div class="col-lg-8 col-md-10">
                <?= $this->messages->show(); ?>   
            </div>
        </div>
        <h1>Well, hello there!</h1>
        <p>Glad you could make it. You know what to do...</p> 
        <?= form_open('site/login', 'role="form"');?>
        <div class="form-group col-lg-12 col-md-12 col-sm-12">
            <label for="inputUsernameEmail">What's your username?</label>
            <?= form_input('identity', $identity['value'], 'class="form-control input-lg" id="identity"'); ?>
            <!-- <input type="text"  value=""> -->
        </div>
        <div class="form-group col-lg-12 col-md-12 col-sm-12">
            <label for="inputPassword">Password</label>
            <?= form_password('password', '', 'class="form-control input-lg" id="password"'); ?>
        </div>

        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <p class="pull-right"><?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?> Remember me!</p>
        </div>
        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <button type="submit" class="btn btn-lg btn-primary pull-right"><i class="fa fa-lock"></i> Let's Go!</button>
        </div>
        <div class="clearfix"></div>
        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <p><a class="" href="<?= site_url('site/login/forgot_password'); ?>">Forgotten your login?</a></p>
        </div>

        <?= form_close(); ?>
    </div>    
</div>