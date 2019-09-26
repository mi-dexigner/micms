<?php 

/*
*
* Page Template : Contact Us 
*
**/
    if(!$pages){ ?>

    <div class="alert alert-warning" role="alert">
  content not found
</div>


  <?php   }else{ ?>
<?php //echo //get_image_directory_uri().$pages[0]->featured; ?>


  <div class="banner inner-page contact-banner ">
		<div class="banner-content">
			<div class="container">
				<div class="row">
					<div class="banner-text">
						<h1 class="page-title"><?php  echo $pages[0]->title ; ?></h1>
						<!-- <p class="page-breadcrumb">Home / <span class="current"><?php  echo $pages[0]->title ; ?></span></p> -->
					</div>
				</div>
			</div>
		</div>
	</div>
  
 

<!-- Contact -->
	<div class="contact section-pad">
		<div class="container">
			<div class="row">
				<div class="contact-wrapper row">
					<div class="contact-group col-md-6">
						<div class="contact-group">
							<h3 class="contact-heading"><?php  echo $pages[0]->title ; ?></h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolor.</p>
							<ul class="contact-list">
								<li>
									<i class="fa fa-map" aria-hidden="true"></i>
									<span>1234 Sed ut perspiciatis Road, <br>At vero eos, D58 8975, London.</span>
								</li>
								<li>
									<i class="fa fa-phone" aria-hidden="true"></i>
									<span>Toll Free : (123) 4567 8910<br>
									Telephone : (123) 1234 5678</span>
								</li>
								<li>
									<i class="fa fa-envelope" aria-hidden="true"></i>
									<span>Email : <a href="#">info@sitename.com</a><br>
									Web : <a href="#">www.sitename.com</a></span>
								</li>
								<li>
									<i class="fa fa-clock-o" aria-hidden="true"></i><span>Sat - Thu: 8AM - 7PM </span>
								</li>
							</ul>
						</div>
					</div>
					<div class="message col-md-6">
						<div class="message-group">
							<h3 class="contact-heading">send us a message</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolor.</p>

							<form id="contact-us" class="form-message" action="form/contact.php" method="post">
								<div class="form-results"></div>
								<div class="form-group row">
									<div class="form-field col-md-6 form-m-bttm">
										<input name="contact-name" type="text" placeholder="Name *" class="form-control required">
									</div>
									<div class="form-field col-md-6">
										<input name="contact-email" type="email" placeholder="Email *" class="form-control required email">
									</div>
								</div>
								<div class="form-group row">
									<div class="form-field col-md-6 form-m-bttm">
										<input name="contact-phone" type="text" placeholder="Phone" class="form-control">
									</div>
									<div class="form-field col-md-6">
										<input name="contact-service" type="text" placeholder="Interest of Service" class="form-control">
									</div>
								</div>
								<div class="form-group row">
									<div class="form-field col-md-12">
										<textarea name="contact-message" placeholder="Messages *" class="area-from form-control required"></textarea>
									</div>
								</div>
								<input type="text" class="hidden" name="form-anti-honeypot" value="">
								<button type="submit" class="btn solid-btn sb-h">Submit</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Contact -->

	<!-- Map -->
	<div class="map-holder contact-page">
		<div id="gmap"></div>
	</div>
	<!-- End map -->





  <?php } ?>


