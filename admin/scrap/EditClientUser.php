<?php
include_once("Common.php");
include("CheckAdminLogin.php");


	$msg="";
	$Status=1;
	$ID=0;
	$FirstName="";
	$LastName="";
	$EmailAddress="";
	$Password="";
	$Role=10;
	$Photo="";
	
	$ID=0;
	if(isset($_REQUEST["ID"]) && ctype_digit(trim($_REQUEST["ID"])))
		$ID=trim($_REQUEST["ID"]);
		
if(isset($_POST["action"]) && $_POST["action"] == "submit_form")
{			
	if(isset($_REQUEST["ID"]) && ctype_digit(trim($_REQUEST["ID"])))
		$ID=trim($_REQUEST["ID"]);
	if(isset($_POST["Status"]) && ((int)$_POST["Status"] == 0 || (int)$_POST["Status"] == 1))
		$Status=trim($_POST["Status"]);	
	if(isset($_POST["FirstName"]))
		$FirstName=trim($_POST["FirstName"]);
	if(isset($_POST["LastName"]))
		$LastName=trim($_POST["LastName"]);
	if(isset($_POST["Password"]))
		$Password=trim($_POST["Password"]);
	if(isset($_POST["EmailAddress"]))
		$EmailAddress=trim($_POST["EmailAddress"]);
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

		if($FirstName == "")
		{
			$msg='<div class="alert alert-danger alert-dismissable">
			<i class="fa fa-ban"></i>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<b>Please enter First Name.</b>
			</div>';
		}
		else if($LastName == "")
		{
			$msg='<div class="alert alert-danger alert-dismissable">
			<i class="fa fa-ban"></i>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<b>Please enter Last Name.</b>
			</div>';
		}
		else if($EmailAddress == "")
		{
			$msg='<div class="alert alert-danger alert-dismissable">
			<i class="fa fa-ban"></i>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<b>Please Enter EmailAddress.</b>
			</div>';
		}
		else if(!validEmailAddress($EmailAddress))
		{
			$msg='<div class="alert alert-danger alert-dismissable">
			<i class="fa fa-ban"></i>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<b>Please Enter valid EmailAddress.</b>
			</div>';
		}

		
		$r = mysql_query("SELECT EmailAddress FROM client_users WHERE 
		EmailAddress='".dbinput($EmailAddress)."' AND ID <> ".$ID."") or die(mysql_error());
		$numR = mysql_num_rows($r);
		//echo $numR;exit();
		if($numR != 0)
		{
			$_SESSION["msg"]='<div class="alert alert-danger alert-dismissable">
			<i class="fa fa-ban"></i>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<b>EmailAddress is Duplicated.</b>
			</div>';
			
			redirect($_SERVER["PHP_SELF"].'?ID='.$ID);	
		}

	if($msg=="")
	{

		$query="UPDATE client_users SET DateModified=NOW(),
				FirstName = '" . dbinput($FirstName) . "',
				LastName = '" . dbinput($LastName) . "',
				Status='".(int)$Status . "',
				EmailAddress = '" . dbinput($EmailAddress) . "',
				".($Password=="" ? '' : "Password = '" . md5($Password) . "',")."
				Role = '" . (int)$Role . "',
				PerformedBy = '" . dbinput($_SESSION['UserID']) . "' Where ID = ".$ID."";
		mysql_query($query) or die (mysql_error());
		// echo $query;
		//$ID = mysql_insert_id();
		$_SESSION["msg"]='<div class="alert alert-success alert-dismissable">
		<i class="fa fa-ban"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<b>Client has been Updated.</b>
		</div>';		
		
		if(isset($_FILES["flPage"]) && $_FILES["flPage"]['name'] != "")
		{
			
		
			ini_set('memory_limit', '-1');
			
			$tempName = $_FILES["flPage"]['tmp_name'];
			$realName = $ID . "." . $ext;
			$StoreImage = $realName; 
			$target = DIR_CLIENTUSERS . $realName;
			if(is_file(DIR_CLIENTUSERS . $StoreImage))
				unlink(DIR_CLIENTUSERS . $StoreImage);
			$moved=move_uploaded_file($tempName, $target);
		
			if($moved)
			{			
			
				$query="UPDATE client_users SET Photo='" . dbinput($realName) . "' WHERE  ID=" . (int)$ID;
				mysql_query($query) or die(mysql_error());
			}
			else
			{
				$_SESSION["msg"]='<div class="alert alert-warning alert-dismissable">
					<i class="fa fa-ban"></i>
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<b>Client has been saved but Photo can not be uploaded.</b>
					</div>';
			}
		}
		
		redirect($_SERVER["PHP_SELF"].'?ID='.$ID);	
	}
		

}
else
{
	$query="SELECT * FROM client_users WHERE  ID='" . (int)$ID . "'";
	
	$result = mysql_query ($query) or die(mysql_error()); 
	$num = mysql_num_rows($result);
	
	if($num==0)
	{
		$_SESSION["msg"]='<div class="alert alert-danger alert-dismissable">
			<i class="fa fa-ban"></i>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<b>Invalid Client ID.</b>
		</div>';
		redirect("ClientUsers.php");
	}
	else
	{
		$row = mysql_fetch_array($result,MYSQL_ASSOC);
		
		$ID=$row["ID"];
		$FirstName=$row["FirstName"];
		$LastName=$row["LastName"];
		$EmailAddress=$row["EmailAddress"];
		$Status=$row["Status"];
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

    <title>Edit Client User</title>

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
                <h3>Edit Client User</h3>
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
					  <li><a href="ClientUsers.php" class="btn btn-default active"><i class="fa fa-arrow-left"></i> Back</a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
				  <?php
		  		//echo $msg;
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
                      <span class="section">Fill All Mandatory Fields</span>

					  <div class="item form-group">
						  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Photo">Photo </label>
						  <div class="col-md-6 col-sm-6 col-xs-12">
						  <img src="<?php echo (is_file(DIR_CLIENTUSERS . $Photo) ? DIR_CLIENTUSERS.$Photo : 'images/avatar.png'); ?>" class="thumbnail" alt="" style="height:100px;" />
						  <input type="file" name="flPage" class="form-control col-md-7 col-xs-12" />
						  <p class="help-block">Image types allowed: jpg, jpeg, gif, png. --- Image size must be <?php echo MAX_IMAGE_SIZE/1024 ?> MB or less.</p>
						  </div>
						</div>
					  
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="FirstName">First Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="FirstName" class="form-control col-md-7 col-xs-12" data-validate-length-range="3" name="FirstName" required="required" type="text" value="<?php echo $FirstName; ?>">
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="LastName">Last Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="LastName" class="form-control col-md-7 col-xs-12" data-validate-length-range="3" name="LastName" required="required" type="text" value="<?php echo $LastName; ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="EmailAddress">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="EmailAddress" name="EmailAddress" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $EmailAddress; ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="Password" class="control-label col-md-3">Password </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="Password" type="password" name="Password" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
						<div class="col-md-6 col-sm-6 col-xs-12" style="margin-top:8px;">
							<label>
							  <input type="radio" name="Status" value="1" <?php echo ($Status == '1' ? 'checked' : ''); ?>> &nbsp; Active &nbsp;
							</label>
							<label>
							  <input type="radio" name="Status" value="0" <?php echo ($Status == '0' ? 'checked' : ''); ?>> &nbsp; Deactive &nbsp;
							</label>
						</div>
					  </div>
					  
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a href="ClientUsers.php" class="btn btn-primary">Cancel</a>
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