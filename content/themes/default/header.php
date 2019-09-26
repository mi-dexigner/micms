<?php echo html('html5'); ?>
<html <?php echo $_PAGE['lang']; ?>>
<head>
	<title><?php echo $_PAGE['title']; ?></title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="robots" content="<?php echo $_PAGE['robots']; ?>">
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/theme/image/icon.ico" type="image/x-icon" sizes="16x16">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/theme/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/theme/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/theme/css/animate.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/theme/css/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/theme/css/style.css">
   
</head>
<body>
	<!-- navbar -->
	<nav class="navbar navbar-default navbar-custom navbar-fixed-top" data-spy="affix" data-offset-top="100">
		<div class="top-bar">
			<div class="container">
				<div class="row">
					<ul class="contact">
						<li class="phone">
							<i class="fa fa-mobile" aria-hidden="true"></i>
							<span>+92 21 32401181-85</span>
						</li>
						<li class="mail hidden-xs">
							<i class="fa fa-envelope-o" aria-hidden="true"></i>
							<span>info@theme.com.pk</span>
						</li>
						
					</ul>
					<ul class="social">
						<li>
							<a href="javascript:void(0)"><i class="fa fa-facebook" aria-hidden="true"></i></a>
						</li>
						<li>
							<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
						</li>
						<li>
							<a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
						</li>
						<li>
							<a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="bottom-nav">
			<div class="container">
				<div class="row">
					<div class="navbar-header">
				      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
				      <a class="navbar-brand" href="<?php echo get_template_directory_uri().'/' ?>"><img alt="" src="<?php echo get_template_directory_uri(); ?>/assets/theme/image/logo.png" srcset="<?php echo get_template_directory_uri(); ?>/assets/theme/image/logo.png 1x, <?php echo get_template_directory_uri(); ?>/assets/theme/assets/image/logo2x.png 2x"></a>
				    </div>

				    <!-- Collect the nav links, forms, and other content for toggling -->
				    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

					<ul class="nav navbar-nav ">


<?php //nav(); ?>
					 <?php

					
//vd($nav);
					echo bootstrap_menu($nav); ?>
				
					</ul>
					</div>    
					<!-- /.navbar-collapse -->
				</div>
			</div>
		</div>
	</nav>
	

