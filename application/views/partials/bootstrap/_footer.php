	<hr>
	<footer>
    	<p>&copy; Dallas Matthews 2009 - <?php echo date('Y'); ?></p>
  	</footer>

</div> <!-- /container -->

<?php if (ENVIRONMENT === 'development'): ?> 
	<script src="<?php echo base_url('assets/js/jquery-203.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.dataTables.js'); ?>"></script>
	<script src="<?php //echo base_url('assets/js/jquery-ui.min.js'); ?>"></script>
	<script src="<?php //echo base_url('assets/lodash/lodash.min.js'); ?>"></script>
<?php else : ?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<script //src="http://cdnjs.cloudflare.com/ajax/libs/lodash.js/1.2.1/lodash.min.js"></script>
<?php endif; ?>
	<script src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>

</body>
</html>

<small><?php if (ENVIRONMENT !== 'production') echo '<br/>Heres the contents of data';dump($debug); ?></small>