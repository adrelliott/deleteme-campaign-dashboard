    </div><!-- end of container div -->
    <div id="footer">
      <div class="container">
        <p class="text-muted credit">Copyright <a href="http://DallasMatthews.co.uk" target="_blank">Dallas Matthews Ltd</a> <?php echo date('Y'); ?></p>
      </div>
    </div>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

  <?php 
    /* Get local copies of libraries if its a local version... */ 
    if (ENVIRONMENT === 'development') :
  ?>
    <script src="<?php echo site_url('assets/bootstrap-3/js/jquery/1.9.1/jquery.min.js'); ?>"></script>
    <script src="<?php echo site_url('assets/bootstrap-3/js/bootstrap/bootstrap.min.js'); ?>"></script>
    <script src="<?php //echo site_url('assets/bootstrap-3/js/jasny-bootstrap.js'); ?>"></script>
    <script src="<?php //echo site_url('assets/bootstrap-3/js/bootstrap-modal.js'); ?>"></script>

  <?php 
  /* ...else get them from CDNs... */
  else: ?>
    <script type='text/javascript' src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type='text/javascript' src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
  <?php endif; ?>

  <script src="<?php echo site_url('assets/bootstrap-3/js/bootstrap/bootstrap-datepicker.js'); ?>"></script>
  <script src="<?php echo base_url('assets/bootstrap-3/js/libs/jquery.dataTables.js'); ?>"></script>
  <script src="<?php echo site_url('assets/bootstrap-3/js/libs/app.js'); ?>"></script>

  </body>
</html>