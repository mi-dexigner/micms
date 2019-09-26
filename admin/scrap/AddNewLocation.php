<?php
include_once("Common.php");
include("CheckAdminLogin.php");


	$msg="";
	$Status=1;
	$ID=0;
	$Name="";
	$ClientID=0;
		
if(isset($_POST["action"]) && $_POST["action"] == "submit_form")
{			
	if(isset($_POST["Status"]) && ((int)$_POST["Status"] == 0 || (int)$_POST["Status"] == 1))
		$Status=trim($_POST["Status"]);	
	if(isset($_POST["ClientID"]) && ctype_digit($_POST['ClientID']))
		$ClientID=trim($_POST["ClientID"]);
	if(isset($_POST["Name"]))
		$Name=trim($_POST["Name"]);
	
		if($Name == "")
		{
			$msg='<div class="alert alert-danger alert-dismissable">
			<i class="fa fa-ban"></i>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<b>Please enter Location Name.</b>
			</div>';
		}
		else if($ClientID == 0)
		{
			$msg='<div class="alert alert-danger alert-dismissable">
			<i class="fa fa-ban"></i>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<b>Please select Client.</b>
			</div>';
		}	


	if($msg=="")
	{

		$query="INSERT INTO locations SET DateAdded=NOW(),
				Name = '" . dbinput($Name) . "',
				Status='".(int)$Status . "',
				ClientID='".(int)$ClientID . "',
				PerformedBy = '" . dbinput($_SESSION['UserID']) . "'";
		mysql_query($query) or die (mysql_error());
		// echo $query;
		$ID = mysql_insert_id();
		$_SESSION["msg"]='<div class="alert alert-success alert-dismissable">
		<i class="fa fa-ban"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<b>Location has been added.</b>
		</div>';		
		
		redirect("AddNewLocation.php");	
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

    <title>Add Location</title>

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
                <h3>Add Location</h3>
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
                    <h2>Insert Form</h2>
                    <ul class="nav navbar-right panel_toolbox">
					  <li><a href="Locations.php" class="btn btn-default active"><i class="fa fa-arrow-left"></i> Back</a></li>
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

                    <form id="frmPages"  method="post" action="<?php echo $self;?>" enctype="multipart/form-data" class="form-horizontal form-label-left" novalidate>
					  <input type="hidden" id="action" name="action" value="submit_form" />
                      <span class="section">Fill All Mandatory Fields</span>

					 
					  
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Name">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="Name" class="form-control col-md-7 col-xs-12" data-validate-length-range="1" name="Name" required="required" type="text" value="<?php echo $Name; ?>">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Client <span class="required">*</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="ClientID" id="ClientID" required="required" class="form-control">
							<?php
							 $query = "SELECT ID,FirstName,LastName FROM client_users Where Status = 1 ORDER BY FirstName ASC";
							$res = mysql_query($query);
							$num = mysql_num_rows($res);
							if($num > 0)
							{
								while($row = mysql_fetch_array($res))
								{
								echo '<option '.($ClientID == $row['ID'] ? 'selected' : '').' value="'.$row['ID'].'">'.$row['FirstName'].' '.$row['LastName'].'</option>';
								} 
							}
							else
							{
								echo '<option value="0">Client Not Found! (Add Client Before Create Any Location)</option>';
							}
							
							?>
						  </select>
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
                          <a href="Locations.php" class="btn btn-primary">Cancel</a>
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