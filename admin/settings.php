<?php
require_once("../include/inc_head.php");
include("checkadminlogin.php"); 


	$msg="";
	$Name="";
	$Photo="";

	$ID=1;

if(isset($_POST["action"]) && $_POST["action"] == "submit_form")
{
	if(isset($_POST["Name"]))
		$Name=trim($_POST["Name"]);
	if(isset($_FILES["flPage"]) && $_FILES["flPage"]['name'] != "")
	{
		$filenamearray=explode(".", $_FILES["flPage"]['name']);
		$ext=strtolower($filenamearray[sizeof($filenamearray)-1]);

		if(!in_array($ext, $_IMAGE_ALLOWED_TYPES))
		{
			$msg='<div class="alert alert-danger alert-dismissable">
			<i class="fa fa-ban"></i>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<b>Only '.implode(", ", $_IMAGE_ALLOWED_TYPES) . ' files can be uploaded.</b>
			</div>';
		}
		else if($_FILES["flPage"]['size'] > (MAX_IMAGE_SIZE*1024))
		{
			$msg='<div class="alert alert-danger alert-dismissable">
			<i class="fa fa-ban"></i>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<b>Image size must be ' . MAX_IMAGE_SIZE . ' KB or less.</b>
			</div>';
		}
	}

		if($Name == "")
		{
			$msg='<div class="alert alert-danger alert-dismissable">
			<i class="fa fa-ban"></i>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<b>Please enter Name.</b>
			</div>';
		}


	if($msg=="")
	{

		$query="UPDATE settings SET DateModified=NOW(),
				Name = '" . dbinput($Name) . "',
				PerformedBy = '" . dbinput($_SESSION['UserID']) . "' Where ID = ".$ID."";
		mysqli_query($db,$query) or die (mysqli_error());


		// echo $query;
		//$ID = mysql_insert_id();
		$_SESSION["msg"]='<div class="alert alert-success alert-dismissable">
		<i class="fa fa-ban"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<b>Settings has been Updated.</b>
		</div>';

		if(isset($_FILES["flPage"]) && $_FILES["flPage"]['name'] != "")
		{


			ini_set('memory_limit', '-1');

			$tempName = $_FILES["flPage"]['tmp_name'];
			$realName = $ID . "." . $ext;
			$StoreImage = $realName;
			$target = DIR_SETTINGS . $realName;
			if(is_file(DIR_SETTINGS . $StoreImage))
				unlink(DIR_SETTINGS . $StoreImage);
			$moved=move_uploaded_file($tempName, $target);

			if($moved)
			{

				$query="UPDATE settings SET Photo='" . dbinput($realName) . "' WHERE  ID=" . (int)$ID;
				mysqli_query($db,$query) or die(mysqli_error());
			}
			else
			{
				$_SESSION["msg"]='<div class="alert alert-warning alert-dismissable">
					<i class="fa fa-ban"></i>
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<b>Settings has been saved but Icon can not be uploaded.</b>
					</div>';
			}
		}

		redirect($_SERVER["PHP_SELF"]);
	}


}
else
{
	$query="SELECT * FROM settings WHERE  ID='" . (int)$ID . "'";

	$result = mysqli_query ($db,$query) or die(mysql_error());
	$num = mysqli_num_rows($result);

	if($num==0)
	{
		$_SESSION["msg"]='<div class="alert alert-danger alert-dismissable">
			<i class="fa fa-ban"></i>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<b>Invalid Settings ID.</b>
		</div>';
		redirect($_SERVER["PHP_SELF"]);
	}
	else
	{
		$row = mysqli_fetch_array($result);

		$Name=$row["Name"];
		$Photo=$row["Photo"];
	}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Settings</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php include_once("Sidebar.php"); ?>

        <?php include_once("Header.php"); ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Settings</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                              <button class="btn btn-default" type="button">Go!</button>
                          </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Update Form</h2>
					<ul class="nav navbar-right panel_toolbox">
                      <li><a href="Dashboard.php" class="btn btn-default active"><i class="fa fa-arrow-left"></i> Back</a></li>
                    </ul>
					<div class="clearfix"></div>
                  </div>
				  <?php
		  		//echo $msg;
				if(isset($_SESSION["EmptyPassword"]))
				{
					echo $_SESSION["EmptyPassword"];
					$_SESSION["EmptyPassword"]="";
				}
				if(isset($_SESSION["msg"]))
				{
					echo $_SESSION["msg"];
					$_SESSION["msg"]="";
				}
				?>
                  <div class="x_content">

                    <form id="frmPages" action="<?php echo $_SERVER["PHP_SELF"];?>?ID=<?php echo $ID; ?>" method="post"  enctype="multipart/form-data" class="form-horizontal form-label-left" novalidate>
					  <input type="hidden" name="action" value="submit_form" />
					  <input type="hidden" name="ID" value="<?php echo $ID; ?>" />
                      <span class="section">Basic Information</span>

					  <div class="item form-group">
						  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Photo">Icon </label>
						  <div class="col-md-6 col-sm-6 col-xs-12">
						  <img src="<?php echo (is_file(DIR_SETTINGS . $Photo) ? DIR_SETTINGS.$Photo : 'images/avatar2.png'); ?>" class="thumbnail" alt="" style="height:100px;" />
						  <input type="file" name="flPage" class="form-control col-md-7 col-xs-12" />
						  <p class="help-block">Image types allowed: jpg, jpeg, gif, png. --- Image size must be <?php echo MAX_IMAGE_SIZE/1024 ?> MB or less. (50 x 50 Pixels)</p>
						  </div>
						</div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Name">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="Name" class="form-control col-md-7 col-xs-12" data-validate-length-range="2" name="Name" required="required" type="text" value="<?php echo $Name; ?>">
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a href="Dashboard.php" class="btn btn-primary">Cancel</a>
                          <button id="send" type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <?php include_once("Footer.php"); ?>
      </div>
    </div>

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- validator -->
    <script src="vendors/validator/validator.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>

    <!-- validator -->
    <script>
      // initialize the validator function
      validator.message.date = 'not a real date';

      // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
      $('form')
        .on('blur', 'input[required], input.optional, select.required', validator.checkField)
        .on('change', 'select.required', validator.checkField)
        .on('keypress', 'input[required][pattern]', validator.keypress);

      $('.multi.required').on('keyup blur', 'input', function() {
        validator.checkField.apply($(this).siblings().last()[0]);
      });

      $('form').submit(function(e) {
        e.preventDefault();
        var submit = true;

        // evaluate the form using generic validaing
        if (!validator.checkAll($(this))) {
          submit = false;
        }

        if (submit)
          this.submit();

        return false;
      });
    </script>
    <!-- /validator -->
  </body>
</html>
