<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	<meta content="Start your development with a Dashboard for Bootstrap 4." name="description">
	<meta content="Spruko" name="author">

	<!-- Title -->
    <title><?= isset($page_title) ? $page_title.' | ' : "" ?><?= env('system_name') ?></title>

	<!-- Favicon -->
	<link rel="icon" type="image/png" href="<?php echo base_url('assets/img/brand/favicon.png'); ?>" >
    

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800" rel="stylesheet">

	<!-- Icons -->
    <link  rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/icons.css'); ?>">
    <link  rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/icons.css'); ?>">


	<!--Bootstrap.min css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css'); ?>">

	<!-- Ansta CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/dashboard.css'); ?>">

	<!-- Tabs CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/tabs/style.css'); ?>">

	<!-- jvectormap CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css'); ?>">

	<!-- Custom scroll bar css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/customscroll/jquery.mCustomScrollbar.css'); ?>">


	<!-- Sidemenu Css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/toggle-sidebar/css/sidemenu.css'); ?>">

    <!-- Ansta Scripts -->
	<!-- Core -->

   <!-- fe icon -->
   <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>


</head>
<body class="app sidebar-mini rtl" >


<?= $this->renderSection('content') ?>

<script type="text/javascript" src="<?php echo base_url('assets/plugins/jquery/dist/jquery.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/popper.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>


	<!-- Echarts JS -->
    <script type="text/javascript" src="<?php echo base_url('assets/plugins/chart-echarts/echarts.js'); ?>"></script>


	<!-- Fullside-menu Js-->
    <script type="text/javascript" src="<?php echo base_url('assets/plugins/toggle-sidebar/js/sidemenu.js'); ?>"></script>

	<!-- Custom scroll bar Js-->
    <script type="text/javascript" src="<?php echo base_url('assets/plugins/customscroll/jquery.mCustomScrollbar.concat.min.js'); ?>"></script>

	<!-- peitychart -->
    <script type="text/javascript" src="<?php echo base_url('assets/plugins/peitychart/jquery.peity.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/plugins/peitychart/peitychart.init.js'); ?>"></script>

	<!-- Vector Plugin -->
    <script type="text/javascript" src="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/plugins/jvectormap/gdp-data.js'); ?>"></script>

    <script type="text/javascript" src="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-us-aea-en.js'); ?>"></script>

    <script type="text/javascript" src="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-uk-mill-en.js'); ?>"></script>

    <script type="text/javascript" src="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-au-mill.js'); ?>"></script>

    <script type="text/javascript" src="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-ca-lcc.js'); ?>"></script>

    <script type="text/javascript" src="<?php echo base_url('assets/js/dashboard2map.js'); ?>"></script>

 
	<!-- Ansta JS -->
    <script type="text/javascript" src="<?php echo base_url('assets/js/custom.js'); ?>"></script>

    <script type="text/javascript" src="<?php echo base_url('assets/js/customtwo.js'); ?>"></script>

    <script type="text/javascript" src="<?php echo base_url('assets/js/dashboard-sales.js'); ?>"></script>
</body>
</html>