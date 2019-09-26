<?php
require_once("../include/inc_head.php");
include("checkadminlogin.php");


	$msg="";
	$portId="";
	$portName="";
  $countryId="";

if(isset($_POST["action"]) && $_POST["action"] == "submit_form")
{
	if(isset($_POST["portId"]))
		$portId=trim($_POST["portId"]);
	if(isset($_POST["portName"]))
		$portName=trim($_POST["portName"]);
  if(isset($_POST["countryId"]))
    $countryId=trim($_POST["countryId"]);

		if($portId == "")
		{
			$msg='<div class="alert alert-danger alert-dismissable">
			<i class="fa fa-ban"></i>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<b>Please enter Port ID.</b>
			</div>';
		}
		else if($portName == "")
		{
			$msg='<div class="alert alert-danger alert-dismissable">
			<i class="fa fa-ban"></i>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<b>Please enter Port Name.</b>
			</div>';
		}

    else if($countryId == "")
    {
      $msg='<div class="alert alert-danger alert-dismissable">
      <i class="fa fa-ban"></i>
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <b>Please enter Country Name.</b>
      </div>';
    }



	if($msg=="")
	{

		$query="INSERT INTO  tblportname SET dateAdded=NOW(),
				portId = '" . dbinput($portId) . "',
				portName = '" . dbinput($portName) . "',
        countryId = '" . dbinput($countryId) . "',
				userId = '" . dbinput($_SESSION['UserID']) . "'";
		mysqli_query($db,$query) or die (mysqli_error());
		// echo $query;
		$ID = mysqli_insert_id();
		$_SESSION["msg"]='<div class="alert alert-success alert-dismissable">
		<i class="fa fa-ban"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<b>User has been added.</b>
		</div>';



		redirect("AddNewPortName.php");
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

    <title>Add New Port Name</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="vendors/select2/dist/css/select2.min.css" rel="stylesheet" />
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
                <h3>Add New Port Name</h3>
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
					  <li><a href="PortName.php" class="btn btn-default active"><i class="fa fa-arrow-left"></i> Back</a></li>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="portId">Port Id <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="portId" class="form-control col-md-7 col-xs-12" data-validate-length-range="3" name="portId" required="required" type="text" value="<?php echo $portId; ?>">
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="packageType">Port Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="portName" class="form-control col-md-7 col-xs-12" data-validate-length-range="3" name="portName" required="required" type="text" value="<?php echo $portName; ?>">
                        </div>
                      </div>

                      <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Country</label>
            <div class="col-md-6 col-sm-6 col-xs-12" style="margin-top:8px;">
              <select name="countryId" id="countryId" class="form-control select2_single">
                <option value="0">Please Select Country</option>
      <?php
      $sql = "SELECT * FROM tblcountry WHERE id <> 0";
      $query = mysqli_query($db,$sql) or die (mysqli_error());
      while ($row = mysqli_fetch_assoc($query)) { ?>
        <option value="<?php echo $row['id']; ?>"><?php echo $row['country_name']; ?></option>
      <?php }
       ?>

              </select>
            </div>
            </div>


                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a href="PortName.php" class="btn btn-primary">Cancel</a>
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
<!-- Select2 -->
    <script src="vendors/select2/dist/js/select2.full.min.js"></script>
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

     <script>
      $(document).ready(function() {
        $(".select2_single").select2({
          placeholder: "Select a Country",
          allowClear: true
        });
      });
    </script>
  </body>
</html>
