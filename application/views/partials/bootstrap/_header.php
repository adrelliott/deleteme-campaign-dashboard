<!DOCTYPE html>
<html lang="en">
<head>
   <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="">
   <meta name="keywords" content="">
   <meta name="author" content="">

   <title>Campaign Dashboard</title>

   <link href="<?php echo base_url('assets/css/bootstrap.css') ?>" rel="stylesheet">
   <link href="<?php echo base_url('assets/css/navbar-fixed-top.css') ?>" rel="stylesheet">
   <link href="<?php //echo base_url('assets/css/bootstrap-responsive.min.css') ?>" rel="stylesheet">
   <link href="<?php echo base_url('assets/css/datatables_table.css') ?>" rel="stylesheet">
   <link href="<?php //echo base_url('assets/css/font-awesome.css') ?>" rel="stylesheet">
   <link href="<?php echo base_url('assets/css/custom.css') ?>" rel="stylesheet">

   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php echo base_url('assets/css/js/html5shiv.js'); ?>"></script>
      <script src="<?php echo base_url('assets/css/js/respond.min.js'); ?>"></script>
    <![endif]-->


<!-- MOVE to footer! -->

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

   
</head>
<body>