	<hr>
	<footer>
    	<p>&copy; Dallas Matthews 2009 - <?php echo date('Y'); ?></p>
  	</footer>

</div> <!-- /container -->


</body>
</html>

<small>
	<?php 
		if (ENVIRONMENT !== 'production')
		{
			$this->output->enable_profiler(TRUE);
			echo '<br/>Heres the contents of data';dump($debug);
		} 
	?>
</small>