<?php 

/*
*
* Page Template : Service
*
**/
    if(!$pages){ ?>

    <div class="alert alert-warning" role="alert">
  content not found
</div>


  <?php   }else{ ?>
<?php //echo //get_image_directory_uri().$pages[0]->featured; ?>


  <div class="banner inner-page contact-banner">
		<div class="banner-content">
			<div class="container">
				<div class="row">
					<div class="banner-text">
						<h1 class="page-title"><?php  echo $pages[0]->title ; ?></h1>
						<p class="page-breadcrumb">Home / <span class="current"><?php  echo $pages[0]->title ; ?></span></p>
					</div>
				</div>
			</div>
		</div>
	</div>
  
 

<!-- Our Service -->
        <div class="section-full awesome-services bg-white p-t60 p-b40">
            <div class="container">
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-12 text-center section-head">
                            <h3 class="h3">Our Services</h3>
                            <div class="dez-separator bg-primary"></div>
                            <div class="clear"></div>
                            <p class="m-b0">Lorem Ipsum is simply dummy text of the printing and typesetting industry has been the industry's standard dummy text ever since the been when an unknown printer.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <div class="dez-box m-b30">
                                <div class="dez-media dez-img-effect zoom"> <img src="<?php echo get_template_directory_uri(); ?>/assets/image/our-work/pic1.jpg" alt="">
                                    <div class="dez-info-has p-a20 bg-secondry no-hover">
                                        <div class="icon-bx-wraper center">
                                            <div class="icon-md text-primary m-b20"> <a href="#" class="icon-cell"><i class="fa fa-shopping-basket"></i></a> </div>
                                            <div class="icon-content">
                                                <h3 class="dez-tilte m-b5">Import Export Goods</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam</p>
                                                <a href="#" class="site-button-link">Read More</a> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="dez-box m-b30">
                                <div class="dez-media dez-img-effect zoom"> <img src="<?php echo get_template_directory_uri(); ?>/assets/image/our-work/pic2.jpg" alt="">
                                    <div class="dez-info-has p-a20 bg-secondry no-hover">
                                        <div class="icon-bx-wraper center">
                                            <div class="icon-md text-primary m-b20"> <a href="#" class="icon-cell"><i class="fa fa-truck"></i></a> </div>
                                            <div class="icon-content">
                                                <h3 class="dez-tilte m-b5">Fast Delivery Network</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam</p>
                                                <a href="#" class="site-button-link">Read More</a> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="dez-box m-b30">
                                <div class="dez-media dez-img-effect zoom"> <img src="<?php echo get_template_directory_uri(); ?>/assets/image/our-work/pic3.jpg" alt="">
                                    <div class="dez-info-has p-a20 bg-secondry no-hover">
                                        <div class="icon-bx-wraper center">
                                            <div class="icon-md text-primary m-b20"> <a href="#" class="icon-cell"><i class="fa fa-map-marker"></i></a> </div>
                                            <div class="icon-content">
                                                <h3 class="dez-tilte m-b5">Well Qualified Staff</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam</p>
                                                <a href="#" class="site-button-link">Read More</a> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="dez-box m-b30">
                                <div class="dez-media dez-img-effect zoom"> <img src="<?php echo get_template_directory_uri(); ?>/assets/image/our-work/pic4.jpg" alt="">
                                    <div class="dez-info-has p-a20 bg-secondry no-hover">
                                        <div class="icon-bx-wraper center">
                                            <div class="icon-md text-primary m-b20"> <a href="#" class="icon-cell"><i class="fa fa-user"></i></a> </div>
                                            <div class="icon-content">
                                                <h3 class="dez-tilte m-b5">User Friendly</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam</p>
                                                <a href="#" class="site-button-link">Read More</a> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="dez-box m-b30">
                                <div class="dez-media dez-img-effect zoom"> <img src="<?php echo get_template_directory_uri(); ?>/assets/image/our-work/pic5.jpg" alt="">
                                    <div class="dez-info-has p-a20 bg-secondry no-hover">
                                        <div class="icon-bx-wraper center">
                                            <div class="icon-md text-primary m-b20"> <a href="#" class="icon-cell"><i class="fa fa-laptop"></i></a> </div>
                                            <div class="icon-content">
                                                <h3 class="dez-tilte m-b5">Lifetime Support</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam</p>
                                                <a href="#" class="site-button-link">Read More</a> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="dez-box m-b30">
                                <div class="dez-media dez-img-effect zoom"> <img src="<?php echo get_template_directory_uri(); ?>/assets/image/our-work/pic6.jpg" alt="">
                                    <div class="dez-info-has p-a20 bg-secondry no-hover">
                                        <div class="icon-bx-wraper center">
                                            <div class="icon-md text-primary m-b20"> <a href="#" class="icon-cell"><i class="fa fa-gift"></i></a> </div>
                                            <div class="icon-content">
                                                <h3 class="dez-tilte m-b5">Great Discounts</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam</p>
                                                <a href="#" class="site-button-link">Read More</a> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Our Awesome Services END -->






  <?php } ?>


