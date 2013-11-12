    </div><!-- end of container div -->
    
    <div class="navbar navbar-default navbar-fixed-bottom">
      <div class="container">
        <p class="navbar-text text-muted credit">Copyright <a href="http://DallasMatthews.co.uk" target="_blank">Dallas Matthews Ltd</a> <?= date('Y'); ?></p>
      </div>
    </div>

    



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

  <? 
    /* Get local copies of libraries if its a local version... */ 
    if (ENVIRONMENT === 'development') :
  ?>
    <script src="<?= site_url('assets/bootstrap-3/js/jquery/1.9.1/jquery.min.js'); ?>"></script>
    <script src="<?= site_url('assets/bootstrap-3/js/bootstrap/bootstrap.min.js'); ?>"></script>
    <script src="<? //echo site_url('assets/bootstrap-3/js/jasny-bootstrap.js'); ?>"></script>
    <script src="<? //echo site_url('assets/bootstrap-3/js/bootstrap-modal.js'); ?>"></script>

  <? 
  /* ...else get them from CDNs... */
  else: ?>
    <script type='text/javascript' src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type='text/javascript' src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
  <? endif; ?>

  <script src="<?= site_url('assets/bootstrap-3/js/bootstrap/bootstrap-datepicker.js'); ?>"></script>
  
  <!-- Datatbles Jquery -->
  <script src="<?= base_url('assets/bootstrap-3/js/libs/jquery.dataTables.js'); ?>"></script>
  <script src="<?= base_url('assets/bootstrap-3/js/libs/dataTables.bootstrapPagination.js'); ?>"></script>
  <script src="<?php echo base_url('assets/bootstrap-3/js/libs/dataTables.editor.min.js'); ?>"></script>

  <script src="<?= site_url('assets/bootstrap-3/js/libs/app.js'); ?>"></script>

  <!-- Include any custom style sheets/scripts/meta etc for this client -->
  <? 
    if ($element = config('include_in_footer', 'extras'))
    {
      foreach ($element as $type => $path)
      {
        if($type == 'script')
        {
          echo '<script src="' . site_url($path) . '"></script>';
        }
        elseif($type == 'stylesheet')
        {
          echo '<link href="' . site_url($path) . '" rel="stylesheet">';    
        }
      }
    };
  ?>

  </body>
</html>