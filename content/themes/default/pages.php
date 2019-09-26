    <?php

    if(!$pages){  ?>


      <div class="alert alert-warning" role="alert">
  content not found
</div>



  <?php   }else{  ?>

    <!-- Banner -->
	<div class="banner inner-page service-banner">
		<div class="banner-content">
			<div class="container">
				<div class="row">
					<div class="banner-text">
						<h1 class="page-title"><?php echo $pages[0]->title; ?> </h1>
						<p class="page-breadcrumb">Home / <span class="current"><?php echo $pages[0]->title; ?></span></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End banner -->

<!-- Main Content -->
	<div class="main-content about-us section-pad">
		<div class="container">
			<div class="row">
				<div class="about-wrapper row">
					<div class="col-md-5 col-sm-5 res-m-bttm">
						<img alt="" src="<?php echo get_template_directory_uri(); ?>/image/abt-left-img.jpg">
					</div>
					<div class="col-md-7 col-sm-7">
						<div class="about-text">
							<h2 class="section-heading"><?php echo $pages[0]->title; ?></h2>
							<?php  echo $pages[0]->content ; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Main content -->





  <?php } ?>
