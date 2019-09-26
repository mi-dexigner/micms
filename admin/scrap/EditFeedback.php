<?php
include_once("Common.php");
include("CheckAdminLogin.php");


	$msg="";
	$Status=1;
	$ID=0;
	$Name="";
	$Phone="";
	$EmailAddress="";
	$Gender=0;
	$AgeGroup=0;
	$Message="";
	
	$ID=0;
	if(isset($_REQUEST["ID"]) && ctype_digit(trim($_REQUEST["ID"])))
		$ID=trim($_REQUEST["ID"]);


	$query="SELECT * FROM feedbacks WHERE  ID='" . (int)$ID . "'";
	
	$result = mysql_query ($query) or die(mysql_error()); 
	$num = mysql_num_rows($result);
	
	if($num==0)
	{
		$_SESSION["msg"]='<div class="alert alert-danger alert-dismissable">
			<i class="fa fa-ban"></i>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<b>Invalid FeedBack ID.</b>
		</div>';
		redirect("FeedBacks.php");
	}
	else
	{
		$row = mysql_fetch_array($result,MYSQL_ASSOC);
		
		$ID=$row["ID"];
		$Name=$row["Name"];
		$Phone=$row["Phone"];
		$EmailAddress=$row["EmailAddress"];
		$Gender=$row["Gender"];
		$AgeGroup=$row["AgeGroup"];
		$Message=$row["Message"];
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

    <title>Edit FeedBack</title>

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
                <h3>View FeedBack</h3>
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
                    <h2>Feedback Details</h2>
                    <ul class="nav navbar-right panel_toolbox">
					  <li><a href="Feedbacks.php" class="btn btn-default active"><i class="fa fa-arrow-left"></i> Back</a></li>
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
                      <span class="section">Customer Details</span>

					  
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Name">Name</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="Name" disabled class="form-control col-md-7 col-xs-12" type="text" value="<?php echo $Name; ?>">
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="EmailAddress">EmailAddress</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="EmailAddress" disabled class="form-control col-md-7 col-xs-12" type="text" value="<?php echo $EmailAddress; ?>">
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Phone">Phone</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="Phone" disabled class="form-control col-md-7 col-xs-12" type="text" value="<?php echo $Phone; ?>">
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Gender">Gender</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="Gender" disabled class="form-control col-md-7 col-xs-12" type="text" value="<?php if($Gender==1){echo 'Male';}else{echo 'Female';} ?>">
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="AgeGroup">Age Group</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="Gender" disabled class="form-control col-md-7 col-xs-12" type="text" value="<?php if($AgeGroup=='1'){echo 'Blow 20';}else if($AgeGroup=='2'){echo 'Between 21 to 40';}else if($AgeGroup=='3'){echo '40 Above';} ?>">
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Message">Overview</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="Message" rows="5" disabled class="form-control col-md-7 col-xs-12"><?php echo $Message; ?></textarea>
                        </div>
                      </div>
					  
					  <span class="section">Customer Answers</span>
					  
					  <?php
						$query = "SELECT q.Question,f.Answer FROM feedbacks_details f LEFT JOIN questions q ON f.QuestionID = q.ID WHERE f.FeedbackID = ".$ID." ORDER BY f.ID ASC";
						$res = mysql_query($query);
						$num = mysql_num_rows($res);
						if($num > 0)
						{
							while($row = mysql_fetch_array($res))
							{
						?>
							<div class="item form-group">
								<label class="control-label col-md-5 col-sm-5 col-xs-12" for="Message"><?php echo $row['Question']; ?></span>
								</label>
								<div class="col-md-4 col-sm-4 col-xs-12">
								  <input type="text" disabled class="form-control col-md-7 col-xs-12" value="<?php echo $row['Answer']; ?>">
								</div>
							</div>
						<?php
							} 
						}
						else
						{
							?>
							<div class="item form-group">
								<label class="control-label col-md-7 col-sm-7 col-xs-12" for="Message">Questionnaire not filled by customer.</span>
								</label>
							</div>
							<?php
						}
						
						?>
					  
                      <!--<div class="ln_solid"></div>-->
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