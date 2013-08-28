</div> <!-- /container -->


<div id="footer">
  <div class="container">
    <p class="text-muted credit">&copy; Dallas Matthews 2009 - <?php echo date('Y'); ?></p>
  </div>
</div>

<?php if (ENVIRONMENT === 'development'): ?> 
  <script src="<?php //echo base_url('assets/js/jquery-203.js'); ?>"></script>
  <script src="<?php //echo base_url('assets/js/jquery.dataTables.js'); ?>"></script>
  <script src="<?php //echo base_url('assets/js/jquery-ui.min.js'); ?>"></script>
  <script src="<?php //echo base_url('assets/lodash/lodash.min.js'); ?>"></script>
<?php else : ?>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
  <script //src="http://cdnjs.cloudflare.com/ajax/libs/lodash.js/1.2.1/lodash.min.js"></script>
<?php endif; ?>
  <script src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
  <script src="<?php //echo base_url('assets/js/bootstrap-typeahead.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/jasny-bootstrap.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/jquery.dataTables.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/app.js'); ?>"></script>

</body>
</html>
<?php 
	if (ENVIRONMENT !== 'production'  && isset($_GET['debug']))
	{
		$this->output->enable_profiler(TRUE);
		echo '<br/>Heres the contents of data';dump($debug);
	}