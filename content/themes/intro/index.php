<?php echo html('html5'); ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Website Intro</title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <!-- Inspired by https://codepen.io/transportedman/pen/NPWRGq -->

<div class="carousel slide carousel-fade" data-ride="carousel">

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
        </div>
        <div class="item">
        </div>
        <div class="item">
        </div>
    </div>
</div>

<!-- Remeber to put all the content you want on top of the slider below the slider code -->

<div class="title">
 <div class="container-fluid">
	<div class="row">

		 <h1>WE CARRY, WE CARE</h1>
  <p>Transporting Hope to Satisfy your Needs</p>

	</div>
 	</div>
</div>

<div class="services text-center">
	<div class="container">
		<div class="row">
		 <?php
			$r = webintro();
			while ($row = mysqli_fetch_assoc($r)) : ?>
			<div class="col-md-4">
				<div class="service-list">
					<img src="assets/<?php echo $row['image']; ?>" alt="<?php echo $row['label']; ?>">
					<a href="<?php echo $row['name']; ?>">Click Here</a>
				</div>
			</div>
			<?php 	endwhile; mysqli_free_result($r);?>

		</div>
	</div>
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>