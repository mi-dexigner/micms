<!-- Banner -->
<div id="slider"  class="banner carousel slide carousel-fade slider-<?php echo $defaultRow['website_type']; ?>">
		<!-- Wrapper for Slides -->
		<div class="carousel-inner">
		<?php $i= 0;	 foreach($sliders as $slider): ?>
			<div class="item <?php if($i == 0){ echo 'active'; } ?>">
				<!-- Set the first background image using inline CSS below. -->
				
				<div class="fill" style="background-image:url('<?php echo get_template_directory_uri().'/'.get_image_directory_uri().$slider->images; ?>');">
					<div class="banner-content">
						<?php echo $slider->content; ?>
						<!-- <div class="container">
							<div class="row">
								<div class="banner-text">
									<div class="animated fadeInRight">
										<h1><?php //echo $slider->title; ?></h1>
										<?php echo $slider->content; ?>
									</div>
								</div>
							</div>
						</div> -->
					</div>
				</div>
				
				
				
			</div>
			<?php $i++; endforeach;?>
			
		</div>
		<?php if($i != 0) : ?>
		<!-- Left and right controls -->
		<a class="left carousel-control" href="#slider" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#slider" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
		<?php  endif; ?>
	</div>
	<!-- End banner -->

<!--<div id="mainslider-<?php echo $defaultRow['website_type']; ?>" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
   <?php $i= 0;	foreach($sliders as $slider): ?>	
    <div class="carousel-item <?php if($i == 0){ echo 'active'; } ?> ">

      <img class="d-block w-100" src="<?php echo get_image_directory_uri().$slider->images; ?>" alt="First slide">
	   <div class="carousel-caption">
    <h3><?php echo $slider->title; ?></h3>
    <p><?php echo $slider->content; ?></p>
  </div>
  
    </div>
<?php $i++; endforeach;?>
 
  </div>
 <?php if($i != 0) : ?>
  <a class="carousel-control-prev" href="#mainslider-<?php echo $sliders[0]->website_type; ?>" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#mainslider-<?php echo $sliders[0]->website_type; ?>" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
 <?php  endif; ?>
</div>	-->
