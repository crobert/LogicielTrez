    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Logiciel Trez<?php echo isset ($title) ? ' - ' . $title : '';?></title>
    <!-- Twitter Bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendors/bootstrap/css/bootstrap.min.css');?>" />
    <!-- optional CSS assets -->
<?php if (in_array('jquery-ui', $assets)) : ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendors/jquery-ui/jquery-ui.css');?>" />
<?php endif; ?>
<?php if (in_array('chosen', $assets)) : ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendors/chosen/chosen.css');?>" />
<?php endif; ?>
    <!-- our stylesheets - in last to override TB -->
    <link rel="stylesheet/less" type="text/css" href="<?php echo base_url('assets/less/style.less');?>" />
    <!-- some Js libs -->
    <script type="text/javascript" src="<?php echo base_url('assets/vendors/jquery.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/vendors/less.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/vendors/bootstrap/js/bootstrap.min.js');?>"></script>
    <!-- optional Js libs -->
<?php if (in_array('jquery-ui', $assets)) : ?>
    <script type="text/javascript" src="<?php echo base_url('assets/vendors/jquery-ui/jquery-ui.min.js');?>"></script>
<?php endif; ?>
<?php if (in_array('chosen', $assets)) : ?>
    <script type="text/javascript" src="<?php echo base_url('assets/vendors/chosen/chosen.jquery.min.js');?>"></script>
<?php endif; ?>

